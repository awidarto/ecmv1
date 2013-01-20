<?php
/*
|--------------------------------------------------------------------------
| View Composers
|--------------------------------------------------------------------------
|
*/

View::composer('master',function($view){
    $tag = new Tag();
    $tags = $tag->find(array(), array(),array('count'=>-1));

    $message = new Message();
    $messages = $message->find(array(), array(),array('createdDate'=>-1),array(10,0));



    $view->nest('topnav','partials.topnav');
    $view->nest('sidenav','partials.sidenav');
    $view->nest('identity','partials.identity');
    $view->nest('tagcloud','partials.tags',array('tags'=>$tags));
    $view->nest('messages','partials.messages',array('messages'=>$messages));
});

View::composer('noaside',function($view){

    $view->nest('topnav','partials.topnav');
    $view->nest('sidenav','partials.sidenav');
    $view->nest('identity','partials.identity');

});

?>