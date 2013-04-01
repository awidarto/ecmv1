<?php
/*
|--------------------------------------------------------------------------
| View Composers
|--------------------------------------------------------------------------
|
*/

View::composer('master',function($view){

    $email_regex = new MongoRegex('/'.Auth::user()->email.'/i');

    $tag = new Tag();
    $tags = $tag->find(array(), array(),array('count'=>-1));

    $message = new Message();
    $messages = $message->find(array(), array(),array('createdDate'=>-1),array(10,0));

    $message_count = $message->count(
        array(
                '$and'=>array(
                    array('$or'=>array(
                        array('to'=>$email_regex),
                        array('cc'=>$email_regex),
                        array('bcc'=>$email_regex)),
                        'read.email'=>array('$not'=>$email_regex)
                    ),
                    array('$or'=>array(
                        array('delete'=>array('$exists'=>false)),
                        array('delete.email'=>array('$not'=>$email_regex))
                    )               
                )
            )
        )
    );

    $doc = new Document();

    $incoming_request = $doc->count(array('read'=>$email_regex));

    $view->nest('topnav','partials.topnav');
    $view->nest('sidenav','partials.sidenav',array('message_count'=>$message_count,'incoming_request'=>$incoming_request));
    $view->nest('identity','partials.identity');
    $view->nest('tagcloud','partials.tags',array('tags'=>$tags));
    $view->nest('messages','partials.messages',array('messages'=>$messages));
});

View::composer('noaside',function($view){

    $email_regex = new MongoRegex('/'.Auth::user()->email.'/i');

    $tag = new Tag();
    $tags = $tag->find(array(), array(),array('count'=>-1));

    $message = new Message();
    $messages = $message->find(array(), array(),array('createdDate'=>-1),array(10,0));

    $message_count = $message->count(
        array(
                '$and'=>array(
                    array('$or'=>array(
                        array('to'=>$email_regex),
                        array('cc'=>$email_regex),
                        array('bcc'=>$email_regex)),
                        'read.email'=>array('$not'=>$email_regex)
                    ),
                    array('$or'=>array(
                        array('delete'=>array('$exists'=>false)),
                        array('delete.email'=>array('$not'=>$email_regex))
                    )               
                )
            )
        )
    );

    $doc = new Document();

    $incoming_request = $doc->count(array('read'=>$email_regex));


    $view->nest('topnav','partials.topnav');
    $view->nest('sidenav','partials.sidenav',array('message_count'=>$message_count,'incoming_request'=>$incoming_request));
    $view->nest('identity','partials.identity');

});

?>