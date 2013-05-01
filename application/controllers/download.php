<?php
class Download_Controller extends Base_Controller {

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

	public $crumb;


	public function __construct(){
		$this->crumb = new Breadcrumb();
		$this->crumb->add('download','Download');

		date_default_timezone_set('Asia/Jakarta');
		$this->filter('before','auth');
	}

	public function get_index()
	{
		$this->crumb->add('download','Log');

		//print_r(Auth::user());

		$heads = array('#','Title','Timestamp','Downloaded By','Doc Number','Download Filename','Action');
		$searchinput = array(false,'title','timestamp','downloader','doc_number','downloadedfullfilename',false);

		$addurl = '';

		return View::make('tables.simple')
			->with('title','Download Log')
			->with('newbutton','New Document')
			->with('disablesort','0,5,6')
			->with('addurl',$addurl)
			->with('searchinput',$searchinput)
			->with('ajaxsource',URL::to('download'))
			->with('ajaxdel',URL::to(''))
			->with('crumb',$this->crumb)
			->with('heads',$heads);

	}

	public function post_index()
	{
		$type = 'template';

		$fields = array('title','timestamp','downloader','doc_number','downloadedfullfilename');

		$rel = array('like','like','like','like','like','like','like');

		$cond = array('both','both','both','both','both','both','both');

		$pagestart = Input::get('iDisplayStart');
		$pagelength = Input::get('iDisplayLength');

		$limit = array($pagelength, $pagestart);

		$defsort = 1;
		$defdir = -1;

		$idx = 0;
		$q = array();

		//$q['docDepartment'] = 'template';
		//$q['useAsTemplate'] = 'Yes';


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
		$permissions = Auth::user()->permissions;

		$download = new Download();

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

		$count_all = $download->count();

		if(count($q) > 0){
			$templates = $download->find($q,array(),array($sort_col=>$sort_dir),$limit);
			$count_display_all = $download->count($q);
		}else{
			$templates = $download->find(array(),array(),array($sort_col=>$sort_dir),$limit);
			$count_display_all = $download->count();
		}

		$aadata = array();

		$counter = 1 + $pagestart;
		foreach ($templates as $doc) {

			$doc['document']['title'] = str_ireplace($hilite, $hilite_replace, $doc['document']['title']);

			// by default everybody can download template

			$download = '<a href="'.URL::to($doc['dltype'].'/download/'.$doc['_id']).'">'.
					'<i class="foundicon-down-arrow action"></i></a>&nbsp;';

			if($doc['dltype']== 'document'){
				$attachment = (isset($doc['downloadedfullfilename']))?'<span class="fileview" id="'.$doc['document']['_id'].'">'.$doc['downloadedfullfilename'].'</span>':'';
			}else{
				$attachment = (isset($doc['downloadedfullfilename']))?$doc['downloadedfullfilename']:'';
			}

			$aadata[] = array(
				$counter,
				'<span class="metaview" id="'.$doc['document']['_id'].'">'.$doc['document']['title'].'</span>',
				isset($doc['timestamp'])?date('d-m-Y H:i:s', $doc['timestamp']->sec):'',
				$doc['downloader']['fullname'],
				(isset($doc['doc_number']) && $doc['doc_number'] != 0)?$doc['doc_number']:'',
				//isset($doc['downloadedfullfilename'])?$doc['downloadedfullfilename']:'',
				$attachment,
				''
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
?>