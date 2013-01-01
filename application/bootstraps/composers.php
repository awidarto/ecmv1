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

    $view->nest('sidenav','partials.sidenav');
    $view->nest('identity','partials.identity');
    $view->nest('tagcloud','partials.tags',array('tags'=>$tags));
    $view->nest('messages','partials.messages');
});


?>