<?php

class Contact_Controller extends Base_Controller {

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

	public function __construct(){
		$this->filter('before','auth');
		$this->crumb = new Breadcrumb();
		$this->crumb->add('contact','Contact',false);
	}


	public function get_vendor()
	{
		$heads = array(
			'#',
			'Company',
			'Street',
			'City',
			'ZIP',
			'Phone',
			'Fax',
			'Email',
			'Website',
			'Action'
		);

		$colclass = array('one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one');
		//$colclass = false;
		//$searchinput = array(false,'title','created','last update','creator','contact manager','tags',false);
		$searchinput = array(
			false,
			'vendorCompany',
			'vendorStreet',
			'vendorCity',
			'vendorZIP',
			'vendorPhone',
			'vendorFax',
			'vendorEmail',
			'vendorWebsite',
			false
		);

		$this->crumb->add('contact/vendor','Vendors');

		return View::make('tables.noaside')
			->with('title','Vendors')
			->with('newbutton','New Vendor')
			->with('disablesort','0,3')
			->with('addurl','contact/vendoradd')
			->with('excludecol','14,15,16,17,18,19,20,21,22')
			->with('colclass',$colclass)
			->with('searchinput',$searchinput)
			->with('ajaxsource',URL::to('contact/vendor'))
			->with('ajaxdel',URL::to('contact/vendordel'))
	        ->with('crumb',$this->crumb)
			->with('heads',$heads);
	}

	public function post_vendor()
	{



		$fields = array(
			'vendorCompany',
			'vendorStreet',
			'vendorCity',
			'vendorZIP',
			'vendorPhone',
			'vendorFax',
			'vendorEmail',
			'vendorWebsite',
		);

		$rel = array('like','like','like','like','like','like','like','like','like','like','like','like','like','like','like','like','like','like','like','like','like','like','like');

		$cond = array('both','both','both','both','both','both','both','both','both','both','both','both','both','both','both','both','both','both','both','both','both','both','both');

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

		$document = new Vendor();

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

			$aadata[] = array(
				$counter,
				$doc['vendorCompany'],
				$doc['vendorStreet'],
				$doc['vendorCity'],
				$doc['vendorZIP'],
				$doc['vendorPhone'],
				$doc['vendorFax'],
				$doc['vendorEmail'],
				$doc['vendorWebsite'],
				'<a href="'.URL::to('contact/edit/'.$doc['_id']).'"><i class="foundicon-edit action"></i></a>&nbsp;'.
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



	public function get_client()
	{
		$heads = array(
			'#',
			'Company',
			'Street',
			'City',
			'ZIP',
			'Phone',
			'Fax',
			'Email',
			'Website',
			'Action'
		);

		$colclass = array('one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one');
		//$colclass = false;
		//$searchinput = array(false,'title','created','last update','creator','contact manager','tags',false);
		$searchinput = array(
			false,
			'clientCompany',
			'clientStreet',
			'clientCity',
			'clientZIP',
			'clientPhone',
			'clientFax',
			'clientEmail',
			'clientWebsite',
			false
		);

		$this->crumb->add('contact/vendor','Vendors');

		return View::make('tables.noaside')
			->with('title','Clients')
			->with('newbutton','New Client')
			->with('disablesort','0,3')
			->with('addurl','contact/clientadd')
			->with('excludecol','14,15,16,17,18,19,20,21,22')
			->with('colclass',$colclass)
			->with('searchinput',$searchinput)
			->with('ajaxsource',URL::to('contact/client'))
			->with('ajaxdel',URL::to('contact/clientdel'))
	        ->with('crumb',$this->crumb)
			->with('heads',$heads);
	}

	public function post_client()
	{



		$fields = array(
			'clientCompany',
			'clientStreet',
			'clientCity',
			'clientZIP',
			'clientPhone',
			'clientFax',
			'clientEmail',
			'clientWebsite',
		);

		$rel = array('like','like','like','like','like','like','like','like','like','like','like','like','like','like','like','like','like','like','like','like','like','like','like');

		$cond = array('both','both','both','both','both','both','both','both','both','both','both','both','both','both','both','both','both','both','both','both','both','both','both');

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

		$document = new Client();

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

			$aadata[] = array(
				$counter,
				$doc['clientCompany'],
				$doc['clientStreet'],
				$doc['clientCity'],
				$doc['clientZIP'],
				$doc['clientPhone'],
				$doc['clientFax'],
				$doc['clientEmail'],
				$doc['clientWebsite'],
				'<a href="'.URL::to('contact/edit/'.$doc['_id']).'"><i class="foundicon-edit action"></i></a>&nbsp;'.
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

	public function get_contactperson($oppid){

		$form = new Formly();
		return View::make('contact.cp')
					->with('id',$oppid)
					->with('form',$form)
					->with('title','New Contact Person');

	}

	public function get_add(){

		$this->crumb->add('contact/add','New Contact');

		$form = new Formly();
		return View::make('contact.new')
					->with('form',$form)
					->with('crumb',$this->crumb)
					->with('title','New Contact');

	}

	public function post_add(){

		//print_r(Session::get('permission'));

	    $rules = array(
	        'contactNumber'  => 'required|max:50',
	        'targetScopeDescription' => 'required'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('contact/add')->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();
	    	
	    	//print_r($data);

			//pre save transform
			unset($data['csrf_token']);

			$data['contactDate'] = new MongoDate(strtotime($data['contactDate']." 00:00:00"));
			$data['closingDate'] = new MongoDate(strtotime($data['closingDate']." 00:00:00"));

			$data['createdDate'] = new MongoDate();
			$data['lastUpdate'] = new MongoDate();
			$data['creatorName'] = Auth::user()->fullname;
			$data['creatorId'] = Auth::user()->id;
			
			$data['tags'] = explode(',',$data['contactTag']);

			$data['saveToContact'] = (isset($data['saveToContact']))?$data['saveToContact']:'No';

			$contact = new contact();

				if($data['saveToContact'] == 'Yes' && (!isset($data['contact_id']) || $data['contact_id'] == '') ){
					$client = new Client();

					$contact = array();

					$contact['clientCompany']	= $data['clientCompany'];
					$contact['clientStreet']	= $data['clientStreet'];
					$contact['clientCity']		= $data['clientCity'];
					$contact['clientZIP']		= $data['clientZIP'];
					$contact['clientPhone']		= $data['clientPhone'];
					$contact['clientFax']		= $data['clientFax'];
					$contact['clientEmail']		= $data['clientEmail'];
					$contact['clientWebsite']	= $data['clientWebsite'];

					if($ctx = $client->insert($contact,array('upsert'=>true))){
						$data['contact_id'] = $ctx['_id']->__toString();
					}else{
						$data['contact_id'] = '';
					}

				}else if($data['saveToContact'] == 'Yes' && $data['contact_id'] != ''){

					$client = new Client();

					$contact = array();

					$c_id = new MongoId($data['contact_id']);

					$contact['clientCompany']	= $data['clientCompany'];
					$contact['clientStreet']	= $data['clientStreet'];
					$contact['clientCity']		= $data['clientCity'];
					$contact['clientZIP']		= $data['clientZIP'];
					$contact['clientPhone']		= $data['clientPhone'];
					$contact['clientFax']		= $data['clientFax'];
					$contact['clientEmail']		= $data['clientEmail'];
					$contact['clientWebsite']	= $data['clientWebsite'];

					$client->update(array('_id'=>$c_id),array('$set'=>$contact),array('upsert'=>true));

				}


			$newobj = $contact->insert($data);

			if($newobj){

				if(count($data['tags']) > 0){
					$tag = new Tag();
					foreach($data['tags'] as $t){
						$tag->update(array('tag'=>$t),array('$inc'=>array('count'=>1)),array('upsert'=>true));
					}
				}

				Event::fire('contact.create',array('id'=>$newobj['_id'],'result'=>'OK'));

		    	return Redirect::to('contact')->with('notify_success','Document saved successfully');
			}else{
				Event::fire('contact.create',array('id'=>$id,'result'=>'FAILED'));
		    	return Redirect::to('contact')->with('notify_success','Document saving failed');
			}

	    }
	}

	public function get_edit($id = null){

		$this->crumb->add('contact/edit/'.$id,'Edit',false);

		$doc = new Contact();

		$id = (is_null($id))?Auth::user()->id:$id;

		$id = new MongoId($id);

		$doc_data = $doc->get(array('_id'=>$id));

		$doc_data['oldTag'] = $doc_data['contactTag'];

		unset($doc_data['saveToContact']);

		$doc_data['contactDate'] = (isset($doc_data['contactDate']))?date('Y-m-d', $doc_data['contactDate']->sec):'';
		$doc_data['closingDate'] = (isset($doc_data['closingDate']))?date('Y-m-d', $doc_data['closingDate']->sec):'';

		$this->crumb->add('contact/edit/'.$id,$doc_data['contactNumber']);

		$form = Formly::make($doc_data);

		return View::make('contact.edit')
					->with('doc',$doc_data)
					->with('form',$form)
					->with('crumb',$this->crumb)
					->with('title','Edit Contact');

	}


	public function post_edit($id){

		//print_r(Session::get('permission'));

	    $rules = array(
	        'contactNumber'  => 'required|max:50',
	        'targetScopeDescription' => 'required'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('contact/edit/'.$id)->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();
	    	
			$id = new MongoId($data['id']);

			$data['contactDate'] = new MongoDate(strtotime($data['contactDate']." 00:00:00"));
			$data['closingDate'] = new MongoDate(strtotime($data['closingDate']." 00:00:00"));
			$data['lastUpdate'] = new MongoDate();

			$data['saveToContact'] = (isset($data['saveToContact']))?$data['saveToContact']:'No';

			unset($data['csrf_token']);
			unset($data['id']);

			$data['tags'] = explode(',',$data['contactTag']);

			$doc = new Contact();

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
			
			if($doc->update(array('_id'=>$id),array('$set'=>$data))){

				if($data['saveToContact'] == 'Yes' && $data['contact_id'] != ''){
					$client = new Client();

					$contact = array();

					$c_id = new MongoId($data['contact_id']);

					$contact['clientCompany']	= $data['clientCompany'];
					$contact['clientStreet']	= $data['clientStreet'];
					$contact['clientCity']		= $data['clientCity'];
					$contact['clientZIP']		= $data['clientZIP'];
					$contact['clientPhone']		= $data['clientPhone'];
					$contact['clientFax']		= $data['clientFax'];
					$contact['clientEmail']		= $data['clientEmail'];
					$contact['clientWebsite']	= $data['clientWebsite'];

					$client->update(array('_id'=>$c_id),array('$set'=>$contact),array('upsert'=>true));

				}


				Event::fire('contact.update',array('id'=>$id,'result'=>'OK'));

		    	return Redirect::to('contact')->with('notify_success','Contact saved successfully');
			}else{

				Event::fire('contact.update',array('id'=>$id,'result'=>'FAILED'));

		    	return Redirect::to('contact')->with('notify_success','Contact saving failed');
			}

	    }

	}

	public function post_del(){
		$id = Input::get('id');

		$user = new Contact();

		if(is_null($id)){
			$result = array('status'=>'ERR','data'=>'NOID');
		}else{

			$id = new MongoId($id);


			if($user->delete(array('_id'=>$id))){
				Event::fire('contact.delete',array('id'=>$id,'result'=>'OK'));
				$result = array('status'=>'OK','data'=>'CONTENTDELETED');
			}else{
				Event::fire('contact.delete',array('id'=>$id,'result'=>'FAILED'));
				$result = array('status'=>'ERR','data'=>'DELETEFAILED');				
			}
		}

		print json_encode($result);
	}

	public function get_view($id = null){

		$project = new Contact();

		$_id = new MongoId($id);

		$projectdata = $project->get(array('_id'=>$_id));

		$heads = array('#','Title','Last Update','Creator','Attachment','Action');
		$searchinput = array(false,'title','last update','creator','filename',false);

		$doc = new Document();

		//check is shared
		$sharecriteria = new MongoRegex('/'.Auth::user()->email.'/i');

		// empty query object
		$q = array();
		// default filter by department
		$q['docProjectId'] = $id;

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

		return View::make('contact.detail')
			->with('title','Contact Detail - '.$projectdata['contactNumber'])
			->with('contact', $projectdata)
			->with('newbutton','New Schedule Item')
			->with('newprogressbutton','New Progress Report')
			->with('addurl','contact/addschitem')
			->with('ajaxsource',URL::to('contact/scheduleitems/'.$id))
			->with('disablesort','0')
			->with('ajaxsourcedoc',URL::to('contact/doc/'.$id))
			->with('searchinput',$searchinput)
			->with('heads',$heads)
			->with('ajaxdel',URL::to('contact/del'));
	}

	public function post_doc($id = null)
	{

		$fields = array('title','createdDate','creatorName','docFilename');

		$rel = array('like','like','like','like');

		$cond = array('both','both','both','both');

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
		if(!is_null($id)){
			$q['docContactId'] = $id;
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


			$doc['title'] = str_ireplace($hilite, $hilite_replace, $doc['title']);
			$doc['creatorName'] = str_ireplace($hilite, $hilite_replace, $doc['creatorName']);

			/*
			if($doc['creatorId'] == Auth::user()->id || $doc['docDepartment'] == Auth::user()->department){
				$edit = '<a href="'.URL::to('document/edit/'.$doc['_id'].'/'.$type).'">'.
						'<i class="foundicon-edit action"></i></a>&nbsp;';
				$del = '<i class="foundicon-trash action del" id="'.$doc['_id'].'"></i>';
				$download = '<a href="'.URL::to('document/dl/'.$doc['_id'].'/'.$type).'">'.
							'<i class="foundicon-inbox action"></i></a>&nbsp;';
			}else{
				if($permissions->{$type}->edit == 1){
					$edit = '<a href="'.URL::to('document/edit/'.$doc['_id'].'/'.$type).'">'.
							'<i class="foundicon-edit action"></i></a>&nbsp;';
				}else{
					$edit = '';
				}

				if($permissions->{$type}->delete == 1){
					$del = '<i class="foundicon-trash action del" id="'.$doc['_id'].'"></i>';
				}else{
					$del = '';
				}

				if(isset($permissions->{$type}->download) && $permissions->{$type}->download == 1){
					$download = '<a href="'.URL::to('document/dl/'.$doc['_id'].'/'.$type).'">'.
							'<i class="foundicon-inbox action"></i></a>&nbsp;';
				}else{
					$download = '';
				}

			}
			*/

			$aadata[] = array(
				$counter,
				'<span class="metaview" id="'.$doc['_id'].'">'.$doc['title'].'</span>',
				//date('Y-m-d H:i:s', $doc['createdDate']->sec),
				isset($doc['lastUpdate'])?date('Y-m-d H:i:s', $doc['lastUpdate']->sec):'',
				$doc['creatorName'],
				isset($doc['docFilename'])?'<span class="fileview" id="'.$doc['_id'].'">'.$doc['docFilename'].'</span>':'',
				''//$edit.$download.$del
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

	public function get_addscitem(){

	}

	public function get_postscitem(){
		
	}


}