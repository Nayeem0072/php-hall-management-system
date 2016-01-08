<?php
session_start();
?>

<?php

class SubmitFeedback extends CI_Controller {

 
 function __construct()
 {
   parent::__construct();
   $this->load->model('dbroom');
 }



	public function index($page = 'submitfeedback')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/room/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		//$data['name'] = "Nayeem";
		$fbname = $this->input->post('name');
		$fbdate = $this->input->post('date');
		$fbsubject = $this->input->post('subject');
		$fbdetail = $this->input->post('feedback');

		//$session_data = $this->session->userdata('logged_in');
		$data['fbname'] = $fbname;
		$data['sid'] = $session_data['sid'];

		$fbsuccess = $this->dbroom->insert($session_data['sid'], $fbsubject, $fbdetail, $fbdate);
		
		if($fbsuccess)
			$data['fbsuccess'] = "yes";
		else 
			$data['fbsuccess'] = "no";	

		$this->load->view('room/'.$page, $data);
		

	}
}

?>

