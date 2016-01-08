<?php
session_start();
?>


<?php

class Complainbox extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('dbcomplain');
 }



	public function view($page = 'complainbox')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/complainbox/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		//$data['name'] = "Nayeem";

		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];
		//$sid = $session_data['sid'];
		$id = 2;

		$complainbox = $this->dbcomplain->showallcomplain($id);
		
		$data['complainbox'] = $complainbox;

		// $reviewstatus = $this->dbcomplain->checkreview($session_data['sid']);
		// $data['reviewed'] = $reviewstatus['reviewed'];
		$data['complainall'] = "no";


		$this->load->view('complainbox/'.$page, $data);
		

	}

	public function viewall($page = 'complainbox')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/complainbox/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		//$data['name'] = "Nayeem";

		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];
		$sid = $session_data['sid'];

		$complainbox = $this->dbcomplain->showall($sid);
		
		$data['complainbox'] = $complainbox;
		$data['complainall'] = "yes";

		//$reviewstatus = $this->dbcomplain->checkreview($session_data['sid']);
		//$data['reviewed'] = $reviewstatus['reviewed'];


		$this->load->view('complainbox/'.$page, $data);
	}

	public function showcomplain($page = 'complainview')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/complainbox/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		//$data['name'] = "Nayeem";

		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];

		$id = $_GET['id'];
		$cdetail = $this->dbcomplain->showcomplain($id);

		if($cdetail){
			$data['cdetail'] = $cdetail;
		}

		if($session_data['usertype'] == "Staff")
			$data['user'] = "Staff";
		else
			$data['user'] = "";


		$this->load->view('complainbox/'.$page, $data);
		

	}
	public function showresolved($page = 'complainbox')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/complainbox/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		//$data['name'] = "Nayeem";

		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];
		$sid = $session_data['sid'];

		$complainbox = $this->dbcomplain->showresolved($sid);
		
		$data['complainbox'] = $complainbox;

		
		$data['complainall'] = "yes";
		$data['resolved'] = 1;

		$this->load->view('complainbox/'.$page, $data);
		

	}

	public function search($page = 'complainbox')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/complainbox/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		//$data['name'] = "Nayeem";

		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];
		$sub = $this->input->post('sub');


		$complainbox = $this->dbcomplain->search($sub);
		
		$data['complainbox'] = $complainbox;
		$data['complainall'] = "yes";

		//$reviewstatus = $this->dbcomplain->checkreview($session_data['sid']);
		//$data['reviewed'] = $reviewstatus['reviewed'];


		$this->load->view('complainbox/'.$page, $data);
	}

	public function review($page = 'complainbox')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/complainbox/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		//$data['name'] = "Nayeem";

		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];
		$id = $_GET['id'];
		$staffid = $session_data['staffid'];

		$query = $this->dbcomplain->reviewed($id, $staffid);
		if($query)
			header('Location: ' .base_url(). 'index.php/complainbox/view');


	}

	


}

?>

