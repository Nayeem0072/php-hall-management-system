<?php
session_start();
?>

<?php

class SubmitComplainStatus extends CI_Controller {

 
 function __construct()
 {
   parent::__construct();
   $this->load->model('dbcomplain');
 }



	public function index($page = 'submitcomplainstatus')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/complainbox/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		//$data['name'] = "Nayeem";
		$complainee = $this->input->post('name');
		$complaindate = $this->input->post('date');
		$complainsubject = $this->input->post('subject');
		$complaindetail = $this->input->post('complain');

		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];
		$data['complainee'] = $complainee;
		$data['sid'] = $session_data['sid'];

		$noticesuccess = $this->dbcomplain->insert($session_data['sid'], $complainsubject, $complaindetail, $complaindate);
		$reviewstatus = $this->dbcomplain->checkreview($session_data['sid']);
		
		if($noticesuccess)
			$data['csuccess'] = "yes";
		else 
			$data['csuccess'] = "no";	

		$data['reviewed'] = $reviewstatus['reviewed'];
		$data['notreviewed'] = $reviewstatus['notreviewed'];

		$this->load->view('complainbox/'.$page, $data);
		

	}
}

?>

