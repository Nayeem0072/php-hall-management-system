<?php

class Testdb extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('gettestdb');
	}

	public function index()
	{
		$page = 'testdb';
		$data['title'] = $this->gettestdb->gettest();
		$this->load->view($page, $data);
	}

	// public function view($page = 'testdb')
	// {
	// 	$this->load->helper('url');
	// 	if ( ! file_exists(APPPATH.'/views/'.$page.'.php'))
	// 	{
	// 		show_404();
	// 	}

	// 	$data['title'] = ucfirst($page); // Capitalize the first letter
	// 	$data['name'] = "Nayeem";
	// 	$this->load->view($page, $data);
		

	// }
}

?>

