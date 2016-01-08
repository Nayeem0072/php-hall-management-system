<?php
session_start();
?>


<?php

class ApproveNotice extends CI_Controller {
	function __construct()
	 {
	   parent::__construct();
	   $this->load->model('dbnotice');
	 }




	public function view($page = 'approvenotice')
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


		// $session_data = $this->session->userdata('logged_in');
		
		$approvenotice = $this->dbnotice->showallapprove();
		$data['approvenotice'] = $approvenotice;

		$this->load->view('noticeboard/'.$page, $data);
		

	}

	public function show($page = 'approveview')
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
		
		$id = $_GET['id'];
		$data['noticeid'] = $_GET['id'];


		// $session_data = $this->session->userdata('logged_in');
		// $sid = $session_data['sid'];


		$noticedetail = $this->dbnotice->shownotice($id);
		if($noticedetail){
			$data['ndetail'] = $noticedetail;
		}

		$this->load->view('noticeboard/'.$page, $data);
		

	}
	public function approve($page = 'noticeview')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/noticeboard/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['name'] = "Nayeem";
		$id = $_GET['id'];

		$approval = $this->dbnotice->approve($id);

		
		header('Location: ' .base_url(). 'index.php/approvenotice/show?id='.$id);
	}
}

?>

