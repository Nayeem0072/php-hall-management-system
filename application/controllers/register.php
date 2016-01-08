<?php
session_start();
?>

<?php

class Register extends CI_Controller {
	function __construct()
	 {
	   parent::__construct();
	   $this->load->model('dbroom');
	 }



	public function student($page = 'register')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/register/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['name'] = "Nayeem";
		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];

		$this->load->view('register/'.$page, $data);
		

	}



	public function staff($page = 'registerstaff')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/register/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['name'] = "Nayeem";
		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];
		$this->load->view('register/'.$page, $data);
		

	}


	public function insert($page = 'register')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/register/'.$page.'.php'))
		{
			show_404();
		}
		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];

		$validate = 0;

		$name = $this->input->post('name');
		$id = $this->input->post('id');
		$dob = $this->input->post('dob');
		$address = $this->input->post('address');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$room = $this->input->post('room');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($name == NULL || $id == NULL || $username == NULL || $password == NULL)
			$validate = 1;

		$check = $this->dbroom->getusername($username);
		if($check->num_rows() > 0)
			echo "Username already exists";
		elseif ($validate == 1) {
			echo "Wrong inputs.";
		}
		
		else
		{
			$query =  $this->dbroom->insertstudent($name,$id,$dob,$address,$phone,$email,$room ,$username, $password);
			if($query)
				echo "Successful";
		}


	}


	public function insertstaff($page = 'register')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/register/'.$page.'.php'))
		{
			show_404();
		}

		$validate = 0;

		$name = $this->input->post('name');
		$post = $this->input->post('post');
		$dob = $this->input->post('dob');
		$address = $this->input->post('address');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$check = $this->dbroom->getusernamestaff($username);

		if($name == NULL || $post == NULL || $username == NULL || $password == NULL)
			$validate = 1;

		if($check->num_rows() > 0)
			echo "Username already exists";
		
		elseif ($validate == 1) {
			echo "Wrong inputs.";
		}

		
		else
		{
			$query =  $this->dbroom->insertstaff($name,$post,$dob,$address,$phone,$email ,$username, $password);
			if($query)
				echo "Successful";
		}


	}

}

?>

