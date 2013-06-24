<?php
class Fetchmail_Task{

	public function run(){
		Bundle::start('mongovel');
		
		$doc = new Document();
		$docs = $doc->find();


		/* connect to gmail */
		$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
		$username = 'bolongsox@gmail.com';
		$password = 'masukajadeh';

		/* try to connect */
		$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

		/* grab emails */
		$emails = imap_search($inbox,'UNSEEN');

		/* if emails are returned, cycle through each... */
		if($emails) {
			
			/* begin output var */
			
			/* put the newest emails on top */
			rsort($emails);
			
			/* for every email... */
			foreach($emails as $email_number) {
				
				/* get information specific to this email */
				$overview = imap_fetch_overview($inbox,$email_number,0);
				$message = imap_fetchbody($inbox,$email_number,2);

				print_r($overview);
				
				/* output the email header information */

				print_r($message);
				
				/* output the email body */
				print "===========================\r\n";
	
			}
			
		} 

		/* close the connection */
		imap_close($inbox);

	}

}

?>
