<?php
session_start();
?>


<?php

class Room extends CI_Controller {
	 function __construct()
	 {
	   parent::__construct();
	   $this->load->model('dbroom');
	 }



	public function view($page = 'room')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/room/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['name'] = "Nayeem";

		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];
		$sid = $session_data['sid'];
		$laundry = $session_data['needlaundry'];
		$help = $session_data['needhelp'];

		$data['sid'] = $sid;
		
		$info = $this->dbroom->getinfo($sid);
		
		foreach ($info->result() as $row)
        {
        	$data['laundry'] = $row->needlaundry;
        	$data['help'] = $row->needhelp;
        }
        

		$this->load->view('room/'.$page, $data);
		

	}
	
	public function gethelp($page = 'room')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/room/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		
		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];
		$sid = $session_data['sid'];
		$helpsuccess = $this->dbroom->addhelp($sid);

		$info = $this->dbroom->getinfo($sid);
		// $laundry = $session_data['needlaundry'];
		// $help = $session_data['needhelp'];
		foreach ($info->result() as $row)
        {
        	$data['laundry'] = $row->needlaundry;
        	$data['help'] = $row->needhelp;
        }
   

		$data['sid'] = $sid;
//		$data['laundry'] = $info['needlaundry'];
//		$data['help'] = $info['needhelp'];

		

  		if($helpsuccess){
			$this->load->view('room/'.$page, $data);
  		}
	
	}
	
	public function getlaundry($page = 'room')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/room/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];
		$sid = $session_data['sid'];


		$laundrysuccess = $this->dbroom->addlaundry($sid);

		$laundry = $session_data['needlaundry'];
		$help = $session_data['needhelp'];

		$info = $this->dbroom->getinfo($sid);
		
		foreach ($info->result() as $row)
        {
        	$data['laundry'] = $row->needlaundry;
        	$data['help'] = $row->needhelp;
        }
   
		$data['sid'] = $sid;
		// $data['laundry'] = $info['needlaundry'];
		// $data['help'] = $info['needhelp'];

  		if($laundrysuccess){
			$this->load->view('room/'.$page, $data);
  		}
  	}


  		public function getclear($page = 'room')
		{
			$this->load->helper('url');
			if ( ! file_exists(APPPATH.'/views/room/'.$page.'.php'))
			{
				show_404();
			}

			$data['title'] = ucfirst($page); // Capitalize the first letter

			$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];
			$sid = $session_data['sid'];


			$clearsuccess = $this->dbroom->cancelall($sid);

			$laundry = $session_data['needlaundry'];
			$help = $session_data['needhelp'];

			$info = $this->dbroom->getinfo($sid);
			
			foreach ($info->result() as $row)
	        {
	        	$data['laundry'] = $row->needlaundry;
	        	$data['help'] = $row->needhelp;
	        }
	   
			$data['sid'] = $sid;
			// $data['laundry'] = $info['needlaundry'];
			// $data['help'] = $info['needhelp'];

	  		if($clearsuccess){
				$this->load->view('room/'.$page, $data);
	  		}
		
		}



}

?>

