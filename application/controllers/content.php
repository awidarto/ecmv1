<?php

class Content_Controller extends Base_Controller {

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
		$this->crumb->add('content','Articles');
	}

	public function get_index()
	{
		$heads = array('#','Articles','Category','Tags','Action');
		$colclass = array('one','','two','one');
		//$searchinput = array(false,'title','created','last update','creator','project manager','tags',false);
		$searchinput = array(false,'project','tags',false);

		return View::make('tables.simple')
			->with('title','Articles')
			->with('newbutton','New Article')
			->with('disablesort','0,3')
			->with('addurl','content/add')
			->with('colclass',$colclass)
			->with('searchinput',$searchinput)
			->with('ajaxsource',URL::to('content'))
			->with('ajaxdel',URL::to('content/del'))
	        ->with('crumb',$this->crumb)
			->with('heads',$heads);
	}

	public function post_index()
	{
		$fields = array(array('title','body'),'projectTag');

		$rel = array('like','like');

		$cond = array('both','both');

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
					if(is_array($field)){
						$q = array('$or'=>'');
						$sub = array();
						foreach($field as $f){
							if($cond[$idx] == 'both'){
								$sub[] = array($f=> new MongoRegex('/'.Input::get('sSearch_'.$idx).'/i') );
							}else if($cond[$idx] == 'before'){
								$sub[] = array($f=> new MongoRegex('/^'.Input::get('sSearch_'.$idx).'/i') );						
							}else if($cond[$idx] == 'after'){
								$sub[] = array($f=> new MongoRegex('/'.Input::get('sSearch_'.$idx).'$/i') );						
							}
						}
						$q['$or'] = $sub;
					}else{
						if($cond[$idx] == 'both'){
							$q[$field] = new MongoRegex('/'.Input::get('sSearch_'.$idx).'/i');
						}else if($cond[$idx] == 'before'){
							$q[$field] = new MongoRegex('/^'.Input::get('sSearch_'.$idx).'/i');						
						}else if($cond[$idx] == 'after'){
							$q[$field] = new MongoRegex('/'.Input::get('sSearch_'.$idx).'$/i');						
						}						
					}
				}else if($rel[$idx] == 'equ'){
					$q[$field] = Input::get('sSearch_'.$idx);
				}
			}
			$idx++;
		}


		$document = new Content();

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

			$item = View::make('content.item')->with('doc',$doc)->with('popsrc','content/view')->with('tags',$tags)->render();

			$item = str_replace($hilite, $hilite_replace, $item);

			$aadata[] = array(
				$counter,
				$item,
				$doc['category'],
				$tags,
				'<a href="'.URL::to('content/view/'.$doc['_id']).'"><i class="foundicon-clock action"></i></a>&nbsp;'.
				'<a href="'.URL::to('content/edit/'.$doc['_id']).'"><i class="foundicon-edit action"></i></a>&nbsp;'.
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

	public function get_add(){

		$this->crumb->add('content/add','New Article');

		$ckeditor = new CKEditor();

		$form = new Formly();
		return View::make('content.new')
			->with('form',$form)
			->with('editor',$ckeditor)
			->with('crumb',$this->crumb)
			->with('title','New Article');

	}

	public function post_add(){

		//print_r(Session::get('permission'));

	    $rules = array(
	        'title'  => 'required|max:50',
	        'description' => 'required',
	        'category'=> 'required'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('content/add')->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();
	    	
	    	//print_r($data);
			
			$data['published'] = (isset($data['published']))?1:0;
			$data['always'] = (isset($data['always']))?1:0;

			if($data['slug'] == ''){
				$slug = str_replace(array(',','.'),'', $data['title']);
				$slug = str_replace(array(' ','_'),'-', $data['title']);
				$slug = strtolower($slug);
				$data['slug'] = $slug;
			}

			//pre save transform
			unset($data['csrf_token']);

			$data['startDate'] = new MongoDate(strtotime($data['startDate']." 00:00:00"));
			$data['endDate'] = new MongoDate(strtotime($data['endDate']." 00:00:00"));

			$data['createdDate'] = new MongoDate();
			$data['lastUpdate'] = new MongoDate();
			$data['creatorName'] = Auth::user()->fullname;
			$data['creatorId'] = Auth::user()->id;
			
			$data['tags'] = explode(',',$data['tag']);

			$content = new Content();

			$newobj = $content->insert($data);

			if($newobj){

				if(count($data['tags']) > 0){
					$tag = new Tag();
					foreach($data['tags'] as $t){
						$tag->update(array('tag'=>$t),array('$inc'=>array('count'=>1)),array('upsert'=>true));
					}
				}

				Event::fire('article.create',array('id'=>$newobj['_id'],'result'=>'OK'));

		    	return Redirect::to('content')->with('notify_success','Article saved successfully');
			}else{
				Event::fire('article.create',array('id'=>$id,'result'=>'FAILED'));
		    	return Redirect::to('content')->with('notify_success','Article saving failed');
			}

	    }
	}

	public function get_edit($id = null){

		$this->crumb->add('content/edit/'.$id,'Edit',false);

		$doc = new Content();

		$id = (is_null($id))?Auth::user()->id:$id;

		$id = new MongoId($id);

		$doc_data = $doc->get(array('_id'=>$id));

		$doc_data['oldTag'] = $doc_data['tag'];

		$doc_data['startDate'] = date('d-m-Y', $doc_data['startDate']->sec);
		$doc_data['endDate'] = date('d-m-Y', $doc_data['endDate']->sec);

		$this->crumb->add('project/edit/'.$id,$doc_data['title']);

		$ckeditor = new CKEditor();

		$form = Formly::make($doc_data);

		return View::make('content.edit')
					->with('doc',$doc_data)
					->with('form',$form)
					->with('editor',$ckeditor)
					->with('crumb',$this->crumb)
					->with('title','Edit Project');

	}


	public function post_edit($id){

		//print_r(Session::get('permission'));

	    $rules = array(
	        'title'  => 'required|max:50',
	        'description' => 'required',
	        'category'=> 'required'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('content/edit/'.$id)->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();

			print_r($data);
	    	
			$id = new MongoId($data['id']);

			$data['published'] = (isset($data['published']))?1:0;
			$data['always'] = (isset($data['always']))?1:0;

			$data['startDate'] = new MongoDate(strtotime($data['startDate']." 00:00:00"));
			$data['endDate'] = new MongoDate(strtotime($data['endDate']." 00:00:00"));
			$data['lastUpdate'] = new MongoDate();

			unset($data['csrf_token']);
			unset($data['id']);

			$data['tags'] = explode(',',$data['tag']);

			$doc = new Content();

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

				Event::fire('article.update',array('id'=>$id,'result'=>'OK'));

		    	return Redirect::to('content')->with('notify_success','Article saved successfully');
			}else{

				Event::fire('article.update',array('id'=>$id,'result'=>'FAILED'));

		    	return Redirect::to('content')->with('notify_success','Article saving failed');
			}

	    }

	}

	public function post_del(){
		$id = Input::get('id');

		$user = new Content();

		if(is_null($id)){
			$result = array('status'=>'ERR','data'=>'NOID');
		}else{

			$id = new MongoId($id);


			if($user->delete(array('_id'=>$id))){
				Event::fire('article.delete',array('id'=>$id,'result'=>'OK'));
				$result = array('status'=>'OK','data'=>'CONTENTDELETED');
			}else{
				Event::fire('article.delete',array('id'=>$id,'result'=>'FAILED'));
				$result = array('status'=>'ERR','data'=>'DELETEFAILED');				
			}
		}

		print json_encode($result);
	}

	public function get_view($section,$category = null,$slug = null){

		$this->crumb->add('content/view/'.$section,ucfirst($section));

		$this->crumb->add('content/view/'.$section.'/'.$category,ucfirst($category));


		if(is_null($slug)){
			$heads = array('#','Articles','Section','Category','Tags');
			$colclass = array('one','','one','one','two');
			//$searchinput = array(false,'title','created','last update','creator','project manager','tags',false);
			$searchinput = array(false,'article',false,false,'tags');

			return View::make('tables.simple')
				->with('title','Articles')
				->with('newbutton','New Article')
				->with('disablesort','0')
				->with('colclass',$colclass)
				->with('searchinput',$searchinput)
				->with('ajaxsource',URL::to('content/view/'.$section.'/'.$category))
				->with('ajaxdel',URL::to('content/del'))
		        ->with('crumb',$this->crumb)
				->with('heads',$heads);
		}else{

			$content = new Content();

			$article = $content->get(array('slug'=>$slug));

			$this->crumb->add('content/view/'.$section.'/'.$category.'/'.$slug,$article['title']);

			return View::make('content.view')
				->with('crumb',$this->crumb)
				->with('title',$article['title'])
				->with('body', $article['body']);

		}

		$project = new Content();

		$_id = new MongoId($id);

		$projectdata = $project->get(array('_id'=>$_id));

	}

	public function post_view($section,$category = null)
	{
		$fields = array(array('title','body'),'projectTag');

		$rel = array('like','like');

		$cond = array('both','both');

		$pagestart = Input::get('iDisplayStart');
		$pagelength = Input::get('iDisplayLength');

		$limit = array($pagelength, $pagestart);

		$defsort = 1;
		$defdir = -1;

		$idx = 0;
		$q = array();

		$q['section'] = $section;
		if(!is_null($category)){
			$q['category'] = $category;
		}

		$hilite = array();
		$hilite_replace = array();
		foreach($fields as $field){
			if(Input::get('sSearch_'.$idx))
			{
				$hilite_item = Input::get('sSearch_'.$idx);
				$hilite[] = $hilite_item;
				$hilite_replace[] = '<span class="hilite">'.$hilite_item.'</span>';

				if($rel[$idx] == 'like'){
					if(is_array($field)){
						$q = array('$or'=>'');
						$sub = array();
						foreach($field as $f){
							if($cond[$idx] == 'both'){
								$sub[] = array($f=> new MongoRegex('/'.Input::get('sSearch_'.$idx).'/i') );
							}else if($cond[$idx] == 'before'){
								$sub[] = array($f=> new MongoRegex('/^'.Input::get('sSearch_'.$idx).'/i') );						
							}else if($cond[$idx] == 'after'){
								$sub[] = array($f=> new MongoRegex('/'.Input::get('sSearch_'.$idx).'$/i') );						
							}
						}
						$q['$or'] = $sub;
					}else{
						if($cond[$idx] == 'both'){
							$q[$field] = new MongoRegex('/'.Input::get('sSearch_'.$idx).'/i');
						}else if($cond[$idx] == 'before'){
							$q[$field] = new MongoRegex('/^'.Input::get('sSearch_'.$idx).'/i');						
						}else if($cond[$idx] == 'after'){
							$q[$field] = new MongoRegex('/'.Input::get('sSearch_'.$idx).'$/i');						
						}						
					}
				}else if($rel[$idx] == 'equ'){
					$q[$field] = Input::get('sSearch_'.$idx);
				}
			}
			$idx++;
		}


		$document = new Content();

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

			$item = View::make('content.item')->with('doc',$doc)->with('popsrc','content/view')->with('tags',$tags)->render();

			$item = str_replace($hilite, $hilite_replace, $item);

			$aadata[] = array(
				$counter,
				$item,
				$doc['section'],
				$doc['category'],
				$tags
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


	public function get_scheduleitems($id)
	{
		$project = new Project();

		$_id = new MongoId($id);

		$schedule = $project->get(array('_id'=>$_id),array('schedules'));

		$schedules = array();

		if(isset($schedule)){
			$seq = 0;
			foreach ($schedule['schedules'] as $val) {
				$from = $val['values'][0]['from']->sec * 1000;
				$val['values'][0]['from'] = '/Date('.$from.')/';
				
				$to = $val['values'][0]['to']->sec * 1000;
				$val['values'][0]['to'] = '/Date('.$to.')/';

				$val['values'][0]['dataObj'] = array('item_id'=>$id.'_'.$seq);

				$schedules[] = $val;

				$seq++;

			}			
		}

		return Response::json($schedules);
	}

	public function get_addscitem(){

	}

	public function get_postscitem(){
		
	}

}