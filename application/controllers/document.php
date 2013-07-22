<?php

class Document_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| The Default Controller
	|--------------------------------------------------------------------------
	|
	| Instead of using RESTful routes and anonymous functions, you might wish
	| to use controllers to organize your application API. You'll love them.
	|
	| This controller responds to URIs beginning with "home", and it also
	| serves as the default controller for the application, meaning it
	| handles requests to the root of the application.
	|
	| You can respond to GET requests to "/home/profile" like so:
	|
	|		public function action_profile()
	|		{
	|			return "This is your profile!";
	|		}
	|
	| Any extra segments are passed to the method as parameters:
	|
	|		public function action_profile($id)
	|		{
	|			return "This is the profile for user {$id}.";
	|		}
	|
	*/

	public $restful = true;

	public $crumb;


	public function __construct(){
		$this->crumb = new Breadcrumb();
		$this->crumb->add('document','Document');

		date_default_timezone_set('Asia/Jakarta');
		$this->filter('before','auth');
	}

	public function get_index()
	{
		$this->crumb->add('document','Super Manager');

		//print_r(Auth::user());

		$heads = array('#','Title','Department','Created','Last Update','Expiry Date','Expiring In','Creator','Access','Attachment','Is Template','Tags','Action');
		$searchinput = array(false,'title','department','created','last update','expiry date','expiring','creator','access','filename','useAsTemplate','tags',false);

		$title = 'Document Library';

		$categories = json_encode(Config::get('category.all'));

		if(Auth::user()->role == 'root' || Auth::user()->role == 'super'){
			return View::make('tables.simple')
				->with('title',$title)
				->with('newbutton','New Document')
				->with('disablesort','0,5,6')
				->with('addurl','document/add')
				->with('searchinput',$searchinput)
				//->with('category',$categories)
				->with('ajaxsource',URL::to('document'))
				->with('ajaxdel',URL::to('document/del'))
				->with('crumb',$this->crumb)
				->with('heads',$heads);
		}else{
			return View::make('document.restricted')
							->with('title',$title);
		}
	}

	public function post_index()
	{

		$fields = array('title','docDepartment','createdDate','lastUpdate','expiryDate','expiring','creatorName','access','docFilename','useAsTemplate','docTag');

		$rel = array('like','like','like','like','like','like','like','like','like','like','like');

		$cond = array('both','both','both','both','both','both','both','both','both','both','both');

		$pagestart = Input::get('iDisplayStart');
		$pagelength = Input::get('iDisplayLength');

		$searchCategory = Input::get('searchCategory');

		$searchCategory = (!isset($searchCategory) || $searchCategory == '')?'all':$searchCategory;

		$limit = array($pagelength, $pagestart);

		$defsort = 1;
		$defdir = -1;

		$idx = 0;
		$q = array();

		$hilite = array();
		$hilite_replace = array();

		foreach($fields as $field){
			if(Input::get('sSearch_'.$idx))
			{

				$hilite_item = Input::get('sSearch_'.$idx);
				$hilite[] = $hilite_item;
				$hilite_replace[] = '<span class="hilite">'.$hilite_item.'</span>';

				if($rel[$idx] == 'like'){
					if($cond[$idx] == 'both'){
						$q[$field] = new MongoRegex('/'.Input::get('sSearch_'.$idx).'/i');
					}else if($cond[$idx] == 'before'){
						$q[$field] = new MongoRegex('/^'.Input::get('sSearch_'.$idx).'/i');
					}else if($cond[$idx] == 'after'){
						$q[$field] = new MongoRegex('/'.Input::get('sSearch_'.$idx).'$/i');
					}
				}else if($rel[$idx] == 'equ'){
					$q[$field] = Input::get('sSearch_'.$idx);
				}
			}
			$idx++;
		}

		//print_r($q)

		$document = new Document();

		/* first column is always sequence number, so must be omitted */
		$fidx = Input::get('iSortCol_0');
		if($fidx == 0){
			$fidx = $defsort;
			$sort_col = $fields[$fidx];
			$sort_dir = $defdir;
		}else{
			$fidx = ($fidx > 0)?$fidx - 1:$fidx;
			$sort_col = $fields[$fidx];
			$sort_dir = (Input::get('sSortDir_0') == 'asc')?1:-1;
		}

		$count_all = $document->count();

		//$q['deleted'] = false;
		$q['$or'] = array(
			array('deleted'=>false),
			array('deleted'=>array('$exists'=>false))
		);

		if($searchCategory != 'all'){
			$q['docCategory'] = $searchCategory;
		}

		if(count($q) > 0){
			$documents = $document->find($q,array(),array($sort_col=>$sort_dir),$limit);
			$count_display_all = $document->count($q);
		}else{
			$documents = $document->find(array(),array(),array($sort_col=>$sort_dir),$limit);
			$count_display_all = $document->count();
		}

		$aadata = array();

		$counter = 1 + $pagestart;
		foreach ($documents as $doc) {
			if(isset($doc['tags']) && is_array($doc['tags']) && implode('',$doc['tags']) != ''){
				$tags = array();

				foreach($doc['tags'] as $t){
					$tags[] = '<span class="tagitem">'.$t.'</span>';
				}

				$tags = implode('',$tags);

			}else{
				$tags = '';
			}

			$doc['title'] = str_ireplace($hilite, $hilite_replace, $doc['title']);
			$doc['creatorName'] = str_ireplace($hilite, $hilite_replace, $doc['creatorName']);

			if(isset($doc['expiring'])){

				if($doc['expiring'] == 'Today'){
					$doc['expiring'] = '<span class="expiring now">'.$doc['expiring'].'</span>';
				}elseif($doc['expiring'] < 0){
					$doc['expiring'] = '<span class="expiring yesterday">'.abs($doc['expiring']).' day(s) ago</span>';
				}elseif($doc['expiring'] != false){
					$doc['expiring'] = '<span class="expiring">'.$doc['expiring'].' day(s)</span>';
				}else{
					$doc['expiring'] = '';
				}

			}else{

				$doc['expiring'] = '';
			}

			$download = '<a href="'.URL::to('document/download/'.$doc['_id']).'">'.
						'<i class="foundicon-inbox action has-tip tip-bottom noradius" title="Download"></i></a>&nbsp;';

			$aadata[] = array(
				$counter,
				'<span class="metaview" id="'.$doc['_id'].'">'.$doc['title'].'</span>',
				depttitle($doc['docDepartment']),
				date('d-m-Y H:i:s', $doc['createdDate']->sec),
				isset($doc['lastUpdate'])?date('d-m-Y H:i:s', $doc['lastUpdate']->sec):'',
				isset($doc['expiryDate']) && $doc['expiryDate'] != '' ?date('d-m-Y', $doc['expiryDate']->sec):'',
				se($doc['expiring']),
				se($doc['creatorName']),
				isset($doc['access'])?ucfirst($doc['access']):'',
				isset($doc['docFilename'])?'<span class="fileview" id="'.$doc['_id'].'">'.$doc['docFilename'].'</span>':'',
				isset($doc['useAsTemplate'])?$doc['useAsTemplate']:'No',
				$tags,
				'<a href="'.URL::to('document/edit/'.$doc['_id']).'"><i class="foundicon-edit action"></i></a>&nbsp;'.
				$download.
				'<i class="foundicon-trash action del" id="'.$doc['_id'].'"></i>'
			);
			$counter++;
		}


		$result = array(
			'sEcho'=> Input::get('sEcho'),
			'iTotalRecords'=>$count_all,
			'iTotalDisplayRecords'=> $count_display_all,
			'aaData'=>$aadata,
			'qrs'=>$q
		);

		return Response::json($result);
	}


	public function get_trash()
	{
		$this->crumb->add('document/trash','Trash');

		//print_r(Auth::user());

		$heads = array('#','Title','Department','Created','Last Update','Expiry Date','Expiring In','Creator','Access','Attachment','Is Template','Tags','Action');
		$searchinput = array(false,'title','department','created','last update','expiry date','expiring','creator','access','filename','useAsTemplate','tags',false);

		$title = 'Document Trash';

		if(Auth::user()->role == 'root' || Auth::user()->role == 'super'){
			return View::make('tables.simple')
				->with('title',$title)
				->with('newbutton','')
				->with('disablesort','0,5,6')
				->with('addurl','')
				->with('searchinput',$searchinput)
				->with('ajaxsource',URL::to('document/trash'))
				->with('ajaxdel',URL::to('document/purge'))
				->with('ajaxrestore',URL::to('document/restore'))
				->with('crumb',$this->crumb)
				->with('heads',$heads);
		}else{
			return View::make('document.restricted')
							->with('title',$title);
		}
	}

	public function post_trash()
	{

		$fields = array('title','docDepartment','createdDate','lastUpdate','expiryDate','expiring','creatorName','access','docFilename','useAsTemplate','docTag');

		$rel = array('like','like','like','like','like','like','like','like','like','like','like');

		$cond = array('both','both','both','both','both','both','both','both','both','both','both');

		$pagestart = Input::get('iDisplayStart');
		$pagelength = Input::get('iDisplayLength');

		$limit = array($pagelength, $pagestart);

		$defsort = 1;
		$defdir = -1;

		$idx = 0;
		$q = array();

		$hilite = array();
		$hilite_replace = array();

		foreach($fields as $field){
			if(Input::get('sSearch_'.$idx))
			{

				$hilite_item = Input::get('sSearch_'.$idx);
				$hilite[] = $hilite_item;
				$hilite_replace[] = '<span class="hilite">'.$hilite_item.'</span>';

				if($rel[$idx] == 'like'){
					if($cond[$idx] == 'both'){
						$q[$field] = new MongoRegex('/'.Input::get('sSearch_'.$idx).'/i');
					}else if($cond[$idx] == 'before'){
						$q[$field] = new MongoRegex('/^'.Input::get('sSearch_'.$idx).'/i');
					}else if($cond[$idx] == 'after'){
						$q[$field] = new MongoRegex('/'.Input::get('sSearch_'.$idx).'$/i');
					}
				}else if($rel[$idx] == 'equ'){
					$q[$field] = Input::get('sSearch_'.$idx);
				}
			}
			$idx++;
		}

		//print_r($q)

		$document = new Document();

		/* first column is always sequence number, so must be omitted */
		$fidx = Input::get('iSortCol_0');
		if($fidx == 0){
			$fidx = $defsort;
			$sort_col = $fields[$fidx];
			$sort_dir = $defdir;
		}else{
			$fidx = ($fidx > 0)?$fidx - 1:$fidx;
			$sort_col = $fields[$fidx];
			$sort_dir = (Input::get('sSortDir_0') == 'asc')?1:-1;
		}

		$count_all = $document->count();

		$q['deleted'] = true;

		if(count($q) > 0){
			$documents = $document->find($q,array(),array($sort_col=>$sort_dir),$limit);
			$count_display_all = $document->count($q);
		}else{
			$documents = $document->find(array(),array(),array($sort_col=>$sort_dir),$limit);
			$count_display_all = $document->count();
		}

		$aadata = array();

		$counter = 1 + $pagestart;
		foreach ($documents as $doc) {
			if(isset($doc['tags']) && is_array($doc['tags']) && implode('',$doc['tags']) != ''){
				$tags = array();

				foreach($doc['tags'] as $t){
					$tags[] = '<span class="tagitem">'.$t.'</span>';
				}

				$tags = implode('',$tags);

			}else{
				$tags = '';
			}

			$doc['title'] = str_ireplace($hilite, $hilite_replace, $doc['title']);
			$doc['creatorName'] = str_ireplace($hilite, $hilite_replace, $doc['creatorName']);

			if(isset($doc['expiring'])){

				if($doc['expiring'] == 'Today'){
					$doc['expiring'] = '<span class="expiring now">'.$doc['expiring'].'</span>';
				}elseif($doc['expiring'] < 0){
					$doc['expiring'] = '<span class="expiring yesterday">'.abs($doc['expiring']).' day(s) ago</span>';
				}elseif($doc['expiring'] != false){
					$doc['expiring'] = '<span class="expiring">'.$doc['expiring'].' day(s)</span>';
				}else{
					$doc['expiring'] = '';
				}

			}else{

				$doc['expiring'] = '';
			}

			$download = '<a href="'.URL::to('document/download/'.$doc['_id']).'">'.
						'<i class="foundicon-inbox action has-tip tip-bottom noradius" title="Download"></i></a>&nbsp;';

			$aadata[] = array(
				$counter,
				'<span class="metaview" id="'.$doc['_id'].'">'.$doc['title'].'</span>',
				depttitle($doc['docDepartment']),
				date('d-m-Y H:i:s', $doc['createdDate']->sec),
				isset($doc['lastUpdate'])?date('d-m-Y H:i:s', $doc['lastUpdate']->sec):'',
				(isset($doc['expiryDate']) && $doc['expiryDate'] != '')?date('d-m-Y', $doc['expiryDate']->sec):'',
				$doc['expiring'],
				$doc['creatorName'],
				isset($doc['access'])?ucfirst($doc['access']):'',
				isset($doc['docFilename'])?'<span class="fileview" id="'.$doc['_id'].'">'.$doc['docFilename'].'</span>':'',
				isset($doc['useAsTemplate'])?$doc['useAsTemplate']:'No',
				$tags,
				'<a href="'.URL::to('document/edit/'.$doc['_id']).'"><i class="foundicon-edit action"></i></a>&nbsp;'.
				$download.
				'<i class="foundicon-refresh action restore" id="'.$doc['_id'].'"></i>&nbsp;'.
				'<i class="foundicon-remove action purge" id="'.$doc['_id'].'"></i>'
			);
			$counter++;
		}


		$result = array(
			'sEcho'=> Input::get('sEcho'),
			'iTotalRecords'=>$count_all,
			'iTotalDisplayRecords'=> $count_display_all,
			'aaData'=>$aadata,
			'qrs'=>$q
		);

		return Response::json($result);
	}


	public function post_del(){
		$id = Input::get('id');

		$user = new Document();

		if(is_null($id)){
			$result = array('status'=>'ERR','data'=>'NOID');
		}else{

			$id = new MongoId($id);


			if($user->update(array('_id'=>$id),array('$set'=>array('deleted'=>true)))){
				Event::fire('document.delete',array('id'=>$id,'result'=>'OK'));
				$result = array('status'=>'OK','data'=>'CONTENTDELETED');
			}else{
				Event::fire('document.delete',array('id'=>$id,'result'=>'FAILED'));
				$result = array('status'=>'ERR','data'=>'DELETEFAILED');
			}
		}

		print json_encode($result);
	}

	public function post_purge(){
		$id = Input::get('id');

		$user = new Document();

		if(is_null($id)){
			$result = array('status'=>'ERR','data'=>'NOID');
		}else{

			$id = new MongoId($id);


			if($user->delete(array('_id'=>$id))){
				Event::fire('document.purge',array('id'=>$id,'result'=>'OK'));
				$result = array('status'=>'OK','data'=>'CONTENTDELETED');
			}else{
				Event::fire('document.purge',array('id'=>$id,'result'=>'FAILED'));
				$result = array('status'=>'ERR','data'=>'DELETEFAILED');
			}
		}

		print json_encode($result);
	}

	public function post_restore(){
		$id = Input::get('id');

		$user = new Document();

		if(is_null($id)){
			$result = array('status'=>'ERR','data'=>'NOID');
		}else{

			$id = new MongoId($id);


			if($user->update(array('_id'=>$id),array('$set'=>array('deleted'=>false)))){
				Event::fire('document.restore',array('id'=>$id,'result'=>'OK'));
				$result = array('status'=>'OK','data'=>'CONTENTDELETED');
			}else{
				Event::fire('document.restore',array('id'=>$id,'result'=>'FAILED'));
				$result = array('status'=>'ERR','data'=>'DELETEFAILED');
			}
		}

		print json_encode($result);
	}

	public function get_add($type = null){

		if(is_null($type)){
			$this->crumb->add('document/add','New Document');
		}else{
			$this->crumb = new Breadcrumb();
			$this->crumb->add('document/type/'.$type,'Document');

			$this->crumb->add('document/type/'.$type,depttitle($type));
			$this->crumb->add('document/add','New Document');
		}

		$doc = new Document();

		$template = $doc->find(array('useAsTemplate'=>'Yes'));

		$permissions = Auth::user()->permissions;

		$templates = array();
		$templates['none'] = 'None';
		foreach($template as $t){
			$templates[$t['_id']->__toString()] = $t['title'];
		}

		$category = $this->getCategory($type);

		$form = new Formly();
		return View::make('document.new')
					->with('form',$form)
					->with('category',$category)
					->with('templates',$templates)
					->with('type',$type)
					->with('crumb',$this->crumb)
					->with('title','New Document');

	}

	public function post_add($type = null){

		//print_r(Session::get('permission'));


		if(is_null($type)){
			$back = 'document';
		}else{
			$back = 'document/type/'.$type;
		}

		$postdata = Input::get();

		if(isset($postdata['useAsTemplate']) && $postdata['useAsTemplate'] == 'Yes'){
		    $rules = array(
		        'title'  => 'required|max:50',
		        'templateName' => 'required',
		        'templateNumberStart'=>'required'
		    );
		}else{
		    $rules = array(
		        'title'  => 'required|max:50'
		    );
		}

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('document/add/'.$type)->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();

	    	//print_r($data);

			//pre save transform
			unset($data['csrf_token']);

	            $datetimeNow = new DateTime(date('d-m-Y',time()));
	            $datetimeThen = new DateTime($data['expiryDate']);

	            $indays = $datetimeNow->diff($datetimeThen);

	            if(isset($data['alertStart']) && $indays->days > $data['alertStart']){
	            	$data['expiring'] = false;
	            }else{
	            	if($indays->days == 0){
		            	$data['expiring'] = 'Today';
	            	}elseif($indays->invert == 0){
		            	$data['expiring'] = $indays->days;
	            	}elseif($indays->invert == 1){
		            	$data['expiring'] = $indays->days * -1;
	            	}
	            }


			$data['effectiveDate'] = ($data['effectiveDate'] == '')?'':new MongoDate(strtotime($data['effectiveDate']." 00:00:00"));
			$data['expiryDate'] =($data['expiryDate'] == '')?'':new MongoDate(strtotime($data['expiryDate']." 00:00:00"));


			$data['createdDate'] = new MongoDate();
			$data['lastUpdate'] = new MongoDate();
			$data['creatorName'] = Auth::user()->fullname;
			$data['creatorId'] = Auth::user()->id;

			$data['useAsTemplate'] = (isset($data['useAsTemplate']))?$data['useAsTemplate']:'No';

			if(isset($data['alertStart'])){
				if($data['alertStart'] > Config::get('parama.expiration_alert_days')){
					$data['alertStart'] = Config::get('parama.expiration_alert_days');
				}
				$data['alertStart'] = new MongoInt64($data['alertStart']);
			}

			$sharelist = explode(',', $data['docShare']);
			if(is_array($sharelist)){
				$usr = new User();
				$shd = array();
				foreach($sharelist as $sh){
					$shd[] = array('email'=>$sh);
				}
				$shared_ids = $usr->find(array('$or'=>$shd),array('id'));

				$data['sharedEmails'] = $sharelist ;
				$data['sharedIds'] = array_values($shared_ids) ;
			}

			$approvallist = explode(',', $data['docApprovalRequest']);
			if(is_array($approvallist)){
				$usr = new User();
				$shd = array();
				foreach($approvallist as $sh){
					$appval[] = array('email'=>$sh);
				}
				$approval_ids = $usr->find(array('$or'=>$appval),array('id','fullname'));

				$data['approvalRequestEmails'] = $approvallist ;
				$data['approvalRequestIds'] = array_values($approval_ids) ;
			}

			$docupload = Input::file('docupload');

			$docupload['uploadTime'] = new MongoDate();


			$docupload['name'] = fixfilename($docupload['name']);


			$data['docFilename'] = $docupload['name'];

			$data['docFiledata'] = $docupload;

			$data['docFileList'][] = $docupload;

			$data['tags'] = explode(',',$data['docTag']);

			$document = new Document();

			$newobj = $document->insert($data);


			if($newobj){

				if($newobj['useAsTemplate'] == 'Yes'){
					$templatename = trim(strtolower($newobj['templateName']));
					$startFrom = ($newobj['templateNumberStart'] == '')?1:$newobj['templateNumberStart'];
					$startFrom = new MongoInt64($startFrom);
					// set new sequencer
					$sequencer = new Sequence();

					$sequencer->insert(array('_id'=>$templatename,'seq'=>$startFrom));

				}

				if($docupload['name'] != ''){

					$newid = $newobj['_id']->__toString();

					$newdir = realpath(Config::get('parama.storage')).'/'.$newid;

					Input::upload('docupload',$newdir,$docupload['name']);

					$inpath = $newdir.'/'.$docupload['name'];
					$ext = File::extension($inpath);

					if($ext == 'pdf'){
						$outpath = str_replace('.'.$ext, '', $inpath);

						File::mkdir($outpath);

						$cmd = pdf2images($inpath,$outpath);
					}

				}

				if(count($data['tags']) > 0){
					$tag = new Tag();
					foreach($data['tags'] as $t){
						$tag->update(array('tag'=>$t),array('$inc'=>array('count'=>1)),array('upsert'=>true));
					}
				}

				$sharedto = explode(',',$data['docShare']);

				if(count($sharedto) > 0  && $data['docShare'] != ''){
					foreach($sharedto as $to){
						Event::fire('document.share',array('id'=>$newobj['_id'],'sharer_id'=>Auth::user()->id,'shareto'=>$to));
					}
				}

				$approvalby = explode(',',$data['docApprovalRequest']);

				if(count($approvalby) > 0 && $data['docApprovalRequest'] != ''){
					foreach($approvalby as $to){
						Event::fire('request.approval',array('id'=>$newobj['_id'],'approvalby'=>$to));
					}
				}

				Event::fire('document.create',array('id'=>$newobj['_id'],'result'=>'OK','department'=>Auth::user()->department,'creator'=>Auth::user()->id));

		    	return Redirect::to($back)->with('notify_success','Document saved successfully');
			}else{
				Event::fire('document.create',array('id'=>$id,'result'=>'FAILED'));
		    	return Redirect::to($back)->with('notify_success','Document saving failed');
			}

	    }


	}

	public function get_edit($id = null,$type = null){

		if(is_null($type)){
			$this->crumb->add('document/add','Edit',false);
		}else{
			$this->crumb = new Breadcrumb();
			$this->crumb->add('document/type/'.$type,'Document');

			$this->crumb->add('document/type/'.$type,depttitle($type),false);
			$this->crumb->add('document/edit/'.$id,'Edit',false);
		}


		$doc = new Document();

		$id = (is_null($id))?Auth::user()->id:$id;

		$id = new MongoId($id);

		$doc_data = $doc->get(array('_id'=>$id));

		$doc_data['oldTag'] = $doc_data['docTag'];
		$doc_data['oldShare'] = $doc_data['docShare'];

		$doc_data['effectiveDate'] = ($doc_data['effectiveDate'] == '')?'':date('d-m-Y', $doc_data['effectiveDate']->sec);
		$doc_data['expiryDate'] = ($doc_data['expiryDate'] == '')?'':date('d-m-Y', $doc_data['expiryDate']->sec);

		if(isset($doc_data['useAsTemplate'])){
			$doc_data['useAsTemplate'] = ($doc_data['useAsTemplate'] == 'No')?false:true;
		}else{
			$doc_data['useAsTemplate'] = false;
		}

		if(is_null($type)){
			$this->crumb->add('document/edit/'.$id,$doc_data['title']);
		}else{
			$this->crumb->add('document/edit/'.$id.'/'.$type,$doc_data['title']);
		}

		$doc_data['oldTemplateName'] = (isset($doc_data['templateName']))?$doc_data['templateName']:'';

		$template = $doc->find(array('useAsTemplate'=>'Yes'));

		$templates = array();
		$templates['none'] = 'None';
		foreach($template as $t){
			$templates[$t['_id']->__toString()] = $t['title'];
		}

		$permissions = Auth::user()->permissions;


		$category = $this->getCategory($type);

		$form = Formly::make($doc_data);

		return View::make('document.edit')
					->with('doc',$doc_data)
					->with('templates',$templates)
					->with('category',$category)
					->with('form',$form)
					->with('type',$type)
					->with('crumb',$this->crumb)
					->with('title','Edit Document');

	}


	public function post_edit($id,$type = null){

		//print_r(Session::get('permission'));

		if(is_null($type)){
			$back = 'document';
		}else{
			$back = 'document/type/'.$type;
		}

		$postdata = Input::get();

		if(isset($postdata['useAsTemplate']) && $postdata['useAsTemplate'] == 'Yes'){
		    $rules = array(
		        'title'  => 'required|max:50',
		        'templateName' => 'required',
		        'templateNumberStart'=>'required'
		    );
		}else{
		    $rules = array(
		        'title'  => 'required|max:50'
		    );
		}


	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('document/edit/'.$id.'/'.$type)->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();

			$id = new MongoId($data['id']);

	            $datetimeNow = new DateTime(date('d-m-Y',time()));
	            $datetimeThen = new DateTime($data['expiryDate']);

	            $indays = $datetimeNow->diff($datetimeThen);

    	        $exp = new Expiration();

	            if(isset($data['alertStart']) && $indays->days > $data['alertStart']){
	            	$data['expiring'] = false;
	            	$exp->delete(array('doc_id'=>$id));
	            }else{
	            	if($indays->days == 0){
		            	$data['expiring'] = 'Today';
	            	}elseif($indays->invert == 0){
		            	$data['expiring'] = $indays->days;
	            	}elseif($indays->invert == 1){
		            	$data['expiring'] = $indays->days * -1;
	            	}
					$expiryDate = new MongoDate(strtotime($data['expiryDate']." 00:00:00"));

	                $exp->update(array('doc_id'=>$id),array('doc_id'=>$id,'expiring'=>$indays->days,'expiryDate'=>$expiryDate,'updated'=>false),array('upsert'=>true));

	                // send no message
	            }

			$data['effectiveDate'] = ($data['effectiveDate'] == '')?'':new MongoDate(strtotime($data['effectiveDate']." 00:00:00"));
			$data['expiryDate'] =($data['expiryDate'] == '')?'':new MongoDate(strtotime($data['expiryDate']." 00:00:00"));

			//$data['effectiveDate'] = new MongoDate(strtotime($data['effectiveDate']." 00:00:00"));
			//$data['expiryDate'] = new MongoDate(strtotime($data['expiryDate']." 00:00:00"));
			$data['lastUpdate'] = new MongoDate();

			if(isset($data['expiring'])){
				$data['expiring'] = ($data['expiring'] == '')?false:$data['expiring'];
			}else{
				$data['expiring'] = false;
			}

			if(isset($data['alertStart'])){
				if($data['alertStart'] > Config::get('parama.expiration_alert_days')){
					$data['alertStart'] = Config::get('parama.expiration_alert_days');
				}
				$data['alertStart'] = new MongoInt64($data['alertStart']);
			}

			unset($data['csrf_token']);

			$docId = $data['id'];
			unset($data['id']);

			if(isset($data['useAsTemplate']) && $data['useAsTemplate'] == 'Yes' && ($data['oldTemplateName'] != $data['templateName'] || $data['oldTemplateName'] == '')){
				$templatename = trim(strtolower($data['templateName']));
				$startFrom = ($data['templateNumberStart'] == '' || $data['templateNumberStart'] <= 0)?1:$data['templateNumberStart'];
				$startFrom = new MongoInt64($startFrom);
				// set new sequencer
				$sequencer = new Sequence();
				if($obj = $sequencer->get(array('_id'=>$templatename))){
					if(count($obj) < 0){
						$sequencer->insert(array('_id'=>$templatename,'seq'=>$startFrom),array('upsert'=>true));
					}
				}else{
					$sequencer->insert(array('_id'=>$templatename,'seq'=>$startFrom),array('upsert'=>true));
				}
			}

			$sharelist = explode(',', $data['docShare']);
			if(is_array($sharelist)){
				$usr = new User();
				$shd = array();
				foreach($sharelist as $sh){
					$shd[] = array('email'=>$sh);
				}
				$shared_ids = $usr->find(array('$or'=>$shd),array('id'));

				$data['sharedEmails'] = $sharelist ;
				$data['sharedIds'] = array_values($shared_ids) ;
			}

			$approvallist = explode(',', $data['docApprovalRequest']);
			if(is_array($approvallist)){
				$usr = new User();
				$shd = array();
				foreach($approvallist as $sh){
					$appval[] = array('email'=>$sh);
				}
				$approval_ids = $usr->find(array('$or'=>$appval),array('id','fullname'));

				$data['approvalRequestEmails'] = $approvallist ;
				$data['approvalRequestIds'] = array_values($approval_ids) ;
			}


			$data['tags'] = explode(',',$data['docTag']);

			$doc = new Document();

			//print_r($data);
			$oldtags = explode(',',$data['oldTag']);

			if(count($data['tags']) > 0){
				$tag = new Tag();
				foreach($data['tags'] as $t){
					if(in_array($t, $oldtags)){
						$add = 0;
					}else{
						$add = 1;
					}
					$tag->update(array('tag'=>$t),array('$inc'=>array('count'=>$add)),array('upsert'=>true));
				}
			}

			unset($data['oldTag']);

			// upload new file , additive

			$docupload = Input::file('docupload');

			$withfile = false;

			if($docupload['name'] != ''){

				$docupload['uploadTime'] = new MongoDate();

				$docupload['name'] = fixfilename($docupload['name']);

				$dirname = $docId;

				$dirname = realpath(Config::get('parama.storage')).'/'.$dirname;

				$uploadresult = Input::upload('docupload',$dirname,$docupload['name']);

				if($uploadresult){

					$data['docFilename'] = $docupload['name'];

					$data['docFiledata'] = $docupload;

					$withfile = true;

					$inpath = $dirname.'/'.$docupload['name'];

					$ext = File::extension($inpath);

					if($ext == 'pdf'){
						$outpath = str_replace('.'.$ext, '', $inpath);

						if(File::exists($outpath) == false){
							File::mkdir($outpath);
						}

						$cmd = pdf2images($inpath,$outpath);
					}

				}



			}

			if($withfile == true){
				$updatequery = array('$set'=>$data,'$push'=>array('docFileList'=>$docupload));
			}else{
				$updatequery = array('$set'=>$data);
			}

			//print_r($data);

			if($doc->update(array('_id'=>$id),$updatequery)){

				Event::fire('document.update',array('id'=>$id,'result'=>'OK'));

				$sharedto = explode(',',$data['docShare']);

				if(count($sharedto) > 0  && $data['docShare'] != ''){
					$oldShared = explode(',', $data['oldShare']);

					foreach($sharedto as $to){
						if(is_array($oldShared) && !in_array($to, $oldShared)){
							Event::fire('document.share',array('id'=>$id,'sharer_id'=>Auth::user()->id,'shareto'=>$to));
						}else{
							Event::fire('document.share',array('id'=>$id,'sharer_id'=>Auth::user()->id,'shareto'=>$to));
						}
					}
				}

				$approvalby = explode(',',$data['docApprovalRequest']);

				if(count($approvalby) > 0 && $data['docApprovalRequest'] != ''){
					foreach($approvalby as $to){
						Event::fire('request.approval',array('id'=>$id,'approvalby'=>$to));
					}
				}

		    	return Redirect::to($back)->with('notify_success','Document saved successfully');
			}else{

				Event::fire('document.update',array('id'=>$id,'result'=>'FAILED'));

		    	return Redirect::to($back)->with('notify_success','Document saving failed');
			}

	    }


	}


	public function get_type($type = null)
	{
		$this->crumb = new Breadcrumb();
		$this->crumb->add('document/type/'.$type,'Document');
		$this->crumb->add('document/type/'.$type,depttitle($type));

		$heads = array('# <input type="checkbox" value="" class="select-all" >',
			'Title','Created','Last Update',
			//'Expiry Date','Expiring In','Creator',
			'Access','Sharing','Folder','Attachment','Tags','Action');
		$searchinput = array(false,'title','created','last update',
			//'expiry date','expiring','creator',
			'access','sharing','folder','filename','tags',false);

		$dept = Config::get('parama.department');

		$permissions = Auth::user()->permissions;

		$category = $this->getCategory($type);
		/*
		if(is_null($type)){
			$category = false;
			//$category = json_encode(Config::get('category.all'));
		}else{
			$therole = Auth::user()->role;

			if($type == 'president_director'){

				$types = Config::get('parama.department');
				$types = array_keys($types);

				$fullarray = array();

				foreach ($types as $t) {
					$nodisplay = ($t == 'finance_hr_director' || $t == 'operations_director')?true:false;

					if(file_exists('public/yml/'.$t.'.yml') && $nodisplay == false){
						$parsed = Yaml::from_file('public/yml/'.$t.'.yml')->to_array();
						$parent = array('label'=>depttitle($t),'id'=>'parent','children'=>$parsed);
						$fullarray[] = $parent;
					}
				}

				$all = array('label'=>'All','id'=>'all');

				array_unshift($fullarray, $all);

				$category = json_encode($fullarray);


			}else if($type == 'operations_director'){

				$types = Config::get('parama.department');
				$types = array_keys($types);

				$fullarray = array();

				foreach ($types as $t) {
					$nodisplay = ($t == 'finance_hr_director' || $t == 'finance_balikpapan' || $t == 'finance_pusat' || $t == 'hr_admin')?true:false;

					if(file_exists('public/yml/'.$t.'.yml') && $nodisplay == false){
						$parsed = Yaml::from_file('public/yml/'.$t.'.yml')->to_array();
						$parent = array('label'=>depttitle($t),'id'=>'parent','children'=>$parsed);
						$fullarray[] = $parent;
					}
				}

				$all = array('label'=>'All','id'=>'all');

				array_unshift($fullarray, $all);

				$category = json_encode($fullarray);


			}else{

				if(file_exists('public/yml/'.$type.'.yml')){
					$parsed = Yaml::from_file('public/yml/'.$type.'.yml')->to_array();

					$all = array('label'=>'All','id'=>'all');

					array_unshift($parsed, $all);

					$category = json_encode($parsed);
				}else{
					$category = json_encode(Config::get('category.'.$type));
				}

			}

		}
		*/

		$title = $dept[$type];

		$doc = new Document();

		//check is shared
		$sharecriteria = new MongoRegex('/'.Auth::user()->email.'/i');

		// empty query object
		$q = array();
		// default filter by department
		$q['docDepartment'] = $type;

		// by default can not open the page
		$can_open = false;

		if( Auth::user()->role == 'root' ||
			Auth::user()->role == 'president_director'
			/*
			||
			Auth::user()->role == 'super' ||
			Auth::user()->role == 'operations_director' ||
			Auth::user()->role == 'finance_hr_director' ||
			Auth::user()->role == 'bod'
			*/
			){

			// these roles are super users

			$can_open = true;

		}else if( Auth::user()->role == 'super' ||
			Auth::user()->role == 'operations_director' ||
			Auth::user()->role == 'finance_hr_director' ||
			Auth::user()->role == 'bod'
		){

			if($permissions->{$type}->read == 1){
				$can_open = true;
			}

		}else if( Auth::user()->role == 'client' ||
			Auth::user()->role == 'principal_vendor' ||
			Auth::user()->role == 'subcon'){

			$q['$or'] = array(
				array('creatorId'=>Auth::user()->id),
				array('docShare'=>$sharecriteria)
			);

			$shared = $doc->count($q);
			$created = $doc->count($q);

			if($shared > 0 || $created > 0){
				$can_open = true;
			}

		}else if($type == 'general'){

			$can_open = true;

		}else{

			if(Auth::user()->department == $type){
				$q['$or'] = array(
					array('access'=>'general'),
					array('docShare'=>$sharecriteria)
				);
				$can_open = true;
			}else{
				$q['docShare'] = $sharecriteria;
			}

			$shared = $doc->count($q);
			$created = $doc->count($q);

            /*
            print_r($q);

            print 'shared '.$shared.'<br />';

            print 'created '.$created.'<br />';

            print $permissions->{$type}->read;
            */

			if($shared > 0 || $created > 0 || $permissions->{$type}->read == 1){
				$can_open = true;
			}

		}


		// print_r($permissions);


		//print_r($permissions->{$type}->create);

		if( $can_open == true ){

			if($permissions->{$type}->create == 1 || Auth::user()->department == $type ){
				$addurl = 'document/add/'.$type;
			}else{
				$addurl = '';
			}

			//print $addurl;

			return View::make('tables.simple')
				->with('title',$title)
				->with('newbutton','New Document')
				->with('disablesort','0,5,6')
				->with('category',$category)
				->with('addurl',$addurl)
				->with('searchinput',$searchinput)
                ->with('type',$type)
				->with('ajaxsource',URL::to('document/type/'.$type))
				->with('ajaxdel',URL::to('document/del'))
				->with('filteron',true)
				->with('crumb',$this->crumb)
				->with('heads',$heads);
		}else{
			return View::make('document.restricted')
				->with('crumb',$this->crumb)
				->with('title',$title);
		}

	}

	public function post_type($type = null)
	{

		$fields = array('title','createdDate','lastUpdate',
			//'expiryDate','expiring','creatorName',
			'access','docCategory','docFilename','docTag');

		$rel = array('like','like','like',
			//'like','like','like',
			'like','like','like','like');

		$cond = array('both','both','both','both','both','both','both','both','both');

		$pagestart = Input::get('iDisplayStart');
		$pagelength = Input::get('iDisplayLength');

		$searchCategory = Input::get('searchCategory');
		$searchCategory = (!isset($searchCategory) || $searchCategory == '')?'all':$searchCategory;


		$searchOpportunityNo = Input::get('filterOpportunityNo');
		$searchOpportunityNo = (!isset($searchOpportunityNo) || $searchOpportunityNo == '')?'all':$searchOpportunityNo;
		$searchTenderNo = Input::get('filterTenderNo');
		$searchTenderNo = (!isset($searchTenderNo) || $searchTenderNo == '')?'all':$searchTenderNo;
		$searchProjectNo = Input::get('filterProjectNo');
		$searchProjectNo = (!isset($searchProjectNo) || $searchProjectNo == '')?'all':$searchProjectNo;

		$limit = array($pagelength, $pagestart);

		$defsort = 1;
		$defdir = -1;

		$idx = 0;

		$hilite = array();
		$hilite_replace = array();

		$sq = array();

		foreach($fields as $field){
			if(Input::get('sSearch_'.$idx))
			{

				$hilite_item = Input::get('sSearch_'.$idx);
				$hilite[] = $hilite_item;
				$hilite_replace[] = '<span class="hilite">'.$hilite_item.'</span>';

				if($rel[$idx] == 'like'){
					if($cond[$idx] == 'both'){
						$sq[$field] = new MongoRegex('/'.Input::get('sSearch_'.$idx).'/i');
					}else if($cond[$idx] == 'before'){
						$sq[$field] = new MongoRegex('/^'.Input::get('sSearch_'.$idx).'/i');
					}else if($cond[$idx] == 'after'){
						$sq[$field] = new MongoRegex('/'.Input::get('sSearch_'.$idx).'$/i');
					}
				}else if($rel[$idx] == 'equ'){
					$sq[$field] = Input::get('sSearch_'.$idx);
				}
			}
			$idx++;
		}

		if($searchProjectNo != 'all'){
			$project_no = new MongoRegex('/'.$searchProjectNo.'/i');
			$sq['docProject'] = $project_no;
		}

		if($searchTenderNo != 'all'){
			$tender_no = new MongoRegex('/'.$searchTenderNo.'/i');
			$sq['docTender'] = $tender_no;
		}

		if($searchOpportunityNo != 'all'){
			$opportunity_no = new MongoRegex('/'.$searchOpportunityNo.'/i');
			$sq['docOpportunity'] = $opportunity_no;
		}

		//start creating query array
		//$q = array();

		//print_r($q)

		$sharecriteria = new MongoRegex('/'.Auth::user()->email.'/i');

		$permissions = Auth::user()->permissions;

		if( Auth::user()->role == 'root' ||
			Auth::user()->role == 'super' ||
			Auth::user()->role == 'president_director' ||
			Auth::user()->role == 'bod'
			){
				if(!is_null($type)){
					if($type == 'general'){
						$q = array(
							'access'=>$type,
							'$or'=>array(
									array('deleted'=>false),
									array('deleted'=>array('$exists'=>false))
							)
						);
					}else{
						$q = array(
							'docDepartment' => $type,
							'$or'=>array(
									array('deleted'=>false),
									array('deleted'=>array('$exists'=>false))
							)
						);
					}
				}

		}else if( Auth::user()->role == 'super' ||
			Auth::user()->role == 'operations_director' ||
			Auth::user()->role == 'finance_hr_director' ||
			Auth::user()->role == 'bod'
		){

			if(!is_null($type)){
				if($type == 'general'){
					$q = array(
						'access'=>$type,
						'$or'=>array(
								array('deleted'=>false),
								array('deleted'=>array('$exists'=>false))
						)
					);
				}else{
					$q = array(
						'docDepartment' => $type,
						'$or'=>array(
								array('deleted'=>false),
								array('deleted'=>array('$exists'=>false))
						)
					);
				}
			}

		}else if( Auth::user()->role == 'client' ||
			Auth::user()->role == 'principal_vendor' ||
			Auth::user()->role == 'subcon'){

			if(!is_null($type)){
				if($type == 'general'){
					$q = array('access'=>$type);
				}else{
					$q = array(
						'docDepartment' => trim($type),
						'$or'=>array(
								array('docShare'=>$sharecriteria),
								array('creatorId'=>Auth::user()->id),
								array('deleted'=>false),
								array('deleted'=>array('$exists'=>false))
						)
					);
				}
			}

		}else{

			if(!is_null($type)){
				if($type == 'general'){
					$q = array(
						'access'=>$type,
						'$or'=> array(
							array('deleted'=>false),
							array('deleted'=>array('$exists'=>false))
						)
					);

				}else{

					if(Auth::user()->department == $type){

						$q = array(
							'docDepartment' => trim($type),
							'deleted'=>false,
							'$or'=>array(
									array('access'=>'departmental'),
									array('docShare'=>$sharecriteria),
									array('creatorId'=>Auth::user()->id),
									array('deleted'=>array('$exists'=>false))
							)
						);

					}else if($permissions->{$type}->read == 1){

						$q = array(
							'docDepartment' => trim($type),
							'deleted'=>false,
							'access'=>'departmental'
							//'$or'=>array(
									//array('access'=>'departmental'),
									//array('docShare'=>$sharecriteria),
									//array('creatorId'=>Auth::user()->id),
									//array('deleted'=>array('$exists'=>false))
							//)
						);


					}else{
						$q = array(
                                'docDepartment' => trim($type),
                                'docShare'=>$sharecriteria,
                                '$or'=> array(
								    array('deleted'=>0),
								    array('deleted'=>array('$exists'=>0))
                                )
							);

					}


				}
			}

		}



		$document = new Document();

		/* first column is always sequence number, so must be omitted */
		$fidx = Input::get('iSortCol_0');
		if($fidx == 0){
			$fidx = $defsort;
			$sort_col = $fields[$fidx];
			$sort_dir = $defdir;
		}else{
			$fidx = ($fidx > 0)?$fidx - 1:$fidx;
			$sort_col = $fields[$fidx];
			$sort_dir = (Input::get('sSortDir_0') == 'asc')?1:-1;
		}

		$count_all = $document->count();

		if(count($sq) > 0){
			$q = array_merge($sq,$q);
		}

		if($searchCategory != 'all'){
			$q['docCategory'] = $searchCategory;
		}

        //print_r($q);

		if(count($q) > 0){
			$documents = $document->find($q,array(),array($sort_col=>$sort_dir),$limit);
			$count_display_all = $document->count($q);
		}else{
			$documents = $document->find(array(),array(),array($sort_col=>$sort_dir),$limit);
			$count_display_all = $document->count();
		}


        //print_r($documents);

		$aadata = array();

		$counter = 1 + $pagestart;
		foreach ($documents as $doc) {


			if(isset($doc['tags']) && is_array($doc['tags']) && implode('',$doc['tags']) != ''){
				$tags = array();

				foreach($doc['tags'] as $t){
					$tags[] = '<span class="tagitem">'.$t.'</span>';
				}

				$tags = implode('',$tags);

			}else{
				$tags = '';
			}

			$doc['title'] = str_ireplace($hilite, $hilite_replace, $doc['title']);
			$doc['creatorName'] = str_ireplace($hilite, $hilite_replace, $doc['creatorName']);

			if(isset($doc['expiring']) && isset($doc['alert']) && $doc['alert'] == 'Yes'){

				if($doc['expiring'] == 'Today'){
					$doc['expiring'] = '<span class="expiring now">'.$doc['expiring'].'</span>';
				}elseif($doc['expiring'] < 0){
					$doc['expiring'] = '<span class="expiring yesterday">'.abs($doc['expiring']).' day(s) ago</span>';
				}elseif($doc['expiring'] != false){
					$doc['expiring'] = '<span class="expiring">'.$doc['expiring'].' day(s)</span>';
				}else{
					$doc['expiring'] = '';
				}

			}else{

				$doc['expiring'] = '';
			}

			if($doc['creatorId'] == Auth::user()->id ||
									Auth::user()->role == 'root' ||
									Auth::user()->role == 'super' ||
									Auth::user()->role == 'president_director' ||
									Auth::user()->role == 'bod'
				){
				$edit = '<a href="'.URL::to('document/edit/'.$doc['_id'].'/'.$type).'">'.
						'<i class="foundicon-edit action has-tip tip-bottom noradius" title="Edit"></i></a>&nbsp;';
                $move = '<i class="foundicon-folder action move has-tip tip-bottom noradius" title="Move Doc" id="'.$doc['_id'].'"></i>';
				$del = '<i class="foundicon-trash action del has-tip tip-bottom noradius" title="Delete" id="'.$doc['_id'].'"></i>';
				$download = '<a href="'.URL::to('document/download/'.$doc['_id'].'/'.$type).'">'.
							'<i class="foundicon-inbox action has-tip tip-bottom noradius" title="Download"></i></a>&nbsp;';
			}else{

				if(isset($doc['interaction']) && $doc['interaction'] == 'rw'){
					if($permissions->{$type}->edit == 1){
						$edit = '<a href="'.URL::to('document/edit/'.$doc['_id'].'/'.$type).'">'.
								'<i class="foundicon-edit action has-tip tip-bottom noradius" title="Edit"></i></a>&nbsp;';
					}else{
						$edit = '';
					}

					if($permissions->{$type}->delete == 1){
						$del = '<i class="foundicon-trash action  has-tip tip-bottom noradius del" title="Delete" id="'.$doc['_id'].'"></i>';
					}else{
						$del = '';
					}

					if(isset($permissions->{$type}->download) && $permissions->{$type}->download == 1){
						$download = '<a href="'.URL::to('document/download/'.$doc['_id'].'/'.$type).'">'.
								'<i class="foundicon-inbox action has-tip tip-bottom noradius" title="Download"></i></a>&nbsp;';
					}else{
						$download = '';
					}
				}else{
					$edit = '';
					$del = '';
					$download = '';
				}

			}

			$aadata[] = array(
				$counter,
				'<input type="checkbox" value="'.$doc['_id'].'" class="selector" > <span class="metaview" id="'.$doc['_id'].'">'.$doc['title'].'</span>',
				date('d-m-Y H:i:s', $doc['createdDate']->sec),
				(isset($doc['lastUpdate']) && $doc['lastUpdate'] != '')?date('d-m-Y H:i:s', $doc['lastUpdate']->sec):'',
				//(isset($doc['expiryDate']) && $doc['expiryDate'] != '')?date('d-m-Y', $doc['expiryDate']->sec):'',
				//(isset($doc['alert']) && $doc['alert'] == 'Yes')?$doc['expiring']:'',
				//$doc['creatorName'],
				ucfirst( se($doc['access']) ),
                (is_array($doc['sharedEmails']))?implode('<br />',$doc['sharedEmails']):$doc['sharedEmails'],
				isset($doc['docCategoryLabel'])?ucfirst($doc['docCategoryLabel']):'-',
				isset($doc['docFilename'])?'<span class="fileview has-tip tip-bottom noradius" "title"="'.$doc['docFilename'].'" id="'.$doc['_id'].'">'.breaksentence($doc['docFilename'],25).'</span>':'',
				$tags,
				$edit.$move.$download.$del
				/*
				'<a href="'.URL::to('document/edit/'.$doc['_id'].'/'.$type).'">'.
				'<i class="foundicon-edit action"></i></a>&nbsp;'.
				'<i class="foundicon-trash action del" id="'.$doc['_id'].'"></i>'
				*/
			);
			$counter++;
		}


		$result = array(
			'sEcho'=> Input::get('sEcho'),
			'iTotalRecords'=>$count_all,
			'iTotalDisplayRecords'=> $count_display_all,
			'aaData'=>$aadata,
			'qrs'=>$q
		);

		return Response::json($result);
	}


	public function get_download($id, $type = null){

		$this->crumb = new Breadcrumb();


		if(is_null($type)){
			$this->crumb->add('document','Document');

		}else{

			$this->crumb->add('document/type/'.$type,'Document');
			$this->crumb->add('document/type/'.$type,depttitle($type));
		}

		$this->crumb->add('document/download/'.$id.'/'.$type,'Download Request',false);


		$_id = new MongoId($id);


		$document = new Document();

		$doc = $document->get(array('_id'=>$_id));

		$this->crumb->add('document/download/'.$id.'/'.$type,$doc['title'],false);

		$path = Config::get('parama.storage').$id.'/'.$doc['docFilename'];


		$form = new Formly();
		return View::make('document.downloadrequest')
					->with('form',$form)
					->with('docnumber',0)
					->with('profile',$doc)
					->with('crumb',$this->crumb)
					->with('title','Document Download Request');

	}

	public function post_download($id,$type = null){
		$_id = new MongoId($id);

		$document = new Document();

		$doc = $document->get(array('_id'=>$_id));

		$path = Config::get('parama.storage').$id.'/'.$doc['docFilename'];

		if(file_exists($path)){

			$filename = $doc['docFilename'];

			$ext = File::extension($path);

			$dlobj = array(
				'dltype'=>'document',
				'document'=>$doc,
				'downloader'=>Auth::user(),
				'downloadedfullfilename'=>$filename,
				'downloadedfilename'=>$filename,
				'downloadedfileext'=>$ext,
				'templatename'=>$doc['title'],
				'doc_number'=>0,
				'timestamp'=>new MongoDate()
			);

			$dlog = new Download();
			$dlog->insert($dlobj);


			return Response::download($path, $filename);
		}else{
			Event::fire('document.download',array('id'=>$id,'result'=>'FILENOTFOUND'));
			return Redirect::to('document/download/'.$id.'/'.$type)->with('notify_success','Document attachment does not exist');
		}

	}



	public function get_dl($id){
		$_id = new MongoId($id);

		$document = new Document();

		$doc = $document->get(array('_id'=>$_id));

		$path = Config::get('parama.storage').$id.'/'.$doc['docFilename'];

		if(file_exists($path)){
			Event::fire('document.download',array('id'=>$id,'result'=>'OK'));
			$filename = $doc['docFilename'];

			$dlobj = array(
				'dltype'=>'document',
				'document'=>$doc,
				'downloader'=>Auth::user(),
				'downloadedfullfilename'=>$filename.'.'.$ext,
				'downloadedfilename'=>$filename,
				'downloadedfileext'=>$ext,
				'templatename'=>'',
				'doc_number'=>'',
				'timestamp'=>new MongoDate()
			);

			$dlog = new Download();
			$dlog->insert($dlobj);

			return Response::download($path, $filename);
		}else{
			Event::fire('document.download',array('id'=>$id,'result'=>'FILENOTFOUND'));
			return false;
		}

	}

	public function get_view($id){
		$id = new MongoId($id);

		$document = new Document();

		$doc = $document->get(array('_id'=>$id));

		return View::make('pop.docview')->with('profile',$doc);
	}

    public function get_movedoc($id,$type){
        $_id = new MongoId($id);

        $document = new Document();

        $doc = $document->get(array('_id'=>$_id));

        $category = $this->getCategory($type);

        $form = new Formly($doc);

        return View::make('pop.movedoc')
            ->with('profile',$doc)
            ->with('form',$form)
            ->with('category',$category)
            ->with('ajaxpost','document/movedoc/'.$id);
    }

	public function get_cover($id){
		$id = new MongoId($id);

		$document = new Document();

		$doc = $document->get(array('_id'=>$id));

		return View::make('pop.doccover')->with('profile',$doc);
	}

	public function get_printcover($id){
		$id = new MongoId($id);

		$document = new Document();

		$doc = $document->get(array('_id'=>$id));

		return View::make('document.printcover')->with('profile',$doc);
	}

	public function get_fileview($id){
		$_id = new MongoId($id);

		$document = new Document();

		$doc = $document->get(array('_id'=>$_id));

		//$file = URL::to(Config::get('parama.storage').$id.'/'.$doc['docFilename']);

		//$file = URL::base().'/storage/'.$id.'/'.$doc['docFilename'];

		$realfile = realpath(Config::get('kickstart.storage').'/'.$id.'/'.$doc['docFilename']);

		$poppage = 'pop.fileview';

		if(file_exists($realfile)){
			$file = URL::base().'/storage/'.$id.'/'.$doc['docFilename'];
			//$file = URL::base().'/document/stream/'.$id;
			$ext = File::extension($realfile);
			if($ext == 'pdf'){
				$pagepath = str_replace('.'.$ext, '', $realfile);

				if(File::exists($pagepath) == false){
					File::mkdir($pagepath);
					$cmd = pdf2images($realfile,$pagepath);
				}

				$pages = getpages($pagepath);
				$doc['pages'] = $pages;
				$doc['pagepath'] = str_replace('.'.$ext, '', $file);
				$poppage = 'pop.galleryview';

			}else if(in_array($ext, Config::get('kickstart.googledocext'))){
				if(Config::get('kickstart.usegoogleviewer') == 'true'){
					$file = 'https://docs.google.com/viewer?embedded=true&url='.$file;
				}
			}

			if(in_array($ext, Config::get('kickstart.noviewer'))){
				$file = URL::base().'/document/noviewer';
			}

		}else{
			$file = URL::base().'/document/notfound';
		}

		return View::make($poppage)->with('doc',$doc)->with('href',$file);
	}

	public function get_approve($id){
		$id = new MongoId($id);

		$document = new Document();

		$doc = $document->get(array('_id'=>$id));

		$form = new Formly();

		$realfile = realpath(Config::get('kickstart.storage').'/'.$id.'/'.$doc['docFilename']);

		if(file_exists($realfile)){
			$file = URL::base().'/storage/'.$id.'/'.$doc['docFilename'];
			//$file = URL::base().'/document/stream/'.$id;
			$ext = File::extension($realfile);
			if(in_array($ext, Config::get('kickstart.googledocext'))){
				if(Config::get('kickstart.usegoogleviewer') == 'true'){
					$file = 'https://docs.google.com/viewer?embedded=true&url='.$file;
				}
			}

			if(in_array($ext, Config::get('kickstart.noviewer'))){
				$file = URL::base().'/document/noviewer';
			}

		}else{
			$file = URL::base().'/document/notfound';
		}


		return View::make('pop.approval')->with('doc',$doc)->with('form',$form)->with('href',$file)
			->with('ajaxpost','document/approve');
	}

	public function get_notfound()
	{

		return View::make('pop.notfound');
	}

	public function get_noviewer()
	{

		return View::make('pop.noviewer');
	}

	public function get_stream($id)
	{

		$id = new MongoId($id);

		$document = new Document();

		$doc = $document->get(array('_id'=>$id));

		$form = new Formly();

		$realfile = realpath(Config::get('kickstart.storage').'/'.$id.'/'.$doc['docFilename']);

		if(file_exists($realfile)){
			$file = URL::base().'/storage/'.$id.'/'.$doc['docFilename'];

			$tmp = file_get_contents($realfile);

		    if ( headers_sent()) {
		      die("Unable to stream file: headers already sent");
		    }

		    $contenttype = system("file -I -b ".escapeshellarg($realfile));;
		    $contentsize = File::size($realfile);

		    header('Cache-Control: private');
		    header('Content-type: '.$contenttype);

		    //FIXME: I don't know that this is sufficient for determining content length (i.e. what about transport compression?)
		    header('Content-Length: '.$contentsize );
		    //$fileName = (isset($options['Content-Disposition']) ?  $options['Content-Disposition'] :  'file.pdf');

		    header('Content-Disposition: inline; filename="'.$doc['docFilename'].'"');
			//header("Accept-Ranges: " . $contentsize);

		    /*
		    if (isset($options['Accept-Ranges']) && $options['Accept-Ranges'] == 1) {
		      //FIXME: Is this the correct value ... spec says 1#range-unit
		      header("Accept-Ranges: " . mb_strlen($tmp, '8bit'));
		    }
		    */

		    echo $tmp;
		    flush();

		}else{
			return View::make('pop.notfound');
		}

	}


	public function get_forward($id){
		$id = new MongoId($id);

		$document = new Document();

		$doc = $document->get(array('_id'=>$id));

		$form = new Formly();

		$file = URL::base().'/storage/'.$id.'/'.$doc['docFilename'];

		return View::make('pop.forwarder')->with('doc',$doc)->with('form',$form)->with('href',$file)->with('ajaxpost','document/forward');
	}

	public function post_forward(){

		$response = Input::all();

		$_id = new MongoId($response['docid']);

		$users = new User();

		$user = $users->get(array('email'=>trim($response['fwdto'])));

		$doc = new Document();

		$now = new MongoDate();


		$res1['approvalResponds'] = array(
				'approval'=>'transfer',
				'transferedTo'=>$user['_id'],
				'approverId'=>Auth::user()->id,
				'approverEmail'=>Auth::user()->email,
				'approvalDate'=>$now,
				'approvalNote'=>$response['note']
			);



		$res2['approvalRequestIds'] = array(
				'_id'=>$user['_id'],
				'fullname'=>$user['fullname']
			);

		$res3['approvalRequestEmails'] = trim($response['fwdto']);

		//print_r($res);

		if($document = $doc->update(array('_id'=>$_id),array('$push'=>$res1),array('upsert'=>true))){

			$doc->update(array('_id'=>$_id),array('$push'=>$res2),array('upsert'=>true));

			$doc->update(array('_id'=>$_id),array('$push'=>$res3),array('upsert'=>true));

			$docobj = $doc->get(array('_id'=>$_id));

			//print_r($document);

			$docApprovalRequest = $docobj['docApprovalRequest'].','.trim($response['fwdto']);

			$set = array('docApprovalRequest'=>$docApprovalRequest);

			$doc->update(array('_id'=>$_id),array('$set'=>$set),array('upsert'=>true));

			return Response::json(array('status'=>'OK','doc'=>$document));
		}else{
			return Response::json(array('status'=>'FAILED'));
		}

	}

	public function post_approve(){

		$response = Input::all();

		$_id = new MongoId($response['docid']);

		$doc = new Document();

		$users = new User();

		$user = $users->get(array('email'=>trim($response['fwdto'])));

	    if (  Hash::check($response['pass'], Auth::user()->pass)){

			$now = new MongoDate();

			$res['approvalResponds'] = array(
					'approval'=>$response['approval'],
					'approverId'=>Auth::user()->id,
					'approverEmail'=>Auth::user()->email,
					'approverName'=>Auth::user()->fullname,
					'approverInitial'=>Auth::user()->initial,
					'approvalDate'=>$now,
					'approvalNote'=>$response['note'],
					'approvalTransfer'=>$response['fwdto']
				);

			$docobj = $doc->get(array('_id'=>$_id));

			$already_responded = false;

			if(isset($docobj['approvalResponds'])){
				foreach($docobj['approvalResponds'] as $responses){
					if($responses['approverEmail'] == Auth::user()->email && $responses['approverId'] == Auth::user()->id){
						$already_responded = true;
					}
				}
			}

			if($already_responded == true){
				return Response::json(array('status'=>'ALREADY'));
			}

			if($response['approval'] == 'transfer'){
				$users = new User();

				$user = $users->get(array('email'=>trim($response['fwdto'])));

				$res2['approvalRequestIds'] = array(
						'_id'=>$user['_id'],
						'fullname'=>$user['fullname']
					);

				$res3['approvalRequestEmails'] = trim($response['fwdto']);

				$doc->update(array('_id'=>$_id),array('$push'=>$res2),array('upsert'=>true));

				$doc->update(array('_id'=>$_id),array('$push'=>$res3),array('upsert'=>true));


				//print_r($document);

				$docApprovalRequest = $docobj['docApprovalRequest'].','.trim($response['fwdto']);

				$set = array('docApprovalRequest'=>$docApprovalRequest);

				$doc->update(array('_id'=>$_id),array('$set'=>$set),array('upsert'=>true));

			}

			if($document = $doc->update(array('_id'=>$_id),array('$addToSet'=>$res),array('upsert'=>true))){
				return Response::json(array('status'=>'OK'));
			}else{
				return Response::json(array('status'=>'FAILED'));
			}


		}else{
				return Response::json(array('status'=>'AUTHFAILED'));
		}



	}

    public function post_movedoc($id){

        $response = Input::all();

        $_id = new MongoId($id);

        unset($response['csrf_token']);

        $doc = new Document();

        if($document = $doc->update(array('_id'=>$_id),array('$set'=>$response),array('upsert'=>true))){
            return Response::json(array('status'=>'OK'));
        }else{
            return Response::json(array('status'=>'FAILED'));
        }

        //return Response::json(array( 'status'=>$response ));

    }


	private function getCategory($type = null){

		$permissions = Auth::user()->permissions;

		if(is_null($type)){
			$category = false;
			//$category = json_encode(Config::get('category.all'));
		}else{
			$therole = Auth::user()->role;

			if($type == 'president_director'){

				$types = Config::get('parama.department');
				$types = array_keys($types);

				$fullarray = array();

				foreach ($types as $t) {
					$nodisplay = ($t == 'finance_hr_director' || $t == 'operations_director')?true:false;

					if(file_exists('public/yml/'.$t.'.yml') && $nodisplay == false){
						$parsed = Yaml::from_file('public/yml/'.$t.'.yml')->to_array();
						$parent = array('label'=>depttitle($t),'id'=>'parent','children'=>$parsed);
						$fullarray[] = $parent;
					}
				}

				$all = array('label'=>'All','id'=>'all');

				array_unshift($fullarray, $all);

				$category = json_encode($fullarray);


			}else if($type == 'operations_director'){

				$types = Config::get('parama.department');
				$types = array_keys($types);

				$fullarray = array();

				foreach ($types as $t) {
					$nodisplay = ($t == 'finance_hr_director' || $t == 'finance_balikpapan' || $t == 'finance_pusat' || $t == 'hr_admin')?true:false;

					if(file_exists('public/yml/'.$t.'.yml') && $nodisplay == false){
						$parsed = Yaml::from_file('public/yml/'.$t.'.yml')->to_array();
						$parent = array('label'=>depttitle($t),'id'=>'parent','children'=>$parsed);
						$fullarray[] = $parent;
					}
				}

				$all = array('label'=>'All','id'=>'all');

				array_unshift($fullarray, $all);

				$category = json_encode($fullarray);

			}else{

				if(file_exists('public/yml/'.$type.'.yml')){
					$parsed = Yaml::from_file('public/yml/'.$type.'.yml')->to_array();

					$all = array('label'=>'All','id'=>'all');

					array_unshift($parsed, $all);

					$category = json_encode($parsed);
				}else{
					$category = json_encode(Config::get('category.'.$type));
				}

			}

		}

		return $category;
	}

}