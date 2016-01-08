<?php
session_start();
?>

<?php

class SubmitNotice extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}



	public function view($page = 'submitnotice')
	{
		$this->load->helper('url');

		if ( ! file_exists(APPPATH.'/views/noticeboard/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];
		$data['name'] = "Nayeem";
		$this->load->view('noticeboard/'.$page, $data);

	}
}

?>

