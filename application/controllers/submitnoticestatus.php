<?php
session_start();
?>



<?php

class SubmitNoticeStatus extends CI_Controller {

	 
	 function __construct()
	 {
	   parent::__construct();
	   $this->load->model('dbnotice');
	 }

	public function index($page = 'submitnoticestatus')
	{
		$this->load->helper('url');

		if ( ! file_exists(APPPATH.'/views/noticeboard/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$noticesub = $this->input->post('subject');
		$noticedate = $this->input->post('date');

		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];
		$data['staffid'] = $session_data['staffid'];


		$noticesuccess = $this->dbnotice->insert($session_data['staffid'], $noticesub, $noticedate);
		if($noticesuccess)
			$data['nsuccess'] = "yes";
		else 
			$data['nsuccess'] = "no";	

		//uploadimage();

		if($noticesuccess){
			$stat = $this->dbnotice->getlast();
			$row = $stat->row();
			$config['upload_path'] = './uploads/';
			$config['file_name'] = $row->noticeid;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1000000';
			$config['max_width']  = '1000000';
			$config['max_height']  = '100000';

			$id = $row->noticeid;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('noticeboard/submitnoticestatus', $error);
				$delete = $this->dbnotice->deletelast($id);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());

				$this->load->view('noticeboard/submitnoticestatus', $data);
				$data['totalnsuccess'] = "yes";
			}
		}

	}

	// public function uploadimage(){
		
	// 	$target_dir = "".base_url('uploads/');

	// 	$target_dir = $target_dir . basename( $_FILES["uploadFile"]["name"]);
	// 	$uploadOk=1;

	// 	if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_dir)) {
	// 	    echo "The file ". basename( $_FILES["uploadFile"]["name"]). " has been uploaded.";
	// 	} else {
	// 	    echo "Sorry, there was an error uploading your file.";
	// 	}
	// }

	



}