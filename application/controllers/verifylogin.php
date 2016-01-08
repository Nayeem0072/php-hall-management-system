<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('dblogin');
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
   $this->load->helper('url');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.&nbsp; User redirected to login page
     //$this->load->view('home/home.php');
    echo("Login failed, incorrect username or password.");
   }
   else
   {
     //Go to private area
     //redirect('userhome/view', 'refresh');
     echo("Successfull");
    header('Location: ' .base_url(). 'index.php/userhome/view');

    //echo base_url();index.php/verifylogin
    
    //$this->load->view('home/userhome.php');
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.&nbsp; Validate against database
   $username = $this->input->post('username');

   //query the database
   $result1 = $this->dblogin->login2($username, $password);
   $result2 = $this->dblogin->login3($username, $password);

   if($result1){
   	$result1['usertype'] = "Student";
   	$this->session->set_userdata('logged_in', $result1);
    return TRUE;
   }

   if($result2){
   	$result2['usertype'] = $result2['post'];
   	$this->session->set_userdata('logged_in', $result2);
    return TRUE;
   }

   if(!$result2 && !$result1){
   	$this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;


   }

   // if($result)
   // {
   //   //$sess_array = array();
   //   // foreach($result as $row)
   //   // {
   //   //   $sess_array = array(
   //   //     'sid' => $row->sid,
   //   //     'name' => $row->name,
   //   //     'password' => $row->password
   //   //   );
   //   //   
   //   // }
   //   // 
     
   //   // $sess_array['name'] = $result['name'];
   //   // $sess_array['password'] = $result['password'];
   //   // $sess_array['sid'] = $result['sid'];


   //   $this->session->set_userdata('logged_in', $result);

   //   return TRUE;
   // }
   // else
   // {
   //   $this->form_validation->set_message('check_database', 'Invalid username or password');
   //   return false;
   // }
 }

 public function login()
	{
		$this->load->helper('url');

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$login1 = $this->dblogin->login2($username, $password);
		if($login1){
			$type = "Student";
			$this->session->set_userdata('logged_in', $login1);
			header('Location: ' .base_url(). 'index.php/userhome/view');
		}

		$login2 = $this->dblogin->login3($username, $password);
		if($login2){
			$row = $login2.row();
			$type = $row->post;
			$this->session->set_userdata('logged_in', $login2);
			header('Location: ' .base_url(). 'index.php/userhome/view');
		}

		if(!$login1 && !$login2)
			echo("Login failed, incorrect username or password.");
	}



		

}
?>
