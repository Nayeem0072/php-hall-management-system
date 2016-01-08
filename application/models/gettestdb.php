<?php
class Gettestdb extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function gettest()
	{
		$query = $this->db->query('SELECT name  FROM `student` WHERE `sid` = 60');

		
		return $query->row_array();
	}


}