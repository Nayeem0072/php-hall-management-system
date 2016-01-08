<?php
session_start();
?>

<?php

class SubmitComplain extends CI_Controller {


	public function view($page = 'submitcomplain')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/complainbox/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['name'] = "Nayeem";
		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];
		$this->load->view('complainbox/'.$page, $data);
		

	}
}

?>

