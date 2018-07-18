<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
    // Construct the parent class
    	parent::__construct();
    	$this->load->model('Admin_model');
  }
	public function index()
	{
		$this->load->view('template/admin/header');
		$this->load->view('login_view');
		$this->load->view('template/admin/footer');
	}
	
  function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
   if($this->form_validation->run() == FALSE){
    //Field validation failed.  User redirected to login page
		  $this->load->view('template/admin/header');
	    $this->load->view('login_view');
	    $this->load->view('template/admin/footer');
    // $this->load->view('templates/footer');
		}
    else{
			redirect('/dashboard');
		} 	 	
	}

	function check_database($password){
   //Field validation succeeded.  Validate against database
  	$data = array('email' => $this->input->post('email'), 'password' => $this->input->post('password'));
	//query the database
   $result = $this->Admin_model->login($data);
   if($result){

  	$sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->ID,
         'email' => $row->Email
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
    return true;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid email or password');
     return false;
     }
  }

  public function Logout()
	{
    $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
    $this->session->sess_destroy();
    redirect('/admin/login');
  }
}
