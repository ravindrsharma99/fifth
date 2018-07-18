<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
  class User extends CI_Controller {
  function __construct() {
        parent::__construct();
    $this->load->model(array("Site_model","Admin_model"));
  }
  public function un_register()
  {
    if(isset($_SESSION['email'])){
      redirect('/fitness_equipment');
    }
    else{
    $data['title'] ="Register";
    if(isset($_POST['first'])){
          $this->form_validation->set_rules('email', ' Email', 'trim|required|valid_email|is_unique[customer_user.Email]');
          $this->form_validation->set_rules('username', ' Username', 'trim|required|is_unique[customer_user.UserName]');

          $this->form_validation->set_rules('first', ' First Name', 'trim|required');
          $this->form_validation->set_rules('middle', ' Middle Name', 'trim|required');
          $this->form_validation->set_rules('password', ' Password', 'trim|required');
          $this->form_validation->set_rules('last', ' Last Name', 'trim|required');

          $this->form_validation->set_message('is_unique', 'The %s is already taken');

          if($this->form_validation->run() == FALSE)
          {
            $data['error'] = validation_errors();
          }
          else
          {
           $this->Admin_model->register();
           $data['error'] = 'You have registered successfully.';
          }
      }
      $data['category'] =  $this->Site_model->categorySearch();
      $data['menu']  = $this->Site_model->menusearch();
      $this->load->view('template/site/header',$data);
      $this->load->view('register');
      $this->load->view('template/site/footer');
    }
  }

  function login(){
     //die('heere');
    $this->Admin_model->ajaxlogin();
  }

  function logout(){

    // $array_items = array('userId','userRole', 'email', 'title', 'username', 'firstname', 'phone_number', 'middlename', 'lastname');
    // $this->session->unset_userdata($array_items);
    // $this->session->sess_destroy();
    session_destroy();
    // echo "<pre>";
    // print_r($_SESSION);
    // die;
    header('Location: '.base_url('/'));
  }

  public function forgetpassword()
  {
    if(isset($_SESSION['email'])){
      redirect('/fitness_equipment');
    }
    else{
      if (isset($_POST['email'])) {
      $email = $this->input->post('email');
      $idArray = $this->Admin_model->check_email($email);
      // print_r($idArray);
      if (count($idArray)>0) {
        $id=$idArray[0]->ID;
        $static_key = "afvsdsdjkldfoiuy4uiskahkhsajbjksasdasdgf43gdsddsf";
        $ids = $id . "_" . $static_key;
        $b_id = base64_encode($ids);
        $url = base_url('user/newpassword/') . "/?id=" . $b_id;

        $body = "<body>
        <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#fff'>
          <tr>
          <td>
            <table width='600' border='0' cellspacing='0' cellpadding='10' bgcolor='#f6fafb' align='center'>
              <tr>
                <th width=20px></th>
                <th style=padding-top:30px;padding-bottom:30px;text-align:center;>
                 <h2>Global Fitness Group</h2></th>
                <th width=20px></th>
              </tr>
              <tr>
                <td width=20px></td>
                <td bgcolor=#fff style=border-radius:10px;padding:20px;>
                  <table width=100%;>
                    <tr>
                      <th style=font-size:20px; font-weight:bolder; text-align:right;padding-bottom:10px;border-bottom:solid 1px #ddd;> Thank You ".ucfirst($idArray[0]->FirstName." ".$idArray[0]->MiddleName." ".$idArray[0]->LastName)."! </th>
                    </tr>
                    <tr>
                      <td style=font-size:16px;>
                        <p> You have request a password reset for your user account at Global Fitness Group.To complete the process, click the link below.</p>
                        <p><a target='_blank' href=" . $url . ">Change Password</a></p>
                      </td>
                    </tr>
                    <tr>
                      <td style=text-align:center; padding:20px;>
                        <h3 style=margin-top:50px; font-size:29px;>Best Regards,</h3>

                        </td>
                    </tr>
                  </table>
                </td>
                <td width=20px></td>
              </tr>
              <tr>
                <td width=20px></td>
                <td style=text-align:center; color:#fff; padding:10px;> Copyright © All Rights Reserved</td>
                <td width=20px></td>
              </tr>
            </table>

          </td>
        </tr>
        </table>

          </body>";

          $headers = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
          $from = "support@globalfitness.net";
          $to = $email;
          $subject = 'Global Fitness : Forget Password request';
          $message = $body;
          $headers .= 'From: '.$from. "\r\n"."X-Mailer: PHP/" . phpversion();
          mail($to,$subject,$message,$headers);
          $this->session->set_flashdata('invalidEmail','Please Check your email. A forget password link have been sent.');
      }
      else{
       $this->session->set_flashdata('invalidEmail','Please provide correct email id');
      }
    }
      $data['title'] ="Forget Password";
      $data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
      $data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
      // $data['category'] =  $this->Site_model->categorySearch();
      $data['menu']  = $this->Site_model->menusearch();
      $this->load->view('template/site/header',$data);
      $this->load->view('forget_password');
      $this->load->view('template/site/footer');
    }
  }

    public function newpassword()
  {
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

    $ids = $this->input->get('id');
    $urlData = array('ids'=>$ids);
    $iddecoded = base64_decode($ids);
  $idsalt = explode('_', $iddecoded);
    // print_r($idsalt);
    $id = $idsalt[0];
    $salt = $idsalt[1];
    // echo "$id";
    // echo "$salt";
    $static_key = "afvsdsdjkldfoiuy4uiskahkhsajbjksasdasdgf43gdsddsf";
    if ($salt==$static_key && $id!="") {
      $emailArray = $this->Admin_model->check_id($id);
      if(count($emailArray)>0){
        $email=$emailArray[0]->email;
        $iiiii=$emailArray[0]->ID;

        if(isset($_POST['password'])){
           $this->session->set_flashdata('passUpdated','');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[12]');
            if($this->form_validation->run()==true){
              $this->Admin_model->update_password_detail($iiiii);
              $this->session->set_flashdata('passUpdated','Password has been updated Successfully!! Try with new password.');
          //   redirect('/user/forget_password');
            }
        }
        $data['ids'] =$ids;

        $data['title'] ="New Password";
        $data['category'] =  $this->Site_model->categorySearch();
        $this->load->view('template/site/header',$data);
        $this->load->view('newpassword',$urlData);
        $this->load->view('template/site/footer');

      }
      else{
        echo "Invalid Access";
      }
    }
    else {
      echo "Invalid Access";
    }
  }

  public function ajax_register(){

    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[customer_user.Email]');
    $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[customer_user.UserName]');

    $this->form_validation->set_message('is_unique', 'This %s is already registered, do you want to <a href="" class="clickloginButton">Login</a>');
    if($this->form_validation->run() == FALSE)
    {
      $data['error'] = validation_errors();
      print_r($data['error']);
    }
    else
    {
         $body = "<p><strong>Dear Webmaster,</strong></p>
                      <p><strong>First Name:</strong>".$_POST['first']."</p>
                      <p><strong>Last Name:</strong>".$_POST['last']."</p>
                      <p><strong>Email:</strong> ".$_POST['email']."</p>
                      <p><strong>Telephone:</strong>".$_POST['phone_number']."</p>
                      <p><strong>Subject:</strong>New User Registered</p>
                      <p><strong>Message:</strong> ".$_POST['message_contactus']."</p>
                      <p>Thank You</p>";
                      $filename = "";
                  $from = "support@globalfitness.net";
                  $to = "email@globalfitness.net";
                  $subject = "New User Registered";
                  $message = $body;
                       $body2 = "<h4>Dear " . $_POST['first'] . "</h4>
                       <p>You're successfully registered with the Global Fitness</p>
            <p>Thank you for getting in touch and have a great day!</p>
      <p>Global Fitness Team</p>";

                        $headers = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
                        $headers .= 'From: '.$from. "\r\n"."X-Mailer: PHP/" . phpversion();
                        mail($to,$subject,$message,$headers);
                        $headers1 = 'MIME-Version: 1.0' . "\r\n";
                        $headers1.= 'Content-type:text/html;charset=UTF-8' . "\r\n";
                        $to1 = $_POST['email'];
                        $from1 = "support@globalfitness.net";
                        $subject1 = 'Confirmation ! New User Registered';
                        $message1 = $body2;
                        $headers1 .= 'From: ' . $from1 . "\r\n" . "X-Mailer: PHP/" . phpversion();
                        mail($to1, $subject1, $message1, $headers1);
                        $this->Admin_model->register();
                        echo 1;
    }
  }
}
