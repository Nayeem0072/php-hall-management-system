<?php
session_start();
?>

<?php

class Noticeboard extends CI_Controller {
	function __construct()
 {
   parent::__construct();
   $this->load->model('dbnotice');
 }




	public function view($page = 'noticeboard')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/noticeboard/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['name'] = "Nayeem";

		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];
		// $sid = $session_data['sid'];

		$noticeboard = $this->dbnotice->showallapproved();
		
		$data['noticeboard'] = $noticeboard;

		$this->load->view('noticeboard/'.$page, $data);
		

	}

	public function search($page = 'noticeboard')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/noticeboard/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		//$data['name'] = "Nayeem";

		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];
		//$sid = $session_data['sid'];
		$sub = $this->input->post('sub');


		$noticeboard = $this->dbnotice->search($sub);
		
		$data['noticeboard'] = $noticeboard;
		//$data['complainall'] = "yes";

		//$reviewstatus = $this->dbcomplain->checkreview($session_data['sid']);
		//$data['reviewed'] = $reviewstatus['reviewed'];


		$this->load->view('noticeboard/'.$page, $data);
	}
}

?>

