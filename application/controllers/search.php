<?php

class Search_Controller extends Base_Controller {

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
		$this->crumb->add('search','Search');

		$this->filter('before','auth');
	}

	public function get_index()
	{

		//print_r(Auth::user());
		$heads = array('#','Title','Created','Last Update','Expiry Date','Expiring In','Creator','Access','Attachment','Tags','Action');
		$searchinput = array(false,'title','created','last update','expiry date','expiring','creator','access','filename','tags',false);

		$title = 'Advanced Search';

		$form = new Formly();

		return View::make('tables.search')
			->with('title','Search')
			->with('form',$form)
			->with('newbutton','')
			->with('disablesort','0,5,6')
			->with('addurl','')
			->with('ajaxsource',URL::to('search'))
			->with('ajaxdel',URL::to('document'))
			->with('heads',$heads);
	}

	public function post_index()
	{

		$type = Auth::user()->department;

		$searchTitle = Input::get('searchTitle');
		$searchCreator = Input::get('searchCreator');
		$searchTags = Input::get('searchTags');
		$searchcreatedFrom = Input::get('createdFrom');
		$searchcreatedTo = Input::get('createdTo');
		$searchexpiredFrom = Input::get('expiredFrom');
		$searchexpiredTo = Input::get('expiredTo');

		$searchcombined = ''; 
		$searchcombined .= $searchTitle;
		$searchcombined .= $searchCreator;
		$searchcombined .= $searchTags;
		$searchcombined .= $searchcreatedFrom;
		$searchcombined .= $searchcreatedTo;
		$searchcombined .= $searchexpiredFrom;
		$searchcombined .= $searchexpiredTo;


		$fields = array('title','creatorName','createdDate','lastUpdate','creatorName','docFilename','docTag');

		$rel = array('like','like','like','like','like','like','like');

		$cond = array('both','both','both','both','both','both','both');

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

		if($searchTitle != ''){
			$q['title'] = new MongoRegex('/'.$searchTitle.'/i');
		}

		if($searchCreator != ''){
			$q['creatorName'] = new MongoRegex('/'.$searchCreator.'/i');
		}

		$orarray = array();

		if($searchTags != ''){
			$tags = explode(',',$searchTags);
			if(is_array($tags)){
				foreach ($tags as $t) {
					$orarray[] = array('docTag'=>new MongoRegex('/'.$t.'/i'));
				}
			}else{
				$orarray[] = array('docTag'=>new MongoRegex('/'.$searchTags.'/i'));
			}
		}


		if($searchcreatedFrom != '' && $searchcreatedTo == ''){
			$tfrom = new MongoDate(strtotime($searchcreatedFrom));
			$q['createdDate']= array('$gte' => $tfrom);
		}else if($searchcreatedFrom == '' && $searchcreatedTo != ''){
			$tto = new MongoDate(strtotime($searchcreatedTo));
			$q['createdDate']= array('$lte' => $tto);
		}else if($searchcreatedFrom != '' && $searchcreatedTo != ''){
			$tfrom = new MongoDate(strtotime($searchcreatedFrom));
			$tto = new MongoDate(strtotime($searchcreatedTo));
			$q['createdDate']= array('$gte' => $tfrom, '$lt' => $tto);
		}

		if($searchexpiredFrom != '' && $searchexpiredTo == ''){
			$tfrom = new MongoDate(strtotime($searchexpiredFrom));
			$q['expiryDate']= array('$gte' => $tfrom);
		}else if($searchexpiredFrom == '' && $searchexpiredTo != ''){
			$tto = new MongoDate(strtotime($searchcreatedTo));
			$q['expiryDate']= array('$lte' => $tto);
		}else if($searchexpiredFrom != '' && $searchexpiredTo != ''){
			$tfrom = new MongoDate(strtotime($searchexpiredFrom));
			$tto = new MongoDate(strtotime($searchexpiredTo));
			$q['expiryDate']= array('$gte' => $tfrom, '$lt' => $tto);
		}
		//print_r($q)
		/*
		if(!is_null($type)){
			$q['docDepartment'] = $type;
		}
		*/
		
		$sharecriteria = new MongoRegex('/'.Auth::user()->email.'/i');

		if( Auth::user()->role == 'root' ||
			Auth::user()->role == 'super' ||
			Auth::user()->role == 'president_director' ||
			Auth::user()->role == 'bod'
			){
			
			// do nothing, can see everything

		}else if( Auth::user()->role == 'client' ||
			Auth::user()->role == 'principal_vendor' ||
			Auth::user()->role == 'subcon'){

			$orarray[] = array('docShare'=>$sharecriteria);
			$orarray[] = array('creatorId'=>Auth::user()->id);

		}else{

			$q['docDepartment'] = trim(Auth::user()->department);

			$orarray[] = array('access'=>'departmental');
			$orarray[] = array('docShare'=>$sharecriteria);
			$orarray[] = array('creatorId'=>Auth::user()->id);

		}


		if(count($orarray) > 0 ){
			$q['$or'] = $orarray;
		}

		//print_r($orarray);

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

		if(trim($searchcombined) == ''){
			$q = array();
			$documents = array();
			$count_display_all = 0;
		}else{
			if(count($q) > 0){
				$documents = $document->find($q,array(),array($sort_col=>$sort_dir),$limit);
				$count_display_all = $document->count($q);
			}else{
				$documents = $document->find(array(),array(),array($sort_col=>$sort_dir),$limit);
				$count_display_all = $document->count();
			}
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

			if(isset($doc['expiring'])){
				$doc['expiring'] = ($doc['expiring'] < Config::get('parama.expiration_alert_days') && $doc['expiring'] > 0)?'<span class="expiring">'.$doc['expiring'].' day(s)</span>':'';
			}else{
				$doc['expiring'] = '';
			}
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

			$aadata[] = array(
				$counter,
				'<span class="metaview" id="'.$doc['_id'].'">'.$doc['title'].'</span>',
				date('Y-m-d H:i:s', $doc['createdDate']->sec),
				isset($doc['lastUpdate'])?date('d-m-Y H:i:s', $doc['lastUpdate']->sec):'',
				isset($doc['expiryDate'])?date('d-m-Y', $doc['expiryDate']->sec):'',
				$doc['expiring'],
				$doc['creatorName'],
				isset($doc['access'])?ucfirst($doc['access']):'',
				isset($doc['docFilename'])?'<span class="fileview" id="'.$doc['_id'].'">'.$doc['docFilename'].'</span>':'',
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


	public function __post_index()
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
				date('Y-m-d h:i:s',$doc['createdDate']->sec),
				$doc['creatorName'],
				$doc['creatorName'],
				implode(',',$doc['tags']),
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

	public function get_add()
	{
		return View::make('document.add');
	}

}