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

	public function get_initial()
	{
		$q = Input::get('term');

		$user = new User();
		$qemail = new MongoRegex('/'.$q.'/i');

		$res = $user->find(array('initial'=>$qemail),array('initial'=>true,'email'=>true,'fullname'=>true));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'value'=>$r['initial'],'name'=>$r['fullname'],'label'=>$r['initial'].' ( '.$r['fullname'].' )');
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

	public function get_userdata()
	{
		$q = Input::get('term');

		$user = new User();
		$qemail = new MongoRegex('/'.$q.'/i');

		$res = $user->find(array('$or'=>array(array('email'=>$qemail),array('fullname'=>$qemail)) ));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'value'=>$r['fullname'],'email'=>$r['email'],'label'=>$r['fullname'].' ( '.$r['email'].' )','userdata'=>$r);
		}

		return Response::json($result);		
	}		

	public function get_userdatabyemail()
	{
		$q = Input::get('term');

		$user = new User();
		$qemail = new MongoRegex('/'.$q.'/i');

		$res = $user->find(array('$or'=>array(array('email'=>$qemail),array('fullname'=>$qemail)) ));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'value'=>$r['email'],'email'=>$r['email'],'label'=>$r['fullname'].' ( '.$r['email'].' )','userdata'=>$r);
		}

		return Response::json($result);		
	}		

	public function get_useridbyemail()
	{
		$q = Input::get('term');

		$user = new User();
		$qemail = new MongoRegex('/'.$q.'/i');

		$res = $user->find(array('$or'=>array(array('email'=>$qemail),array('fullname'=>$qemail)) ));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'value'=>$r['_id']->__toString(),'email'=>$r['email'],'label'=>$r['fullname'].' ( '.$r['email'].' )');
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

	public function get_clientcontact()
	{
		$q = Input::get('term');

		$user = new Client();
		$qemail = new MongoRegex('/'.$q.'/i');

		$res = $user->find(array('clientCompany'=>$qemail));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'value'=>$r['clientCompany'],'data'=>$r,'label'=>$r['clientCompany']);
		}

		return Response::json($result);		
	}

	public function get_clientcompany()
	{
		$q = Input::get('term');

		$user = new Client();
		$qemail = new MongoRegex('/'.$q.'/i');

		$res = $user->find(array('clientCompany'=>$qemail));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'value'=>$r['clientCompany'],'data'=>$r,'label'=>$r['clientCompany']);
		}

		return Response::json($result);		
	}

	public function get_clientemail()
	{
		$q = Input::get('term');

		$user = new Person();
		$qemail = new MongoRegex('/'.$q.'/i');

		$res = $user->find(array('personEmail'=>$qemail));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'value'=>$r['personEmail'],'data'=>$r,'label'=>$r['personEmail']);
		}

		return Response::json($result);		
	}

	public function get_clientname()
	{
		$q = Input::get('term');

		$user = new Person();
		$qemail = new MongoRegex('/'.$q.'/i');

		$res = $user->find(array('personName'=>$qemail));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'value'=>$r['personName'],'data'=>$r,'label'=>$r['personName']);
		}

		return Response::json($result);		
	}

	public function get_vendorcontact()
	{
		$q = Input::get('term');

		$user = new Vendor();
		$qemail = new MongoRegex('/'.$q.'/i');

		$res = $user->find(array('vendorCompany'=>$qemail));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'value'=>$r['vendorCompany'],'data'=>$r,'label'=>$r['vendorCompany']);
		}

		return Response::json($result);		
	}


	public function get_project()
	{
		$q = Input::get('term');

		$proj = new Project();
		$qproj = new MongoRegex('/'.$q.'/i');

		$res = $proj->find(array('projectNumber'=>$qproj));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'label'=>$r['projectNumber'].' - '.$r['clientName'],'title'=>$r['clientName'],'value'=>$r['projectNumber']);
		}

		return Response::json($result);		
	}

	public function get_projectname()
	{
		$q = Input::get('term');

		$proj = new Project();
		$qproj = new MongoRegex('/'.$q.'/i');

		$res = $proj->find(array('$or'=>array(array('clientName'=>$qproj),array('projectNumber'=>$qproj)) ));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'label'=>$r['projectNumber'].' - '.$r['clientName'],'number'=>$r['projectNumber'],'value'=>$r['clientName']);
		}

		return Response::json($result);		
	}


	public function get_tender()
	{
		$q = Input::get('term');

		$proj = new Tender();
		$qproj = new MongoRegex('/'.$q.'/i');

		//$res = $proj->find(array('$or'=>array(array('title'=>$qproj),array('tenderNumber'=>$qproj)) ),array('title','tenderNumber'));
		$res = $proj->find(array('tenderNumber'=>$qproj));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'label'=>$r['tenderNumber'],'title'=>$r['clientName'],'value'=>$r['tenderNumber']);
		}

		return Response::json($result);		
	}

	public function get_tenderclient()
	{
		$q = Input::get('term');

		$proj = new Tender();
		$qproj = new MongoRegex('/'.$q.'/i');

		$res = $proj->find(array('clientName'=>$qproj));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'label'=>$r['tenderNumber'].' - '.$r['clientName'],'number'=>$r['tenderNumber'],'value'=>$r['clientName']);
		}

		return Response::json($result);		
	}

	public function get_opportunity()
	{
		$q = Input::get('term');

		$proj = new Opportunity();
		$qproj = new MongoRegex('/'.$q.'/i');

		$res = $proj->find(array('$or'=>array(array('clientCompany'=>$qproj),array('opportunityNumber'=>$qproj)) ),array('clientCompany','opportunityNumber'));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'label'=>$r['opportunityNumber'].' - '.$r['clientCompany'],'title'=>$r['clientCompany'],'value'=>$r['opportunityNumber']);
		}

		return Response::json($result);		
	}

	public function get_opportunityname()
	{
		$q = Input::get('term');

		$proj = new Opportunity();
		$qproj = new MongoRegex('/'.$q.'/i');

		$res = $proj->find(array('$or'=>array(array('clientCompany'=>$qproj),array('opportunityNumber'=>$qproj)) ),array('clientCompany','opportunityNumber'));

		$result = array();

		foreach($res as $r){
			$result[] = array('id'=>$r['_id']->__toString(),'label'=>$r['opportunityNumber'].' - '.$r['clientCompany'],'number'=>$r['opportunityNumber'],'value'=>$r['clientCompany']);
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