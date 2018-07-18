<?php

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login($message) {

        $fb_id = $message['fb_id'];
        $fb_id_match = $this->db->select('*')
        ->from('tbl_users')
        ->where('fb_id',$fb_id)
        ->where('is_deleted',0)
        ->get()->row();


        if(count($fb_id_match) > 0){

           //date in mm/dd/yyyy format; or it can be in other formats as well
          $birthDate = $fb_id_match->dob;
          //explode the date to get month, day and year
          $birthDate = explode("/", $birthDate);
          //get age from date or birthdate
          $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));  

          $data = array(
            'name' => $message['name'],
            'age' => $age,
            'gender' => $message['gender'],
            'fb_id' => $message['fb_id'],
            'profilepic' => $message['dp'],
            'email' => $message['email'],
            'type' => 2,
            );
          $this->db->where('fb_id', $message['fb_id']); 
          $userdata = $this->db->update('tbl_users', $data);


          $pic = array(
            'userid' => $fb_id_match->id,
            'profilepic1' => $message['dp'],
            ); 
          $this->db->where('tbl_profilepic.userid', $fb_id_match->id);
          $userpic = $this->db->update('tbl_profilepic', $pic);

          $logindata = array(
            'userid' => $fb_id_match->id,
            'unique_device_id' => $message['unique_device_id'],
            'device_id' => $message['device_id'],
            'status' => 1,
            'token_id' => $message['token_id'],
            ); 
          $userlogin = $this->db->insert('tbl_login', $logindata);
          $data['userId']= $fb_id_match->id;

          $info = $this->db->select('id,name,age,dob,minage,maxage,preference,gender,description,fb_id,profilepic,email,type')
          ->from('tbl_users')
          ->where('fb_id',$message['fb_id'])
          ->get()->row();
          return $info;
      } elseif(count($fb_id_match) == '0' && $message['age'] == ""){
        return "User doesnot exists";
    }else{

        //date in mm/dd/yyyy format; or it can be in other formats as well
        $birthDate = $message['age'];
        //explode the date to get month, day and year
        $birthDate = explode("/", $birthDate);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));  

        $data = array(
            'name' => $message['name'],
            'age' => $age,
            'dob' => $message['age'],
            'gender' => $message['gender'],
            'fb_id' => $message['fb_id'],
            'email' => $message['email'],
            'profilepic' => $message['dp'],
            );

        $userdata = $this->db->insert('tbl_users', $data);
        $insert_id = $this->db->insert_id();


        $data1=array(
            'fb_id'=>'',
            'is_deleted'=>0,
            );
        $this->db->where('fb_id', $data['fb_id']); 
        $this->db->where('is_deleted',1);
        $userdata = $this->db->update('tbl_users', $data1);
        $pic = array(
            'userid' => $insert_id,
            'profilepic1' => $message['dp'],
            ); 
        $userpic = $this->db->insert('tbl_profilepic', $pic);

        $logindata = array(
            'userid' => $insert_id,
            'unique_device_id' => $message['unique_device_id'],
            'device_id' => $message['device_id'],
            'status' => 1,
            'token_id' => $message['token_id'],
            ); 
        $userlogin = $this->db->insert('tbl_login', $logindata);
        $data['userId']= $insert_id;

        $info = $this->db->select('id,name,age,dob,gender,minage,maxage,preference,fb_id,description,profilepic,email,type')
        ->from('tbl_users')
        ->where('fb_id',$message['fb_id'])
        ->get()->row();

        return $info;   
    }
}

public function logout($message) {

    $select_user = $this->db->query("SELECT * from tbl_login where unique_device_id = '" . $message['unique_device_id'] . "'");

    $get_user = $select_user->result();

    if(empty($get_user)){
        return "User not found";
    } else {
        $currenttym = date('Y-m-d H:i:s');
        $update = $this->db->query("UPDATE tbl_login set status = '0',logout_time = '$currenttym' where unique_device_id = '" . $message['unique_device_id'] . "'");

        return "Updated";
    }
}

public function profilepic($message) {

    $this->db->where('userid', $message['userid']);
    $this->db->delete('tbl_profilepic'); 
    $userdata = $this->db->insert('tbl_profilepic', $message);

    $data = array(
        'profilepic' => $message['profilepic1']
        ); 
    $this->db->where("id",$message['userid']);
    $this->db->update("tbl_users",$data);
    $value = $this->db->select('*')
    ->from('tbl_profilepic')
    ->where('userid',$message['userid'])
    ->get()->result();
    return $value;
}

public function starttrip($message) {
    $data = array(
        'userid' => $message['userid'],
        'city' => $message['city'],
        'beginningdate' => $message['beginningdate'],
        'endingdate' => $message['endingdate'],
        'no_of_mem' => $message['no_of_mem'],
        'minage' => $message['minage'],
        'maxage' => $message['maxage'],
        'trip_from' => $message['trip_from'],
        'trip_description' => $message['trip_description'],
        );
    if($message['ingroup']== "2"){
        $data['ingroup'] = $message['ingroup'] ;
    }
    else{
        $select = $this->db->select('gender')
        ->from('tbl_users')
        ->where('id',$message['userid'])
        ->get()->row();
        $data['ingroup'] =  $select->gender;
    }
    $userdata = $this->db->insert('tbl_trip', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
}

public function CheckSubcription($id){
    $this->db->select('*');
    $this->db->from('tbl_user_subscription');
    $this->db->where('user_id', $id );
    $query = $this->db->get();
    if ( $query->num_rows() > 0 )
    {
       $row = $query->num_rows();
       return $row;
   }else{
    return 0 ;
   }
}

public function edittrip($message)
{

    $userid=$message['tripid'];
    $EditCheck = $this->db->select('*')
    ->from('tbl_trip')
    ->where('id', $userid )
    ->get()->row_array();

    if($EditCheck['is_edit'] < 2)
    {
        $data = array(
            'id' => $message['tripid'],
            'city' => $message['city'],
            'beginningdate' => $message['beginningdate'],
            'endingdate' => $message['endingdate'],
            'no_of_mem' => $message['no_of_mem'],
            'minage' => $message['minage'],
            'maxage' => $message['maxage'],
            'trip_from' => $message['trip_from'],
            'trip_description' => $message['trip_description'],
            'is_edit' => $EditCheck['is_edit'] + 1,
            );

        if($message['ingroup']== "2")
        {
            $data['ingroup'] = $message['ingroup'] ;
        }
        else
        {
            $select = $this->db->select('gender')
            ->from('tbl_users')
            ->where('id',$message['userid'])
            ->get()->row();
            $data['ingroup'] =  $select->gender ;
        }

        $this->db->where('id', $message['tripid']);
        $userdata = $this->db->update('tbl_trip', $data);
        return $message['tripid'];
    }
    else
    {
        echo "You have exceeded maximum times of editing  trip";
    }
}

public function deletetrip($tripid) {
    $this->db->delete('tbl_trip', array('id' => $tripid)); 
    return true;
}

public function userDetails($message){
 $data = $this->db->query('select id,minage,maxage,preference from tbl_users where id='.$message['userid'])->row();
 return $data;
}
public function setting($message){
    $data = array(
        'minage' => $message['minage'],
        'maxage' => $message['maxage'],
        'preference' => $message['preference'],
        );
    $this->db->where('id', $message['userid']); 
    $userdata = $this->db->update('tbl_users', $data);
    return $data;
}

public function mytrips($userid) {

    $selectUser = $this->db->select('*')
    ->from('tbl_users')
    ->where('id',$userid)
    ->get()->row();
    if(!empty($selectUser)){
        $my_trip = $this->db->select('*')
        ->from('tbl_trip')
        ->where('userid',$userid)
        ->order_by('tbl_trip.beginningdate',"ASC")
        ->get()->result();
        return $my_trip;
    }else{
        return 3;
    }

}


function getDatesFromRange($start, $end, $format = 'Y-m-d') {
    $array = array();
    $interval = new DateInterval('P1D');

    $realEnd = new DateTime($end);
    $realEnd->add($interval);

    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

    foreach($period as $date) {
        $array[] = $date->format($format);
    }

    return $array;
}

public function match($tripid){

// echo $tripid;die;echo "hello";
    $message = $this->db->select("*")
                        ->from("tbl_trip")
                        ->where("id",$tripid)
                        ->get()->row();
                        $userinfo = $this->db->select("*")
                        ->from("tbl_users")
                        ->where("id",$message->userid)
                        ->get()->row();

    $sql = "";

    if(($userinfo->preference =="1") || ($userinfo->preference =="2") || ($userinfo->preference =="0")){
        $sql.= " AND tbl_trip.ingroup = '".$userinfo->preference."' ";
    }
    if($userinfo->preference =="4"){
        $sql.= " AND (tbl_trip.ingroup = '0' OR  tbl_trip.ingroup = '1') ";
    }
    if($userinfo->preference =="5"){
        $sql.= " AND (tbl_trip.ingroup = '0' OR  tbl_trip.ingroup = '2') ";
    }
    if($userinfo->preference =="6"){
        $sql.= " AND (tbl_trip.ingroup = '1' OR  tbl_trip.ingroup = '2') ";
    }


    $sql.=" AND (((tbl_trip.minage>='".$userinfo->minage."' and tbl_trip.minage<='".$userinfo->maxage."') or (tbl_trip.maxage>='".$userinfo->minage."' and tbl_trip.maxage<='".$userinfo->maxage."')) or (('".$userinfo->minage."'>=tbl_trip.minage and '".$userinfo->maxage."'<=tbl_trip.maxage) or ('".$userinfo->maxage."' <= tbl_trip.maxage and '".$userinfo->minage."'>=tbl_trip.minage))) ";

    $sql.=" AND (tbl_trip.city>='".$message->city."')";

    /*$sql.=" AND (((tbl_trip.beginningdate>='".$message->beginningdate."' and tbl_trip.beginningdate<='".$message->endingdate."') or (tbl_trip.endingdate>='".$message->beginningdate."' and tbl_trip.endingdate<='".$message->endingdate."'))or(('".$message->beginningdate."'>=tbl_trip.beginningdate and '".$message->endingdate."'<=tbl_trip.endingdate)or('".$message->endingdate."' <= tbl_trip.endingdate and '".$message->beginningdate."'>=tbl_trip.beginningdate))) ";*/


    $query = "SELECT tbl_trip.*,tbl_users.age,tbl_users.name,tbl_users.gender,tbl_users.description,tbl_profilepic.profilepic1,tbl_profilepic.profilepic2,tbl_profilepic.profilepic3,tbl_profilepic.profilepic4,tbl_profilepic.profilepic5,tbl_profilepic.profilepic6,CASE WHEN  (SELECT tbl_trip_action.count_status  FROM `tbl_trip_action` WHERE (tbl_trip_action.`from` =tbl_trip.id AND tbl_trip_action.`to` = $tripid) OR (tbl_trip_action.`from` = $tripid AND tbl_trip_action.`to` = tbl_trip.id)) IS NULL THEN '' ELSE  (SELECT tbl_trip_action.count_status  FROM `tbl_trip_action` WHERE (tbl_trip_action.`from` = tbl_trip.id AND tbl_trip_action.`to` = $tripid) OR (tbl_trip_action.`from` = $tripid AND tbl_trip_action.`to` = tbl_trip.id)) END as count_status,
    CASE WHEN  (SELECT tbl_trip_action.last_user_action  FROM `tbl_trip_action` WHERE (tbl_trip_action.`from` =tbl_trip.id AND tbl_trip_action.`to` = $tripid) OR (tbl_trip_action.`from` = $tripid AND tbl_trip_action.`to` = tbl_trip.id)) IS NULL THEN '' ELSE  (SELECT tbl_trip_action.last_user_action  FROM `tbl_trip_action` WHERE (tbl_trip_action.`from` = tbl_trip.id AND tbl_trip_action.`to` = $tripid) OR (tbl_trip_action.`from` = $tripid AND tbl_trip_action.`to` = tbl_trip.id)) END as last_user_action  FROM tbl_trip Join tbl_users on tbl_users.id = tbl_trip.userid join tbl_profilepic on tbl_profilepic.userid = tbl_trip.userid  WHERE tbl_trip.city like '%".$message->city."%' AND tbl_users.status ='1' and tbl_trip.userid <> '".$message->userid."' $sql ";

      // Block condition

    $thisQuery = $this->db->select("*, (CASE WHEN tbl_user_action.from = '".$message->userid."' THEN tbl_user_action.to WHEN tbl_user_action.to = '".$message->userid."' THEN tbl_user_action.from END ) as checkid")
    ->from('tbl_user_action')
    ->where("(from = $message->userid OR to = $message->userid)")
    ->where('action',4)
    ->get()->result();

    if(count($thisQuery)>0){
        foreach($thisQuery as $data)
        {
            $value = $data->checkid;
            $query .= "AND tbl_users.id != '".$value."'";
        }
    }
    $my_query = $this->db->query("$query GROUP BY tbl_trip.id")->result();
 //print_r($my_query); die;
       //print_r($this->db->last_query());die;
    $resArray = array();
    foreach($my_query as $element) {
        $checkMatch = $this->db->query("select * from tbl_trip_action where `from`='".$tripid."' and `to` = '".$element->id."'
         and (action = 1 or action = 3 )")->row();

        if(($element->count_status != 2 || empty($element->count_status)) && empty($checkMatch)){
          $resArray[] = $element;
      } 


  } 
  return $resArray;   

}

function reportUser($message){
         // $query1 = $this->db->query("select name,fb_id from tbl_users where  id=".$message['from_id'])->row(); 
         // $data1 = $this->db->query("select name,fb_id from tbl_users where id=".$message['to_id'])->row(); 
 $this->db->insert("tbl_reportuser",$message);

 $query=array(
    'from_data'=>$query1,
    'to_data'=>$data1
    );

 return $query;
}
function getDataAll(){
    $row = $this->db->select("*")
                ->from("tbl_subscriptions")
                ->get()->result();
                return $row;
}

function updateaction($message){
    $row = $this->db->select("tbl_trip_action.*")
    ->from("tbl_trip_action")
    ->where("to",$message['to'])
    ->where("from",$message['from'])
    ->or_where("to",$message['from'])
    ->where("from",$message['to'])
    ->get()->result();

    if(count($row)>0){

        if($message['action']=="1"){
            if($row[0]->last_user_action==""){
                $message['last_user_action'] = $message['fromuserid'];    
                $message['count_status'] = 1;
            } else{
                if($row[0]->last_user_action!=$message['fromuserid']){
                    $message['last_user_action'] = $message['fromuserid'];    
                    $message['count_status'] = 2;

                    $names = $this->db->select("tbl_users.*,tbl_trip.*")
                    ->from("tbl_trip")
                    ->join("tbl_users",'tbl_trip.userid = tbl_users.id')
                    ->where("tbl_trip.id",$message['from'])
                    ->get()->row();

                    $tripinfo = $this->db->select("tbl_users.*,tbl_trip.*")
                    ->from("tbl_trip")
                    ->join("tbl_users",'tbl_trip.userid = tbl_users.id')
                    ->where("tbl_trip.id",$message['to'])
                    ->get()->row();
                    if($message['count_status'] = '2'){
                        $mess = $names->name." liked you for your trip to ".$tripinfo->city." between ".$tripinfo->beginningdate." and ".$tripinfo->endingdate;
                        $userid = $names->id;
                        $name = $names->name;
                        $age = $names->age;
                        $profilepic = $names->profilepic;
                        $created_time = date('Y-m-d H:i:s');
                        $token_id = $this->db->select('*')
                        ->from('tbl_login')
                        ->where('tbl_login.userid',$tripinfo->userid)
                        ->where('tbl_login.status',1)
                        ->get()->result();
                        foreach ($token_id as $value) {


                            $tokenid = $value->token_id;
                            if ($value->device_id == 0) {

                                $this->android($tokenid,$mess,$message['fromuserid'],$name,$age,$profilepic,$created_time);
                            } elseif($value->device_id == 1){
                                $this->ios($tokenid,$mess,$message['fromuserid'],$name,$age,$profilepic);
                            }                            
                         }  // die;
                     }

                     $chat = [
                     'from_id' => $message['fromuserid'],
                     'to_id' => $message['touserid'],
                     'is_message' => 1,
                     'message' => ''
                     ];
                     $this->db->insert("tbl_chat",$chat);
                     $resArray = array(
                        'from_id' => $message['fromuserid'],
                        'to_id' => $message['touserid'],
                        'date_created'=>date('Y-m-d H:i:s')
                        );
                     $this->db->insert("tbl_InitiateChat",$resArray);
                 }
             }
         }
         else{
            $message['count_status'] = 0;
            $message['last_user_action'] = $message['fromuserid']; ;
        }

        $this->db->where("id",$row[0]->id);
        $this->db->update("tbl_trip_action",$message);

        return "Successfully Updated";
    }else{

        if($message['action']=="1"){
            $message['last_user_action'] = $message['fromuserid'];    
            $message['count_status'] = 1;
        }
        else if($message['action']=="3"){
            $message['count_status'] = 0;
            $message['last_user_action'] = $message['fromuserid'];
        }else{
            $message['count_status'] = 0;
            $message['last_user_action'] = $message['fromuserid'];
        }

        $this->db->insert("tbl_trip_action",$message);
        $names = $this->db->select("tbl_users.*,tbl_trip.*")
        ->from("tbl_trip")
        ->join("tbl_users",'tbl_trip.userid = tbl_users.id')
        ->where("tbl_trip.id",$message['from'])
        ->get()->row();

        $tripinfo = $this->db->select("tbl_users.*,tbl_trip.*")
        ->from("tbl_trip")
        ->join("tbl_users",'tbl_trip.userid = tbl_users.id')
        ->where("tbl_trip.id",$message['to'])
        ->get()->row();

        return "Successfully Insert";
    }
}


function update_action($message){

   $row = $this->db->select("tbl_user_action.*")
   ->from("tbl_user_action")
   ->where("to",$message['to'])
   ->where("from",$message['from'])
                        /*->or_where("to",$message['from'])
                        ->where("from",$message['to'])*/
                        ->get()->result();
                        if(count($row)>0){

                            $this->db->where("id",$row[0]->id);
                            $this->db->update("tbl_user_action",$message);

                            return "Successfully Updated";
                        }
                        else{

                            $this->db->insert("tbl_user_action",$message);

                            return "Successfully Insert";
                        }
                    }

                    function get_action_user($message){

                        $row =  $this->db->select("tbl_trip_action.count_status,tbl_trip_action.last_user_action")
                        ->from("tbl_trip_action")
                        ->where("touserid",$message['to'])
                        ->where("fromuserid",$message['from'])
                        ->or_where("touserid",$message['from'])
                        ->where("fromuserid",$message['to'])
                        ->get()->result();

                        return $row;
                    }

                    function insertchat($message){
                       $this->db->insert("tbl_chat",$message);
                       $insertid = $this->db->insert_id();
                       $currenttym = date('Y-m-d H:i:s');
                       $selchat = $this->db->query("SELECT * from tbl_chat where id='".$insertid."'")->row();
                       $select_user = $this->db->query("SELECT tbl_login.* from tbl_login where tbl_login.status ='1' and tbl_login.userid='".$message['to_id']."' order by id desc limit 2");
                       $select_user1 = $this->db->query("SELECT * from tbl_users where id='".$message['from_id']."' order by id desc limit 2")->row();

                       $rowsdata = $select_user->result();   
                // $rowsdata1 = $select_user1->result();   
                // print_r($rowsdata);die;
                       foreach($rowsdata as $each) {
                        $getID = $each->token_id;
                        $deviceid = $each->unique_device_id;
                        $msgs = $message['message'];
                        $message1 = base64_decode($message['message']);
                        $deviceToken = $getID;
                        $profilepic = $select_user1->profilepic;
                        $age = $select_user1->age;
                        $name= $select_user1->name;
                        $userid=$select_user1->id;
                   // $created_time = $selchat->created_date;

                        $value_get = "You have recieved a message from ".$select_user1->name;
                        if($each->device_id == 1){
                            $passphrase = '';
                            $ctx = stream_context_create();
                            stream_context_set_option($ctx, 'ssl', 'local_cert', './certs/OnVoyageDist.pem');
                            stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
                                // Open a connection to the APNS server
                            $fp = stream_socket_client(
                                'ssl://gateway.sandbox.push.apple.com:2195', $err,
                                $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

                            if (!$fp)
                                exit("Failed to connect: $err $errstr" . PHP_EOL);
                            $body['aps'] = array(
                                'alert' => $value_get,
                                'message' => $message1,
                                'action' => "adminmessage",
                                'sound' => 'default',
                                'userid' => $userid,
                                'profilepic' => $profilepic,
                                'name' => $name,
                                );
                              // print_r($body);die;
                                // Encode the payload as JSON
                            $payload = json_encode($body);
                                // Build the binary notification
                            $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
                                // Send it to the server
                            $result = fwrite($fp, $msg, strlen($msg));  
                                //echo "<pre>"; print_r($result);die;
                               // print_r($result); die;
                               /*                 if (!$result)
                                echo 'Message not delivered' . PHP_EOL;
                                else
                                echo 'Message successfully delivered' . PHP_EOL;
                                die;*/
                                fclose($fp);
                            } else {

                                $url = 'https://fcm.googleapis.com/fcm/send';

                                $token= $getID;
                                $api_key = "AAAAT2X5h38:APA91bE0mUG7ef4ONP_AVkfFJ9yZXHDRZrj6TMNsT3_k498TVxV-UkE3sQb3AoYGZxf2MHKbTBokfy0t2zNjfkhCQyecYLw3MTzH_h2-SZFE9XNHBoNlfNjthvx4x19kLZcOp6kr8v0S";
                                $fields = array (
                                    'registration_ids' => array (
                                       $token,
                                       ),

                                    'data' => array (
                                        'alert' => $value_get,
                                        'message' => $msgs,
                                        'messageid' => $insertid,
                                        'action' => "adminmessage",
                                        'sound' => 'default',
                                        'userid' => $userid,
                                        'profilepic' => $profilepic,
                                        'age' => $age,
                                        'name' => $name,
                                        'created_time' => $currenttym,
                                        ),
                                    );

                                $fields = json_encode($fields);
                    //print_r($fields);
                                $headers = array (
                                    'Authorization: key='.$api_key,
                                    'Content-Type: application/json'
                                    );
                   // print_r($headers);
                                $ch = curl_init ();
                                curl_setopt ( $ch, CURLOPT_URL, $url );
                                curl_setopt ( $ch, CURLOPT_POST, true );
                                curl_setopt($ch, CURLOPT_VERBOSE,1);
                                curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
                                curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
                                curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
                                curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
                                curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                                $result = curl_exec($ch);

                                curl_close ( $ch );        

                            }

                        }
                        return $insertid;
                    }

                    public function userchatList($message) {

                        $check_qu = $this->db->query("SELECT * from tbl_deletechat where from_id ='".$message['first_id']."' and to_id ='".$message['second_id']."' order by id desc limit 1");
                        $check_query = $check_qu->row();

                        if(!empty($check_query)){

                          $query11 = $this->db->query("SELECT `tbl_chat`.`id` as `message_id`,`tbl_chat`.`is_message`, `tbl_users`.`id`, `tbl_users`.`name`, `tbl_users`.`profilepic`, `tbl_chat`.`message`,`tbl_chat`.`created_date` FROM `tbl_chat` JOIN `tbl_users` ON `tbl_users`.`id` = `tbl_chat`.`from_id` WHERE `tbl_chat`.`id` > ".$check_query->lastchat_id." AND ((`from_id` = '".$message['second_id']."' AND `to_id` = '".$message['first_id']."') OR (`from_id` = '".$message['first_id']."' AND `to_id` = '".$message['second_id']."' AND `tbl_chat`.`message` != ''))");


                          $query1 = $query11->result(); 

                      }else{

                        $query1 = $this->db->select('tbl_chat.id as message_id,tbl_chat.is_message,tbl_users.id,tbl_users.name,tbl_users.profilepic,tbl_chat.message,`tbl_chat.created_date')
                        ->from('tbl_chat')
                        ->join("tbl_users","tbl_users.id = tbl_chat.from_id ")
                        ->where('from_id', $message['second_id'])
                        ->where('to_id',$message['first_id'])
                        ->where('tbl_chat.message !=', '')
                        ->or_where('from_id', $message['first_id'])
                        ->where('to_id',$message['second_id'])
                        ->where('tbl_chat.message !=', '')
                        ->order_by('created_date',"ASC")
                        ->get()->result();
                    }
                    return $query1;

                }

                public function deletechat($message){

                   $chat_delete = $this->db->insert('tbl_deletechat', $message); 

                   if($chat_delete){
                      return 1;
                  }else{
                      return 0;
                  } 
              }

              public function updatedescription($message){

                $data = array(
                    'description' => $message['description'],
                    );

                $this->db->where('id', $message['userid']);
                $this->db->update('tbl_users', $data); 
                return $data;
            }

            public function block($message){

                $query = $this->db->select("tbl_user_action.*")
                ->from("tbl_user_action")
                ->where("to",$message['userid'])
                ->where("from",$message['blockid'])
                ->get()->row();

                if($query == "" && $message['action'] == 3){
                    $data = array(
                        'from' => $message['userid'],
                        'to' => $message['blockid'],
                        'action' => 2,
                        );

                    $this->db->insert('tbl_user_action', $data); 
                    return $data;

                } else if($query != "" && $message['action'] == 3){
                    return "already blocked";

                } elseif($query != "" && $message['action'] == 4){
                    $data = array(
                        'action' => 4,
                        );
                    $this->db->where('from', $message['userid']);
                    $this->db->where('to', $message['blockid']);
                    $userdata = $this->db->update('tbl_user_action', $data);  
                    return $userdata;
                } elseif($query == "" && $message['action'] == 4){
                    $data = array(
                        'from' => $message['userid'],
                        'to' => $message['blockid'],
                        'action' => 4,
                        );

                    $this->db->insert('tbl_user_action', $data); 
                    return $data; 
                }
            }

            public function getprofilepics($userid){

                $query = $this->db->select('tbl_profilepic.*,tbl_users.description')
                ->from('tbl_profilepic')
                ->join('tbl_users','tbl_profilepic.userid = tbl_users.id')
                ->where('userid',$userid)
                ->get()->result();

                return $query;

            }

            public function deleteuser($userid){
                $data = array(
                    'is_deleted' => 1,
                    );
                $this->db->where('id', $userid);
                $userdata = $this->db->update('tbl_users', $data);  

                $this->db->where("userid",$userid);
                $this->db->update('tbl_login', array('status' => '0')); 

                $this->db->delete('tbl_trip', array('userid' => $userid)); 
                $this->db->delete('tbl_profilepic', array('userid' => $userid)); 
                $this->db->delete('tbl_block', array('userid' => $userid)); 
                return $userid;
            }

            public function mychat($userid) {

      //  print_r($message['user_Id']); die;
               $myQuery = $this->db->query("SELECT from_id as chat_uid FROM tbl_chat WHERE from_id = '".$userid."'or to_id = '".$userid."' UNION SELECT to_id as chat_uid FROM tbl_chat WHERE from_id = '".$userid."' or to_id = '".$userid."'");


               $my_res = $myQuery->result_array();

   //print_r($my_res); die;
               foreach($my_res as $re)
               {
                   $check_qu = $this->db->query("SELECT * from tbl_deletechat where from_id ='".$userid."' and to_id ='".$re['chat_uid']."' or from_id ='".$re['chat_uid']."' and to_id ='".$userid."' order by id desc limit 1");
                   $check_query = $check_qu->row();


                   if($re['chat_uid']!= $userid){

                    $myQuery1 = $this->db->query("SELECT * from tbl_users where Id='".$re['chat_uid']."'");

                    $my_res1 = $myQuery1->result_array();                                                             
  //    print_r($check_query); die;
                    if(!empty($check_query)){

                        $myQuery2 = $this->db->query("SELECT * from tbl_chat where id > ".$check_query->lastchat_id." and ((from_id='".$re['chat_uid']."' and to_id = '" .$userid."') or (to_id = '".$re['chat_uid']."' and from_id = '".$userid."'))  order by created_date desc limit 1");

                    }else{


                        $myQuery2 = $this->db->query("SELECT * from tbl_chat where (from_id='".$re['chat_uid']."' and to_id = '" .$userid."') or (to_id = '".$re['chat_uid']."' and from_id = '".$userid."')order by created_date desc limit 1");
                    }

                    $my_res2 = $myQuery2->result_array();

                    $count_query = $this->db->query("select count(*) as mycount from tbl_chat where (from_id='".$re['chat_uid']."' and to_id = '" .$userid."') and message_status = 0");

                    $count_row = $count_query->row();

                    $blockCheck = $this->db->query("select * from tbl_user_action where `from` = '".$re['chat_uid']."' and `to` = '" .$userid."' and action = 4")->row();
                    (!empty($blockCheck))?$resBlock = 1:$resBlock = 0;


                    $blockCheck1 = $this->db->query("select * from tbl_user_action where `from` = '" .$userid."'  and `to` = '".$re['chat_uid']."' and action = 4")->row();

                    (!empty($blockCheck1))?$res1Block = 1:$res1Block = 0;

                //$respon[] = array($respo,$my_res2);
                    $m_id = (!empty($my_res2[0]['Id']))?$my_res2[0]['Id']:''; 
                    $mymessage = (!empty($my_res2[0]['message']))?$my_res2[0]['message']:''; 
                    $mydate = (!empty($my_res2[0]['date_created']))?$my_res2[0]['date_created']:''; 

                    if(!empty($my_res1)){

                        $respon[] = array(
                            'user_id'=>$re['chat_uid'],
                            'name'=>$my_res1[0]['name'],
                            'count'=>$count_row->mycount,
                            'is_deleted'=>$my_res1[0]['is_deleted'],
                       // 'gender'=>$my_res1[0]['gender'],
                            'profile_pic'=>$my_res1[0]['profilepic'],
                            'description'=>$my_res1[0]['description'],
                            'message'=>empty($my_res2[0]['message'])?'':$my_res2[0]['message'],
                            'message_date'=>$my_res2[0]['created_date'],
                            'blocked_byMe'=>$res1Block,
                            'blocked_byOther'=>$resBlock,
                            'date_created'=>empty($my_res2[0]['created_date'])?'':$my_res2[0]['created_date']
                            );

                    }
                }                    
            }

            return $respon;


        }

        public function mychat_old($userid) {

           $myQuery = $this->db->query("SELECT from_id as chat_uid FROM tbl_chat WHERE from_id = '".$userid."'or to_id = '".$userid."' UNION SELECT to_id as chat_uid FROM tbl_chat WHERE from_id = '".$userid."' or to_id = '".$userid."'");

           $my_res = $myQuery->result_array();
           if(empty($my_res)){

            return 0;

        }else{
            foreach($my_res as $re)
            {
               if($re['chat_uid']!=$userid){

                $myQuery1 = $this->db->query("SELECT * from tbl_users where Id='".$re['chat_uid']."'");

                $my_res1 = $myQuery1->result_array();

                $myQuery2 = $this->db->query("SELECT * from tbl_chat where (from_id='".$re['chat_uid']."' and to_id = '" .$userid."') or (to_id = '".$re['chat_uid']."' and from_id = '".$userid."') order by id desc limit 1");

                $my_res2 = $myQuery2->result_array();

                if(!empty($my_res1)){
                    $respon[] = array(
                        'user_id'=>$re['chat_uid'],
                        'name'=>$my_res1[0]['name'],
                        'age'=>$my_res1[0]['age'],
                        'profile_pic'=>$my_res1[0]['profilepic'],
                        'description'=>$my_res1[0]['description'],
                        'message'=>$my_res2[0]['message'],
                        'date_created'=>$my_res2[0]['created_date']
                        );
                }
            }
        }
    }

    return $respon;

}

public function ios($tokenid,$mess,$userid,$name,$age,$profilepic){


            // Put your device token here (without spaces):
            $deviceToken = $tokenid; //(13/1/2016) Development Profile.
            $passphrase = '';

            $ctx = stream_context_create();
            stream_context_set_option($ctx, 'ssl', 'local_cert', 'certs/OnVoyageDist.pem');
            stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
            // Open a connection to the APNS server
            $fp = stream_socket_client(
                'ssl://gateway.sandbox.push.apple.com:2195', $err,
                $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

            // if (!$fp)
            //     exit("Failed to connect: $err $errstr" . PHP_EOL);

            //  echo 'Connected to APNS' . PHP_EOL;

            // Create the payload body
            $body['aps'] = array(
                'alert' => $mess,
                'userid' => $userid,
                'name' => $name,
                'action' => "message",
                'age' => $age,
                'profilepic' => $profilepic,
                'sound' => 'default',
                );
            // print_r($body);die;
            // Encode the payload as JSON
            $payload = json_encode($body);

            // Build the binary notification
            $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

            // Send it to the server
            $result = fwrite($fp, $msg, strlen($msg));

            // if (!$result)
            //     echo 'Message not delivered' . PHP_EOL;
            // else
            //     echo 'Message successfully delivered' . PHP_EOL;

            // Close the connection to the server
            fclose($fp);
        }

        public function android($tokenid,$mess,$userid,$name,$age,$profilepic,$created_time){
            $url = 'https://fcm.googleapis.com/fcm/send';
            $api_key = "AAAAT2X5h38:APA91bE0mUG7ef4ONP_AVkfFJ9yZXHDRZrj6TMNsT3_k498TVxV-UkE3sQb3AoYGZxf2MHKbTBokfy0t2zNjfkhCQyecYLw3MTzH_h2-SZFE9XNHBoNlfNjthvx4x19kLZcOp6kr8v0S";

            $fields = array(
                'registration_ids' => array (
                 $tokenid,
                 ),
                'data' => array(
                    'alert' => $mess,
                    'message'=>'hello',
                    'userid' => $userid,
                    'name' => $name,
                    'action' => "message",
                    'age' => $age,
                    'profilepic' => $profilepic,
                    'sound' => 'default',
                    'created_time'=>$created_time,
                    ),
                );

            $fields = json_encode($fields);
                    //print_r($fields);
            $headers = array (
                'Authorization: key='.$api_key,
                'Content-Type: application/json'
                );
                   // print_r($headers);
            $ch = curl_init ();
            curl_setopt ( $ch, CURLOPT_URL, $url );
            curl_setopt ( $ch, CURLOPT_POST, true );
            curl_setopt($ch, CURLOPT_VERBOSE,1);
            curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
            curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
            curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            $result = curl_exec($ch);

            curl_close ( $ch );        

        }

        public function matchuserslist($userid){

            $query = $this->db->select('*')
            ->from('tbl_matchedusers')
            ->where('user',$userid)
            ->get()->result();

            return $query;
        }

        public function matchstatus($message){

            $query = $this->db->select('*')
            ->from('tbl_matchedusers')
            ->where('user',$message['userid'])
            ->where('matcheduserid',$message['matcheduserid'])
            ->get()->result(); 

            $matcheduserinfo = $this->db->select('*')
            ->from('tbl_users')
            ->where('id',$message['matcheduserid'])
            ->get()->row(); 

            $data = array(
                'user' => $message['userid'],
                'matcheduserid' => $message['matcheduserid'],
                'status' => $message['status'],
                'name' => $matcheduserinfo->name,
                'profilepic' => $matcheduserinfo->profilepic,
                'age' => $matcheduserinfo->age,
                );

            if(count($query)>0){

                $this->db->where("id",$row[0]->id);
                $this->db->update("tbl_matchedusers",$data);

            } else {

                $this->db->insert("tbl_matchedusers",$data);

            }
            return $data;
        }

        public function updatepics($messages){

            $query = $this->db->select('*')
            ->from('tbl_profilepic')
            ->where('userid',$messages['userid'])
            ->get()->result(); 
            if($query > 0){
                $this->db->where("userid",$messages['userid']);
                $this->db->update("tbl_profilepic",$messages);
            }else{

                $this->db->insert("tbl_profilepic",$messages);

            }
            $query = $this->db->select('tbl_profilepic.profilepic1,tbl_profilepic.profilepic2,tbl_profilepic.profilepic3,tbl_profilepic.profilepic4,tbl_profilepic.profilepic5,tbl_profilepic.profilepic6,tbl_users.id as userid,tbl_users.description')
            ->from('tbl_profilepic')
            ->join('tbl_users','tbl_profilepic.userid = tbl_users.id')
            ->where('userid',$messages['userid'])
            ->get()->result();
            return $query;
        }

        public function updatedescription1($message){

            $data = array(
                'description' => $message['description'],
                );

            $this->db->where('id', $message['userid']);
            $this->db->update('tbl_users', $data);

            $query = $this->db->select('tbl_profilepic.profilepic1,tbl_profilepic.profilepic2,tbl_profilepic.profilepic3,tbl_profilepic.profilepic4,tbl_profilepic.profilepic5,tbl_profilepic.profilepic6,tbl_users.description,tbl_users.id as userid')
            ->from('tbl_profilepic')
            ->join('tbl_users','tbl_profilepic.userid = tbl_users.id')
            ->where('userid',$message['userid'])
            ->get()->result();
            return $query;
        }

        public function tripdetail($tripid){

            $query = $this->db->select('*')
            ->from('tbl_trip')
            ->where('id',$tripid)
            ->get()->row();
            return $query;

        }

        public function readMessage($message) {


          $update_query =  $this->db->where('to_id',$message['to_id']);
          $this->db->where('from_id',$message['from_id']);
          $this->db->update('tbl_chat',array('message_status'=>1));


          if($update_query){
           return 1;
       }else{
           return 0;
       }
   }


   public function getLists($table,$id)
   {
    $query = $this->db->select('*')
                      ->from($table)
                      ->where('id', $id)
                      ->get()->result();
                    return $query;
   }

     public function getWalletBalance($table,$user_id)
   {
    $query = $this->db->select('balance')
                      ->from($table)
                      ->where('user_id', $user_id)
                      ->get()->result_array();
                      return $query;
   }
    public function getPromoBalance($user_id)
   {
        $this->db->select('*');
        $this->db->from('tbl_promocode');
        $this->db->where('id',$user_id);
        $query = $this->db->get();
        $row = $query->result_array();
        return $row;
   }




public function SelectCard($table,$card)
{
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where('card_no',$card);
    $query = $this->db->get();
    $row = $query->row_array();
    return $row;
}

public function getCard($user_id){
  $getData = $this->db->select('card_no,is_default')
  ->from('tbl_cardDetails')
  ->where('user_id',$user_id)
  ->get()->result();
  return $getData;
}

public function transactionData($user_id){

  $getData = $this->db->select('*')
                      ->from('tbl_wallet')
                      ->join('tbl_transactions','tbl_wallet.user_id = tbl_transactions.user_id',left)
                      ->where('tbl_wallet.user_id',$user_id)
                      ->get()->result();
                      $num_data = count($getData);
                      if($num_data == 0 ){
                       $getData  =  $this->db->query("select *,(select count(balance) from tbl_wallet where user_id=".$user_id.") as balance from tbl_transactions where user_id = ".$user_id)->result();

                      }
                      return $getData;

}
public function select_data($data,$table,$where){
    
  $getData = $this->db->select($data)
                      ->from($table)
                      ->where($where)
                      ->get()->row_array();
                      return $getData;

}


public function insert($table,$data){
    $this->db->insert($table, $data);
    return $this->db->insert_id();
}

public function update_data($table,$data,$where){
    $this->db->where($where);
    $this->db->update($table, $data);


}

}
?>