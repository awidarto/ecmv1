<?php

function getCategory($type = null){

	$permissions = Auth::user()->permissions;

	if(is_null($type)){
		$category = false;
		//$category = json_encode(Config::get('category.all'));
	}else{
		$therole = Auth::user()->role;

		if($type == 'my_employment'){

			if(file_exists('public/yml/my_employment.yml')){
				$parsed = Yaml::from_file('public/yml/my_employment.yml')->to_array();

				$all = array('label'=>'All','id'=>'all');

				array_unshift($parsed, $all);

				$category = json_encode($parsed);
			}else{
				$category = json_encode(Config::get('category.'.$type));
			}

		}else if($type == 'president_director'){

			$types = Config::get('parama.department');
			$types = array_keys($types);

			$fullarray = array();

			foreach ($types as $t) {
				$nodisplay = ($t == 'finance_hr_director' || $t == 'operations_director')?true:false;

				if(file_exists('public/yml/'.$t.'.yml') && $nodisplay == false){
					$parsed = Yaml::from_file('public/yml/'.$t.'.yml')->to_array();
					$parent = array('label'=>depttitle($t),'id'=>'parent','children'=>$parsed);
					$fullarray[] = $parent;
				}
			}

			$all = array('label'=>'All','id'=>'all');

			array_unshift($fullarray, $all);

			$category = json_encode($fullarray);


		}else if($type == 'operations_director'){

			$types = Config::get('parama.department');
			$types = array_keys($types);

			$fullarray = array();

			foreach ($types as $t) {
				$nodisplay = ($t == 'finance_hr_director' || $t == 'finance_balikpapan' || $t == 'finance_pusat' || $t == 'hr_admin')?true:false;

				if(file_exists('public/yml/'.$t.'.yml') && $nodisplay == false){
					$parsed = Yaml::from_file('public/yml/'.$t.'.yml')->to_array();
					$parent = array('label'=>depttitle($t),'id'=>'parent','children'=>$parsed);
					$fullarray[] = $parent;
				}
			}

			$all = array('label'=>'All','id'=>'all');

			array_unshift($fullarray, $all);

			$category = json_encode($fullarray);

		}else{

			if(file_exists('public/yml/'.$type.'.yml')){
				$parsed = Yaml::from_file('public/yml/'.$type.'.yml')->to_array();

				$all = array('label'=>'All','id'=>'all');

				array_unshift($parsed, $all);

				$category = json_encode($parsed);
			}else{
				$category = json_encode(Config::get('category.'.$type));
			}

		}

	}

	return $category;
}

function getEmpCategory(){

	if(file_exists('public/yml/my_employment.yml')){
		$parsed = Yaml::from_file('public/yml/my_employment.yml')->to_array();

		$all = array('label'=>'All','id'=>'all');

		array_unshift($parsed, $all);

		$category = json_encode($parsed);
	}else{
		$category = json_encode(Config::get('category.'.$type));
	}

	return $category;
}


function pdf2images($inpath,$outdir){
	$cmd = '%s -q -dNOPAUSE -dBATCH -sDEVICE=pngalpha -r96 -dEPSCrop -sOutputFile=%s/page_%%d.png %s';

	$cmd = sprintf($cmd,Config::get('kickstart.pdf2image_exec'), $outdir, $inpath);

	//print $cmd;

	$ex = shell_exec($cmd);

	return $ex;
}

function getpages($inpath){
	$pnum = scandir($inpath);
	$pnum = count($pnum)-2;

	$pages = array();

	for($p = 1; $p <= $pnum;$p++)
	{
		$pages[] = 'page_'.$p;
	}

	return $pages;
}


function getavatar($id,$alt = 'avatar-image',$class = 'avatar',$width = '1000'){

	$usr = new User();

	$_id = new MongoId($id);

	$usr = $usr->get(array('_id'=>$_id));


	if(file_exists(Config::get('parama.avatarstorage').$id.'/avatar.jpg')){
		$avatarpath = realpath(Config::get('parama.avatarstorage')).'/'.$id;
		$time = time();
		$url = URL::to_asset('avatar/'.$id.'/avatar.jpg');
		$photo = '<a id="avatarimagefancy" href="'.$url.'">'.HTML::image('avatar/'.$id.'/avatar.jpg?'.$time, $alt, array('class' => $class,'width'=>$width)).'</a>';
		
	}else{
		if(isset($usr['salutation'])){
			$salutation = strtolower($usr['salutation']);
			if(
		  		$usr['department'] == 'bod' ||
		  		$usr['department'] == 'president_director' ||
		  		$usr['department'] == 'operations_director' ||
		  		$usr['department'] == 'finance_hr_director'

			){
				$photo = HTML::image('images/'.$salutation.'-bod-no-avatar.jpg', 'no-avatar', array('class' => $class,'width'=>$width));				
				
			}else{
				$photo = HTML::image('images/'.$salutation.'-other-no-avatar.jpg', 'no-avatar', array('class' => $class,'width'=>$width));				
			}
		}else{
			
			$photo = HTML::image('images/no-avatar.jpg', 'no-avatar', array('class' => $class,'width'=>$width));				
			
		}
	}

	return $photo;
}

function getavatarbyemail($email,$alt = 'avatar-image',$class = 'avatar'){
	$usr = new User();

	$usr = $usr->get(array('email'=>$email),array('id','email'));

	$id = $usr['_id'];

	if(file_exists(Config::get('parama.avatarstorage').$id.'/avatar.jpg')){
		
		$photo = HTML::image('avatar/'.$id.'/avatar.jpg', $alt, array('class' => $class));
	}else{
		$photo = HTML::image('images/no-avatar.jpg', 'no-avatar', array('class' => $class));				
	}

	return $photo;
}

// get employee formal photo

function getphoto($id,$alt = 'avatar-image',$class = 'avatar',$width = '1000'){
	if(file_exists(Config::get('parama.photostorage').$id.'/formal.jpg')){
		$url = URL::to_asset('employees/'.$id.'/formal.jpg');
		$photo = '<a id="avatarimagefancy" href="'.$url.'">'.HTML::image('employees/'.$id.'/formal.jpg', $alt, array('class' => $class,'width'=>$width)).'</a>';
	}else{
		$photo = HTML::image('images/no-avatar.jpg', 'no-avatar', array('class' => $class,'width'=>$width));				
	}

	return $photo;
}

function getphotobyemail($email,$alt = 'avatar-image',$class = 'avatar'){
	$usr = new User();

	$usr = $usr->get(array('email'=>$email),array('id','email'));

	$id = $usr['_id'];

	if(file_exists(Config::get('parama.photostorage').$id.'/avatar.jpg')){
		$photo = HTML::image('employees/'.$id.'/formal.jpg', $alt, array('class' => $class));
	}else{
		$photo = HTML::image('images/no-avatar.jpg', 'no-avatar', array('class' => $class));				
	}

	return $photo;
}


function getuser($id){
	$_id = new MongoId($id);
	$usr = new User();
	$usr = $usr->get(array('_id'=>$_id));
	return $usr;
}

function getuserbyemail($email){
	$usr = new User();
	$usr = $usr->get(array('email'=>$email));
	return $usr;
}

function getdocument($id){
    $_id = new MongoId($id);
    $document = new Document();
    $doc = $document->get(array('_id'=>$_id));
    return $doc;
}

function getproject($id){
    $_id = new MongoId($id);
    $document = new Project();
    $doc = $document->get(array('_id'=>$_id));
    return $doc;
}

function roletitle($role){
	$roletitles = Config::get('parama.roles');
	return $roletitles[$role];
}

function depttitle($dept){
	if(is_null($dept)){
		$depttitles = 'No Title';
	}else{
		$depttitles = Config::get('parama.department');
		$depttitles = $depttitles[$dept];
	}
	return $depttitles;
}

function breaksentence($string, $chunklength = 100){
	if(strlen($string) <= $chunklength){
		return $string;
	}else{
		return chunk_split($string,$chunklength,'-');
	}
}

function limitwords($string, $word_limit)
{
    $words = explode(" ",$string);
    if(count($words) <= $word_limit){
    	return $string;
    }else{
	    return implode(" ",array_splice($words,0,$word_limit)).'...';
    }
}

function fixfilename($filename)
{
	$label = $filename;
	$label = str_replace(Config::get('kickstart.invalidchars'), ' ', trim($label));
	$label = preg_replace('/[ ][ ]+/', ' ', $label);
	$label = str_replace(array(' '), '_', $label);

	return $label;
}

function recurse_copy($src,$dst) {
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
}
?>
