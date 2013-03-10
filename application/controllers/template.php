<?php

class Template_Controller extends Base_Controller {

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
		$this->crumb->add('template','Document Template');

		date_default_timezone_set('Asia/Jakarta');
		$this->filter('before','auth');
	}

	public function get_index()
	{
		$this->crumb->add('template','Template');

		//print_r(Auth::user());

		$heads = array('#','Title','Created','Last Update','Creator','Access','Attachment','Tags','Action');
		$searchinput = array(false,'title','created','last update','creator','access','filename','tags',false);

		if(Auth::user()->role == 'root' || Auth::user()->role == 'super' || Auth::user()->role == 'root'){
			$addurl = 'template/add';
		}else{
			$addurl = '';
		}

		return View::make('tables.simple')
			->with('title','Document Template')
			->with('newbutton','New Document')
			->with('disablesort','0,5,6')
			->with('addurl',$addurl)
			->with('searchinput',$searchinput)
			->with('ajaxsource',URL::to('template'))
			->with('ajaxdel',URL::to('template/del'))
			->with('crumb',$this->crumb)
			->with('heads',$heads);

	}

	public function post_index()
	{
		$type = 'template';

		$fields = array('title','createdDate','lastUpdate','creatorName','access','docFilename','docTag');

		$rel = array('like','like','like','like','like','like','like');

		$cond = array('both','both','both','both','both','both','both');

		$pagestart = Input::get('iDisplayStart');
		$pagelength = Input::get('iDisplayLength');

		$limit = array($pagelength, $pagestart);

		$defsort = 1;
		$defdir = -1;

		$idx = 0;
		$q = array();

		//$q['docDepartment'] = 'template';
		$q['useAsTemplate'] = 'Yes';


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
		$permissions = Auth::user()->permissions;

		$template = new Document();

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

		$count_all = $template->count();

		if(count($q) > 0){
			$templates = $template->find($q,array(),array($sort_col=>$sort_dir),$limit);
			$count_display_all = $template->count($q);
		}else{
			$templates = $template->find(array(),array(),array($sort_col=>$sort_dir),$limit);
			$count_display_all = $template->count();
		}

		$aadata = array();

		$counter = 1 + $pagestart;
		foreach ($templates as $doc) {
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

			if($doc['creatorId'] == Auth::user()->id || $doc['docDepartment'] == Auth::user()->department){
				$edit = '<a href="'.URL::to('template/edit/'.$doc['_id'].'/'.$type).'">'.
						'<i class="foundicon-edit action"></i></a>&nbsp;';
				$download = '<a href="'.URL::to('template/download/'.$doc['_id'].'/'.$type).'">'.
						'<i class="foundicon-download action"></i></a>&nbsp;';
				$del = '<i class="foundicon-trash action del" id="'.$doc['_id'].'"></i>';
			}else{
				if($permissions->{$type}->edit == 1){
					$edit = '<a href="'.URL::to('template/edit/'.$doc['_id'].'/'.$type).'">'.
							'<i class="foundicon-edit action"></i></a>&nbsp;';
				}else{
					$edit = '';
				}

				if($permissions->{$type}->delete == 1){
					$download = '<a href="'.URL::to('template/download/'.$doc['_id'].'/'.$type).'">'.
							'<i class="foundicon-download action"></i></a>&nbsp;';

				}else{
					$download = '';
				}
				if($permissions->{$type}->delete == 1){
					$del = '<i class="foundicon-trash action del" id="'.$doc['_id'].'"></i>';
				}else{
					$del = '';
				}
			}

			// by default everybody can download template

			$download = '<a href="'.URL::to('template/download/'.$doc['_id']).'">'.
					'<i class="foundicon-down-arrow action"></i></a>&nbsp;';

			$aadata[] = array(
				$counter,
				'<span class="metaview" id="'.$doc['_id'].'">'.$doc['title'].'</span>',
				date('Y-m-d H:i:s', $doc['createdDate']->sec),
				isset($doc['lastUpdate'])?date('Y-m-d H:i:s', $doc['lastUpdate']->sec):'',
				$doc['creatorName'],
				isset($doc['access'])?ucfirst($doc['access']):'',
				isset($doc['docFilename'])?'<span class="fileview" id="'.$doc['_id'].'">'.$doc['docFilename'].'</span>':'',
				$tags,
				$download.$edit.$del
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
				Event::fire('template.delete',array('id'=>$id,'result'=>'OK'));
				$result = array('status'=>'OK','data'=>'CONTENTDELETED');
			}else{
				Event::fire('template.delete',array('id'=>$id,'result'=>'FAILED'));
				$result = array('status'=>'ERR','data'=>'DELETEFAILED');
			}
		}

		print json_encode($result);
	}


	public function get_add($type = null){

		if(is_null($type)){
			$this->crumb->add('template/add','New Document');
		}else{
			$this->crumb = new Breadcrumb();
			$this->crumb->add('template/type/'.$type,'Document');

			$this->crumb->add('template/type/'.$type,depttitle($type));
			$this->crumb->add('template/add','New Document');
		}


		$form = new Formly();
		return View::make('template.new')
					->with('form',$form)
					->with('type',$type)
					->with('crumb',$this->crumb)
					->with('title','New Document');

	}

	public function get_download($id){

		$this->crumb = new Breadcrumb();
		
		$this->crumb->add('template','Document Template');

		$this->crumb->add('template/download/'.$id,'Download Request');

		$_id = new MongoId($id);


		$document = new Document();

		$doc = $document->get(array('_id'=>$_id));

		$path = Config::get('parama.storage').$id.'/'.$doc['docFilename'];

		$seq = new Sequence();

		$currseq = $seq->get(array('_id'=>$doc['templateName']));

		$lastseq = $currseq['seq'] - 1;

		//$gseq = $seq->find_and_modify(array('_id'=>$doc['templateName']),array('$inc'=>array('seq'=>1)),array('seq'=>1),array('new'=>true,'upsert'=>true));


		$form = new Formly();
		return View::make('template.downloadrequest')
					->with('form',$form)
					->with('docnumber',$lastseq)
					->with('profile',$doc)
					->with('crumb',$this->crumb)
					->with('title','New Document');

	}

	public function post_download($id){
		$_id = new MongoId($id);

		$document = new Document();

		$doc = $document->get(array('_id'=>$_id));

		$path = Config::get('parama.storage').$id.'/'.$doc['docFilename'];

		if(file_exists($path)){
			$seq = new Sequence();

			$gseq = $seq->find_and_modify(array('_id'=>$doc['templateName']),array('$inc'=>array('seq'=>1)),array('seq'=>1),array('new'=>true,'upsert'=>true));

			$doc_number = str_pad($gseq['seq'], 6, '0', STR_PAD_LEFT);

			$filename = $doc_number.'_'.$doc['templateName'];

			$ext = File::extension($path);

			$dlobj = array(
				'template'=>$doc,
				'downloader'=>Auth::user(),
				'downloadedfullfilename'=>$filename.'.'.$ext,
				'downloadedfilename'=>$filename,
				'downloadedfileext'=>$ext,
				'templatename'=>$doc['templateName'],
				'doc_number'=>$doc_number,
				'timestamp'=>new MongoDate()
			);

			$dlog = new Download();
			$dlog->insert($dlobj);


			return Response::download($path, $filename);
		}else{
			Event::fire('document.update',array('id'=>$id,'result'=>'FILENOTFOUND'));
			return false;
		}

	}

	public function post_add($type = null){

		//print_r(Session::get('permission'));

		//if(is_null($type)){
			$back = 'template';
		//}else{
		//	$back = 'template/type/'.$type;
		//}

		$in = Input::get();

		if($in['useAsTemplate'] == 'Yes'){
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

	    	return Redirect::to('template/add/'.$type)->with_errors($validation)->with_input(Input::all());

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

			$data['docFilename'] = $docupload['name'];

			$data['docFiledata'] = $docupload;

			$data['docFileList'][] = $docupload;

			$data['tags'] = explode(',',$data['docTag']);

			$template = new Document();

			$newobj = $template->insert($data);


			if($newobj){

				if($newobj['useAsTemplate'] == 'Yes'){
					$templatename = trim(strtolower($newobj['templateName']));
					$startFrom = ($newobj['templateNumberStart'] == '')?1:$newobj['templateNumberStart'];
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

				if($docupload['name'] != ''){

					$newid = $newobj['_id']->__toString();

					$newdir = realpath(Config::get('kickstart.storage')).'/'.$newid;

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
						Event::fire('template.share',array('id'=>$newobj['_id'],'sharer_id'=>Auth::user()->id,'shareto'=>$to));
					}
				}

				$approvalby = explode(',',$data['docApprovalRequest']);

				if(count($approvalby) > 0 && $data['docApprovalRequest'] != ''){
					foreach($approvalby as $to){
						Event::fire('request.approval',array('id'=>$newobj['_id'],'approvalby'=>$to));
					}
				}

				Event::fire('template.create',array('id'=>$newobj['_id'],'result'=>'OK','department'=>Auth::user()->department,'creator'=>Auth::user()->id));

		    	return Redirect::to($back)->with('notify_success','Document saved successfully');
			}else{
				Event::fire('template.create',array('id'=>$id,'result'=>'FAILED'));
		    	return Redirect::to($back)->with('notify_success','Document saving failed');
			}

	    }


	}

	public function get_edit($id = null,$type = null){

		if(is_null($type)){
			$this->crumb->add('template/add','Edit',false);
		}else{
			$this->crumb = new Breadcrumb();
			$this->crumb->add('template/type/'.$type,'Document');

			$this->crumb->add('template/type/'.$type,depttitle($type),false);
			$this->crumb->add('template/edit/'.$id,'Edit',false);
		}


		$doc = new Document();

		$id = (is_null($id))?Auth::user()->id:$id;

		$id = new MongoId($id);

		$doc_data = $doc->get(array('_id'=>$id));

		$doc_data['oldTag'] = $doc_data['docTag'];

		$doc_data['effectiveDate'] = date('Y-m-d', $doc_data['effectiveDate']->sec);
		$doc_data['expiryDate'] = date('Y-m-d', $doc_data['expiryDate']->sec);


		if(is_null($type)){
			$this->crumb->add('template/edit/'.$id,$doc_data['title']);
		}else{
			$this->crumb->add('template/edit/'.$id.'/'.$type,$doc_data['title']);
		}

		$doc_data['oldTemplateName'] = $doc_data['templateName'];

		$form = Formly::make($doc_data);

		return View::make('template.edit')
					->with('doc',$doc_data)
					->with('form',$form)
					->with('type',$type)
					->with('crumb',$this->crumb)
					->with('title','Edit Document');

	}


	public function post_edit($id,$type = null){

		//print_r(Session::get('permission'));

		//if(is_null($type)){
			$back = 'template';
		//}else{
		//	$back = 'template/type/'.$type;
		//}

		$in = Input::get();

		if($in['useAsTemplate'] == 'Yes'){
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

	    	return Redirect::to('template/edit/'.$id.'/'.$type)->with_errors($validation)->with_input(Input::all());

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

			if($data['useAsTemplate'] == 'Yes' && ($data['oldTemplateName'] != $data['templateName'])){
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

				$dirname = $docId;

				$dirname = realpath(Config::get('kickstart.storage')).'/'.$dirname;

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

				Event::fire('template.update',array('id'=>$id,'result'=>'OK'));

				$sharedto = explode(',',$data['docShare']);

				if(count($sharedto) > 0  && $data['docShare'] != ''){
					foreach($sharedto as $to){
						Event::fire('template.share',array('id'=>$id,'sharer_id'=>Auth::user()->id,'shareto'=>$to));
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

				Event::fire('template.update',array('id'=>$id,'result'=>'FAILED'));

		    	return Redirect::to($back)->with('notify_success','Document saving failed');
			}

	    }


	}


	public function get_type($type = null)
	{
		$this->crumb = new Breadcrumb();
		$this->crumb->add('template/type/'.$type,'Document');
		$this->crumb->add('template/type/'.$type,depttitle($type));

		$heads = array('#','Title','Created','Last Update','Creator','Access','Attachment','Tags','Action');
		$searchinput = array(false,'title','created','last update','creator','access','filename','tags',false);

		$dept = Config::get('kickstart.department');

		$title = $dept[$type];

		$doc = new Document();

		//check is shared
		$sharecriteria = new MongoRegex('/'.Auth::user()->email.'/i');
		$shared = $doc->count(array('docDepartment'=>$type,'docShare'=>$sharecriteria));

		//check if creator
		$created = $doc->count(array('docDepartment'=>$type,'creatorId'=>Auth::user()->id));

		$permissions = Auth::user()->permissions;

		$can_open = false;

		if(	Auth::user()->role == 'root' ||
			Auth::user()->role == 'super' ||
			Auth::user()->department == $title ||
			$permissions->{$type}->read == true ||
			$shared > 0 ||
			$created > 0
		){
			$can_open = true;
		}

		$can_open = true;

		if( $can_open == true ){


			if($permissions->{$type}->create == 1 || Auth::user()->department == $type ){
				$addurl = 'template/add/'.$type;
			}else{
				$addurl = '';
			}

			return View::make('tables.simple')
				->with('title',$title)
				->with('newbutton','New Document')
				->with('disablesort','0,5,6')
				->with('addurl',$addurl)
				->with('searchinput',$searchinput)
				->with('ajaxsource',URL::to('template/type/'.$type))
				->with('ajaxdel',URL::to('template/del'))
				->with('crumb',$this->crumb)
				->with('heads',$heads);
		}else{
			return View::make('template.restricted')
				->with('crumb',$this->crumb)
				->with('title',$title);
		}

	}

	public function post_type($type = null)
	{

		$fields = array('title','createdDate','lastUpdate','creatorName','docFilename','docTag');

		$rel = array('like','like','like','like','like','like');

		$cond = array('both','both','both','both','both','both');

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

		if(Auth::user()->department == $type){
			$q['$or'] = array(
				array('access'=>'general'),
				array('docShare'=>$sharecriteria)
			);
		}else{
			$q['docShare'] = $sharecriteria;
		}

		$permissions = Auth::user()->permissions;

		$template = new Document();

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

		$count_all = $template->count();

		if(count($q) > 0){
			$templates = $template->find($q,array(),array($sort_col=>$sort_dir),$limit);
			$count_display_all = $template->count($q);
		}else{
			$templates = $template->find(array(),array(),array($sort_col=>$sort_dir),$limit);
			$count_display_all = $template->count();
		}




		$aadata = array();

		$counter = 1 + $pagestart;
		foreach ($templates as $doc) {


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


			if($doc['creatorId'] == Auth::user()->id || $doc['docDepartment'] == Auth::user()->department){
				$edit = '<a href="'.URL::to('template/edit/'.$doc['_id'].'/'.$type).'">'.
						'<i class="foundicon-edit action"></i></a>&nbsp;';
				$download = '<a href="'.URL::to('template/download/'.$doc['_id'].'/'.$type).'">'.
						'<i class="foundicon-download action"></i></a>&nbsp;';
				$del = '<i class="foundicon-trash action del" id="'.$doc['_id'].'"></i>';
			}else{
				if($permissions->{$type}->edit == 1){
					$edit = '<a href="'.URL::to('template/edit/'.$doc['_id'].'/'.$type).'">'.
							'<i class="foundicon-edit action"></i></a>&nbsp;';
				}else{
					$edit = '';
				}

				if($permissions->{$type}->delete == 1){
					$download = '<a href="'.URL::to('template/download/'.$doc['_id'].'/'.$type).'">'.
							'<i class="foundicon-download action"></i></a>&nbsp;';

				}else{
					$download = '';
				}
				if($permissions->{$type}->delete == 1){
					$del = '<i class="foundicon-trash action del" id="'.$doc['_id'].'"></i>';
				}else{
					$del = '';
				}
			}

			$aadata[] = array(
				$counter,
				'<span class="metaview" id="'.$doc['_id'].'">'.$doc['title'].'</span>',
				date('Y-m-d H:i:s', $doc['createdDate']->sec),
				isset($doc['lastUpdate'])?date('Y-m-d H:i:s', $doc['lastUpdate']->sec):'',
				$doc['creatorName'],
				isset($doc['access'])?ucfirst($doc['access']):'',
				isset($doc['docFilename'])?'<span class="fileview" id="'.$doc['_id'].'">'.$doc['docFilename'].'</span>':'',
				$tags,
				$download.$edit.$del
				/*
				'<a href="'.URL::to('template/edit/'.$doc['_id'].'/'.$type).'">'.
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


	public function __get_type($type = null)
	{
		$menutitle = array(
			'opportunity'=>'Opportunity',
			'tender'=>'Tender',
			'commbid'=>'Commercial Bid',
			'proposal'=>'Tech Proposal',
			'techbid'=>'Tech Bid',
			'contract'=>'Contracts',
			'legal'=>'Legal Docs',
			'qc'=>'QA / QC',
			'warehouse'=>'Warehouse'
			);

		$heads = array('#','Title','Created','Creator','Owner','Tags','Action');
		$fields = array('seq','title','created','creator','owner','tags','action');
		$searchinput = array(false,'title','created','creator','owner','tags',false);

		return View::make('tables.simple')
			->with('title',(is_null($type))?'Document - All':'Document - '.$menutitle[$type])
			->with('newbutton','New Document')
			->with('disablesort','0,5,6')
			->with('addurl','template/add')
			->with('searchinput',$searchinput)
			->with('ajaxsource',URL::to('template/type/'.$type))
			->with('ajaxdel',URL::to('template/del'))
			->with('heads',$heads);
	}

	public function __post_type($type = null)
	{
		$fields = array('title','createdDate','creatorName','creatorName','tags');

		$rel = array('like','like','like','like','equ');

		$cond = array('both','both','both','both','equ');

		$idx = 0;
		$q = array();
		foreach($fields as $field){
			if(Input::get('sSearch_'.$idx))
			{
				if($rel[$idx] == 'like'){
					if($cond[$idx] == 'both'){
						$q[$field] = new MongoRegex('/'.Input::get('sSearch_'.$idx).'/');
					}else if($cond[$idx] == 'before'){
						$q[$field] = new MongoRegex('/^'.Input::get('sSearch_'.$idx).'/');
					}else if($cond[$idx] == 'after'){
						$q[$field] = new MongoRegex('/'.Input::get('sSearch_'.$idx).'$/');
					}
				}else if($rel[$idx] == 'equ'){
					$q[$field] = Input::get('sSearch_'.$idx);
				}
			}
			$idx++;
		}

		//print_r($q)

		$template = new Document();

		/* first column is always sequence number, so must be omitted */
		$fidx = Input::get('iSortCol_0');
		$fidx = ($fidx > 0)?$fidx - 1:$fidx;
		$sort_col = $fields[$fidx];
		$sort_dir = (Input::get('sSortDir_0') == 'asc')?1:-1;

		$count_all = $template->count();

		if(count($q) > 0){
			$templates = $template->find($q,array(),array($sort_col=>$sort_dir));
			$count_display_all = $template->count($q);
		}else{
			$templates = $template->find(array(),array(),array($sort_col=>$sort_dir));
			$count_display_all = $template->count();
		}




		$aadata = array();

		$counter = 1;
		foreach ($templates as $doc) {
			$aadata[] = array(
				$counter,
				$doc['title'],
				date('Y-m-d h:i:s',$doc['createdDate']),
				$doc['creatorName'],
				$doc['creatorName'],
				implode(',',$doc['tag']),
				'<i class="foundicon-edit action"></i>&nbsp;<i class="foundicon-trash action"></i>'
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

		print json_encode($result);
	}


	public function get_view($id){
		$id = new MongoId($id);

		$template = new Document();

		$doc = $template->get(array('_id'=>$id));

		return View::make('pop.docview')->with('profile',$doc);
	}

	public function get_fileview($id){
		$_id = new MongoId($id);

		$template = new Document();

		$doc = $template->get(array('_id'=>$_id));

		//$file = URL::to(Config::get('kickstart.storage').$id.'/'.$doc['docFilename']);

		$file = URL::base().'/storage/'.$id.'/'.$doc['docFilename'];

		return View::make('pop.fileview')->with('doc',$doc)->with('href',$file);
	}

	public function get_approve($id){
		$id = new MongoId($id);

		$template = new Document();

		$doc = $template->get(array('_id'=>$id));

		$form = new Formly();

		$file = URL::base().'/storage/'.$id.'/'.$doc['docFilename'];

		return View::make('pop.approval')->with('doc',$doc)->with('form',$form)->with('href',$file);
	}

}