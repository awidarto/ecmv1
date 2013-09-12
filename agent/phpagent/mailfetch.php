<?php

//require_once('MimeMailParser.class.php');

// Config
$dbhost = 'localhost';
$dbname = 'paramadatastore2';

// Connect to test database
$m = new Mongo("mongodb://$dbhost");
$db = $m->$dbname;

// select the collection
$collection = $db->documents;

// pull a cursor query
$cursor = $collection->find();

foreach($cursor as $doc){
    var_dump($doc);
}


/* connect to gmail */
$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'paramanusa@gmail.com';
$password = 'Parama0101';

/* try to connect */
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

/* grab emails */
$emails = imap_search($inbox,'ALL');

if($emails){
    rsort($emails);

    foreach ($emails as $email_id) {
        $overview = imap_fetch_overview($inbox,$email_id,0);
        $message = imap_fetchbody($inbox,$email_id,2);

        print_r($overview);

    }
}

?>