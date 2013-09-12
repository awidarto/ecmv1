#!/usr/bin/php
<?php

/* check the previous process if exists then dont start next process */
$check = shell_exec("ps ax | grep EmailMessage.php");
print $check;
if(substr_count(trim($check),"php5 EmailMessage.php") > 1){
    die("Other process is still running, exit now.");
}

// Mongo Db Config
$dbhost = 'localhost';
$dbname = 'paramadatastore2';

// Connect to test database
$m = new Mongo("mongodb://$dbhost");
$db = $m->$dbname;

// select the collection
$collection = $db->documents;


// server needs to be full server connection string, as in the example below
//$server = '{imap.gmail.com:993/ssl/novalidate-cert}';
// another example
//$server = '{pop3.example.com:110/pop3}';
// and put your login and password here
$login = '';
$password = '';

/* connect to gmail */
$server = '{imap.gmail.com:993/imap/ssl}INBOX';
$login = 'paramanusa@gmail.com';
$password = 'Parama0101';

$connection = imap_open($server, $login, $password);

$emails = imap_search($connection,'UNSEEN');

if($emails){
    rsort($emails);

    foreach ($emails as $email_id) {

        // the number in constructor is the message number
        $emailMessage = new EmailMessage($connection, $email_id);
        // set to true to get the message parts (or don't set to false, the default is true)
        $emailMessage->getAttachments = true;
        $struct = $emailMessage->fetch();
        //print_r($emailMessage->attachments);
        if(!file_exists('att/'.$email_id)){
            mkdir('att/'.$email_id);
        }

        if($emailMessage->bodyHTML){
            file_put_contents('att/'.$email_id.'/body.html', $emailMessage->bodyHTML);
        }

        if($emailMessage->bodyPlain){
            file_put_contents('att/'.$email_id.'/body.txt', $emailMessage->bodyPlain);
        }

        if($emailMessage->attachments){
            foreach($emailMessage->attachments as $att){
                file_put_contents('att/'.$email_id.'/'.$att['filename'], $att['data']);
            }
        }

        if($emailMessage->messageOverview){
            print_r($emailMessage->messageOverview);
        }

    }
}

imap_close($connection);
exit;

class EmailMessage {

	protected $connection;
	protected $messageNumber;

	public $bodyHTML = '';
	public $bodyPlain = '';
    public $messageOverview;
	public $attachments;

	public $getAttachments = true;

	public function __construct($connection, $messageNumber) {

		$this->connection = $connection;
		$this->messageNumber = $messageNumber;

	}

	public function fetch() {

        $overview = @imap_fetch_overview($this->connection, $this->messageNumber);

        if($overview){
            $this->messageOverview = $overview;
        }else{
            $this->messageOverview = false;
        }

		$structure = @imap_fetchstructure($this->connection, $this->messageNumber);
		if(!$structure) {
			return false;
		}
		else {
			$this->recurse($structure->parts);
			return $structure;
		}

	}

	public function recurse($messageParts, $prefix = '', $index = 1, $fullPrefix = true) {

		foreach($messageParts as $part) {

			$partNumber = $prefix . $index;

			if($part->type == 0) {
				if($part->subtype == 'PLAIN') {
					$this->bodyPlain .= $this->getPart($partNumber, $part->encoding);
				}
				else {
					$this->bodyHTML .= $this->getPart($partNumber, $part->encoding);
				}
			}
			elseif($part->type == 2) {
				$msg = new EmailMessage($this->connection, $this->messageNumber);
				$msg->getAttachments = $this->getAttachments;
				$msg->recurse($part->parts, $partNumber.'.', 0, false);
				$this->attachments[] = array(
					'type' => $part->type,
					'subtype' => $part->subtype,
					'filename' => '',
					'data' => $msg,
					'inline' => false,
				);
			}
			elseif(isset($part->parts)) {
				if($fullPrefix) {
					$this->recurse($part->parts, $prefix.$index.'.');
				}
				else {
					$this->recurse($part->parts, $prefix);
				}
			}
			elseif($part->type > 2) {
				if(isset($part->id)) {
					$id = str_replace(array('<', '>'), '', $part->id);
					$this->attachments[$id] = array(
						'type' => $part->type,
						'subtype' => $part->subtype,
						'filename' => $this->getFilenameFromPart($part),
						'data' => $this->getAttachments ? $this->getPart($partNumber, $part->encoding) : '',
						'inline' => true,
					);
				}
				else {
					$this->attachments[] = array(
						'type' => $part->type,
						'subtype' => $part->subtype,
						'filename' => $this->getFilenameFromPart($part),
						'data' => $this->getAttachments ? $this->getPart($partNumber, $part->encoding) : '',
						'inline' => false,
					);
				}
			}

			$index++;

		}

	}

	function getPart($partNumber, $encoding) {

		$data = imap_fetchbody($this->connection, $this->messageNumber, $partNumber);
		switch($encoding) {
			case 0: return $data; // 7BIT
			case 1: return $data; // 8BIT
			case 2: return $data; // BINARY
			case 3: return base64_decode($data); // BASE64
			case 4: return quoted_printable_decode($data); // QUOTED_PRINTABLE
			case 5: return $data; // OTHER
		}


	}

	function getFilenameFromPart($part) {

		$filename = '';

		if($part->ifdparameters) {
			foreach($part->dparameters as $object) {
				if(strtolower($object->attribute) == 'filename') {
					$filename = $object->value;
				}
			}
		}

		if(!$filename && $part->ifparameters) {
			foreach($part->parameters as $object) {
				if(strtolower($object->attribute) == 'name') {
					$filename = $object->value;
				}
			}
		}

		return $filename;

	}

}