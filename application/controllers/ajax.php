<?php

class Ajax_Controller extends Base_Controller {

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
	}

	public function get_index()
	{
	}

	public function post_index()
	{
	}

	public function get_email()
	{
		$q = Input::get('term');

		$user = new User();
		$qemail = new MongoRegex('/'.$q.'/i');

		$res = $user->find(array('$or'=>array(array('email'=>$qemail),array('fullname'=>$qemail)) ),array('email','fullname'));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'value'=>$r['email'],'name'=>$r['fullname'],'label'=>$r['fullname'].' ( '.$r['email'].' )');
		}

		return Response::json($result);		
	}

	public function get_user()
	{
		$q = Input::get('term');

		$user = new User();
		$qemail = new MongoRegex('/'.$q.'/i');

		$res = $user->find(array('$or'=>array(array('email'=>$qemail),array('fullname'=>$qemail)) ),array('email','fullname'));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'value'=>$r['fullname'],'email'=>$r['email'],'label'=>$r['fullname'].' ( '.$r['email'].' )');
		}

		return Response::json($result);		
	}	

	public function get_rev()
	{
		$q = Input::get('term');

		$doc = new Document();
		$qdoc = new MongoRegex('/'.$q.'/i');

		$res = $doc->find(array('title'=>$qdoc),array('title'));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'label'=>$r['title'],'value'=>$r['_id']->__toString());
		}

		return Response::json($result);		
	}

	public function get_project()
	{
		$q = Input::get('term');

		$proj = new Project();
		$qproj = new MongoRegex('/'.$q.'/i');

		$res = $proj->find(array('$or'=>array(array('title'=>$qproj),array('projectNumber'=>$qproj)) ),array('title','projectNumber'));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'label'=>$r['projectNumber'].' - '.$r['title'],'title'=>$r['title'],'value'=>$r['projectNumber']);
		}

		return Response::json($result);		
	}

	public function get_projectname()
	{
		$q = Input::get('term');

		$proj = new Project();
		$qproj = new MongoRegex('/'.$q.'/i');

		$res = $proj->find(array('$or'=>array(array('title'=>$qproj),array('projectNumber'=>$qproj)) ),array('title','projectNumber'));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'label'=>$r['projectNumber'].' - '.$r['title'],'number'=>$r['projectNumber'],'value'=>$r['title']);
		}

		return Response::json($result);		
	}


	public function get_tender()
	{
		$q = Input::get('term');

		$proj = new Tender();
		$qproj = new MongoRegex('/'.$q.'/i');

		$res = $proj->find(array('$or'=>array(array('title'=>$qproj),array('tenderNumber'=>$qproj)) ),array('title','tenderNumber'));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'label'=>$r['tenderNumber'].' - '.$r['title'],'title'=>$r['title'],'value'=>$r['tenderNumber']);
		}

		return Response::json($result);		
	}

	public function get_tendername()
	{
		$q = Input::get('term');

		$proj = new Tender();
		$qproj = new MongoRegex('/'.$q.'/i');

		$res = $proj->find(array('$or'=>array(array('title'=>$qproj),array('tenderNumber'=>$qproj)) ),array('title','tenderNumber'));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'label'=>$r['tenderNumber'].' - '.$r['title'],'number'=>$r['tenderNumber'],'value'=>$r['title']);
		}

		return Response::json($result);		
	}

	public function get_opportunity()
	{
		$q = Input::get('term');

		$proj = new Opportunity();
		$qproj = new MongoRegex('/'.$q.'/i');

		$res = $proj->find(array('$or'=>array(array('title'=>$qproj),array('opportunityNumber'=>$qproj)) ),array('title','opportunityNumber'));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'label'=>$r['opportunityNumber'].' - '.$r['title'],'title'=>$r['title'],'value'=>$r['opportunityNumber']);
		}

		return Response::json($result);		
	}

	public function get_opportunityname()
	{
		$q = Input::get('term');

		$proj = new Opportunity();
		$qproj = new MongoRegex('/'.$q.'/i');

		$res = $proj->find(array('$or'=>array(array('title'=>$qproj),array('opportunityNumber'=>$qproj)) ),array('title','opportunityNumber'));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'label'=>$r['opportunityNumber'].' - '.$r['title'],'number'=>$r['opportunityNumber'],'value'=>$r['title']);
		}

		return Response::json($result);		
	}	

	public function get_tag()
	{
		$q = Input::get('term');

		$tag = new Tag();
		$qtag = new MongoRegex('/'.$q.'/i');

		$res = $tag->find(array('tag'=>$qtag),array('tag'));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['tag'],'label'=>$r['tag'],'value'=>$r['tag']);
		}

		return Response::json($result);		
	}

	public function get_meta()
	{
		$q = Input::get('term');

		$doc = new Document();
		$id = new MongoId($q);

		$res = $doc->get(array('_id'=>$id));

		return Response::json($result);		
	}


}