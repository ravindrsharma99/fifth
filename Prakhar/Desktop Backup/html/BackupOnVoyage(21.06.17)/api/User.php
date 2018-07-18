<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';
require(APPPATH.'/libraries/stripe.php');



/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class User extends REST_Controller {

  function __construct() {
        // Construct the parent class
    parent::__construct();
        //error_reporting(E_ALL); ini_set('display_errors', 1);
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //  $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->model('User_model');
        $this->load->helper('date');
        $this->load->helper(array('form', 'url'));
        $config = Array(
          'protocol' => 'sendmail',
          'mailtype' => 'html',
          'charset' => 'utf-8',
          'wordwrap' => TRUE
        );
        $this->load->library('email', $config);
        $this->load->library('form_validation');
        $this->load->database();
        Stripe\Stripe::setApiKey("sk_test_Lg9DUblnqYKJTdzU9YSAUS0n");

      }


    public function do_upload($upload_path, $image)
    {
        $baseurl = base_url();
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '1000000';
        $config['max_width']  = '20000';
        $config['max_height']  = '20000';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($image))
        {
            $error = array('error' => $this->upload->display_errors());
            // print_r($error);die;
            return $imagename = "";
        }
        else
        {
            $datail = $this->upload->data();
            return $imagename = $baseurl.$upload_path.$datail['file_name'];
        }
    }

  function login_post() {

    $config['upload_path'] = 'public/profileImages';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size'] = 3000;
    $config['max_width'] = 10240;
    $config['max_height'] = 7680;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('dp')) {
      $error = array('error' => $this->upload->display_errors());

      $imagename = "";
    } else {
      $data = $this->upload->data();
      $imagename = $data['file_name'];
    }
    if(!empty($imagename)){
    $image = base_url("public/profileImages") . '/' . $imagename;
    }else{
      $image='';
    }

    $message = [
    'dp' => $image,
    'email' => $this->post('email'),
    'token_id' => $this->post('token_id'),
    'device_id' => $this->post('device_id'),
    'fb_id' => $this->post('fb_id'),
    'unique_device_id' => $this->post('unique_device_id'),
    'name' => $this->post('name'),
    'gender' => $this->post('gender'),
    'age' => $this->post('age'),
    ];

   if ($message['fb_id'] == "" || $message['token_id'] == "" || $message['unique_device_id'] == "" || $message['device_id'] == "") {
      $result = array(
        "ResponseCode" => false,
        "MessageWhatHappen" => "Please Enter The Required Credentials",
        );
    } else {
        $id = $this->User_model->login($message);
        if($id == "User doesnot exists"){
        $result = array(
          "ResponseCode" => false,
          "MessageWhatHappen" => "User doesnot exists",
          );
        }else{
        $result = array(
          "ResponseCode" => true,
          "MessageWhatHappen" => "Logged in Successfully",
          "GetData" => $id,
          );
      } 
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
  }

  function loginandroid_post() {

    $message = [
    'dp' => $this->post('dp'),
    'email' => $this->post('email'),
    'token_id' => $this->post('token_id'),
    'device_id' => $this->post('device_id'),
    'fb_id' => $this->post('fb_id'),
    'unique_device_id' => $this->post('unique_device_id'),
    'name' => $this->post('name'),
    'gender' => $this->post('gender'),
    'age' => $this->post('age'),
    ];

   if ($message['fb_id'] == "" || $message['token_id'] == "" || $message['unique_device_id'] == "" || $message['device_id'] == "") {
      $result = array(
        "ResponseCode" => false,                   
        "MessageWhatHappen" => "Please Enter The Required Credentials",
        );
    } else {
        $id = $this->User_model->login($message);
        if($id == "User doesnot exists"){
        $result = array(
          "ResponseCode" => false,
          "MessageWhatHappen" => "User doesnot exists",
          );
        }else{
        $result = array(
          "ResponseCode" => true,
          "MessageWhatHappen" => "Logged in Successfully",
          "GetData" => $id,
          );
      } 
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
  }


  function logout_post() { 
    $message = [
    'userid' => $this->post('userid'),
    'unique_device_id' => $this->post('unique_device_id')
    ];

    $id = $this->User_model->logout($message);
    if ($id == "User not found") {
      $result = array(
        "controller" => "user",
        "action" => "Logout",
        "ResponseCode" => false,
        "MessageWhatHappen" => $id
        );
    } elseif ($id == "Updated") {
      $result = array(
        "controller" => "user",
        "action" => "Logout",
        "ResponseCode" => true,
        "MessageWhatHappen" => "Logged Out Successfully"
        );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
  }

  function profilepics_post() { 

    $config['upload_path'] = 'public/profileImages';
    $config['allowed_types'] = '*';
    $config['max_size'] = 3000;
    $config['max_width'] = 10240;
    $config['max_height'] = 7680;
    // print_r($config);die();
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('profilepic1')) {
      $error = array('error' => $this->upload->display_errors());

      $imagename1 = "";
    } else {
      $data = $this->upload->data();
      $imagename1 = $data['file_name'];
    }
    if(!empty($imagename1)){
    $image1 = base_url("public/profileImages") . '/' . $imagename1;
    }else{
      $image1 ='';
    }

    if (!$this->upload->do_upload('profilepic2')) {
      $error = array('error' => $this->upload->display_errors());

      $imagename2 = "";
    } else {
      $data = $this->upload->data();
      $imagename2 = $data['file_name'];
    }
    if(!empty($imagename2)){
    $image2 = base_url("public/profileImages") . '/' . $imagename2;
    }else{
      $image2 ='';
    }

    if (!$this->upload->do_upload('profilepic3')) {
      $error = array('error' => $this->upload->display_errors());

      $imagename3 = "";
    } else {
      $data = $this->upload->data();
      $imagename3 = $data['file_name'];
    }
    if(!empty($imagename3)){
    $image3 = base_url("public/profileImages") . '/' . $imagename3;
    }else{
      $image3='';
    }

    if (!$this->upload->do_upload('profilepic4')) {
      $error = array('error' => $this->upload->display_errors());

      $imagename4 = "";
    } else {
      $data = $this->upload->data();
      $imagename4 = $data['file_name'];
    }
    if(!empty($imagename4)){
    $image4 = base_url("public/profileImages") . '/' . $imagename4;
    }else{
      $image4='';
    }

    if (!$this->upload->do_upload('profilepic5')) {
      $error = array('error' => $this->upload->display_errors());

      $imagename5 = "";
    } else {
      $data = $this->upload->data();
      $imagename5 = $data['file_name'];
    }
    if(!empty($imagename5)){
    $image5 = base_url("public/profileImages") . '/' . $imagename5;
    }else{
      $image5 ='';
    }

    if (!$this->upload->do_upload('profilepic6')) {
      $error = array('error' => $this->upload->display_errors());

      $imagename6 = "";
    } else {
      $data = $this->upload->data();
      $imagename6 = $data['file_name'];
    }
    if(!empty($imagename6)){
    $image6 = base_url("public/profileImages") . '/' . $imagename6;
    }else{
      $image6 ='';
    }

    $message = [
    'userid' => $this->post('userid'),
    'profilepic1' => $image1,
    'profilepic2' => $image2,
    'profilepic3' => $image3,
    'profilepic4' => $image4,
    'profilepic5' => $image5,
    'profilepic6' => $image6,
    ];
    
    if($message['userid'] == "") {
      $result = array(
        "ResponseCode" => false,
        "MessageWhatHappen" => "Please fill the required credentials",
        );
    } else {

      $id = $this->User_model->profilepic($message);
      $result = array(
        "ResponseCode" => true,
        "MessageWhatHappen" => "Pics are updated",
        "Response" => $id,
        );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
  }

  function reportuser_post(){
     $message = [
    'from_id' => $this->post('from_id'),
    'to_id' => $this->post('to_id'),
    'message' => $this->post('message'),
    'date_created'=>$this->post('y-m-d h:i:s')];

    if($message['from_id'] == "" || $message['to_id'] == ""){
      $result = array(
          "ResponseCode" => false,
          "MessageWhatHappen" => "Please fill the required credentials",
          );
    } else {
    
       $id = $this->User_model->reportUser($message);

      $result = array(
        "ResponseCode" => true,
        "MessageWhatHappen" => "Message Send",
        );
  
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
    // print_r($id['from_data']->name); die;
    $body = "<!DOCTYPE html>
          <head>
          <meta content=text/html; charset=utf-8 http-equiv=Content-Type /> 
          <title>Report/Block User</title>
          <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
          </head>
          <body>    
          <table width=60% border=0 bgcolor=#FFCA13 style=margin:0 auto; float:none;font-family: 'Open Sans', sans-serif; padding:0 0 10px 0;>
          <tr>
          <th width=20px></th>

          <th width=20px  style=padding-top:30px;padding-bottom:30px;><img src=http://phphosting.osvin.net/public/images/my-app-logo.png width=100px;height=100px;></th>
          <th width=20px></th>
          </tr>
          <tr>
          <td width=20px></td>
          <td bgcolor=#fff style=border-radius:10px;padding:20px;>      
          <table width=100%;>
          <tr>
          <th style=font-size:20px; font-weight:bolder; text-align:right;padding-bottom:10px;border-bottom:solid 1px #ddd;> Hello admin</th>
          </tr>
          <tr>
          <td style=font-size:16px;>
         <p> User ".$id['from_data']->name." having Facebook ID-".$id['from_data']->fb_id."
         has reported the User ".$id['to_data']->name."  having Facebook ID-".$id['to_data']->fb_id."</p>
          </td>                    
          </tr>
          <tr>
          <td style=text-align:center; padding:20px;>
          <h2 style=margin-top:50px; font-size:29px;>Best Regards,</h2>
          <h3 style=margin:0; font-weight:100;>Customer Support</h3>
          <h3 style=margin:0; font-weight:100;><img src=http://phphosting.osvin.net/public/images/my-app-logo.png width=30px;height=30px;></h3>
          </td>
          </tr>
          </table>
          </td>
          <td width=20px></td>
          </tr>
          <tr>
          <td width=20px></td>
          <td style=text-align:center; color:#fff; padding:10px;> Copyright © OnVoyage All Rights Reserved</td>
          <td width=20px></td>
          </tr>
          </table>
          </body>";

          $this->email->set_newline("\r\n");
          $this->email->from('osvin315@gmail.com', 'OnVoyage');
          $this->email->to('help@OnVoyage.com');
          $this->email->subject('Updated info');
          $this->email->message($body);
          $this->email->send();

  }
  public function starttrip_post() {

    $message = [
    'userid' => $this->input->post('userid'),
    'city' => $this->input->post('city'),
    'beginningdate' => $this->input->post('beginningdate'),
    'endingdate' => $this->input->post('endingdate'),
    'ingroup' => $this->input->post('ingroup'),
    'no_of_mem' =>$this->input->post('no_of_mem'),
    'minage' => $this->input->post('minage'),
    'maxage' => $this->input->post('maxage'),
    'trip_from' => $this->input->post('trip_from'),
    'trip_description' => $this->input->post('trip_description'),
    ];

  if($message['userid'] == "" || $message['city'] == "" || $message['beginningdate'] == "" || $message['endingdate'] == "" || $message['ingroup'] == "")
   {
      $result = array(
          "ResponseCode" => false,
          "MessageWhatHappen" => "Please fill the required credentials",
          );
    }
    else
     {
      $Userid = $this->input->post('userid');
      $message['user_status'] =$this->User_model->CheckSubcription($Userid);
      if($message['user_status'] == 0){
        $message['user_status'] = 0;
      }
      if($message['user_status'] != 0){
        // print_r($message);die();
      $message['id'] = $this->User_model->starttrip($message);
       }
    
       if(!empty($message['id'])){
      $message['id'] = strval($message['id']);
      $result = array(
        "ResponseCode" => true,
        "MessageWhatHappen" => "Trip started",
        "Response" => strval($message['id']),
        "getdata"=>$message
        );
       }
       else
       {
       $result = array(
        "ResponseCode" => true,
        "MessageWhatHappen" => "Trip Failed",
        "Response" => strval($message['user_status']),
        "getdata"=>$message
        );
     }
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
  }

  function edittrip_post(){
    $message = [
    'tripid' => $this->input->post('tripid'),
    'userid' => $this->input->post('userid'),
    'city' => $this->input->post('city'),
    'beginningdate' => $this->input->post('beginningdate'),
    'endingdate' => $this->input->post('endingdate'),
    'ingroup' => $this->input->post('ingroup'),
    'no_of_mem' =>$this->input->post('no_of_mem'),
    'minage' => $this->input->post('minage'),
    'maxage' => $this->input->post('maxage'),
    'trip_from' => $this->input->post('trip_from'),
    'trip_description' => $this->input->post('trip_description'),
    ];
     // echo "<pre>";print_r($message);die;
  if($message['tripid'] == "" || $message['city'] == "" || $message['beginningdate'] == "" || $message['endingdate'] == "" || $message['ingroup'] == ""){
      $result = array(
          "ResponseCode" => false,
          "MessageWhatHappen" => "Please fill the required credentials",
          );
    } else {
       $id = $this->User_model->edittrip($message);
       $UserId = $this->input->post('userid');
       $message['user_status'] =$this->User_model->CheckSubcription($UserId);
       if(empty($message['user_status'])){
        $message['user_status'] = 0;
       }
      $result = array(
        "ResponseCode" => true,
        "MessageWhatHappen" => "Trip info Updated",
        "Response" => $id,
         "getdata"=>$message
        );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
  }

  function deletetrip_post() {

    $tripid = $this->post('tripid');

    if($tripid == ""){
      $result = array(
          "ResponseCode" => false,
          "MessageWhatHappen" => "Please fill the required credentials",
          );
    } else {

      $id = $this->User_model->deletetrip($tripid);
      $result = array(
        "ResponseCode" => true,
        "MessageWhatHappen" => "Trip deleted",
        );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
  }

  function usersDetails_post(){
       $message = [
    'userid' => $this->post('userid')
    ];
      if($message['userid'] == ""){
      $result = array(
          "ResponseCode" => false,
          "MessageWhatHappen" => "Please fill the required credentials",
          );
    } else {
      $id = $this->User_model->userDetails($message);
      if(empty($id)){
        $result = array(
          "ResponseCode" => false,
          "MessageWhatHappen" => "User details not found",
          );
      }
      else{
      $result = array(
        "ResponseCode" => true,
        "MessageWhatHappen" => "Users Details.",
        "Response" => $id,
        );
    }
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
  }

  function setting_post(){
    $message = [
    'userid' => $this->post('userid'),
    'minage' => $this->post('minage'),
    'maxage' => $this->post('maxage'),
    'preference' => $this->post('preference'),
    ];
    if($message['userid'] == "" || $message['minage'] == "" || $message['maxage'] == "" || $message['preference']== ""){
      $result = array(
          "ResponseCode" => false,
          "MessageWhatHappen" => "Please fill the required credentials",
          );
    } else {
      $id = $this->User_model->setting($message);
      $result = array(
        "ResponseCode" => true,
        "MessageWhatHappen" => "Updated Successfully",
        );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
  }

  function mytrips_post(){
    $userid = $this->input->post('userid');
     if($userid == ""){
      $result = array(
          "ResponseCode" => false,
          "MessageWhatHappen" => "Please fill the required credentials",
          );
    } else {
      $id = $this->User_model->mytrips($userid);
      /*$UserId = $this->input->post('userid');
      $id['user_status'] =$this->User_model->CheckSubcription($UserId);
       if(empty($id['user_status'])){
        $id['user_status'] = 0;
        }*/
      if($id == 3){
       $result = array(
        "ResponseCode" => false,
        "MessageWhatHappen" => "No user exists",
        );
     }else{
           $result = array(
           "ResponseCode" => true,
           "MessageWhatHappen" => "My trip list",
           "Response" => $id,
        );
     }
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
  }

  function match_post(){
    $tripid = $this->input->post('tripid');
    if($tripid == ""){
      $result = array(
          "ResponseCode" => false,
          "MessageWhatHappen" => "Please fill the required credentials",
          );
    }
    else
    {
       $id = $this->User_model->match($tripid);
       if(empty($id)){
          $result = array(
              "ResponseCode" => true,
              "MessageWhatHappen" =>"No matches found"
          );
        }
        else
        {
          $result = array(
              "ResponseCode" => true,
              "MessageWhatHappen" => "Matched other users",
              "Response" => $id,
          );
        }
    }

    $this->set_response($result, REST_Controller::HTTP_OK);
  }

  function action_post(){
    $message = [
      'to' => $this->post('to'),
      'from' => $this->post('from'),
      'action'=>$this->post('action'),
    ];

    if($message['to'] == "" || $message['from'] == "" || $message['action'] == ""){
      $result = array(
          "ResponseCode" => false,
          "MessageWhatHappen" => "Please fill the required credentials",
          );
      } else {
      $id = $this->User_model->update_action($message);
      $result = array(
        "ResponseCode" => true,
        "MessageWhatHappen" => $id,
      );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
  }

   function trip_action_post(){

    $message = [
      'to' => $this->post('to'),
      'from' => $this->post('from'),
      'action'=>$this->post('action'),
      'touserid' => $this->post('touserid'),
      'fromuserid' => $this->post('fromuserid'),
    ];

    if($message['to'] == "" || $message['from'] == "" || $message['action'] == "" || $message['touserid'] == "" || $message['fromuserid'] == ""){
      $result = array(
          "ResponseCode" => false,
          "MessageWhatHappen" => "Please fill the required credentials",
          );
      } else {
      $id = $this->User_model->updateaction($message);
      $result = array(
        "ResponseCode" => true,
        "MessageWhatHappen" => $id,
      );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
  }


  function get_action_post(){
    $message = [
      'to' => $this->post('to'),
      'from' => $this->post('from')
    ];
    if($message['to'] == "" || $message['from'] == "" ){
      $result = array(
          "ResponseCode" => false,
          "MessageWhatHappen" => "Please fill the required credentials",
          );
      } 
      else {
      $id = $this->User_model->get_action_user($message);
      $result = array(
        "ResponseCode" => true,
        "Response" => $id,
      );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
  }

  function chat_post() {
      $message = array(
        'from_id' => $this->post('from_id'),
        'to_id' => $this->post('to_id'),
        'is_message' => $this->post('is_message'),
        'message' => $this->post('message'),
        );

      $blockeds = $this->db->select("tbl_user_action.*")
                        ->from("tbl_user_action")
                        ->where("from",$message['to_id'])
                        ->where("to",$message['from_id'])
                        ->where("action",'4')
                        ->get()->row();

        if($blockeds->action == '4'){
          $blocks = '1';
        }else{
          $blocks = '0';
        }

     if($message['from_id'] == "" || $message['to_id'] == ""){
        $result = array(
          "ResponseCode" => false,
          "MessageWhatHappen" => "Please fill the required credentials",
        );
      } elseif ($blocks == "1"){
        $result = array(
          "ResponseCode" => false,
          "MessageWhatHappen" => "Message cannot be sent",
        );
      }
      else
      {
        if($message['is_message']==1){
          $upload_path = "public/Chat/";
          $image = "message";
          $message['message'] = $this->do_upload($upload_path, $image);
        }
       $id = $this->User_model->insertchat($message);
  
       $blocked = $this->db->select("tbl_user_action.*")
                        ->from("tbl_user_action")
                        ->where("from",$message['from_id'])
                        ->where("to",$message['to_id'])
                        ->where("action",'4')
                        ->get()->row();
        if($blocked->action == '4'){
          $block = '1';
        }else{
          $block = '0';
        }

        $result = array(
          "ResponseCode" => true,
          "MessageWhatHappen" =>"Message Send Successfully",
          "GetData" => $id,
          "Block" => $block,
        );
     }
    $this->set_response($result, REST_Controller::HTTP_OK);
  }

  function userchat_post() {

      $message = array(
      'first_id' => $this->post('to_id'),
      'second_id' => $this->post('from_id'),
      );

      $first_id = $this->post('to_id');
      $second_id = $this->post('from_id');

      if($first_id == "" || $second_id == ""){
          $result = array(
            "ResponseCode" => false,
            "MessageWhatHappen" => "Please fill the required credentials",
          );
      } else {
        $id = $this->User_model->userchatList($message);
        $firstmessage = $this->db->select('date_created')
        ->from('tbl_InitiateChat')
        ->where('from_id',$second_id)
        ->or_where('from_id',$first_id)
        ->where('to_id',$first_id)
        ->or_where('to_id',$second_id)
        ->get()->row();
        $dateResu = $firstmessage->date_created;

        $getResult = $this->db->select('tbl_users.*,tbl_profilepic.*')
        ->from('tbl_users')
        ->join('tbl_profilepic','tbl_profilepic.userid = tbl_users.id')
        ->where('tbl_users.id',$first_id)
        ->get()->row();
         $result = array(
                      "ResponseCode" => true,
                      "MessageWhatHappen" =>"Chat List",
                      "initiatedDate" => (empty($dateResu))?0:$dateResu,
                      "Getdata" => $id,
                      "UserData" => $getResult
                    );
      } 
      $this->set_response($result, REST_Controller::HTTP_OK);
    }

    function deletechat_post(){
      $message = array(
      'from_id' => $this->post('from_id'),
      'to_id' => $this->post('to_id'),
      'lastchat_id' => $this->post('lastchat_id'),
      );

      if($message['from_id'] == "" || $message['to_id'] == "" || $message['lastchat_id'] == ""){
          $result = array(
            "ResponseCode" => false,
            "MessageWhatHappen" => "Please fill the required credentials",
          );
      } else {
        $id = $this->User_model->deletechat($message);
        $result = array(
                      "ResponseCode" => true,
                      "MessageWhatHappen" =>"Delete Chat",
                    );
      } 
      $this->set_response($result, REST_Controller::HTTP_OK);
    }

    function updatedescription_post() {

        $message = array(
        'userid' => $this->post('userid'),
        'description' => $this->post('description'),
        );

        if($message['userid'] == "" || $message['description'] == ""){
            $result = array(
              "ResponseCode" => false,
              "MessageWhatHappen" => "Please fill the required credentials",
            );
        } else {
          $id = $this->User_model->updatedescription($message);
           $result = array(
              "ResponseCode" => true,
              "MessageWhatHappen" =>"Update Description",
              "Getdata" => $message,
            );
        }
        $this->set_response($result, REST_Controller::HTTP_OK);
      }

      function block_post() {
        $message = array(
        'userid' => $this->post('userid'),
        'blockid' => $this->post('blockid'),
        'action' => $this->post('action'),
        );

        if($message['userid'] == "" || $message['blockid'] == ""){
            $result = array(
              "ResponseCode" => false,
              "MessageWhatHappen" => "Please fill the required credentials",
            );
        } else {
          $id = $this->User_model->block($message);
          $result = array(
              "ResponseCode" => true,
              "MessageWhatHappen" =>"Update Description",
              "Getdata" => $message,
            );
        }
        $this->set_response($result, REST_Controller::HTTP_OK);
      }

      function getprofilepics_post(){

        $userid = $this->post('userid');

        if($userid == ""){
            $result = array(
              "ResponseCode" => false,
              "MessageWhatHappen" => "Please fill the required credentials",
            );
        } else {
          $id = $this->User_model->getprofilepics($userid);
          $result = array(
              "ResponseCode" => true,
              "MessageWhatHappen" =>"List of profile pics",
              "Getdata" => $id,
            );
        } 
        $this->set_response($result, REST_Controller::HTTP_OK);
      }

      function deleteuser_post(){
        $userid = $this->post('userid');

        if($userid == ""){
            $result = array(
              "ResponseCode" => false,
              "MessageWhatHappen" => "Please fill the required credentials",
            );
        } else {
          $id = $this->User_model->deleteuser($userid);
          $result = array(
              "ResponseCode" => true,
              "MessageWhatHappen" =>"User deleted",
              "Getdata" => $id,
            );
        } 
        $this->set_response($result, REST_Controller::HTTP_OK);
      }

  function mychat_post(){

    $userid = $this->post('userid');
     if($userid == ""){
      $result = array(
          "ResponseCode" => false,
          "MessageWhatHappen" => "Please fill the required credentials",
          );
    } else {

      $id = $this->User_model->mychat($userid);

      if($id == 0){
      $result = array(
        "ResponseCode" =>false,
        "MessageWhatHappen" => "chat doesnt exists",
        );
      }else{
      $result = array(
        "ResponseCode" => true,
        "MessageWhatHappen" => "mychat",
        "Response" => $id,
        );
    }
  }
  $this->set_response($result, REST_Controller::HTTP_OK);
  }

 function matchuserslist_post(){
     $userid = $this->post('userid');
     if($userid == ""){
      $result = array(
          "ResponseCode" => false,
          "MessageWhatHappen" => "Please fill the required credentials",
          );
    } else {
      $id = $this->User_model->matchuserslist($userid);
          $result = array(
              "ResponseCode" => true,
              "MessageWhatHappen" =>"Matched User List",
              "Getdata" => $id,
          );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
  }

  function matchstatus_post(){
    $message = array(
        'userid' => $this->post('userid'),
        'matcheduserid' => $this->post('matcheduserid'),
        'status' => $this->post('status'),
        );

     if($message['userid'] == "" || $message['matcheduserid'] == "" || $message['status'] == ""){
      $result = array(
          "ResponseCode" => false,
          "MessageWhatHappen" => "Please fill the required credentials",
          );
    } else {
      $id = $this->User_model->matchstatus($message);
          $result = array(
              "ResponseCode" => true,
              "MessageWhatHappen" =>"Matched User status",
              "Getdata" => $id,
          );
    }
      $this->set_response($result, REST_Controller::HTTP_OK);
  }

  function updatepics_post(){

    $config['upload_path'] = 'public/profileImages';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size'] = 3000;
    $config['max_width'] = 10240;
    $config['max_height'] = 7680;

    $this->load->library('upload', $config);

    if(isset($_FILES['profilepic1'])){
       if (!$this->upload->do_upload('profilepic1')) {
        $error = array('error' => $this->upload->display_errors());
        $image1 = "";
      } else {
        $data = $this->upload->data();
        $image1 = base_url("public/profileImages") . '/' .$data['file_name'];
      }
    }
    else
    {
      if(isset($_POST['profilepic1'])){
        $image1=$_POST['profilepic1'];
      }
    }

    if(isset($_FILES['profilepic2'])){
       if (!$this->upload->do_upload('profilepic2')) {
        $error = array('error' => $this->upload->display_errors());
        $image2 = "";
      } else {
        $data = $this->upload->data();
        $image2 = base_url("public/profileImages") . '/' .$data['file_name'];
      }
    }
    else
    {
      if(isset($_POST['profilepic2'])){
        $image2=$_POST['profilepic2'];
      }
    }

    if(isset($_FILES['profilepic3'])){
       if (!$this->upload->do_upload('profilepic3')) {
        $error = array('error' => $this->upload->display_errors());
        $image3 = "";
      } else {
        $data = $this->upload->data();
        $image3 = base_url("public/profileImages") . '/' .$data['file_name'];
      }
    }
    else
    {
      if(isset($_POST['profilepic3'])){
        $image3=$_POST['profilepic3'];
      }
    }

    if(isset($_FILES['profilepic4'])){
       if (!$this->upload->do_upload('profilepic4')) {
        $error = array('error' => $this->upload->display_errors());
        $image4 = "";
      } else {
        $data = $this->upload->data();
        $image4 = base_url("public/profileImages") . '/' .$data['file_name'];
      }
    }
    else
    {
      if(isset($_POST['profilepic4'])){
        $image4=$_POST['profilepic4'];
      }
    }

    if(isset($_FILES['profilepic5'])){
       if (!$this->upload->do_upload('profilepic5')) {
        $error = array('error' => $this->upload->display_errors());
        $image5 = "";
      } else {
        $data = $this->upload->data();
        $image5 = base_url("public/profileImages") . '/' .$data['file_name'];
      }
    }
    else
    {
      if(isset($_POST['profilepic5'])){
        $image5=$_POST['profilepic5'];
      }
    }

    if(isset($_FILES['profilepic6'])){
       if (!$this->upload->do_upload('profilepic6')) {
        $error = array('error' => $this->upload->display_errors());
        $image6 = "";
      } else {
        $data = $this->upload->data();
        $image6 = base_url("public/profileImages") . '/' .$data['file_name'];
      }
    }
    else
    {
      if(isset($_POST['profilepic6'])){
        $image6=$_POST['profilepic6'];
      }
    }
   
    // if(!empty($imagename1)){
    // $image1 = base_url("public/profileImages") . '/' . $imagename1;
    // }
    // else
    // {
    //   $image1 ='';
    // }

    
    // if (!$this->upload->do_upload('profilepic2')) {
    //   $error = array('error' => $this->upload->display_errors());

    //   $imagename2 = "";
    // } else {
    //   $data = $this->upload->data();
    //   $imagename2 = $data['file_name'];
    // }
    // if(!empty($imagename2)){
    // $image2 = base_url("public/profileImages") . '/' . $imagename2;
    // }else{
    //   $image2 ='';
    // }

    // if (!$this->upload->do_upload('profilepic3')) {
    //   $error = array('error' => $this->upload->display_errors());

    //   $imagename3 = "";
    // } else {
    //   $data = $this->upload->data();
    //   $imagename3 = $data['file_name'];
    // }
    // if(!empty($imagename3)){
    // $image3 = base_url("public/profileImages") . '/' . $imagename3;
    // }else{
    //   $image3='';
    // }

    // if (!$this->upload->do_upload('profilepic4')) {
    //   $error = array('error' => $this->upload->display_errors());

    //   $imagename4 = "";
    // } else {
    //   $data = $this->upload->data();
    //   $imagename4 = $data['file_name'];
    // }
    // if(!empty($imagename4)){
    // $image4 = base_url("public/profileImages") . '/' . $imagename4;
    // }else{
    //   $image4='';
    // }

    // if (!$this->upload->do_upload('profilepic5')) {
    //   $error = array('error' => $this->upload->display_errors());

    //   $imagename5 = "";
    // } else {
    //   $data = $this->upload->data();
    //   $imagename5 = $data['file_name'];
    // }
    // if(!empty($imagename5)){
    // $image5 = base_url("public/profileImages") . '/' . $imagename5;
    // }else{
    //   $image5 ='';
    // }

    // if (!$this->upload->do_upload('profilepic6')) {
    //   $error = array('error' => $this->upload->display_errors());

    //   $imagename6 = "";
    // } else {
    //   $data = $this->upload->data();
    //   $imagename6 = $data['file_name'];
    // }
    // if(!empty($imagename6)){
    // $image6 = base_url("public/profileImages") . '/' . $imagename6;
    // }else{
    //   $image6 ='';
    // }

   
      $message = array(
        'userid' => $this->post('userid'),
        'description' => $this->post('description'),
        );

      $this->User_model->updatedescription1($message);
      

    

        if($message['userid'] != ""){
          $messages['userid'] = $message['userid'];
        }
        if(isset($image1)) {
            $messages['profilepic1'] = $image1;
        }
        if(isset($image2)) {
            $messages['profilepic2'] = $image2;
        }
        if(isset($image3)) {
            $messages['profilepic3'] = $image3;
        }
        if(isset($image4)) {
            $messages['profilepic4'] = $image4;
        }
        if(isset($image5)) {
            $messages['profilepic5'] = $image5;
        }
        if(isset($image6)) {
            $messages['profilepic6'] = $image6;
        }
      $id = $this->User_model->updatepics($messages);

      $result = array(
            "ResponseCode" => true,
            "MessageWhatHappen" =>"Update profile",
            "Getdata" => $id,
          );

      $this->set_response($result, REST_Controller::HTTP_OK);
  }

  function tripdetail_post(){

    $tripid = $this->post('tripid');
    $id = $this->User_model->tripdetail($tripid);
    $result = array(
            "ResponseCode" => true,
            "MessageWhatHappen" =>"Trip detail",
            "Getdata" => $id,
          );
    $this->set_response($result, REST_Controller::HTTP_OK);
  }

          function readMessage_post() {

        $message = array(
            'from_id' => $this->post('from_id'),
            'to_id' => $this->post('to_id')
            );

        $id = $this->User_model->readMessage($message);
//print_r($id); die;
        if (!empty($id)) {
            $result = array(
                "controller" => "user",
                "action" => "readMessage",
                "ResponseCode" => true,
                "MessageWhatHappen" => "Message read Successfully"
            );
        } else {
            $result = array(
                "controller" => "user",
                "action" => "readMessage",
                "ResponseCode" => false,
                "MessageWhatHappen" => "something went wrong",
            );
        }
        $this->set_response($result, REST_Controller::HTTP_OK);

    }
public function InsertPromo_post(){
  $data = array(
    'promo_name'=>$this->input->post('name'),

    'promo_type'=>$this->input->post('type'),

    'start_date'=>$this->input->post('start_date'),

    'end_date'=>$this->input->post('end_date'),

    'amount'=>$this->input->post('amount'),

    'is_active'=>$this->input->post('is_active'),

    );
  if(!empty($data['promo_name'])){
   
    $select = $this->User_model->select_data('*','tbl_promocodeDetails',array('promo_name'=>$data['promo_name']));
    if(count($select) == 0){

  $result = $this->User_model->insert('tbl_promocodeDetails',$data);
  $value= 'inserted';
    }else{
     $result = $this->User_model->update_data('tbl_promocodeDetails',$data,array('promo_name'=>$data['promo_name'])); 
     $value= 'updated';
    }

    $result = array(
                "controller" => "User",
                "action" => "promocode",
                "ResponseCode" => true,
                "MessageWhatHappen" => "PromoCode $value"
            );

  }

  else{
    $result = array(
                "controller" => "User",
                "action" => "",
                "ResponseCode" => false,
                "MessageWhatHappen" => "Promocode error"
            );
  }
  $this->set_response($result, REST_Controller::HTTP_OK);
}

 public function subscriptionList_post(){

       $user_id = $this->input->post('user_id');
       $all_data = $this->User_model->getDataAll();
       $data_wallet = $this->User_model->getWalletBalance('tbl_wallet',$user_id);
       $wallet_balance = $data_wallet[0]['balance'];
        if (!empty($all_data)) {
            $result = array(
                "controller" => "User",
                "action" => "subscriptionList",
                "ResponseCode" => true,
                "WalletBalance" => $wallet_balance,
                "all_dataresponse" => $all_data
            );
        } else {
            $result = array(
                "controller" => "User",
                "action" => "subscriptionList",
                "ResponseCode" => false,
                "WalletBalance" => "empty",
                "MessageWhatHappen" => "List empty"
            );
        }
        $this->set_response($result, REST_Controller::HTTP_OK);
    }

    public function promoCode_post(){
    $date=date('Y-m-d H:i:s');
    $exact = date('Y-m-d');
    $data=array(
      'user_id'=>$this->input->post('user_id'),
      'promo_code'=>$this->input->post('promo_code'),
      'date'=>$date
      );
    
    $myresult = $this->User_model->select_data('*','tbl_promocode',array(
      'user_id'=>$data['user_id'],
      'promo_code'=>$data['promo_code']
      ));
    // print_r($myresult);die();
    if(count($myresult) >= 1){
         $result = array(
                "controller" => "User",
                "action" => "promoCode",
                "ResponseCode" => false,
                "Promovalue" => "Empty",
                "MessageWhatHappen" => "Promo Code Already Applied"
            );

    }else{
        $mydata = $this->User_model->select_data('*','tbl_promocodeDetails',array(    
      'promo_name'=>$data['promo_code']
      ));
        // print_r($exact);die();
        if($exact < $mydata['start_date'] || $exact > $mydata['end_date'] || $mydata['is_active']== 0 ){
            $result = array(
                "controller" => "User",
                "action" => "promoCode",
                "ResponseCode" => false,
                "Promovalue" => "Empty",
                "MessageWhatHappen" => "Promo Code Not Active for this date"
            );
        }else{
          $data['promo_code_value'] = $mydata['amount'];
           $all_data =$this->User_model->insert('tbl_promocode',$data);
           print_r($all_data);die();
     $PromoCodeValue = $this->User_model->getPromoBalance($all_data);
     $Promovalue = $PromoCodeValue[0]['promo_code_value'];
     if (!empty($all_data)) {
            $result = array(
                "controller" => "User",
                "action" => "promoCode",
                "ResponseCode" => true,
                "Promovalue" => $Promovalue,
                "all_dataresponse" => $all_data
            );
        } else {
            $result = array(
                "controller" => "User",
                "action" => "promoCode",
                "ResponseCode" => false,
                "Promovalue" => "Empty",
                "MessageWhatHappen" => "Data not inserted!!"
            );
        }
        }
       
    }
   
     $this->set_response($result, REST_Controller::HTTP_OK);
    }

    public function payment_post(){
      $card =$this->input->post('card_no');
      $CardNo = substr($card,'-4');

         $data=array(
          'user_id'=>$this->input->post('user_id'),
          'token_id'=>$this->input->post('token_id'),
          'card_no'=>$CardNo,
          'date'=>date('Y-m-d H:i:s'),
          );
         // echo "<pre>"; print_r($data);die;
         if(!empty($data)){
         $table='tbl_payment';
         $PaymentData = $this->User_model->insert($table,$data);
        }
         // echo  $PaymentData;
          if (!empty($PaymentData)) {
            $result = array(
                "controller" => "User",
                "action" => "payment",
                "ResponseCode" => true,
                "all_dataresponse" => $PaymentData
            );
          }
   $this->set_response($result, REST_Controller::HTTP_OK);
    }

    public function add_card_post(){
        $message = array(
          'user_id'=> $this->input->post('user_id'),
          'token_id'=> $this->input->post('token_id'),
          'card_no'=> $this->input->post('card_no'),
          'is_default'=> $this->input->post('is_default'),
          'date'=>date('Y-m_d H:i:s')
        );
        // print_r($message);die;
       $check_card = $this->User_model->select_data('*','tbl_stripeCustomer_details',array('card_no'=>$message['card_no']));
       // print_r($check_card);die();
       if(empty($check_card)){
        $customer = \Stripe\Customer::create(array(
        "source" => $message['token_id'],
        "description" => "work")
      );

      $insData = array(
        'user_id'=>$message['user_id'],
        'card_no'=>$message['card_no'],
        'customer_id'=>$customer->id,
        'is_default'=>$message['is_default'],
        'date'=>date('Y-m_d H:i:s')
        );
      //$customer_id = $customer->id;
      $insertdata = $this->User_model->insert('tbl_stripeCustomer_details',$insData);
      // print_r($insertdata);die();
      $data = $this->User_model->insert('tbl_cardDetails',$message);
      if(empty($data))
        {
                $result = array(
                "controller" => "User",
                "action" => "add_card",
                "ResponseCode" => false,
                "MessageWhatHappen" => "Something went wrong"
            );
        }else{
                 $result = array(
                "controller" => "User",
                "action" => "add_card",
                "ResponseCode" => true,
                 "MessageWhatHappen" => "Card added successfully"
            );
        }
      }else{
              $result = array(
                "controller" => "User",
                "action" => "add_card",
                "ResponseCode" => false,
                "MessageWhatHappen" => "Card already Exist!!"
            );
      }
        $this->set_response($result, REST_Controller::HTTP_OK);
     }


     public function add_money_post(){
          $message = array(
          'user_id'=> $this->input->post('user_id'),
          'card_no'=> $this->input->post('card_no'),
          'date'=>date('Y-m_d H:i:s')
        );
        $amount= $this->input->post('amount');
        $check_card = $this->User_model->select_data('*','tbl_stripeCustomer_details',array('card_no'=>$message['card_no']));
        $stripeAmount = $amount * 100;    // Since the amount charged by stripe is in cents for singapore doller, so here amount = 1 is being converted into 100 cents since actual payment will be 1 doller from front end |here| 1 doller = 100 cents:
        // print_r($check_card);die();

             $pay =  \Stripe\Charge::create(array(
                      "amount"   => $stripeAmount,
                      "currency" => "SGD",
                      "customer" => $check_card['customer_id']
                      ));

             $txnId = $pay->balance_transaction;
             $txnData=array
             (
               "user_id"=>$message['user_id'],
               "amount_credited"=>$amount,
               "card_no"=>$message['card_no'],
               "txnId"=>$txnId,
               "date"=>date('Y-m-d H:i:s')
             );

      $txnQuery = $this->User_model->insert('tbl_transactions',$txnData);
      $check_bal = $this->User_model->select_data('*','tbl_wallet',array('user_id'=>$message['user_id']));
      $newAmount = $check_bal['balance'] + $amount;
      $uptBal = $this->User_model->update_data('tbl_wallet',array('balance'=>$newAmount,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$message['user_id']));
      if(empty($txnQuery))

        {
                $result = array(
                "controller" => "User",
                "action" => "add_money",
                "ResponseCode" => false,
                "MessageWhatHappen" => "Something went wrong"
            );
        }else{
                 $result = array(
                "controller" => "User",
                "action" => "add_money",
                "ResponseCode" => true,
                 "MessageWhatHappen" => "Money added successfully"
            );
        }
        $this->set_response($result, REST_Controller::HTTP_OK);
     }

   public function getCard_post(){
       $user_id= $this->input->post('user_id');
       $checkCard = $this->User_model->getCard($user_id);
        if(empty($checkCard))
        {
                $result = array(
                "controller" => "User",
                "action" => "checkCard",
                "ResponseCode" => false,
                "MessageWhatHappen" => "No data found"
            );
        }else{
                 $result = array(
                "controller" => "User",
                "action" => "checkCard",
                "ResponseCode" => true,
                "transactionsResponse" => $checkCard
            );
        }
        $this->set_response($result, REST_Controller::HTTP_OK);
     }


     public function transactions_post(){

       $user_id= $this->input->post('user_id');
       $checkTransactions = $this->User_model->transactionData($user_id);
       if(empty($checkTransactions))
        {
                $result = array(
                "controller" => "User",
                "action" => "transactions",
                "ResponseCode" => false,
                "MessageWhatHappen" => "No data found"
        );
        }else{
                 $result = array(
                 "controller" => "User",
                 "action" => "transactions",
                 "ResponseCode" => true,
                 "transactionsResponse" => $checkTransactions
            );
        }
        $this->set_response($result, REST_Controller::HTTP_OK);

     }


     public function GetSubscriptionsDetails_post(){

       $data =array(
        'user_id'=>$this->input->post('user_id'),
        'subscription_id'=>$this->input->post('subscription_id'),
        'promo_code'=>$this->input->post('promo_code'),
        // 'subscription_type' =>$this->input->post('subscription_type')
        );

        if(!empty($data['user_id'])){
        $User_id=$this->input->post('user_id');
        $PromoCheck = $this->User_model->select_data('*','tbl_promocode',array('user_id'=>$User_id,
            'promo_code'=>$data['promo_code']));
        $message['subVal'] = $this->User_model->select_data('*','tbl_subscriptions',array('id'=>$data['subscription_id']));
        // print_r($message['subVal']);die();
          if( $PromoCheck['promo_code_value'] < $message['subVal']['amount'] ){
        $remaining_data = $message['subVal']['amount'] - $PromoCheck['promo_code_value'];
        
      }else{
        $remaining_data = 0;
      }
        $wallet = $this->User_model->select_data('*','tbl_wallet',array('user_id'=>$User_id));
        $update_wallet  = $wallet['balance'] - $remaining_data;
        $myresult  =$this->db->query("UPDATE tbl_wallet SET balance =".$update_wallet."  WHERE user_id = '".$User_id."'");
       
        $myvalue = array(
          'user_id'=>$data['user_id'],
          'subscription'=>$message['subVal']['type']
          );
        $this->User_model->insert('tbl_user_subscription',$myvalue);
        $mydata = array(
          'user_id'=>$User_id,
          'amount_debited' =>$remaining_data,
          'txnId'=>'from wallet',
          'date' =>date('Y-m-d H:i:s')
          );
        $myinsert = $this->User_model->insert('tbl_transactions',$mydata);
        $message['PromoCode'] = $PromoCheck['promo_code'];
        $message['PromoCodeValue'] = $PromoCheck['promo_code_value'];        
        $message['wallet_balance'] = $wallet['balance'];

        }

        if(empty($message))
              {
                      $result = array(
                      "controller" => "User",
                      "action" => "GetSubscriptions",
                      "ResponseCode" => false,
                      "MessageWhatHappen" => "No data found"
              );
              }else{
                       $result = array(
                       "controller" => "User",
                       "action" => "GetSubscriptions",
                       "ResponseCode" => true,
                       "GetSubscriptionsResponse" => $message
                  );
              }
              $this->set_response($result, REST_Controller::HTTP_OK);

     }
     public function GetSubscriptions_post(){
      $date=date('Y-m-d H:i:s');
       $data =array(
        'user_id'=>$this->input->post('user_id'),
        'subscription_id'=>$this->input->post('subscription_id'),
        'promo_code'=>$this->input->post('promo_code'),
        'subscription_date' =>  $date,
        );

        if(!empty($data['user_id'])){
        $User_id=$this->input->post('user_id');
        $PromoCheck = $this->User_model->select_data('*','tbl_promocode',array('user_id'=>$User_id));
        $message['PromoCode'] = $PromoCheck['promo_code'];
        $message['PromoCodeValue'] = $PromoCheck['promo_code_value'];
        $result = $this->User_model->insert('tbl_UserSubscription',$data);
        // print_r($result);die;
        $wallet = $this->User_model->select_data('*','tbl_wallet',array('user_id'=>$User_id));
        $message['wallet_balance'] = $wallet['balance'];

        }
        if(empty($message))
              {
                      $result = array(
                      "controller" => "User",
                      "action" => "GetSubscriptions",
                      "ResponseCode" => false,
                      "MessageWhatHappen" => "No data found"
              );
              }else{
                       $result = array(
                       "controller" => "User",
                       "action" => "GetSubscriptions",
                       "ResponseCode" => true,
                       "GetSubscriptionsResponse" => $message
                  );
              }
              $this->set_response($result, REST_Controller::HTTP_OK);

     }

}
?>