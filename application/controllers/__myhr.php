<?php

class Myhr_Controller extends Base_Controller {

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
	| handles myhr to the root of the application.
	|
	| You can respond to GET myhr to "/home/profile" like so:
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

	public $crumb;


	public function __construct(){
		$this->crumb = new Breadcrumb();
		$this->crumb->add('myhr','My Employment',false);

		date_default_timezone_set('Asia/Jakarta');
		$this->filter('before','auth');
	}

	public function get_index()
	{
		$this->crumb = new Breadcrumb();
		$this->crumb->add('myhr','My Employment');

		$heads = array('#',
			'Title','Created','Last Update',
			//'Expiry Date','Expiring In','Creator',
			'Access','Folder','Attachment','Tags','Action');
		$searchinput = array(false,'title','created','last update',
			//'expiry date','expiring','creator',
			'access','folder','filename','tags',false);

		$dept = Config::get('parama.department');

		$permissions = Auth::user()->permissions;

		$category = $this->getEmpCategory();

		print_r($category);

		$title = 'My Employment';

		$doc = new Document();

		$can_open = true;

		$addurl = 'myhr/add';

		return View::make('tables.simple')
			->with('title',$title)
			->with('newbutton','New Document')
			->with('disablesort','0,5,6')
			->with('category',$category)
			->with('addurl',$addurl)
			->with('searchinput',$searchinput)
			->with('ajaxsource',URL::to('myhr'))
			->with('ajaxdel',URL::to('myhr/del'))
			->with('filteron',true)
			->with('crumb',$this->crumb)
			->with('heads',$heads);

	}

	public function post_index($type = null)
	{

		$fields = array('title','createdDate','lastUpdate',
			//'expiryDate','expiring','creatorName',
			'access','docCategory','docFilename','docTag');

		$rel = array('like','like','like',
			//'like','like','like',
			'like','like','like','like');

		$cond = array('both','both','both','both','both','both','both','both','both');

		$pagestart = Input::get('iDisplayStart');
		$pagelength = Input::get('iDisplayLength');

		$searchCategory = Input::get('searchCategory');
		$searchCategory = (!isset($searchCategory) || $searchCategory == '')?'all':$searchCategory;


		$searchOpportunityNo = Input::get('filterOpportunityNo');
		$searchOpportunityNo = (!isset($searchOpportunityNo) || $searchOpportunityNo == '')?'all':$searchOpportunityNo;
		$searchTenderNo = Input::get('filterTenderNo');
		$searchTenderNo = (!isset($searchTenderNo) || $searchTenderNo == '')?'all':$searchTenderNo;
		$searchProjectNo = Input::get('filterProjectNo');
		$searchProjectNo = (!isset($searchProjectNo) || $searchProjectNo == '')?'all':$searchProjectNo;

		$limit = array($pagelength, $pagestart);

		$defsort = 1;
		$defdir = -1;

		$idx = 0;

		$hilite = array();
		$hilite_replace = array();

		$sq = array();

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

		if($searchProjectNo != 'all'){
			$project_no = new MongoRegex('/'.$searchProjectNo.'/i');
			$sq['docProject'] = $project_no;
		}

		if($searchTenderNo != 'all'){
			$tender_no = new MongoRegex('/'.$searchTenderNo.'/i');
			$sq['docTender'] = $tender_no;
		}

		if($searchOpportunityNo != 'all'){
			$opportunity_no = new MongoRegex('/'.$searchOpportunityNo.'/i');
			$sq['docOpportunity'] = $opportunity_no;
		}

		//start creating query array
		//$q = array();

		//print_r($q)

		$sharecriteria = new MongoRegex('/'.Auth::user()->email.'/i');

		$permissions = Auth::user()->permissions;

		$document = new Document();

		$q['employmentDoc'] = true;
		$q['creatorId'] = Auth::user()->id;

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

		if($searchCategory != 'all'){
			$q['docCategory'] = $searchCategory;
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


			if(isset($doc['tags']) && is_array($doc['tags']) && implode('',$doc['tags']) != ''){
				$tags = array();

				foreach($doc['tags'] as $t){
					$tags[] = '<span class="tagitem">'.$t.'</span>';
				}

				$tags = implode('',$tags);

			}else{
				$tags = '';
			}

			$doc['title'] = str_ireplace($hilite, $hilite_replace, $doc['title']);
			$doc['creatorName'] = str_ireplace($hilite, $hilite_replace, $doc['creatorName']);
			
			if(isset($doc['expiring']) && isset($doc['alert']) && $doc['alert'] == 'Yes'){
				
				if($doc['expiring'] == 'Today'){
					$doc['expiring'] = '<span class="expiring now">'.$doc['expiring'].'</span>';
				}elseif($doc['expiring'] < 0){
					$doc['expiring'] = '<span class="expiring yesterday">'.abs($doc['expiring']).' day(s) ago</span>';
				}elseif($doc['expiring'] != false){
					$doc['expiring'] = '<span class="expiring">'.$doc['expiring'].' day(s)</span>';						
				}else{
					$doc['expiring'] = '';
				}

			}else{

				$doc['expiring'] = '';
			}

			if($doc['creatorId'] == Auth::user()->id ||
									Auth::user()->role == 'root' ||
									Auth::user()->role == 'super' ||
									Auth::user()->role == 'president_director' ||
									Auth::user()->role == 'bod'
				){
				$edit = '<a href="'.URL::to('document/edit/'.$doc['_id'].'/'.$type).'">'.
						'<i class="foundicon-edit action has-tip tip-bottom noradius" title="Edit"></i></a>&nbsp;';
				$del = '<i class="foundicon-trash action del has-tip tip-bottom noradius" title="Delete" id="'.$doc['_id'].'"></i>';
				$download = '<a href="'.URL::to('document/download/'.$doc['_id'].'/'.$type).'">'.
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
						$download = '<a href="'.URL::to('document/download/'.$doc['_id'].'/'.$type).'">'.
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
				date('d-m-Y H:i:s', $doc['createdDate']->sec),
				(isset($doc['lastUpdate']) && $doc['lastUpdate'] != '')?date('d-m-Y H:i:s', $doc['lastUpdate']->sec):'',
				//(isset($doc['expiryDate']) && $doc['expiryDate'] != '')?date('d-m-Y', $doc['expiryDate']->sec):'',
				//(isset($doc['alert']) && $doc['alert'] == 'Yes')?$doc['expiring']:'',
				//$doc['creatorName'],
				isset($doc['access'])?ucfirst($doc['access']):'',
				isset($doc['docCategoryLabel'])?ucfirst($doc['docCategoryLabel']):'-',
				isset($doc['docFilename'])?'<span class="fileview has-tip tip-bottom noradius" "title"="'.$doc['docFilename'].'" id="'.$doc['_id'].'">'.breaksentence($doc['docFilename'],25).'</span>':'',
				$tags,
				$edit.$download.$del
				/*
				'<a href="'.URL::to('document/edit/'.$doc['_id'].'/'.$type).'">'.
				'<i class="foundicon-edit action"></i></a>&nbsp;'.
				'<i class="foundicon-trash action del" id="'.$doc['_id'].'"></i>'
				*/
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

// incoming

	public function get_incoming()
	{

		$this->crumb->add('myhr/incoming','Incoming',false);

		//$heads = array('#','Title','Created','Requester','Requesting','Status','Attachment','Tags','Action');

		$heads = array(
			array('#',array('class'=>'one')),
			array('Title',array('class'=>'one')),
			array('Created',array('class'=>'one')),
			array('Requester',array('class'=>'one')),
			array('Type',array('class'=>'one')),
			'Status',
			array('Attachment',array('class'=>'one')),
			array('Tags',array('class'=>'one')),
			array('Action',array('class'=>'one'))
		);

		$searchinput = array(false,'title','created','creator','approval from','status','filename','tags',false);

		//if(Auth::user()->role == 'root' || Auth::user()->role == 'super'){
			return View::make('tables.simple')
				->with('title','Incoming Requests')
				->with('newbutton','')
				->with('disablesort','0,5,6')
				->with('addurl','myhr/submit')
				->with('searchinput',$searchinput)
				->with('ajaxsource',URL::to('myhr/incoming'))
				->with('ajaxdel',URL::to('myhr/del'))
				->with('crumb',$this->crumb)
				->with('heads',$heads);
		/*
		}else{
			return View::make('document.restricted')
							->with('title',$title);			
		}
		*/
	}

	public function post_incoming()
	{

		$fields = array('title','createdDate','creatorName','docApproval','status','docFilename','docTag');

		$rel = array('like','like','like','like','like','like','like');

		$cond = array('both','both','both','both','both','both','both');

		$pagestart = Input::get('iDisplayStart');
		$pagelength = Input::get('iDisplayLength');

		$limit = array($pagelength, $pagestart);

		$defsort = 1;
		$defdir = -1;

		$idx = 0;
		$q = array();

		$self_id = new MongoId(Auth::user()->id);

		//$q = array('approvalRequestIds._id'=>$self_id);

		$q['$or'] = array(
			array('approvalRequestIds._id'=>$self_id),
			array('docRequestToDepartment'=>Auth::user()->department),
			array('approvalRequestIds.id'=>$self_id),
			array('docApproval'=> new MongoRegex('/'.Auth::user()->email.'/i'))
		);


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

			if(isset($doc['tags']) && is_array($doc['tags']) && implode('',$doc['tags']) != ''){
				$tags = array();

				foreach($doc['tags'] as $t){
					$tags[] = '<span class="tagitem">'.$t.'</span>';
				}

				$tags = implode('',$tags);

			}else{
				$tags = '';
			}

			$requestTo = '<ol>';

			foreach ($doc['approvalRequestIds'] as $r) {
				if($r['_id'] == $self_id){
					//$requestTo .= '<li><span class="approvalview" id="'.$doc['_id'].'">'.$r['fullname'].'</span></li>';
					$requestTo .= '<li><strong>'.$r['fullname'].' (You)</strong></li>';
				}else{
					$requestTo .= '<li>'.$r['fullname'].'</li>';
				}
			}

			$shallapprove = true;

			$requestTo .= '</ol>';

			if(count($doc['approvalRequestIds']) > 0){
				$request_type = 'Approval';
			}else{
				$request_type = 'Submission';
				$shallapprove = false;
			}


			if(isset($doc['approvalResponds'])){
				$status = '<table style="width:100%">';
				$status .= '<thead><tr>';
				$status .= '<th>Status</th><th>By</th><th>Detail</th>';

				$status .= '</tr></thead>';
				foreach($doc['approvalResponds'] as $c){
					if($c['approval'] == 'transfer'){
						$appstatus = 'Transferred';
					}else if($c['approval'] == 'yes'){
						$appstatus = 'Approved';
					}else if($c['approval'] == 'no'){
						$appstatus = 'Not Approved';
					}
					$timestamp = date('d-m-Y h:i:s',$c['approvalDate']->sec);
					$status .= '<tr>';
					$status .= '<td><span class"approval '.$c['approval'].'">'.$appstatus.'</span></td>';
					$status .= '<td>'.$c['approverName'].'</td>';
					$status .= '<td><span class="commentTime">'.$timestamp.'</span><br />';
					$status .= '<p>'.$c['approvalNote'].'</p></td>';
					$status .= '</tr>';

					if($c['approverEmail'] == Auth::user()->email){
						$shallapprove = false;
					}

				}
				$status .= '</table>';


			}else{
				if($request_type == 'Approval'){
					$status = 'Pending Approval';
				}else{
					$status = 'Credential Submission';
				}
			}			

			$doc['title'] = str_ireplace($hilite, $hilite_replace, $doc['title']);
			$doc['creatorName'] = str_ireplace($hilite, $hilite_replace, $doc['creatorName']);

			$aadata[] = array(
				$counter,
				'<span class="metaview" id="'.$doc['_id'].'">'.$doc['title'].'</span>',
				date('d-m-Y H:i:s', $doc['createdDate']->sec),
				$doc['creatorName'],
				//$requestTo,
				$request_type,
				$status,
				isset($doc['docFilename'])?'<span class="fileview" id="'.$doc['_id'].'">'.$doc['docFilename'].'</span>':'',
				$tags,
				($shallapprove)?'<i class="foundicon-checkmark has-tip tip-bottom noradius action approvalview" id="'.$doc['_id'].'" title="Approve"></i>':'<i class="foundicon-checkmark tip-bottom noradius action noapproval" title="Approve"></i>'
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

//outgoing

	public function get_outgoing()
	{

		$this->crumb->add('myhr/outgoing','Outgoing',false);

		$heads = array(
			array('#',array('class'=>'one')),
			array('Title',array('class'=>'one')),
			array('Created',array('class'=>'one')),
			array('Requester',array('class'=>'one')),
			array('Type',array('class'=>'one')),
			array('Request To',array('class'=>'one')),
			'Status',
			array('Attachment',array('class'=>'one')),
			array('Tags',array('class'=>'one')),
			array('Action',array('class'=>'one'))
		);
		
		$searchinput = array(false,'title','created','creator','approval from',false,false,'filename','tags',false);

		//if(Auth::user()->role == 'root' || Auth::user()->role == 'super'){
			return View::make('tables.simple')
				->with('title','Submissions & Requests')
				->with('newbutton','Submit Request')
				->with('addurl','requests/submit')
				->with('disablesort','0,5,6')
				->with('searchinput',$searchinput)
				->with('ajaxsource',URL::to('requests/outgoing'))
				->with('ajaxdel',URL::to('requests/del'))
				->with('crumb',$this->crumb)
				->with('heads',$heads);
		/*
		}else{
			return View::make('document.restricted')
							->with('title',$title);			
		}
		*/
	}

	public function post_outgoing()
	{

		$fields = array('title','createdDate','creatorName','docApproval','docFilename','docTag');

		$rel = array('like','like','like','like','like','like');

		$cond = array('both','both','both','both','both','both');

		$pagestart = Input::get('iDisplayStart');
		$pagelength = Input::get('iDisplayLength');

		$limit = array($pagelength, $pagestart);

		$defsort = 1;
		$defdir = -1;

		$idx = 0;
		$q = array();

		$self_id = new MongoId(Auth::user()->id);

		/*
		$q['$or'] = array(
			array('approvalRequestIds.id'=>$self_id),
			array('docApproval'=> new MongoRegex('/'.Auth::user()->email.'/i'))
		);

		$q = array('approvalRequestIds._id'=>$self_id);
		*/
		$q = array(
			'creatorId'=>Auth::user()->id,
			'docApproval'=>array('$ne'=>'""'),
			'docRequestToDepartment'=>array('$ne'=>'""'),
			'$or'=>array(
				array('docApproval'=>array('$exists'=>true)),
				array('docRequestToDepartment'=>array('$exists'=>true))
			)
		);


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

			if(isset($doc['tags']) && is_array($doc['tags']) && implode('',$doc['tags']) != ''){
				$tags = array();

				foreach($doc['tags'] as $t){
					$tags[] = '<span class="tagitem">'.$t.'</span>';
				}

				$tags = implode('',$tags);

			}else{
				$tags = '';
			}

			$requestTo = '<ol>';

			if(isset($doc['approvalRequestIds'])){
				foreach ($doc['approvalRequestIds'] as $r) {
					if($r['_id'] == $self_id){
						//$requestTo .= '<li><span class="approvalview" id="'.$doc['_id'].'">'.$r['fullname'].'</span></li>';
						$requestTo .= '<li><strong>'.$r['fullname'].' (You)</strong></li>';
					}else{
						$requestTo .= '<li>'.$r['fullname'].'</li>';
					}
				}

				if(count($doc['approvalRequestIds']) > 0){
					$request_type = 'Approval';
				}else{
					$request_type = 'Submission';
				}

			}else{
				$requestTo .= '<li>No approval requested</li>';
			}

			$requestTo .= '</ol>';

			$shallapprove = true;

			if(isset($doc['approvalResponds'])){
				$status = '<table style="width:100%">';
				$status .= '<thead>';
				$status .= '<tr>';
				$status .= '<th>Status</th><th>By</th><th>Detail</th>';
				$status .= '</tr>';
				$status .= '<tr>';
				$status .= '<th colspan="3"><span id="'.$doc['_id'].'" class="printcover right">Print cover</span></th>';
				$status .= '</tr>';
				$status .= '</thead>';
				foreach($doc['approvalResponds'] as $c){
					if($c['approval'] == 'transfer'){
						$appstatus = 'Transferred';
					}else if($c['approval'] == 'yes'){
						$appstatus = 'Approved';
					}else if($c['approval'] == 'no'){
						$appstatus = 'Not Approved';
					}
					$timestamp = date('d-m-Y h:i:s',$c['approvalDate']->sec);
					$status .= '<tr>';
					$status .= '<td><span class"approval '.$c['approval'].'">'.$appstatus.'</span></td>';
					$status .= '<td>'.$c['approverName'].'</td>';
					$status .= '<td><span class="commentTime">'.$timestamp.'</span><br />';
					$status .= '<p>'.$c['approvalNote'].'</p></td>';
					$status .= '</tr>';
					if($c['approverEmail'] == Auth::user()->email){
						$shallapprove = false;
					}
				}
				$status .= '</table>';
			}else{
				if($request_type == 'Approval'){
					$status = 'Pending Approval';
				}else{
					$status = 'Credential Submission';
					$shallapprove = false;
				}
			}


			$doc['title'] = str_ireplace($hilite, $hilite_replace, $doc['title']);
			$doc['creatorName'] = str_ireplace($hilite, $hilite_replace, $doc['creatorName']);

			$aadata[] = array(
				$counter,
				'<span class="metaview" id="'.$doc['_id'].'">'.$doc['title'].'</span>',
				date('d-m-Y H:i:s', $doc['createdDate']->sec),
				$doc['creatorName'],
				$request_type,
				$requestTo,
				$status,
				isset($doc['docFilename'])?'<span class="fileview" id="'.$doc['_id'].'">'.$doc['docFilename'].'</span>':'',
				$tags,
				''
				//'<i class="foundicon-checkmark action approvalview" id="'.$doc['_id'].'"></i>&nbsp;'.
				//'<i class="foundicon-right-arrow action forwardview" id="'.$doc['_id'].'"></i>'
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

	public function get_submit(){
		$this->crumb->add('myhr/submit','Submit Request Document');

		$doc = new Document();

		$template = $doc->find(array('useAsTemplate'=>'Yes'));

		$templates = array();
		$templates['none'] = 'None';
		foreach($template as $t){
			$templates[$t['_id']->__toString()] = $t['title'];
		}

		$category = getCategory('employee');

		$form = new Formly();
		return View::make('myhr.new')
					->with('form',$form)
					->with('category',$category)
					->with('templates',$templates)
					->with('crumb',$this->crumb)
					->with('title','Submit Employee Document');

	}


	public function post_submit($type = null){

		//print_r(Session::get('permission'));

		$back = 'myhr';

		$postdata = Input::get();

		if(isset($postdata['useAsTemplate']) && $postdata['useAsTemplate'] == 'Yes'){
		    $rules = array(
		        'title'  => 'required|max:50',
		        'templateName' => 'required',
		        'templateNumberStart'=>'required'
		    );
		}else{
		    $rules = array(
		        'title'  => 'required|max:50'
		    );
		}

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('document/add/'.$type)->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();

	    	//print_r($data);

			//pre save transform
			unset($data['csrf_token']);

	            $datetimeNow = new DateTime(date('d-m-Y',time()));
	            $datetimeThen = new DateTime($data['expiryDate']);

	            $indays = $datetimeNow->diff($datetimeThen);

	            if(isset($data['alertStart']) && $indays->days > $data['alertStart']){
	            	$data['expiring'] = false;
	            }else{
	            	if($indays->days == 0){
		            	$data['expiring'] = 'Today';
	            	}elseif($indays->invert == 0){
		            	$data['expiring'] = $indays->days;
	            	}elseif($indays->invert == 1){
		            	$data['expiring'] = $indays->days * -1;
	            	}
	            }


			$data['effectiveDate'] = ($data['effectiveDate'] == '')?'':new MongoDate(strtotime($data['effectiveDate']." 00:00:00"));
			$data['expiryDate'] =($data['expiryDate'] == '')?'':new MongoDate(strtotime($data['expiryDate']." 00:00:00"));


			$data['createdDate'] = new MongoDate();
			$data['lastUpdate'] = new MongoDate();
			$data['creatorName'] = Auth::user()->fullname;
			$data['creatorId'] = Auth::user()->id;
			$data['employmentDoc'] = 'Yes';

			$data['useAsTemplate'] = (isset($data['useAsTemplate']))?$data['useAsTemplate']:'No';

			if(isset($data['alertStart'])){
				if($data['alertStart'] > Config::get('parama.expiration_alert_days')){
					$data['alertStart'] = Config::get('parama.expiration_alert_days');
				}
				$data['alertStart'] = new MongoInt64($data['alertStart']);
			}

			$sharelist = explode(',', $data['docShare']);
			if(is_array($sharelist)){
				$usr = new User();
				$shd = array();
				foreach($sharelist as $sh){
					$shd[] = array('email'=>$sh);
				}
				$shared_ids = $usr->find(array('$or'=>$shd),array('id'));

				$data['sharedEmails'] = $sharelist ;
				$data['sharedIds'] = array_values($shared_ids) ;
			}

			$approvallist = explode(',', $data['docApprovalRequest']);
			if(is_array($approvallist)){
				$usr = new User();
				$shd = array();
				foreach($approvallist as $sh){
					$appval[] = array('email'=>$sh);
				}
				$approval_ids = $usr->find(array('$or'=>$appval),array('id','fullname'));

				$data['approvalRequestEmails'] = $approvallist ;
				$data['approvalRequestIds'] = array_values($approval_ids) ;
			}

			$docupload = Input::file('docupload');

			$docupload['uploadTime'] = new MongoDate();


			$docupload['name'] = fixfilename($docupload['name']);


			$data['docFilename'] = $docupload['name'];

			$data['docFiledata'] = $docupload;

			$data['docFileList'][] = $docupload;

			$data['tags'] = explode(',',$data['docTag']);

			$document = new Document();

			$newobj = $document->insert($data);


			if($newobj){

				if($newobj['useAsTemplate'] == 'Yes'){
					$templatename = trim(strtolower($newobj['templateName']));
					$startFrom = ($newobj['templateNumberStart'] == '')?1:$newobj['templateNumberStart'];
					$startFrom = new MongoInt64($startFrom);
					// set new sequencer
					$sequencer = new Sequence();

					$sequencer->insert(array('_id'=>$templatename,'seq'=>$startFrom));

				}

				if($docupload['name'] != ''){

					$newid = $newobj['_id']->__toString();

					$newdir = realpath(Config::get('parama.storage')).'/'.$newid;

					Input::upload('docupload',$newdir,$docupload['name']);

					$inpath = $newdir.'/'.$docupload['name'];
					$ext = File::extension($inpath);

					if($ext == 'pdf'){
						$outpath = str_replace('.'.$ext, '', $inpath);

						File::mkdir($outpath);

						$cmd = pdf2images($inpath,$outpath);
					}

				}

				if(count($data['tags']) > 0){
					$tag = new Tag();
					foreach($data['tags'] as $t){
						$tag->update(array('tag'=>$t),array('$inc'=>array('count'=>1)),array('upsert'=>true));
					}
				}

				$sharedto = explode(',',$data['docShare']);

				if(count($sharedto) > 0  && $data['docShare'] != ''){
					foreach($sharedto as $to){
						Event::fire('document.share',array('id'=>$newobj['_id'],'sharer_id'=>Auth::user()->id,'shareto'=>$to));
					}
				}

				$approvalby = explode(',',$data['docApprovalRequest']);

				if(count($approvalby) > 0 && $data['docApprovalRequest'] != ''){
					foreach($approvalby as $to){
						Event::fire('request.approval',array('id'=>$newobj['_id'],'approvalby'=>$to));
					}
				}

				Event::fire('document.create',array('id'=>$newobj['_id'],'result'=>'OK','department'=>Auth::user()->department,'creator'=>Auth::user()->id));

		    	return Redirect::to($back)->with('notify_success','Document saved successfully');
			}else{
				Event::fire('document.create',array('id'=>$id,'result'=>'FAILED'));
		    	return Redirect::to($back)->with('notify_success','Document saving failed');
			}

	    }


	}



	public function ___post_submit($type = null){

		//print_r(Session::get('permission'));
		$back = 'myhr/outgoing';

	    $rules = array(
	        'title'  => 'required|max:50'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('myhr/submit')->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();

	    	//print_r($data);

			//pre save transform
			unset($data['csrf_token']);

			$data['effectiveDate'] = new MongoDate(strtotime($data['effectiveDate']." 00:00:00"));
			$data['expiryDate'] = new MongoDate(strtotime($data['expiryDate']." 00:00:00"));

			$data['createdDate'] = new MongoDate();
			$data['lastUpdate'] = new MongoDate();
			$data['creatorName'] = Auth::user()->fullname;
			$data['creatorId'] = Auth::user()->id;


			$sharelist = explode(',', $data['docShare']);
			if(is_array($sharelist)){
				$usr = new User();
				$shd = array();
				foreach($sharelist as $sh){
					$shd[] = array('email'=>$sh);
				}
				$shared_ids = $usr->find(array('$or'=>$shd),array('id'));

				$data['sharedEmails'] = $sharelist ;
				$data['sharedIds'] = array_values($shared_ids) ;
			}

			$approvallist = explode(',', $data['docApprovalRequest']);
			if(is_array($approvallist)){
				$usr = new User();
				$shd = array();
				foreach($approvallist as $sh){
					$appval[] = array('email'=>$sh);
				}
				$approval_ids = $usr->find(array('$or'=>$appval),array('id','fullname'));

				$data['approvalRequestEmails'] = $approvallist ;
				$data['approvalRequestIds'] = array_values($approval_ids) ;
			}

			$docupload = Input::file('docupload');
			
			$docupload['name'] = fixfilename($docupload['name']);

			//print $docupload['name'];

			$docupload['uploadTime'] = new MongoDate();

			$data['docFilename'] = $docupload['name'];

			$data['docFiledata'] = $docupload;

			$data['docFileList'][] = $docupload;

			$data['tags'] = explode(',',$data['docTag']);

			$document = new Document();

			$newobj = $document->insert($data);


			if($newobj){


				if($docupload['name'] != ''){

					$newid = $newobj['_id']->__toString();

					$newdir = realpath(Config::get('parama.storage')).'/'.$newid;

					Input::upload('docupload',$newdir,$docupload['name']);

				}

				if(count($data['tags']) > 0){
					$tag = new Tag();
					foreach($data['tags'] as $t){
						$tag->update(array('tag'=>$t),array('$inc'=>array('count'=>1)),array('upsert'=>true));
					}
				}

				$sharedto = explode(',',$data['docShare']);

				if(count($sharedto) > 0  && $data['docShare'] != ''){
					foreach($sharedto as $to){
						Event::fire('document.share',array('id'=>$newobj['_id'],'sharer_id'=>Auth::user()->id,'shareto'=>$to));
					}
				}

				$approvalby = explode(',',$data['docApprovalRequest']);

				if(count($approvalby) > 0 && $data['docApprovalRequest'] != ''){
					foreach($approvalby as $to){
						Event::fire('request.approval',array('id'=>$newobj['_id'],'approvalby'=>$to));
					}
				}

				Event::fire('document.create',array('id'=>$newobj['_id'],'result'=>'OK','department'=>Auth::user()->department,'creator'=>Auth::user()->id));

		    	return Redirect::to($back)->with('notify_success','Document saved successfully');
			}else{
				Event::fire('document.create',array('id'=>$id,'result'=>'FAILED'));
		    	return Redirect::to($back)->with('notify_success','Document saving failed');
			}

	    }


	}



	public function post_del(){
		$id = Input::get('id');

		$user = new Document();

		if(is_null($id)){
			$result = array('status'=>'ERR','data'=>'NOID');
		}else{

			$id = new MongoId($id);


			if($user->delete(array('_id'=>$id))){
				Event::fire('document.delete',array('id'=>$id,'result'=>'OK'));
				$result = array('status'=>'OK','data'=>'CONTENTDELETED');
			}else{
				Event::fire('document.delete',array('id'=>$id,'result'=>'FAILED'));
				$result = array('status'=>'ERR','data'=>'DELETEFAILED');				
			}
		}

		print json_encode($result);
	}


	public function get_add($type = null){

		if(is_null($type)){
			$this->crumb->add('document/add','New Document');
		}else{
			$this->crumb->add('document/type/'.$type,depttitle($type));
			$this->crumb->add('document/add','New Document');
		}

		$category = $this->getCategory('hr_admin');

		$form = new Formly();
		return View::make('myhr.new')
					->with('form',$form)
					->with('type',$type)
					->with('category',$category)
					->with('crumb',$this->crumb)
					->with('title','New Document');

	}

	public function post_add($type = null){

		//print_r(Session::get('permission'));

		$back = 'myhr';

	    $rules = array(
	        'title'  => 'required|max:50'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('document/add/'.$type)->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();
	    	
	    	//print_r($data);

			//pre save transform
			unset($data['csrf_token']);

			$data['effectiveDate'] = ($data['effectiveDate'] == '')?'':new MongoDate(strtotime($data['effectiveDate']." 00:00:00"));
			$data['expiryDate'] =($data['expiryDate'] == '')?'':new MongoDate(strtotime($data['expiryDate']." 00:00:00"));

			//$data['effectiveDate'] = new MongoDate(strtotime($data['effectiveDate']." 00:00:00"));
			//$data['expiryDate'] = new MongoDate(strtotime($data['expiryDate']." 00:00:00"));

			$data['createdDate'] = new MongoDate();
			$data['lastUpdate'] = new MongoDate();
			$data['creatorName'] = Auth::user()->fullname;
			$data['creatorId'] = Auth::user()->id;
			
			$docupload = Input::file('docupload');

			$docupload['name'] = fixfilename($docupload['name']);

			$data['docFilename'] = $docupload['name'];

			$data['docFiledata'] = $docupload;

			$data['tags'] = explode(',',$data['docTag']);

			$data['employmentDoc'] = true;

			$data['deleted'] = false;

			$document = new Document();

			$newobj = $document->insert($data);

			if($newobj){


				if($docupload['name'] != ''){

					$newid = $newobj['_id']->__toString();

					$newdir = realpath(Config::get('parama.storage')).'/'.$newid;

					Input::upload('docupload',$newdir,$docupload['name']);
					
				}

				if(count($data['tags']) > 0){
					$tag = new Tag();
					foreach($data['tags'] as $t){
						$tag->update(array('tag'=>$t),array('$inc'=>array('count'=>1)),array('upsert'=>true));
					}
				}

				$sharedto = explode(',',$data['docShare']);

				if(count($sharedto) > 0  && $data['docShare'] != ''){
					foreach($sharedto as $to){
						Event::fire('document.share',array('id'=>$newobj['_id'],'sharer_id'=>Auth::user()->id,'shareto'=>$to));
					}
				}

				$approvalby = explode(',',$data['docApprovalRequest']);

				if(count($approvalby) > 0 && $data['docApprovalRequest'] != ''){
					foreach($approvalby as $to){
						Event::fire('request.approval',array('id'=>$newobj['_id'],'approvalby'=>$to));
					}
				}

				Event::fire('document.create',array('id'=>$newobj['_id'],'result'=>'OK','department'=>Auth::user()->department,'creator'=>Auth::user()->id));

		    	return Redirect::to($back)->with('notify_success','Document saved successfully');
			}else{
				Event::fire('document.create',array('id'=>$id,'result'=>'FAILED'));
		    	return Redirect::to($back)->with('notify_success','Document saving failed');
			}

	    }

		
	}

	public function get_edit($id = null,$type = null){

		if(is_null($type)){
			$this->crumb->add('document/add','Edit Document');
		}else{
			$this->crumb->add('document/type/'.$type,depttitle($type),false);
			$this->crumb->add('document/edit/'.$id,'Edit',false);
		}


		$doc = new Document();

		$id = (is_null($id))?Auth::user()->id:$id;

		$id = new MongoId($id);

		$doc_data = $doc->get(array('_id'=>$id));

		$doc_data['oldTag'] = $doc_data['docTag'];

		$doc_data['effectiveDate'] = date('d-m-Y', $doc_data['effectiveDate']->sec);
		$doc_data['expiryDate'] = date('d-m-Y', $doc_data['expiryDate']->sec);


		if(is_null($type)){
			$this->crumb->add('document/edit/'.$id,$doc_data['title']);
		}else{
			$this->crumb->add('document/edit/'.$id.'/'.$type,$doc_data['title']);
		}

		$template = $doc->find(array('useAsTemplate'=>'Yes'));

		$templates = array();
		$templates['none'] = 'None';
		foreach($template as $t){
			$templates[$t['_id']->__toString()] = $t['title'];
		}


		$form = Formly::make($doc_data);

		return View::make('document.edit')
					->with('doc',$doc_data)
					->with('templates',$templates)
					->with('form',$form)
					->with('type',$type)
					->with('crumb',$this->crumb)
					->with('title','Edit Document');

	}


	public function post_edit($id,$type = null){

		//print_r(Session::get('permission'));

		if(is_null($type)){
			$back = 'document';
		}else{
			$back = 'document/type/'.$type;
		}

	    $rules = array(
	        'title'  => 'required|max:50'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('document/edit/'.$id.'/'.$type)->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();
	    	
			$id = new MongoId($data['id']);

			$data['effectiveDate'] = ($data['effectiveDate'] == '')?'':new MongoDate(strtotime($data['effectiveDate']." 00:00:00"));
			$data['expiryDate'] =($data['expiryDate'] == '')?'':new MongoDate(strtotime($data['expiryDate']." 00:00:00"));

			//$data['effectiveDate'] = new MongoDate(strtotime($data['effectiveDate']." 00:00:00"));
			//$data['expiryDate'] = new MongoDate(strtotime($data['expiryDate']." 00:00:00"));
			
			$data['lastUpdate'] = new MongoDate();

			unset($data['csrf_token']);
			unset($data['id']);

			$sharelist = explode(',', $data['docShare']);
			if(is_array($sharelist)){
				$usr = new User();
				$shd = array();
				foreach($sharelist as $sh){
					$shd[] = array('email'=>$sh);
				}
				$shared_ids = $usr->find(array('$or'=>$shd),array('id'));

				$data['sharedIds'] = array_values($shared_ids) ;
			}

			$data['tags'] = explode(',',$data['docTag']);

			$doc = new Document();

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

				Event::fire('document.update',array('id'=>$id,'result'=>'OK'));

				$sharedto = explode(',',$data['docShare']);

				if(count($sharedto) > 0  && $data['docShare'] != ''){
					foreach($sharedto as $to){
						Event::fire('document.share',array('id'=>$id,'sharer_id'=>Auth::user()->id,'shareto'=>$to));
					}
				}

				$approvalby = explode(',',$data['docApproval']);

				if(count($approvalby) > 0 && $data['docApproval'] != ''){
					foreach($approvalby as $to){
						Event::fire('request.approval',array('id'=>$id,'approvalby'=>$to));
					}
				}				

		    	return Redirect::to($back)->with('notify_success','Document saved successfully');
			}else{

				Event::fire('document.update',array('id'=>$id,'result'=>'FAILED'));

		    	return Redirect::to($back)->with('notify_success','Document saving failed');
			}

	    }

		
	}


	public function get_type($type = null)
	{
		$this->crumb->add('document/type/'.$type,depttitle($type));

		$heads = array('#','Title','Created','Last Update','Creator','Attachment','Tags','Action');
		$searchinput = array(false,'title','created','last update','creator','filename','tags',false);

		$dept = Config::get('parama.department');

		$title = $dept[$type];

		$doc = new Document();

		$sharecriteria = new MongoRegex('/'.Auth::user()->email.'/i');

		$shared = $doc->count(array('docShare'=>$sharecriteria));

		$permissions = Auth::user()->permissions;

		$can_open = false;

		if(Auth::user()->role == 'root' || 
			Auth::user()->role == 'super' || 
			Auth::user()->department == $title || 
			$permissions->{$type} == true
		){
			return View::make('tables.simple')
				->with('title',$title)
				->with('newbutton','New Document')
				->with('disablesort','0,5,6')
				->with('addurl','document/add/'.$type)
				->with('searchinput',$searchinput)
				->with('ajaxsource',URL::to('document/type/'.$type))
				->with('ajaxdel',URL::to('document/del'))
				->with('crumb',$this->crumb)
				->with('heads',$heads);			
		}else{
			return View::make('document.restricted')
				->with('crumb',$this->crumb)
				->with('title',$title);
		}

	}

	public function post_type($type = null)
	{

		$fields = array('title','createdDate','lastUpdate','creatorName','docFilename','docTag');

		$rel = array('like','like','like','like','like','like');

		$cond = array('both','both','both','both','both','both');

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
		if(!is_null($type)){
			$q['docDepartment'] = $type;
		}

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
			if(isset($doc['tags'])){
				$tags = array();

				foreach($doc['tags'] as $t){
					$tags[] = '<span class="tagitem">'.$t.'</span>';
				}

				$tags = implode('',$tags);

			}else{
				$tags = '';
			}

			$doc['title'] = str_ireplace($hilite, $hilite_replace, $doc['title']);
			$doc['creatorName'] = str_ireplace($hilite, $hilite_replace, $doc['creatorName']);

			$aadata[] = array(
				$counter,
				'<span class="metaview" id="'.$doc['_id'].'">'.$doc['title'].'</span>',
				date('d-m-Y H:i:s', $doc['createdDate']->sec),
				isset($doc['lastUpdate'])?date('d-m-Y H:i:s', $doc['lastUpdate']->sec):'',
				$doc['creatorName'],
				isset($doc['docFilename'])?'<span class="fileview" id="'.$doc['_id'].'">'.$doc['docFilename'].'</span>':'',
				$tags,
				'<a href="'.URL::to('document/edit/'.$doc['_id'].'/'.$type).'">'.
				'<i class="foundicon-edit action"></i></a>&nbsp;'.
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


	public function __get_type($type = null)
	{
		$menutitle = array(
			'opportunity'=>'Opportunity',
			'tender'=>'Tender',
			'commbid'=>'Commercial Bid',
			'proposal'=>'Tech Proposal',
			'techbid'=>'Tech Bid',
			'contract'=>'Contracts',
			'legal'=>'Legal Docs',
			'qc'=>'QA / QC',
			'warehouse'=>'Warehouse'
			);

		$heads = array('#','Title','Created','Creator','Owner','Tags','Action');
		$fields = array('seq','title','created','creator','owner','tags','action');
		$searchinput = array(false,'title','created','creator','owner','tags',false);

		return View::make('tables.simple')
			->with('title',(is_null($type))?'Document - All':'Document - '.$menutitle[$type])
			->with('newbutton','New Document')
			->with('disablesort','0,5,6')
			->with('addurl','document/add')
			->with('searchinput',$searchinput)
			->with('ajaxsource',URL::to('document/type/'.$type))
			->with('ajaxdel',URL::to('document/del'))
			->with('heads',$heads);
	}

	public function __post_type($type = null)
	{
		$fields = array('title','createdDate','creatorName','creatorName','tags');

		$rel = array('like','like','like','like','equ');

		$cond = array('both','both','both','both','equ');

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

		$document = new Document();

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
				$doc['title'],
				date('d-m-Y H:i:s',$doc['createdDate']),
				$doc['creatorName'],
				$doc['creatorName'],
				implode(',',$doc['tag']),
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


	public function get_view($id){
		$id = new MongoId($id);

		$document = new Document();

		$doc = $document->get(array('_id'=>$id));

		return View::make('document.view')->with('doc',$doc);
	}

	public function get_fileview($id){
		$_id = new MongoId($id);

		$document = new Document();

		$doc = $document->get(array('_id'=>$_id));

		$file = URL::to(Config::get('parama.storage').$id.'/'.$doc['docFilename']);

		return View::make('document.fileview')->with('doc',$doc)->with('href',$file);
	}

}