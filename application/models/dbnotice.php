<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class Dbnotice extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insert($sid, $subject, $date) {
        //create query to connect user login database
        $query = $this->db->simple_query("INSERT INTO `projectdb`.`notice` (`noticeid`, `publishedby`, `publishdate`, `subject`, `notice`) 
        	VALUES (NULL, '$sid', '$date', '$subject', NULL);");

        
        //get query and processing
        
        if($query) {
            return true; //if data is true
        } 

        else {
            return false; //if data is wrong
        }
    }

    function getlast() {
        //create query to connect user login database
        //$query = $this->db->query("SELECT MAX(noticeid) FROM notice");
        $query = $this->db->query("SELECT * FROM `notice` order by noticeid desc");
        return $query;
    }


    function deletelast($id) {
        //create query to connect user login database
        $query = $this->db->simple_query("DELETE FROM `projectdb`.`notice` WHERE `notice`.`noticeid` = '$id'");

        if($query) {
            return true; //if data is true
        } 

        else {
            return false; //if data is wrong
        }


    }


    function showall() {
        //create query to connect user login database
        $query = $this->db->query("SELECT n.subject, n.publishdate, s.name, n.noticeid from notice n, student s where n.publishedby = s.sid");
        return $query;
    }



    function shownotice($id) {
        $query = $this->db->query("SELECT n.subject, n.publishdate, s.name, n.noticeid, n.approve from notice n, staff s where n.publishedby = s.staffid and n.noticeid = '$id'");
        return $query;
    
    }

    function showallapprove() {
        $query = $this->db->query("SELECT n.noticeid, n.subject, n.publishdate, s.name from notice n, staff s where n.publishedby = s.staffid and n.approve is null order by n.publishedby desc ");
        return $query;
    }

    function approve($id) {
        $query =$this->db->simple_query("UPDATE `projectdb`.`notice` SET `approve` = '1' WHERE `notice`.`noticeid` ='$id'");
        if($query)
            return true;
        else 
            return false;
    }

    function showallapproved() {
        //create query to connect user login database
        $query = $this->db->query("SELECT n.subject, n.publishdate, s.name, n.noticeid from notice n, staff s where n.publishedby = s.staffid and n.approve = 1 order by n.publishdate desc");
        return $query;
    }

    function search($sub){
        $query5 = $this->db->query("SELECT n.subject, n.publishdate, s.name, n.noticeid from notice n, staff s where n.publishedby = s.staffid and n.subject LIKE '%$sub%' order by n.publishdate desc");
        return $query5;
    }









}