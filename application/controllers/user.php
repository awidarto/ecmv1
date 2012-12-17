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

}