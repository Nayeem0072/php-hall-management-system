<?php

class Home extends CI_Controller {
	 function __construct()
	 {
	   parent::__construct();
	 }


	public function view($page = 'home')
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

