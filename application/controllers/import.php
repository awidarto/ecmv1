<?php

class Import_Controller extends Base_Controller {

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

		date_default_timezone_set('Asia/Jakarta');
		$this->filter('before','auth');

		$this->crumb->add('import','Import Data');
	}

	public function get_index($controller)
	{

		$form = new Formly();

		return View::make('import.import')
			->with('title','Import Data')
			->with('controller',$controller)
			->with('form',$form)
			->with('crumb',$this->crumb);
	}

	public function get_doimport($controller)
	{
		$this->crumb = new Breadcrumb();
		$this->crumb->add($controller,ucfirst($controller));
		$this->crumb->add('import/doimport','Import '.ucfirst($controller).' Data');

		$form = new Formly();

		return View::make('import.import')
			->with('title','Import '.ucfirst($controller).' Data')
			->with('controller',$controller)
			->with('form',$form)
			->with('crumb',$this->crumb);
	}

	public function get_preview($controller,$id = null)
	{
		$this->crumb = new Breadcrumb();
		$this->crumb->add($controller,ucfirst($controller));
		$this->crumb->add('import/doimport','Import '.ucfirst($controller).' Data',false);

		$this->crumb->add('import/preview/'.$controller,'Preview');

		$imp = new Importcache();

		$ihead = $imp->get(array('cache_id'=>$id, 'cache_head'=>true));

		$heads = array();

		//$colclass = array('span3','span3','span3','span1','span1','span1','','','','','','','');

		$colclass = array();

		$cnt = 0;

		$searchinput = array();

		$form = new Formly();
		$form->framework = 'bootstrap';

		$select_all = $form->checkbox('select_all','','',false,array('id'=>'select_all'));

		$override_all = $form->checkbox('override_all','','',false,array('id'=>'override_all'));

		$valid_heads = array_keys(Config::get('import.'.$controller.'_valid_head_selects'));

		foreach ($ihead['head_labels'] as $h) {

			$hidden_head = $form->hidden('mapped_'.$cnt,$h);

			$heads[$cnt] = $h.$hidden_head;

			$searchinput[$cnt] = $form->select('map_'.$cnt,'',Config::get('import.'.$controller.'_valid_head_selects'),$h);


			if(!in_array($h, $valid_heads)){
				$heads[$cnt] = '<span class="invalidhead">'.$heads[$cnt].'</span>';

			}else{

			}

			$cnt++;
		}



		$head_count = count($heads);

		$colclass = array_merge(array('',''),$colclass);

		$searchinput = array_merge(array($select_all,$override_all),$searchinput);

		$heads = array_merge(array('Select','Override'),$heads);



		return View::make('tables.import')
			->with('title','Data Preview')
			->with('newbutton','Commit Import')
			->with('disablesort','0,1,5,6')
			->with('addurl','')
			->with('commiturl','import/commit/'.$id)
			->with('importid',$id)
			->with('reimporturl','import')
			->with('form',$form)
			->with('head_count',$head_count)
			->with('colclass',$colclass)
			->with('controller',$controller)
			->with('searchinput',$searchinput)
			->with('ajaxsource',URL::to('import/loader/'.$controller.'/'.$id))
			->with('ajaxdel',URL::to('attendee/del'))
			->with('crumb',$this->crumb)
			->with('heads',$heads);
	}

	public function post_loader($controller,$id)
	{
		$excel = new Excel();

		$imp = new Importcache();

		$ihead = $imp->get(array('cache_id'=>$id, 'cache_head'=>true));

		$fields = $ihead['head_labels'];


		//$fields = array('registrationnumber','firstname','lastname','email','company','position','mobile','companyphone','companyfax','createdDate','lastUpdate');

		$rel = array('like','like','like','like','like','like','like','like','like','like');

		$cond = array('both','both','both','both','both','both','both','both','both','both');

		$pagestart = Input::get('iDisplayStart');
		$pagelength = Input::get('iDisplayLength');

		$limit = array($pagelength, $pagestart);

		$defsort = 1;
		$defdir = -1;

		$idx = 0;
		$q = array('cache_head'=>false,'cache_id'=>$id,'cache_commit'=>false);

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

		$attendee = new Importcache();

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

		$count_all = $attendee->count();

		if(count($q) > 0){
			$attendees = $attendee->find($q,array(),array($sort_col=>$sort_dir),$limit);
			$count_display_all = $attendee->count($q);
		}else{
			$attendees = $attendee->find(array(),array(),array($sort_col=>$sort_dir),$limit);
			$count_display_all = $attendee->count();
		}

		if($controller == 'project'){

			$attending = new Project();

			$email_arrays = array();

			foreach($attendees as $e){
				$email_arrays[] = array('projectNumber'=>$e['job_no']);
			}

			//print_r($email_arrays);

			$email_check = $attending->find(array('$or'=>$email_arrays),array('projectNumber'=>1,'_id'=>-1));

			$email_arrays = array();

			foreach($email_check as $ec){
				$email_arrays[] = $ec['projectNumber'];
			}


		}else if($controller == 'tender'){

			$attending = new Tender();

			$email_arrays = array();

			foreach($attendees as $e){
				$email_arrays[] = array('tenderNumber'=>$e['tender_no']);
			}

			//print_r($email_arrays);

			$email_check = $attending->find(array('$or'=>$email_arrays),array('tenderNumber'=>1,'_id'=>-1));

			$email_arrays = array();

			foreach($email_check as $ec){
				$email_arrays[] = $ec['tenderNumber'];
			}


		}else if($controller == 'opportunity'){

			$attending = new Opportunity();

			$email_arrays = array();

			foreach($attendees as $e){
				$email_arrays[] = array('opportunityNumber'=>$e['opportunity_no']);
			}

			//print_r($email_arrays);

			$email_check = $attending->find(array('$or'=>$email_arrays),array('opportunityNumber'=>1,'_id'=>-1));

			$email_arrays = array();

			foreach($email_check as $ec){
				$email_arrays[] = $ec['opportunityNumber'];
			}

			// contact dupes

			$contacts = new Person();

			$contact_arrays = array();

			foreach($attendees as $e){
				if(isset($e['email'])){
					$contact_arrays[] = array('personEmail'=>$e['email']);
				}
			}

			//print_r($contact_arrays);

			$contact_check = $contacts->find(array('$or'=>$contact_arrays),array('personEmail'=>1,'_id'=>-1));

			//print_r($contact_check);

			$contact_arrays = array();

			foreach($contact_check as $ec){
				$contact_arrays[] = $ec['personEmail'];
			}

		}

		//print_r($email_arrays);


		$aadata = array();

		$form = new Formly();
		$form->framework = 'bootstrap';

		$counter = 1 + $pagestart;

		foreach ($attendees as $doc) {

			$extra = $doc;


			$adata = array();

			for($i = 0; $i < count($fields); $i++){

				if($controller == 'opportunity'){
					if(in_array($doc[$fields[$i]], $contact_arrays) || in_array($doc[$fields[$i]], $email_arrays) ){
						$adata[$i] = '<span class="duplicateemail">'.$doc[$fields[$i]].'</span>';
					}else{
						$adata[$i] = se($doc[$fields[$i]]);
					}

				}else{
					if(in_array($doc[$fields[$i]], $email_arrays) ){
						$adata[$i] = '<span class="duplicateemail">'.$doc[$fields[$i]].'</span>';
					}else{
						$adata[$i] = se($doc[$fields[$i]]);
					}
				}

			}

			//print_r($adata);


			$select = $form->checkbox('sel[]','',$doc['_id'],false,array('id'=>$doc['_id'],'class'=>'selector'));

			if($controller == 'project'){

				if(in_array($doc['job_no'], $email_arrays)){
					$override = $form->checkbox('over[]','',$doc['_id'],'',array('id'=>'over_'.$doc['_id'],'class'=>'overselector'));
					$exist = $form->hidden('existing[]',$doc['_id']);
				}else{
					$override = '';
					$exist = '';
				}

			}else if($controller == 'tender'){

				if(in_array($doc['tender_no'], $email_arrays)){
					$override = $form->checkbox('over[]','',$doc['_id'],'',array('id'=>'over_'.$doc['_id'],'class'=>'overselector'));
					$exist = $form->hidden('existing[]',$doc['_id']);
				}else{
					$override = '';
					$exist = '';
				}

			}else if($controller == 'opportunity'){

				//$doc['date'] = date('Y-m-d',$excel->toPHPdate($doc['date']));

				//print_r($contact_arrays);


				if( strtolower($doc['entry_type']) == 'main' && in_array($doc['opportunity_no'], $email_arrays)){
					$override = $form->checkbox('over[]','',$doc['_id'],'',array('id'=>'over_'.$doc['_id'],'class'=>'overselector'));
					$exist = $form->hidden('existing[]',$doc['_id']);
				}else if( strtolower($doc['entry_type']) == 'contact' && in_array($doc['email'], $contact_arrays ) ){
					$override = $form->checkbox('over[]','',$doc['_id'],'',array('id'=>'over_'.$doc['_id'],'class'=>'overselector'));
					$exist = $form->hidden('existing[]',$doc['_id']);
				}else{
					$override = '';
					$exist = '';
				}

			}

			$adata = array_merge(array($select,$override.''.$exist),$adata);

			$adata['extra'] = $extra;

			$aadata[] = $adata;

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

	public function __post_commit($controller,$importid){
		$data = Input::all();

		print_r($data);
	}

	public function post_commit($controller,$importid){
		$data = Input::all();

		//print_r($data);

		$importsession = new Import();

		$_imid = new MongoId($importid);

		$pic = $importsession->get(array('_id'=>$_imid));

		if(isset($data['sel'])){

			$commitedobj = array();

			$idvals = array();

			foreach ($data['sel'] as $idval) {
				$_id = new MongoId($idval);
				$idvals[] = array('_id'=>$_id);
			}

			$icache = new Importcache();

			$commitobj = $icache->find(array('$or'=>$idvals));

			//print_r($commitobj);
			if($controller == 'project'){

				$target = new Project();
				$target_identifier = 'projectNumber';
			}else if($controller == 'tender'){

				$target = new Tender();
				$target_identifier = 'tenderNumber';

			}else if($controller == 'opportunity'){

				$target = new Opportunity();
				$target_identifier = 'opportunityNumber';

				$contacts = new Person();

			}

			$i2o = Config::get('import.'.$controller.'_map');
			$i2c = Config::get('import.contact_map');

			$company_filler = '';
			$opportunity_tracker = '';


			$commit_count = 0;

			foreach($commitobj as $comobj){
				//print_r($comobj);

				$tocommit = Config::get('import.'.$controller.'_template');
				$contacttocommit = Config::get('import.contact_template');


				for($i = 0; $i < $data['head_count']; $i++ ){

					$okey = $data['map_'.$i];
					if(isset($i2o[$okey])){
						$tocommit[$i2o[$okey]] = $comobj[$okey];
						//print $okey.' --> '.$i2o[$okey]."<br />\r\n";
					}
				}

				// import and group identifier
				$tocommit['cache_id'] = $comobj['cache_id'];
				$tocommit['cache_obj'] = $comobj['_id'];

				// only for opportunity import


				for($i = 0; $i < $data['head_count']; $i++ ){

					$okey = $data['map_'.$i];
					if(isset($i2c[$okey])){
						$contacttocommit[$i2c[$okey]] = $comobj[$okey];
						//print $okey.' --> '.$i2o[$okey]."<br />\r\n";
					}
				}

				$contacttocommit['cache_id'] = $comobj['cache_id'];
				$contacttocommit['cache_obj'] = $comobj['_id'];


				if(isset($data['over'])){
					if( in_array($comobj['_id']->__toString(), $data['over'])){
						$override = true;
					}else{
						$override = false;
					}
				}else{
					$override = false;
				}


				if(isset($data['existing'])){
					if( in_array($comobj['_id']->__toString(), $data['existing'])){
						$existing = true;
					}else{
						$existing = false;
					}
				}else{
					$existing = false;
				}

				//print_r($tocommit);
				//print 'override -> '.$override."\r\n";

				//print_r($commitobj);
				//preprocess here

				$excel = new Excel();

				if($controller == 'project'){
					$tocommit['effectiveDate'] = date('Y-m-d',$excel->toPHPdate($tocommit['effectiveDate']));
					$tocommit['dueDate'] = date('Y-m-d',$excel->toPHPdate($tocommit['dueDate']));

					$tocommit['effectiveDate'] = new MongoDate(strtotime($tocommit['effectiveDate']));
					$tocommit['dueDate'] = new MongoDate(strtotime($tocommit['dueDate']));

				}else if($controller == 'tender'){
					$tocommit['closingDate'] = date('Y-m-d',$excel->toPHPdate($tocommit['closingDate']));
					$tocommit['tenderDate']  = date('Y-m-d',$excel->toPHPdate($tocommit['tenderDate']));

					$tocommit['closingDate'] = new MongoDate(strtotime($tocommit['closingDate']));
					$tocommit['tenderDate']  = new MongoDate(strtotime($tocommit['tenderDate']));
				}else if($controller == 'opportunity'){
					if($tocommit['opportunityDate'] != ''){
						$tocommit['opportunityDate'] = date('Y-m-d',$excel->toPHPdate($tocommit['opportunityDate']));
						$tocommit['opportunityDate'] = new MongoDate(strtotime($tocommit['opportunityDate']));
					}

				}

				if($controller == 'opportunity'){
					print_r($contacttocommit);
					//print var_dump($override)."\r\n";
					//print var_dump($existing)."\r\n";
				}


				if($override == true){

					$attobj = $target->get(array($target_identifier=>$tocommit[$target_identifier]));

					$tocommit['lastUpdate'] = new MongoDate();
					$contacttocommit['lastUpdate'] = new MongoDate();


					$is_main = true;

					if($controller == 'opportunity'){

						if(strtoupper($tocommit['entry_type']) == strtoupper( 'Contact' )){
							$is_main = false;
						}else{
							$is_main = true;
						}

						if($contacts->update(array('personEmail'=>$contacttocommit['personEmail']),array('$set'=>$contacttocommit),array('upsert'=>true))){

							Event::fire($controller.'.update',array('id'=>$attobj['_id'],'result'=>'OK'));

							$commitedobj[] = $contacttocommit;

							$icache->update(array('email'=>$contacttocommit['personEmail']),array('$set'=>array('cache_commit'=>true)));

							$commit_count++;

						}


					}

					if($is_main == true){

						if($target->update(array($target_identifier=>$tocommit[$target_identifier]),array('$set'=>$tocommit))){

							Event::fire($controller.'.update',array('id'=>$attobj['_id'],'result'=>'OK'));

							$commitedobj[] = $tocommit;

							$icache->update(array($target_identifier=>$tocommit[$target_identifier]),array('$set'=>array('cache_commit'=>true)));

							$commit_count++;

						}


					}



				}else if($existing == false){


					$tocommit['createdDate'] = new MongoDate();
					$tocommit['lastUpdate'] = new MongoDate();
					$tocommit['creatorName'] = Auth::user()->fullname;
					$tocommit['creatorId'] = Auth::user()->id;

					$contacttocommit['createdDate'] = new MongoDate();
					$contacttocommit['lastUpdate'] = new MongoDate();
					$contacttocommit['creatorName'] = Auth::user()->fullname;
					$contacttocommit['creatorId'] = Auth::user()->id;

					$is_main = true;

					if($controller == 'opportunity'){

						if(strtoupper($tocommit['entry_type']) == strtoupper( 'Contact' )){
							$is_main = false;
						}else{
							$is_main = true;
						}

						if($obj = $contacts->insert($contacttocommit)){

								Event::fire('contact.create',array('id'=>$obj['_id'],'result'=>'OK'));

								$commitedobj[] = $contacttocommit;

								$icache->update(array('email'=>$contacttocommit['personEmail']),array('$set'=>array('cache_commit'=>true)));

								$commit_count++;

						}

					}

					if($is_main == true){

						if($obj = $target->insert($tocommit)){

								Event::fire($controller.'.create',array('id'=>$obj['_id'],'result'=>'OK'));

								$commitedobj[] = $tocommit;

								$icache->update(array($target_identifier=>$tocommit[$target_identifier]),array('$set'=>array('cache_commit'=>true)));

								$commit_count++;

						}

					}




				}

			}

			//exit();

			return Redirect::to('import/preview/'.$controller.'/'.$importid)->with('notify_success','Committing '.$commit_count.' record(s)');
		}else{
			return Redirect::to('import/preview/'.$controller.'/'.$importid)->with('notify_success','No entry selected to commit');
		}

	}

	public function post_preview($controller)
	{

		//print_r(Session::get('permission'));

		$back = 'import/preview/'.$controller;

	    $rules = array(
	        'docupload'  => 'required'
	    );

	    $validation = Validator::make($input = Input::all(), $rules);

	    if($validation->fails()){

	    	return Redirect::to('import/preview/'.$controller)->with_errors($validation)->with_input(Input::all());

	    }else{

			$data = Input::get();

	    	//print_r($data);

			//pre save transform
			unset($data['csrf_token']);

			$data['createdDate'] = new MongoDate();
			$data['lastUpdate'] = new MongoDate();
			$data['creatorName'] = Auth::user()->fullname;
			$data['creatorId'] = Auth::user()->id;

			$docupload = Input::file('docupload');

			$docupload['uploadTime'] = new MongoDate();

			$data['docFilename'] = $docupload['name'];

			$data['docFiledata'] = $docupload;

			$data['docFileList'][] = $docupload;

			$document = new Import();

			$newobj = $document->insert($data);


			if($newobj){


				if($docupload['name'] != ''){

					$newid = $newobj['_id']->__toString();

					$newdir = realpath(Config::get('kickstart.storage')).'/imports/'.$newid;

					Input::upload('docupload',$newdir,$docupload['name']);

				}

				if($newobj['docFilename'] != ''){

					$icache = new Importcache();

					$c_id = $newobj['_id']->__toString();

					$filepath = Config::get('kickstart.storage').'/imports/'.$c_id.'/'.$newobj['docFilename'];

					$excel = new Excel();

					$extension = File::extension($filepath);

					$excel->setController($controller);

					$xls = $excel->load($filepath,$extension);

					$rows = $xls['cells'];

					//print_r($rows);

					if($controller == 'tender'){
						$heads = $rows[2];
						//remove first three lines, remember index starts from zero
						array_shift($rows);
						array_shift($rows);
						array_shift($rows);

					}else if($controller == 'project'){
						$heads = $rows[2];
						//remove first three lines, remember index starts from zero
						array_shift($rows);
						array_shift($rows);
						array_shift($rows);
					}else if($controller == 'opportunity'){
						$heads = $rows[2];
						//remove first three lines, remember index starts from zero
						array_shift($rows);
						array_shift($rows);
						array_shift($rows);
					}
					//print_r($heads);

					$theads = array();
					for($x = 0;$x < count($heads);$x++){
						if(trim($heads[$x]) == ''){
						}else{
							$theads[] = $heads[$x];
						}
					}

					$heads = $theads;

					//print_r($heads);

					//unset($rows[0]);
					//unset($rows[1]);


					//print_r($rows);

					//remove empty line arrays
					$trows = array();
					for($x = 0;$x < count($rows);$x++){
						if(trim(implode('',$rows[$x])) == ''){
							unset($rows[$x]);
						}else{
							$trows[] = $rows[$x];
						}
					}

					//print_r($trows);

					$rows = $trows;

					$inhead = array();

					$chead = array();

					foreach ($heads as $head) {
						$label = str_replace(array('.','\'','(',')','/'), '', trim($head));

						$label = preg_replace('/[ ][ ]+/', ' ', $label);

						$label = str_replace(array(' '), '_', $label);
						$label = strtolower(trim($label));

						$chead[] = $label;
					}

					$inhead['head_labels'] = $chead;
					$inhead['cache_head'] = true;
					$inhead['cache_id'] = $c_id;
					$inhead['cache_commit'] = false;
					$inhead['controller'] = $controller;

					//print_r($inhead);

					$icache->insert($inhead);

					foreach($rows as $row){

						if(implode('',$row) != ''){
							$ins = array();
							for($i = 0; $i < count($heads); $i++){

								$label = str_replace(array('.','\'','(',')','/'), '', trim($heads[$i]));

								$label = preg_replace('/[ ][ ]+/', ' ', $label);

								$label = str_replace(array(' '), '_', $label);

								$label = strtolower(trim($label));

								$ins[$label] = $row[$i];
							}

							$ins['cache_head'] = false;
							$ins['cache_id'] = $c_id;
							$ins['cache_commit'] = false;

							//print_r($ins);

							$icache->insert($ins);
						}

					}



				}

				Event::fire('import.create',array('id'=>$newobj['_id'],'result'=>'OK','department'=>Auth::user()->department,'creator'=>Auth::user()->id));

		    	return Redirect::to($back.'/'.$newobj['_id'])->with('notify_success','Document uploaded successfully');
			}else{
				Event::fire('import.create',array('id'=>$id,'result'=>'FAILED'));
		    	return Redirect::to($back)->with('notify_success','Document upload failed');
			}

	    }


	}


}

?>