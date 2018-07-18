<?php
use Twilio\Rest\Client;


defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
require(APPPATH.'/libraries/stripe.php');

/**
* This is an example of a few basic user interaction methods you could use
* all done with a hardcoded array
*
* @package         CodeIgniter
* @subpackage      Rest Server
* @category        Controller
*
**/
class User extends REST_Controller {
    function __construct() {
        parent::__construct();
$this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
$this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
$this->load->model('User_model');
$this->load->model('User_model');
$this->load->helper('date');
$this->load->helper(array('form','url'));
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
public function signup_post(){
    $refNo = rand(100,500);

    $myarray = array(
        'fname'=>$this->input->post('fname'),
        'lname'=>$this->input->post('lname'),
        'email'=>$this->input->post('email'),
        'password'=>md5($this->input->post('password')),
        'gender'=>$this->input->post('gender'),
        'user_type'=>$this->input->post('user_type'),
        'phone'=>$this->input->post('phone'),
        'fb_id'=>$this->input->post('fb_id'),
        'user_type'=>$this->input->post('user_type'),
        'google_id'=>$this->input->post('google_id'),
        'add_referCode'=>$this->input->post('add_referCode'),
        'latitude'=>$this->input->post('latitude'),
        'longitude'=>$this->input->post('longitude'),
        'ref_code'=>$this->input->post('fname')."KU".$refNo,
        'date_created' => date('Y-m-d H:i:s')
        );
    $img_type = $this->input->post('img_type');

    if($img_type == 1){


        $myarray['profile_pic'] = $this->input->post('profile_picUrl');


    } else if($img_type == 2){
        $upload_path = "Public/img/app";
        $image = 'profile_picFile';
        $finalImage = $this->file_upload($upload_path, $image);
        $myarray['profile_pic'] = $finalImage;
    }
    $loginArray = array(
        'unique_device_id'=>$this->input->post('unique_device_id'),
        'token_id'=>$this->input->post('token_id'),
        'device_id'=>$this->input->post('device_id'),
        'date_created' => date('Y-m-d H:i:s')
        );

if(empty($myarray['add_referCode']) ){ // no referCode added
    $signup_via = $this->input->post('signup_via');
    $user=$this->User_model->signup($myarray,$signup_via,$loginArray);
    $amount =0;
    $addBal = $this->User_model->insert_data('tbl_wallet',array('balance'=>$amount,'user_id'=>$user,'date_created'=>date('Y-m-d H:i:s')));
    $addtransArray = array(
        'amount_credited'=>$amount,
        'user_id'=>$user,
        'txnId'=>'initialWallet',
        'date_created'=>date('Y-m-d H:i:s')
        );
    $addtrans = $this->User_model->insert_data('tbl_transactions',$addtransArray);
}else{
    $selPromoUser = $this->User_model->select_data('*','tbl_users',array('ref_code'=>$myarray['add_referCode']));

if(!empty($selPromoUser[0]->ref_code)){ //added_referCode
    $signup_via = $this->input->post('signup_via');
    $user=$this->User_model->signup($myarray,$signup_via,$loginArray);
    $curr_refAmount = $this->User_model->select_data('*','tbl_settings');
    $amount = $curr_refAmount[0]->promoUser_amount;
    $addBal = $this->User_model->insert_data('tbl_wallet',array('balance'=>$amount,'user_id'=>$user,'date_created'=>date('Y-m-d H:i:s')));
    $addtransArray = array(
        'amount_credited'=>$amount,
        'user_id'=>$user,
        'txnId'=>'fromReferrel',
        'date_created'=>date('Y-m-d H:i:s')
        );
    $addtrans = $this->User_model->insert_data('tbl_transactions',$addtransArray);


    /*add Report start*/


    $addReport = array(
        'fromUser_id'=>$selPromoUser[0]->id,
        'toUser_id'=>$user,
        'amount'=>$amount,
        'type'=>1
        );
    $addReport1 = $this->User_model->insert_data('tbl_reports',$addReport);

    /*add Report end*/

    $checkBal = $this->User_model->select_data('balance','tbl_wallet',array('user_id'=>$selPromoUser[0]->id));
    $refamount = $curr_refAmount[0]->promoReferer_amount;
    $final_bal = $checkBal[0]->balance+$refamount;
    $providertransArray = array(
        'amount_credited'=>$refamount,
        'user_id'=>$selPromoUser[0]->id,
        'txnId'=>'fromReferrel',
        'date_created'=>date('Y-m-d H:i:s')
        );

    /*add Report start*/

    $addReport2 = array(
        'fromUser_id'=>$user,
        'toUser_id'=>$selPromoUser[0]->id,
        'amount'=>$amount,
        'type'=>2
        );
    $addReport3 = $this->User_model->insert_data('tbl_reports',$addReport2);

    /*add Report end*/



    $providertrans = $this->User_model->insert_data('tbl_transactions',$providertransArray);
    $updateRefererWallet = $this->User_model->update_data('tbl_wallet',array("balance"=>$final_bal,'date_updated'=>date('Y-m-d H:i:s')),array("user_id"=>$selPromoUser[0]->id));

}else{

    $result = array(
        "controller" => "User",
        "action" => "Signup",
        "ResponseCode" => false,
        "MessageWhatHappen" => "Wrong referer code"
        );
    $this->set_response($result, REST_Controller::HTTP_OK);
    return;


}


}

if(!empty($user)) {

    $userData = $this->User_model->select_data('*','tbl_users',array('id'=>$user));
    unset($userData[0]->password);
    $result = array(
        "controller" => "User",
        "action" => "Signup",
        "ResponseCode" => true,
        "MessageWhatHappen" => "Registered successfully",
        "SignupData" => $userData

        );
} else if ($user == 0 ){

    $result = array(
        "controller" => "User",
        "action" => "Signup",
        "ResponseCode" => false,
        "MessageWhatHappen" => "Email already exists",
        );
}
$this->set_response($result, REST_Controller::HTTP_OK);
}

public function login_post(){
    $is_exist = $this->User_model->select_data('user_type','tbl_users',array('email'=>$this->input->post('email')));
    if (empty($is_exist)) {
        $result = array(
            "controller" => "User",
            "action" => "login",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Wrong email id"
            );
    }else if($is_exist[0]->user_type!=$this->input->post('user_type')){
        $result = array(
            "controller" => "User",
            "action" => "login",
            "ResponseCode" => false,
            "MessageWhatHappen" => "You are trying to logging in wrong App.."
            );


    }else if($isExist){
        $result = array(
            "controller" => "User",
            "action" => "login",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Something went wrong"
            );


    }else{

        $message = array(

            'email'=>$this->input->post('email'),
            'password'=>$this->input->post('password'),
            'login_via'=>$this->input->post('login_via'),
            'latitude'=>$this->input->post('latitude'),
            'longitude'=>$this->input->post('longitude'),
            'unique_device_id'=>$this->input->post('unique_device_id'),
            'fb_id'=>$this->input->post('fb_id'),
            'google_id'=>$this->input->post('google_id'),
            'device_id'=>$this->input->post('device_id'),
            'token_id'=>$this->input->post('token_id'),
            'login_time' => date('Y-m-d H:i:s'),
            );
        $id = $this->User_model->login($message);

        if (!empty($id) && $id != 0) {
            $memData = $this->User_model->selMembership($id->id);

            $result = array(
                "controller" => "User",
                "action" => "login",
                "ResponseCode" => true,
                "MessageWhatHappen" => "Login successfull.",
                "loginData" => $id,
                "membership"=>$memData
                );
        } else if ($id == 0) {
            $result = array(
                "controller" => "User",
                "action" => "login",
                "ResponseCode" => false,
                "MessageWhatHappen" => "Wrong credentials"


                );
        }
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
}


public function logout_post(){
    $myarray = [
    'unique_device_id' => $this->input->post('unique_device_id'),
    'user_id' => $this->input->post('user_id')


    ];
    $id = $this->User_model->logout($myarray);

// print_r($id); die;
    if ($id == 0) {
        $result = array(
            "controller" => "User",
            "action" => "logout",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Something went wrong"

            );
    } else {
        $result = array(
            "controller" => "User",
            "action" => "logout",
            "ResponseCode" => true,
            "MessageWhatHappen" => "Logged out Successfully"
            );
    }

    $this->set_response($result, REST_Controller::HTTP_OK);
}
public function viewProfile_post(){                                        // view the profile details
    $user_id = $this->input->post('user_id');
    $sub = $this->User_model->getprofile($user_id);

    $memData = $this->User_model->selMembership($user_id);
    if (empty($sub)) {
        $result = array(
            "controller" => "User",
            "action" => "viewProfile",
            "ResponseCode" => false,
            "MessageWhatHappen" => "User does not exists"
            );
    } else {
        $result = array(
            "controller" => "User",
            "action" => "viewProfile",
            "ResponseCode" => true,
            'viewProfileData' => $sub,
            'membership'=>$memData
            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
}
function updateprofile_post() {
    $user_id = $this->input->post('user_id');

    $message = array(
        'fname'=>$this->input->post('fname'),
        'lname'=>$this->input->post('lname'),
        'latitude'=>$this->input->post('latitude'),
        'phone'=>$this->input->post('phone'),
        'longitude'=>$this->input->post('longitude')


        );

    $upload_path = "Public/img/app";
    $image = 'profile_pic';
    $finalImage = $this->file_upload($upload_path, $image);
    $message['profile_pic'] = $finalImage;

    $nwMessage = array_filter($message);
    $nwMessage['notification_status']= $this->input->post('notification_status');
    $nwMessage['gender'] = $this->input->post('gender');

    $id = $this->User_model->updateprofile($nwMessage,$user_id);
    if ($id == 1) {
        $updatedData = $this->User_model->select_data('*','tbl_users',array('id'=>$user_id));
        $result = array(
            "controller" => "User",
            "action" => "updateprofile",
            "ResponseCode" => true,
            "MessageWhatHappen" => "Updated Successfully",
            "updateData" => $updatedData

            );
    } else {
        $result = array(
            "controller" => "User",
            "action" => "updateprofile",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Not updated",
            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);

}


function smsToggle_post() {
    $user_id = $this->input->post('user_id');

    $id = $this->User_model->updateprofile(array('smsNotificationStatus'=>$this->input->post('status')),$user_id);
    if ($id == 1) {

        $result = array(
            "controller" => "User",
            "action" => "smsToggle",
            "ResponseCode" => true,
            "MessageWhatHappen" => "Updated Successfully"

            );
    } else {
        $result = array(
            "controller" => "User",
            "action" => "smsToggle",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Not updated"
            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);

}
function forgotpassword_post() {

    $email = $this->post('email');

    $id = $this->User_model->forgotpassword($email);

    if ($id == 0)
    {
        $result = array(
            "controller" => "user",
            "action" => "forgotpassword",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Email does not exist in our database"
            );
    } else {

        $body = "<!DOCTYPE html>
        <head>
        <meta content=text/html; charset=utf-8 http-equiv=Content-Type />
        <title>Feedback</title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
        </head>
        <body>
        <table width=60% border=0 bgcolor=#53CBE6 style=margin:0 auto; float:none;font-family: 'Open Sans', sans-serif; padding:0 0 10px 0;>
        <tr>
        <th width=20px></th>
        <th width=20px  style=padding-top:30px;padding-bottom:30px;><img src=http://kudosfind.com/Admin/Public/img/adPages/KudosfindLogo.png></th>
        <th width=20px></th>
        </tr>
        <tr>
        <td width=20px></td>
        <td bgcolor=#fff style=border-radius:10px;padding:20px;>
        <table width=100%;>
        <tr>
        <th style=font-size:20px; font-weight:bolder; text-align:right;padding-bottom:10px;border-bottom:solid 1px #ddd;> Hello " . $id['fname'] . "</th>
        </tr>

        <tr>
        <td style=font-size:16px;>
        <p> You have requested a password retrieval for your user account at KudosFind.To complete the process, click the link below.</p>
        <p><a href=" . site_url('api/User/newpassword?id=' . $id['b_id']) . ">Change Password</a></p>
        </td>
        </tr>


        <tr>
        <td style=text-align:center; padding:20px;>
        <h2 style=margin-top:50px; font-size:29px;>Best Regards,</h2>
        <h3 style=margin:0; font-weight:100;>Customer Support</h3>
        <h3 style=margin:0; font-weight:100;><img src='http://kudosfind.com/Admin/Public/img/AdminImages/ic_notify.png'></h3>
        </td>
        </tr>
        </table>
        </td>
        <td width=20px></td>
        </tr>
        <tr>
        <td width=20px></td>
        <td style=text-align:center; color:#fff; padding:10px;> Copyright © KudosFind All Rights Reserved</td>
        <td width=20px></td>
        </tr>
        </table>
        </body>";

        $this->email->set_newline("\r\n");
        $this->email->from('support@kudosFind.com', 'KudosFind');
        $this->email->to($email);
        $this->email->subject('Forgot Password');
        $this->email->message($body);
        $this->email->send();

        $result = array(
            "controller" => "user",
            "action" => "forgotpassword",
            "ResponseCode" => true,
            "MessageWhatHappen" => "Mail Sent Successfully"
            );
    }

    $this->set_response($result, REST_Controller::HTTP_OK);
}

function newpassword_get($user_id=null)
{
// echo "string";
    if ($user_id!="") {
        $user_id = base64_decode($user_id);
    }else{
        $user_id = base64_decode($this->get('id'));

    }
    $useridArr = explode("_", $user_id);
    $user_id = $useridArr[0];
    $data['id'] = $user_id;

    $data['title'] = "new Password";
    $this->load->view('template/header');
    $this->load->view('template/newpassword', $data);
}

function updateNewpassword_post()
{

    $uid = $this->input->post('id');
    $static_key = "afvsdsdjkldfoiuy4uiskahkhsajbjksasdasdgf43gdsddsf";
    $id = $uid . "_" . $static_key;
    $id = base64_encode($id);
    $message = ['id' => $this->input->post('id') , 'password' => $this->input->post('password') , 'base64id' => $id];
    $this->load->library('form_validation');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]|md5');
    if ($this->form_validation->run() == FALSE)
    {

        $this->session->set_flashdata('msg', '<span style="color:red">Please Enter Same Password</span>');
        redirect("api/User/newpassword?id=" . $message['base64id']);
    }
    else
    {

        $this->User_model->updateNewpassword($message);
    }
}


public function getCategory_get(){                                  // Get category list

    $data = $this->User_model->get_data('tbl_categories');
    $quesdata = $this->User_model->get_data('tbl_settingQues');
    $peakData  = $this->User_model->select_data('peakHourCharge,peakHourFrom,peakHourTo','tbl_settings');
    $WalletData = $this->User_model->select_data('balance','tbl_wallet',array('user_id'=>$this->input->get('id')));
    foreach ($data as $key => $value) {
        $data1 = $this->User_model->select_data('*','tbl_subCategory',array('category_id'=>$value->id));
        $wayData = $this->User_model->select_data('wayPoint_charge','tbl_settings');
        foreach ($data1 as  $serviceValue) {
            $serviceData = $this->User_model->select_data('*','tbl_subCategoryServices',array('subCategory_id'=>$serviceValue->id));
            $serviceValue->wayPoint_charge = $wayData[0]->wayPoint_charge;
            $serviceValue->services =   $serviceData;
        }

        $value->subCategories = $data1;

    }
    if (empty($data)) {
        $result = array(
            "controller" => "User",
            "action" => "getCategory",
            "ResponseCode" => false,
            "MessageWhatHappen" => "No list found"


            );
    } else {
        $result = array(
            "controller" => "User",
            "action" => "getCategory",
            "ResponseCode" => true,
            "MessageWhatHappen" => "Success",
            "questions" => $quesdata,
            "peakHourData" =>$peakData,
            "userData"=>$WalletData[0],
            "getCategoryData" => $data
            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);


}

public function changePassword_post(){
    $user_id = $this->input->post('user_id');
    $old_password = md5($this->input->post('old_password'));
    $new_password = md5($this->input->post('new_password'));

    $passData = $this->User_model->select_data('*','tbl_users',array('id'=>$user_id,'password'=>$old_password));

    if(empty($passData)){
        $result = array(
            "controller" => "User",
            "action" => "changePassword",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Wrong old password"
            );
        $this->set_response($result, REST_Controller::HTTP_OK);
    }else{

        $updateData = $this->User_model->update_data('tbl_users',array("password"=>$new_password),array("id"=>$user_id));
        if($updateData == 1){
            $result = array(
                "controller" => "User",
                "action" => "changePassword",
                "ResponseCode" => true,
                "MessageWhatHappen" => "Password changed successfully"

                );
        }else {
            $result = array(
                "controller" => "User",
                "action" => "changePassword",
                "ResponseCode" => false,
                "MessageWhatHappen" => "Something went wrong"

                );
        }
        $this->set_response($result, REST_Controller::HTTP_OK);
    }
}


// function requestnewBooking_post() {                                      // Make a request booking


//        $message = array(
//          'name' => $this->input->post('name'),
//          'user_id' => $this->input->post('user_id'),
//          'category_id'=>$this->input->post('category_id'),
//          'subCategory_id'=>$this->input->post('subCategory_id'),
//          'pickup_location'=>$this->input->post('pickup_location'),
//          'dropOff_location' => $this->input->post('dropOff_location'),
//          'pickup_lat'=>$this->input->post('pickup_lat'),
//          'dropOff_lat' => $this->input->post('dropOff_lat'),
//          'pickup_long'=>$this->input->post('pickup_long'),
//          'dropOff_long' => $this->input->post('dropOff_long'),
//          'wayPoints'=>$this->input->post('wayPoints'),
//          'distance'=>$this->input->post('distance'),
//          'hours'=>$this->input->post('hours'),
//          'booking_date'=>$this->input->post('date'),  // user desired booking date
//          'booking_time'=>$this->input->post('time'),    // user desired booking time
//          'estimatedprice'=>$this->input->post('estimatedprice'),
//          'totalprice'=>$this->input->post('totalprice'),
//          'services'=>$this->input->post('services'),
//          'is_quote'=>$this->input->post('is_quote'),
//          'value'=>$this->input->post('value'),    // if is_quote is sent true else empty
//          'phone'=>$this->input->post('phone'),
//          'time'=>$this->input->post('travel_time'),
//          'path_wayPoints'=>$this->input->post('path_wayPoints'),
//          'promo_codeId'=>$this->input->post('promo_codeId'),
//          'date_created'=>date('Y-m-d H:i:s')

//        );

//          $categoryType = $this->input->post('categoryType');
//          $get_percentage = $this->User_model->select_data('minBooking_charge','tbl_settings');
//          $percentage = $get_percentage[0]->minBooking_charge;
//          $dedAmount = ($percentage / 100) * $message['totalprice'];

//          $getBalance = $this->User_model->select_data('*','tbl_wallet',array('user_id'=>$message['user_id']));

//          if(!empty($getBalance)){
//          if($getBalance[0]->balance > $dedAmount){
//          $presentDate = date('Y-m-d H:i:s');
//          $dt = new DateTime($presentDate);
//          $nwPrDate = $dt->modify('+ 1 mins');
//          $finalDate = $nwPrDate->format('Y-m-d H:i:s');
//          // $get_res = $this->User_model->select_data('date_created','tbl_initialRequests');
//          $insertData = $this->User_model->insert_data('tbl_bookingRequests',$message);



//        $rType = 1;
//        $catType = $categoryType;
//        $getDrivers = $this->User_model->getLocationNew($message['pickup_lat'],$message['pickup_long'],$rType,$catType);
//          $pushData['message'] = "You have recieved a request for new task";
//          $pushData['action'] = "new move";
//          $pushData['req_id'] = $insertData;
//          $pushData['is_quote'] = $message['is_quote'];
//          $pushData['value'] = $message['value'];
//          $pushData['spMessage'] = 'Do you want to send proposal on it?';

//        foreach ($getDrivers as $value) {
//          $notificationArray = array(
//            'user_id'=>$value->id,
//            'messageNotification'=>'new_moveRequest',
//            'req_id'=>$insertData,
//            'user_type'=>2,
//            'date_created'=>date('Y-m-d H:i:s')
//          );
//          $insertNotification = $this->User_model->insert_data('tbl_notifications',$notificationArray);

//          if($value->notification_status == 0){
//          $pushData['Utype'] = 2;
//          $selectLogin = $this->User_model->select_data('*','tbl_login',array('user_id'=>$value->id,'status'=>1));
//            foreach ($selectLogin as  $loginUsers) {
//              $pushData['token'] = $loginUsers->token_id;
//              if($loginUsers->device_id == 1){
//               $this->User_model->iosPush($pushData);
//              }else if($loginUsers->device_id == 0){
//               $this->User_model->androidPush($pushData);
//              }

//            }
//          }
//        }










//          $newAmount = $getBalance[0]->balance - $dedAmount;

//          $uptDAta = $this->User_model->update_data('tbl_wallet',array('balance'=>$newAmount,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$message['user_id']));

//             $transArray = array(
//              'amount_debited'=>$dedAmount,
//              'user_id'=>$message['user_id'],
//              'txnId'=>'from_wallet',
//              'date_created'=>date('Y-m-d H:i:s')
//              );
//        $transResponse = $this->User_model->insert_data('tbl_transactions',$transArray);
//        // $insertData = $this->User_model->insert_data('tbl_bookingRequests',$message);
//       // print_r($this->db->last_query()); die;
//       // if($message['category_id'] ==1){
//        $moveData = array(
//        "req_id"=>$insertData,
//        "status"=>0
//        );
//        $insertMove_history = $this->User_model->insert_data('tbl_moveHistory',$moveData);
//        //}





//        if(empty($insertData)){
//                $result = array(
//                "controller" => "User",
//                "action" => "requestBooking",
//                "ResponseCode" => false,
//                "MessageWhatHappen" => "Something went wrong"

//            );
//        }else{
//         if(!empty($message['promo_codeId'])){
//          $select_data = $this->User_model->select_data('*','tbl_promocodes',array('id'=>$message['promo_codeId']));
//          $promo_data = $select_data[0];
//          }else{
//           $promo_data = '';
//          }
//                 $result = array(
//                "controller" => "User",
//                "action" => "requestBooking",
//                "ResponseCode" => true,
//                "MessageWhatHappen" => "Booked successfully",
//                "promo_data" => $promo_data

//            );
//        }

//      }else{

//         $result = array(
//                "controller" => "User",
//                "action" => "requestBooking",
//                "ResponseCode" => false,
//                "MessageWhatHappen" => "Insufficient balance",
//                "bookedPercentage" => $percentage


//            );


//      }
//    }else{
//      $result = array(
//                "controller" => "User",
//                "action" => "requestBooking",
//                "ResponseCode" => false,
//                "MessageWhatHappen" => "Insufficient balance",
//                "bookedPercentage" => $percentage

//            );
//    }
//          $this->set_response($result, REST_Controller::HTTP_OK);

//      }

function requestBooking_post() {                                      // Make a request booking


    $message = array(
        'name' => $this->input->post('name'),
        'user_id' => $this->input->post('user_id'),
        'category_id'=>$this->input->post('category_id'),
        'subCategory_id'=>$this->input->post('subCategory_id'),
        'pickup_location'=>$this->input->post('pickup_location'),
        'dropOff_location' => $this->input->post('dropOff_location'),
        'pickup_lat'=>$this->input->post('pickup_lat'),
        'dropOff_lat' => $this->input->post('dropOff_lat'),
        'pickup_long'=>$this->input->post('pickup_long'),
        'dropOff_long' => $this->input->post('dropOff_long'),
        'wayPoints'=>$this->input->post('wayPoints'),
        'distance'=>$this->input->post('distance'),
        'hours'=>$this->input->post('hours'),
        'booking_date'=>$this->input->post('date'),  // user desired booking date
        'booking_time'=>$this->input->post('time'),    // user desired booking time
        'estimatedprice'=>$this->input->post('estimatedprice'),
        'totalprice'=>$this->input->post('totalprice'),
        'services'=>$this->input->post('services'),
        'is_quote'=>$this->input->post('is_quote'),
        'value'=>$this->input->post('value'),    // if is_quote is sent true else empty
        'phone'=>$this->input->post('phone'),
        'time'=>$this->input->post('travel_time'),
        'path_wayPoints'=>$this->input->post('path_wayPoints'),
        'promo_codeId'=>$this->input->post('promo_codeId'),
        'categoryType'=>$this->input->post('categoryType'),
        'questions'=>$this->input->post('questions'),
        'date_created'=>date('Y-m-d H:i:s'),
        'description'=>$this->input->post('description'),
        'basefare'=>$this->input->post('basefare'),
        'servicefare'=>$this->input->post('servicefare'),
        'address'=>$this->input->post('address'),
        'waypointfare'=>$this->input->post('waypointfare'),
        'peakHourCharge'=>$this->input->post('peakHourCharge')

);
$categoryType = $this->input->post('categoryType');
$get_percentage = $this->User_model->select_data('minBooking_charge','tbl_settings');
$percentage = $get_percentage[0]->minBooking_charge;
$dedAmount = ($percentage / 100) * $message['totalprice'];

$getBalance = $this->User_model->select_data('*','tbl_wallet',array('user_id'=>$message['user_id']));

if(!empty($getBalance)){
    if($getBalance[0]->balance >= $dedAmount){
        $newAmount = $getBalance[0]->balance - $dedAmount;
        $addReport2 = array(
            'fromUser_id'=>$message['user_id'],
            'toUser_id'=>'',
            'amount'=>$dedAmount,
            'type'=>3
            );
        $addReport3 = $this->User_model->insert_data('tbl_reports',$addReport2);

        $uptDAta = $this->User_model->update_data('tbl_wallet',array('balance'=>$newAmount,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$message['user_id']));

        $transArray = array(
            'amount_debited'=>$dedAmount,
            'user_id'=>$message['user_id'],
            'txnId'=>'from_wallet',
            'date_created'=>date('Y-m-d H:i:s')
            );
        $transResponse = $this->User_model->insert_data('tbl_transactions',$transArray);
        $insertData = $this->User_model->insert_data('tbl_bookingRequests',$message);
// print_r($this->db->last_query()); die;
// if($message['category_id'] ==1){
        $moveData = array(
            "req_id"=>$insertData,
            "status"=>0
            );
        $insertMove_history = $this->User_model->insert_data('tbl_moveHistory',$moveData);
//}



        $rType = 1;
        $catType =  $categoryType;
        $getDrivers = $this->User_model->getLocationNew($message['pickup_lat'],$message['pickup_long'],$rType,$catType);
        $pushData['message'] = "You have recieved a request for new task";
        $pushData['action'] = "new move";
        $pushData['req_id'] = $insertData;
        $pushData['is_quote'] = $message['is_quote'];
        $pushData['value'] = $message['value'];
        if($message['is_quote'] == 1){
            $pushData['spMessage'] = 'Do you want to send proposal on it?';
        }else{
            $pushData['spMessage'] = 'You have recieved a request for new task';
        }


        foreach ($getDrivers as $value) {

            $notificationArray = array(
                'user_id'=>$value->id,
                'messageNotification'=>'new_moveRequest',
                'req_id'=>$insertData,
                'user_type'=>2,
                'is_quote'=>$message['is_quote'],
                'date_created'=>date('Y-m-d H:i:s')
                );
            $insertNotification = $this->User_model->insert_data('tbl_notifications',$notificationArray);

            $pushData['Utype'] = 2;
            $selectLogin = $this->User_model->select_data('*','tbl_login',array('user_id'=>$value->id,'status'=>1));
            foreach ($selectLogin as  $loginUsers) {

                $pushData['token'] = $loginUsers->token_id;
// if(!empty($check_Membership)){
                if($loginUsers->device_id == 1){
                    $this->User_model->iosPush($pushData);
                }else if($loginUsers->device_id == 0){
                    $this->User_model->androidPush($pushData);
                }

// }else{
//   sleep(20);
//   if($loginUsers->device_id == 1){
//    $this->User_model->iosPush($pushData);
//   }else if($loginUsers->device_id == 0){
//    $this->User_model->androidPush($pushData);
//   }

// }

            }
        }

        if(empty($insertData)){
            $result = array(
                "controller" => "User",
                "action" => "requestBooking",
                "ResponseCode" => false,
                "MessageWhatHappen" => "Something went wrong"

                );
        }else{
            if(!empty($message['promo_codeId'])){
                $select_data = $this->User_model->select_data('*','tbl_promocodes',array('id'=>$message['promo_codeId']));
                $promo_data = $select_data[0];
            }else{
                $promo_data = '';
            }
            $result = array(
                "controller" => "User",
                "action" => "requestBooking",
                "ResponseCode" => true,
                "MessageWhatHappen" => "Booked successfully",
                "promo_data" => $promo_data,
                "req_id"=>$insertData

                );
        }
    }else{

        $result = array(
            "controller" => "User",
            "action" => "requestBooking",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Insufficient balance",
            "bookedPercentage" => $percentage


            );


    }
}else{
    $result = array(
        "controller" => "User",
        "action" => "requestBooking",
        "ResponseCode" => false,
        "MessageWhatHappen" => "Insufficient balance",
        "bookedPercentage" => $percentage

        );
}
$this->set_response($result, REST_Controller::HTTP_OK);

}

public function serverTime_get(){

    $result = array("serverTime" => date('Y-m-d H:i:s')
        );
    $this->set_response($result, REST_Controller::HTTP_OK);
}


public  function retryBooking_post() {                                // Make a request booking

    $req_id  = $this->input->post("req_id");
   // $booking_date  = $this->input->post("booking_date");
   // $booking_time  = $this->input->post("booking_time");

    $reqdata = $this->User_model->select_data("*","tbl_bookingRequests",array("id"=>$req_id));
    $selCat  = $this->User_model->select_data("*","tbl_categories",array("id"=>$reqdata[0]->category_id));
    $categoryType   = $selCat[0]->categoryType;
    $UserID         = $reqdata[0]->user_id;
    $Userwallet     = $this->User_model->select_data("balance","tbl_wallet",array("user_id"=>$UserID));
    $UserwalletBal  = $Userwallet[0]->balance;
    $get_percentage = $this->User_model->select_data('minBooking_charge','tbl_settings');
    $percentage     = $get_percentage[0]->minBooking_charge;
    $dedAmount      = ($percentage / 100) * $reqdata[0]->totalprice;
    $getBalance     = $this->User_model->select_data('*','tbl_wallet',array('user_id'=>$reqdata[0]->user_id));


   // $UpdateBooking = $this->User_model->update_data("tbl_bookingRequests",array("booking_date"=>$booking_date,"booking_time"=>$booking_time),array('id'=>$req_id));

    if(!empty($getBalance)){
        if($getBalance[0]->balance >= $dedAmount){
            $newAmount = $getBalance[0]->balance - $dedAmount;

            $addReport2 = array(
                'fromUser_id'=>$reqdata[0]->user_id,
                'toUser_id'=>'',
                'amount'=>$dedAmount,
                'type'=>3
                );
            $addReport3 = $this->User_model->insert_data('tbl_reports',$addReport2);


            $uptDAta = $this->User_model->update_data('tbl_wallet',array('balance'=>$newAmount,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$reqdata[0]->user_id));

            $transArray = array(
                'amount_debited'=>$dedAmount,
                'user_id'=>$reqdata[0]->user_id,
                'txnId'=>'from_wallet',
                'date_created'=>date('Y-m-d H:i:s')
                );
            $transResponse = $this->User_model->insert_data('tbl_transactions',$transArray);


            $message1 = array(
                'is_accepted'  =>0,
                'is_started'   =>0,
                'is_completed' =>0,
                'is_cancelled' =>0,
                'accepted_by'  =>0,
                'date_created' =>date('Y-m-d H:i:s')
                );

            $myData = $this->User_model->update_data('tbl_bookingRequests',$message1,array('id'=>$req_id));

            $moveData = array(
                "cancelled_by"=>0,
                "status"=>0,
                'accepted_time'=>'0000-00-00 00:00:00',
                'started_time' =>'0000-00-00 00:00:00',
                'completed_time'=>'0000-00-00 00:00:00',
                'cancelled_time'=>'0000-00-00 00:00:00'

                );

            $insertMove_history = $this->User_model->update_data('tbl_moveHistory',$moveData,array('req_id'=>$req_id));

            $rType = 1;
            $catType =  $categoryType;
            $getDrivers = $this->User_model->getLocationNew($reqdata[0]->pickup_lat,$reqdata[0]->pickup_long,$rType,$catType);

            $pushData['message'] = "You have recieved a request for new task";
            $pushData['action'] = "new move";
            $pushData['req_id'] = $req_id;
            $pushData['is_quote'] = $reqdata[0]->is_quote;
            $pushData['value'] = $reqdata[0]->value;
            if($message['is_quote'] == 1){
                $pushData['spMessage'] = 'Do you want to send proposal on it?';
            }else{
                $pushData['spMessage'] = 'You have recieved a request for new task';
            }


            foreach ($getDrivers as $value) {

                $notificationArray = array(
                    'user_id'=>$value->id,
                    'messageNotification'=>'new_moveRequest',
                    'req_id'=>$req_id,
                    'user_type'=>2,
                    'is_quote'=>$reqdata[0]->is_quote,
                    'date_created'=>date('Y-m-d H:i:s')
                    );
                $insertNotification = $this->User_model->insert_data('tbl_notifications',$notificationArray);

                $pushData['Utype'] = 2;
                $selectLogin = $this->User_model->select_data('*','tbl_login',array('user_id'=>$value->id,'status'=>1));
                foreach ($selectLogin as  $loginUsers) {

                    $pushData['token'] = $loginUsers->token_id;
// if(!empty($check_Membership)){
                    if($loginUsers->device_id == 1){
                        $this->User_model->iosPush($pushData);
                    }else if($loginUsers->device_id == 0){
                        $this->User_model->androidPush($pushData);
                    }


                }
            }
            $cddata = $this->User_model->select_data("*","tbl_bookingRequests",array("id"=>$req_id));
            if(empty($myData)){
                $result = array(
                    "controller"        => "User",
                    "action"            => "retryBooking",
                    "ResponseCode"      => false,
                    "MessageWhatHappen" => "Something went wrong"
                    );
            }else{
                if(!empty($reqdata[0]->promo_codeId)){
                    $select_data = $this->User_model->select_data('*','tbl_promocodes',array('id'=>$reqdata[0]->promo_codeId));
                    $promo_data = $select_data[0];
                }else{
                    $promo_data = '';
                }
                $result = array(
                    "controller" => "User",
                    "action" => "retryBooking",
                    "ResponseCode" => true,
                    "MessageWhatHappen" => "Booked successfully",
                    "promo_data" => $promo_data,
                    "req_id"=>$cddata
                    );
            }
        }else{

            $result = array(
                "controller" => "User",
                "action" => "retryBooking",
                "ResponseCode" => false,
                "MessageWhatHappen" => "Insufficient balance",
                "walletBalance" => $UserwalletBal,
                "bookedPercentage" => $percentage


                );


        }
    }else{
        $result = array(
            "controller" => "User",
            "action" => "retryBooking",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Insufficient balance",
            "walletBalance" => $UserwalletBal,
            "bookedPercentage" => $percentage

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);

}



function getinstantBooking_post(){
    $user_id = $this->input->post('user_id');
    $unique_device_id = $this->input->post('unique_device_id');
    $chekLogin = $this->db->query("select * from tbl_login where user_id = '".$user_id."' and unique_device_id !='".$unique_device_id."' and status = 1")->result();
    $logRes = (empty($chekLogin))?0:1;  
    $getResponse = $this->db->select('*')
    ->from('tbl_bookingRequests')
    ->where("user_id",$user_id)
    ->order_by('id', 'desc')
    ->get()->row();



    if(empty($getResponse)){
        $result = array(
            "controller" => "User",
            "action" => "list_userBooking",
            "ResponseCode" => false,
            "MessageWhatHappen" => "No data found",
            "loginData"=> $logRes

            );
    }else{
        $getResponse->server_time = date('Y-m-d H:i:s');
        $result = array(
            "controller" => "User",
            "action" => "list_userBooking",
            "ResponseCode" => true,
            "MessageWhatHappen" => "Success",
            "getinstantBookingResponse"=> $getResponse,
            "loginData"=> $logRes


            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);


}

function list_userBooking_post() {                     // list all bookings done by user

    $user_id = $this->input->post('user_id');

    $book_status = $this->input->post('book_status');


    if($book_status == 1){
        $listResponse = $this->User_model->select_data('*','tbl_bookingRequests',array(
            'is_quote'=>0,
            'user_id'=>$user_id,
            'is_cancelled'=>0,
            'is_completed'=>0,
            'is_started'=>0,
            'is_accepted'=>0)
        );

    }else if($book_status == 2){
        $listResponse = $this->User_model->orSelectData($user_id);

    }else if($book_status ==3){
        $listResponse = $this->User_model->select_data('*','tbl_bookingRequests',array('user_id'=>$user_id,'is_completed'=>1));
    }else if($book_status ==4){
        $listResponse = $this->User_model->select_data('*','tbl_bookingRequests',array('user_id'=>$user_id,'is_cancelled'=>1));
    }else if($book_status == 5){
        $listResponse = $this->User_model->select_data('*','tbl_bookingRequests',array(
            'is_quote'=>1,
            'user_id'=>$user_id,
            'is_cancelled'=>0,
            'is_completed'=>0,
            'is_started'=>0,
            'is_accepted'=>0)
        );

    }
    foreach ($listResponse as $value) {
        $rType =  $this->User_model->select_data('jobRate_type','tbl_subCategory',array('id'=>$value->subCategory_id));
        $value->promoDetails= $this->User_model->select_data('*','tbl_promocodes',array('id'=>$value->promo_codeId));
        $value->job_ratetype = ($rType[0]->jobRate_type == 1)?'distance':'hourly';
    }

    if(empty($listResponse)){
        $result = array(
            "controller" => "User",
            "action" => "list_userBooking",
            "ResponseCode" => false,
            "MessageWhatHappen" => "No data found"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "list_userBooking",
            "ResponseCode" => true,
            "MessageWhatHappen" => "Success",
            "listBookingResponse"=> $listResponse

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);

}



function list_driverBooking_post() {                  // list all bookings for particular driver

    $driver_id = $this->input->post('driver_id');

    $book_status = $this->input->post('book_status');


    if($book_status == 1){
        $listResponse = $this->User_model->select_data('*','tbl_bookingRequests',array(
            'accepted_by'=>$driver_id,
            'is_cancelled'=>0,
            'is_completed'=>0,
            'is_started'=>0,
            'is_accepted'=>0)
        );
    }else if($book_status == 2){
        $listResponse = $this->User_model->driverbookings($driver_id);
    }else if($book_status ==3){
        $listResponse = $this->User_model->select_data('*','tbl_bookingRequests',array('accepted_by'=>$driver_id,'is_completed'=>1));
    }if($book_status ==4){
        $listResponse = $this->User_model->select_data('*','tbl_bookingRequests',array('accepted_by'=>$driver_id,'is_cancelled'=>1));
    }
    if(empty($listResponse)){
        $result = array(
            "controller" => "User",
            "action" => "list_driverBooking",
            "ResponseCode" => false,
            "MessageWhatHappen" => "No data found"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "list_driverBooking",
            "ResponseCode" => true,
            "MessageWhatHappen" => "Success",
            "listBookingResponse"=> $listResponse

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);

}


function addratings_post() {                                // add rating to driver or app by user

    $type = $this->input->post('type');
    $user_id =$this->input->post('user_id');
    $driver_id = $this->input->post('driver_id');
    $rating = $this->input->post('rating');
    $request_id = $this->input->post('request_id');
// $feedback = $this->input->post('feedback');
    $review = $this->input->post('review');
    if($type == 1){

        $select_data = $this->User_model->select_data('*','tbl_appRatings',array('user_id'=>$user_id));
        if(empty($select_data)){
            $insertArray = array(
                'user_id'=>$user_id,
                'rating'=>$rating,
                'review'=>$review,
                'date_created'=>date('Y-m-d H:i:s')
                );

            $ratingResponse = $this->User_model->insert_data('tbl_appRatings',$insertArray);
        }else{

            $message = "Rating already given";
            $ratingResponse = '';
        }
    }else if($type == 2){
        $select_data = $this->User_model->select_data('*','tbl_driverRatings',array(
            'user_id'=>$user_id,
            'driver_id'=>$driver_id,
            'request_id'=>$request_id
            ));
        if(empty($select_data)){

            $senderData = $this->User_model->userDetails($user_id);
            $userData =$this->User_model->selectLogin($driver_id);
            $pushData['message'] = "Rating by ".$senderData->fname .$senderData->lname;
            $pushData['action'] = "Rating";
            $pushData['profile_pic'] = $senderData->profile_pic;
            $pushData['req_id'] = '';
            $pushData['is_quote'] = '';
            $pushData['value'] = '';
            $pushData['Utype'] = 1;

            foreach ($userData as $pushVal) {
                $pushData['token'] = $pushVal->token_id;
                if($pushVal->device_id == 1){
                    $this->User_model->iosPush($pushData);
                }else if($pushVal->device_id == 0){
                    $this->User_model->androidPush($pushData);
                }
            }

            $insertArray = array(
                'user_id'=>$user_id,
                'driver_id'=>$driver_id,
                'rating'=>$rating,
                'request_id'=>$request_id,
                'date_created'=>date('Y-m-d H:i:s')
                );
            $ratingResponse = $this->User_model->insert_data('tbl_driverRatings',$insertArray);
        }else{

            $message = "Rating already given";
            $ratingResponse = '';
        }
    }

    if(empty($ratingResponse)){

        $result = array(
            "controller" => "User",
            "action" => "addratings",
            "ResponseCode" => false,
            "MessageWhatHappen" => $message

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "addratings",
            "ResponseCode" => true,
            "MessageWhatHappen" => "Rating added successfully"

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
}


public function getPeakHrs_post(){


    /*new ...................*/

    $time =$this->input->post('time');

    $var = $this->db->query("SELECT * FROM `tbl_peakHour` where 
        CASE WHEN `peak_hour_from` < `peak_hour_to`
        THEN
        '".$time."' between `peak_hour_from` and  `peak_hour_to`
        ELSE
        ('".$time."' between `peak_hour_from` and  '24:00:00')
        OR
        ('".$time."' between '00:00:00' and  `peak_hour_to`)
        END")->result();

//die;
//print_r($this->db->last_query()); die;
    $peakOutput = (empty($var))?"No":"yes";
    $peakPercentage = $this->User_model->select_data('peakHourCharge',"tbl_settings",array("id"=>1));

    $peakPercentageData = $peakPercentage[0]->peakHourCharge;
    $result = array(
        "controller" => "User",
        "action" => "addratings",
        "ResponseCode" => true,
        "PeakHrResponse" => array('isPeakHour'=>$peakOutput,
            'charge'=>$peakPercentageData
            )

        );
    $this->set_response($result, REST_Controller::HTTP_OK);
}

public function customerRating_post(){

    $insertArray = array(
        'driver_id'=>$this->input->post('driver_id'),
        'user_id'=>$this->input->post('user_id'),
        'rating'=>$this->input->post('rating'),
        'req_id'=>$this->input->post('req_id'),
        'date_created'=>date('Y-m-d H:i:s')
        );

    $customResponse = $this->User_model->insert_data('tbl_customerRatings',$insertArray);
    if(empty($customResponse)){

        $result = array(
            "controller" => "User",
            "action" => "customerRating",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Error in adding customer rating"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "customerRating",
            "ResponseCode" => true,
            "MessageWhatHappen" => "Customer rating added successfully"

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
}


public function updateWayPoints_post(){

    $req_id = $this->input->post('req_id');
    $user_id = $this->input->post('user_id');
    $message = $this->input->post('message');
    $wayPoints = $this->input->post('wayPoints');

    $uptDAta = $this->User_model->update_data('tbl_bookingRequests',array('wayPoints'=>$wayPoints),array('id'=>$req_id));


    $userLog = $this->User_model->select_data('*','tbl_login',array('user_id'=>$user_id,'status'=>1));

    $selectNoti = $this->User_model->select_data('*','tbl_users',array('id'=>$user_id));
    if($selectNoti[0]->smsNotificationStatus == 0){
        $msg = array('to'=>$selectNoti[0]->phone,'body'=>$message);
       // $this->twilioMessage($msg);
    }
    $pushData['message'] = $message;
    $pushData['spMessage'] = $message;
    $pushData['action'] = "Update WayPoints";
    $pushData['req_id'] = $req_id;
    $pushData['is_quote'] = '';
    $pushData['value'] = '';
    $pushData['Utype'] = 1;

    foreach ($userLog as $pushVal) {

        if($selectNoti[0]->notification_status == 0){
            $pushData['token'] = $pushVal->token_id;
            if($pushVal->device_id == 1){
                $this->User_model->iosPush($pushData);
            }else if($loginUsers->device_id == 0){
                $this->User_model->androidPush($pushData);
            }
        }

    }

    if(empty($uptDAta)){

        $result = array(
            "controller" => "User",
            "action" => "updateWayPoints",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Error in updating"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "updateWayPoints",
            "ResponseCode" => true,
            "MessageWhatHappen" => "Updated successfully"

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
}

public function getSubCategory_post(){                                      // fetch subCat based on cat Id
    $catId = $this->input->post('catId');
    $data = $this->User_model->select_data('*','tbl_subCategory',array('category_id'=>$catId));

    if(empty($data))

    {
        $result = array(
            "controller" => "User",
            "action" => "getSubCategory",
            "ResponseCode" => false,
            "MessageWhatHappen" => "No data found"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "getSubCategory",
            "ResponseCode" => true,
            "getSubCategoryResponse"=> $data

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
}


public function requestDetails_post(){                   // get details regarding particular request
    $req_id = $this->input->post('req_id');
    $driver_id = $this->input->post('user_id');

    $data = $this->User_model->select_data('*','tbl_bookingRequests',array('id'=>$req_id));
    $userPic =  $this->User_model->select_data('profile_pic','tbl_users',array('id'=>$data[0]->user_id));
    $getCatData = $this->User_model->select_data('categoryName,image','tbl_categories',array('id'=>$data[0]->category_id));
    $getSubCatData = $this->User_model->select_data('subCategoryName,image','tbl_subCategory',array('id'=>$data[0]->subCategory_id));
    $data[0]->catName = $getCatData[0]->categoryName;
    $data[0]->catImage = $getCatData[0]->image;
    $data[0]->subCatName = $getSubCatData[0]->subCategoryName;
    $data[0]->subCatImage = $getSubCatData[0]->image;
    $data[0]->user_pic = $userPic[0]->profile_pic;
    $data[0]->driverDetails =  $this->User_model->select_data('fname,lname,address,email,gender,phone,profile_pic','tbl_users',array('id'=>$data[0]->accepted_by));

    $data[0]->rating =  $this->User_model->select_data(
        'rating','tbl_driverRatings',array('user_id'=>$data[0]->user_id,'driver_id'=>$data[0]->accepted_by,'request_id'=>$req_id)
        );
    $ratingData =  $this->User_model->avgRating($data[0]->accepted_by);
    $data[0]->avgRating = (empty($ratingData->avg_r))?"":$ratingData->avg_r;
    $data[0]->ref_data = $this->User_model->select_data('accepted_time,started_time,completed_time,cancelled_time','tbl_moveHistory',array('req_id'=>$req_id));
    $ratCustData = $this->User_model->CustRating($data[0]->user_id,$req_id);
    $data[0]->customerRating = (empty($ratCustData->avg_r))?"":$ratCustData->avg_r;
    $data[0]->promoDetails= $this->User_model->select_data('*','tbl_promocodes',array('id'=>$data[0]->promo_codeId));
    if ( empty($this->User_model->select_data('id','tbl_pushQuotes',array('req_id'=>$req_id,'driver_id'=>$driver_id))) ) {
        $data[0]->pushQuoteDetails= 0;

    }else{
        $data[0]->pushQuoteDetails= 1;

    }
    if(empty($data))

    {
        $result = array(
            "controller" => "User",
            "action" => "requestDetails",
            "ResponseCode" => false,
            "MessageWhatHappen" => "No data found"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "requestDetails",
            "ResponseCode" => true,
            "requestDetailsResponse"=> $data,
            'server_time'=>date('Y-m-d H:i:s')

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
}

public function updateLocation_post(){                  // update driver location || can be used to update any user location
    $user_id = $this->input->post('user_id');
    $latitude = $this->input->post('latitude');
    $longitude = $this->input->post('longitude');
    $data = $this->User_model->update_data('tbl_users',array('latitude'=>$latitude,'longitude'=>$longitude),array('id'=>$user_id));

    if($data != 1)

    {
        $result = array(
            "controller" => "User",
            "action" => "updateLocation",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Not updated"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "updateLocation",
            "ResponseCode" => true,
            "MessageWhatHappen" => "Updated successfully"

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
}


public function getLocation_get(){                       // track driver location || can be used to get any user location
    $user_id = $this->input->get('user_id');

    $data = $this->User_model->select_data('latitude,longitude','tbl_users',array('id'=>$user_id));

    if(empty($data))

    {
        $result = array(
            "controller" => "User",
            "action" => "getLocation",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Not Found"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "getLocation",
            "ResponseCode" => true,
            "getLocationResponse" => $data

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
}



public function requestAction_post(){                               //action once move is created

    $req_id = $this->input->post('req_id');
    $driver_id = $this->input->post('driver_id');
    $type = $this->input->post('type');
    $cancelUser_type = $this->input->post('cancelUser_type');
    $totalPrice = $this->input->post('totalPrice');
    $add_price = $this->input->post('add_price');
    $booking_deduct_price = $this->input->post('booking_deduct_price');

    $bookingDetails = $this->User_model->select_data('is_accepted,is_started,is_completed,is_cancelled','tbl_bookingRequests',array('id'=>$req_id))[0];
// echo "<pre>"; print_r($bookingDetails); die;

if($type == 1){                                                                // is_accepted by driver

    if ($bookingDetails->is_accepted==1 || $bookingDetails->is_cancelled==1 || $bookingDetails->is_completed==1) {
        $result = array(
            "controller" => "User",
            "action" => "requestAction",
            "ResponseCode" => false,
            "ErrorCode" => 401,
            "bookingDetails" => $bookingDetails,
            "MessageWhatHappen" => "Move booked failed"
            );
        $this->set_response($result, REST_Controller::HTTP_OK);
        return true;
    } else {
        $data = $this->User_model->update_data('tbl_bookingRequests',array('is_accepted'=>1,'accepted_by'=>$driver_id),array('id'=>$req_id));
        $moveData = array(
            "driver_id"=>$driver_id,
            "status"=>1,
            'accepted_time'=>date('Y-m-d H:i:s')
            );
        $insertMove_history = $this->User_model->update_data('tbl_moveHistory',$moveData,array("req_id"=>$req_id));
        $action = "Move booked";
        $driverData = $this->User_model->userDetails($driver_id);
        $userData =$this->User_model->MoveUserlogin($req_id);
        $selectReqPhn = $this->User_model->select_data('*','tbl_users',array('id'=>$userData[0]->user_id));
        if($selectReqPhn[0]->smsNotificationStatus == 0){
            $msg = array('to'=>$selectReqPhn[0]->phone,'body'=>$driverData->fname.' '.$driverData->lname." has accepted your task request");
          //  $this->twilioMessage($msg);
        }
        $pushData['message'] = $driverData->fname.' '.$driverData->lname." has accepted your task request";
        $pushData['spMessage'] = $driverData->fname.' '.$driverData->lname." has accepted your task request";
        $pushData['action'] = "Move booked";
        $pushData['profile_pic'] = $driverData->profile_pic;
        $pushData['req_id'] = $req_id;
        $pushData['is_quote'] = '';
        $pushData['value'] = '';
        $pushData['Utype'] = 1;

        foreach ($userData as $pushVal) {
            if($pushVal->notification_status == 0){
                $pushData['token'] = $pushVal->token_id;
                if($pushVal->device_id == 1){
                    $this->User_model->iosPush($pushData);
                }else if($loginUsers->device_id == 0){
                    $this->User_model->androidPush($pushData);
                }
            }

        }
        $notificationUserArray = array(
            'user_id'=>$userData[0]->user_id,
            'messageNotification'=>'accepted',
            'req_id'=>$req_id,
            'user_type'=>0,
            'date_created'=>date('Y-m-d H:i:s')
            );
        $insertUserNotification = $this->User_model->insert_data('tbl_notifications',$notificationUserArray);

    }
}else if($type == 2){
    if ($bookingDetails->is_accepted==0 || $bookingDetails->is_started==1 || $bookingDetails->is_cancelled==1 || $bookingDetails->is_completed==1) {
        $result = array(
            "controller" => "User",
            "action" => "requestAction",
            "ResponseCode" => false,
            "ErrorCode" => 401,
            "bookingDetails" => $bookingDetails,
            "MessageWhatHappen" => "Move started failed"
            );
        $this->set_response($result, REST_Controller::HTTP_OK);
        return true;
    }else {
//is_started by driver
        $data = $this->User_model->update_data('tbl_bookingRequests',array('is_started'=>1),array('id'=>$req_id));
        $updateMove_history = $this->User_model->update_data('tbl_moveHistory',
            array('status'=>2,'started_time'=>date('Y-m-d H:i:s')),array('req_id'=>$req_id,'driver_id'=>$driver_id));
        $action = "Move started";
        $driverData = $this->User_model->userDetails($driver_id);
        $userData =$this->User_model->MoveUserlogin($req_id);
        $selectReqPhn = $this->User_model->select_data('*','tbl_users',array('id'=>$userData[0]->user_id));
        if($selectReqPhn[0]->smsNotificationStatus == 0){
            $msg = array('to'=>$selectReqPhn[0]->phone,'body'=>"Your task has started with ".$driverData->fname.' '.$driverData->lname);
           // $this->twilioMessage($msg);
        }
        $pushData['message'] = "Your task has started with ".$driverData->fname.' '.$driverData->lname;
        $pushData['spMessage'] = "Your task has started with ".$driverData->fname.' '.$driverData->lname;
        $pushData['action'] = "Move started";
        $pushData['profile_pic'] = $driverData->profile_pic;
        $pushData['req_id'] = $req_id;
        $pushData['is_quote'] = '';
        $pushData['value'] = '';
        $pushData['Utype'] = 1;
        foreach ($userData as $pushVal) {
            if($pushVal->notification_status == 0){
                $pushData['token'] = $pushVal->token_id;
                if($pushVal->device_id == 1){
                    $this->User_model->iosPush($pushData);
                }else if($loginUsers->device_id == 0){
                    $this->User_model->androidPush($pushData);
                }
            }
        }

        $notificationUserArray = array(
            'messageNotification'=>'started',
            'date_created'=>date('Y-m-d H:i:s')
            );
        $updateUserNotification = $this->User_model->update_data('tbl_notifications',$notificationUserArray,array('user_id'=>$userData[0]->user_id,'req_id'=>$req_id));

    }

}else if($type == 3){

    if ($bookingDetails->is_accepted==0 || $bookingDetails->is_started==0 || $bookingDetails->is_cancelled==1 || $bookingDetails->is_completed==1) {
        $result = array(
            "controller" => "User",
            "action" => "requestAction",
            "ResponseCode" => false,
            "ErrorCode" => 401,
            "bookingDetails" => $bookingDetails,
            "MessageWhatHappen" => "Move completed failed"
            );
        $this->set_response($result, REST_Controller::HTTP_OK);
        return true;
    }else {
// is_completed by driver
        $data = $this->User_model->update_data('tbl_bookingRequests',array('is_completed'=>1,'extra_fare'=>$add_price),array('id'=>$req_id));

        $updateMove_history = $this->User_model->update_data('tbl_moveHistory',array('status'=>3,'completed_time'=>date('Y-m-d H:i:s')),array('req_id'=>$req_id,'driver_id'=>$driver_id));

        $action = "Move completed";
        $driverData = $this->User_model->userDetails($driver_id);

        $userData =$this->User_model->MoveUserlogin($req_id);

        $selectReqPhn = $this->User_model->select_data('*','tbl_users',array('id'=>$userData[0]->user_id));

        if($selectReqPhn[0]->smsNotificationStatus == 0){
            $msg = array('to'=>$selectReqPhn[0]->phone,'body'=>"Your task with ".$driverData->fname.' '.$driverData->lname." has completed");
           // $this->twilioMessage($msg);
        }
        $getUser = $this->User_model->select_data('*','tbl_bookingRequests',array('id'=>$req_id));

        $promoDetails = $this->User_model->select_data('*','tbl_promocodes',array('id'=>$getUser[0]->promo_codeId));

        $get_percentage = $this->User_model->select_data('minBooking_charge','tbl_settings');

        $percentage = $get_percentage[0]->minBooking_charge;

        $getUserBalance = $this->User_model->select_data('*','tbl_wallet',array('user_id'=>$getUser[0]->user_id));

if(!empty($promoDetails)){      //with promo code

    if ($promoDetails[0]->type==0) {
        $promoAmount = $promoDetails[0]->value;
    }else if($promoDetails[0]->type==1){
        $dmAmount = $getUser[0]->totalprice + $add_price;
        $promoAmount = ($promoDetails[0]->value / 100) * $dmAmount;
    }

    if($totalPrice <=  $promoAmount){

// wont come in this scenarion || : For percentage: since its from total price so it would always be less and if in amount case,
//the promoamount may be greater than price then obviously no deduction from wallet of user
        $get_percentage = $this->User_model->select_data('minBooking_charge','tbl_settings');

        $percentage = $get_percentage[0]->minBooking_charge;
        $iniAmount  = ($percentage / 100) * $getUser[0]->totalprice;
        $newBal     = $getUserBalance[0]->balance + $iniAmount;

//transaction data insert
        $transUserArray = array(
            'amount_credited'=>$iniAmount,
            'user_id'=>$getUser[0]->user_id,
            'txnId'=>'refund',
            'date_created'=>date('Y-m-d H:i:s')
            );
        $transResponse = $this->User_model->insert_data('tbl_transactions',$transUserArray);

        /*add Report start*/
        $addReport = array(
            'fromUser_id'=>$getUser[0]->user_id,
            'toUser_id'  =>$req_id,
            'amount'     =>$iniAmount,
            'type'       =>6
            );
        $addReport1 = $this->User_model->insert_data('tbl_reports',$addReport);

        /*add Report end*/

        $uptDAta = $this->User_model->update_data('tbl_wallet',array('balance'=>$newBal,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$getUser[0]->user_id));

    }else if($totalPrice >  $promoAmount){
// print_r($dmAmount);
// print_r($totalPrice);

        $deductAmount = $totalPrice - $promoAmount;
        $upt = $deductAmount;
        $newBal = $getUserBalance[0]->balance - $deductAmount;
$uptDAta = $this->User_model->update_data('tbl_wallet',array('balance'=>$newBal,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$getUser[0]->user_id)); // in user
//transaction data insert
$transUserArray = array(
    'amount_debited'=>$upt,
    'user_id'=>$getUser[0]->user_id,
    'txnId'=>'from_wallet',
    'date_created'=>date('Y-m-d H:i:s')
    );
$transResponse = $this->User_model->insert_data('tbl_transactions',$transUserArray);
/*add Report start*/

$addReport = array(
    'fromUser_id'=>$getUser[0]->user_id,
    'toUser_id'=>$req_id,
    'amount'=>$upt,
    'type'=>6
    );
$addReport1 = $this->User_model->insert_data('tbl_reports',$addReport);

/*add Report end*/
}
}
else{
// without promo code

    $getBalance = $this->User_model->select_data('*','tbl_wallet',array('user_id'=>$getUser[0]->user_id));
    $newAmount = $getBalance[0]->balance - $totalPrice;
    $upt = $totalPrice;
$uptDAta = $this->User_model->update_data('tbl_wallet',array('balance'=>$newAmount,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$getUser[0]->user_id)); // in user


//transaction data insert
$transUserArray = array(
    'amount_debited'=>$upt,
    'user_id'=>$getUser[0]->user_id,
    'txnId'=>'from_wallet',
    'date_created'=>date('Y-m-d H:i:s')
    );
$transResponse = $this->User_model->insert_data('tbl_transactions',$transUserArray);
/*add Report start*/

$addReport = array(
    'fromUser_id'=>$getUser[0]->user_id,
    'toUser_id'=>$req_id,
    'amount'=>$upt,
    'type'=>7
    );
$addReport1 = $this->User_model->insert_data('tbl_reports',$addReport);

/*add Report end*/

}
$pushData['message'] = "Your task with ".$driverData->fname.' '.$driverData->lname." has completed";
$pushData['spMessage'] = "Your task with ".$driverData->fname.' '.$driverData->lname." has completed";
$pushData['action'] = "Move completed";
$pushData['profile_pic'] = $driverData->profile_pic;
$pushData['req_id'] = $req_id;
$pushData['is_quote'] = '';
$pushData['value'] = '';
$pushData['Utype'] = 1;
foreach ($userData as $pushVal) {
    if($pushVal->notification_status == 0){
        $pushData['token'] = $pushVal->token_id;
        if($pushVal->device_id == 1){
            $this->User_model->iosPush($pushData);
        }else if($loginUsers->device_id == 0){
            $this->User_model->androidPush($pushData);
        }
    }
}
// get admin commission  yet no admin scenario
// $get_comPercentage = $this->User_model->select_data('admin_commission','tbl_settings');
// $percentage = $get_comPercentage[0]->admin_commission;
// $addAmount = ($percentage / 100) * $message['totalprice'];


$getServiceBalance = $this->User_model->select_data('*','tbl_wallet',array('user_id'=>$driver_id));
$newSerAmount = $getServiceBalance[0]->balance + $totalPrice + $booking_deduct_price;
$uptServiceData = $this->User_model->update_data('tbl_wallet',array('balance'=>$newSerAmount,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$driver_id));

// $TotalPrice = $totalPrice + $booking_deduct_price;
$transServiceArray = array(
    'amount_credited'=>$totalPrice + $booking_deduct_price,
    'user_id'=>$driver_id,
    'txnId'=>'from_wallet',
    'date_created'=>date('Y-m-d H:i:s')
    );
$transServiceResponse = $this->User_model->insert_data('tbl_transactions',$transServiceArray);


/*add Report start*/

$addReport = array(
    'fromUser_id'=>$getUser[0]->user_id,
    'toUser_id'=>$req_id,
    'amount'=>$totalPrice + $booking_deduct_price,
    'type'=>7
    );
$addReport1 = $this->User_model->insert_data('tbl_reports',$addReport);
/*add Report end*/

$notificationUserArray = array(
    'messageNotification'=>'completed',
    'date_created'=>date('Y-m-d H:i:s')
    );
$updateUserNotification = $this->User_model->update_data('tbl_notifications',$notificationUserArray,array('user_id'=>$userData[0]->user_id,'req_id'=>$req_id));
$selectEmail   = $this->User_model->select_data('email,fname,lname','tbl_users',array('id'=>$getUser[0]->user_id));
$driverDetail  = $this->User_model->select_data('email,fname,lname','tbl_users',array('id'=>$driver_id));
$rideHist      = $this->User_model->select_data('*','tbl_moveHistory',array('req_id'=>$req_id));

//Get values of services
$services = $getUser[0]->services;
$services=json_decode($services);
// echo "<pre>"; print_r($services);
$ServiceTotalprice = 0;
foreach($services as $keys => $values){
    $ServiceTitle = $values->ServiceTitle;
    $ServiceType  = $values->ServiceType;
    $ServiceValue = $values->value;
    $ServicePrice = $values->price;
    $ServiceTotalprice += $values->totalprice;
}

//Total Fare calculations
$promoCodeId = $getUser[0]->promo_codeId;
$extraFare   = $getUser[0]->extra_fare;


//edit this

$estimatedPrice = $getUser[0]->estimatedprice;
$acceptedPrice  = $getUser[0]->acceptedPrice;
$is_quote       = $getUser[0]->is_quote;
$promoCodeType  = $promoDetails[0]->type;
$promoCode      = $promoDetails[0]->promo_code;
$promoCodeValue = $promoDetails[0]->value;

$estimate_fare  = $estimatedPrice - $ServiceTotalprice;

$After_Hour     =$this->User_model->select_data('AfterHourCharge','tbl_settings');
if($is_quote == 0){
    $estimateFare = $estimatedPrice;
}else{
    $estimateFare = $acceptedPrice;
}
$afterHourCharge  = ($After_Hour[0]->AfterHourCharge / 100) * $estimateFare;
$TotalFare        = $extraFare + $afterHourCharge + $estimateFare;
$AmountDeducted=0;

// echo "<pre>"; print_r($promoCodeId);
if($promoCodeId = 0){
    $AmountDeducted = $TotalFare;
}else{
    $promodiscount  = ($promoCodeType == 0)?$promoCodeValue:($TotalFare*($promoCodeValue/100));
    $AmountDeducted = $TotalFare > $promodiscount ? ($TotalFare - $promodiscount) . "" : "$0";
    $AmountDeductedMessage = ($promoCodeType == 0) ? "You applied promo code (" . $promoCode . "). You got $" .
    $promoCodeValue . " discount on this task."
    : "You applied promo code (" .  $promoCode . "). You got " . $promoCodeValue . "% discount on this task.";
}

// $After_Hour  = $this->User_model->select_data('*','tbl_settings');
// echo "<pre>"; print($After_Hour); die;
// echo "<pre>"; print_r($promoCodeId);die;
$row1='';
if($promoCodeId != 0){
    $row1 .=' <tr>
    <td class="boder_bottom">
    <table width="100%">
    <tr class="total">
    <td width="50%">
    <h4>Amount Deducted</h4>
    </td>
    <td width="50%">
    <p>'.$AmountDeducted.'</p>
    </td>
    </tr>
    </table>
    </td>
    </tr>

    <tr>
    <td class="boder_bottom">
    <table width="100%">
    <tr class="total">
    <td width="50%">
    <h4>Message</h4>
    </td>
    <td width="50%">
    <p>'.$AmountDeductedMessage.'</p>
    </td>
    </tr>
    </table>
    </td>
    </tr>

    ';}
    $row = '';
    $ServiceTotalpriceSum = 0;
    foreach($services as $keys => $values){
        $ServiceTitl = $values->ServiceTitle;
        $ServiceType = $values->ServiceType;
        $ServiceValu = $values->value;
        $ServicePrice = $values->price;
        $ServiceTotalpric = $values->totalprice;
        $ServiceTotalpriceSum += $values->totalprice;


        $row .= ' <tr>
        <td class="boder_bottom">
        <table width="100%">
        <tr class="total">
        <td width="50%">
        <h4>'.$ServiceValu .' '.$ServiceTitl.'</h4>
        </td>
        <td width="50%">
        <p>'.$ServiceTotalpric.'</p>
        </td>
        </tr>
        </table>
        </td>
        </tr>';

    }
    $totalestiamtefare = $ServiceTotalpriceSum + $estimate_fare;
    $total_fare = $acceptedPrice + $extraFare + $totalestiamtefare;



// $email = 'osvinphp@gmail.com';             /*  Testing account */
    $email = $selectEmail[0]->email;              /* To regular customer */
    $body = '<!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Email template</title>

    <style type="text/css">
    .table_width {
        width: 600px;
        margin: 0px auto;
        float: none;
    }
    .map img {
        width: 100%;
    }
    .logo {
        float: right;
        padding: 0px 10px 0 0px;
        margin: 0px;
    }
    .headings h1 {
        color: #5c5c5c;
        font-size: 30px;
        margin: 0;
        padding: 0;
        font-weight: 600;
    }
    .headings h4 {
        color: #727272;
        font-size: 17px;
        line-height: 31px;
        margin: 0;
        padding: 4px 0 0;
        font-weight: normal;
    }
    .headings {
        border-bottom: 1px solid #eeeeee;
        padding: 0 0px 15px;
    }
    .timing {
        background: #f6f6f6 none repeat scroll 0 0;
        padding: 5px 17px;
    }
    .timing h3 {
        color: #5c5c5c;
        font-size: 20px;
        margin: 0;
        padding: 11px 0 0;
        font-weight: 500;
    }
    .timing span {
        color: #434343;
        float: right;
        font-size: 14px;
        font-weight: normal;
        padding: 14px 11px 2px;
    }
    .profile img {
        width: 60%;
        padding: 20px 11px;
    }
    .go_with h5 {
        color: #848484;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        padding: 0;
    }
    .go_with h5 span {
        color: #333;
    }
    .rating {
        background: #f6f6f6;
        padding: 0px;
        width: 80%;
        margin: 0px auto;
    }
    .rating p {
        color: #727272;
        font-size: 17px;
        margin: 0;
        padding: 14px 10px;
    }
    .discription p {
        margin: 0px;
        padding: 0 0 0 12px;
        line-height: 31px;
        font-size: 14px;
        color: #727272;
        font-weight: normal;
    }
    .boder_bottom {
        border-bottom: 1px solid #eeeeee;
        padding: 0 0 10px;
    }
    .fare h3 {
        color: #000;
        font-size: 18px;
        line-height: 31px;
        margin: 0;
        padding: 13px 0 0;
        font-weight: normal;
    }
    .base_fare h4 {
        color: #848484;
        font-size: 16px;
        font-weight: normal;
        margin: 0;
        padding: 10px 0;
    }
    .base_fare p {
        color: #848484;
        font-size: 16px;
        font-weight: normal;
        margin: 0;
        padding: 10px 0;
        text-align: right;
    }
    .total h4 {
        color: #000;
        font-size: 18px;
        line-height: 31px;
        margin: 0;
        padding: 3px 0 0;
        font-weight: normal;
    }
    .total p {
        color: #000;
        font-size: 16px;
        font-weight: normal;
        margin: 0;
        padding: 16px 0;
        text-align: right;
    }
    .copy_right {
        background: #2b92df none repeat scroll 0 0;
        margin: 0;
        padding: 3px 0 0;
        text-align: center;
    }
    .copy_right > p {
        color: #ffffff;
        font-size: 18px;
        padding: 0px 0 0;
        text-align: center;
    }
    </style>
    </head>

    <body style="font-family: "Roboto", sans-serif;">

    <div class="table_width">
    <table cellpading="0" cellspacing="0" border="0" style="width:600px; margin:0px auto;">

    <tr>
    <th class="map"><img src="http://kudosfind.com/Admin/application/img/map.jpg" alt="">
    </th>
    </tr>

    <tr>
    <td class="logo"><img src="http://kudosfind.com/Admin/application/img/logo.png" alt="#">
    </td>
    </tr>

    <tr>
    <td class="headings">
    <h1>$ '.$estimate_fare.'</h1>
    <h4>Thanks for choosing kudos, '.$selectEmail[0]->fname.'</h4>
    <h4>'.date("M d,Y").'</h4>

    </td>

    </tr>

    <tr>
    <td class="timing">
    <h3>'.$rideHist[0]->started_time.'<span>'.$getUser[0]->pickup_location.'</span></h3>
    </td>
    </tr>
    <tr>
    <td class="timing">
    <h3>'.$rideHist[0]->completed_time.'<span>'.$getUser[0]->dropOff_location.'</span></h3>
    </td>
    </tr>

    <tr>
    <td>
    <table>
    <td width="30%" class="profile"><img src="http://kudosfind.com/Admin/application/img/profile.png" alt="#">
    </td>
    <td class="go_with" vertical-align="top" width="70%">

    <table width="100%">
    <tr>
    <td>
    <h5>You Rode with '.$driverDetail[0]->fname.'</h5>
    </td>
    </tr>
    </table>
    </td>
    </table>
    </td>
    </tr>



    <tr>
    <td class="boder_bottom fare">
    <h3>Your Fare</h3>
    </td>
    </tr>

    <tr>
    <td>
    <table width="100%">
    <tr class="base_fare">
    <td width="50%">
    <h4>Base fare</h4>
    </td>
    <td width="50%">
    <p>'.$estimate_fare.'</p>
    </td>
    </tr>
    </table>
    </td>
    </tr>'.$row.'<tr>
    <td class="boder_bottom">
    <table width="100%">
    <tr class="total">
    <td width="50%">
    <h4>Estimate Total Fare</h4>
    </td>
    <td width="50%">
    <p>'.$totalestiamtefare.'</p>
    </td>
    </tr>
    </table>
    </td>
    </tr>


    <tr>
    <td class="boder_bottom">
    <table width="100%">
    <tr class="total">
    <td width="50%">
    <h4>WayPoint Fare</h4>
    </td>
    <td width="50%">
    <p>'.$getUser[0]->waypointfare.'</p>
    </td>
    </tr>
    </table>
    </td>
    </tr>
    <tr>
    <td class="boder_bottom">
    <table width="100%">
    <tr class="total">
    <td width="50%">
    <h4>Extra Fare</h4>
    </td>
    <td width="50%">
    <p>'.$extraFare.'</p>
    </td>
    </tr>
    </table>
    </td>
    </tr>

    <tr>
    <td class="boder_bottom">
    <table width="100%">
    <tr class="total">
    <td width="50%">
    <h4>After Hour Charge</h4>
    </td>
    <td width="50%">
    <p>'.$acceptedPrice.'</p>
    </td>
    </tr>
    </table>
    </td>
    </tr>

    <tr>
    <td class="boder_bottom">
    <table width="100%">
    <tr class="total">
    <td width="50%">
    <h4>Total Fare</h4>
    </td>
    <td width="50%">
    <p>'.$total_fare.'</p>
    </td>
    </tr>
    </table>
    </td>
    </tr>'.$row1.'<tr>
    <td class="copy_right">
    <p>Copyright &copy; 2017 KUDOSFIND All rights reserved. </p>
    </td>
    </tr>




    </table>
    </div>
    </body>

    </html>';

    $this->email->set_newline("\r\n");
    $this->email->from('support@kudosfind.com', 'KudosFind');
    $this->email->to($email);
    $this->email->subject('Request Completed');
    $this->email->message($body);
    $this->email->send();

}


}
else if($type == 4){
    if ($bookingDetails->is_started==1 || $bookingDetails->is_cancelled==1 || $bookingDetails->is_completed==1) {
        $result = array(
            "controller"   => "User",
            "action"       => "requestAction",
            "ResponseCode" => false,
            "ErrorCode"    => 401,
            "bookingDetails" => $bookingDetails,
            "MessageWhatHappen" => "Move cancelled failed"
            );
        $this->set_response($result, REST_Controller::HTTP_OK);
        return true;
    }else {
if($cancelUser_type == 1){      // is_cancelled by driver

    $updateMove_history = $this->User_model->update_data('tbl_moveHistory',array('status'=>4,'cancelled_time'=>date('Y-m-d H:i:s'),'cancelled_by'=>1),array('req_id'=>$req_id,'driver_id'=>$driver_id));

    $driverData = $this->User_model->userDetails($driver_id);
    $userData =$this->User_model->MoveUserlogin($req_id);
    $selectReqPhn = $this->User_model->select_data('*','tbl_users',array('id'=>$userData[0]->user_id));
    if($selectReqPhn[0]->smsNotificationStatus == 0){
        $msg = array('to'=>$selectReqPhn[0]->phone,'body'=>$driverData->fname.' '.$driverData->lname." has cancelled your task request");
       // $this->twilioMessage($msg);
    }
    $getUser = $this->User_model->select_data('user_id','tbl_bookingRequests',array('id'=>$req_id));
    $pushData['message'] = $driverData->fname.' '.$driverData->lname." has cancelled your task request";
    $pushData['spMessage'] = $driverData->fname.' '.$driverData->lname." has cancelled your task request";
    $pushData['action'] = "Move cancelled";
    $pushData['profile_pic'] = $driverData->profile_pic;
    $pushData['req_id'] = $req_id;
    $pushData['is_quote'] = '';
    $pushData['value'] = '';
    $pushData['Utype'] = 1;
    foreach ($userData as $pushVal) {
        if($pushVal->notification_status == 0){
            $pushData['token'] = $pushVal->token_id;
            if($pushVal->device_id == 1){
                $this->User_model->iosPush($pushData);
            }else if($loginUsers->device_id == 0){
                $this->User_model->androidPush($pushData);
            }
        }
    }


    $getBalance = $this->User_model->select_data('*','tbl_wallet',array('user_id'=>$driver_id));
    $get_percentage = $this->User_model->select_data('driverCancellation_charge','tbl_settings');
    $percentage = $get_percentage[0]->driverCancellation_charge;
    $dedAmount = ($percentage / 100) * $totalPrice;

    $newAmount = $getBalance[0]->balance - $dedAmount;

    $uptDAta = $this->User_model->update_data('tbl_wallet',array('balance'=>$newAmount,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$getUser[0]->user_id));


    $addtransArray = array(
        'amount_debited'=>$dedAmount,
        'user_id'=>$getUser[0]->user_id,
        'txnId'=>'ride_cancelled_refund',        // Changed from "refund" to "ride_cancelled_refund"
        'date_created'=>date('Y-m-d H:i:s')
        );
    $addtrans = $this->User_model->insert_data('tbl_transactions',$addtransArray);

    /*add Report start*/

    $addReport = array(
        'fromUser_id'=>$getUser[0]->user_id,
        'toUser_id'  =>$req_id,
        'amount'     =>$dedAmount,
        'type'       => 8
        );
    $addReport1 = $this->User_model->insert_data('tbl_reports',$addReport);

    /*add Report end*/

    $notificationUserArray = array(
        'messageNotification'=>'cancelled',
        'date_created'=>date('Y-m-d H:i:s')
        );
    $updateUserNotification = $this->User_model->update_data('tbl_notifications',$notificationUserArray,array('user_id'=>$getUser[0]->user_id,'req_id'=>$req_id));


}else if($cancelUser_type == 2) {       // is_cancelled by user



    $updateMove_history = $this->User_model->update_data('tbl_moveHistory',array('status'=>4,'cancelled_time'=>date('Y-m-d H:i:s'),'cancelled_by'=>2),array('req_id'=>$req_id));
    $getBookingData1  = $this->User_model->select_data('*','tbl_bookingRequests',array('id'=>$req_id));

    if($getBookingData1[0]->is_accepted != 0){

        $driver_id = $getBookingData1[0]->accepted_by;
        $myData = $this->User_model->customUserTo_driver($req_id,$driver_id);
        $selectReqPhn = $this->User_model->select_data('*','tbl_users',array('id'=>$driver_id));
        if($selectReqPhn[0]->smsNotificationStatus == 0){
            $msg = array('to'=>$selectReqPhn[0]->phone,'body'=>"Task has been cancelled by ".$myData['sender']->fname.' '.$myData['sender']->lname);
           // $this->twilioMessage($msg);
        }
        $pushData['message'] = "Task has been cancelled by ".$myData['sender']->fname.' '.$myData['sender']->lname;
        $pushData['spMessage'] = "Task has been cancelled by ".$myData['sender']->fname.' '.$myData['sender']->lname;
        $pushData['action'] = "Move cancelled";
        $pushData['profile_pic'] = $myData['sender']->profile_pic;
        $pushData['req_id'] = $req_id;
        $pushData['is_quote'] = '';
        $pushData['value'] = '';
        $pushData['Utype'] = 2;
        foreach ($myData['reciever'] as $pushVal) {

            $pushData['token'] = $pushVal->token_id;
            if($pushVal->device_id == 1){
                $this->User_model->iosPush($pushData);
            }else if($loginUsers->device_id == 0){
                $this->User_model->androidPush($pushData);
            }
        }

        $getjobTime = $this->User_model->jobTime($req_id);
        $getBalance = $this->User_model->select_data('*','tbl_wallet',array('user_id'=>$driver_id));
        $thisTime = date('Y-m-d H:i:s');
        $bookingTime =  $getjobTime->booking_date.' '.$getjobTime->booking_time;
// $cancelTime = new DateTime($thisTime);
// $bookingDateTime = new DateTime($bookingTime);
//$diff = $cancelTime->diff($bookingDateTime);
        $interval = round((strtotime($bookingTime) - strtotime($thisTime))/3600, 1);

        $get_percentageHours = $this->User_model->select_data('minBooking_charge,userCancellation_hours','tbl_settings');

        $getBookingData  = $this->User_model->select_data('*','tbl_moveHistory',array('req_id'=>$req_id));
// $getBookingData1  = $this->User_model->select_data('*','tbl_bookingRequests',array('id'=>$req_id));

        if($getBookingData1[0]->is_accepted == 0){

            $percentage = $get_percentageHours[0]->minBooking_charge;
            $bookAmount = ($percentage / 100) * $myData['bookings']->totalprice;

            $newAmount = $getBalance[0]->balance + $bookAmount;


            $uptDAta = $this->User_model->update_data('tbl_wallet',array('balance'=>$newAmount,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$getBookingData1[0]->user_id));
            $addtransArray = array(
                'amount_credited'=>$bookAmount,
                'user_id'=>$getBookingData1[0]->user_id,
                'txnId'=>'ride_cancelled_refund',    // Changed from "refund" to "ride_cancelled_refund"
                'date_created'=>date('Y-m-d H:i:s')
                );
            $addtrans = $this->User_model->insert_data('tbl_transactions',$addtransArray);

            /*add Report start*/

            $addReport = array(
                'fromUser_id'=>$getBookingData1[0]->user_id,
                'toUser_id'=>$req_id,
                'amount'=>$bookAmount,
                'type'=>9
                );
            $addReport1 = $this->User_model->insert_data('tbl_reports',$addReport);

            /*add Report end*/


        }else{

            if($interval > $get_percentageHours[0]->userCancellation_hours){

                $percentage = $get_percentageHours[0]->minBooking_charge;
                $bookAmount = ($percentage / 100) * $myData['bookings']->totalprice;

                $newAmount = $getBalance[0]->balance + $bookAmount;


                $uptDAta = $this->User_model->update_data('tbl_wallet',array('balance'=>$newAmount,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$getBookingData1[0]->user_id));
                $addtransArray = array(
                    'amount_credited'=>$bookAmount,
                    'user_id'=>$getBookingData1[0]->user_id,
                    'txnId'=>'ride_cancelled_refund',               // Changed from "refund" to "ride_cancelled_refund"
                    'date_created'=>date('Y-m-d H:i:s')
                    );
                $addtrans = $this->User_model->insert_data('tbl_transactions',$addtransArray);
                /*add Report start*/

                $addReport = array(
                    'fromUser_id'=>$getBookingData1[0]->user_id,
                    'toUser_id'=>$req_id,
                    'amount'=>$bookAmount,
                    'type'=>9
                    );
                $addReport1 = $this->User_model->insert_data('tbl_reports',$addReport);

                /*add Report end*/

            }

        }

    }else{


        $driver_id = $getBookingData1[0]->accepted_by;
        $myData = $this->User_model->customUserTo_driver($req_id,$driver_id);
        $selectReqPhn = $this->User_model->select_data('*','tbl_users',array('id'=>$driver_id));
/*                    if($selectReqPhn[0]->smsNotificationStatus == 0){
$msg = array('to'=>$selectReqPhn[0]->phone,'body'=>"Task has been cancelled by ".$myData['sender']->fname.' '.$myData['sender']->lname);
$this->twilioMessage($msg);
}
$pushData['message'] = "Task has been cancelled by ".$myData['sender']->fname.' '.$myData['sender']->lname;
$pushData['spMessage'] = "Task has been cancelled by ".$myData['sender']->fname.' '.$myData['sender']->lname;
$pushData['action'] = "Move cancelled";
$pushData['profile_pic'] = $myData['sender']->profile_pic;
$pushData['req_id'] = $req_id;
$pushData['is_quote'] = '';
$pushData['value'] = '';
$pushData['Utype'] = 2;
foreach ($myData['reciever'] as $pushVal) {

$pushData['token'] = $pushVal->token_id;
if($pushVal->device_id == 1){
$this->User_model->iosPush($pushData);
}else if($loginUsers->device_id == 0){
$this->User_model->androidPush($pushData);
}
}*/

$getjobTime = $this->User_model->jobTime($req_id);
$getBalance = $this->User_model->select_data('*','tbl_wallet',array('user_id'=>$getBookingData1[0]->user_id));
$thisTime = date('Y-m-d H:i:s');
$bookingTime =  $getjobTime->booking_date.' '.$getjobTime->booking_time;
// $cancelTime = new DateTime($thisTime);
// $bookingDateTime = new DateTime($bookingTime);
//$diff = $cancelTime->diff($bookingDateTime);
$interval = round((strtotime($bookingTime) - strtotime($thisTime))/3600, 1);


$get_percentageHours = $this->User_model->select_data('minBooking_charge,userCancellation_hours','tbl_settings');



$getBookingData  = $this->User_model->select_data('*','tbl_moveHistory',array('req_id'=>$req_id));
// $getBookingData1  = $this->User_model->select_data('*','tbl_bookingRequests',array('id'=>$req_id));
/*print_r($getBookingData1); die;*/
if($getBookingData1[0]->is_accepted == 0){

    $percentage = $get_percentageHours[0]->minBooking_charge;
    $bookAmount = ($percentage / 100) * $myData['bookings']->totalprice;

    $newAmount = $getBalance[0]->balance + $bookAmount;


    $uptDAta = $this->User_model->update_data('tbl_wallet',array('balance'=>$newAmount,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$getBookingData1[0]->user_id));

    $addtransArray = array(
        'amount_credited'=>$bookAmount,
        'user_id'=>$getBookingData1[0]->user_id,
        'txnId'=>'ride_cancelled_refund',       // Changed from "refund" to "ride_cancelled_refund"
        'date_created'=>date('Y-m-d H:i:s')
        );
    $addtrans = $this->User_model->insert_data('tbl_transactions',$addtransArray);

    /*add Report start*/

    $addReport = array(
        'fromUser_id'=>$getBookingData1[0]->user_id,
        'toUser_id'=>$req_id,
        'amount'=>$bookAmount,
        'type'=>9
        );
    $addReport1 = $this->User_model->insert_data('tbl_reports',$addReport);

    /*add Report end*/

}else{

    if($interval > $get_percentageHours[0]->userCancellation_hours){

        $percentage = $get_percentageHours[0]->minBooking_charge;
        $bookAmount = ($percentage / 100) * $myData['bookings']->totalprice;

        $newAmount = $getBalance[0]->balance + $bookAmount;


        $uptDAta = $this->User_model->update_data('tbl_wallet',array('balance'=>$newAmount,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$getBookingData1[0]->user_id));
        $addtransArray = array(
            'amount_credited'=>$bookAmount,
            'user_id'=>$getBookingData1[0]->user_id,
            'txnId'=>'ride_cancelled_refund',     // Changed from "refund" to "ride_cancelled_refund"
            'date_created'=>date('Y-m-d H:i:s')
            );
        $addtrans = $this->User_model->insert_data('tbl_transactions',$addtransArray);
        /*add Report start*/

        $addReport = array(
            'fromUser_id'=>$getBookingData1[0]->user_id,
            'toUser_id'=>$req_id,
            'amount'=>$bookAmount,
            'type'=>9
            );
        $addReport1 = $this->User_model->insert_data('tbl_reports',$addReport);

        /*add Report end*/

    }

}
}
}
$notificationArray = array(
    'messageNotification'=>'cancelled',
    'date_created'       =>date('Y-m-d H:i:s')
    );

$updateNotification = $this->User_model->update_data('tbl_notifications',$notificationArray,array('req_id'=>$req_id));


$action = "Move cancelled";
$data = $this->User_model->update_data('tbl_bookingRequests',array(
    'is_cancelled'=>1,
    'is_accepted'=>0,
    'is_started'=>0,
    'is_completed'=>0
    ),array('id'=>$req_id));

}
}
if($data != 1){
    $result = array(
        "controller" => "User",
        "action" => "requestAction",
        "ResponseCode" => false,
        "MessageWhatHappen" => "Not updated"

        );
}else{
    $result = array(
        "controller" => "User",
        "action" => "requestAction",
        "ResponseCode" => true,
        "MessageWhatHappen" => $action." successfully"

        );
}
$this->set_response($result, REST_Controller::HTTP_OK);
}


/* Chat module start */

public function chat_post(){                                     // send message

    $message = array(
        'req_id'=> $this->input->post('req_id'),
        'from_id'=> $this->input->post('from_id'),
        'to_id'=> $this->input->post('to_id'),
        'message'=> $this->input->post('message'),
        'date_created'=>date('Y-m-d H:i:a')
        );
    $fromdata = $this->User_model->select_data('*','tbl_users',array('id'=>$message['from_id']));
    $todata = $this->User_model->select_data('*','tbl_users',array('id'=>$message['to_id']));
    $message['fromUser_type'] = $fromdata[0]->user_type;
    $message['toUser_type'] = $todata[0]->user_type;
    $pushData['Utype'] = ($todata[0]->user_type == 2)?2:1;
    $toLoginData =$this->User_model->selectLogin($message['to_id']);
    $pushData['message'] = $message['message'];
    $pushData['action'] = "chat";
    $pushData['from_name'] = $fromdata[0]->fname.''.$fromdata[0]->lname;
    $pushData['profile_pic'] = $fromdata[0]->profile_pic;
    $pushData['req_id'] = $message['req_id'];
    $pushData['is_quote'] = '';
    $pushData['value'] = '';
    $pushData['from_id'] = $message['from_id'];
    $pushData['spMessage'] = "You have recieved a message from ".$fromdata[0]->fname.''.$fromdata[0]->lname;
    foreach ($toLoginData as $pushVal) {
        $pushData['token'] = $pushVal->token_id;
        if($pushVal->device_id == 1){
            $this->User_model->iosPush($pushData);
        }else if($loginUsers->device_id == 0){
            $this->User_model->androidPush($pushData);
        }
    }

    $data = $this->User_model->insert_data('tbl_chat',$message);

    if(empty($data)){
        $result = array(
            "controller" => "User",
            "action" => "chat",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Message not send"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "chat",
            "ResponseCode" => true,
            "MessageWhatHappen" => "Message send successfully"

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
}


public function listChat_post(){                                             // chat between service provider and user
    $message = array(
        'req_id'=> $this->input->post('req_id'),
        'from_id'=> $this->input->post('from_id'),
        'to_id'=> $this->input->post('to_id')
        );

    $data = $this->User_model->customChat_list($message);

    if(empty($data))

    {
        $result = array(
            "controller" => "User",
            "action" => "listChat",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Not Found"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "listChat",
            "ResponseCode" => true,
            "getLocationResponse" => $data

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
}

/* Chat module finish */


public function listNotifications_post(){                                   // all user notifications dnt update

    $user_id = $this->input->post('user_id');

    $data = $this->User_model->select_data('*','tbl_notifications',array('user_id'=>$user_id));

    if(empty($data))

    {
        $result = array(
            "controller" => "User",
            "action" => "listNotifications",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Not Found"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "listNotifications",
            "ResponseCode" => true,
            "notificationResponse" => $data

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);
}

public function add_card_post(){
    $message = array(
        'user_id'=> $this->input->post('user_id'),
        'token_id'=> $this->input->post('token_id'),
        'card_no'=> $this->input->post('card_no'),
        'isDefault'=> $this->input->post('is_default'),
        'date_created'=>date('Y-m_d H:i:s')
        );
    $check_card = $this->User_model->select_data('*','tbl_stripeCustomer_details',array('card_no',$message['card_no']));
    if(empty($check_card)){
// Stripe\Stripe::setApiKey("sk_test_Lg9DUblnqYKJTdzU9YSAUS0n");
        $customer = \Stripe\Customer::create(array(
            "source" => $message['token_id'],
            "description" => "work")
        );

        $insData = array(
            'user_id'=>$message['user_id'],
            'card_no'=>$message['card_no'],
            'customer_id'=>$customer->id,
            'is_default'=>$message['isDefault'],
            'date_created'=>date('Y-m_d H:i:s')
            );
//$customer_id = $customer->id;
        $insertdata = $this->User_model->insert_data('tbl_stripeCustomer_details',$insData);
        $data = $this->User_model->insert_data('tbl_cardDetails',$message);

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
            "MessageWhatHappen" => "Card already added"

            );
    }

    $this->set_response($result, REST_Controller::HTTP_OK);
}


public function add_money_post(){
    $message = array(
        'user_id'=> $this->input->post('user_id'),
        'card_no'=> $this->input->post('card_no'),
        'date_created'=>date('Y-m_d H:i:s')
        );
    $amount= $this->input->post('amount');
    $check_card = $this->User_model->selectmoney_data($message);

    if(!empty($check_card)){
//Stripe\Stripe::setApiKey("sk_test_Lg9DUblnqYKJTdzU9YSAUS0n");
//print_r($check_card); die;
$stripeAmount = $amount * 100;    // Since the amount charged by stripe is in cents for singapore doller, so here amount = 1 is being converted into 100 cents since actual payment will be 1 doller from front end |here| 1 doller = 100 cents:

$pay =  \Stripe\Charge::create(array(
    "amount"   => $stripeAmount,
    "currency" => "SGD",
    "customer" => $check_card[0]->customer_id
    ));
$txnId = $pay->balance_transaction;
$txnData=array
(
    "user_id"=>$message['user_id'],
    "amount_credited"=>$amount,
    "card_no"=>$message['card_no'],
    "txnId"=>$txnId,
    "date_created"=>date('Y-m-d H:i:s')
    );

$txnQuery = $this->User_model->insert_data('tbl_transactions',$txnData);
$check_bal = $this->User_model->select_data('*','tbl_wallet',array('user_id'=>$message['user_id']));


$newAmount = $check_bal[0]->balance + $amount;
$uptBal = $this->User_model->update_data('tbl_wallet',array('balance'=>$newAmount,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$message['user_id']));
}else{
    $txnQuery = '';
}
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


public function calculateFare_post(){

    $req_id= $this->input->post('req_id');

    $FareData = $this->User_model->calculateFare($req_id);

    if(empty($FareData))

    {
        $result = array(
            "controller" => "User",
            "action" => "calculateFare",
            "ResponseCode" => false,
            "MessageWhatHappen" => "No data found"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "calculateFare",
            "ResponseCode" => true,
            "calculateFareResponse" => $FareData

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);

}
public function applyPromo_post(){

    $promo_code= $this->input->post('promo_code');
    $check_promo = $this->User_model->select_data('*','tbl_promocodes',array('promo_code'=>$promo_code));

    if(empty($check_promo))

    {
        $result = array(
            "controller" => "User",
            "action" => "applyPromo",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Promocode does not exists"

            );
    }else{
        $check_promo[0]->typeVal = ($check_promo[0]->type == 0)?'amount':'percentage';
        $result = array(
            "controller" => "User",
            "action" => "applyPromo",
            "ResponseCode" => true,
            "applyPromoResponse" => $check_promo

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);

}


public function allPromo_get(){

    $getPromo = $this->User_model->get_data('tbl_promocodes');

    if(empty($getPromo))

    {
        $result = array(
            "controller" => "User",
            "action" => "allPromo",
            "ResponseCode" => false,
            "MessageWhatHappen" => "No data found"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "allPromo",
            "ResponseCode" => true,
            "allPromoResponse" => $getPromo

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);

}

public function acceptWith_quote_post(){

    $with_samePrice = $this->input->post('with_samePrice');
    $price= $this->input->post('price');
    $req_id = $this->input->post('req_id');
    $driver_id = $this->input->post('driver_id');


    $driverData = $this->User_model->userDetails($driver_id);
    $userData =$this->User_model->MoveUserlogin($req_id);

    $selectReqPhn = $this->User_model->select_data('*','tbl_users',array('id'=>$userData[0]->user_id));
    if($selectReqPhn[0]->smsNotificationStatus == 0){
        $msg = array('to'=>$selectReqPhn[0]->phone,'body'=>$driverData->fname .' '.$driverData->lname." has send you a quote");
       // $this->twilioMessage($msg);
    }

    $pushData['message'] = $driverData->fname .' '.$driverData->lname." has send you a quote";
    $pushData['spMessage'] = $driverData->fname .' '.$driverData->lname." has send you a quote";
    $pushData['action'] = "quote";
    $pushData['profile_pic'] = $driverData->profile_pic;
    $pushData['req_id'] = $req_id;
    $pushData['is_quote'] = '';
    $pushData['quote_price'] = $price;
    $pushData['value'] = '';
    $pushData['Utype'] = 1;

    foreach ($userData as $pushVal) {
        if($pushVal->notification_status == 0){
            $pushData['token'] = $pushVal->token_id;
            if($pushVal->device_id == 1){
                $this->User_model->iosPush($pushData);
            }else if($loginUsers->device_id == 0){
                $this->User_model->androidPush($pushData);
            }
        }
    }

    $quoData = array
    (
        "req_id"=>$req_id,
        "driver_id"=>$driver_id,
        "quote_price"=>$price,
        "date_created"=>date('Y-m-d H:i:s')
        );

    $quoteData =  $this->User_model->insert_data('tbl_pushQuotes',$quoData);
    $notificationUserArray = array(
        'user_id'=>$userData[0]->user_id,
        'req_id'=>$req_id,
        'user_type'=>0,
        'messageNotification'=>'quote',
        'date_created'=>date('Y-m-d H:i:s')
        );
    $updateUserNotification = $this->User_model->insert_data('tbl_notifications',$notificationUserArray);
    if(empty($quoteData))

    {
        $result = array(
            "controller" => "User",
            "action" => "acceptWith_quote",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Something went wrong"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "acceptWith_quote",
            "ResponseCode" => true,
            "MessageWhatHappen" => "Quote sent successfully"

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);

}


public function listReq_quotes_post(){

    $req_id = $this->input->post('req_id');

    $quoteListData =  $this->User_model->select_data('*','tbl_pushQuotes',array('req_id'=>$req_id));
    foreach ($quoteListData as  $value) {
        $driverData =  $this->User_model->select_data('fname,lname,profile_pic','tbl_users',array('id'=>$value->driver_id));
        $value->fname = $driverData[0]->fname;
        $value->lname = $driverData[0]->lname;
        $value->profile_pic = $driverData[0]->profile_pic;
    }


    if(empty($quoteListData))

    {
        $result = array(
            "controller" => "User",
            "action" => "listReq_quotes",
            "ResponseCode" => false,
            "MessageWhatHappen" => "List empty"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "listReq_quotes",
            "ResponseCode" => true,
            "listReq_quotesResponse" => $quoteListData

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);

}


public function random_quotePush_post(){
    $Cat_id = $this->input->post('Cat_id');
    $subCat_id = $this->input->post('subCat_id');
    $message = array(
        'user_id' => $this->input->post('user_id'),
        'cat_id' => $Cat_id,
        'subCat_id' => $subCat_id,
        'questions' => $this->input->post('questions'),
        'description' => $this->input->post('description'),
        'date_created' => date('Y-m-d H:i:s')

        );
    $selectIni = $this->User_model->select_data('*','tbl_users',array('id'=>$message['user_id']));
    $insertRandomReq = $this->User_model->insert_data('tbl_random_quotesReq',$message);
    $rType = 2;
    $uType = ($Cat_id == 1)?2:3;
    $customselect = $this->User_model->getLocation($selectIni[0]->latitude,$selectIni[0]->longitude,$rType,$uType);
    $pushData['message'] = "You have recieved a quote request from ".$selectIni[0]->fname." ".$selectIni[0]->lname;
    $pushData['spMessage'] = "You have recieved a quote request from ".$selectIni[0]->fname." ".$selectIni[0]->lname;
    $pushData['action'] = "random_quote";
    $pushData['req_id'] = '';
    $pushData['is_quote'] = '';
    $pushData['value'] = '';
    $pushData['from_id'] = $user_id;
//print_r($customselect); die;
    foreach ($customselect as $value) {

        $insiArray = array(
            'user_id' => $message['user_id'],
            'sp_id' => $value->id,
            'quoteReq_id' => $insertRandomReq,
            'questions' => $message['questions'],
            'description' => $message['description'],
            'date_created' => date('Y-m-d H:i:s')
            );
        $insertDriverReq = $this->User_model->insert_data('tbl_random_quotesReq_Sp',$insiArray);
        if($value->notification_status == 0){
            $pushData['Utype'] = 2;
            $selectLogin = $this->User_model->select_data('*','tbl_login',array('user_id'=>$value->id,'status'=>1));
            foreach ($selectLogin as  $loginUsers) {
                $pushData['token'] = $loginUsers->token_id;
                if($loginUsers->device_id == 1){
                    $this->User_model->iosPush($pushData);
                }else if($loginUsers->device_id == 0){
                    $this->User_model->androidPush($pushData);
                }

            }
        }
    }


    if(empty($insertRandomReq))

    {
        $result = array(
            "controller" => "User",
            "action" => "random_quotePush",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Something went wrong"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "random_quotePush",
            "ResponseCode" => true,
            "listReq_quotesResponse" => "Request sent succesfully"

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);

}

public function random_quoteList_post(){

    $user_id = $this->input->post('user_id');

    $selectQuotes = $this->User_model->select_data('*','tbl_random_quotesReq',array('user_id'=>$user_id));
    foreach ($selectQuotes as $value) {
        $selectcat = $this->User_model->select_data('*','tbl_categories',array('id'=>$value->cat_id));
        $selectsubCat = $this->User_model->select_data('*','tbl_subCategory',array('id'=>$value->subCat_id));
        $selectquoteReply = $this->User_model->customReply_select($value->id);
        $value->catName = $selectcat[0]->categoryName;
        $value->subCatName = $selectsubCat[0]->subCategoryName;
        $value->quoteReply = $selectquoteReply;
        foreach ($selectquoteReply as  $nwvalue) {
            $selectUserDetails = $this->User_model->select_data('*','tbl_users',array('id'=>$nwvalue->serviceProvider_id));
            $nwvalue->provider_name = $selectUserDetails[0]->fname." ".$selectUserDetails[0]->lname;
            $nwvalue->profile_pic = $selectUserDetails[0]->profile_pic;
        }
    }

    if(empty($selectQuotes))

    {
        $result = array(
            "controller" => "User",
            "action" => "random_quoteList",
            "ResponseCode" => false,
            "MessageWhatHappen" => "List empty"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "random_quoteList",
            "ResponseCode" => true,
            "listReq_quotesResponse" => $selectQuotes

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);

}

public function getRandomQuoteDetail_post(){

    $quote_id = $this->input->post('quote_id');

    $data = $this->User_model->select_data('*','tbl_random_quotesReq',array('id'=>$quote_id));

    $selectcat = $this->User_model->select_data('*','tbl_categories',array('id'=>$data[0]->cat_id));
    $selectsubCat = $this->User_model->select_data('*','tbl_subCategory',array('id'=>$data[0]->subCat_id));
    $selectquoteReply = $this->User_model->customReply_select($data[0]->id);
    $data[0]->catName = $selectcat[0]->categoryName;
    $data[0]->subCatName = $selectsubCat[0]->subCategoryName;
    foreach ($selectquoteReply as  $myvalue) {
        $selectUserDetails = $this->User_model->select_data('*','tbl_users',array('id'=>$myvalue->serviceProvider_id));
        $myvalue->provider_name = $selectUserDetails[0]->fname." ".$selectUserDetails[0]->lname;
        $myvalue->profile_pic = $selectUserDetails[0]->profile_pic;
    }
    $data[0]->quoteReply = $selectquoteReply;






    if (empty($data)) {
        $result = array(
            "controller" => "User",
            "action" => "getRandomQuoteDetail",
            "ResponseCode" => false,
            "MessageWhatHappen" => "No list found"


            );
    } else {
        $result = array(
            "controller" => "User",
            "action" => "getRandomQuoteDetail",
            "ResponseCode" => true,
            "MessageWhatHappen" => "Success",
            "getCategoryData" => $data
            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);


}


public function randomCategory_quotes_get(){                                  // Get category list

    $data['mainData'] = $this->User_model->get_data('tbl_categories');
    foreach ($data['mainData'] as $value) {
        $data1 = $this->User_model->select_data('*','tbl_subCategory',array('category_id'=>$value->id));
        $value->subCategories = $data1;
    }
    $quesData = $this->User_model->get_data('tbl_settingQues');
    $data['questions'] = $quesData;
    if (empty($data)) {
        $result = array(
            "controller" => "User",
            "action" => "randomCategory_quotes",
            "ResponseCode" => false,
            "MessageWhatHappen" => "No list found"


            );
    } else {
        $result = array(
            "controller" => "User",
            "action" => "randomCategory_quotes",
            "ResponseCode" => true,
            "MessageWhatHappen" => "Success",
            "getCategoryData" => $data
            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);


}

public function randomQuoteProviders_list_post(){

    $user_id = $this->input->post('user_id');

    $data = $this->User_model->select_data('*','tbl_random_quotesReq_Sp',array('sp_id'=>$user_id));
    foreach($data as $value){
        $userInfo = $this->User_model->select_data('*','tbl_users',array('id'=>$value->user_id));
        $value->fname = $userInfo[0]->fname;
        $value->lname = $userInfo[0]->lname;
        $value->profile_pic = $userInfo[0]->profile_pic;

    }

    if (empty($data)) {
        $result = array(
            "controller" => "User",
            "action" => "randomCategory_quotes",
            "ResponseCode" => false,
            "MessageWhatHappen" => "No list found"


            );
    } else {
        $result = array(
            "controller" => "User",
            "action" => "randomCategory_quotes",
            "ResponseCode" => true,
            "MessageWhatHappen" => "Success",
            "getCategoryData" => $data
            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);


}

public function randomQuote_reply_post(){

    $quote_id = $this->input->post('quote_id');
    $spUser_id = $this->input->post('spUser_id');
    $reqUser_id = $this->input->post('reqUser_id');
    $message = array(
        'provider_comment'=>$this->input->post('provider_comment'),
        'provider_price'=>$this->input->post('provider_price'),
        'is_answered'=>1,
        'date_answered'=>date('Y-m-d H:i:s')

        );


    $data = $this->User_model->randomQuote_reply($quote_id,$spUser_id,$message);
    $getLogin = $this->User_model->select_data('*','tbl_login',array('user_id'=>$reqUser_id));
    $getUser = $this->User_model->select_data('*','tbl_users',array('id'=>$reqUser_id));
    $pushData['message'] = "You have recieved a quote request from ".$selectIni[0]->fname." ".$selectIni[0]->lname;
    $pushData['spMessage'] = "You have recieved a quote request from ".$selectIni[0]->fname." ".$selectIni[0]->lname;
    $pushData['action'] = "random_quoteReply";
    $pushData['req_id'] = '';
    $pushData['is_quote'] = '';
    $pushData['value'] = '';
    $pushData['from_id'] = $user_id;
    $pushData['quote_id'] = $quote_id;
// print_r($getLogin); die;
    foreach ($getLogin as $value) {


        if($getUser[0]->notification_status == 0){

            $pushData['Utype'] = 1;
            $pushData['token'] = $value->token_id;
            if($value->device_id == 1){
                $this->User_model->iosPush($pushData);
            }else if($value->device_id == 0){
                $this->User_model->androidPush($pushData);
            }


        }
    }



    if ($data != 1) {
        $result = array(
            "controller" => "User",
            "action" => "randomQuote_reply",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Reply unsuccesful"


            );
    } else {
        $result = array(
            "controller" => "User",
            "action" => "randomQuote_reply",
            "ResponseCode" => true,
            "MessageWhatHappen" => "Reply successful"

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);


}


public function quoteAccept_action_post(){

    $req_id = $this->input->post('req_id');
    $driver_id = $this->input->post('driver_id');
    $acceptedPrice = $this->input->post('acceptedPrice');

    $bookingDetails = $this->User_model->select_data('is_accepted,is_started,is_completed,is_cancelled','tbl_bookingRequests',array('id'=>$req_id))[0];

    if ($bookingDetails->is_accepted==1 || $bookingDetails->is_cancelled==1 || $bookingDetails->is_completed==1) {
        $result = array(
            "controller" => "User",
            "action" => "quoteAccept_action",
            "ResponseCode" => false,
            "ErrorCode" => 401,
            "bookingDetails" => $bookingDetails,
            "MessageWhatHappen" => "quoteAccept action failed"
            );
        $this->set_response($result, REST_Controller::HTTP_OK);
        return true;
    } else {
        $uptPrice = $this->User_model->update_data('tbl_bookingRequests',array('acceptedPrice'=>$acceptedPrice),array('id'=>$req_id));

        $myData = $this->User_model->customUserTo_driver($req_id,$driver_id);

        $pushData['message'] = "Your ride quote has been accepted by ".$myData['sender']->fname.' '.$myData['sender']->lname;
        $pushData['spMessage'] = "Your ride quote has been accepted by ".$myData['sender']->fname.' '.$myData['sender']->lname;
        $pushData['action'] = "Assign_ride";
        $pushData['profile_pic'] = $myData['sender']->profile_pic;
        $pushData['req_id'] = $req_id;
        $pushData['is_quote'] = '';
        $pushData['value'] = '';
        $pushData['Utype'] = 2;
        foreach ($myData['reciever'] as $pushVal) {

            $pushData['token'] = $pushVal->token_id;
            if($pushVal->device_id == 1){
                $this->User_model->iosPush($pushData);
            }else if($loginUsers->device_id == 0){
                $this->User_model->androidPush($pushData);
            }
        }

        $data = $this->User_model->update_data('tbl_bookingRequests',array('is_accepted'=>1,'accepted_by'=>$driver_id),array('id'=>$req_id));
        $moveData = array(
            "driver_id"=>$driver_id,
            "status"=>1,
            'accepted_time'=>date('Y-m-d H:i:s')
            );
        $insertMove_history = $this->User_model->update_data('tbl_moveHistory',$moveData,array("req_id"=>$req_id));

        if($insertMove_history == 1){


            $result = array(
                "controller" => "User",
                "action" => "quoteAccept_action",
                "ResponseCode" => true,
                "listReq_quotesResponse" => "Assigned to the driver successfully"

                );

        }else{

            $result = array(
                "controller" => "User",
                "action" => "quoteAccept_action",
                "ResponseCode" => false,
                "MessageWhatHappen" => "Something went wrong"

                );

        }
        $this->set_response($result, REST_Controller::HTTP_OK);
    }


}

public function cancelBookingCron_get(){


    $cancel_booking = $this->User_model->customCancel_cron();

}
public function cancelQuoteCron_get(){


    $cancel_QuoteCron = $this->User_model->cancel_QuoteCron();

}


public function lateWarningCron_get(){

    $late_warning = $this->User_model->customLate_cron();

}



public function listSubscriptions_post(){

    $user_id = $this->input->post('user_id');

    $data['my_subscriptionData'] = $this->User_model->userSubscriptions($user_id);
    $data['allList'] =  $this->User_model->get_data('tbl_subscriptionsList');
    foreach ($allList as  $value) {
        if($value->type == 0){
            $value->type = 'Monthly';
        }else if($value->type == 1){
            $value->type = 'Quarterly';
        } else if($value->type == 2){
            $value->type = 'Half-Yearly';
        }else{
            $value->type = 'Yearly';
        }

    }


    if(empty($data))

    {
        $result = array(
            "controller" => "User",
            "action" => "listSubscriptions",
            "ResponseCode" => false,
            "MessageWhatHappen" => "List empty"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "listSubscriptions",
            "ResponseCode" => true,
            "listSubscriptionsResponse" => $data

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);

}

public function getSubscriptions_post(){

    $user_id = $this->input->post('user_id');
    $subs_id= $this->input->post('subs_id');
    $checkSubscription = $this->User_model->customSubscription_check($user_id);

    if(empty($checkSubscription)){
        /* Payment by wallet*/
        $getAmount =  $this->User_model->select_data('*','tbl_subscriptionsList',array('id'=>$subs_id));
        $getBalance = $this->User_model->select_data('*','tbl_wallet',array('user_id'=>$user_id));
        if($getBalance[0]->balance >= $getAmount[0]->amount){
            $newAmount = $getBalance[0]->balance - $getAmount[0]->amount;
            $uptDAta = $this->User_model->update_data('tbl_wallet',array('balance'=>$newAmount,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$user_id));

            /* transaction Add*/
            $addtransArray = array(
                'amount_debited'=>$getAmount[0]->amount,
                'user_id'=>$user_id,
                'txnId'=>'from_wallet',
                'date_created'=>date('Y-m-d H:i:s')
                );
            $addtrans = $this->User_model->insert_data('tbl_transactions',$addtransArray);
            $entryCheck = $this->db->select('*')
            ->from('tbl_driverSubscriptions')
            ->where('driver_id',$user_id)
            ->get()->row();
            if(empty($entryCheck)){



                $data  = $this->User_model->insert_data('tbl_driverSubscriptions',array('driver_id'=>$user_id,'subscription_id'=>$subs_id,'date_created'=>date("Y-m-d H:i:s")));
            }else{
                $data = $this->User_model->update_data('tbl_driverSubscriptions',array('subscription_id'=>$subs_id,'status'=>1,'date_created'=>date('Y-m-d H:i:s')),array('driver_id'=>$user_id));
            }
            if(empty($data))
            {
                $result = array(
                    "controller" => "User",
                    "action" => "getSubscriptions",
                    "ResponseCode" => false,
                    "MessageWhatHappen" => "Not subscribed"
                    );
            }else{
                $result = array(
                    "controller" => "User",
                    "action" => "getSubscriptions",
                    "ResponseCode" => true,
                    "MessageWhatHappen" => "Subscription successful"
                    );
            }


        }else{
            $result = array(
                "controller" => "User",
                "action" => "getSubscriptions",
                "ResponseCode" => false,
                "MessageWhatHappen" => "Insufficient balance"
                );

        }

    }else{

        $result = array(
            "controller" => "User",
            "action" => "getSubscriptions",
            "ResponseCode" => false,
            "MessageWhatHappen" => "already subscribed",
            "getSubscriptionsResponse" => $checkSubscription

            );

    }
    $this->set_response($result, REST_Controller::HTTP_OK);

}



public function listMembership_get(){

//$user_id = $this->input->post('user_id');

//$data['my_subscriptionData'] = $this->User_model->userSubscriptions($user_id);
    $data['allList'] =  $this->User_model->get_data('tbl_membership');

    if(empty($data))

    {
        $result = array(
            "controller" => "User",
            "action" => "listMembership",
            "ResponseCode" => false,
            "MessageWhatHappen" => "List empty"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "listMembership",
            "ResponseCode" => true,
            "listMembershipResponse" => $data

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);

}

public function geofence_get(){

    $geoData =  $this->User_model->select_data('geofence','tbl_settings',array('id'=>1));


    if(empty($geoData))

    {
        $result = array(
            "controller" => "User",
            "action" => "geofence",
            "ResponseCode" => false,
            "MessageWhatHappen" => "List empty"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "geofence",
            "ResponseCode" => true,
            "geofenceResponse" => $geoData[0]

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);

}


public function getMembership_post(){

    $user_id = $this->input->post('user_id');
    $mem_id= $this->input->post('mem_id');
    $checkSubscription = $this->User_model->getMembership_check($user_id);

    if(empty($checkSubscription)){
        /* Payment by wallet*/
        $getAmount =  $this->User_model->select_data('*','tbl_membership',array('id'=>$mem_id));
        $getBalance = $this->User_model->select_data('*','tbl_wallet',array('user_id'=>$user_id));
        if($getBalance[0]->balance >= $getAmount[0]->amount){
            $newAmount = $getBalance[0]->balance - $getAmount[0]->price;
            $uptDAta = $this->User_model->update_data('tbl_wallet',array('balance'=>$newAmount,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$user_id));

            /* transaction Add*/
            $addtransArray = array(
                'amount_debited'=>$getAmount[0]->price,
                'user_id'=>$user_id,
                'txnId'=>'from_wallet',
                'date_created'=>date('Y-m-d H:i:s')
                );
            $addtrans = $this->User_model->insert_data('tbl_transactions',$addtransArray);
            $entryCheck = $this->db->select('*')
            ->from('tbl_driverMembership')
            ->where('driver_id',$user_id)
            ->get()->row();
            if(empty($entryCheck)){

                $data  = $this->User_model->insert_data('tbl_driverMembership',array('driver_id'=>$user_id,'membership_id'=>$mem_id,'status'=>1,'date_created'=>date("Y-m-d H:i:s")));
            }else{
                $data = $this->User_model->update_data('tbl_driverMembership',array('membership_id'=>$mem_id,'status'=>1,'date_created'=>date('Y-m-d H:i:s')),array('driver_id'=>$user_id));
            }
            if(empty($data))
            {
                $result = array(
                    "controller" => "User",
                    "action" => "getMembership",
                    "ResponseCode" => false,
                    "MessageWhatHappen" => "Not subscribed"
                    );
            }else{
                $result = array(
                    "controller" => "User",
                    "action" => "getMembership",
                    "ResponseCode" => true,
                    "MessageWhatHappen" => "Membership successful"
                    );
            }


        }else{
            $result = array(
                "controller" => "User",
                "action" => "getMembership",
                "ResponseCode" => false,
                "MessageWhatHappen" => "Insufficient balance"
                );

        }

    }else{

        $result = array(
            "controller" => "User",
            "action" => "getMembership",
            "ResponseCode" => false,
            "MessageWhatHappen" => "You already have membership",
            "getMembershipResponse" => $checkSubscription

            );

    }
    $this->set_response($result, REST_Controller::HTTP_OK);

}


public function twilioMessage($msg=null)
{
    if ($msg=="") {
        $from='+12028688886';
        $to='+917832027983';
        $body="Hello dummy test here to +917832027983";
    }else{
        $from='+12028688886';
        $to=$msg['to'];
        $body=$msg['body'];
    }
// Your Account SID and Auth Token from twilio.com/console
    $sid = 'AC7be182b7f9efc4101851497683116496';
    $token = 'f371d9252dc7b9dff9a9f8a69308028c';
    $client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
    $client->messages->create(
// the number you'd like to send the message to
        $to,
        array(
// A Twilio phone number you purchased at twilio.com/console
            'from' => $from,
// the body of the text message you'd like to send
            'body' => $body
            )
        );
}

public function sendOTP_post()
{

    /* Twilio sms verification start*/
    $phone = $this->input->post('phone');
    $otp = $this->generateRandomString();
    $check = $this->User_model->select_data('*',"tbl_otp",array('phone'=>$phone));
    if (empty($check)) {
        $this->User_model->insert_data('tbl_otp',array('phone'=>$phone,'otp'=>$otp,'addedOn'=>date("Y-m-d H:i:s")));
    } else {
        $this->User_model->update_data('tbl_otp',array('otp'=>$otp,'updatedOn'=>date("Y-m-d H:i:s")),array('phone'=>$phone));
    }


    $msg = array('to'=>$phone,'body'=>"Your verification code for Kudos is: $otp");
// print_r($this->twilioMessage()); die;
    //$this->twilioMessage($msg);
    $status = 1;
    $response = array();

    if ( $status == 0 ) {
        $response['status'] = 'error';
        $response['message'] = 'This failed';
    } else {
        $response['status'] = 'success';
        $response['message'] = 'OTP sent successfully';
        $response['otp'] = $otp;
    }

//echo json_encode($response);
    $this->set_response($response, REST_Controller::HTTP_OK);
    /* Twilio sms verification End */
}

function generateRandomString($length = 4) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

public function Service_signup_post()  {
    $payType = $this->input->post('payType');
    $upload_path = "Public/img/driverImages";
    $image = "profile_pic";
    $imagename = $this->file_upload($upload_path, $image);

    $upload_path = "Public/img/driverImages";
    $image2 = "icf_image";
    $icf_image = $this->file_upload($upload_path, $image2);

    $upload_path = "Public/img/driverImages";
    $image3 = "icb_image";
    $icb_image = $this->file_upload($upload_path, $image3);

    $upload_path = "Public/img/driverImages";
    $image4 = "dlf_image";
    $dlf_image = $this->file_upload($upload_path, $image4);

    $upload_path = "Public/img/driverImages";
    $image5 = "dlb_image";
    $dlb_image = $this->file_upload($upload_path, $image5);

    $upload_path = "Public/img/driverImages";
    $image6 = "frontPicture";
    $frontPicture = $this->file_upload($upload_path, $image6);

    $upload_path = "Public/img/driverImages";
    $image7 = "sidePicture";
    $sidePicture = $this->file_upload($upload_path, $image7);

    $upload_path = "Public/img/driverImages";
    $image7 = "acraBiz";
    $acraBizImg = $this->file_upload($upload_path, $image7);

    $phone = $this->input->post('concode').$this->input->post('phone');

    $main_data = array(
        'fname'=>$this->input->post('fname'),
        'lname'=>$this->input->post('lname'),
        'gender'=>$this->input->post('gender'),
        'email'=>$this->input->post('email'),
        'password'=>md5($this->input->post('password')),
        'address'=>$this->input->post('address'),
        'categoryType'=>$this->input->post('categoryType'),
        'phone'=>$phone,
        'user_type'=>2,
        'profile_pic' =>$imagename,
        'signupVia_email'=>1,
        'date_created'=> date('Y-m-d H:i:s'),
        );
    $sec_data = array(
//'reg_image'=>$regImage,
        'date_created'=> date('Y-m-d H:i:s'),
        'appliedAs'=>$this->input->post('appliedAs'),
        'compName'=>$this->input->post('compName'),
        'compAddress'=>$this->input->post('compAddress'),
        'acraNo'=>$this->input->post('acraNo'),
        'ownOrRented'=>$this->input->post('ownOrRented'),
        'logo'=>$this->input->post('logo'),
        'commercialRadio'=>$this->input->post('commercialRadio'),
        'joinType'=>$this->input->post('joinType'),
        'icno'=>$this->input->post('icno'),
        'icf_image'=>$icf_image,
        'icb_image'=>$icb_image,
        'dlf_image'=>$dlf_image,
        'dlb_image'=>$dlb_image,
        'frontPicture'=>$frontPicture,
        'sidePicture'=>$sidePicture,
        'acraBiz'=>$acraBizImg,
        );


    $subCategoryParam = $this->input->post('subCategory_id');
    $subCategory_id = explode(",",$subCategoryParam);
    $usercheck = $this->User_model->select_data('*','tbl_users',array('email'=>$main_data['email']));
    if(empty($usercheck)){
        $mainInsert = $this->User_model->insert_data('tbl_users',$main_data);
        $sec_data['user_id'] = $mainInsert;
        $SecInsert = $this->User_model->insert_data('tbl_serviceProvider_Lookup',$sec_data);
        $amount = 0;
        $addBal = $this->User_model->insert_data('tbl_wallet',array('balance'=>$amount,'user_id'=>$mainInsert,'date_created'=>date('Y-m-d H:i:s')));
        $addtransArray = array(
            'amount_credited'=>$amount,
            'user_id'=>$mainInsert,
            'txnId'=>'initialWallet',
            'date_created'=>date('Y-m-d H:i:s')
            );

        $addtrans = $this->User_model->insert_data('tbl_transactions',$addtransArray);

        foreach ($subCategory_id as  $value) {
            $serviceArray = array(
                "user_id"=>$mainInsert,
                "user_type"=>2,
                "subCategory_id"=>$value,
                "date_created"=>date('Y-m-d H:i:a')
                );
            if(!empty($value)){
                $serviceInsert = $this->User_model->insert_data('tbl_serviceProviders',$serviceArray);
            }
        }


        if(!empty($mainInsert)) {
            if($payType == 1){
                $paymentData = array(

                    'user_id'=>$mainInsert,
                    'paypalId'=>$this->input->post('paypalId'),
                    'addedOn'=> date('Y-m-d H:i:s'),

                    );
            }else{
                $paymentData = array(

                    'user_id'=>$mainInsert,
                    'accHolderName'=>$this->input->post('accHolderName'),
                    'accountNumber'=>$this->input->post('accountNumber'),
                    'ifcsc'=>$this->input->post('ifcsc'),
                    'addedOn'=> date('Y-m-d H:i:s'),

                    );

            }
            $payInsert = $this->User_model->insert_data('tbl_userPayment',$paymentData);

            $result = array(
                "controller" => "User",
                "action" => "Service_signup",
                "ResponseCode" => true,
                "MessageWhatHappen" => "Signup successfull"

                );

        }else{

            $result = array(
                "controller" => "User",
                "action" => "Service_signup",
                "ResponseCode" => false,
                "MessageWhatHappen" => "Something went wrong"

                );

        }
    }else{
        $result = array(
            "controller" => "User",
            "action" => "Service_signup",
            "ResponseCode" => false,
            "MessageWhatHappen" => "Email already exists"

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);

}

public function getotp_get($phone){
    $nwvar = '+'.$phone;
    $otpData =  $this->User_model->select_data('otp','tbl_otp',array('phone'=>$nwvar));


    if(empty($otpData))

    {
        $result = array(
            "controller" => "User",
            "action" => "getotp",
            "ResponseCode" => false,
            "MessageWhatHappen" => "List empty"

            );
    }else{
        $result = array(
            "controller" => "User",
            "action" => "getotp",
            "ResponseCode" => true,
            "getotpResponse" => $otpData[0]

            );
    }
    $this->set_response($result, REST_Controller::HTTP_OK);

}


function file_upload($upload_path, $image) {

    $baseurl = base_url();
    $config['upload_path'] = $upload_path;
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size'] = '5000';
    $config['max_width'] = '5024';
    $config['max_height'] = '5068';
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload($image))
    {
        $error = array(
            'error' => $this->upload->display_errors()
            );


        return $imagename = "";
    }
    else
    {
        $detail = $this->upload->data();
        return $imagename = $baseurl . $upload_path .'/'. $detail['file_name'];
    }
}
}
