<?php

Event::listen('document.expire',function(){
    $doc = new Document();

    $expiredays = Config::get('parama.expiration_alert_days');
    $expireseconds = (int)$expiredays * 24 * 60 * 60;

    //print $expireseconds;

    $thenstring = date('Y-m-d 23:59:59', (time() + $expireseconds));

    //print $thenstring;
    
    $now = new MongoDate();
    $then = new MongoDate(strtotime($thenstring));

    //print_r($now);
    //print_r($then);

    $willexpire = $doc->find(array('expiryDate'=>array('$gte' => $now, '$lt' => $then)));

    //print_r($willexpire);

    if(count($willexpire) > 0 ){
        // update expiration
        $exp = new Expiration();
        $user = new User();
        $message = new Message();

        $activity = new Activity();

        foreach($willexpire as $ex){
            $datetime1 = new DateTime(date('Y-m-d',time()));
            $datetime2 = new DateTime(date('Y-m-d',$ex['expiryDate']->sec));
            $indays = $datetime1->diff($datetime2);

            $creator_id = new MongoId($ex['creatorId']);

            $owner = $user->get(array('_id'=>$creator_id));

            $doc->update(array('_id'=>$ex['_id']),array('$set'=>array('expiring'=>$indays->days)),array('upsert'=>true));

            $exp->update(array('doc_id'=>$ex['_id']),array('doc_id'=>$ex['_id'],'expiring'=>$indays),array('upsert'=>true));

            $m = array();
            $m['from'] = 'no-reply@paramanusa.co.id';
            $m['to'] = $owner['email'];
            $m['cc'] = $ex['docShare'];
            $m['body'] = HTML::link('document/type/'.$ex['docDepartment'].'/'.$ex['_id'],$ex['title']).' is expiring in '.$indays->days.' day(s)';
            $m['subject'] = $ex['title'].' is expiring in '.$indays->days.' day(s)';
            $m['createdDate'] = new MongoDate();

            $message->insert($m);

            $ev = array('event'=>'document.expire',
                'timestamp'=>new MongoDate(),
                'creator_id'=>new MongoId(Auth::user()->id),
                'creator_name'=>Auth::user()->fullname,
                'updater_id'=>new MongoId(Auth::user()->id),
                'updater_name'=>Auth::user()->fullname,
                'sharer_id'=>'',
                'sharer_name'=>'',
                'department'=>$ex['docDepartment'],
                'doc_id'=>$ex['_id'],
                'doc_title'=>$ex['title'],
                'doc_filename'=>$ex['docFilename']
            );


        }

        if($activity->insert($ev)){
            return true;
        }else{
            return false;
        }


    }



});

Event::listen('document.create',function($id, $result){
    $activity = new Activity();

    $doc = getdocument($id);

    $ev = array('event'=>'document.create',
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
        'doc_filename'=>$doc['docFilename'],
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
        'doc_filename'=>$doc['docFilename'],
        'result'=>$result
    );

    if($activity->insert($ev)){
        return true;
    }else{
        return false;
    }

});

Event::listen('document.download',function($id,$result){
    $activity = new Activity();

    $doc = getdocument($id);

    $ev = array('event'=>'document.update',
        'timestamp'=>new MongoDate(),
        'creator_id'=>new MongoId($doc['creatorId']),
        'creator_name'=>$doc['creatorName'],
        'updater_id'=>new MongoId(Auth::user()->id),
        'updater_name'=>Auth::user()->fullname,
        'downloader_id'=>new MongoId(Auth::user()->id),
        'downloader_name'=>Auth::user()->fullname,
        'sharer_id'=>'',
        'sharer_name'=>'',
        'department'=>$doc['docDepartment'],
        'doc_id'=>$id,
        'doc_title'=>$doc['title'],
        'doc_filename'=>$doc['docFilename'],
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
        'doc_filename'=>$doc['docFilename'],
        'doc_title'=>$doc['title']
    );

    if($activity->insert($ev)){
        return true;
    }else{
        return false;
    }

});


//Project events

Event::listen('project.create',function($id, $result){
    $activity = new Activity();

    $doc = getproject($id);

    $ev = array('event'=>'project.create',
        'timestamp'=>new MongoDate(),
        'creator_id'=>new MongoId(Auth::user()->id),
        'creator_name'=>Auth::user()->fullname,
        'updater_id'=>new MongoId(Auth::user()->id),
        'updater_name'=>Auth::user()->fullname,
        'sharer_id'=>'',
        'sharer_name'=>'',
        'department'=>$doc['projectDepartment'],
        'doc_id'=>$id,
        'doc_number'=>$doc['projectNumber'],
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

    $doc = getproject($id);

    $ev = array('event'=>'project.update',
        'timestamp'=>new MongoDate(),
        'creator_id'=>new MongoId($doc['creatorId']),
        'creator_name'=>$doc['creatorName'],
        'updater_id'=>new MongoId(Auth::user()->id),
        'updater_name'=>Auth::user()->fullname,
        'sharer_id'=>'',
        'sharer_name'=>'',
        'department'=>$doc['projectDepartment'],
        'doc_id'=>$id,
        'doc_number'=>$doc['projectNumber'],
        'result'=>$result
    );

    if($activity->insert($ev)){
        return true;
    }else{
        return false;
    }

});

Event::listen('project.delete',function($id,$creator_id,$result){
    $activity = new Activity();

    $ev = array('event'=>'peoject.delete',
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


//Request events


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
        'doc_filename'=>$doc['docFilename'],
        'doc_title'=>$doc['title']
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