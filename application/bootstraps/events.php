<?php

Event::listen('document.create',function($id, $result){
    $activity = new Activity();

    $doc = getdocument($id);

    $ev = array('event'=>'document.upload',
        'timestamp'=>new MongoDate(),
        'creator_id'=>new MongoId(Auth::user()->id),
        'creator_name'=>Auth::user()->fullname,
        'updater_id'=>new MongoId(Auth::user()->id),
        'updater_name'=>Auth::user()->fullname,
        'sharer_id'=>'',
        'sharer_name'=>'',
        'department'=>$doc['docDepartment'],
        'doc_id'=>$id,
        'doc_title'=>$doc['title'],
        'result'=>$result
    );

    if($activity->insert($ev)){
        return true;
    }else{
        return false;
    }

});

Event::listen('document.update',function($id,$result){
    $activity = new Activity();

    $doc = getdocument($id);

    $ev = array('event'=>'document.update',
        'timestamp'=>new MongoDate(),
        'creator_id'=>new MongoId($doc['creatorId']),
        'creator_name'=>$doc['creatorName'],
        'updater_id'=>new MongoId(Auth::user()->id),
        'updater_name'=>Auth::user()->fullname,
        'sharer_id'=>'',
        'sharer_name'=>'',
        'department'=>$doc['docDepartment'],
        'doc_id'=>$id,
        'doc_title'=>$doc['title'],
        'result'=>$result
    );

    if($activity->insert($ev)){
        return true;
    }else{
        return false;
    }

});

Event::listen('document.delete',function($id,$creator_id,$result){
    $activity = new Activity();

    $ev = array('event'=>'document.delete',
        'timestamp'=>new MongoDate(),
        'creator_id'=>new MongoId($creator_id),
        'remover_id'=>new MongoId(Auth::user()->id),
        'doc_id'=>$id,
        'result'=>$result
    );

    if($activity->insert($ev)){
        return true;
    }else{
        return false;
    }

});

Event::listen('document.share',function($id,$sharer_id,$shareto){
    $activity = new Activity();

    $doc = getdocument($id);

    $ev = array('event'=>'document.share',
        'timestamp'=>new MongoDate(),
        'creator_id'=>new MongoId($doc['creatorId']),
        'creator_name'=>$doc['creatorName'],
        'sharer_id'=>new MongoId($sharer_id),
        'sharer_name'=>Auth::user()->fullname,
        'shareto'=>$shareto,
        'doc_id'=>$id,
        'doc_title'=>$doc['title']
    );

    if($activity->insert($ev)){
        return true;
    }else{
        return false;
    }

});

Event::listen('request.approval',function($id,$approvalby){
    $activity = new Activity();

    $doc = getdocument($id);

    $ev = array('event'=>'request.approval',
        'timestamp'=>new MongoDate(),
        'creator_id'=>new MongoId($doc['creatorId']),
        'creator_name'=>$doc['creatorName'],
        'sharer_id'=>'',
        'sharer_name'=>'',
        'requester_id'=>new MongoId(Auth::user()->id),
        'requester_name'=>Auth::user()->fullname,
        'shareto'=>'',
        'approvalby'=>$approvalby,
        'doc_id'=>$id,
        'doc_title'=>$doc['title']
    );

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
        'creator_id'=>new MongoId(Auth::user()->id),
        'doc_id'=>$id,
        'result'=>$result
    );

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
        'updater_id'=>new MongoId(Auth::user()->id),
        'doc_id'=>$id,
        'result'=>$result
    );

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
        'remover_id'=>new MongoId(Auth::user()->id),
        'doc_id'=>$id,
        'result'=>$result
    );

    if($activity->insert($ev)){
        return true;
    }else{
        return false;
    }

});

Event::listen('send.message',function($from,$to,$subject){
	
});

?>