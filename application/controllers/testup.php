<?php

class testup extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		echo "string";
		$this->load->view('testfile1.php', array('error' => ' ' ));
	}

	function do_upload()
	{

			// $this->load->view('testfile1.php', $error);

		$config['upload_path'] = './uploads/';
		$config['file_name'] = 'alu';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000000';
		$config['max_width']  = '1000000';
		$config['max_height']  = '100000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('testfile1.php', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('testfile2.php', $data);
		}
	}
}
?>