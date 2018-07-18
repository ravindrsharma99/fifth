<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Access extends CI_Controller {
	function __construct(){
      parent::__construct();
      $this->load->database();
      $this->load->model('User_model');
      $this->load->library('session');
      $this->load->helper('url');
    }

// public function  updateData(){

//   if(isset($_POST['val'])){
//     $val = $_POST['val'];
//     // print_r($val);
//     $origin = $_POST['origin'];
//     $destination = $_POST['destination'];
//     $inc = $_POST['inc'];
//           $url = "https://maps.googleapis.com/maps/api/directions/json?mode=driving&origin=$origin&destination=$destination&waypoints=$val&sensor=false&key=AIzaSyDurzeFEiJdNJvMe72sxiCIxsOh0YT7YPY";    
//       $json = file_get_contents($url);
//       $dataS = json_decode($json);    
//        $distance = $dataS->routes[0]->legs[0]->distance->value;
//        $newdis = $distance /1000;
//        $rate = 12; 
//        $mydata = $newdis*$rate;
//       print_r($mydata);
//       }
//      }  

    public function mynewLat(){
      if(isset($_POST['deleteid'])){
        print_r($_POST);die();
      }
    }

  public function  updateData1(){

  if(isset($_POST['origin'])){
    $category = $_POST['sub_cat'];
    $sel = $this->db->query("SELECT * ,(select wayPoint_charge from tbl_settings where id = '1') as waypoint_charge FROM tbl_subCategory WHERE id = '".$category."'")->row();
    $basefare = $sel->base_price;
    $wayPoint_charge = $sel->waypoint_charge;
    $kmcharge = $sel->kmCharge;
    //print_r($kmcharge);die;
    // print_r($val);
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
          $url = "https://maps.googleapis.com/maps/api/directions/json?mode=driving&origin=$origin&destination=$destination&waypoints=&sensor=false&key=AIzaSyDurzeFEiJdNJvMe72sxiCIxsOh0YT7YPY";    
      $json = file_get_contents($url);
      $dataS = json_decode($json);
      //print_r($dataS);die;
      $polygon = $dataS->routes[0]->overview_polyline->points;
      $path = base64_encode($polygon);
      if(!empty(isset($dataS))){
       $distance = $dataS->routes[0]->legs[0]->distance->value;
       $dist = ceil($distance/1000);
       $duration = $dataS->routes[0]->legs[0]->duration->text;
       $duration = str_replace(array('mins', 'min'), 'Minutes', $duration);
       $time =$dataS->routes[0]->legs[0]->duration->value;
       $newdis = ceil($distance /1000);
       $rate = $kmcharge; 
        $mydata =  ($newdis * $rate);
       echo json_encode(array('key'=>$dist,'key1'=>$duration,'key2'=>$mydata,'key3'=>$path,'key4'=>$time));
      }else{
        echo "0";
      }
       // $data = array(
       //  'distance'=>$dist,
       //  'time'=>$duration,
       //  'total'=>$mydata
       //  );
       // print_r($data);
       //print_r($data);die
      }
}

}
  
