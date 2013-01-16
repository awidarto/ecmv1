<?php

function getavatar($id,$alt = 'avatar-image',$class = 'avatar'){
	if(file_exists(Config::get('parama.avatarstorage').$id.'/avatar.jpg')){
		$photo = HTML::image('avatar/'.$id.'/avatar.jpg', $alt, array('class' => $class));
	}else{
		$photo = HTML::image('images/no-avatar.jpg', 'no-avatar', array('class' => $class));				
	}

	return $photo;
}

function getdocument($id){
    $_id = new MongoId($id);
    $document = new Document();
    $doc = $document->get(array('_id'=>$_id));
    return $doc;
}

function roletitle($role){
	$roletitles = Config::get('parama.roles');
	return $roletitles[$role];
}

function depttitle($dept){
	$depttitles = Config::get('parama.department');
	return $depttitles[$dept];
}

?>
