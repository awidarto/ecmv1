<?php

class Tender_Controller extends Base_Controller {

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
		$this->crumb->add('tender','Tender');
	}

	public function get_index()
	{
		$firstheads = array(
			'#',
			'Tender Date',
			'Tender Number',
			'Client Tender Number',
			'Client Name',
			'Brief Scope Description',
			'Delivery Term',
			'Closing Date',
			'Tender System',
			'Tender PIC',
			array('Bid Price',array('colspan'=>3,'style'=>'text-align:center')),
			'Equivalent Bid Price',
			'Tender Status',
			'Tender Remark',
			'Tags',
			'Action'
		);

		$secondheads = array(
			'#',
			'',
			'',
			'',
			'',
			'',
			'',
			'',
			'',
			'',
			'USD',
			'EURO',
			'IDR',
			'USD',
			'',
			'',
			'',
			''
		);

		$colclass = array('one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one','one');
		//$colclass = false;
		//$searchinput = array(false,'title','created','last update','creator','tender manager','tags',false);
		$searchinput = array(false,

			'tenderDate',
			'tenderNumber',
			'clientTenderNumber',
			'clientName',
			'briefScopeDescription',
			'deliveryTerm',
			'closingDate',
			'tenderSystem',
			'tenderPIC',
			'bidCurrency',
			'bidPrice',
			'equivalentBidCurrency',
			'equivalentBidPrice',
			'tenderStatus',
			'tenderRemark',
			//'tenderApproval',
			//'tenderShare',
			//'tenderDepartment',
			//'tenderLead',
			//'createdDate',
			//'lastUpdate',
			'tenderTag'

			,false);

		return View::make('tables.noaside')
			->with('title','Tender')
			->with('newbutton','New Tender')
			->with('disablesort','0,3')
			->with('addurl','tender/add')
			->with('importbutton','Import Tender Data')
			->with('importurl','import/doimport/tender')
			->with('excludecol','14,15,16,17,18,19,20,21,22')
			->with('colclass',$colclass)
			->with('searchinput',$searchinput)
			->with('ajaxsource',URL::to('tender'))
			->with('ajaxdel',URL::to('tender/del'))
	        ->with('crumb',$this->crumb)
			->with('heads',$firstheads)
			->with('secondheads',$secondheads);
	}


	public function post_index()
	{



		$fields = array(
			'tenderDate',
			'tenderNumber',
			'clientTenderNumber',
			'clientName',
			'briefScopeDescription',
			'deliveryTerm',
			'closingDate',
			'tenderSystem',
			'tenderPIC',
			'bidCurrency',
			'bidPrice',
			'equivalentBidCurrency',
			'equivalentBidPrice',
			'tenderStatus',
			'tenderRemark',
			//'tenderApproval',
			//'tenderShare',
			//'tenderDepartment',
			//'tenderLead',
			//'createdDate',
			//'lastUpdate',
			'tenderTag'
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

		$document = new Tender();

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
				date('Y-m-d', $doc['tenderDate']->sec),
				HTML::link('tender/view/'.$doc['_id'],$doc['tenderNumber']),
				$doc['clientTenderNumber'],
				$doc['clientName'],
				$doc['briefScopeDescription'],
				$doc['deliveryTerm'],
				date('Y-m-d', $doc['closingDate']->sec),
				$doc['tenderSystem'],
				$doc['tenderPIC'],
				(isset($doc['bidPriceUSD']))?number_format((double)$doc['bidPriceUSD'],2,',','.'):'',
				(isset($doc['bidPriceEURO']))?number_format((double)$doc['bidPriceEURO'],2,',','.'):'',
				(isset($doc['bidPriceIDR']))?number_format((double)$doc['bidPriceIDR'],2,',','.'):'',
				//$doc['equivalentBidCurrency'],
				(isset($doc['equivalentBidPriceUSD']))?number_format((double)$doc['equivalentBidPriceUSD'],2,',','.'):'',
				$doc['tenderStatus'],
				$doc['tenderRemark'],
				//$doc['tenderApproval'],
				//$doc['tenderShare'],
				//$doc['tenderDepartment'],
				//$doc['tenderLead'],
				//date('Y-m-d H:i:s', $doc['createdDate']->sec),
				//isset($doc['lastUpdate'])?date('Y-m-d H:i:s', $doc['lastUpdate']->sec):'',
				$tags,
				'<a href="'.URL::to('tender/edit/'.$doc['_id']).'"><i class="foundicon-edit action has-tip tip-bottom noradius" title="Edit"></i></a>&nbsp;'.
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
		$fields = array(array('title','body'),'tenderTag');

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


		$document = new Tender();

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

			$item = View::make('tender.item')->with('doc',$doc)->with('popsrc','tender/view')->with('tags',$tags)->render();

			$item = str_replace($hilite, $hilite_replace, $item);

			$aadata[] = array(
				$counter,
				$item,
				$tags,
				'<a href="'.URL::to('tender/edit/'.$doc['_id']).'"><i class="foundicon-edit action"></i></a>&nbsp;'.
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

		$this->crumb->add('tender/add','New Tender');

		$form = new Formly();
		return View::make('tender.new')
					->with('form',$form)
					->with('crumb',$this->crumb)
					->with('title','New Tender');

	}

	public function post_add(){

		//print_r(Session::get('permission'));

	    $rules = array(
	        'tenderNumber'  => 'required|max:50',
	        'briefScopeDescription' => 'required'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('tender/add')->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();
	    	
	    	//print_r($data);

			//pre save transform
			unset($data['csrf_token']);

			$data['tenderDate'] = new MongoDate(strtotime($data['tenderDate']." 00:00:00"));
			$data['closingDate'] = new MongoDate(strtotime($data['closingDate']." 00:00:00"));

			$data['createdDate'] = new MongoDate();
			$data['lastUpdate'] = new MongoDate();
			$data['creatorName'] = Auth::user()->fullname;
			$data['creatorId'] = Auth::user()->id;
			
			$data['tags'] = explode(',',$data['tenderTag']);

			$tender = new tender();

			$newobj = $tender->insert($data);

			if($newobj){

				if(count($data['tags']) > 0){
					$tag = new Tag();
					foreach($data['tags'] as $t){
						$tag->update(array('tag'=>$t),array('$inc'=>array('count'=>1)),array('upsert'=>true));
					}
				}

				Event::fire('tender.create',array('id'=>$newobj['_id'],'result'=>'OK'));

		    	return Redirect::to('tender')->with('notify_success','Document saved successfully');
			}else{
				Event::fire('tender.create',array('id'=>$id,'result'=>'FAILED'));
		    	return Redirect::to('tender')->with('notify_success','Document saving failed');
			}

	    }
	}

	public function get_edit($id = null){

		$this->crumb->add('tender/edit/'.$id,'Edit',false);

		$doc = new Tender();

		$id = (is_null($id))?Auth::user()->id:$id;

		$id = new MongoId($id);

		$doc_data = $doc->get(array('_id'=>$id));

		$doc_data['oldTag'] = $doc_data['tenderTag'];

		$doc_data['tenderDate'] = (isset($doc_data['tenderDate']))?date('Y-m-d', $doc_data['tenderDate']->sec):'';
		$doc_data['closingDate'] = (isset($doc_data['closingDate']))?date('Y-m-d', $doc_data['closingDate']->sec):'';

		$this->crumb->add('tender/edit/'.$id,$doc_data['tenderNumber']);

		$form = Formly::make($doc_data);

		return View::make('tender.edit')
					->with('doc',$doc_data)
					->with('form',$form)
					->with('crumb',$this->crumb)
					->with('title','Edit Tender');

	}


	public function post_edit($id){

		//print_r(Session::get('permission'));

	    $rules = array(
	        'tenderNumber'  => 'required|max:50',
	        'briefScopeDescription' => 'required'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('tender/edit/'.$id)->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();
	    	
			$id = new MongoId($data['id']);

			$data['tenderDate'] = new MongoDate(strtotime($data['tenderDate']." 00:00:00"));
			$data['closingDate'] = new MongoDate(strtotime($data['closingDate']." 00:00:00"));
			$data['lastUpdate'] = new MongoDate();

			unset($data['csrf_token']);
			unset($data['id']);

			$data['tags'] = explode(',',$data['tenderTag']);

			$doc = new Tender();

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

				Event::fire('tender.update',array('id'=>$id,'result'=>'OK'));

		    	return Redirect::to('tender')->with('notify_success','Tender saved successfully');
			}else{

				Event::fire('tender.update',array('id'=>$id,'result'=>'FAILED'));

		    	return Redirect::to('tender')->with('notify_success','Tender saving failed');
			}

	    }

	}

	public function post_del(){
		$id = Input::get('id');

		$user = new Tender();

		if(is_null($id)){
			$result = array('status'=>'ERR','data'=>'NOID');
		}else{

			$id = new MongoId($id);


			if($user->delete(array('_id'=>$id))){
				Event::fire('tender.delete',array('id'=>$id,'result'=>'OK'));
				$result = array('status'=>'OK','data'=>'CONTENTDELETED');
			}else{
				Event::fire('tender.delete',array('id'=>$id,'result'=>'FAILED'));
				$result = array('status'=>'ERR','data'=>'DELETEFAILED');				
			}
		}

		print json_encode($result);
	}

	public function get_scheduleitems($id)
	{
		$project = new Tender();

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

		$this->crumb->add('tender/view/'.$id,'View',false);

		$project = new Tender();

		$_id = new MongoId($id);

		$projectdata = $project->get(array('_id'=>$_id));

		$this->crumb->add('tender/view/'.$id,$projectdata['tenderNumber'],false);

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

		return View::make('tender.detail')
			->with('title','Tender Detail - '.$projectdata['tenderNumber'])
			->with('tender', $projectdata)
			->with('newbutton','New Schedule Item')
			->with('newprogressbutton','New Progress Report')
			->with('addurl','tender/addschitem')
			->with('ajaxsource',URL::to('tender/scheduleitems/'.$id))
			->with('disablesort','0')
			->with('ajaxsourcedoc',URL::to('tender/doc/'.$id.'/'.$projectdata['tenderNumber']))
			->with('ajaxsourceprogress',URL::to('tender/progress/'.$id))
			->with('searchinput',$searchinput)
			->with('heads',$heads)
			->with('crumb',$this->crumb)
			->with('ajaxdel',URL::to('tender/del'));
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
				'docTender' => trim($num),
				'$or'=>array(
						array('deleted'=>false),
						array('deleted'=>array('$exists'=>false)),
					)
				);

		}else if( Auth::user()->role == 'client' ||
			Auth::user()->role == 'principal_vendor' ||
			Auth::user()->role == 'subcon'){

			$q = array(
				'docTender' => trim($num),
				'$or'=>array(
						array('docShare'=>$sharecriteria),
						array('creatorId'=>Auth::user()->id),
						array('deleted'=>false),
						array('deleted'=>array('$exists'=>false))
				)
			);

		}else{
			$q = array(
				'docTender' => trim($num),
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

			$deleted = (isset($doc['deleted']) && $doc['deleted'] == true)?'*':'';

			$aadata[] = array(
				$counter,
				'<span class="metaview" id="'.$doc['_id'].'">'.$doc['title'].$deleted.'</span>',
				//date('Y-m-d H:i:s', $doc['createdDate']->sec),
				isset($doc['lastUpdate'])?date('Y-m-d H:i:s', $doc['lastUpdate']->sec):'',
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

	public function get_transfer($id,$num){

		$form = new Formly();

		return View::make('tender.transfer')
			->with('form',$form)
			->with('num',$num)
			->with('ajaxpost','tender/transfer/'.$id.'/'.$num)
			->with('id',$id);
	}

	public function post_transfer($id,$num){

		$tinput = Input::get();

		$_id = new MongoId($id);

		$pnumber = $tinput['docProject'];
		$pid = $tinput['docProjectId'];

		$project = new Project();

		$pobj = $project->get(array('projectNumber'=>$pnumber));

		$projectData = array(
			'docProject'=>$pobj['projectNumber'],
			'docProjectId'=>$pobj['_id']->__toString()
		);

		$document = new Document();

		if($document->update(array('docTender'=>trim($num)),array('$set'=>$projectData),array('upsert'=>true))){
			return Response::json(array('status'=>'OK'));
		}else{
			return Response::json(array('status'=>'ERR'));
		}

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
			$q['docTenderId'] = $id;
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
			$q['tenderId'] = $id;
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
				date('Y-m-d H:i:s', $doc['timestamp']->sec),
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


	public function post_addprogress($id){

		$newprogress = Input::get();

		$newprogress['timestamp'] = new MongoDate();
		$newprogress['tenderId'] = $id;
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


}