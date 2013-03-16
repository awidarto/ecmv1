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

		$heads = array('#','Title','Created','Last Update','Expiry Date','Expiring In','Creator','Access','Attachment','Is Template','Tags','Action');
		$searchinput = array(false,'title','created','last update','expiry date','expiring','creator','access','filename','useAsTemplate','tags',false);

		$title = 'Document Library';

		if(Auth::user()->role == 'root' || Auth::user()->role == 'super'){
			return View::make('tables.simple')
				->with('title',$title)
				->with('newbutton','New Document')
				->with('disablesort','0,5,6')
				->with('addurl','document/add')
				->with('searchinput',$searchinput)
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

		$fields = array('title','createdDate','lastUpdate','expiryDate','expiring','creatorName','access','docFilename','useAsTemplate','docTag');

		$rel = array('like','like','like','like','like','like','like','like','like','like');

		$cond = array('both','both','both','both','both','both','both','both','both','both');

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
			if(isset($doc['tags'])){
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
				$doc['expiring'] = ($doc['expiring'] < Config::get('parama.expiration_alert_days') && $doc['expiring'] > 0)?'<span class="expiring">'.$doc['expiring'].' day(s)</span>':'';
			}else{
				$doc['expiring'] = '';
			}

			$aadata[] = array(
				$counter,
				'<span class="metaview" id="'.$doc['_id'].'">'.$doc['title'].'</span>',
				date('Y-m-d H:i:s', $doc['createdDate']->sec),
				isset($doc['lastUpdate'])?date('Y-m-d H:i:s', $doc['lastUpdate']->sec):'',
				isset($doc['expiryDate'])?date('Y-m-d', $doc['expiryDate']->sec):'',
				$doc['expiring'],
				$doc['creatorName'],
				isset($doc['access'])?ucfirst($doc['access']):'',
				isset($doc['docFilename'])?'<span class="fileview" id="'.$doc['_id'].'">'.$doc['docFilename'].'</span>':'',
				isset($doc['useAsTemplate'])?$doc['useAsTemplate']:'No',
				$tags,
				'<a href="'.URL::to('document/edit/'.$doc['_id']).'"><i class="foundicon-edit action"></i></a>&nbsp;'.
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

	public function post_del(){
		$id = Input::get('id');

		$user = new Document();

		if(is_null($id)){
			$result = array('status'=>'ERR','data'=>'NOID');
		}else{

			$id = new MongoId($id);


			if($user->delete(array('_id'=>$id))){
				Event::fire('document.delete',array('id'=>$id,'result'=>'OK'));
				$result = array('status'=>'OK','data'=>'CONTENTDELETED');
			}else{
				Event::fire('document.delete',array('id'=>$id,'result'=>'FAILED'));
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

		$templates = array();
		$templates['none'] = 'None';
		foreach($template as $t){
			$templates[$t['_id']->__toString()] = $t['title'];
		}


		$form = new Formly();
		return View::make('document.new')
					->with('form',$form)
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

			$data['effectiveDate'] = new MongoDate(strtotime($data['effectiveDate']." 00:00:00"));
			$data['expiryDate'] = new MongoDate(strtotime($data['expiryDate']." 00:00:00"));

			$data['expiring'] = 0;

			$data['createdDate'] = new MongoDate();
			$data['lastUpdate'] = new MongoDate();
			$data['creatorName'] = Auth::user()->fullname;
			$data['creatorId'] = Auth::user()->id;

			$data['useAsTemplate'] = (isset($data['useAsTemplate']))?$data['useAsTemplate']:'No';

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

		$doc_data['effectiveDate'] = date('d-m-Y', $doc_data['effectiveDate']->sec);
		$doc_data['expiryDate'] = date('d-m-Y', $doc_data['expiryDate']->sec);

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


		$form = Formly::make($doc_data);

		return View::make('document.edit')
					->with('doc',$doc_data)
					->with('templates',$templates)
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

			$data['effectiveDate'] = new MongoDate(strtotime($data['effectiveDate']." 00:00:00"));
			$data['expiryDate'] = new MongoDate(strtotime($data['expiryDate']." 00:00:00"));
			$data['lastUpdate'] = new MongoDate();

			if(isset($data['expiring'])){
				$data['expiring'] = ($data['expiring'] == '')?0:$data['expiring'];
			}else{
				$data['expiring'] = 0;
			}

			unset($data['csrf_token']);

			$docId = $data['id'];
			unset($data['id']);

			if(isset($data['useAsTemplate']) && $data['useAsTemplate'] == 'Yes' && ($data['oldTemplateName'] != $data['templateName'] || $data['oldTemplateName'] == '')){
				$templatename = trim(strtolower($data['templateName']));
				$startFrom = ($data['templateNumberStart'] == '')?1:$data['templateNumberStart'];
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
					foreach($sharedto as $to){
						Event::fire('document.share',array('id'=>$id,'sharer_id'=>Auth::user()->id,'shareto'=>$to));
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

		$heads = array('#','Title','Created','Last Update','Expiry Date','Expiring In','Creator','Access','Attachment','Tags','Action');
		$searchinput = array(false,'title','created','last update','exoiry date','expiring','creator','access','filename','tags',false);

		$dept = Config::get('parama.department');

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
			Auth::user()->role == 'super' ||
			Auth::user()->role == 'president_director' ||
			Auth::user()->role == 'bod'
			){

			// these roles are super users

			$can_open = true;

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

			if($shared > 0 || $created > 0){
				$can_open = true;
			}
		}

		$permissions = Auth::user()->permissions;

		//print_r($permissions);

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
				->with('addurl',$addurl)
				->with('searchinput',$searchinput)
				->with('ajaxsource',URL::to('document/type/'.$type))
				->with('ajaxdel',URL::to('document/del'))
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

		$fields = array('title','createdDate','lastUpdate','expiryDate','creatorName','docFilename','docTag');

		$rel = array('like','like','like','like','like','like','like');

		$cond = array('both','both','both','both','both','both','both');

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
		if(!is_null($type)){
			$q['docDepartment'] = $type;
		}

		$sharecriteria = new MongoRegex('/'.Auth::user()->email.'/i');

		if( Auth::user()->role == 'root' ||
			Auth::user()->role == 'super' ||
			Auth::user()->role == 'president_director' ||
			Auth::user()->role == 'bod'
			){


		}else if( Auth::user()->role == 'client' ||
			Auth::user()->role == 'principal_vendor' ||
			Auth::user()->role == 'subcon'){

			$q['$or'] = array(
				array('creatorId'=>Auth::user()->id),
				array('docShare'=>$sharecriteria)
			);

		}else{

			if(Auth::user()->department == $type){
				$q['$or'] = array(
					array('access'=>'general'),
					array('docShare'=>$sharecriteria)
				);
			}else{
				$q['docShare'] = $sharecriteria;
			}
		}


		$permissions = Auth::user()->permissions;

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


			if(isset($doc['tags'])){
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
				$doc['expiring'] = ($doc['expiring'] < Config::get('parama.expiration_alert_days') && $doc['expiring'] > 0)?'<span class="expiring">'.$doc['expiring'].' day(s)</span>':'';
			}else{
				$doc['expiring'] = '';
			}

			if($doc['creatorId'] == Auth::user()->id || $doc['docDepartment'] == Auth::user()->department){
				$edit = '<a href="'.URL::to('document/edit/'.$doc['_id'].'/'.$type).'">'.
						'<i class="foundicon-edit action has-tip tip-bottom noradius" title="Edit"></i></a>&nbsp;';
				$del = '<i class="foundicon-trash action del has-tip tip-bottom noradius" title="Delete" id="'.$doc['_id'].'"></i>';
				$download = '<a href="'.URL::to('document/dl/'.$doc['_id'].'/'.$type).'">'.
							'<i class="foundicon-inbox action has-tip tip-bottom noradius" title="Download"></i></a>&nbsp;';
			}else{
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
					$download = '<a href="'.URL::to('document/dl/'.$doc['_id'].'/'.$type).'">'.
							'<i class="foundicon-inbox action has-tip tip-bottom noradius" title="Download"></i></a>&nbsp;';
				}else{
					$download = '';
				}

			}

			$aadata[] = array(
				$counter,
				'<span class="metaview" id="'.$doc['_id'].'">'.$doc['title'].'</span>',
				date('Y-m-d H:i:s', $doc['createdDate']->sec),
				isset($doc['lastUpdate'])?date('Y-m-d H:i:s', $doc['lastUpdate']->sec):'',
				isset($doc['expiryDate'])?date('Y-m-d', $doc['expiryDate']->sec):'',
				$doc['expiring'],
				$doc['creatorName'],
				isset($doc['access'])?ucfirst($doc['access']):'',
				isset($doc['docFilename'])?'<span class="fileview" id="'.$doc['_id'].'">'.$doc['docFilename'].'</span>':'',
				$tags,
				$edit.$download.$del
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


	public function get_dl($id){
		$_id = new MongoId($id);

		$document = new Document();

		$doc = $document->get(array('_id'=>$_id));

		$path = Config::get('parama.storage').$id.'/'.$doc['docFilename'];

		if(file_exists($path)){
			Event::fire('document.update',array('id'=>$id,'result'=>'OK'));
			$filename = $doc['docFilename'];
			return Response::download($path, $filename);
		}else{
			Event::fire('document.update',array('id'=>$id,'result'=>'FILENOTFOUND'));
			return false;
		}

	}

	public function get_view($id){
		$id = new MongoId($id);

		$document = new Document();

		$doc = $document->get(array('_id'=>$id));

		return View::make('pop.docview')->with('profile',$doc);
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

		if(file_exists($realfile)){
			$file = URL::base().'/storage/'.$id.'/'.$doc['docFilename'];
			//$file = URL::base().'/document/stream/'.$id;			
			$ext = File::extension($realfile);
			if(in_array($ext, Config::get('kickstart.googledocext'))){
				if(Config::get('kickstart.usegoogleviewer') == 'true'){
					$file = 'https://docs.google.com/viewer?embedded=true&url='.$file;
				}
			}

		}else{
			$file = URL::base().'/document/notfound';
		}

		return View::make('pop.fileview')->with('doc',$doc)->with('href',$file);
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

		}else{
			$file = URL::base().'/document/notfound';
		}


		return View::make('pop.approval')->with('doc',$doc)->with('form',$form)->with('href',$file)->with('ajaxpost','document/approve');
	}

	public function get_notfound()
	{

		return View::make('pop.notfound');
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

				$docobj = $doc->get(array('_id'=>$_id));

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

}