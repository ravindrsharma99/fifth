<?php

    class User_model extends CI_Model{

    function __construct() {
        parent::__construct();
    }
     function signup($myarray,$signup_via,$loginArray) {
             $chk_query = $this->db->select('*')
                                   ->from('tbl_users')
                                   ->where('email',$myarray['email'])
                                   ->get()->row();
             if(!empty($chk_query)){

               return 0;
             }else{
                        if ($signup_via == 1) {
                               $myarray['signupVia_fb'] = 1;
                                unset($myarray['password']);
                                unset($myarray['google_id']);
                                $myarray['signupVia_fb'] = 1;
                        } elseif ($signup_via == 2) {
                               $myarray['signupVia_google'] = 1;
                                unset($myarray['password']);
                                unset($myarray['fb_id']);
                                $myarray['signupVia_google'] = 1;
                        } else{
                               $myarray['signupVia_email'] = 1;
                                unset($myarray['fb_id']);
                                unset($myarray['google_id']);
                                $myarray['signupVia_email'] = 1;
                           }
                            $this->db->insert('tbl_users', $myarray);
                            $loginArray['user_id'] = $this->db->insert_id();
                            $loginArray['status'] = 1;
                            $this->db->insert('tbl_login',$loginArray);

                           return($this->db->affected_rows())?$loginArray['user_id']:0;
            }
}

  function login($message)
  {
    if ($message['login_via'] == 1)
    { // case: login facebook
      $select_user = $this->db->select('*')
      ->from('tbl_users')
      ->group_start()
      ->where('email', $message['email'])
      ->where('fb_id', $message['fb_id'])
      ->where('user_type !=', 1 )
      ->group_end()
      ->or_group_start()
      ->where('fb_id', $message['fb_id'])
      ->where('user_type !=', 1 )
      ->group_end()
      ->get()->row();


    if(empty($select_user)){
     $select_user = $this->db->select('*')->from('tbl_users')->where('email', $message['email'])->where('user_type !=', 1 )->where('UserCurrStatus !=',1)->get()->row();
     // $chkUser = $this->User_model->select_data('*','tbl_users',array('email'=>$message['email'],array('user_type !=', 1 )));
        if(empty($chkUser)){
          return 0;
        }else{
             $uptData = array(
                          "fb_id" => $message['fb_id'],
                          "signupVia_fb" => 1
                          );
                       $this->db->where('id', $select_user->id);
                       $this->db->update('tbl_users',$uptData);
        }
    }
    }else if ($message['login_via'] == 2){ // case: login google
      $select_user = $this->db->select('*')->from('tbl_users')->where('email', $message['email'])->where('user_type !=', 1 )->where('UserCurrStatus !=',1)->get()->row();

       if(!empty($select_user)){

                        $uptData = array(
                          "google_id" => $message['google_id'],
                          "signupVia_google" => 1
                          );
                       $this->db->where('id', $select_user->id);
                       $this->db->update('tbl_users',$uptData);

    }else{
      return 0;
    }
    }else if ($message['login_via'] == 3) { // case: login Manual
      $select_user = $this->db->select('*')->from('tbl_users')->where('email', $message['email'])->where('password', md5($message['password']))->where('user_type !=', 1 )->where('UserCurrStatus !=',1)->get()->row();
      if(empty($select_user)){
        return 0;
      }
    }


    $selectRes = $this->db->select('*')->from('tbl_users')->where('id', $select_user->id)->get()->row();

    /*push implementation to logout other users  directly*/
     $selectPreviousUsers = $this->db->select('*')
                                     ->from('tbl_login')
                                     ->where('user_id',$select_user->id)
                                     ->where('status',1)
                                     ->limit(1,'DESC')
                                     ->get()->row();
 
                $pushData['message'] = "You have been logged out of this acount";
                $pushData['action'] = "LogOut";
                $pushData['req_id'] = '';
                $pushData['is_quote'] = '';
                $pushData['value'] = '';
                if($selectRes->user_type == 0){
                   $pushData['Utype'] = 1;
                }else if($selectRes->user_type == 2){
                   $pushData['Utype'] = 2;
                }
                $pushData['token'] = $selectPreviousUsers->token_id;
                if($selectPreviousUsers->device_id == 1){
                    $this->iosPush($pushData);
                }else if($selectPreviousUsers->device_id == 0){
                    $this->androidPush($pushData);
                }

    /*push end*/


      $update = $this->db->where('user_id', $select_user->id);
      $this->db->update('tbl_login', array(
        'status' => 0
      ));
      $insiData = array(
        'user_id' => $select_user->id,
        'unique_device_id' => $message['unique_device_id'],
        'device_id' => $message['device_id'],
        'token_id' => $message['token_id'],
        'status' => 1
      );
      $insert = $this->db->insert("tbl_login", $insiData);

    return $selectRes;
  }


function logout($myarray){

      $query=$this->db->query("UPDATE tbl_login set status = '0' where  unique_device_id = '" . $myarray['unique_device_id'] . "'");
      return($this->db->affected_rows())?1:0;

}

   function getprofile($user_id){
              $chk_query = $this->db->select('*')
                                   ->from('tbl_users')
                                   ->where('id',$user_id)
                                   ->where('user_type !=',1)
                                   ->get()->row();
              return $chk_query;
    }

  public function get_data($tbl_name,$limit=null,$offset=null)                         /* Get all data */
    {
      if ($limit!=null) {
        $query = $this->db->get($tbl_name,$limit, $offset)->result();
      } else {
        $query = $this->db->get($tbl_name)->result();
      }

      return (empty($query))?'':$query;
    }



    public function select_data($selection,$tbl_name,$where=null,$order=null)                   /* Select data with condition*/
    {
      if (empty($where)&&empty($order)) {
      $data_response = $this->db->select($selection)
           ->from($tbl_name)
           ->get()->result();
    }
    elseif(empty($order)){
    $data_response =
    $this->db->select($selection)
           ->from($tbl_name)
           ->where($where)
           ->get()->result();

    }else{
    $data_response =
    $this->db->select($selection)
           ->from($tbl_name)
           ->where($where)
           ->order_by($order)
           ->get()->result();
    }
// print_r($this->db->last_query()); die;
    return $data_response;

    }

    public function orSelectData($user_id){

                   $resi = $this->db->query("select * from tbl_bookingRequests where user_id= ".$user_id." and( (is_accepted=1 or is_started=1) and is_completed=0 ) and is_cancelled =0 ")->result();

               return $resi;

    }

    public function driverbookings($driver_id){

               $resi = $this->db->query("select * from tbl_bookingRequests where accepted_by= ".$driver_id." and( (is_accepted=1 or is_started=1) and is_completed=0 ) and is_cancelled =0 ")->result();
               return $resi;

    }
    public function customSubscription_check($user_id){


       $cuRDate = date('Y-m-d H:i:s');
       $getUser = $this->db->select('*')
                         ->from('tbl_driverSubscriptions')
                         ->where('driver_id',$user_id)
                         ->where('status',1)
                         ->get()->row();


                         if(!empty($getUser)){
                          $checkList = $this->db->select('*')
                                                ->from('tbl_subscriptionsList')
                                                ->where('id',$getUser->subscription_id)
                                                ->get()->row();
                            $dt = new DateTime($getUser->date_created);
                            if($checkList->type == 0){

                            $nw =  $dt->modify('+ 30 days');
                            $dtVar = $nw->format('Y-m-d H:i:s');

                            }else if($checkList->type == 1){

                            $nw =  $dt->modify('+ 91 days');
                            $dtVar = $nw->format('Y-m-d H:i:s');

                            }else if($checkList->type == 2){

                            $nw =  $dt->modify('+ 182 days');
                            $dtVar = $nw->format('Y-m-d H:i:s');

                            }else if($checkList->type == 3){

                            $nw =  $dt->modify('+ 365 days');
                            $dtVar = $nw->format('Y-m-d H:i:s');

                            }
                            if($cuRDate > $dtVar){
                              $this->db->where('driver_id',$user_id);
                              $this->db->update('tbl_driverSubscriptions',array('status'=>2));
                              return '';
                            }else{
                              return $getUser;
                            }

                         }else{
                           return '';
                         }

    }

    public function getMembership_check($user_id){


       $cuRDate = date('Y-m-d H:i:s');
       $getUser = $this->db->select('*')
                         ->from('tbl_driverMembership')
                         ->where('driver_id',$user_id)
                         ->where('status',1)
                         ->get()->row();

                         if(!empty($getUser)){
                          $checkList = $this->db->select('*')
                                                ->from('tbl_membership')
                                                ->where('id',$getUser->membership_id)
                                                ->get()->row();
                            $dt = new DateTime($getUser->date_created);
                            $deta = "+ ".$checkList->validity." days";
                            $nw =  $dt->modify($deta);
                            $dtVar = $nw->format('Y-m-d H:i:s');
                            if($cuRDate > $dtVar){
                              $this->db->where('driver_id',$user_id);
                              $this->db->update('driverMembership',array('status'=>2));
                              return '';
                            }else{
                              return $getUser;
                            }

                         }else{
                           return '';
                         }

    }



    public function userSubscriptions($user_id){
       $result = $this->db->select('tbl_driverSubscriptions.driver_id,tbl_subscriptionsList.name,tbl_subscriptionsList.amount,tbl_driverSubscriptions.date_created')
                         ->from('tbl_driverSubscriptions')
                         ->join('tbl_subscriptionsList','tbl_subscriptionsList.id = tbl_driverSubscriptions.subscription_id')
                         ->where('driver_id',$user_id)
                         ->get()->row();

    return $result;

    }

        public function update_data($tbl_name,$data,$where){                                 /* Update data */

      $this->db->where($where);
      $this->db->update($tbl_name,$data);

     return($this->db->affected_rows())?1:0;
    }



  public function updateprofile($message,$user_id) {

             $this->db->where("id", $user_id);
             $this->db->update("tbl_users",$message);
             return($this->db->affected_rows())?1:0;

    }



    public function userDetails($id){

    $result = $this->db->select('tbl_users.fname,tbl_users.lname,tbl_users.email,tbl_users.phone,tbl_users.profile_pic, tbl_users.id as my_id')
                         ->from('tbl_users')
                         ->where('id',$id)
                         ->get()->row();

                         return $result;

    }
       public function jobTime($id){

      $result = $this->db->select('booking_date,booking_time')
                         ->from('tbl_bookingRequests')
                         ->where('id',$id)
                         ->get()->row();

                         return $result;

    }
      public function MoveUserlogin($req_id){

      $getUser = $this->db->select('user_id')
                         ->from('tbl_bookingRequests')
                         ->where('id',$req_id)
                         ->get()->row();

      $selectlogin = $this->db->select('tbl_login.*,tbl_users.notification_status')
                         ->from('tbl_login')
                         ->join('tbl_users','tbl_users.id = tbl_login.user_id')
                         ->where('user_id',$getUser->user_id)
                         ->where('status',1)
                         ->get()->result();


      return $selectlogin;
    }

   public function customUserTo_driver($req_id,$driver_id){
    $result['bookings'] = $this->db->select('*')
                        ->from('tbl_bookingRequests')
                        ->where('id',$req_id)
                        ->get()->row();

    $result['sender'] = $this->db->select('tbl_users.fname,tbl_users.lname,tbl_users.email,tbl_users.phone,tbl_users.profile_pic,tbl_users.id as sender_id')
                         ->from('tbl_users')
                         ->where('id',$result['bookings']->user_id)
                         ->get()->row();
    $result['reciever'] =  $this->db->select('*')
                         ->from('tbl_login')
                         ->where('user_id',$driver_id)
                         ->where('status',1)
                         ->get()->result();

     return $result;

   }

  public function forgotpassword($email)
  {
    $select_user = $this->db->select('*')->from('tbl_users')->where('email', $email)->get()->row();
    if (empty($select_user->id))
    {
      return 0;
    }
    else
    {
      $static_key = "afvsdsdjkldfoiuy4uiskahkhsajbjksasdasdgf43gdsddsf";
      $id = $select_user->id . "_" . $static_key;
      $result['b_id'] = base64_encode($id);
      $result['user_id'] = $select_user->id;
      $result['fname'] = $select_user->fname;
      return $result;
    }
  }

    public function updateNewpassword($message){
    $update_pwd = $this->db->where('id', $message['id']);
    $this->db->update("tbl_users", array(
      'password' => md5($message['password'])
    ));
    // print_r($this->db->last_query());die;
    if ($update_pwd)
    {
      $this->session->set_flashdata('msg', '<span style="color:green">Password Changed Successfully</span>');
      redirect("api/User/newpassword?id=" . $message['base64id']);
    }
    else
    {
      $this->session->set_flashdata('msg', '<span style="color:red">Error in Updating Password</span>');
      redirect("api/User/newpassword?id=" . $message['base64id']);
    }
  }


    public function insert_data($tbl_name,$data)                                         /* Data insert */
    {
      $this->db->insert($tbl_name, $data);

        $insert_id = $this->db->insert_id();
        return $insert_id;

    }

    public function getLocation($lat,$long,$rType,$uType)                                         /* Get Location*/
    {
      if($rType == 1) {
        $radius = 10;
      }else if($rType == 2){
        $radius = 50;
      }


      $selectDrivers =
      $this->db->select("*, ( 3959 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians(longitude) - radians($long) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) AS distance FROM tbl_users")
      ->where('user_type',$uType)
      ->having('distance <=',$radius)
      ->order_by('distance', 'DESC')
     // ->limit(20, 0)
      ->get()->result();
      return $selectDrivers;

    }


     public function getLocationNew($lat,$long,$rType,$catType)                                         /* Get Location new*/
    {
      if($rType == 1) {
        $radius = 10;
      }else if($rType == 2){
        $radius = 50;
      }


      $selectDrivers =
      $this->db->select("*, ( 3959 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians(longitude) - radians($long) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) AS distance FROM tbl_users")
      ->where('categoryType',$catType)
      ->where('user_type',2)
      ->having('distance <=',$radius)
      ->order_by('distance', 'DESC')
     // ->limit(20, 0)
      ->get()->result();

      // print_r($this->db->last_query()); die;
      return $selectDrivers;

    }



    public function selMembership($id){
      $selMem = $this->db->select('tbl_driverMembership.driver_id,tbl_membership.membership,tbl_driverMembership.date_created')
                           ->from('tbl_driverMembership')
                           ->join('tbl_membership','tbl_membership.id = tbl_driverMembership.membership_id')
                           ->where('driver_id',$id)
                           ->where('status',1)
                           ->get()->row();

    return $selMem;
    }

    public function selectLogin($id){
      $selLogin = $this->db->select('*')
                           ->from('tbl_login')
                           ->where('user_id',$id)
                           ->where('status',1)
                           ->get()->result();

    return $selLogin;
    }


    public function avgRating($id){

    $rating = $this->db->select('AVG(rating) as avg_r')
                           ->from('tbl_driverRatings')
                           ->where('driver_id',$id)
                           ->get()->row();

    return $rating;

    }

        public function CustRating($id,$req_id){

    $rating = $this->db->select('rating as avg_r')
                           ->from('tbl_customerRatings')
                           ->where('user_id',$id)
                           ->where('req_id',$req_id)
                           ->get()->row();

    return $rating;

    }


    public function customChat_list($message){
      $chatList = $this->db->select('*')
                           ->from('tbl_chat')
                           ->group_start()
                           ->where('req_id',$message['req_id'])
                           ->where('from_id',$message['from_id'])
                           ->where('to_id',$message['to_id'])
                           ->group_end()
                           ->or_group_start()
                           ->where('req_id',$message['req_id'])
                           ->where('from_id',$message['to_id'])
                           ->where('to_id',$message['from_id'])
                           ->group_end()
                           ->get()->result();

     // print_r($this->db->last_query());

     return $chatList;
    }

    public function transactionData($user_id){

      $getData = $this->db->select('*')
      ->from('tbl_wallet')
      ->join('tbl_transactions','tbl_wallet.user_id = tbl_transactions.user_id',left)
      ->where('tbl_wallet.user_id',$user_id)
      ->get()->result();

      return $getData;

    }

    public function randomQuote_reply($quote_id,$spUser_id,$message){
       $this->db->where('quoteReq_id',$quote_id);
       $this->db->where('sp_id',$spUser_id);
       $this->db->update('tbl_random_quotesReq_Sp',$message);
      return($this->db->affected_rows())?1:0;


    }
    public function getCard($user_id){
      $getData = $this->db->select('card_no,isDefault')
      ->from('tbl_cardDetails')
      ->where('user_id',$user_id)
      ->get()->result();
      return $getData;
    }

    public function customReply_select($id){

      $data = $this->db->select('sp_id as serviceProvider_id,provider_comment,provider_price,date_answered')
                       ->from('tbl_random_quotesReq_Sp')
                       ->where('quoteReq_id',$id)
                       ->where('is_answered',1)
                       ->get()->result();
       return $data;


    }

    public function calculateFare($req_id){

      $selectFare = $this->db->select('tbl_bookingRequests.*,tbl_moveHistory.*,tbl_subCategory.jobRate_type,tbl_subCategory.kmCharge,tbl_subCategory.hourlyCharge')
      ->from('tbl_bookingRequests')
      ->join('tbl_moveHistory','tbl_moveHistory.req_id = tbl_bookingRequests.id')
      ->join('tbl_subCategory','tbl_subCategory.id = tbl_bookingRequests.subCategory_id')
      ->where('tbl_bookingRequests.id',$req_id)
      ->get()->row();
      if($selectFare->is_quote == 1){

        $fareUsed = $selectFare->acceptedPrice;

      }else{

        $fareUsed = $selectFare->totalprice;
      }


       //$startTime = new DateTime($selectFare->started_time);
       // $endTime = new DateTime($selectFare->completed_time);
       //$diff = $startTime->diff($endTime);
      $currTime = date('Y-m-d H:i:s');
      //print_r($diff->h.'hrs'.$diff->i.'min'); die;

      $dateDiff = intval((strtotime($currTime)-strtotime($selectFare->started_time))/60);
      $hours = intval($dateDiff/60);

$minutes = $dateDiff%60;
    if($selectFare->hourlyCharge != 0 && $hours >= $selectFare->hours){
            if($minutes < 15){
            $secTime = $hours;
            $totalTime = $secTime;
            $val = 0;
            $extraVal = '';
            }else if($minutes > 15 && $minutes < 30){
            $secTime = $hours;
            $totalTime = $secTime.'.'.$minutes;
            $val = 1;
            $MinCharge = $selectFare->hourlyCharge/2;
            $extraVal = $MinCharge;
            }else if($minutes > 30){
            $secTime = 1;
            $totalTime = $hours+$secTime;
            $val =0;
            $extraVal = $secTime * $selectFare->hourlyCharge;
            }

    $amountwithMinCharge =    $MinCharge + $fareUsed;
    $amountwithoutMinCharge = $secTime * $selectFare->hourlyCharge + $fareUsed;
    $overallCharge  = ($val == 1)?$amountwithMinCharge:$amountwithoutMinCharge;
    }else{
    $overallCharge  = $fareUsed;
    $extraVal = '';
    }

    if(!empty($selectFare->promo_codeId) && $selectFare->promo_codeId != 0){
    $getData = $this->db->select('*')
                        ->from('tbl_promocodes')
                        ->where('id',$selectFare->promo_codeId)
                        ->get()->row();
        // $get_percentage = $this->User_model->select_data('minBooking_charge','tbl_settings');
        // $percentage = $get_percentage[0]->minBooking_charge;
        // $promo_amount = ($percentage / 100) * $selectFare->totalprice;
     if($getData->type == 0){

      $dedAmount = $getData->value;
      $nwBalance = $overallCharge - $dedAmount;
     }else if($getData->type == 1){
       $dedAmount = ($getData->type / 100) * $overallCharge;
       $nwBalance = $overallCharge - $dedAmount;
     }
    }else{
       $nwBalance = $overallCharge;
    }
     $get_comPercentage = $this->User_model->select_data('minBooking_charge','tbl_settings');
     $fareResponse = array(
      'req_id'=> $selectFare->req_id,
      'iniBooking_percentage' => $get_comPercentage[0]->minBooking_charge,
      'requested_hours'=>$selectFare->hours,
      'job_hours'=>empty($totalTime)?'':$totalTime,
      'job_mins'=>$minutes,
      'hourly_charge'=>$selectFare->hourlyCharge,
      'booking_price'=>$fareUsed,
      'basefare'=>$selectFare->basefare,
      'servicefare'=>$selectFare->servicefare,
      'waypointfare'=>$selectFare->waypointfare,
      'extra_charge'=>empty($extraVal)?'':$extraVal,
      'peakHourCharge'=>$selectFare->peakHourCharge,
      'promo_discount'=>empty($dedAmount)?'':$dedAmount,
      'total_amount'=>$overallCharge
      );
     if(!empty($extraVal)){

     $updateTbl = $this->User_model->update_data('tbl_bookingRequests',array('afterHourCharges'=>$extraVal),array('id'=>$req_id));
     }
     return $fareResponse;
    }
//     public function customCancel_cron(){

//       $currDate = date('Y-m-d H:i:s');
//       $getData = $this->db->select('*')
//                           ->from('tbl_bookingRequests')
//                           ->where('is_accepted',0)
//                           ->where('is_started',0)
//                           ->where('is_completed',0)
//                           ->where('is_cancelled',0)
//                           ->get()->result();
//      if(!empty($getData)){

//       foreach ($getData as  $bookingData) {
//         $lat = $bookingData->pickup_lat;
//         $long = $bookingData->pickup_long;
//         $rType = 1;
//         $uType = 2;
//         $getProviders = $this->getLocation($lat,$long,$rType,$uType);

//         foreach ($getProviders as $Pro) {

//         }
//        //   $dt = new DateTime($bookingData->date_created);
//        //   $minsDate = $dt->modify('+ 30 mins');
//        //   $hrsDate = $dt->modify('+ 1 hour');
//        //   $mrHrsDate = $dt->modify('+ 90 mins');
//        // if($minsDate->format('Y-m-d H:i:s') == $currDate){

//        //   $pushData['message'] = "You have recieved a request for new task";
//        //   $pushData['action'] = "new move";
//        // } else if($hrsDate->format('Y-m-d H:i:s') == $currDate){
//        //    $pushData['message'] = "You have recieved a request for new task";
//        //    $pushData['action'] = "new move";

//        // }else if($mrHrsDate->format('Y-m-d H:i:s') == $currDate){
//        //     $pushData['message'] = "Your booking has been cancelled";
//        //     $pushData['action'] = "cancelBooking";

//        //         $this->db->where('TIMESTAMP(booking_date,booking_time) <=',$currDate);
//        //         $this->db->where('is_accepted',0);
//        //         $this->db->where('is_started',0);
//        //         $this->db->where('is_completed',0);
//        //         $this->db->update('tbl_bookingRequests',array('is_cancelled'=>1));

//        // }





// }



//      // $getLogin = $this->db->select('*')
//      //                      ->from('tbl_login')
//      //                      ->where('user_id',$logvalue->user_id)
//      //                      ->where('status',1)
//      //                      ->get()->result();
//      //                  foreach ($getLogin as $value) {

//      //                    $pushData['req_id'] = $logvalue->id;

//      //                    if($getUser[0]->notification_status == 0){

//      //                        $pushData['Utype'] = 1;
//      //                        $pushData['token'] = $value->token_id;
//      //                        if($value->device_id == 1){
//      //                         $this->User_model->iosPush($pushData);
//      //                        }else if($value->device_id == 0){
//      //                         $this->User_model->androidPush($pushData);
//      //                        }

//      //                       }





//                           }
//               // $getBalance = $this->User_model->select_data('*','tbl_wallet',array('user_id'=>$logvalue->user_id));
//               // $get_percentage = $this->User_model->select_data('minBooking_charge','tbl_settings');
//               // $percentage = $get_percentage[0]->minBooking_charge;
//               // $req_amount = ($percentage / 100) * $getData[0]->totalprice;
//               // $nwBalance = $getBalance[0]->balance + $req_amount;
//               // $uptDAta = $this->User_model->update_data('tbl_wallet',array('balance'=>$nwBalance,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$logvalue->user_id));


//     }


       public function customCancel_cron(){

     $currDate  = date('Y-m-d H:i:s');

    $nw = $this->db->query(" SELECT * FROM tbl_bookingRequests WHERE '".$currDate."' > DATE_ADD(date_created, INTERVAL 1 MINUTE) and is_accepted = 0 and is_started = 0 and is_completed = 0 and is_cancelled = 0 and is_quote = 0 ")->result();


    if(!empty($nw)){
      foreach ($nw as $logvalue) {
        $getUser = $this->db->select('*')
                          ->from('tbl_users')
                          ->where('id',$nw->user_id)
                          ->get()->row();

     $getLogin = $this->db->select('*')
                          ->from('tbl_login')
                          ->where('user_id',$logvalue->user_id)
                          ->where('status',1)
                          ->get()->result();
                      foreach ($getLogin as $value) {
                        $pushData['message'] = "Your booking has been cancelled";
                        $pushData['action'] = "cancelBooking";
                        $pushData['req_id'] = $logvalue->id;

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

              $getBalance = $this->User_model->select_data('*','tbl_wallet',array('user_id'=>$logvalue->user_id));
              $get_percentage = $this->User_model->select_data('minBooking_charge','tbl_settings');
              $percentage = $get_percentage[0]->minBooking_charge;
              $req_amount = ($percentage / 100) * $logvalue->totalprice;
              $nwBalance = $getBalance[0]->balance + $req_amount;
              $uptDAta = $this->User_model->update_data('tbl_wallet',array('balance'=>$nwBalance,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$logvalue->user_id));
             // print_r($nwBalance); die;

               $transArray = array(
              'amount_credited' =>$req_amount,
              'user_id'         =>$logvalue->user_id,
              'txnId'           =>'ride_cancelled_refund',
              'date_created'    =>date('Y-m-d H:i:s')
              );
              $transResponse = $this->User_model->insert_data('tbl_transactions',$transArray);

              // $uptDataNw = $this->User_model->update_data('tbl_wallet',array('balance'=>$nwBalance,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$getData[0]->user_id));
            $delQuery = $this->db->query("update tbl_bookingRequests set is_cancelled = 1 WHERE '".$currDate."' > DATE_ADD(date_created, INTERVAL 1 MINUTE) and is_accepted = 0 and is_started = 0 and is_completed = 0 and is_cancelled = 0 and is_quote = 0");
            $uptQuery = $this->db->query("update tbl_moveHistory set cancelled_time = '".$currDate."' WHERE req_id =".$nw->id);

                }
              }
            }


    public function cancel_QuoteCron(){


     $currDate  = date('Y-m-d H:i:s');

    $nw = $this->db->query(" SELECT * FROM tbl_bookingRequests WHERE '".$currDate."' > DATE_ADD(date_created, INTERVAL 60 MINUTE) and is_accepted = 0 and is_started = 0 and is_completed = 0 and is_cancelled = 0 and is_quote = 1 ")->result();


    if(!empty($nw)){
      foreach ($nw as $logvalue) {
        $getUser = $this->db->select('*')
                          ->from('tbl_users')
                          ->where('id',$nw->user_id)
                          ->get()->row();

     $getLogin = $this->db->select('*')
                          ->from('tbl_login')
                          ->where('user_id',$logvalue->user_id)
                          ->where('status',1)
                          ->get()->result();
                      foreach ($getLogin as $value) {
                        $pushData['message'] = "Your booking has been cancelled";
                        $pushData['action'] = "cancelBooking";
                        $pushData['req_id'] = $logvalue->id;

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

              $getBalance = $this->User_model->select_data('*','tbl_wallet',array('user_id'=>$logvalue->user_id));
              $get_percentage = $this->User_model->select_data('minBooking_charge','tbl_settings');
              $percentage = $get_percentage[0]->minBooking_charge;
              $req_amount = ($percentage / 100) * $logvalue->totalprice;
              $nwBalance = $getBalance[0]->balance + $req_amount;
              $uptDAta = $this->User_model->update_data('tbl_wallet',array('balance'=>$nwBalance,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$logvalue->user_id));
             // print_r($nwBalance); die;

               $transArray = array(
              'amount_credited'=>$req_amount,
              'user_id'=>$logvalue->user_id,
              'txnId'=>'refund',
              'date_created'=>date('Y-m-d H:i:s')
              );
              $transResponse = $this->User_model->insert_data('tbl_transactions',$transArray);

              // $uptDataNw = $this->User_model->update_data('tbl_wallet',array('balance'=>$nwBalance,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$getData[0]->user_id));
            $delQuery = $this->db->query("update tbl_bookingRequests set is_cancelled = 1 WHERE '".$currDate."' > DATE_ADD(date_created, INTERVAL 60 MINUTE) and is_accepted = 0 and is_started = 0 and is_completed = 0 and is_cancelled = 0 and is_quote = 1");
            $uptQuery = $this->db->query("update tbl_moveHistory set cancelled_time = '".$currDate."' WHERE req_id =".$nw->id);

                }
              }

            }


    public function customLate_cron(){

        $currDate = date('Y-m-d H:i:s');
        $getData = $this->db->select('*')
                            ->from('tbl_bookingRequests')
                            ->where('TIMESTAMP(booking_date,booking_time) <=',$currDate)
                            ->where('is_accepted',1)
                            ->where('is_started',0)
                            ->where('is_completed',0)
                            ->where('is_cancelled',0)
                            ->get()->result();

        if(!empty($getData)){
          foreach ($getData as $customvalue) {

        $getLogin = $this->db->select('*')
                             ->from('tbl_login')
                             ->where('user_id',$customvalue->accepted_by)
                             ->where('status',1)
                             ->get()->result();
                      foreach ($getLogin as $value) {
                        $pushData['message'] = "Your are getting late for your booking";
                        $pushData['spMessage'] = "Your are getting late for your booking";
                        $pushData['action'] = "lateWarning";
                        $pushData['req_id'] = $customvalue->id;
                        $pushData['Utype'] = 2;
                        $pushData['token'] = $value->token_id;
                            if($value->device_id == 1){
                             $this->User_model->iosPush($pushData);
                            }else if($value->device_id == 0){
                             $this->User_model->androidPush($pushData);
                            }


                          }
            }
          }

    }


    public function selectmoney_data($message){
         $getmoney = $this->db->select('*')
                             ->from('tbl_stripeCustomer_details')
                             ->where('card_no',$message['card_no'])
                             ->where('user_id',$message['user_id'])
                             ->get()->result();

       return $getmoney;
    }

      public function androidPush($pushData=null){

    $mytime = date("Y-m-d H:i:s");

    if($pushData['Utype'] == 2){
    $api_key = "AAAAVoM4uNQ:APA91bH0qje7eQquF9p1v-w5vJUOSSxVpqFYnnYePUjldaIuOENladiyA1JrC1dRl_7asQiQlUxmelbePiOhqTHUzJiAULDFPJZYzWMHUp84an02gT3CVpTGM15DkQo6yvG_iMdqJ7Yi"; //for driver app
    }else if($pushData['Utype'] == 1){
     $api_key = "AIzaSyBaMNwomWh3o884269FmM9zYC1HdylJDco";  //for user app
    }
    $fcm_url = 'https://fcm.googleapis.com/fcm/send';
    $fields = array(
      'registration_ids' => array(
        $pushData['token']
      ) ,
      'data' => array(
       // "message" => urldecode($pushData['message1']) ,
        "message" =>$pushData['message'] ,
        "action" => $pushData['action'],
        'req_id' => $pushData['req_id'],
        "from_name" =>$pushData['from_name'] ,
        "from_id" =>$pushData['from_id'],
        "from_pic"=>$pushData['profile_pic'],
        'is_quote' => $pushData['is_quote'],
        'quote_price' => $pushData['quote_price'],
        'value' => $pushData['value'],
        'quote_id'=>$pushData['quote_id'],
        "time" => $mytime
      ) ,
    );

    $headers = array(
      'Authorization: key=' . $api_key,
      'Content-Type: application/json'
    );
    $curl_handle = curl_init();

    // set CURL options

    curl_setopt($curl_handle, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($curl_handle, CURLOPT_URL, $fcm_url);
    curl_setopt($curl_handle, CURLOPT_POST, true);
    curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, json_encode($fields));
    $response = curl_exec($curl_handle);

    curl_close($curl_handle);
  }

  public function iosPush($pushData=null) {

    $deviceToken = $pushData['token'];
    $passphrase = '';
    $ctx = stream_context_create();
    if($pushData['Utype'] == 1){
    stream_context_set_option($ctx, 'ssl', 'local_cert', './certs/moveDev.pem');
    stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
    }else if($pushData['Utype'] == 2){

    stream_context_set_option($ctx, 'ssl', 'local_cert', './certs/driverDev.pem');
    stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
    }

    // Open a connection to the APNS server

    $fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);
   // if (!$fp) exit("Failed to connect: $err $errstr" . PHP_EOL);
    if($pushData['is_quote'] == 1){
    	 $body['aps'] = array(
        "message" =>$pushData['message'] ,
        "action" => $pushData['action'],
        'req_id' => $pushData['req_id'],
        "from_name" =>$pushData['from_name'] ,
        "from_id" =>$pushData['from_id'],
        "from_pic"=>$pushData['profile_pic'],
        'is_quote' => $pushData['is_quote'],
        'quote_price' => $pushData['quote_price'],
        'quote_id'=>$pushData['quote_id'],
        'value' => $pushData['value'],
        'alert' => $pushData['spMessage'],
        'sound' => 'default'
    );

    }else{
    	 $body['aps'] = array(
        "message" =>$pushData['message'] ,
        "action" => $pushData['action'],
        'req_id' => $pushData['req_id'],
        "from_name" =>$pushData['from_name'] ,
        "from_id" =>$pushData['from_id'],
        "from_pic"=>$pushData['profile_pic'],
        'is_quote' => $pushData['is_quote'],
        'quote_price' => $pushData['quote_price'],
        'quote_id'=>$pushData['quote_id'],
        'value' => $pushData['value'],
        'alert' => $pushData['spMessage'],
        'sound' => 'default'
    );

    }



    // Encode the payload as JSON

    $payload = json_encode($body);

    // Build the binary notification

    $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

    // Send it to the server

    $result = fwrite($fp, $msg, strlen($msg)); //echo "<pre>"; print_r($result);die;
   // echo'<pre>';
   // // print_r($result);
   //  print_r($result); die;
    fclose($fp);
  }

  /* old code for custom cancel cron */
   // start-------------------------------------------------------

    //   public function customCancel_cron(){

    //   $currDate = date('Y-m-d H:i:s');
    //   $getData = $this->db->select('*')
    //                       ->from('tbl_bookingRequests')
    //                       ->where('TIMESTAMP(booking_date,booking_time) <=',$currDate)
    //                       ->where('is_accepted',0)
    //                       ->where('is_started',0)
    //                       ->where('is_completed',0)
    //                       ->where('is_cancelled',0)
    //                       ->get()->result();
    //  if(!empty($getData)){
    //   foreach ($getData as $logvalue) {


    //  $getLogin = $this->db->select('*')
    //                       ->from('tbl_login')
    //                       ->where('user_id',$logvalue->user_id)
    //                       ->where('status',1)
    //                       ->get()->result();
    //                   foreach ($getLogin as $value) {
    //                     $pushData['message'] = "Your booking has been cancelled";
    //                     $pushData['action'] = "cancelBooking";
    //                     $pushData['req_id'] = $logvalue->id;

    //                     if($getUser[0]->notification_status == 0){

    //                         $pushData['Utype'] = 1;
    //                         $pushData['token'] = $value->token_id;
    //                         if($value->device_id == 1){
    //                          $this->User_model->iosPush($pushData);
    //                         }else if($value->device_id == 0){
    //                          $this->User_model->androidPush($pushData);
    //                         }

    //                        }
    //                       }
    //           $getBalance = $this->User_model->select_data('*','tbl_wallet',array('user_id'=>$logvalue->user_id));
    //           $get_percentage = $this->User_model->select_data('minBooking_charge','tbl_settings');
    //           $percentage = $get_percentage[0]->minBooking_charge;
    //           $req_amount = ($percentage / 100) * $getData[0]->totalprice;
    //           $nwBalance = $getBalance[0]->balance + $req_amount;
    //           $uptDAta = $this->User_model->update_data('tbl_wallet',array('balance'=>$nwBalance,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$logvalue->user_id));

    //           // $uptDataNw = $this->User_model->update_data('tbl_wallet',array('balance'=>$nwBalance,'date_updated'=>date('Y-m-d H:i:s')),array('user_id'=>$getData[0]->user_id));
    //            $this->db->where('TIMESTAMP(booking_date,booking_time) <=',$currDate);
    //            $this->db->where('is_accepted',0);
    //            $this->db->where('is_started',0);
    //            $this->db->where('is_completed',0);
    //            $this->db->update('tbl_bookingRequests',array('is_cancelled'=>1));
    //           }
    //         }
    //  // $query  = $this->db->query("update tbl_bookingRequests set is_cancelled = 1 where TIMESTAMP(booking_date,booking_time) <= '".$currDate."'  and is_accepted = 0 and is_started = 0 and is_completed = 0");
    //   //print_r($this->db->last_query()); die;


    // }

    // end ---------------------------------------------------




}
