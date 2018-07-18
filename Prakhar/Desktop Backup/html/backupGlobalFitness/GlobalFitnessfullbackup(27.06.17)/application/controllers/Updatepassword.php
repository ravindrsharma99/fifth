<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Updatepassword extends CI_Controller{
	function __construct() {
   parent::__construct();
   $this->load->model(array('Site_model'));
   $session_data = $this->session->userdata('userId');
    if(!$session_data){
      redirect('/');
    }
    $data['title'] = "Update Password";
    $data['category'] =  $this->Site_model->categorySearch();
    $this->load->view('template/site/header',$data);   
  }

 
 	/*Speciality*/
 	public function index(){ 		
    
 		$this->load->view('updatepassword');    
 	  $this->load->view('template/site/footer');
  }


  public function Changepassword(){     
    $this->form_validation->set_rules('oldpassword', 'Password', 'trim|required|callback_check_database');
    $this->form_validation->set_rules('newpassword', 'Password', 'trim|required');
      $this->form_validation->set_rules('cnewpassword', 'Password Confirmation', 'trim|required|matches[newpassword]');
      if ($this->form_validation->run() == FALSE)
      {
        $this->load->view('updatepassword');    
        $this->load->view('template/site/footer');
      }
      else
      {
           $message = array(
                       'id' => $this->input->post('id'),
                       'password' => $this->input->post('newpassword')
                     );
                 $this->Site_model->Changepassword($message); 
      }
  }
  function check_database(){
   //Field validation succeeded.  Validate against database
     $password = $this->input->post('oldpassword');
     $id = $this->input->post('id');
   
     $result = $this->Site_model->checkpassword($id, $password);
   
     if($result){
       
       return true;
     }
     else
     {
       $this->form_validation->set_message('check_database', 'Invalid Old Password Entered');
       return false;
     }
  }

}
?>