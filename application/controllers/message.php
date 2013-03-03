<?php

class Message_Controller extends Base_Controller {

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
		$this->crumb->add('message','Messages');

		$this->filter('before','auth');
	}

	public function get_index()
	{

	    $heads = array('From','Subject','Timestamp');
	    $colclass = array('one','','three');
	    $searchinput = array('from','subject','timestamp');

	    $outheads = array('To','Subject','Timestamp');
	    $outcolclass = array('one','','three');
	    $outsearchinput = array('to','subject','timestamp');

	    return View::make('tables.message')
	        ->with('title','Messages')
	        ->with('heads',$heads)
	        ->with('colclass',$colclass)
	        ->with('searchinput',$searchinput)
	        ->with('outheads',$outheads)
	        ->with('outcolclass',$outcolclass)
	        ->with('outsearchinput',$outsearchinput)
	        ->with('newbutton','New Message')
			->with('addurl','message/new')
	        ->with('disablesort','0')
	        ->with('crumb',$this->crumb)
	        ->with('ajaxsource',URL::to('message'))
	        ->with('ajaxsourceoutbox',URL::to('message/outbox'));

	}



	public function post_index(){


		$pagestart = Input::get('iDisplayStart');
		$pagelength = Input::get('iDisplayLength');

		$search = Input::get('sSearch');

		$limit = array($pagelength, $pagestart);

		$defsort = 1;
		$defdir = -1;

		$idx = 0;
		$q = array();

		$hilite = array();
		$hilite_replace = array();

		$document = new Message();

		$count_all = $document->count();

		$sort_col = 'createdDate';
		$sort_dir = -1;

		//print_r(Auth::user());

		$self_id = new MongoId(Auth::user()->id);

		$self_email_regex = new MongoRegex('/'.Auth::user()->email.'/i');

		if($search != ''){
			$search = new MongoRegex('/'.$search.'/i');
			//$q['from'] = $self_email_regex;

			$q['$and'] = array(
				array('$or'=>array(
						array('from'=>$search),
						array('to'=>$search),
						array('subject'=>$search),
						array('body'=>$search)
					)
				),
				array('$or'=>array(
						array('to'=>$self_email_regex),
						array('cc'=>$self_email_regex),
						array('bcc'=>$self_email_regex)
					)
				),
			);

			/*
			$q['$or'] = array(
				array('from'=>$search),
				array('to'=>$search),
				array('subject'=>$search),
				array('body'=>$search)
			);
			$q = array('$or'=>array(
				array('to'=>$self_email_regex),
				array('cc'=>$self_email_regex),
				array('bcc'=>$self_email_regex),
			));
			*/

		}else{
			$q = array('$or'=>array(
				array('to'=>$self_email_regex),
				array('cc'=>$self_email_regex),
				array('bcc'=>$self_email_regex)
			));
		}



		if(count($q) > 0){
			$documents = $document->find($q,array(),array($sort_col=>$sort_dir),$limit);
			$count_display_all = $document->count($q);
		}else{
			$documents = $document->find(array(),array(),array($sort_col=>$sort_dir),$limit);
			$count_display_all = $document->count();
		}

		$aadata = array();

		foreach ($documents as $doc) {

			//$item = View::make('message.item')->with('doc',$doc)->with('popsrc','message/view')->render();

			//$item = str_replace($hilite, $hilite_replace, $item);

			$action = '<ul class="inline-list">';
			$action .= '<li>'.HTML::link('message/reply/'.$doc['_id'],'Reply').'</li>';
			$action .= '<li>'.HTML::link('message/replyall/'.$doc['_id'],'Reply All').'</li>';
			$action .= '<li>'.HTML::link('message/forward/'.$doc['_id'],'Forward').'</li>';
			$action .= '</ul>';


			$aadata[] = array(
				$doc['from'],
				HTML::link('message/read/'.$doc['_id'],$doc['subject']),
				date('Y-m-d h:i:s',$doc['createdDate']->sec)
			);
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


	public function post_outbox(){


		$pagestart = Input::get('iDisplayStart');
		$pagelength = Input::get('iDisplayLength');

		$search = Input::get('sSearch');

		$limit = array($pagelength, $pagestart);

		$defsort = 1;
		$defdir = -1;

		$idx = 0;
		$q = array();

		$hilite = array();
		$hilite_replace = array();

		$document = new Message();

		$count_all = $document->count();

		$sort_col = 'createdDate';
		$sort_dir = -1;

		//print_r(Auth::user());

		$self_id = new MongoId(Auth::user()->id);

		$self_email_regex = new MongoRegex('/'.Auth::user()->email.'/i');

		if($search != ''){
			$search = new MongoRegex('/'.$search.'/i');
			$q['from'] = $self_email_regex;
			$q['$or'] = array(
				array('from'=>$search),
				array('to'=>$search),
				array('subject'=>$search),
				array('body'=>$search)
			);
		}else{
			$q = array('from'=>$self_email_regex);
		}



		//$q = array();

		if(count($q) > 0){
			$documents = $document->find($q,array(),array($sort_col=>$sort_dir),$limit);
			$count_display_all = $document->count($q);
		}else{
			$documents = $document->find(array(),array(),array($sort_col=>$sort_dir),$limit);
			$count_display_all = $document->count();
		}

		$aadata = array();

		foreach ($documents as $doc) {

			$item = View::make('message.item')->with('doc',$doc)->with('popsrc','message/view')->render();

			$item = str_replace($hilite, $hilite_replace, $item);

			$aadata[] = array(
				$doc['to'],
				HTML::link('message/read/'.$doc['_id'],$doc['subject']),
				date('Y-m-d h:i:s',$doc['createdDate']->sec)
			);
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

	public function get_reply($id)
	{
		$this->crumb->add('message/reply/'.$id,'Reply');

		$msg = new Message();

		$_id = new MongoId($id);

		$message = $msg->get(array('_id'=>$_id));

		$message['cc'] = '';

		$message['bcc'] = '';

		$message['to'] = $message['from'];

		$message['from'] = Auth::user()->email;

		$message['subject'] = 'Re: '.$message['subject'];

		$message['body'] = "<br /><q>".$message['body']."</q>";

		$form = new Formly($message);

		$ckeditor = new CKEditor();

		return View::make('message.reply')
			->with('id',$id)
			->with('message',$message)
			->with('editor',$ckeditor)
			->with('form',$form)
	        ->with('crumb',$this->crumb)
			->with('title','Reply to Message');
	}

	public function post_reply($id){

		$rules = array(
	        'subject'  => 'required'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('message/reply/'.$id)->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();
	    	
	    	//print_r($data);

			//pre save transform
			unset($data['csrf_token']);

			$data['createdDate'] = new MongoDate();
			$data['lastUpdate'] = new MongoDate();
			$data['creatorName'] = Auth::user()->fullname;
			$data['creatorId'] = Auth::user()->id;

			$data['inreplyto'] = $id;

			$data['from'] = Auth::user()->email;
			
			//$docupload = Input::file('docupload');

			$data['recipients'] = explode(',',$data['to']);

			$status = explode(',',$data['to']);

			$data['status'] = array();

			foreach ($status as $st) {
				$data['status'][$st] = 'Delivered';
			}

			$document = new Message();

			$newobj = $document->insert($data);

			if($newobj){

				/*
				if($docupload['name'] != ''){

					$newid = $newobj['_id']->__toString();

					$newdir = realpath(Config::get('parama.storage')).'/'.$newid;

					Input::upload('docupload',$newdir,$docupload['name']);
					
				}

				$sharedto = explode(',',$data['docShare']);

				if(count($sharedto) > 0  && $data['docShare'] != ''){
					foreach($sharedto as $to){
						Event::fire('document.share',array('id'=>$newobj['_id'],'sharer_id'=>Auth::user()->id,'shareto'=>$to));
					}
				}
				*/


				Event::fire('message.send',array('id'=>$newobj['_id'],'result'=>'OK','department'=>Auth::user()->department,'creator'=>Auth::user()->id));

		    	return Redirect::to('message')->with('notify_success','Message sent successfully');
			}else{
				Event::fire('message.send',array('id'=>$id,'result'=>'FAILED'));
		    	return Redirect::to('message')->with('notify_success','Message sending failed');
			}

	    }

		
	}	

	public function get_forward($id)
	{
		$this->crumb->add('message/forward/'.$id,'Forward');

		$msg = new Message();

		$_id = new MongoId($id);

		$message = $msg->get(array('_id'=>$_id));


		$message['forwardfrom'] = $message['from'];

		$message['to'] = '';

		$message['cc'] = '';

		$message['bcc'] = '';

		$message['body'] = 'Forwarded From : '.$message['forwardfrom']."\r\n===============================\r\n".$message['body'];

		$message['from'] = Auth::user()->email;

		$message['subject'] = 'Fwd: '.$message['subject'];

		$form = new Formly($message);

		$ckeditor = new CKEditor();

		return View::make('message.forward')
			->with('id',$id)
			->with('message',$message)
			->with('form',$form)
			->with('editor',$ckeditor)
	        ->with('crumb',$this->crumb)
			->with('title','Forward Message');
	}

	public function post_forward($id){

		$rules = array(
	        'subject'  => 'required'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('message/forward/'.$id)->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();
	    	
	    	//print_r($data);

			//pre save transform
			unset($data['csrf_token']);

			$data['createdDate'] = new MongoDate();
			$data['lastUpdate'] = new MongoDate();
			$data['creatorName'] = Auth::user()->fullname;
			$data['creatorId'] = Auth::user()->id;

			$data['from'] = Auth::user()->email;
			
			//$docupload = Input::file('docupload');

			$data['recipients'] = explode(',',$data['to']);

			$status = explode(',',$data['to']);

			$data['status'] = array();

			foreach ($status as $st) {
				$data['status'][$st] = 'Delivered';
			}

			$document = new Message();

			$newobj = $document->insert($data);

			if($newobj){

				/*
				if($docupload['name'] != ''){

					$newid = $newobj['_id']->__toString();

					$newdir = realpath(Config::get('parama.storage')).'/'.$newid;

					Input::upload('docupload',$newdir,$docupload['name']);
					
				}

				$sharedto = explode(',',$data['docShare']);

				if(count($sharedto) > 0  && $data['docShare'] != ''){
					foreach($sharedto as $to){
						Event::fire('document.share',array('id'=>$newobj['_id'],'sharer_id'=>Auth::user()->id,'shareto'=>$to));
					}
				}
				*/


				Event::fire('message.send',array('id'=>$newobj['_id'],'result'=>'OK','department'=>Auth::user()->department,'creator'=>Auth::user()->id));

		    	return Redirect::to('message')->with('notify_success','Message sent successfully');
			}else{
				Event::fire('message.send',array('id'=>$id,'result'=>'FAILED'));
		    	return Redirect::to('message')->with('notify_success','Message sending failed');
			}

	    }

		
	}	


	public function get_replyall($id)
	{
		$this->crumb->add('message/replyall/'.$id,'Reply All');

		$msg = new Message();

		$_id = new MongoId($id);

		$message = $msg->get(array('_id'=>$_id));

		$message['to'] = $message['from'];

		$message['from'] = Auth::user()->email;

		$message['subject'] = 'Re: '.$message['subject'];

		$message['prevbcc'] = $message['bcc'];

		$message['bcc'] = '';

		$message['body'] = "<br /><q>".$message['body']."</q>";


		$ckeditor = new CKEditor();

		$form = new Formly($message);

		return View::make('message.replyall')
			->with('id',$id)
			->with('form',$form)
			->with('message',$message)
			->with('editor',$ckeditor)
	        ->with('crumb',$this->crumb)
			->with('title','Reply All');
	}

	public function post_replyall($id){

		$rules = array(
	        'subject'  => 'required'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('message/replyall/'.$id)->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();
	    	
	    	//print_r($data);

			//pre save transform
			unset($data['csrf_token']);

			$data['createdDate'] = new MongoDate();
			$data['lastUpdate'] = new MongoDate();
			$data['creatorName'] = Auth::user()->fullname;
			$data['creatorId'] = Auth::user()->id;

			$data['from'] = Auth::user()->email;
			
			//$docupload = Input::file('docupload');

			$data['bcc'] = implode(',',array($data['bcc'],$data['prevbcc']));

			$data['recipients'] = explode(',',$data['to']);

			$status = explode(',',$data['to']);

			$data['status'] = array();

			foreach ($status as $st) {
				$data['status'][$st] = 'Delivered';
			}

			$document = new Message();

			$newobj = $document->insert($data);

			if($newobj){

				/*
				if($docupload['name'] != ''){

					$newid = $newobj['_id']->__toString();

					$newdir = realpath(Config::get('parama.storage')).'/'.$newid;

					Input::upload('docupload',$newdir,$docupload['name']);
					
				}

				$sharedto = explode(',',$data['docShare']);

				if(count($sharedto) > 0  && $data['docShare'] != ''){
					foreach($sharedto as $to){
						Event::fire('document.share',array('id'=>$newobj['_id'],'sharer_id'=>Auth::user()->id,'shareto'=>$to));
					}
				}
				*/


				Event::fire('message.send',array('id'=>$newobj['_id'],'result'=>'OK','department'=>Auth::user()->department,'creator'=>Auth::user()->id));

		    	return Redirect::to('message')->with('notify_success','Message sent successfully');
			}else{
				Event::fire('message.send',array('id'=>$id,'result'=>'FAILED'));
		    	return Redirect::to('message')->with('notify_success','Message sending failed');
			}

	    }

		
	}	


	public function get_new()
	{
		$form = new Formly();
		$ckeditor = new CKEditor();

		return View::make('message.new')
			->with('form',$form)
			->with('editor',$ckeditor)
			->with('title','Compose Message');
	}

	public function post_new(){

		$rules = array(
	        'subject'  => 'required'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('message/new')->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();
	    	
	    	//print_r($data);

			//pre save transform
			unset($data['csrf_token']);

			$data['createdDate'] = new MongoDate();
			$data['lastUpdate'] = new MongoDate();
			$data['creatorName'] = Auth::user()->fullname;
			$data['creatorId'] = Auth::user()->id;

			$data['from'] = Auth::user()->email;
			
			//$docupload = Input::file('docupload');

			$data['recipients'] = explode(',',$data['to']);

			$status = explode(',',$data['to']);

			$data['status'] = array();

			foreach ($status as $st) {
				$data['status'][$st] = 'Delivered';
			}

			$document = new Message();

			$newobj = $document->insert($data);

			if($newobj){

				/*
				if($docupload['name'] != ''){

					$newid = $newobj['_id']->__toString();

					$newdir = realpath(Config::get('parama.storage')).'/'.$newid;

					Input::upload('docupload',$newdir,$docupload['name']);
					
				}

				$sharedto = explode(',',$data['docShare']);

				if(count($sharedto) > 0  && $data['docShare'] != ''){
					foreach($sharedto as $to){
						Event::fire('document.share',array('id'=>$newobj['_id'],'sharer_id'=>Auth::user()->id,'shareto'=>$to));
					}
				}
				*/


				Event::fire('message.send',array('id'=>$newobj['_id'],'result'=>'OK','department'=>Auth::user()->department,'creator'=>Auth::user()->id));

		    	return Redirect::to('message')->with('notify_success','Message sent successfully');
			}else{
				Event::fire('message.send',array('id'=>$id,'result'=>'FAILED'));
		    	return Redirect::to('message')->with('notify_success','Message sending failed');
			}

	    }

		
	}	

	public function get_read($id){

		$this->crumb->add('message/read/'.$id,'Read',false);
		$id = new MongoId($id);

		$document = new Message();

		$doc = $document->get(array('_id'=>$id));

		$this->crumb->add('message/read/'.$id,$doc['subject']);

		return View::make('message.read')
			->with('crumb',$this->crumb)
			->with('doc',$doc);
	}


	public function get_view($id){
		$id = new MongoId($id);

		$document = new Message();

		$doc = $document->get(array('_id'=>$id));

		return View::make('pop.message')->with('doc',$doc);
	}

}