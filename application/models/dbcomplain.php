<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class Dbcomplain extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    function insert($sid, $subject, $complain, $date) {
        //create query to connect user login database
        $query = $this->db->simple_query("INSERT INTO `projectdb`.`complain` (`complainid`, 
            `complainedby`, `complaindate`, `reviewstatus`, `reviewedby`, `subject`, `complain`) 
        VALUES ( NULL, '$sid', '$date', '0', NULL, '$subject', '$complain');");

        
        //get query and processing
        
        if($query) {
            return true; //if data is true
        } 

        else {
            return false; //if data is wrong
        }
    }

    function checkreview($sid) {

        $reviewed = 0;
        $notreviewed = 0;

        $query2 = $this->db->query("SELECT *  FROM `complain` WHERE `complainedby` = $sid AND `reviewstatus` = 0"); 
        $query3 = $this->db->query("SELECT *  FROM `complain` WHERE `complainedby` = $sid AND `reviewstatus` > 0"); 

        foreach ($query2->result() as $row)
        {
           $notreviewed++;
        }

        foreach ($query3->result() as $row)
        {
           $reviewed++;
        }

        $review['reviewed'] = $reviewed;
        $review['notreviewed'] = $notreviewed;
        return $review;

    }

    function showall($sid){
        $query4 = $this->db->query("SELECT c.subject, c.complaindate, s.name, c.reviewstatus, c.complainid from complain c, student s where c.complainedby = s.sid and s.sid = '$sid' order by c.complaindate desc");
        return $query4;
    }


    function showallcomplain($sid){
        $query5 = $this->db->query("SELECT c.subject, c.complaindate, s.name, c.reviewstatus, c.complainid from complain c, student s where c.complainedby = s.sid order by c.complaindate desc");
        return $query5;
    }

    function showcomplain($id){
        $query5 = $this->db->query("SELECT c.subject, c.complaindate, s.name, c.complainid, c.complain from complain c, student s where c.complainedby = s.sid and c.complainid= '$id' order by c.complaindate desc");
        return $query5;
    }

     function showresolved($id){
        $query5 = $this->db->query("SELECT c.subject, c.complaindate, s.name, c.complainid, c.complain from complain c, student s where c.complainedby = s.sid 
            and c.complainid= '$id' and c.reviewstatus = 0");
        return $query5;
    }


function search($sub){
        $query5 = $this->db->query("SELECT c.subject, c.complaindate, s.name, c.complainid, c.complain, c.reviewstatus from complain c, student s where c.complainedby = s.sid and c.subject LIKE '%$sub%' order by c.complaindate desc");
        return $query5;
    }

    function reviewed($id, $staffid){
        $query5 = $this->db->simple_query("UPDATE `projectdb`.`complain` SET `reviewstatus` = '1', `reviewedby` = '$staffid' WHERE `complain`.`complainid` = '$id'");
        if($query5)
            return true;
        else
            return false;
    }

}
