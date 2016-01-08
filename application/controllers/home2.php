<?php

class Home2 extends CI_Controller {
	 function __construct()
	 {
	   parent::__construct();
	 }


	public function view($page = 'home2')
	{
		$this->load->helper('url');
		$this->load->helper(array('form', 'html'));

		if ( ! file_exists(APPPATH.'/views/home/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['name'] = "Nayeem";
		$this->load->view('home/'.$page, $data);
		

	}
}

?>

