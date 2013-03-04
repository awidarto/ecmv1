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

		$this->crumb->add('import/preview','Preview');

		$imp = new Importcache();

		$ihead = $imp->get(array('cache_id'=>$id, 'cache_head'=>true));

		$heads = array();

		//$colclass = array('span3','span3','span3','span1','span1','span1','','','','','','','');

		$colclass = array();

		$cnt = 0;

		$searchinput = array();

		$form = new Formly();

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
			->with('disablesort','0,5,6')
			->with('addurl','')
			->with('commiturl','import/commit/'.$id)
			->with('importid',$id)
			->with('reimporturl','import')
			->with('form',$form)
			->with('head_count',$head_count)
			->with('colclass',$colclass)
			->with('searchinput',$searchinput)
			->with('ajaxsource',URL::to('import/loader/'.$controller.'/'.$id))
			->with('ajaxdel',URL::to('attendee/del'))
			->with('crumb',$this->crumb)
			->with('heads',$heads);
	}

	public function post_loader($controller,$id)
	{

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

		}else if($controller == 'opportunity'){

		}

		//print_r($email_arrays);


		$aadata = array();

		$form = new Formly();

		$counter = 1 + $pagestart;

		foreach ($attendees as $doc) {

			$extra = $doc;


			$adata = array();

			for($i = 0; $i < count($fields); $i++){

				if(in_array($doc[$fields[$i]], $email_arrays)){
					$adata[$i] = '<span class="duplicateemail">'.$doc[$fields[$i]].'</spam>';
				}else{
					$adata[$i] = $doc[$fields[$i]];
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

			}else if($controller == 'opportunity'){

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

	public function post_commit($importid){
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

			$attendee = new Attendee();

			$i2o = Config::get('eventreg.attendee_map');

			$commit_count = 0;

			foreach($commitobj as $comobj){
				//print_r($comobj);

				$tocommit = Config::get('eventreg.attendee_template');


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
				$tocommit['groupName'] = $comobj['groupName'];
				$tocommit['groupId'] = $comobj['groupId'];

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


				if($override == true){

					$attobj = $attendee->get(array('email'=>$tocommit['email']));

					$tocommit['lastUpdate'] = new MongoDate();
					$tocommit['role'] = 'attendee';

					if(isset($tocommit['conventionPaymentStatus'])){
						$tocommit['conventionPaymentStatus'] = $attobj['conventionPaymentStatus'];
					}

					if(isset($tocommit['golfPaymentStatus'])){
						$tocommit['golfPaymentStatus'] = $attobj['golfPaymentStatus'];
					}

					$reg_number = array();
					$seq = new Sequence();

					if(isset($attobj['registrationnumber']) && $attobj['registrationnumber'] != ''){
						$reg_number = explode('-',$attobj['registrationnumber']);

						$reg_number[0] = 'C';
						$reg_number[1] = $tocommit['regtype'];
						$reg_number[2] = ($tocommit['attenddinner'] == 'Yes')?str_pad(Config::get('eventreg.galadinner'), 2,'0',STR_PAD_LEFT):'00';

					}else if($attobj['registrationnumber'] == ''){
						$reg_number = array();
						$rseq = $seq->find_and_modify(array('_id'=>'attendee'),array('$inc'=>array('seq'=>1)),array('seq'=>1),array('new'=>true));

						$reg_number[0] = 'C';
						$reg_number[1] = $tocommit['regtype'];
						$reg_number[2] = ($tocommit['attenddinner'] == 'Yes')?str_pad(Config::get('eventreg.galadinner'), 2,'0',STR_PAD_LEFT):'00';

						$regsequence = str_pad($rseq['seq'], 6, '0',STR_PAD_LEFT);

						$reg_number[3] = $regsequence;

						$tocommit['regsequence'] = $regsequence;

					}

					$tocommit['registrationnumber'] = implode('-',$reg_number);

					$plainpass = rand_string(8);

					$tocommit['pass'] = Hash::make($plainpass);

					//golf sequencer
					$tocommit['golfSequence'] = 0;

					if($tocommit['golf'] == 'Yes' && $attobj['golf'] == 'No'){
						$gseq = $seq->find_and_modify(array('_id'=>'golf'),array('$inc'=>array('seq'=>1)),array('seq'=>1),array('new'=>true,'upsert'=>true));
						$tocommit['golfSequence'] = $gseq['seq'];
					}

					if($data['updatepass'] == 'Yes'){
						$plainpass = rand_string(8);
						$tocommit['pass'] = Hash::make($plainpass);
					}else{
						$tocommit['pass'] = $attobj['pass'];
						$plainpass = 'nochange';
					}

					if( $attobj['golfPaymentStatus']=='paid' || $attobj['conventionPaymentStatus']=='paid'){						

						$tocommit['regtype'] == $attobj['regtype'];
						$tocommit['golf'] == $attobj['golf'];

					}else{
						if($tocommit['regtype'] == 'PD' && $tocommit['golf'] == 'No'){
							$tocommit['totalIDR'] = '4500000';
							$tocommit['totalUSD'] = '';
						}elseif ($tocommit['regtype'] == 'PD' && $tocommit['golf'] == 'Yes'){
							$tocommit['totalIDR'] = '7000000';
							$tocommit['totalUSD'] = '';
						}elseif ($tocommit['regtype'] == 'PO' && $tocommit['golf'] == 'No'){
							$tocommit['totalIDR'] = '';
							$tocommit['totalUSD'] = '500';
						}elseif ($tocommit['regtype'] == 'PO' && $tocommit['golf'] == 'Yes'){
							$tocommit['totalIDR'] = '2500000';
							$tocommit['totalUSD'] = '500';
						}elseif ($tocommit['regtype'] == 'SD'){
							$tocommit['totalIDR'] = '400000';
							$tocommit['totalUSD'] = '';
						}elseif ($tocommit['regtype'] == 'SO'){
							$tocommit['totalIDR'] = '';
							$tocommit['totalUSD'] = '120';
						}
					}

					

					if($attendee->update(array('email'=>$tocommit['email']),array('$set'=>$tocommit))){

						Event::fire('attendee.update',array($attobj['_id'],$plainpass,$pic['email'],$pic['firstname'].$pic['lastname']));

						//if($data['sendattendee'] == 'Yes'){
						//	// send message to each attendee
							//Event::fire('attendee.update',array($comobj['_id'],$plainpass));
						//}

						$commitedobj[] = $tocommit;

						$icache->update(array('email'=>$tocommit['email']),array('$set'=>array('cache_commit'=>true)));

						$commit_count++;

					}
				}else if($existing == false){


					$tocommit['createdDate'] = new MongoDate();
					$tocommit['lastUpdate'] = new MongoDate();

					$tocommit['role'] = 'attendee';
					$tocommit['paymentStatus'] = 'unpaid';
					$tocommit['conventionPaymentStatus'] = 'unpaid';

					if($tocommit['golf'] == 'Yes'){
						$tocommit['golfPaymentStatus'] = 'unpaid';
					}else{
						$tocommit['golfPaymentStatus'] = '-';
					}

					$reg_number = array();

					$reg_number[0] = 'C';
					$reg_number[1] = $tocommit['regtype'];
					$reg_number[2] = ($tocommit['attenddinner'] == 'Yes')?str_pad(Config::get('eventreg.galadinner'), 2,'0',STR_PAD_LEFT):'00';

					$seq = new Sequence();

					$rseq = $seq->find_and_modify(array('_id'=>'attendee'),array('$inc'=>array('seq'=>1)),array('seq'=>1),array('new'=>true));

					//$reg_number[3] = str_pad($rseq['seq'], 6, '0',STR_PAD_LEFT);

					$regsequence = str_pad($rseq['seq'], 6, '0',STR_PAD_LEFT);

					$reg_number[3] = $regsequence;

					$tocommit['regsequence'] = $regsequence;


					$tocommit['registrationnumber'] = implode('-',$reg_number);

					$plainpass = rand_string(8);

					$tocommit['pass'] = Hash::make($plainpass);

					//golf sequencer
					$tocommit['golfSequence'] = 0;

					if($tocommit['golf'] == 'Yes'){
						$gseq = $seq->find_and_modify(array('_id'=>'golf'),array('$inc'=>array('seq'=>1)),array('seq'=>1),array('new'=>true,'upsert'=>true));
						$tocommit['golfSequence'] = $gseq['seq'];
					}

					if($tocommit['regtype'] == 'PD' && $tocommit['golf'] == 'No'){
						$tocommit['totalIDR'] = '4500000';
						$tocommit['totalUSD'] = '';
					}elseif ($tocommit['regtype'] == 'PD' && $tocommit['golf'] == 'Yes'){
						$tocommit['totalIDR'] = '7000000';
						$tocommit['totalUSD'] = '';
					}elseif ($tocommit['regtype'] == 'PO' && $tocommit['golf'] == 'No'){
						$tocommit['totalIDR'] = '';
						$tocommit['totalUSD'] = '500';
					}elseif ($tocommit['regtype'] == 'PO' && $tocommit['golf'] == 'Yes'){
						$tocommit['totalIDR'] = '2500000';
						$tocommit['totalUSD'] = '500';
					}elseif ($tocommit['regtype'] == 'SD'){
						$tocommit['totalIDR'] = '400000';
						$tocommit['totalUSD'] = '';
					}elseif ($tocommit['regtype'] == 'SO'){
						$tocommit['totalIDR'] = '';
						$tocommit['totalUSD'] = '120';
					}

					if($obj = $attendee->insert($tocommit)){

						//if($data['sendattendee'] == 'Yes'){
							// send message to each attendee
							Event::fire('attendee.create',array($obj['_id'],$plainpass,$pic['email'],$pic['firstname'].$pic['lastname']));
						// /}

						$commitedobj[] = $tocommit;

						$icache->update(array('email'=>$tocommit['email']),array('$set'=>array('cache_commit'=>true)));

						$commit_count++;

					}

				}

			}

			if($data['attendeesummary'] == 'Yes'){

				//print_r($commitedobj);

				$body = View::make('email.regsummarypic')
					->with('pic',$pic)
					->with('attendee',$commitedobj)
					->render();


				Message::to($pic['email'])
				    ->from(Config::get('eventreg.reg_admin_email'), Config::get('eventreg.reg_admin_name'))
				    ->cc(Config::get('eventreg.reg_finance_email'), Config::get('eventreg.reg_finance_name'))
				    ->subject('Registration Summary – '.$pic['company'])
				    ->body( $body )
				    ->html(true)
				    ->send();


				// send to pic , use
				// $commitedobj as input array
				// $pic as PIC data
			}

			//if($data['sendpic'] == 'Yes'){

				
			//}

			return Redirect::to('import/preview/'.$importid)->with('notify_success','Committing '.$commit_count.' record(s)');
		}else{
			return Redirect::to('import/preview/'.$importid)->with('notify_success','No entry selected to commit');
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
					}else if($controller == 'project'){
						$heads = $rows[2];
					}else if($controller == 'opportunity'){
						$heads = $rows[2];
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

					//remove first two lines
					array_shift($rows);
					array_shift($rows);
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