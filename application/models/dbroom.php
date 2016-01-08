<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class Dbroom extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    function addhelp($sid) {
        //create query to connect user login database
        $query = $this->db->simple_query("UPDATE student SET needhelp = 1 WHERE sid = '$sid'");

        
        //get query and processing
        
        if($query) {
            return true; //if data is true
        } 

        else {
            return false; //if data is wrong
        }
    }

    function addlaundry($sid) {
        //create query to connect user login database
        $query = $this->db->simple_query("UPDATE student SET needlaundry = 1 WHERE sid = '$sid'");

        
        //get query and processing
        
        if($query) {
            return true; //if data is true
        } 

        else {
            return false; //if data is wrong
        }
    }

    function getinfo($sid) {

        $query2 = $this->db->query("SELECT needhelp, needlaundry FROM student WHERE sid = '$sid'");
        return $query2; 


    }

    function cancelall($sid) {
        $query = $this->db->simple_query("UPDATE student SET needlaundry = 0 , needhelp = 0 WHERE sid = '$sid'");

        
        //get query and processing
        
        if($query) {
            return true; //if data is true
        } 

        else {
            return false; //if data is wrong
        }

    }

    function insert($sid, $fbsubject, $fbdetail, $fbdate) {
        //create query to connect user login database
        $query = $this->db->simple_query("INSERT INTO `projectdb`.`feedback` (`fbid`, `date`, `reviewed`, `feedback`, `reviewedby`, `publishedby`) 
            VALUES (NULL, '$fbdate', '0', '$fbdetail', NULL, '$sid');");

        
        //get query and processing
        
        if($query) {
            return true; //if data is true
        } 

        else {
            return false; //if data is wrong
        }
    }


    function getmedical() {

        $query2 = $this->db->query("SELECT name, room, phone FROM student WHERE needhelp = 1");
        return $query2; 


    }

    function getlaundry() {

        $query2 = $this->db->query("SELECT name, room, phone FROM student WHERE needlaundry = 1");
        return $query2; 


    }


    function clear() {
        $query = $this->db->simple_query("UPDATE student SET needlaundry = 0 WHERE needlaundry = 1");
        $query2 = $this->db->simple_query("UPDATE student SET needhelp = 0 WHERE needhelp = 1");
        if($query && $query2) {
            return true; //if data is true
        } 

        else {
            return false; //if data is wrong
        }
    }

    function insertstudent($name,$id,$dob,$address,$phone,$email,$room ,$username, $password) {
        $query = $this->db->simple_query("INSERT INTO `projectdb`.`student` (`sid`, `name`, `dob`, `address`, `phone`, `email`, `password`, `username`, `needlaundry`, `needhelp`, `room`) 
            VALUES ('$id', '$name', '$dob', '$address', '$phone', '$email', '$password', '$username', '0', '0', '$room')");
        if($query)
            return true;
        else
            return false;


    }
    function getusername($username){
        $query = $this->db->query("SELECT * from student WHERE username = '$username'");
        return $query;



    }

    function insertstaff($name,$post,$dob,$address,$phone,$email,$username, $password) {
        $query = $this->db->simple_query("INSERT INTO `projectdb`.`staff` (`staffid`, `username`, `password`, `name`, `post`, `dob`, `address`, `phone`, `email`) 
            VALUES (NULL, '$username', '$password', '$name', '$post', '$dob', '$address', '$phone', '$email');");
        if($query)
            return true;
        else
            return false;


    }
    function getusernamestaff($username){
        $query = $this->db->query("SELECT * from staff WHERE username = '$username'");
        return $query;



    }



     

}
