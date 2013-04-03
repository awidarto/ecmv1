<?php

class Opportunity_Controller extends Base_Controller {

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
		$this->crumb->add('opportunity','Opportunity');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function get_index()
	{
		$heads = array(
			'#',
			'Date',
			'Opportunity Number',
			'Company',
			//'clientStreet',
			//'clientCity',
			//'clientZIP',
			//'clientPhone',
			//'clientFax',
			//'clientEmail',
			//'clientWebsite',
			'Project Name',
			'Target Scope Description',
			'Closing Date',
			'Opportunity PIC',
			//'Estimated Currency',
			//'Estimated Value',
			//'Equivalent Estimated Currency',
			//'Equivalent Estimated Value',
			'Opportunity Status',
			'Opportunity Remark',
			//'opportunityApproval',
			//'opportunityShare',
			//'opportunityDepartment',
			//'opportunityLead',
			//'createdDate',
			//'lastUpdate',
			'Tags',
			'Action'
		);

		$colclass = array('one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one');
		//$colclass = false;
		//$searchinput = array(false,'title','created','last update','creator','opportunity manager','tags',false);
		$searchinput = array(false,

			'opportunityDate',
			'opportunityNumber',
			'clientCompany',
			//'clientStreet',
			//'clientCity',
			//'clientZIP',
			//'clientPhone',
			//'clientFax',
			//'clientEmail',
			//'clientWebsite',
			'projectName',
			'targetScopeDescription',
			'closingDate',
			'opportunityPIC',
			//'estimatedCurrency',
			//'estimatedValue',
			//'equivalentEstimatedCurrency',
			//'equivalentEstimatedValue',
			'opportunityStatus',
			'opportunityRemark',
			//'opportunityApproval',
			//'opportunityShare',
			//'opportunityDepartment',
			//'opportunityLead',
			//'createdDate',
			//'lastUpdate',
			'opportunityTag'

			,false);

		return View::make('tables.noaside')
			->with('title','Opportunity')
			->with('newbutton','New Opportunity')
			->with('disablesort','0,3')
			->with('addurl','opportunity/add')
			->with('importbutton','Import Opportunity Data')
			->with('importurl','import/doimport/opportunity')
			->with('excludecol','14,15,16,17,18,19,20,21,22')
			->with('colclass',$colclass)
			->with('searchinput',$searchinput)
			->with('ajaxsource',URL::to('opportunity'))
			->with('ajaxdel',URL::to('opportunity/del'))
	        ->with('crumb',$this->crumb)
			->with('heads',$heads);
	}


	public function post_index()
	{



		$fields = array(
			'opportunityDate',
			'opportunityNumber',
			'clientCompany',
			//'clientStreet',
			//'clientCity',
			//'clientZIP',
			//'clientPhone',
			//'clientFax',
			//'clientEmail',
			//'clientWebsite',
			'projectName',
			'targetScopeDescription',
			'closingDate',
			'opportunityPIC',
			//'estimatedCurrency',
			//'estimatedValue',
			//'equivalentEstimatedCurrency',
			//'equivalentEstimatedValue',
			'opportunityStatus',
			'opportunityRemark',
			//'opportunityApproval',
			//'opportunityShare',
			//'opportunityDepartment',
			//'opportunityLead',
			//'createdDate',
			//'lastUpdate',
			'opportunityTag'
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

		$self_email = new MongoRegex('/'.Auth::user()->email.'/i');


		if( Auth::user()->role == 'root' ||
			Auth::user()->role == 'super' ||
			Auth::user()->role == 'president_director' ||
			Auth::user()->role == 'bod'
			){
			
			// roots can see all

		}else if( Auth::user()->role == 'client' ||
			Auth::user()->role == 'principal_vendor' ||
			Auth::user()->role == 'subcon'){

		}else{

			$q['$or'] = array(
				array('opportunityShare'=>$self_email),
				array('opportunityPIC'=>$self_email),
				array('creatorId'=>Auth::user()->id)
				);

		}


		//print_r($q)

		$document = new Opportunity();

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
			
			if(isset($doc['tags']) && is_array($doc['tags']) && implode('',$doc['tags']) != ''){
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

			/*
			'opportunityNumber',
			'clientCompany',
			//'clientStreet',
			//'clientCity',
			//'clientZIP',
			//'clientPhone',
			//'clientFax',
			//'clientEmail',
			//'clientWebsite',
			'projectName',
			'targetScopeDescription',
			'closingDate',
			'opportunitySystem',
			'opportunityPIC',
			'estimatedCurrency',
			'estimatedPrice',
			'equivalentEstimatedCurrency',
			'equivalentEstimatedPrice',
			'opportunityStatus',
			'opportunityRemark',
			//'opportunityApproval',
			//'opportunityShare',
			//'opportunityDepartment',
			//'opportunityLead',
			//'createdDate',
			//'lastUpdate',
			'opportunityTag'

			*/

				date('d-m-Y', $doc['opportunityDate']->sec),
				HTML::link('opportunity/view/'.$doc['_id'],$doc['opportunityNumber']),
				$doc['clientCompany'],
				$doc['projectName'],
				$doc['targetScopeDescription'],
				date('d-m-Y', $doc['closingDate']->sec),
				str_replace(',', ', ', $doc['opportunityPIC']),
				//$doc['estimatedCurrency'],
				//number_format((double)$doc['estimatedValue'],2,',','.'),
				//$doc['equivalentEstimatedCurrency'],
				//number_format((double)$doc['equivalentEstimatedValue'],2,',','.'),
				$doc['opportunityStatus'],
				$doc['opportunityRemark'],
				//$doc['opportunityApproval'],
				//$doc['opportunityShare'],
				//$doc['opportunityDepartment'],
				//$doc['opportunityLead'],
				//date('d-m-Y H:i:s', $doc['createdDate']->sec),
				//isset($doc['lastUpdate'])?date('d-m-Y H:i:s', $doc['lastUpdate']->sec):'',
				$tags,
				'<a href="'.URL::to('opportunity/edit/'.$doc['_id']).'"><i class="foundicon-edit action has-tip tip-bottom noradius" title="Edit"></i></a>&nbsp;'.
				'<i class="foundicon-trash action del has-tip tip-bottom noradius" id="'.$doc['_id'].'" title="Delete"></i>'
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


	public function __post_index()
	{
		$fields = array(array('title','body'),'opportunityTag');

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


		$document = new Opportunity();

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

			$item = View::make('opportunity.item')->with('doc',$doc)->with('popsrc','opportunity/view')->with('tags',$tags)->render();

			$item = str_replace($hilite, $hilite_replace, $item);

			$aadata[] = array(
				$counter,
				$item,
				$tags,
				'<a href="'.URL::to('opportunity/edit/'.$doc['_id']).'"><i class="foundicon-edit action"></i></a>&nbsp;'.
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

		$this->crumb->add('opportunity/add','New Opportunity');

		$form = new Formly();
		return View::make('opportunity.new')
					->with('form',$form)
					->with('crumb',$this->crumb)
					->with('title','New Opportunity');

	}


	public function post_add(){

		//print_r(Session::get('permission'));

	    $rules = array(
	        'opportunityNumber'  => 'required|max:50',
	        'targetScopeDescription' => 'required'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('opportunity/add')->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();
	    	
	    	//print_r($data);

	    	
			//pre save transform
			unset($data['csrf_token']);

			$data['opportunityDate'] =($data['opportunityDate'] == '')?'': new MongoDate(strtotime($data['opportunityDate'].' 00:00:00'));
			$data['closingDate'] = ($data['closingDate']== '')?'':new MongoDate(strtotime($data['closingDate'].' 00:00:00'));

			$data['createdDate'] = new MongoDate();
			$data['lastUpdate'] = new MongoDate();
			$data['creatorName'] = Auth::user()->fullname;
			$data['creatorId'] = Auth::user()->id;
			
			$data['tags'] = explode(',',$data['opportunityTag']);

			$data['opportunityContactPersons'] = array();

			$data['saveToContact'] = (isset($data['saveToContact']))?$data['saveToContact']:'No';

			$opportunity = new Opportunity();

			$newobj = $opportunity->insert($data);

			if($newobj){

				if(count($data['tags']) > 0){
					$tag = new Tag();
					foreach($data['tags'] as $t){
						$tag->update(array('tag'=>$t),array('$inc'=>array('count'=>1)),array('upsert'=>true));
					}
				}

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


				Event::fire('opportunity.create',array('id'=>$newobj['_id'],'result'=>'OK'));
				
		    	return Redirect::to('opportunity')->with('notify_success','Document saved successfully');
			}else{
				Event::fire('opportunity.create',array('id'=>$id,'result'=>'FAILED'));
		    	return Redirect::to('opportunity')->with('notify_success','Document saving failed');
			}

	    }
	}

	public function get_edit($id = null){

		$this->crumb->add('opportunity/edit/'.$id,'Edit',false);

		$doc = new Opportunity();

		$id = (is_null($id))?Auth::user()->id:$id;

		$id = new MongoId($id);

		$doc_data = $doc->get(array('_id'=>$id));

		$doc_data['oldTag'] = $doc_data['opportunityTag'];

		unset($doc_data['saveToContact']);

		$doc_data['opportunityDate'] = (isset($doc_data['opportunityDate']))?date('d-m-Y', $doc_data['opportunityDate']->sec):'';
		$doc_data['closingDate'] = (isset($doc_data['closingDate']))?date('d-m-Y', $doc_data['closingDate']->sec):'';

		$this->crumb->add('opportunity/edit/'.$id,$doc_data['opportunityNumber']);

		$form = Formly::make($doc_data);

		return View::make('opportunity.edit')
					->with('doc',$doc_data)
					->with('form',$form)
					->with('crumb',$this->crumb)
					->with('title','Edit Opportunity');

	}


	public function post_edit($id){

		//print_r(Session::get('permission'));

	    $rules = array(
	        'opportunityNumber'  => 'required|max:50',
	        'targetScopeDescription' => 'required'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('opportunity/edit/'.$id)->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();
	    	
			$id = new MongoId($data['id']);

			$data['opportunityDate'] = new MongoDate(strtotime($data['opportunityDate']." 00:00:00"));
			$data['closingDate'] = new MongoDate(strtotime($data['closingDate']." 00:00:00"));
			$data['lastUpdate'] = new MongoDate();

			$data['saveToContact'] = (isset($data['saveToContact']))?$data['saveToContact']:'No';

			unset($data['csrf_token']);
			unset($data['id']);

			$data['tags'] = explode(',',$data['opportunityTag']);

			$doc = new Opportunity();

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


				Event::fire('opportunity.update',array('id'=>$id,'result'=>'OK'));

		    	return Redirect::to('opportunity')->with('notify_success','Opportunity saved successfully');
			}else{

				Event::fire('opportunity.update',array('id'=>$id,'result'=>'FAILED'));

		    	return Redirect::to('opportunity')->with('notify_success','Opportunity saving failed');
			}

	    }

	}

	public function post_del(){
		$id = Input::get('id');

		$user = new Opportunity();

		if(is_null($id)){
			$result = array('status'=>'ERR','data'=>'NOID');
		}else{

			$id = new MongoId($id);


			if($user->delete(array('_id'=>$id))){
				Event::fire('opportunity.delete',array('id'=>$id,'result'=>'OK'));
				$result = array('status'=>'OK','data'=>'CONTENTDELETED');
			}else{
				Event::fire('opportunity.delete',array('id'=>$id,'result'=>'FAILED'));
				$result = array('status'=>'ERR','data'=>'DELETEFAILED');				
			}
		}

		print json_encode($result);
	}

	public function get_scheduleitems($id)
	{
		$project = new Opportunity();

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


	public function get_view($id = null){

		$project = new Opportunity();

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
			/*
			if(Auth::user()->department == $type){
				$q['$or'] = array(
					array('access'=>'general'),
					array('docShare'=>$sharecriteria)
				);
			}else{
			*/
				$q['docShare'] = $sharecriteria;
			//}

			$shared = $doc->count($q);
			$created = $doc->count($q);

			if($shared > 0 || $created > 0){
				$can_open = true;
			}
		}

		$permissions = Auth::user()->permissions;

		$contactheads = array('#','Name','Position','Email','Direct Line','Mobile');

		$contactsearchinput = false;

		return View::make('opportunity.detail')
			->with('title','Opportunity Detail - '.$projectdata['opportunityNumber'])
			->with('opportunity', $projectdata)
			->with('newbutton','New Schedule Item')
			->with('newprogressbutton','New Progress Report')
			->with('addurl','opportunity/addschitem')
			->with('ajaxsource',URL::to('opportunity/scheduleitems/'.$id))
			->with('disablesort','0')
			->with('ajaxsourcedoc',URL::to('opportunity/doc/'.$id.'/'.$projectdata['opportunityNumber']))
			->with('ajaxsourcecontact',URL::to('opportunity/contact/'.$id))
			->with('ajaxsourceprogress',URL::to('opportunity/progress/'.$id))
			->with('searchinput',$searchinput)
			->with('heads',$heads)
			->with('contactheads',$contactheads)
			->with('contactsearchinput',$contactsearchinput)
			->with('ajaxdel',URL::to('opportunity/del'));
	}

	public function post_progress($id = null)
	{

		$fields = array('timestamp','initial','progress','cinitial','comments');

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
			$q['opportunityId'] = $id;
		}

		$document = new Progress();

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

		$form = new Formly();

		$aadata = array();

		$counter = 1 + $pagestart;
		foreach ($documents as $doc) {

			$commentform = $form->textarea('addcomment','','',array('placeholder'=>'Add Comment','rows'=>2,'class'=>'comment_form','id'=>'comment_'.$doc['_id']));
			$commentform .= Form::button('Add',array('class'=>'button right addcomment','id'=>$doc['_id']));

			$comments = '<table>';
			foreach($doc['comments'] as $c){
				$timestamp = date('d-m-Y h:i:s',$c['timestamp']->sec);
				$comments .= '<tr>';
				$comments .= '<td class="one commentBy">'.$c['commenterInitial'].'</td>';
				$comments .= '<td><span class="commentTime">'.$timestamp.'</span><p>'.$c['comment'].'</p></td>';
				$comments .= '</tr>';
			}
			$comments .= '</table>';

			$aadata[] = array(
				$counter,
				date('d-m-Y H:i:s', $doc['timestamp']->sec),
				$doc['userInitial'],
				$doc['progressInput'],
				$comments.$commentform,
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


	public function post_doc($id,$num)
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
		$sq = array();

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
						$sq[$field] = new MongoRegex('/'.Input::get('sSearch_'.$idx).'/i');
					}else if($cond[$idx] == 'before'){
						$sq[$field] = new MongoRegex('/^'.Input::get('sSearch_'.$idx).'/i');
					}else if($cond[$idx] == 'after'){
						$sq[$field] = new MongoRegex('/'.Input::get('sSearch_'.$idx).'$/i');
					}
				}else if($rel[$idx] == 'equ'){
					$sq[$field] = Input::get('sSearch_'.$idx);
				}
			}
			$idx++;
		}


		$sharecriteria = new MongoRegex('/'.Auth::user()->email.'/i');

		if( Auth::user()->role == 'root' ||
			Auth::user()->role == 'super' ||
			Auth::user()->role == 'president_director' ||
			Auth::user()->role == 'bod'
			){

			$q = array(
				'docOpportunity' => trim($num),
				'$or'=>array(
						array('deleted'=>false),
						array('deleted'=>array('$exists'=>false))
					)
				);

		}else if( Auth::user()->role == 'client' ||
			Auth::user()->role == 'principal_vendor' ||
			Auth::user()->role == 'subcon'){

			$q = array(
				'docOpportunity' => trim($num),
				'$or'=>array(
						array('docShare'=>$sharecriteria),
						array('creatorId'=>Auth::user()->id),
						array('deleted'=>false),
						array('deleted'=>array('$exists'=>false))
				)
			);

		}else{
			$q = array(
				'docOpportunity' => trim($num),
				'$or'=>array(
						//array('docProjectId' => $id),
						array('access' => 'departmental'),
						//array('access' => 'general'),
						array('docShare'=>$sharecriteria),
						array('creatorId'=>Auth::user()->id),
						array('deleted'=>false),
						array('deleted'=>array('$exists'=>false))
				)
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

		if(count($sq) > 0){
			$q = array_merge($sq,$q);
		}

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

			$type = $doc['docDepartment'];

			if($doc['creatorId'] == Auth::user()->id){
				$edit = '<a href="'.URL::to('document/edit/'.$doc['_id'].'/'.$type).'">'.
						'<i class="foundicon-edit action has-tip tip-bottom noradius" title="Edit"></i></a>&nbsp;';
				$del = '<i class="foundicon-trash action del has-tip tip-bottom noradius" title="Delete" id="'.$doc['_id'].'"></i>';
				$download = '<a href="'.URL::to('document/dl/'.$doc['_id'].'/'.$type).'">'.
							'<i class="foundicon-inbox action has-tip tip-bottom noradius" title="Download"></i></a>&nbsp;';
			}else{


				if(isset($doc['interaction']) && $doc['interaction'] == 'rw'){
					if($permissions->{$type}->edit == 1){
						$edit = '<a href="'.URL::to('document/edit/'.$doc['_id'].'/'.$type).'">'.
								'<i class="foundicon-edit action has-tip tip-bottom noradius" title="Edit"></i></a>&nbsp;';
					}else{
						$edit = '';
					}

					if($permissions->{$type}->delete == 1){
						$del = '<i class="foundicon-trash action  has-tip tip-bottom noradius del" title="Delete" id="'.$doc['_id'].'"></i>';
					}else{
						$del = '';
					}

					if(isset($permissions->{$type}->download) && $permissions->{$type}->download == 1){
						$download = '<a href="'.URL::to('document/dl/'.$doc['_id'].'/'.$type).'">'.
								'<i class="foundicon-inbox action has-tip tip-bottom noradius" title="Download"></i></a>&nbsp;';
					}else{
						$download = '';
					}
				}else{
					$edit = '';
					$del = '';
					$download = '';
				}

			}

			$aadata[] = array(
				$counter,
				'<span class="metaview" id="'.$doc['_id'].'">'.$doc['title'].'</span>',
				//date('d-m-Y H:i:s', $doc['createdDate']->sec),
				isset($doc['lastUpdate'])?date('d-m-Y H:i:s', $doc['lastUpdate']->sec):'',
				$doc['creatorName'],
				isset($doc['docFilename'])?'<span class="fileview" id="'.$doc['_id'].'">'.$doc['docFilename'].'</span>':'',
				$edit.$download.$del
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



	public function __post_doc($id = null)
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
			$q['docOpportunityId'] = $id;
		}

		$sharecriteria = new MongoRegex('/'.Auth::user()->email.'/i');

		if( Auth::user()->role == 'root' ||
			Auth::user()->role == 'super' ||
			Auth::user()->role == 'president_director' ||
			Auth::user()->role == 'bod'
			){

				$q = array(
					'docTender' => trim($num),
					'$or'=>array(
							array('deleted'=>false),
							array('deleted'=>array('$exists'=>false)),
						)
					);


		}else if( Auth::user()->role == 'client' ||
			Auth::user()->role == 'principal_vendor' ||
			Auth::user()->role == 'subcon'){

			$q['$or'] = array(
				array('creatorId'=>Auth::user()->id),
				array('docShare'=>$sharecriteria)
			);

		}else{
			/*
			if(Auth::user()->department == $type){
				$q['$or'] = array(
					array('access'=>'general'),
					array('docShare'=>$sharecriteria)
				);
			}else{
			*/
				$q['docShare'] = $sharecriteria;
			//}
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

			$deleted = (isset($doc['deleted']) && $doc['deleted'] == true)?'*':'';

			$doc['title'] = str_ireplace($hilite, $hilite_replace, $doc['title']);
			$doc['creatorName'] = str_ireplace($hilite, $hilite_replace, $doc['creatorName']);

			$aadata[] = array(
				$counter,
				'<span class="metaview" id="'.$doc['_id'].'">'.$doc['title'].$deleted.'</span>',
				//date('d-m-Y H:i:s', $doc['createdDate']->sec),
				isset($doc['lastUpdate'])?date('d-m-Y H:i:s', $doc['lastUpdate']->sec):'',
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

	public function get_transfer($id,$num){

		$form = new Formly();

		return View::make('opportunity.transfer')
			->with('form',$form)
			->with('num',$num)
			->with('ajaxpost','opportunity/transfer/'.$id.'/'.$num)
			->with('id',$id);
	}

	public function post_transfer($id,$num){

		$tinput = Input::get();

		$opportunity = new Opportunity();

		$_id = new MongoId($id);

		$tnumber = $tinput['docTender'];
		$tid = $tinput['docTenderId'];

		$tender = new Tender();

		$tobj = $tender->get(array('tenderNumber'=>$tnumber));

		$tenderData = array(
			'docTender'=>$tobj['tenderNumber'],
			'docTenderId'=>$tobj['_id']->__toString()
		);

		$document = new Document();

		if($document->update(array('docOpportunity'=>trim($num)),array('$set'=>$tenderData),array('upsert'=>true))){
			return Response::json(array('status'=>'OK'));
		}else{
			return Response::json(array('status'=>'ERR'));
		}

	}


	public function post_addcontact($id){

		$newcontact = Input::get();

		$contact = new Person();

		if($newcontact['personId'] == ''){
			$contact->update(array('personEmail'=>$newcontact['personEmail']),array('$set'=>$newcontact),array('upsert'=>true));
			//$contact->insert($newcontact,array('upsert'=>true));
		}

		$opportunity = new Opportunity();

		$_id = new MongoId($id);

		$pushData['opportunityContactPersons'] = $newcontact;

		if($opportunity->get(array('opportunityContactPersons.personEmail'=>$newcontact['personEmail']))){
			return Response::json(array('status'=>'CONTACTEXISTS'));
		}else{
			if($opportunity->update(array('_id'=>$_id),array('$addToSet'=>$pushData),array('upsert'=>true))){
				return Response::json(array('status'=>'OK'));
			}else{
				return Response::json(array('status'=>'ERR'));
			}
		}

	}

	public function post_addprogress($id){

		$newprogress = Input::get();

		$newprogress['timestamp'] = new MongoDate();
		$newprogress['opportunityId'] = $id;
		$newprogress['comments'] = array();

		$progress = new Progress();

		if($pobj = $progress->insert($newprogress)){
			/*
			$opportunity = new Opportunity();

			$_id = new MongoId($id);

			$pushData['opportunityProgress'] = $newprogress;

			if($opportunity->get(array('opportunityContactPersons.personEmail'=>$newcontact['personEmail']))){
				return Response::json(array('status'=>'CONTACTEXISTS'));
			}else{
				if($opportunity->update(array('_id'=>$_id),array('$addToSet'=>$pushData),array('upsert'=>true))){
					return Response::json(array('status'=>'OK'));
				}else{
					return Response::json(array('status'=>'ERR'));
				}
			}
			*/
			return Response::json(array('status'=>'OK'));
		}else{
			return Response::json(array('status'=>'ERR'));
		}


	}

	public function post_addcomment($id){

		$newcomment = Input::get();

		//$newcomment['opportunityId'] = $id;
		//$newcomment['progressId'] = $progressId;

		$progressid = $newcomment['progressid'];

		$newcomment['commenterName'] = Auth::user()->fullname;
		$newcomment['commenterId'] = Auth::user()->id;
		$newcomment['commenterInitial'] = Auth::user()->initial;

		$newcomment['timestamp'] = new MongoDate();
		$newcomment['comment'];

		$progress = new Progress();

		$_id = new MongoId($progressid);

		$pobj = $progress->update(array('_id'=>$_id),array('$push'=>array('comments'=>$newcomment)));

		if($pobj){
			/*
			$opportunity = new Opportunity();

			$_id = new MongoId($id);

			$pushData['opportunityProgress'] = $newprogress;

			if($opportunity->get(array('opportunityContactPersons.personEmail'=>$newcontact['personEmail']))){
				return Response::json(array('status'=>'CONTACTEXISTS'));
			}else{
				if($opportunity->update(array('_id'=>$_id),array('$addToSet'=>$pushData),array('upsert'=>true))){
					return Response::json(array('status'=>'OK'));
				}else{
					return Response::json(array('status'=>'ERR'));
				}
			}
			*/
			return Response::json(array('status'=>'OK'));
		}else{
			return Response::json(array('status'=>'ERR'));
		}


	}

	public function post_contact($id = null)
	{

		$fields = array('Name','Position','Email','Direct Line','Mobile');

		$rel = array('like','like','like','like','like');

		$cond = array('both','both','both','both','like');

		$pagestart = Input::get('iDisplayStart');
		$pagelength = Input::get('iDisplayLength');

		$limit = array($pagelength, $pagestart);

		$defsort = 1;
		$defdir = -1;

		$idx = 0;
		$q = array();

		$document = new Opportunity();

		$_id = new MongoId($id);

		$opp = $document->get(array('_id'=>$_id));

		$documents = $opp['opportunityContactPersons'];

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

		$count_all = count($documents);

		$count_display_all = $count_all;

		$aadata = array();

		$counter = 1 + $pagestart;
		foreach ($documents as $doc) {

			$aadata[] = array(
				$counter,
				//'<span class="metaview" id="'.$doc['personId'].'">'.$doc['personName'].'</span>',
				$doc['personName'],
				$doc['personPosition'],
				$doc['personEmail'],
				$doc['personPhone'],
				$doc['personMobile']
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

}