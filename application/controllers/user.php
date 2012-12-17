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

	public function get_profile(){

		$user = new User();

		$user_profile = $user->get(array('email'=>Auth::user()->email));

		return View::make('user.profile')->with('profile',$user_profile);
	}

	public function post_profile(){
		
	}


	public function get_users()
	{
		$heads = array('#','Full Name','Username','Email','Role','Access','Action');
		$fields = array('seq','fullname','username','email','role','access','action');
		$searchinput = array(false,'fullname','username','email','role','access',false);

		return View::make('tables.simple')
			->with('title','User Management')
			->with('newbutton','New User')
			->with('disablesort','0,5,6')
			->with('addurl','user/add')
			->with('searchinput',$searchinput)
			->with('ajaxsource',URL::to('users'))
			->with('heads',$heads);
	}

	public function post_users()
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

	public function get_add(){
		return View::make('user.new')
					->with('title','New User');

	}

	public function post_add(){
		
	}

}