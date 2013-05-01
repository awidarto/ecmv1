<?php

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
