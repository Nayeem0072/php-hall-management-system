<?php
session_start();
?>


<?php

class NoticeView extends CI_Controller {
	function __construct()
	{
   		parent::__construct();
   		$this->load->model('dbnotice');
 	}


	public function show($page = 'noticeview')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/noticeboard/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['name'] = "Nayeem";
		$id = $_GET['id'];
		$data['noticeid'] = $_GET['id'];


		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];
		//$sid = $session_data['sid'];


		$noticedetail = $this->dbnotice->shownotice($id);
		if($noticedetail){
			$data['ndetail'] = $noticedetail;
		}

		$this->load->view('noticeboard/'.$page, $data);
		

	}
	public function download($page = 'noticeview')
	{
		define('FPDF_FONTPATH',APPPATH .'plugins/fpdf/font/');
      	require(APPPATH .'plugins/fpdf/fpdf.php');

		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/noticeboard/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['name'] = "Nayeem";
		$id = $_GET['id'];

		$file = base_url().'uploads/'.$id.'.jpg';
		$type = ".jpg";
		
		if(@getimagesize($file))
			$size = getimagesize($file);
		
		else{
			$type = ".png";			
			$file = base_url().'uploads/'.$id.'.png';
			$size = getimagesize(base_url().'uploads/'.$id.'.png');		
		}

		//$pdf = new FPDF('p','mm',array(210,300));
		if($size[0]>$size[1])
			$style = 'l';
		else
			$style = 'p';

		$pdf = new FPDF($style,'pt',array(($size[0])*3/4,($size[1])*3/4));
      	$pdf -> AddPage();

        $pdf -> setDisplayMode ('fullpage');
    	//$pdf -> Image(base_url().'uploads/'.$id.'.png',20,20,170,260);
    	$pdf -> Image(base_url().'uploads/'.$id."".$type,0,0,0,0);

        // $pdf -> setFont ('times','B',20);
        // $pdf -> cell(200,30,"Title",0,1);
    
         $pdf -> setFont ('times','B','20');
         $pdf -> write (10,"$size[0], $size[1]");
    
        $pdf -> output ($id.'.pdf','D');    
  
		//header('Location: ' .base_url(). 'index.php/noticeview/show?id='.$id);
	}
}

?>

