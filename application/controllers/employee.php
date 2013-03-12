<?php

class Employee_Controller extends Base_Controller {

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

		$this->crumb = new Breadcrumb();
		$this->crumb->add('employee','Employees');

		date_default_timezone_set('Asia/Jakarta');
		$this->filter('before','auth');
	}	



	public function get_index()
	{

		$heads = array('#','','Full Name','Email','Department','Role','Action');
		$searchinput = array(false,false,'fullname','email','department','role',false);
		$colclass = array('','two','','','','','');

		$tag = new Tag();
		$tags = $tag->find(array(), array(),array('count'=>-1));

		return View::make('tables.simple')
			->with('title','Employee Management')
			->with('newbutton','New Employee')
			->with('disablesort','0,1,4,5')
			->with('addurl','employee/add')
			->with('searchinput',$searchinput)
			->with('tags',$tags)
			->with('colclass',$colclass)
			->with('ajaxsource',URL::to('employee'))
			->with('ajaxdel',URL::to('employee/del'))
			->with('crumb',$this->crumb)
			->with('heads',$heads);
	}

	public function post_index()
	{
		$fields = array('fullname','username','email','department','role');

		$rel = array('like','like','like','like');

		$cond = array('both','both','both','both');

		$pagestart = Input::get('iDisplayStart');
		$pagelength = Input::get('iDisplayLength');

		$limit = array($pagelength, $pagestart);

		$defsort = 1;
		$defdir = -1;

		$idx = 0;
		$q = array();
		foreach($fields as $field){
			if(Input::get('sSearch_'.$idx))
			{
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

		$document = new Employee();

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

			/*
			if(file_exists(Config::get('parama.avatarstorage').$doc['_id'].'/avatar.jpg')){
				$photo = HTML::image('avatar/'.$doc['_id'].'/avatar.jpg', $doc['fullname'], array('class' => 'avatar-list'));
			}else{
				$photo = HTML::image('images/no-avatar.jpg', $doc['fullname'], array('class' => 'avatar-list'));				
			}
			*/

			$photo = getphoto($doc['_id'],$doc['fullname'],'avatar',2000);

			$aadata[] = array(
				$counter,
				$photo,
				//'<span class="pop" rel="employee/popprofile" id="'.$doc['_id'].'" >'.$doc['fullname'].'</span>',
				HTML::link('employee/profile/'.$doc['_id'],$doc['fullname']),
				//$doc['username'],
				$doc['email'],
				isset($doc['department'])?depttitle($doc['department']):'',
				(isset($doc['role']))?roletitle($doc['role']):'no role',
				'<a href="'.URL::to('employee/picture/'.$doc['_id']).'"><i class="foundicon-smiley action has-tip tip-bottom noradius" title="Profile Picture"></i></a>&nbsp;'.
				'<a href="'.URL::to('employee/edit/'.$doc['_id']).'"><i class="foundicon-edit action has-tip tip-bottom noradius" title="Edit"></i></a>&nbsp;'.
				'<i class="foundicon-trash action del has-tip tip-bottom noradius" title="Delete" id="'.$doc['_id'].'"></i>'
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

	public function get_userlist()
	{
		$user = new Employee();

		$user_profile = $user->get(array('email'=>Auth::user()->email));

		return View::make('employee.profile')->with('profile',$user_profile);
	}

	public function post_userlist()
	{
		return View::make('employee.index');
	}

	public function get_profile($id = null){

		if(is_null($id)){
			$this->crumb = new Breadcrumb();
		}

		$heads = array('#','Title','Attachment','Category','Effective Since','Until','Last Update','Creator','Action');
		$searchinput = array(false,'title',false,'docCategory','effectiveDate','expiryDate','last update','creator',false);
	    $colclass = array('one','','','','one','one','one','one',false);

		$user = new Employee();

		$id = (is_null($id))?Auth::user()->id:$id;

		$id = new MongoId($id);


		$user_profile = $user->get(array('_id'=>$id));



		$this->crumb->add('project/profile','Profile',false);
		$this->crumb->add('project/profile',$user_profile['fullname']);

		return View::make('employee.profile')
			->with('searchinput',$searchinput)
			->with('ajaxsourcedoc',URL::to('employee/doc/'.$user_profile['userId']))
			->with('disablesort','0')
			->with('heads',$heads)
			->with('colclass',$colclass)
			->with('crumb',$this->crumb)
			->with('profile',$user_profile)
			->with('ajaxdel','');
	}

	public function post_doc($id = null)
	{

		$fields = array('title','docCategory','createdDate','creatorName','docFilename');

		$rel = array('like','like','like','like','like');

		$cond = array('both','both','both','both','both');

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
			$q['creatorId'] = $id;
			$q['$or'] = array(
				array('docRequestToDepartment'=>'hr_admin'),
				array('docRequestToDepartment'=>'finance_hr_director')
			);
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

		$cats = Config::get('parama.doc_category_list');

		$counter = 1 + $pagestart;
		foreach ($documents as $doc) {


			$doc['title'] = str_ireplace($hilite, $hilite_replace, $doc['title']);
			$doc['creatorName'] = str_ireplace($hilite, $hilite_replace, $doc['creatorName']);

			$aadata[] = array(
				$counter,
				'<span class="metaview" id="'.$doc['_id'].'">'.$doc['title'].'</span>',
				isset($doc['docFilename'])?'<span class="fileview" id="'.$doc['_id'].'">'.$doc['docFilename'].'</span>':'',
				//date('Y-m-d H:i:s', $doc['createdDate']->sec),
				$cats[$doc['docCategory']],
				isset($doc['effectiveDate'])?date('Y-m-d H:i:s', $doc['effectiveDate']->sec):'',
				isset($doc['expiryDate'])?date('Y-m-d H:i:s', $doc['expiryDate']->sec):'',
				isset($doc['lastUpdate'])?date('Y-m-d H:i:s', $doc['lastUpdate']->sec):'',
				$doc['creatorName'],
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


	public function get_popprofile($id = null){

		$user = new Employee();

		$id = (is_null($id))?Auth::user()->id:$id;

		$id = new MongoId($id);

		$user_profile = $user->get(array('_id'=>$id));

		return View::make('pop.employeeprofile')->with('profile',$user_profile);
	}

	public function post_profile(){
		
	}

	public function post_del(){
		$id = Input::get('id');

		$user = new Employee();

		if(is_null($id)){
			$result = array('status'=>'ERR','data'=>'NOID');
		}else{

			$id = new MongoId($id);

			if($user->delete(array('_id'=>$id))){
				$result = array('status'=>'OK','data'=>'CONTENTDELETED');
			}else{
				$result = array('status'=>'ERR','data'=>'DELETEFAILED');				
			}
		}

		print json_encode($result);
	}

	public function get_picture($id = null){

		$this->crumb->add('employee/picture','Change Picture',false);

		$_id = (is_null($id))?Auth::user()->id:$id;

		$_id = new MongoId($_id);

		$emp = new Employee();

		$employee = $emp->get(array('_id'=>$_id));

		$this->crumb->add('employee/picture',$employee['fullname'],false);

		$form = Formly::make();

		return View::make('employee.pic')
					->with('form',$form)
					->with('id',$id)
					->with('doc',$employee)
					->with('crumb',$this->crumb)
					->with('title','Change Photo');
	}

	public function post_picture($id = null){

		if(is_null($id)){
			$back = 'employee/profile';
		}else{
			$back = 'employee';
		}

		//$id = (is_null($id))?Auth::user()->id:$id;
		$id = (is_null($id))?Auth::user()->id:$id;

		$picupload = Input::file('picupload');

		$data = Input::get();

		if($picupload['name'] != ''){

			$newdir = realpath(Config::get('parama.photostorage')).'/'.$id;

			if(!file_exists($newdir)){
				mkdir($newdir,0777);
			}

			$success = Resizer::open( $picupload )
        		->resize( 200 , 250 , 'crop' )
        		->save( Config::get('parama.photostorage').$id.'/formal.jpg' , 90 );

			Input::upload('picupload',$newdir,$picupload['name']);

			
		}

		$user = new Employee();

		$_id = new MongoId($data['id']);
		$data['lastUpdate'] = new MongoDate();

		unset($data['csrf_token']);
		unset($data['id']);		

		
		if($user->update(array('_id'=>$_id),array('$set'=>$data))){
	    	return Redirect::to($back)->with('notify_success','Picture saved successfully');
		}else{
	    	return Redirect::to($back)->with('notify_success','Picture saving failed');
		}

	}

	public function get_pass($id = null){

		$id = (is_null($id))?Auth::user()->id:$id;

		$doc['_id'] = $id;

		$form = Formly::make();

		return View::make('employee.pass')
					->with('form',$form)
					->with('doc',$doc)
					->with('title','Change Password');

	}

	public function post_pass($id = null){

		if(is_null($id)){
			$back = 'employee/profile';
		}else{
			$back = 'users';
		}

	    $rules = array(
	        'pass' => 'same:repass',
	        'repass'=> 'required'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('employee/pass/'.$id)->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();
	    	

			$data['pass'] = Hash::make($data['pass']);

			unset($data['repass']);
			unset($data['csrf_token']);

			$_id = new MongoId($data['id']);
			$data['lastUpdate'] = new MongoDate();

			$user = new Employee();

			if($user->update(array('_id'=>$_id),array('$set'=>$data))){
		    	return Redirect::to($back)->with('notify_success','Password changed successfully');
			}else{
		    	return Redirect::to($back)->with('notify_success','Password change failed');
			}
			

	    }		

	}

	public function get_edit($id = null){

		$this->crumb->add('user/edit','Edit',false);

		$user = new Employee();

		$id = (is_null($id))?Auth::user()->id:$id;

		$id = new MongoId($id);

		$user_profile = $user->get(array('_id'=>$id));

		$this->crumb->add('user/edit',$user_profile['fullname']);

		$form = Formly::make($user_profile);

		return View::make('employee.edit')
					->with('user',$user_profile)
					->with('form',$form)
					->with('crumb',$this->crumb)
					->with('title','Edit User');

	}


	public function post_edit($id){

		//print_r(Session::get('permission'));

	    $rules = array(
	        'fullname'  => 'required|max:50'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('employee/edit/'.$id)->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();
	    	
			$id = new MongoId($data['id']);
			$data['lastUpdate'] = new MongoDate();

			unset($data['csrf_token']);
			unset($data['id']);

			$user = new Employee();
			
			if($user->update(array('_id'=>$id),array('$set'=>$data))){
		    	return Redirect::to('employee')->with('notify_success','Employee saved successfully');
			}else{
		    	return Redirect::to('employee')->with('notify_success','Employee saving failed');
			}

	    }

		
	}



	public function get_add(){

		$this->crumb->add('project/add','Management',false);
		$this->crumb->add('project/add','New User');

		$form = new Formly();
		return View::make('employee.new')
					->with('form',$form)
					->with('crumb',$this->crumb)
					->with('title','New User');

	}

	public function post_add(){

		//print_r(Session::get('permission'));

	    $rules = array(
	        'fullname'  => 'required|max:150',
	        'email' => 'required|email'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('employee/add')->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();
	    	
			unset($data['csrf_token']);

			$data['createdDate'] = new MongoDate();
			$data['lastUpdate'] = new MongoDate();
			$data['creatorName'] = Auth::user()->fullname;
			$data['creatorId'] = Auth::user()->id;

			$user = new Employee();

			if($user->insert($data)){
		    	return Redirect::to('employee')->with('notify_success','Employee saved successfully');
			}else{
		    	return Redirect::to('employee')->with('notify_success','Employee saving failed');
			}
			

	    }

		
	}

	public function get_people()
	{
		$heads = array('#','Full Name','Username','Email','Role','Access','Action');
		$fields = array('seq','fullname','username','email','role','access','action');
		$searchinput = array(false,'fullname','username','email','role','access',false);

		return View::make('tables.simple')
			->with('title','People')
			->with('newbutton','New User')
			->with('disablesort','0,5,6')
			->with('addurl','employee/add')
			->with('searchinput',$searchinput)
			->with('ajaxsource',URL::to('employee/people'))
			->with('ajaxdel',URL::to('employee/del'))
			->with('heads',$heads);
	}

	public function post_people()
	{
		$fields = array('fullname','username','email','role','access');

		$rel = array('like','like','like','equ','equ');

		$cond = array('both','both','both','equ','equ');

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

		$document = new Employee();

		/* first column is always sequence number, so must be omitted */
		$fidx = Input::get('iSortCol_0');
		$fidx = ($fidx > 0)?$fidx - 1:$fidx;
		$sort_col = $fields[$fidx];
		$sort_dir = (Input::get('sSortDir_0') == 'asc')?1:-1;

		$count_all = $document->count();

		if(count($q) > 0){
			$documents = $document->find($q,array(),array($sort_col=>$sort_dir));
			$count_display_all = $document->count($q);
		}else{
			$documents = $document->find(array(),array(),array($sort_col=>$sort_dir));
			$count_display_all = $document->count();
		}




		$aadata = array();

		$counter = 1;
		foreach ($documents as $doc) {
			$aadata[] = array(
				$counter,
				$doc['fullname'],
				$doc['username'],
				$doc['email'],
				implode(',',$doc['role']),
				implode(',',$doc['access']),
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

}