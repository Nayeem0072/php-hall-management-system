
<?php

class Testpdf extends CI_Controller {

function index(){
      // define('FPDF_FONTPATH',APPPATH .'plugins/fpdf/font/');
      // require(APPPATH .'plugins/fpdf/fpdf.php');
    
      // $pdf = new FPDF('p','mm','A4');
      // $pdf -> AddPage();
    
      // $pdf -> setDisplayMode ('fullpage');
    
      // $pdf -> setFont ('times','B',20);
      // $pdf -> cell(200,30,"Title",0,1);
    
      // $pdf -> setFont ('times','B','20');
      // $pdf -> write (10,"Description");
    
      // $pdf -> output ('your_file_pdf.pdf','D'); 

      $this->load->helper('url');  
      $file = base_url().'uploads/29.png';
      if(@getimagesize($file))
            echo "string";
      
      
      // echo file_exists($file_path_and_name);
      // $d= getimagesize(base_url().'uploads/29.png');
      // echo $d[0], $d[1];
      // //echo base_url().'uploads/32.png';
      // if($exist)
      //       echo "1";
      // else
      //       echo "0";
  }


}