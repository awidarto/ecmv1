<?php

Event::listen('document.create',function($id, $result){
    $activity = new Activity();

    $ev = array('event'=>'document.upload',
        'timestamp'=>new MongoDate(),
        'user_id'=>new MongoId(Auth::user()->id),
        'doc_id'=>$id,'result'=>$result);

    if($activity->insert($ev)){
        return true;
    }else{
        return false;
    }

});

Event::listen('document.update',function($id,$result){
    $activity = new Activity();

    $ev = array('event'=>'document.update',
        'timestamp'=>new MongoDate(),
        'user_id'=>new MongoId(Auth::user()->id),
        'doc_id'=>$id,'result'=>$result);

    if($activity->insert($ev)){
        return true;
    }else{
        return false;
    }

});

Event::listen('document.delete',function($id,$result){
    $activity = new Activity();

    $ev = array('event'=>'document.delete',
        'timestamp'=>new MongoDate(),
        'user_id'=>new MongoId(Auth::user()->id),
        'doc_id'=>$id,'result'=>$result);

    if($activity->insert($ev)){
        return true;
    }else{
        return false;
    }

});

Event::listen('project.create',function($id, $result){
    $activity = new Activity();

    $ev = array('event'=>'project.upload',
        'timestamp'=>new MongoDate(),
        'user_id'=>new MongoId(Auth::user()->id),
        'doc_id'=>$id,'result'=>$result);

    if($activity->insert($ev)){
        return true;
    }else{
        return false;
    }

});

Event::listen('project.update',function($id,$result){
    $activity = new Activity();

    $ev = array('event'=>'project.update',
        'timestamp'=>new MongoDate(),
        'user_id'=>new MongoId(Auth::user()->id),
        'doc_id'=>$id,'result'=>$result);

    if($activity->insert($ev)){
        return true;
    }else{
        return false;
    }

});

Event::listen('project.delete',function($id,$result){
    $activity = new Activity();

    $ev = array('event'=>'project.delete',
        'timestamp'=>new MongoDate(),
        'user_id'=>new MongoId(Auth::user()->id),
        'doc_id'=>$id,'result'=>$result);

    if($activity->insert($ev)){
        return true;
    }else{
        return false;
    }

});

Event::listen('send.message',function($from,$to,$subject){
	
});

?>