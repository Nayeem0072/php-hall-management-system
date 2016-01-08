<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class Dblogin extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    function login($username, $password) {
        //create query to connect user login database
        $query = $this->db->query("SELECT *  FROM `student` WHERE `username` = '$username' AND `password` LIKE '$password' ");

        //get query and processing
        
        if($query->num_rows() == 1) {
            return $query->row_array(); //if data is true
        } 

        else {
            return false; //if data is wrong
        }
    }

    function login2($username, $password) {
        //create query to connect user login database
        $query = $this->db->query("SELECT *  FROM `student` WHERE `username` = '$username' AND `password` LIKE '$password' ");
        if($query->num_rows() == 1) {
            return $query->row_array(); //if data is true
        } 

        else {
            return false; //if data is wrong
        }
    }


    function login3($username, $password) {
        //create query to connect user login database
        $query = $this->db->query("SELECT *  FROM `staff` WHERE `username` = '$username' AND `password` LIKE '$password' ");
        if($query->num_rows() == 1) {
            return $query->row_array(); //if data is true
        } 

        else {
            return false; //if data is wrong
        }
    }
}