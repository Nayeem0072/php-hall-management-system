<?php
session_start();
?>

<?php

class ServiceView extends CI_Controller {
	function __construct()
 {
   parent::__construct();
   $this->load->model('dbroom');
 }




	public function view($page = 'serviceview')
	{
		$this->load->helper('url');
		if ( ! file_exists(APPPATH.'/views/room/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$session_data = $this->session->userdata('logged_in');
		$data['type'] = $session_data['usertype'];

		$getmed = $this->dbroom->getmedical();
		
		$getlau = $this->dbroom->getlaundry();
		$data['mednil'] = 0;
		$data['launil'] = 0;

		if($getmed->num_rows() == 0)
			$data['mednil'] = 1;
		if($getlau->num_rows() == 0)
			$data['launil'] = 1;

		$data['getmed'] = $getmed;
		$data['getlau'] = $getlau;
		

		
		$this->load->view('room/'.$page, $data);
		

	}

	public function clear()
	{
		$this->load->helper('url');
		$clear = $this->dbroom->clear();
		if($clear)
			header('Location: ' .base_url(). 'index.php/serviceview/view');


	}

	public function download()
	{
		define('FPDF_FONTPATH',APPPATH .'plugins/fpdf/font/');
      	require(APPPATH .'plugins/fpdf/fpdf.php');

		$this->load->helper('url');

		$getmed = $this->dbroom->getmedical();
		
		$getlau = $this->dbroom->getlaundry();
		$data['mednil'] = 0;
		$data['launil'] = 0;

		if($getmed->num_rows() == 0)
			$data['mednil'] = 1;
		if($getlau->num_rows() == 0)
			$data['launil'] = 1;

		$pdf = new FPDF('p','mm', 'a4');
      	$pdf -> AddPage();
      	$pdf -> setDisplayMode ('fullpage');

      	$pdf -> setFont ('times','B','20');

      	if(!$data['mednil']){
      		$pdf -> write (10,"\nStudents Asked for Medical Help\n\n");

      		$pdf -> setFont ('times','B','15');
      		$pdf -> cell(80,10,"Name",1,0,'C');
            $pdf -> cell(40,10,"Room",1,0,'C');
            $pdf -> cell(40,10,"Phone",1,0,'C');
            $pdf -> write (10,"\n");

      		foreach ($getmed->result() as $row)
            {
            	$pdf -> setFont ('times','','15');
            	$pdf -> cell(80,10,$row->name,1,0,'C');
            	$pdf -> cell(40,10,$row->room,1,0,'C');
            	$pdf -> cell(40,10,$row->phone,1,0,'C');
            	$pdf -> write (10,"\n");
            	// $pdf -> cell(200,30,$row->room,1,1);
            	// $pdf -> cell(200,30,$row->phone,1,1);

            }
      	}

      	$pdf -> setFont ('times','B','20');

      	if(!$data['launil']){
      		$pdf -> write (10,"\nStudents Asked for Laundry Service\n\n");
      		
      		$pdf -> setFont ('times','B','15');
      		$pdf -> cell(80,10,"Name",1,0,'C');
            $pdf -> cell(40,10,"Room",1,0,'C');
            $pdf -> cell(40,10,"Phone",1,0,'C');
            $pdf -> write (10,"\n");


      		foreach ($getlau->result() as $row)
            {
            	$pdf -> setFont ('times','','15');
            	$pdf -> cell(80,10,$row->name,1,0,'C');
            	$pdf -> cell(40,10,$row->room,1,0,'C');
            	$pdf -> cell(40,10,$row->phone,1,0,'C');
            	$pdf -> write (10,"\n");
            	// $pdf -> cell(200,30,$row->room,1,1);
            	// $pdf -> cell(200,30,$row->phone,1,1);

            }
      	}
      	$pdf -> output ('service.pdf','D'); 

	}

	
}

?>

