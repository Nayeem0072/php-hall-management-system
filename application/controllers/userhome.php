<?php
session_start();

class Userhome extends CI_Controller {


	public function view($page = 'userhome')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/home/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		//$data['name'] = "Nayeem";
		if($this->session->userdata('logged_in'))
	    {
		     $session_data = $this->session->userdata('logged_in');
		     $data['username'] = $session_data['name'];
		     $data['dob'] = $session_data['dob'];
		     $data['address'] = $session_data['address'];
		     $data['phone'] = $session_data['phone'];
		     $data['email'] = $session_data['email'];
		     $data['password'] = $session_data['password'];
		     $data['type'] = $session_data['usertype'];
		     
		     if($session_data['usertype']=="Student")
		     	$data['sid'] = $session_data['sid'];
		     if($session_data['usertype']!="Student"){
		     	$data['post'] = $session_data['post'];
		     	$data['staffid'] = $session_data['staffid'];
		 	}
		     
		     $this->load->view('home/'.$page, $data);
			
	    }
	}

	function logout()
	 {
	 	$this->load->helper('url');
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   //redirect('home', 'refresh');
	   header('Location: ' .base_url(). 'index.php/home/view');
	 }
	 
}

?>

