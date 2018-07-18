<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function __construct(){
      parent::__construct();
        
    }
    public function ins($data){
    $sel = $this->db->query("SELECT * FROM tbl_users Where email = '".$data['email']."' " );
		$row = $sel->row();
		$email = $row->email;
		if(empty($row)){
	    	$inss = $this->db->query("INSERT INTO `tbl_users`(`fname`, `lname`,`email`,`password`, `phone`,`signupVia_email`,`ref_code`,`date_created`) VALUES ('".$data['fname']."','".$data['lname']."','".$data['email']."','".$data['password']."','".$data['phone']."','".$data['signupVia_email']."','".$data['ref_code']."',NOW())");
	    	return "success";
	    }else{
	    	return "error";
	    }
    }
    public function insert_detl($data){
      $ins = $this->db->insert('tbl_users',$data);
      return $ins;
    }
    public function log($data){
    	$sel = $this->db->query("SELECT * FROM tbl_users Where email = '".$data['email']."' and password = '".$data['password']."' ");
  		$rows = $sel->row();
  		$email = $rows->email;
  		if($email != $data['email']){
  			return "error";
  		}else{
  			return "success";
  		}
    }
    public function reset_password($email){
      $select = $this->db->select('*');
                $this->db->from('tbl_users');
                $this->db->where('email',$email);
      $chck_row = $this->db->get()->row();
      if(empty($chck_row)){
        return "empty";
      }else{
        $email1 = $chck_row->email;
        $userid = $chck_row->id;
        $static_key = "afvsdsdjkldfoiuy4uiskahkhsajbjksasdasdgf43gdsddsf";
        $id = $userid . "_" . $static_key;
        $result['b_id'] = base64_encode($id);
        //print_r($result['b_id']);
        //$result['userid'] = $chck_row->id;
        $result['fname'] = $chck_row->fname;
        $result['lname'] = $chck_row->lname;
        return $result;
      }
    }
    public function fbins($data){
    	$sel = $this->db->query("SELECT email,fb_id from tbl_users Where email = '".$data['email']."' and fb_id = '".$data['fb_id']."'")->row();
      $email = $sel->email;
      $id = $sel->fb_id;
      if(empty($sel)){
	     return "1";
      }else{       
        return "2";        
      }	    
    }
    public function googleins($data){
      $sel = $this->db->query("SELECT email,google_id from tbl_users Where email = '".$data['email']."' and google_id = '".$data['google_id']."'")->row();
      $email = $sel->email;
      $id = $sel->google_id;
      if(empty($sel)){
        return "1";
      }else{       
        return "2";        
      }     
    }
    public function ck($data){
    	// $sel = $this->db->query("SELECT * FROM tbl_")
    }
       public function google($data){
    	
	    	$deatil = $this->db->insert('tbl_users',$data);
	    	return $detail;
	    
    }
    public function getuses(){
    $this->db->select(' *');
    $this->db->from('tbl_bookingRequests');
     $this->db->where('user_id',15);
   // $this->db->from('tbl_notifications');
   // $this->db->where('id',$userid);
    $data = $this->db->get()->result_array();
   // print_r($data);
    //die();

    return $data;
    }
    public function hstry($email){
      $slct11 = $this->db->query("SELECT id FROM tbl_users WHERE email = '".$email."' ");
      $u_id = $slct11->row();
      $id = $u_id->id;     
      $bok_id = $this->db->query("SELECT id FROM tbl_bookingRequests Where user_id = '".$id."' ORDER BY `id` DESC limit 1")->row()->id;      
      $book_status = $this->db->query("SELECT status FROM tbl_moveHistory Where req_id = '".$book_id."'")->row()->status;
      if($book_status == 1){
        $slct1  = $this->db->query("SELECT pickup_lat,dropOff_lat,path_wayPoints,booking_date,booking_time,pickup_long,dropOff_long,id,totalprice,date_created FROM `tbl_bookingRequests` WHERE is_accepted = 0 and is_quote = 0 and is_cancelled = 0 and is_completed = 0 and is_started = 0 and user_id = '".$id."' ");         
        $roww = $slct1->result();
        return $roww;
      } 

    }
    public function actvte($email){
      $slct11 = $this->db->query("SELECT id FROM tbl_users WHERE email = '".$email."' ");
      $u_id = $slct11->row();
      $id = $u_id->id;
      $slct1  = $this->db->query("SELECT pickup_lat,dropOff_lat,pickup_long,dropOff_long,id,booking_date,booking_time,totalprice,path_wayPoints FROM `tbl_bookingRequests` WHERE ( (is_accepted=1 or is_started=1) and is_completed=0 ) and is_cancelled =0 and user_id = '".$id."' ");
      $sngle = $slct1->row()->id;
      $move = $this->db->select('tbl_bookingRequests.id as book_id,tbl_bookingRequests.user_id as userid,tbl_moveHistory.req_id as req_id,status,accepted_time,started_time');
              $this->db->from('tbl_bookingRequests');
              $this->db->join('tbl_moveHistory','tbl_moveHistory.req_id = tbl_bookingRequests.id');
              $this->db->where('tbl_bookingRequests.user_id',$id);
              $this->db->where('tbl_bookingRequests.id',$sngle);
      $show = $this->db->get()->row();
      $roww = $slct1->result();
      $data = array(
        'move'=>$show,
        'book'=>$roww
      );
      //$move
      //print_r($roww);die;
      return $data;

    }
    public function cmplte($email){
      $slct11 = $this->db->query("SELECT id FROM tbl_users WHERE email = '".$email."' ");
      $u_id = $slct11->row();
      $id = $u_id->id;
      $slct1  = $this->db->query("SELECT pickup_lat,dropOff_lat,afterHourCharges,booking_date,booking_time,pickup_long,dropOff_long,id,path_wayPoints,totalprice FROM `tbl_bookingRequests` WHERE  is_completed = 1 and user_id = '".$id."' ORDER BY `id` DESC");
      $sngle = $slct1->row()->id;
      $move = $this->db->select('tbl_bookingRequests.id as book_id,tbl_bookingRequests.user_id as userid,tbl_moveHistory.req_id as req_id,status,completed_time');
              $this->db->from('tbl_bookingRequests');
              $this->db->join('tbl_moveHistory','tbl_moveHistory.req_id = tbl_bookingRequests.id');
              $this->db->where('tbl_bookingRequests.user_id',$id);
              $this->db->where('tbl_bookingRequests.id',$sngle);
      $show = $this->db->get()->row();
      $roww = $slct1->result();
      $data = array(
        'move'=>$show,
        'book'=>$roww
      );
      //$roww = $slct1->result();
      //print_r($roww);die;
      return $data;

    }
    public function cncl($email){
      $slct11 = $this->db->query("SELECT id FROM tbl_users WHERE email = '".$email."' ");
      $u_id = $slct11->row();
      $id = $u_id->id;
      $slct1  = $this->db->query("SELECT pickup_lat,dropOff_lat,pickup_long,booking_date,booking_time,path_wayPoints,dropOff_long,id,date_created,totalprice FROM `tbl_bookingRequests` WHERE  is_cancelled = 1 and user_id = '".$id."' ORDER BY `id` DESC");
       $sngle = $slct1->row()->id;
      $move = $this->db->select('tbl_bookingRequests.id as book_id,tbl_bookingRequests.user_id as userid,tbl_moveHistory.req_id as req_id,status,cancelled_time');
              $this->db->from('tbl_bookingRequests');
              $this->db->join('tbl_moveHistory','tbl_moveHistory.req_id = tbl_bookingRequests.id');
              $this->db->where('tbl_bookingRequests.user_id',$id);
              $this->db->where('tbl_bookingRequests.id',$sngle);
      $show = $this->db->get()->row();
      $roww = $slct1->result();
      $data = array(
        'move'=>$show,
        'book'=>$roww
      );
      //$roww = $slct1->result();
      //print_r($roww);die;
      return $data;
      //$roww = $slct1->result();
      //print_r($roww);die;
      //return $roww;

    }
    public function notifiy(){
      $sel = $this->db->select('id');
             $this->db->from('tbl_users');
             $this->db->where('email',$_SESSION['email']);
      $get_id = $this->db->get()->row()->id;
      //print_r($get_id);die; 
      $sel = $this->db->query("SELECT * FROM tbl_notifications Where user_id ='".$get_id."'  ORDER BY `date_created` DESC ")->result();
      return $sel;
    }
    public function SelectData($email){
          $this->db->select('*');
          $this->db->from('tbl_users');
          $this->db->where('email', $email);
          $query = $this->db->get();
          $row = $query->row();
          $UserId = $row->id;

          $this->db->select('*');
          $this->db->from('tbl_promocodes');
          $this->db->order_by('id desc');
          $query = $this->db->get()->result();
          return $query;
          // $type = $query[0]->type;
          // $amount = $query->value;
          // $code = $query->promo_code;
          // $send_data = "You can get <p style='color:blue;'>$". $amount . " discount </p> on new booking using <p style='color:blue;'>". $code . "</p>";
          // $send_data1 = "You can get <p style='color:blue;'>". $amount . "% discount </p> on new booking using <p style='color:blue;'>". $code . "</p>" ;
          // print_r($send_data);die;
          //return $result;
      

    }
    public function insertbooking($data){
      $ins = $this->db->insert('tbl_bookingRequests',$data);
      return $ins;
    }
    public function quotedata(){
      //$sel = $this->db->query("SELECT * FROM")
    }
    public function deleted($id,$data){
      $sel = $this->db->where('id',$id);
             $this->db->update('tbl_bookingRequests',$data);
       return "update";
    }
    public function quoteInsert($data){
      $ins = $this->db->insert('tbl_random_quotesReq',$data);
      return $ins;
      //return "ok";
    }
    public function yourQuote(){
      $userid = $_SESSION['user_id'];
      $selt = $this->db->select('id,is_quote,pickup_lat,dropOff_lat,pickup_long,dropOff_long,id,booking_date,booking_time,path_wayPoints,totalprice,date_created');
              $this->db->from('tbl_bookingRequests');
              $this->db->where('user_id',$userid);
              $this->db->where('is_quote',1);
              $this->db->where('is_cancelled',0);
              $this->db->where('is_completed',0);
              $this->db->where('is_started',0);
              $this->db->where('is_accepted',0);
      $selt1 = $this->db->get();
      $result = $selt1->result();
      return $result;   
    }
   public function acc_update1($dataa){
      $email = $_SESSION['email'];
      $ins = $this->db->where('email',$email);
             $this->db->update('tbl_users',$dataa);
      return "updated";
    }
    public function acc_update($data1){
      $email = $_SESSION['email'];
      $sel = $this->db->query("SELECT profile_pic FROM tbl_users WHERE email = '".$email."' ");
      $show = $sel->row()->profile_pic;
      //print_r($show);die;
      //$id = $show;
      //print_r($id);die;
     //unlink($id);
      $ins = $this->db->where('email',$email);
             $this->db->update('tbl_users',$data1);
      return "updated";
    }
    public function proposal($id){
      $join = $this->db->select('tbl_random_quotesReq.id,categoryName,subCategoryName,questions,description,tbl_random_quotesReq.date_created');
            $this->db->from('tbl_random_quotesReq');
            $this->db->join('tbl_categories','tbl_categories.id = tbl_random_quotesReq.cat_id');
            $this->db->join('tbl_subCategory','tbl_subCategory.id = tbl_random_quotesReq.subCat_id');
            $this->db->where('tbl_random_quotesReq.id',$id);
      $join1 = $this->db->get();
      $rows = $join1->row();
      return $rows;
    }
    public function get_move_info($id){
      $qry = $this->db->query("SELECT * FROM tbl_bookingRequests WHERE id = '".$_GET['id']."' ");
      $ro = $qry->row();
      $data1=array(
        'show'=>$ro
      );
      $sngle = $_GET['id'];
      $id = $_SESSION['user_id'];
      // $join = $this->db->select('tbl_bookingRequests.id,user_id,pickup_location,dropOff_location,pickup_lat,pickup_long,dropOff_lat,dropOff_long,booking_date,booking_time,accepted_by,is_started,is_completed,estimatedprice,totalprice,questions,name,phone,tbl_moveHistory.id as idd,tbl_moveHistory.status,tbl_moveHistory.req_id,tbl_moveHistory.accepted_time,tbl_moveHistory.started_time,tbl_moveHistory.completed_time,tbl_moveHistory.cancelled_time');
      //   $this->db->from('tbl_bookingRequests');
      //   $this->db->join('tbl_moveHistory','tbl_moveHistory.id = tbl_bookingRequests.accepted_by');
      //   $this->db->where('tbl_bookingRequests.id',$id);
      // $gett = $this->db->get();
      // $row = $gett->row();

      $move = $this->db->select('tbl_bookingRequests.id as book_id,user_id,category_id,pickup_location,path_wayPoints,dropOff_location,pickup_lat,pickup_long,dropOff_lat,dropOff_long,booking_date,booking_time,accepted_by,is_started,is_completed,estimatedprice,totalprice,questions,afterHourCharges,time,name,phone,req_id,driver_id,categoryType,hours,distance,status,accepted_time,extra_fare,started_time,completed_time,services,is_quote,description,cancelled_time,cancelled_by');
              $this->db->from('tbl_bookingRequests');
              $this->db->join('tbl_moveHistory','tbl_moveHistory.req_id = tbl_bookingRequests.id');
              $this->db->where('tbl_bookingRequests.user_id',$id);
              $this->db->where('tbl_bookingRequests.id',$sngle);
      $show = $this->db->get()->row();

      $category = $this->db->select('categoryName,tbl_categories.image,subCategoryName,tbl_subCategory.image as imagee');
                  $this->db->from('tbl_categories');
                  $this->db->join('tbl_subCategory','tbl_subCategory.category_id = tbl_categories.id');
                  $this->db->where('tbl_categories.id',$show->category_id);
      $cat_name = $this->db->get()->row();

      $driver = $this->db->select('driver_id,profile_pic,fname,lname');
                $this->db->from('tbl_users');
                $this->db->join('tbl_moveHistory','tbl_moveHistory.driver_id = tbl_users.id');
                $this->db->where('tbl_users.id',$show->driver_id);
        $dd = $this->db->get()->row();
        //print_r($dd);die;
      $driver_rating = $this->db->select('*');
                       $this->db->from('tbl_driverRatings');
                       $this->db->where('request_id',$sngle);
      $drvr_rate = $this->db->get()->row();

      $fare_driver = $this->db->select('*');
                     $this->db->from('tbl_settings');
      $fare_1 = $this->db->get()->row();

      $data=array(
        'category'=>$cat_name,
        'driver'=>$dd,
        'show'=>$show,
        'fare_cal'=>$fare_1,
        'rating'=>$drvr_rate
      );
      //print_r($row);die;
      //print_r($row);die;
      $status = $show->status;
      if($status == 0){
        return $data1;
      }else{
        return $data;
      }
      // print_r($this->db->last_query());die();
      // print_r($row);
    }
    public function updtePw($data){
      $newpass = array(
        'password'=>$data['newpass']);
      $email = $_SESSION['email'];
      $sel = $this->db->select('password');
             $this->db->from('tbl_users');
             $this->db->where('email',$email);
             $this->db->where('password',$data['password']);
      $sel1 = $this->db->get();
      $row = $sel1->row()->password;
      //print_r($row);
      if($row == $data['password']){
        $upd = $this->db->where('email',$email);
               $this->db->update('tbl_users',$newpass);
        return "success";
      }else{
        return "error";
      }
    }

    public function coupondata($data){
      $sel = $this->db->select('*');
            $this->db->from('tbl_promocodes');
            $this->db->where('promo_code',$data);
      $sd= $this->db->get();
      //print_r($selct);die;
      $row = $sd->row();
        if(!empty($row)){
          $expire = $row->expiry_date;
          $current_date = date('Y-m-d H:i:s');
          // if($expire < $current_date){
          //   echo "expire";die;
          // }else{
            $promo_id = $row->id;
            $name = $row->name;
            $usage = $row->usage;
            $select1 = $this->db->query("SELECT promo_codeId FROM tbl_bookingRequests WHERE promo_codeId = '".$promo_id."' and user_id = '".$_SESSION['user_id']."'");
            $num_sngle = $select1->num_rows();
            //print_r($num_sngle);die;
            $select = $this->db->query("SELECT promo_codeId FROM tbl_bookingRequests WHERE promo_codeId = '".$promo_id."'");
            $num = $select->num_rows();
            // print_r($usage);die;
            if($usage == 0){
              $max_use = 10;
             //print_r($num);die;
              // print_r($num);echo "<pre>";print_r($num_sngle);die();
              if($num > $max_use){
                return "maximum";
              }else{
                //print_r($row);die();
                return $row;
              }
            }elseif($usage == 1){
              $max_use1 = 20;
              if($num > $max_use1){
                return "maximum";
              }else{
                return $row;
              }
            }elseif($usage == 2){
              $max_use2 = 30;
              if($num > $max_use2){
                return "maximum";
              }else{
                return $row;
              }
            }elseif($usage == 3){
              $max_use3 = 40;
              if($num > $max_use3){
                return "maximum";
              }else{
                return $row;
              }
            }elseif($usage == 4){
              $max_use4 = 50;
              if($num > $max_use4){
                return "maximum";
              }else{
                return $row;
              }
            }elseif($usage == 5){
              return $row;
            }else{
              return "2";
            }
          //}
          //return $row;
        }else{
          return "2";
        }
    }
    // public function insert_card($data){
    //   $insert = $this->db->insert('tbl_cardDetails',$data);
    //   return "1";
    // }.


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
   // echo"there";
   // print_r($result);
    fclose($fp);
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

    public function insert_data($tbl_name,$data)                                         /* Data insert */
    {
      $this->db->insert($tbl_name, $data);

        $insert_id = $this->db->insert_id();
        return $insert_id;

    }
        public function update_data($tbl_name,$data,$where)                                    /* Update data */
    {
      $this->db->where($where);
      $this->db->update($tbl_name,$data);

     return($this->db->affected_rows())?1:0;
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
      // ->having('distance <=',$radius)
      // ->order_by('distance', 'DESC')
     // ->limit(20, 0)
      ->get()->result();

      // print_r($this->db->last_query()); die;
      return $selectDrivers;

    }
    public function insert_card($data_card,$data_cust){
      $userid = $_SESSION['user_id'];
      $sel = $this->db->select('tbl_cardDetails.isDefault','tbl_stripeCustomer_details.is_default');
             $this->db->from('tbl_cardDetails');
             $this->db->join('tbl_stripeCustomer_details','tbl_stripeCustomer_details.user_id = tbl_cardDetails.user_id');
             $this->db->where('tbl_cardDetails.user_id',$userid);
      $row = $this->db->get()->row();
      //$type = $row->isDefault;
      if(empty($row)){
        $ins = $this->db->insert('tbl_cardDetails',$data_card);
        $ins1 = $this->db->insert('tbl_stripeCustomer_details',$data_cust);
        //$last_id = $this->db->query("SELECT id FROM tbl_stripeCustomer_details Where user_id = '".$userid."'")->row()->id;
        //$_SESSION['p_uid'] = $last_id;
        return "1";
      }else{
        $dataa = array(
          'user_id'=>$data_card['user_id'],
          'token_id'=>$data_card['token_id'],
          'card_no'=>$data_card['card_no'],
          'isDefault'=>1,
          'date_created'=>date('Y-m-d H:i:s')
        );
        $dataa1 = array(
          'user_id'=>$data_cust['user_id'],
          'customer_id'=>$data_cust['customer_id'],
          'card_no'=>$data_cust['card_no'],
          'is_default'=>1,
          'date_created'=>date('Y-m-d H:i:s')
        );
       $insrt = $this->db->insert('tbl_cardDetails',$dataa);
       $insrt1 = $this->db->insert('tbl_stripeCustomer_details',$dataa1);
        return "1";
      }
    }
    public function wallet_val($amt){
      $id = $_SESSION['user_id'];
      $email = $_SESSION['email'];
      $c_type =  $_SESSION['coupen_type'];
      $c_amt =  $_SESSION['coupen_amount'];
      $c_code = $_SESSION['coupen_code'];
      $settng_cal = $this->db->query("SELECT * FROM tbl_settings")->row()->minBooking_charge;
      $cal_dedt = $amt * ($settng_cal/100);
      $slt = $this->db->query("SELECT * FROM tbl_wallet Where user_id = '".$_SESSION['user_id']."'")->row();
      if(empty($slt)){
        return "walt_empty";
      }else{
        $amtt = $slt->balance;
        if($amt <= $amtt){
          if($c_type == 0){
            $dedct_amt = $amt - $c_amt;
            $bal = $amtt - $dedct_amt;
          }elseif($c_type == 1){
            $dedct_per = $amt * $c_amt/100;
            $bal = $amtt - $dedct_per;
          }else{
            $bal = $amtt - $cal_dedt;
          }
            $upd_bal = array(
              'balance'=>$bal,
              'date_updated'=>date('Y-m-d H:i:s')
            );
            $ins_bal = array(
              'user_id'=>$_SESSION['user_id'],
              'card_no'=>0,
              'amount_credited'=>0,
              'amount_debited'=>$amt,
              'txnId'=>'from_wallet',
              'date_created'=>date('Y-m-d H:i:s')
            );

            // $selct_wal = $this->db->query("SELECT * FROM tbl_users Where email = '".$email."'")->row();
            // $selct_ref = $this->db->query("SELECT ref_code,email FROM tbl_users Where ref_code = '". $c_code."'")->row();


            $upd = $this->db->where('user_id',$id);
                   $this->db->update('tbl_wallet',$upd_bal);

            $ins = $this->db->insert('tbl_transactions',$ins_bal);
            if(isset($_SESSION['review_data'])){
              $dataa = $_SESSION['review_data'];
              $insert = $this->db->insert('tbl_bookingRequests',$dataa);
              $last_id = $this->db->insert_id();
            }else{
              $dataa1 = $_SESSION['review_quote_data'];
              $insert = $this->db->insert('tbl_bookingRequests',$dataa1);
              $last_id = $this->db->insert_id();
            }
            $retn = array(
                'last_id'=>$last_id,
                'type'=>1
              );
            return $retn;
            //print_r($ins);
            //return $ins;
        }else{
          return "greater";
        }
      }
    }
    public function card_detail($query){
      $selct = $query->row();
      $select = $query->result();
      if(empty($selct) && empty($select)){
        return "empty";
      }else{
        return $select;
      }
    }
    public function token($data){
      $sel = $this->db->query("SELECT customer_id FROM tbl_stripeCustomer_details WHERE id = '".$data['id']."' and card_no = '".$data['card']."' ")->row();
      $token = $sel->customer_id;
      return $token;
    }
    public function payment_record($aar){
      //print_r($aar);die;
    }
    public function bok_order(){
      $data = $_SESSION['review_data'];
      //print_r($data);die;
      $insert = $this->db->insert('tbl_bookingRequests',$data);
      $last_id = $this->db->insert_id();
      $data12 = array(
        'driver_id'=>0,
        'req_id'=>$last_id,
        'status'=>0
      );
      $insert1 = $this->db->insert('tbl_moveHistory',$data12);
      return $insert;
    }
    public function bok_quote_order(){
      $dataa = $_SESSION['review_quote_data'];
      $insert = $this->db->insert('tbl_bookingRequests',$dataa);
      return "2";
    }
    public function wallet_money($data,$aar){
      $txn_id = $aar['balance_transaction'];
      $user = $_SESSION['user_id'];
      $detail = array(
        'user_id'=> $_SESSION['user_id'],
        'card_no'=> $data['card'],
        'amount_credited'=> $data['amount'],
        'amount_debited'=>0,
        'txnId'=>$txn_id,
        'date_created'=>date('Y-m-d H:i:s')
      );
      $ins_data = array(
        'user_id'=>$user,
        'balance'=>$data['amount'],
        'date_created'=>date('Y-m-d H:i:s'),
        'date_updated'=>date('Y-m-d H:i:s')
      );
      //print_r($detail);
      //$total = $this->db->query("SELECT sum(amount_credited) as total From tbl_transactions Where user_id = '".$user."' ")->result()[0]->total;
      $total = $this->db->query("SELECT balance FROM tbl_wallet WHERE user_id = '".$user."'")->row()->balance;
      //print_r($total);die;
      $upd_data = array(
        'user_id'=>$user,
        'balance'=>$data['amount'] + $total,
        'date_updated'=>date('Y-m-d H:i:s')
      );

      $ins = $this->db->insert('tbl_transactions',$detail);
      $sel_wall = $this->db->query("SELECT * FROM tbl_wallet WHERE user_id = '".$user."'")->row();
      if(empty($sel_wall)){
        $ins1 = $this->db->insert('tbl_wallet',$ins_data);
        return $ins;
      }else{
        $updte = $this->db->where('user_id',$user);
                 $this->db->update('tbl_wallet',$upd_data);
        return "1";
      }
      
      //$last = $this->db->insert_id();
      //$_SESSION['last_wall_id'] = $last;
      //return $ins;
    }
    public function show_walet(){
      $user = $_SESSION['user_id'];
      //$last = $_SESSION['last_wall_id'];

      $sell = $this->db->query("SELECT amount_credited,amount_debited,txnId,date_created FROM tbl_transactions WHERE user_id = '".$user."' ORDER BY `id` DESC ");
       //$total = $this->db->query("SELECT sum(amount_credited) as total From tbl_transactions Where user_id = '".$user."' ")->result()[0]->total;
      $total = $this->db->query("SELECT balance FROM tbl_wallet WHERE user_id = '".$user."'")->row();
      $get = $sell->result();
      //print_r($total);die;
      $send_data = array(
        'total_amt'=>$total,
        'last_id'=>$get
      );
      //print_r($send_data);die;
      return $send_data;
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
      'extra_charge'=>empty($extraVal)?'':$extraVal,
      'promo_discount'=>empty($dedAmount)?'':$dedAmount,
      'total_amount'=>$overallCharge
      );
     if(!empty($extraVal)){

     $updateTbl = $this->User_model->update_data('tbl_bookingRequests',array('afterHourCharges'=>$extraVal),array('id'=>$req_id));
     }
     return $fareResponse;
    }



}
