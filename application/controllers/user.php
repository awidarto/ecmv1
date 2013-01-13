<?php

class User_Controller extends Base_Controller {

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
		date_default_timezone_set('Asia/Jakarta');
		$this->filter('before','auth');
	}	

	public function get_index()
	{
		$user = new User();

		$user_profile = $user->get(array('email'=>Auth::user()->email));

		return View::make('user.profile')->with('profile',$user_profile);
	}

	public function post_index()
	{
		return View::make('user.index');
	}

	public function get_profile($id = null){

		$user = new User();

		$id = (is_null($id))?Auth::user()->id:$id;

		$id = new MongoId($id);

		$user_profile = $user->get(array('_id'=>$id));

		return View::make('user.profile')->with('profile',$user_profile);
	}

	public function get_popprofile($id = null){

		$user = new User();

		$id = (is_null($id))?Auth::user()->id:$id;

		$id = new MongoId($id);

		$user_profile = $user->get(array('_id'=>$id));

		return View::make('pop.userprofile')->with('profile',$user_profile);
	}

	public function post_profile(){
		
	}

	public function post_del(){
		$id = Input::get('id');

		$user = new User();

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

	public function get_users()
	{
		$heads = array('#','Full Name','Username','Email','Role','Action');
		$searchinput = array(false,'fullname','username','email','role',false);

		$tag = new Tag();
		$tags = $tag->find(array(), array(),array('count'=>-1));

		return View::make('tables.simple')
			->with('title','User Management')
			->with('newbutton','New User')
			->with('disablesort','0,4,5')
			->with('addurl','user/add')
			->with('searchinput',$searchinput)
			->with('tags',$tags)
			->with('ajaxsource',URL::to('users'))
			->with('ajaxdel',URL::to('user/del'))
			->with('heads',$heads);
	}

	public function post_users()
	{
		$fields = array('fullname','username','email','role');

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

		$document = new User();

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
			$aadata[] = array(
				$counter,
				'<span class="pop" rel="user/popprofile" id="'.$doc['_id'].'" >'.$doc['fullname'].'</span>',
				//HTML::link('user/profile/'.$doc['_id'],$doc['fullname']),
				$doc['username'],
				$doc['email'],
				$doc['role'],
				'<a href="'.URL::to('user/edit/'.$doc['_id']).'"><i class="foundicon-edit action"></i></a>&nbsp;'.
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

		print json_encode($result);
	}

	public function get_edit($id = null){

		$user = new User();

		$id = (is_null($id))?Auth::user()->id:$id;

		$id = new MongoId($id);

		$user_profile = $user->get(array('_id'=>$id));

		foreach($user_profile['permissions'] as $key=>$val){
			$user_profile[$key] = ($val)?1:0;
			/*
			foreach($val as $k=>$v){
				$user_profile[$key.'_'.$k] = $v;
			}
			*/
		}

		$form = Formly::make($user_profile);

		return View::make('user.edit')
					->with('user',$user_profile)
					->with('form',$form)
					->with('title','Edit User');

	}


	public function post_edit($id){

		//print_r(Session::get('permission'));

	    $rules = array(
	        'fullname'  => 'required|max:50'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('user/edit/'.$id)->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();
	    	
			$obj = Config::get('parama.department');

			$pitem = Config::get('acl.permissions');

			$permissions = array();

			foreach($obj as $o=>$t){
				if(isset($data[$o])){
					$permissions[$o] = true;
					unset($data[$o]);
				}else{
					$permissions[$o] = false;
				}

				/*
				if(isset($data[$o.'_set'])){
					$permissions[$o]['set'] = $data[$o.'_set'];
					unset($data[$o.'_set']);
				}else{
					$permissions[$o]['set'] = 0;
				}
				foreach($pitem as $p){
					if(isset($data[$o.'_'.$p])){
						$permissions[$o][$p] = $data[$o.'_'.$p];
						unset($data[$o.'_'.$p]);
					}else{
						$permissions[$o][$p] = 0;
					}
				}
				*/
			}

			$data['permissions'] = $permissions;

			$id = new MongoId($data['id']);
			$data['lastUpdate'] = new MongoDate();

			unset($data['csrf_token']);
			unset($data['id']);

			$user = new User();

			//print_r($data);

			
			if($user->update(array('_id'=>$id),array('$set'=>$data))){
		    	return Redirect::to('users')->with('notify_success','User saved successfully');
			}else{
		    	return Redirect::to('users')->with('notify_success','User saving failed');
			}

	    }

		
	}



	public function get_add(){

		$form = new Formly();
		return View::make('user.new')
					->with('form',$form)
					->with('title','New User');

	}

	public function post_add(){

		//print_r(Session::get('permission'));

	    $rules = array(
	        'fullname'  => 'required|max:50',
	        'email' => 'required|email|unique:user',
	        'username' => 'required|unique:user',
	        'pass' => 'required|same:repass',
	        'repass'=> 'required'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('user/add')->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();
	    	
			$obj = Config::get('parama.department');

			$pitem = Config::get('acl.permissions');

			$permissions = array();

			foreach($obj as $o=>$t){

				if(isset($data[$o])){
					$permissions[$o] = true;
				}else{
					$permissions[$o] = false;
				}

				/*
				if(isset($data[$o.'_set'])){
					$permissions[$o]['set'] = $data[$o.'_set'];
					unset($data[$o.'_set']);
				}else{
					$permissions[$o]['set'] = 0;
				}

				foreach($pitem as $p){
					if(isset($data[$o.'_'.$p])){
						$permissions[$o][$p] = $data[$o.'_'.$p];
						unset($data[$o.'_'.$p]);
					}else{
						$permissions[$o][$p] = 0;
					}
				}
				*/
			}

			$data['pass'] = Hash::make($data['pass']);
			$data['permissions'] = $permissions;

			unset($data['repass']);
			unset($data['csrf_token']);

			$data['createdDate'] = new MongoDate();
			$data['lastUpdate'] = new MongoDate();
			$data['creatorName'] = Auth::user()->fullname;
			$data['creatorId'] = Auth::user()->id;

			$user = new User();

			if($user->insert($data)){
		    	return Redirect::to('user')->with('notify_success','User saved successfully');
			}else{
		    	return Redirect::to('user')->with('notify_success','User saving failed');
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
			->with('addurl','user/add')
			->with('searchinput',$searchinput)
			->with('ajaxsource',URL::to('user/people'))
			->with('ajaxdel',URL::to('user/del'))
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

		$document = new User();

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