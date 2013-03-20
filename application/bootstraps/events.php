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

            $exdata = $exp->get(array('doc_id'=>$ex['_id']));

            $sendmessage = false;

            if(isset($exdata['doc_id'])){

                $exday = $exdata['expiring'];


                if($indays->days != $exday){
                    $sendmessage = true;
                }

                $exp->update(array('doc_id'=>$ex['_id']),array('doc_id'=>$ex['_id'],'expiring'=>$indays->days,'expiryDate'=>$ex['expiryDate'],'updated'=>false),array('upsert'=>true));

            }else{

                $exp->insert(array('doc_id'=>$ex['_id'],'expiring'=>$indays->days,'expiryDate'=>$ex['expiryDate'],'updated'=>false));

                $sendmessage = true;

            }

            if($sendmessage == true){
                $m = array();
                $m['from'] = 'system@paramanusa.co.id';
                $m['to'] = $owner['email'];
                $m['cc'] = $ex['docShare'];
                $m['bcc'] = '';
                $m['body'] = HTML::link('document/type/'.$ex['docDepartment'].'/'.$ex['_id'],$ex['title']).' is expiring in '.$indays->days.' day(s)';
                $m['subject'] = $ex['title'].' is expiring in '.$indays->days.' day(s)';
                $m['createdDate'] = new MongoDate();

                $message->insert($m);
            }

            $ev = array('event'=>'document.expire',

                'approvalby'=>'',
                'creator_id'=>new MongoId(Auth::user()->id),
                'creator_name'=>Auth::user()->fullname,
                'department'=>$ex['docDepartment'],
                'doc_id'=>$ex['_id'],
                'doc_filename'=>$ex['docFilename'],
                'doc_number'=>'',
                'doc_title'=>$ex['title'],
                'downloader_id'=>'',
                'downloader_name'=>'',
                'remover_id'=>'',
                'requester_id'=>'',
                'requester_name'=>'',
                'result'=>'',
                'sharer_id'=>'',
                'sharer_name'=>'',
                'shareto'=>'',
                'updater_id'=>new MongoId(Auth::user()->id),
                'updater_name'=>Auth::user()->fullname,
                'timestamp'=>new MongoDate()

                
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


        'approvalby'=>'',
        'creator_id'=>new MongoId(Auth::user()->id),
        'creator_name'=>Auth::user()->fullname,
        'department'=>$doc['docDepartment'],

        'doc_id'=>$doc['_id'],

        'doc_filename'=>$doc['docFilename'],
        'doc_number'=>'',
        'doc_title'=>$doc['title'],
        'downloader_id'=>'',
        'downloader_name'=>'',
        'remover_id'=>'',
        'requester_id'=>'',
        'requester_name'=>'',
        'result'=>$result,
        'sharer_id'=>'',
        'sharer_name'=>'',
        'shareto'=>'',
        'updater_id'=>new MongoId(Auth::user()->id),
        'updater_name'=>Auth::user()->fullname,
        'timestamp'=>new MongoDate()

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
  
        'approvalby'=>'',
        'creator_id'=>new MongoId($doc['creatorId']),
        'creator_name'=>$doc['creatorName'],
        'department'=>$doc['docDepartment'],
        'doc_id'=>$id,
        'doc_filename'=>$doc['docFilename'],
        'doc_number'=>'',
        'doc_title'=>$doc['title'],
        'downloader_id'=>'',
        'downloader_name'=>'',
        'remover_id'=>'',
        'requester_id'=>'',
        'requester_name'=>'',
        'result'=>$result,
        'sharer_id'=>'',
        'sharer_name'=>'',
        'shareto'=>'',
        'updater_id'=>new MongoId(Auth::user()->id),
        'updater_name'=>Auth::user()->fullname,
        'timestamp'=>new MongoDate()

        
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

       
        'approvalby'=>'',
        'creator_id'=>new MongoId($doc['creatorId']),
        'creator_name'=>$doc['creatorName'],
        'department'=>$doc['docDepartment'],
        'doc_id'=>$id,
        'doc_filename'=>$doc['docFilename'],
        'doc_number'=>'',
        'doc_title'=>$doc['title'],
        'downloader_id'=>new MongoId(Auth::user()->id),
        'downloader_name'=>Auth::user()->fullname,
        'remover_id'=>'',
        'requester_id'=>'',
        'requester_name'=>'',
        'result'=>$result,
        'sharer_id'=>'',
        'sharer_name'=>'',
        'shareto'=>'',
        'updater_id'=>new MongoId(Auth::user()->id),
        'updater_name'=>Auth::user()->fullname,
        'timestamp'=>new MongoDate()

    );

    if($activity->insert($ev)){
        return true;
    }else{
        return false;
    }

});


Event::listen('document.delete',function($id,$result){
    $activity = new Activity();

    $ev = array('event'=>'document.delete',
        

        'approvalby'=>'',
        'creator_id'=>'',
        'creator_name'=>'',
        'department'=>'',
        'doc_id'=>$id,
        'doc_filename'=>'',
        'doc_number'=>'',
        'doc_title'=>'',
        'downloader_id'=>'',
        'downloader_name'=>'',
        'remover_id'=>new MongoId(Auth::user()->id),
        'requester_id'=>'',
        'requester_name'=>'',
        'result'=>$result,
        'sharer_id'=>'',
        'sharer_name'=>'',
        'shareto'=>'',
        'updater_id'=>'',
        'updater_name'=>'',
        'timestamp'=>new MongoDate()

        


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

        
        'approvalby'=>'',
        'creator_id'=>new MongoId($doc['creatorId']),
        'creator_name'=>$doc['creatorName'],
        'department'=>'',
        'doc_id'=>$id,
        'doc_filename'=>$doc['docFilename'],
        'doc_number'=>'',
        'doc_title'=>$doc['title'],
        'downloader_id'=>'',
        'downloader_name'=>'',
        'remover_id'=>'',
        'requester_id'=>'',
        'requester_name'=>'',
        'result'=>'',
        'sharer_id'=>new MongoId($sharer_id),
        'sharer_name'=>Auth::user()->fullname,
        'shareto'=>$shareto,
        'updater_id'=>'',
        'updater_name'=>'',
        'timestamp'=>new MongoDate()

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

    $ev = array(
        'event'=>'project.create',
        'approvalby'=>'',
        'creator_id'=>new MongoId(Auth::user()->id),
        'creator_name'=>Auth::user()->fullname,
        'department'=>$doc['projectDepartment'],
        'doc_id'=>$id,
        'doc_filename'=>'',
        'doc_number'=>$doc['projectNumber'],
        'doc_title'=>'',
        'downloader_id'=>'',
        'downloader_name'=>'',
        'remover_id'=>'',
        'requester_id'=>'',
        'requester_name'=>'',
        'result'=>$result,
        'sharer_id'=>'',
        'sharer_name'=>'',
        'shareto'=>'',
        'updater_id'=>new MongoId(Auth::user()->id),
        'updater_name'=>Auth::user()->fullname,
        'timestamp'=>new MongoDate()
        
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

        'approvalby'=>'',
        'creator_id'=>new MongoId($doc['creatorId']),
        'creator_name'=>$doc['creatorName'],
        'department'=>$doc['projectDepartment'],
        'doc_id'=>$id,
        'doc_filename'=>'',
        'doc_number'=>$doc['projectNumber'],
        'doc_title'=>'',
        'downloader_id'=>'',
        'downloader_name'=>'',
        'remover_id'=>'',
        'requester_id'=>'',
        'requester_name'=>'',
        'result'=>'',
        'sharer_id'=>'',
        'sharer_name'=>'',
        'shareto'=>'',
        'updater_id'=>new MongoId(Auth::user()->id),
        'updater_name'=>Auth::user()->fullname,
        'timestamp'=>new MongoDate(),
      
    );

    if($activity->insert($ev)){
        return true;
    }else{
        return false;
    }

});

Event::listen('project.delete',function($id,$creator_id,$result){
    $activity = new Activity();

    $ev = array('event'=>'project.delete',


        'approvalby'=>'',
        'creator_id'=>new MongoId($creator_id),
        'creator_name'=>'',
        'department'=>'',
        'doc_id'=>$id,
        'doc_filename'=>'',
        'doc_number'=>'',
        'doc_title'=>'',
        'downloader_id'=>'',
        'downloader_name'=>'',
        'remover_id'=>new MongoId(Auth::user()->id),
        'requester_id'=>'',
        'requester_name'=>'',
        'result'=>$result,
        'sharer_id'=>'',
        'sharer_name'=>'',
        'shareto'=>'',
        'updater_id'=>'',
        'updater_name'=>'',
        'timestamp'=>new MongoDate(),

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
  
        'approvalby'=>$approvalby,
        'creator_id'=> new MongoId($doc['creatorId']),
        'creator_name'=>$doc['creatorName'],
        'department'=>'',
        'doc_id'=>$id,
        'doc_filename'=>$doc['docFilename'],
        'doc_number'=>'',
        'doc_title'=>$doc['title'],
        'downloader_id'=>'',
        'downloader_name'=>'',
        'remover_id'=>new MongoId(Auth::user()->id),
        'requester_id'=>'',
        'requester_name'=>Auth::user()->fullname,
        'result'=>'',
        'sharer_id'=>'',
        'sharer_name'=>'',
        'shareto'=>'',
        'updater_id'=>'',
        'updater_name'=>'',
        'timestamp'=>new MongoDate()


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