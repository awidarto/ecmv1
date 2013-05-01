<?php

class Document_Controller extends Base_Controller {

	public $restful = true;

	public $crumb;


	public function __construct(){
		$this->crumb = new Breadcrumb();
		$this->crumb->add('document','Document');

		date_default_timezone_set('Asia/Jakarta');
		$this->filter('before','auth');
	}

}

?>