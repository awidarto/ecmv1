<?php

require_once('MimeMailParser.class.php');

$path = 'path/to/mail.txt';
$Parser = new MimeMailParser();
$Parser->setPath($path);

$to = $Parser->getHeader('to');
$from = $Parser->getHeader('from');
$subject = $Parser->getHeader('subject');
$text = $Parser->getMessageBody('text');
$html = $Parser->getMessageBody('html');
$attachments = $Parser->getAttachments();

// attachment processing
$save_dir = '/path/to/save/attachments/';
foreach($attachments as $attachment) {
  // get the attachment name
  $filename = $attachment->filename;
  // write the file to the directory you want to save it in
  if ($fp = fopen($save_dir.$filename, 'w')) {
    while($bytes = $attachment->read()) {
      fwrite($fp, $bytes);
    }
    fclose($fp);
  }
}

?>