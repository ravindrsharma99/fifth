<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
//require_once(APPPATH.'libraries/lib/Stripe.php');
class Booking extends CI_Controller {
	function __construct(){
    parent::__construct();
      $this->load->database();
      $this->load->model('User_model');
      $this->load->library('session');
      $this->load->helper('url');
      $config = Array(
        'protocol' => 'sendmail',
        'mailtype' => 'html',
        'charset' => 'utf-8',
        'wordwrap' => TRUE
      );
      $this->load->library('email', $config);
      $this->load->library('form_validation');
  }

	public function index()
	{	



     if(isset($_POST['forgot_password_submit'])){
      // print_r($_POST);die();
      $email = $this->input->post('forgot_email');
      $reset = $this->User_model->reset_password($email);
      if($reset == "empty"){
        $this->session->set_flashdata('email_err','Please Enter Valid email Id');
        redirect(base_url());
      }else{
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
            <th style=font-size:20px; font-weight:bolder; text-align:right;padding-bottom:10px;border-bottom:solid 1px #ddd;> Hello " . $reset['fname'] .' '. $reset['lname'] . "</th>
            </tr>

            <tr>
            <td style=font-size:16px;>
            <p> You have requested a password retrieval for your user account at KudosFind.To complete the process, click the link below.</p>
            <p><a href=" . site_url('Admin/api/User/newpassword?id=' . $reset['b_id']) . ">Change Password</a></p>
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

          $this->session->set_flashdata('msg','Mail Sent Successfully');
          redirect(base_url());

      }
    }
  



		if(isset($_POST['submit'])){
    $data = array(
      'email'=>$this->input->post('email'),
      'password'=>md5($this->input->post('password'))
    );
    if($data['email'] == ""){
      $this->session->set_flashdata('msg','Email is required');
    }elseif($data['password'] == ""){
      $this->session->set_flashdata('msg','Password is required');
    }else{
      $sel = $this->User_model->log($data);
      if($sel == "success"){
        $_SESSION['email'] = $this->input->post('email');
        redirect('Booking/book_order');    
      }else{
        $this->session->set_flashdata('msg','Password or Email is not valid');
      }
    }
  }
   $sel = $this->db->select('*');
           $this->db->from('tbl_frontPage');
    $get['arr'] = $this->db->get()->row();
    $this->load->view('front',$get);
  }
	
	public function insertt(){
    if(isset($_POST['signin'])){
      $refNo = rand(100,500);
      $pphone = $this->input->post('phone');
  		$data = array(
  			'fname'=>$this->input->post('fname'),
  			'lname'=>$this->input->post('lname'),
  			'email'=>$this->input->post('email'),
  			'password'=>md5($this->input->post('password')),
  			'cpassword'=>md5($this->input->post('cpassword')),
  			'phone'=>$this->input->post('phone_code').''.$this->input->post('phone'),
        'signupVia_email'=>1,
        'ref_code'=>$this->input->post('fname')."KU".$refNo,
        'add_referCode'=>$this->input->post('add_referCode'),
        'date_created' => date('Y-m-d H:i:s')
  		);

  		if($data['password'] != $data['cpassword']){
          $this->session->set_flashdata('msg','Password and confirm password not match');
          redirect(base_url());
      }elseif($data['fname']=="" || $data['lname']=="" || $data['email']=="" || $data['password']=="" || $data['cpassword'] == "" || $data['phone'] == ""){
          $this->session->set_flashdata('msg','Please fill all required data');
          redirect(base_url());
      }elseif(!preg_match("/^[a-zA-Z ]*$/",$data['fname']) || !preg_match("/^[a-zA-Z ]*$/",$data['lname'])){
        $this->session->set_flashdata('msg','please enter letter in name filed');
        redirect(base_url());
      }elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
        $this->session->set_flashdata('msg','Invalid Email Format');
        redirect(base_url());
      }elseif(!preg_match('/^[0-9]{8,8}+$/',$pphone)){
        $this->session->set_flashdata('msg','Please enter valid phone Number');
        redirect(base_url());
      }
      // elseif(empty($data['add_referCode']) ){ // no referCode added
      //       $signup_via = $this->input->post('signup_via');
      //       $user=$this->User_model->signup($myarray,$signup_via,$loginArray);
      //       $amount =0;
      //       $addBal = $this->User_model->insert_data('tbl_wallet',array('balance'=>$amount,'user_id'=>$user,'date_created'=>date('Y-m-d H:i:s')));
      //       $addtransArray = array(
      //           'amount_credited'=>$amount,
      //           'user_id'=>$user,
      //           'txnId'=>'initialWallet',
      //           'date_created'=>date('Y-m-d H:i:s')
      //       );
      //       $addtrans = $this->User_model->insert_data('tbl_transactions',$addtransArray);
      // }
      else{
  			$send = $this->User_model->ins($data);
  			if($send == "error"){
  				$this->session->set_flashdata('msg','Email already exits');
  				redirect(base_url());
  			}else{
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
            <th style=font-size:20px; font-weight:bolder; text-align:right;padding-bottom:10px;border-bottom:solid 1px #ddd;> Hello " . $data['fname'] .' '. $data['lname'] . "</th>
            </tr>

            <tr>
            <td style=font-size:16px;>
            <h4>Registered Successfully!</h4>
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
            $this->email->to($data['email']);
            $this->email->subject('Registration Success');
            $this->email->message($body);
            $this->email->send();

          // $this->session->set_flashdata('msg','Mail Sent Successfully');
          // redirect(base_url());
  				$this->session->set_flashdata('msg','Successfully Resgistered');
  				redirect(base_url());
  			}
  		}
    }else{
      redirect(base_url());
    }
	}
    public function fb(){
      $data = array(
        'fb_id'=>$this->input->post('user_id'),
        'fbname'=>$this->input->post('name'),
        'mname'=>$this->input->post('mname').' '.$this->input->post('lname'),
        //'lname'=>$this->input->post('lname'),
        //'fb_id'=>$this->input->post('user_id'),
        'profile_pic'=>$this->input->post('picture'),
        'email'=>$this->input->post('email'),
        'signupVia_fb'=>1,
        'date_created'=>date('Y-m-d H:i:s')
      );
        
        //$_SESSION['fb_login_detail'] = $data;
        $ins = $this->User_model->fbins($data);
        if($ins == 1){
          echo json_encode(array('key'=>$data['fbname'],'key1'=>$data['mname'],'key2'=>$data['email'],'key3'=>$data['fb_id'],'key4'=>$data['profile_pic']));
        }else{
          $_SESSION['email'] = $data['email'];
          echo "2";
        }      
    }
    public function google_login(){
    $data = array(
      'google_id'=>$this->input->post('user_id'),
      'google_name'=>$this->input->post('name'),
      'profile_pic'=>$this->input->post('picture'),
      'email'=>$this->input->post('email')
    );
    $ins = $this->User_model->googleins($data);
    if($ins == 1){
      echo json_encode(array('key'=>$data['google_id'],'key1'=>$data['google_name'],'key2'=>$data['profile_pic'],'key3'=>$data['email']));
    }else{
      echo "2";
    }      
  }

  public function fbinsert(){
    if(isset($_POST['signin'])){
      $refNo = rand(100,500);
      $data = array(
        'fname'=>$this->input->post('fname'),
        'lname'=>$this->input->post('lname'),
        'email'=>$this->input->post('email'),
        'phone'=>$this->input->post('phone_code').''.$this->input->post('phone'),
        'fb_id'=>$this->input->post('fbb_id'),
        'profile_pic'=>$this->input->post('imagee'),
        'signupVia_fb'=>1,
        'ref_code'=>$this->input->post('fname')."KU".$refNo,
        'date_created' => date('Y-m-d H:i:s')
      );
      $send = $this->User_model->insert_detl($data);
      if($send == 1){
        $_SESSION['email'] = $data['email'];
        $this->session->set_flashdata('msg','Successfully Resgistered');
        redirect('Booking/book_order');
      }else{
        $this->session->set_flashdata('msg','Registration failed');
        redirect(base_url());
      }
    }
  }

 

	// public function login(){
 //        $sel = $this->db->query("SELECT * FROM tbl_users Where email = '".$_SESSION['email']."' ");
 //        $row = $sel->row();
 //        $name = $row->fname;
 //        $last = $row->lname;
 //        $phone = $row->phone;
 //        $image = $row->profile_pic;
 //        $_SESSION['fname'] = $name;
 //        $_SESSION['lname'] = $last;
 //        $_SESSION['user'] = $name.' '.$last;
 //        $_SESSION['phone'] = $phone;
 //        $_SESSION['image'] =$image;
 //        $_SESSION['user_id'] = $row->id;
 //        $sel = $this->db->query("SELECT * FROM tbl_categories");
 //        $res = $sel->result();
 //        $dataa['fet'] = $res;   
 //        $this->load->view('user',$dataa);
 //        $this->load->view('footer');
   
	// }
  public function forgot_password(){
   }
   public function book_order(){
    $sel = $this->db->query("SELECT * FROM tbl_users Where email = '".$_SESSION['email']."' ");
    $data['sel'] = $sel->row();
    $uid = $data['sel']->id;
    $card = $this->db->query("SELECT id FROM tbl_stripeCustomer_details Where user_id = '".$uid."' ")->row()->id;

     //print_r($card);die;
    $name = $data['sel']->fname;
    $last = $data['sel']->lname;
    $phon = $data['sel']->phone;
    $phone = substr($phon,-8);
    $image = $data['sel']->profile_pic;
    $_SESSION['p_uid'] = $card;
    $_SESSION['fname'] = $name;
    $_SESSION['lname'] = $last;
    $_SESSION['user'] = $name.' '.$last;
    $_SESSION['phone'] = $phone;
    $_SESSION['image'] = $image;
    $_SESSION['user_id'] = $data['sel']->id;
      // echo "ddewdwe";die;
    //unset($_SESSION['start']);
    //unset($_SESSION['expire']);
    $this->load->view('header',$data);
    $this->load->view('sidebar');
    $this->load->view('addbook');
    $this->load->view('footer');
  }
  public function new_booking($id){
        $sel = $this->db->query("SELECT * FROM tbl_wallet Where user_id = '$id' ")->row();
        
        if($sel->balance >=0){

       
        // $row = $sel->row();
        // $name = $row->fname;
        // $last = $row->lname;
        // $phone = $row->phone;
        // $image = $row->profile_pic;
        //$_SESSION['fname'] = $name;
        // $_SESSION['lname'] = $last;
        // $_SESSION['user'] = $name.' '.$last;
        // $_SESSION['phone'] = $phone;
        // $_SESSION['image'] = base_url('public/ProfilePic/').''.$image;
        // $_SESSION['user_id'] = $row->id;
        // unset($_SESSION['service_pro']);
        // unset($_SESSION['review_quote_data']);
        // unset($_SESSION['service_data']);
        // unset($_SESSION['review_data']);


          unset($_SESSION['coupen_code']);
          unset($_SESSION['coupen_amount']);
          unset($_SESSION['coupen_type']);
          unset($_SESSION['promocode_id']);
        $selo = $this->db->query("SELECT * FROM tbl_categories");
        $res = $selo->result();
        $dataa['fet'] = $res;
        $this->load->view('user',$dataa);
        $this->load->view('footer');
         }else{
          redirect('Booking/review_pay');
        }
   
  }
   public function book_quote($id){
            $sel = $this->db->query("SELECT * FROM tbl_wallet Where user_id = '$id' ")->row();
        
        if($sel->balance >=0){

       
    //unset($_SESSION['start']);
   // unset($_SESSION['review_data']);
    unset($_SESSION['coupen_code']);
    unset($_SESSION['coupen_amount']);
    unset($_SESSION['coupen_type']);
    unset($_SESSION['promocode_id']);
    $selo = $this->db->query("SELECT * FROM tbl_categories");
        $res = $selo->result();
        $dataa['fet'] = $res;
        // $quote = "<div class='penal11'>
        //             <div class='form-group '>
        //               <span id='span_0'>Quote By Service Provider</span>
        //                 <div class='sp-quantity' id='h4' >
        //                   <span id='subject3' ></span>
        //                   <input type='checkbox' class='sp-minus fff' id='clickThiss' value='' >
        //                   <input type='hidden' id='costt1' value=''>
        //                   <span id='spn_n'></span>
        //                 </div>
        //             </div>
        //           </div>";
        // $_SESSION['service_pro'] = $quote;

        $sel0 = $this->db->query("SELECT id FROM `tbl_users` Where email = '".$_SESSION['email']."'");
        $dataa['id'] = $sel0->row();
        $sel1 = $this->db->query("SELECT question FROM `tbl_settingQues`");
        $res1 = $sel1->result();
        $dataa['question'] = $res1;
        $_SESSION['oks'] = "print";
        $this->load->view('book_quote',$dataa);
        $this->load->view('footer');
          }else{
          redirect('Booking/review_pay');
        }
  }
	public function logout(){
    	session_destroy();
        // session_destroy($_SESSION['email']);
    	redirect(base_url());
    }
    public function subcat(){
    	$id = $this->input->post('catId');
    	$sel = $this->db->query("SELECT id,category_id,subCategoryName FROM tbl_subCategory Where category_id = '".$id."' ");
    	$row = $sel->result();
        // echo "<option> --Select-- </option>";
    	foreach ($row as $key) {
    		//echo "<option value=".$key->id.">".$key->subCategoryName."</option>";
        echo "<option value=".$key->id.">".$key->subCategoryName."</option>";
    	}
    	
    }
    // public function ssubcat(){
    //   if(isset($_POST['scatId'])){
    //     $id = $this->input->post('scatId');
    //     // $sel = $this->db->query("SELECT id,category_id FROM tbl_subCategory Where id = '".$id."' ");
    //     // $row = $sel->row();
    //     // $idd = $row->id;
    //     $sel1 = $this->db->query("SELECT price,ServiceTitle FROM tbl_subCategoryServices Where subCategory_id = '".$id."' ");
    //     $rows = $sel1->result();
    //     if(!empty($rows)){
    //       echo json_encode($rows);
    //     }else{
    //       echo "error";
    //     }
    //    // print_r($rows);
    //   }else{
    //     echo "error123";
    //   }
      
    // }
    public function ssubcat_check(){
      if(isset($_POST['sub_check'])){
        $cat_id = $this->input->post('sub_check');
        $subcat_id = $this->input->post('val_chck');
        $id = $this->input->post('check');
        $sel = $this->db->query("SELECT jobRate_type,hourlyCharge,base_price FROM tbl_subCategory Where category_id = '".$cat_id."' and id = '".$subcat_id."'");
        $res = $sel->row()->jobRate_type;
        $base_price = $sel->row()->base_price;
        $hourly = $sel->row()->hourlyCharge;
        $hour_total = $base_price + $hourly;
       
       // print_r($res);
        // $sel1 = $this->db->query("SELECT id,ServiceType,ServiceTitle,Price FROM tbl_subCategoryServices Where subCategory_id = '".$id."' ");
        // $num1 = $sel->num_rows();
        // $rows = $sel1->result();
        // for($i = 0;$i < $num1; $i++){
          //$servea[] = $rows[$i]->ServiceType;
          //$type[] = $res[$i]->jobRate_type;
          if($res == 2){
            echo json_encode(array('keyy'=>$hour_total,'keyy2'=>$base_price,'keyy3'=>$hourly,'keyy1'=>2));
          }else{
            echo json_encode(array('keyy'=>$base_price,'keyy1'=>1));
          }
        // }
      }
    }

    public function ssubcat(){
      if(isset($_POST['scatId'])){
        $id = $this->input->post('scatId');
        // $sel = $this->db->query("SELECT id,category_id FROM tbl_subCategory Where subCategoryName = '".$id."' ");
        // $row = $sel->row();
        // $idd = $row->id;
        $sel1 = $this->db->query("SELECT id,ServiceType,ServiceTitle,Price FROM tbl_subCategoryServices Where subCategory_id = '".$id."' ");
        $num = $sel1->num_rows();
        $rows = $sel1->result();
        //$ee = $rows[0];
        for($i = 0;$i < $num; $i++){
          $serve[] = $rows[$i]->ServiceType;
          $type = $rows[$i]->ServiceType;
          $idd = $rows[$i]->id;
          $price = $rows[$i]->Price;
          $service = $rows[$i]->ServiceTitle;
          if($serve[$i] == 0){
            echo "";
          }elseif($serve[$i] != 4){
              echo "
                <div class='penal11'>
                  <span id='subject".$i."'>".$service."</span>
                  <input type='hidden' name='id".$i."' value='".$idd."' id='id".$i."'>
                  <input type='hidden' name='service".$i."' value='".$service."' id='service".$i."'>
                  <input type='hidden' name='type".$i."' value='".$type."' id='type".$i."'>
                  <span id='spa'></span>
                  <input type='hidden' id='span".$i."' name='totalPrice".$i."' value=''>
                    <div class='sp-quantity'>
                      <input type='hidden' id='pri1".$i."' name='price".$i."' value='".$price."'>
                        <div class='sp-minus fff'><a class='move' id='a".$i."' onclick='testt".$i."(this)'>-</a>
                        </div>
                        <div class='sp-input'>
                          <input type='text' id='zero".$i."' class='quntity-input' value='0'>
                        </div>
                        <div class='sp-plus fff'><a class='move' onclick='testt".$i."(this)' '>+</a>
                        </div>     
                    </div>
                </div>";
          }else{
            echo  "<div class='penal22'>
                    <span id='subject".$i."'>".$service."</span> 
                    <input type='hidden' name='id".$i."' value='".$idd."' id='id".$i."'>
                    <input type='hidden' name='service".$i."' value='".$service."' id='service".$i."'>
                    <input type='hidden' name='type".$i."' value='".$type."' id='type".$i."'>
                      <div class='check_penal'>
                        <input type='checkbox' class='sp-minus fff ingredients' id='pri12".$i."' name='price".$i."' data-price='".$price."'  value='".$price."' >
                        <input type='hidden' id='cost' name='totalPrice".$i."' value=''>
                        <span id='spn'></span>
                      </div>
                      </div>
            
                  

    <script type='text/javascript'>

var ingredients = document.getElementsByClassName('ingredients');

function price() {
    var result = document.getElementById('total'),
        curPrice = 0,
        ingredients = document.getElementsByClassName('ingredients');
    for (var i = 0, len = ingredients.length; i < len; i++) {
        if (ingredients[i].checked) {
            curPrice += parseFloat(ingredients[i].getAttribute('data-price'));
        }
    }
    result.firstChild.nodeValue = curPrice;
}	

for (var i = 0, len = ingredients.length; i < len; i++) {
    ingredients[i].addEventListener('change', price);
}

    </script>


                  ";
          }
        }

      }else{
        echo "error";
      }
      
    }
  
   
    public function coupon(){
      if(isset($_POST['submit'])){
        $data = $this->input->post('code');
        $mod = $this->User_model->coupondata($data);
        if($mod == "maximum"){ 
          $this->session->set_flashdata('err','Exceeded');
          redirect('Booking/rewiew_order');
        }elseif($mod == 2){
          $this->session->set_flashdata('err','Please Enter Valid Coupon Code');
          redirect('Booking/rewiew_order');
        }else{
          $id = $mod->id;
          $code = $mod->promo_code;
          $price = $mod->value;
          $perct = $mod->type;
          $pro_id = array(
            'promo_codeId' => $id
            );
          $_SESSION['coupen_code'] = $code;
          $_SESSION['coupen_amount'] = $price;
          $_SESSION['coupen_type'] = $perct;
          $_SESSION['promocode_id'];
          if($perct == 0){
            // $this->session->set_flashdata('suc1','You applied promo code('.$code.').You will get $'.$price.' discount on end of this task.');
            //$ins = $this->db->insert('tbl_bookingRequests',$pro_id);
            $_SESSION['promocode_id'] = $id;
            $_SESSION['suc1'] = 'You applied promo code('.$code.').You will get $'.$price.' discount on end of this task.';
            redirect('Booking/rewiew_order');
          }else{
            // $this->session->set_flashdata('suc1','You applied promo code('.$code.').You will get '.$price.'% discount on end of this task.');
            //$ins = $this->db->insert('tbl_bookingRequests',$pro_id);
            $_SESSION['promocode_id'] = $id;
            $_SESSION['suc1'] = 'You applied promo code('.$code.').You will get '.$price.'% discount on end of this task.';
            redirect('Booking/rewiew_order');
          }
        }
      }else{
        $this->load->view('header');
        $this->load->view('sidebar');
        $this->load->view('promo');
        $this->load->view('footer');
      }
    }
    public function logged(){

    	//print_r($_SESSION['namee']);
    	$sel = $this->db->query("SELECT * FROM tbl_categories");
		    	$res = $sel->result();
		    	$dataa['fet'] = $res;			
				//print_r($dataa);
				$this->load->view('user',$dataa);
    }
    // public function out(){
    // 	unset($_SESSION['namee']);
    // 	// $this->load->view('front');
    // }
    // public function userinfo(){
    //   if(isset($_GET['order'])){
    //     unset($_SESSION['service_data']);
    //     for($i = 0;$i < 3; $i++){

    //         $service = array(
    //           'id'=>$this->input->GET('id'.$i),
    //           'category_id'=>$this->input->GET('categoryid'),
    //           'subCategory_id'=>$this->input->GET('subcategoryid'),
    //           'serviceTitle'=>$this->input->GET('service'.$i),
    //           'ServiceType'=>$this->input->GET('type'.$i),
    //           'value'=>'0',
    //           'price'=>$this->input->GET('price'.$i),
    //           'totalprice'=>$this->input->GET('totalPrice'.$i)
    //           );
    //         $_SESSION['service_data'][] = $service;
    //         $data1[] = json_encode($service);
    //     }
    //     // echo "<pre>";
    //     // print_r($_SESSION['service_data']);die();
       
    //     $string = implode(',',$data1);
    //   //print_r($string);
    //     $data = array(
    //       'name'=>$this->input->GET('name'),
    //       'phone'=>$this->input->GET('num'),
    //       'category_id'=>$this->input->GET('categoryid'),
    //       'subCategory_id'=>$this->input->GET('subcategoryid'),
    //       'pickup_location'=>$this->input->GET('pickup_location_val1'),
    //       'dropOff_location'=>$this->input->GET('location1'),
    //       'pickup_lat'=>$this->input->GET('picklat'),
    //       'dropOff_lat'=>$this->input->GET('picklng'),
    //       'pickup_long'=>$this->input->GET('droplat'),
    //       'dropOff_long'=>$this->input->GET('droplng'),
    //       'wayPoints'=>$this->input->GET('addway'),
    //       'estimatedprice'=>$this->input->GET('estprice'),
    //       'totalprice'=>$this->input->GET('extrafea') + $this->input->GET('estprice'),
    //       'promo_codeId'=>$_SESSION['promocode_id'],
    //       'items'=>$this->input->GET(''),
    //       'distance'=>$this->input->GET(''),
    //       'services'=>$string,
    //       'hours'=>$this->input->GET('time'),
    //       'booking_date'=>$this->input->GET('date'),
    //       'booking_time'=>$this->input->GET('time'),
    //       'user_id' =>$_SESSION['user_id']
    //     );
    //     $_SESSION['review_data'] = $data;
    //     //$_SESSION['service_data'] = $service;

    //     redirect('Booking/rewiew_order');
    //   }
    // }
    public function quoteinfo(){
      if(isset($_GET['orderbook'])){
        $percent = $this->db->query("SELECT * FROM tbl_settings")->row()->minBooking_charge;
        $totall = $this->input->GET('extrafea') + $this->input->GET('estprice');
        $discount = $totall * ($percent/100);
        //$totall = $this->input->GET('extrafea') + $this->input->GET('estprice');
        //print_r($totall);die;
          unset($_SESSION['service_data']);
          // echo "<pre>";
          // print_r($_GET);die;
          for($i = 1;$i <= 10; $i++){
            $waypoint_dit = array(
              'locationname'=>$this->input->GET('endd_location_oute'.$i),
              'latitude'=>$this->input->GET('end_locatn_way_lat'.$i),
              'longitude'=>$this->input->GET('end_locatn_way_lng'.$i)
            );
            $data12[] = json_encode($waypoint_dit);
          }
          $waypoint_dit1 = implode(',',$data12);

          for($i = 0;$i <= 3; $i++){
            $service = array(
              'id'=>$this->input->GET('id'.$i),
              'category_id'=>$this->input->GET('categoryid'),
              'subCategory_id'=>$this->input->GET('subcategoryid'),
              'serviceTitle'=>$this->input->GET('service'.$i),
              'ServiceType'=>$this->input->GET('type'.$i),
              'value'=>'0',
              'price'=>$this->input->GET('price'.$i),
              'totalprice'=>$this->input->GET('totalPrice'.$i)
              );
            $_SESSION['service_data'][] = $service;
            $data1[] = json_encode($service);
        }

        $string = implode(',',$data1);
        //print_r($string);
        for($i =  1;$i< 5;$i++){
          $question = array(
            'id'=>$this->input->GET('radioInline'.$i),
            'question'=>$this->input->GET('question'.$i)
            );
          $dataaa[] = json_encode($question);
      }
      $stringg = implode(',',$dataaa);
        //print_r($stringg);
        $distan = $this->input->GET('distancekm');
        $distance = substr($distan,0,-2);
        $hourss = $this->input->GET('time123');
        $hour = substr($hourss,0,1);
        $date_sp = $this->input->GET('datepick');
        $date = substr($date_sp,0,10);
        //$date = date_format($date1,"Y/m/d");
        $time = substr($date_sp,-8,-2);
        $code = '+65';
        $pphone = $this->input->GET('num');
        $data = array(
          'name'=>$this->input->GET('name'),
          'phone'=>$code.''.$this->input->GET('num'),
          'category_id'=>$this->input->GET('categoryid'),
          'subCategory_id'=>$this->input->GET('subcategoryid'),
          'pickup_location'=>$this->input->GET('pickup_location_val1'),
          'dropOff_location'=>$this->input->GET('location1'),
          'pickup_lat'=>$this->input->GET('picklat'),
          'pickup_long'=>$this->input->GET('picklng'),
          'dropOff_lat'=>$this->input->GET('droplat'),
          'dropOff_long'=>$this->input->GET('droplng'),
          'wayPoints'=>$waypoint_dit1,
          'time'=>$this->input->GET('path_time'),
          'is_quote'=>1,
          'estimatedprice'=>$totall,
          'totalprice'=>$totall,
          'promo_codeId'=>$_SESSION['promocode_id'],
          'path_wayPoints'=>$this->input->GET('path_waypoint'),
          'distance'=>$distance,
          'services'=>$string,
          'hours'=>$hour,
          'booking_date'=>$date,
          'booking_time'=>$time,
          'questions'=>$stringg,
          'description'=>$this->input->GET('description'),
          'categoryType'=>$this->input->GET('categoryType'),
          'user_id' =>$_SESSION['user_id'],
          'date_created'=>date('Y-m-d H:i:s')
        );
        if(!preg_match("/^[a-zA-Z ]*$/",$data['name'])){
            $this->session->set_flashdata('msg','Please Enter Correct Detail');
            redirect('Booking/new_booking');
          }elseif(!preg_match('/^[0-9]{8,8}+$/',$pphone)){
            $this->session->set_flashdata('msg','Please Enter Correct Phone Number');
            redirect('Booking/new_booking');
          }elseif($data['subCategory_id'] == "" || $data['pickup_location'] == "" || $pphone == "" || $date_sp == ""){
            $this->session->set_flashdata('msg','Please fill All required Detail');
            redirect('Booking/new_booking');
          }else{
            $dataS = array_filter($data);
            $_SESSION['review_quote_data'] = $dataS;
            $_SESSION['discount_amount'] = $discount;
            //$_SESSION['estprice'] = $this->input->GET('estprice');
            $categoryType = $this->input->GET('categoryType');    
            redirect('Booking/rewiew_order');
          }        
      }else{
        redirect('Booking/new_booking');
      }
    }
    public function userinfo(){
      if(isset($_GET['order'])){
          $percent = $this->db->query("SELECT * FROM tbl_settings")->row()->minBooking_charge;
          $totall = $this->input->GET('extrafea') + $this->input->GET('estprice');
          $discount = $totall * ($percent/100);
          //$totall = $this->input->GET('extrafea') + $this->input->GET('estprice');
          unset($_SESSION['service_data']);
          for($i = 0;$i < 3; $i++){
            $service = array(
              'id'=>$this->input->GET('id'.$i),
              'category_id'=>$this->input->GET('categoryid'),
              'subCategory_id'=>$this->input->GET('subcategoryid'),
              'serviceTitle'=>$this->input->GET('service'.$i),
              'ServiceType'=>$this->input->GET('type'.$i),
              'value'=>'0',
              'price'=>$this->input->GET('price'.$i),
              'totalprice'=>$this->input->GET('totalPrice'.$i)
              );
            $_SESSION['service_data'][] = $service;
            $data1[] = json_encode($service);
          }

          for($i = 1;$i <10; $i++){
            $waypoint_dit = array(
              'locationname'=>$this->input->GET('endd_location_oute'.$i),
              'latitude'=>$this->input->GET('end_locatn_way_lat'.$i),
              'longitude'=>$this->input->GET('end_locatn_way_lng'.$i)
            );
            $data12[] = json_encode($waypoint_dit);
          }
           $waypoint_dit1 = implode(',',$data12);

          $string = implode(',',$data1);
          $distan = $this->input->GET('distancekm');
          // $distance = substr($distan,0,-2);
          $distance = str_replace('Kilometers', '', $distan); 
          // $hourss = $this->input->GET('time123');
          // $hour = substr($hourss,0,1);
          $date_sp = $this->input->GET('datepick');
          $date = substr($date_sp,0,10);
          $date = str_replace('/', '-', $date);
          $date = date('Y-m-d', strtotime($date));
            // print_r($date);die;
          //$date = date_format($date1,"Y/m/d");
          $time = substr($date_sp,-8,-2);
          $code = '+65';
          $pphone = $this->input->GET('num');
          $data = array(
            'name'=>$this->input->GET('name'),
            'user_id' =>$_SESSION['user_id'],
            'category_id'=>$this->input->GET('categoryid'),
            'subCategory_id'=>$this->input->GET('subcategoryid'),
            'pickup_location'=>$this->input->GET('pickup_location_val1'),
            'dropOff_location'=>$this->input->GET('location1'),
            'pickup_lat'=>$this->input->GET('picklat'),
            'pickup_long'=>$this->input->GET('picklng'),
            'dropOff_lat'=>$this->input->GET('droplat'),
            'dropOff_long'=>$this->input->GET('droplng'),
            'wayPoints'=>$waypoint_dit1,
            'distance'=>$distance,
            'hours'=>$this->input->GET('hour_cal'),
            'booking_date'=>$date,
            'booking_time'=>$time,
            'estimatedprice'=>$totall,
            'totalprice'=>$totall,
            'services'=>$string,
            'is_quote'=>$this->input->GET('quoteis'),
            'phone'=>$code.''.$this->input->GET('num'),
            'time'=>$this->input->GET('path_time'),
            'totalprice'=>$totall,
            'promo_codeId'=>$_SESSION['promocode_id'],
            'path_wayPoints'=>$this->input->GET('path_waypoint'),
            'categoryType'=>$this->input->GET('categoryType'),
            'description'=>$this->input->GET('description'),
            'date_created'=>date('Y-m-d H:i:s')
          );
          if(isset($_GET['categoryid']) ){
// echo "<pre>";print_r($_GET);die;

          }

          if(!preg_match("/^[a-zA-Z ]*$/",$data['name'])){
            $this->session->set_flashdata('msg','Please Enter Correct Detail');
            redirect('Booking/new_booking');
          }elseif(!preg_match('/^[0-9]{8,8}+$/',$pphone)){
            $this->session->set_flashdata('msg','Please Enter Correct Phone Number');
            redirect('Booking/new_booking');
          }elseif($data['subCategory_id'] == "" || $data['pickup_location'] == "" || $pphone == "" || $date_sp == ""){
            $this->session->set_flashdata('msg','Please fill All required Detail');
            redirect('Booking/new_booking');
          }else{
            $dataS = array_filter($data);
            $_SESSION['review_data'] = $dataS;
            //$_SESSION['estprice'] = $this->input->GET('estprice');
            $_SESSION['discount_amount'] = $discount;  
            redirect('Booking/rewiew_order');
          }        
      }else{
        redirect('Booking/new_booking');
      }
    }
    public function googleSignup(){
        // print_r($_POST);
        // die();
        $data = array(
               'fname' => $this->input->post('name'),
               'profile_pic' => $this->input->post('imageUrl'),
               'email' => $this->input->post('email'),
               'google_id' => $this->input->post('google_id'),

        );
        $result=$this->db->get_where('tbl_users',array('email' => $data['email']))->row();
            if ($result) {
            //     $this->db->insert('tbl_google',$data); 

            // }

            // else{
                 $this->db->insert('tbl_users',$data);
            //             }
             // return $this->db->insert_id();
              $_SESSION['googlename'] = $data['fname'];
      
             echo true;
           }

    }
        public function google(){
        // print_r($_SESSION['namee']);
        $sel = $this->db->query("SELECT * FROM tbl_categories");
                $res = $sel->result();
                $dataa['fet'] = $res;
                //print_r($dataa);
                $this->load->view('user',$dataa);
        }
    public function map(){
        //$data['viewcategory'] = $this->User_model->getuses(); 
        $this->load->view('dummy',$data);
    }
    public function fb_out(){
        unset($_SESSION['namee']);
       redirect(base_url());
    }
      public function googleout(){
         unset($_SESSION['googlename']);
        //session_destroy();
        // if(empty($_SESSION['googlename'])){
       redirect(base_url());
        //echo "<pre>"; print_r($_SESSION) ;
    }
   

       public function viewcategory(){
       // $id=$this->input->post('id');
       $data['viewcategory'] = $this->User_model->getuses(); 
    // print_r( $data['viewcategory']);
    // die();
   $this->load->view('dummy',$data);
  }
  public function demo(){

     $data['mapss'] = $this->User_model->getuses(); 
    //echo "<pre>";
     //  print_r($data['mapss']['dropOff_location']);
      // print_r($data['mapss']['pickup_location']);
//    die();
     $this->load->view('this2',$data);
    
   }
//      public function demo2(){
//       function parseToXML($htmlStr)
// {
// $xmlStr=str_replace('<','&lt;',$htmlStr);
// $xmlStr=str_replace('>','&gt;',$xmlStr);
// $xmlStr=str_replace('"','&quot;',$xmlStr);
// $xmlStr=str_replace("'",'&#39;',$xmlStr);
// $xmlStr=str_replace("&",'&amp;',$xmlStr);
// return $xmlStr;
// }
//        // $query = "SELECT * FROM tbl_bookingRequests WHERE id = 17 ";
//        // $result = mysql_query($query);
//           $result=$this->User_model->getuses();
//        header("Content-type: text/xml");

// // Start XML file, echo parent node
//         echo '<markers>';

// // Iterate through the rows, printing XML nodes for each
//       while ($row = @mysql_fetch_assoc($result)){
//   // Add to XML document node
//        echo '<marker ';
//   //echo 'id="' . $ind . '" ';
//   //echo 'name="' . parseToXML($row['name']) . '" ';
//   //echo 'address="' . parseToXML($row['address']) . '" ';
//   echo 'pickup_lat="' . $row['pickup_lat'] . '" ';
//   echo 'pickup_long="' . $row['pickup_long'] . '" ';
//   echo 'dropOff_lat="' . $row['dropOff_lat'] . '" ';
//   echo 'dropOff_long="' . $row['dropOff_long'] . '" ';
//  // echo 'type="' . $row['type'] . '" ';
//   echo '/>';
//       }

// // End XML file
//      echo '</markers>';

//     // $data['mapss'] = $this->User_model->getuses(); 
//     //echo "<pre>";
//        // print_r($data['mapss']['dropOff_location']);
//        // print_r($data['mapss']['pickup_location']);
//      // $this->load->view('dummy');
// //    die();
//      //$this->load->view('this2',$data);
    
//    }
   public function demo4(){
    $user=$this->User_model->getuses();
   }
  public function demo1(){
     //$data['mapss'] = $this->User_model->getuses(); 
    $this->load->view('map');
  }

  public function quote(){
     // $sel0 = $this->db->query("SELECT id FROM `tbl_users` Where email = '".$_SESSION['email']."'");
     // $rows['id'] = $sel0->row();
     // $sel1 = $this->db->query("SELECT question FROM `tbl_settingQues`");
     // $res1 = $sel1->result();
     // $ques['question'] = $res1;
     // $sel = $this->db->query("SELECT id,categoryName FROM tbl_categories");
     // $res = $sel->result();
     // $qdata['qtdata'] = $res;
     // $this->load->view('header',$qdata);
     // $this->load->view('sidebar',$ques);    
     // $this->load->view('quote',$rows);
     // $this->load->view('footer');
  }
  public function your_quote(){
    $move['info'] = $this->User_model->yourQuote();
    if($move['info'] == 2){
      $this->load->view('header');
      $this->load->view('sidebar');
      $this->load->view('quote1');
      $this->load->view('footer');
    }else{
      $this->load->view('header',$move);
      $this->load->view('sidebar');
      $this->load->view('quote1');
      $this->load->view('footer');
    }
  }

  public function successorder(){
    // if(isset($_POST)){
    //   echo "<pre>";
    //   print_r($_SESSION);die;
    // }
    if(isset($_POST['suborder'])){
      $data = array(
        'name'=>$this->input->post('oname'),
        'phone'=>$this->input->post('ophone'),
        'category_id'=>$this->input->post('categoryid'),
        'subCategory_id'=>$this->input->post(''),
        'pickup_location'=>$this->input->post('pickup_location_val1'),
        'dropOff_location'=>$this->input->post('drop_location_val1'),
        'pickup_lat'=>$this->input->post('start_location_lat0'),
        'dropOff_lat'=>$this->input->post('end_location_lat00'),
        'pickup_long'=>$this->input->post('start_location_lng0'),
        'dropOff_long'=>$this->input->post('end_location_lng00'),
        'wayPoints'=>$this->input->post('addway'),
        'estimatedprice'=>$this->input->post('fare'),
        'totalprice'=>$this->input->post('tprce'),
        'items'=>$this->input->post(''),
        'distance'=>$this->input->post(''),
        'services'=>$this->input->post(''),
        'hours'=>$this->input->post('otime'),
        'booking_date'=>$this->input->post('odate'),
        'booking_time'=>$this->input->post('otime'),
        'user_id' =>$_SESSION['user_id']
      );
      //print_r($data);die;
      $dataS = array_filter($data);
      $insrt = $this->User_model->insertbooking($dataS);
      if($insrt == 1){
        $this->session->set_flashdata('msg','Order booking successfully');
        redirect('Booking/login');
      }else{
        $this->session->set_flashdata('msg','error');
        redirect('Booking/login');
      }
    }else{
      $this->session->set_flashdata('msg','error1');
      redirect('Booking/login');
      
    }
  }
  // public function history(){
  //   $email = $_SESSION['email'];
  //   $sel['data'] = $this->User_model->hstry($email);
  //   // $this->load->view('header',$sel);
  //   $this->load->view('history',$sel);
  // }
  // public function historyaa(){
  //   $sel = $this->db->query("SELECT * FROM tbl_users Where email = '".$_SESSION['email']."' ");
  //   $data['sel'] = $sel->row();
  //   $uid = $data['sel']->id;
  //   $card = $this->db->query("SELECT id FROM tbl_stripeCustomer_details Where user_id = '".$uid."' ")->row()->id;
  //    //print_r($card);die;
  //   $name = $data['sel']->fname;
  //   $last = $data['sel']->lname;
  //   $phon = $data['sel']->phone;
  //   $phone = substr($phon,-8);
  //   $image = $data['sel']->profile_pic;
  //   $_SESSION['p_uid'] = $card;
  //   $_SESSION['fname'] = $name;
  //   $_SESSION['lname'] = $last;
  //   $_SESSION['user'] = $name.' '.$last;
  //   $_SESSION['phone'] = $phone;
  //   $_SESSION['image'] = $image;
  //   $_SESSION['user_id'] = $data['sel']->id;
  //   $email = $_SESSION['email'];
  //   /*foreach ($row as $key => $value) {
  //     print_r($value);
  //   }die;*/
  //   $data['data'] = $this->User_model->hstry($email);
  //   // $this->load->view('header',$sel);
  //   $this->load->view('history',$data);
  // }

  public function history(){
    // $sel = $this->db->query("SELECT * FROM tbl_users Where email = '".$_SESSION['email']."' ");
    // $data['sel'] = $sel->row();
    // $uid = $data['sel']->id;
    // $card = $this->db->query("SELECT id FROM tbl_stripeCustomer_details Where user_id = '".$uid."' ")->row()->id;
    //  //print_r($card);die;
    // $name = $data['sel']->fname;
    // $last = $data['sel']->lname;
    // $phon = $data['sel']->phone;
    // $phone = substr($phon,-8);
    // $image = $data['sel']->profile_pic;
    // $_SESSION['p_uid'] = $card;
    // $_SESSION['fname'] = $name;
    // $_SESSION['lname'] = $last;
    // $_SESSION['user'] = $name.' '.$last;
    // $_SESSION['phone'] = $phone;
    // $_SESSION['image'] = $image;
    // $_SESSION['user_id'] = $data['sel']->id;
    $email = $_SESSION['email'];  
    $data['histData'] = $this->User_model->hstry($email);
    $data['activateData']= $this->User_model->actvte($email);
    $data['completeData'] = $this->User_model->cmplte($email);
    $data['cancelData'] = $this->User_model->cncl($email);
    $this->load->view('history',$data);
  }

  // public function activate(){
  //   $email = $_SESSION['email'];
  //   $sel1 = $this->User_model->actvte($email);
  //   $this->load->view('activate',$sel1);
  // }
  // public function completed(){
  //   $email = $_SESSION['email'];
  //   $sel2 = $this->User_model->cmplte($email);
  //   $this->load->view('complete',$sel2);
  // }
  // public function cancelled(){
  //   $email = $_SESSION['email'];
  //   $sel3 = $this->User_model->cncl($email);
  //   $this->load->view('cancelled',$sel3);
  // }
  

  public function payment(){
    $this->load->view('header');
    $this->load->view('sidebar');
    $this->load->view('payment');
    //$this->load->view('footer');
  }
  public function notifications(){
    $send['trip'] = $this->User_model->notifiy();
    //print_r($send);die;
    $this->load->view('header',$send);
    $this->load->view('sidebar');
    $this->load->view('notifications');
    $this->load->view('footer');
   }

  public function setting(){
    $this->load->view('header');
    $this->load->view('sidebar');
    $this->load->view('setting');
    $this->load->view('footer');
  }
  public function myquery1($table,$card,$user){
    if(!empty($user)){
      $user = "Where user_id = '".$_SESSION['user_id']."' ";     
    }else{
      $user = '';
    }
    if(!empty($card)){
      $card = "and card_no = '".$card."' ";
    }else{
      $card = '';
    }
    $result = $this->db->query("SELECT * FROM ".$table." ".$user." ".$card." ");
    return $result;      
  }
 // public function info(){
 //  if(isset($_GET['id'])){
 //   $qry = $this->db->query("SELECT * FROM tbl_bookingRequests WHERE id = '".$_GET['id']."' ");
 //   $rows['rowdata'] = $qry->row();
 //   $this->load->view('header',$rows);
 //   $this->load->view('sidebar');
 //   $this->load->view('info');
 //   $this->load->view('footer');   
 //  }
 // }
  public function info(){
    if(isset($_GET['id'])){
      $id = $_GET['id'];

      $rows = $this->User_model->get_move_info($id);
      // echo "<pre"print_r($rows);die();
      $this->load->view('header',$rows);
      $this->load->view('sidebar');
      $this->load->view('info');
      $this->load->view('footer');
    }
  }
  public function driver_rating(){
    if(isset($_POST['rate_submit'])){
      echo "<pre>";print_r($_POST);

    }

  }
  public function profile_info(){
   if(isset($_POST['sign'])){
    $config['upload_path'] ='Admin/Public/img/app';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = '5000';
      $config['max_width'] = '5024';
      $config['max_height'] = '5068';
      $this->load->library('upload', $config);

      if(!$this->upload->do_upload('profile_pic')){
           $error = array(
          'error' => $this->upload->display_errors()
        );
        $image = "";
      }else{
        $data = $this->upload->data();
        //$imagename = $baseurl . $upload_path .'/'. $detail['file_name'];
        $image['image'] = base_url("Admin/Public/img/app") . '/' . $data['file_name'];
      }
      // $data = array(
      //     'fname'=>$this->input->post('fname'),
      //     'lname'=>$this->input->post('lname'),
      //     'profile_pic'=> $data['file_name']
      //   );
      if($data['file_name'] == ""){
        $dataa = array(
          'fname'=>$this->input->post('fname'),
          'lname'=>$this->input->post('lname'),
        );
        $_SESSION['fname'] = $dataa['fname'];
        $_SESSION['lname'] = $dataa['lname'];
        $_SESSION['user'] = $_SESSION['fname'].' '.$_SESSION['lname'];

        $mov = $this->User_model->acc_update1($dataa);
        $this->session->set_flashdata('msgg','Account Updated Succesfully');
        redirect('Booking/profile_update');
      }else{
        $data1 = array(
          'fname'=>$this->input->post('fname'),
          'lname'=>$this->input->post('lname'),
          'profile_pic'=> base_url("Admin/Public/img/app") . '/' . $data['file_name']
        );
        $_SESSION['fname'] = $data1['fname'];
        $_SESSION['lname'] = $data1['lname'];
        $_SESSION['user'] = $_SESSION['fname'].' '.$_SESSION['lname'];
        //$_SESSION['image'] = base_url("public/ProfilePic") . '/' .$data['profile_pic'];

        $mov = $this->User_model->acc_update($data1);
        if($mov == "updated"){
          $_SESSION['image'] = $data1['profile_pic'];
          $this->session->set_flashdata('msgg','Account Updated Succesfully');
          redirect('Booking/profile_update');
        }
        // $this->session->set_flashdata('msgg','Account Updated Succesfully');
        // redirect('Booking/profile_update');
      }
    
  }
  $sel = $this->db->query("SELECT phone FROM tbl_users Where email = '".$_SESSION['email']."'");
  $phon = $sel->row()->phone;
  $phone = substr($phon,3);
  //print_r($phone);die;
  $_SESSION['updphone'] = $phone;

  $this->load->view('header');
  $this->load->view('sidebar');
  $this->load->view('profile');
  $this->load->view('footer');
 }
  public function profile_update(){
   
      $this->load->view('header');
      $this->load->view('sidebar');
      $this->load->view('update_message');
      $this->load->view('footer');
    
 }
  public function cancel(){
  // $id = $_GET['del_id'];
  $id = $this->input->post('idd');
  $data = array(
      'is_accepted'=> 1,
      'is_cancelled'=>1
  );
  $del = $this->User_model->deleted($id,$data);
  redirect('Booking/history');

 }

  public function quoterequest(){
    if(isset($_POST['savee'])){
        for($i =  1;$i< 5;$i++){
          $dataa = array(
            'id'=>$this->input->post('radioInline'.$i),
            'question'=>$this->input->post('question'.$i)
            );
          $dataaa[] = json_encode($dataa);
          //$dataaaa[]= $dataaa.',';

        }
    //print_r($dataaaa);die();
        $string = implode(',',$dataaa);
        //print_r($string);die;
      $data = array(
        'user_id'=>$this->input->post('id'),
        'cat_id'=>$this->input->post('categoryquote'),
        'subCat_id'=>$this->input->post('subcategoryquote'),
        'questions'=>$string,
        'description'=>$this->input->post('description')
      );
      //print_r($data);
      //$dataS = array_filter($data)
      $sel = $this->User_model->quoteInsert($data);
      $this->session->set_flashdata('sucess','Sucessfully Submited Your Quote Request');
      redirect('Booking/Success_quote');
    }
  }
  public function Success_quote(){
     $this->load->view('header');
     $this->load->view('sidebar');
     $this->load->view('successReq');
     $this->load->view('footer');
  }
  public function offer(){
    $email = $_SESSION['email'];
    $data['offers'] = $this->User_model->SelectData($email);
    //print_r($data);die;
    $this->load->view('header',$data);
    $this->load->view('sidebar');
    $this->load->view('offer');
    $this->load->view('footer');
  }

  public function view_proposal(){
    if(isset($_GET['quote_id'])){
      $id = $_GET['quote_id'];
      $move['info_1'] = $this->User_model->proposal($id);
      $this->load->view('header',$move);
      $this->load->view('sidebar');
      $this->load->view('proposals');
      $this->load->view('footer');
    }  
  }
  public function password_recovery(){
      $this->load->view('header');
      $this->load->view('sidebar');
      $this->load->view('update_account');
      $this->load->view('footer');
  }
  public function updated(){
    if(isset($_POST['updatee'])){
      $data = array(
        'password'=>md5($this->input->post('oldpw')),
        'newpass'=>md5($this->input->post('newpw')),
        'conpass'=>md5($this->input->post('conew'))
      );
      if($data['newpass'] != $data['conpass']){
        $this->session->set_flashdata('Error','password and confirm password not match');
        redirect('Booking/password_recovery');
      }else{
      $modl = $this->User_model->updtePw($data);
      if($modl == "success"){
        $this->session->set_flashdata('success','Password Updated Successfully');
        redirect('Booking/update_success');
      }else{
        $this->session->set_flashdata('Error','Incorrect Old Password');
        redirect('Booking/password_recovery');
      }
    }
    }
  }
  public function update_success(){
    $this->load->view('header');
    $this->load->view('sidebar');
    $this->load->view('update_success');
    $this->load->view('footer');
  }
  public function wallet(){
    unset($_SESSION['coupen_code']);
    unset($_SESSION['coupen_amount']);
    unset($_SESSION['coupen_type']);
    unset($_SESSION['promocode_id']);
    $wal_histry= $this->User_model->show_walet();
    $this->load->view('header',$wal_histry);
    $this->load->view('sidebar');
    $this->load->view('wallet2');
    $this->load->view('footer');
  }
  public function add_money(){
    $this->load->view('header');
    $this->load->view('sidebar');
    $this->load->view('wallet1');
    $this->load->view('footer');
  }
  // public function card(){
  //   $this->load->view('header');
  //   $this->load->view('sidebar');
  //   $this->load->view('wallet');
  //   $this->load->view('footer');
  // }
  public function card_list(){
    $query = $this->myquery1('tbl_stripeCustomer_details','','$_SESSION["user_id"]');
    $move['card_det'] = $this->User_model->card_detail($query);
    $this->load->view('header',$move);
    $this->load->view('sidebar');
    $this->load->view('all_cards');
    $this->load->view('footer');
  }
  public function card_detaill(){
    $query = $this->myquery1('tbl_stripeCustomer_details','','$_SESSION["user_id"]');
    $addmoney['money'] = $_SESSION['add_wallet_money']['money'];
    $addmoney['money'] = $this->input->post('wallet_value');
    $addmoney['money'] = $_SESSION['discount_amount'];
    // $addmoney['money'] = $this->input->post('wallet_value');
    // $addmoney['money'] = $_SESSION['review_data']['totalprice'];
    $move['card_det'] = $this->User_model->card_detail($query);
    $this->load->view('header',$move);
    $this->load->view('sidebar',$addmoney);
    $this->load->view('all_cards');
    $this->load->view('footer');
  }
  public function card(){
    if(isset($_POST['admoney'])){
      unset($_SESSION['review_data']);
      //unset($_SESSION['review_quote_data']);
      //unset($_SESSION['service_data']);
      $addmoney['money'] = $this->input->post('wallet_value');
      if(empty($addmoney)){
        $this->session->set_flashdata('err','Please enter amount');
        redirect('Booking/add_money');
      }else{
        $query = $this->myquery1('tbl_stripeCustomer_details','','$_SESSION["user_id"]');
        $move['card_det'] = $this->User_model->card_detail($query);
        if($move['card_det'] == "empty"){
          redirect('Booking/cards');
        }else{
          $this->load->view('header',$move);
          $this->load->view('sidebar',$addmoney);
          $this->load->view('all_cards');
          $this->load->view('footer');
        }
      }
    }else{
      redirect('Booking/add_money');
      // if(isset($_POST['suborder']) || isset($_SESSION['review_data'])){
      //   $query = $this->myquery1('tbl_stripeCustomer_details','','$_SESSION["user_id"]');
      //   $amt['money'] = $_SESSION['review_data']['totalprice'];
      //   $move['card_det'] = $this->User_model->card_detail($query);
      //   $this->load->view('header',$move);
      //   $this->load->view('sidebar',$amt);
      //   $this->load->view('all_cards');
      //   $this->load->view('footer');
      // }else{
      //   redirect('Booking/add_money');
      // }
    }
  }
  public function review_pay(){
    if(isset($_POST['suborder']) || isset($_SESSION['review_data'])){
        $query = $this->myquery1('tbl_stripeCustomer_details','','$_SESSION["user_id"]');
        //$amt = $_SESSION['review_data']['totalprice'];
        $amt = $_SESSION['discount_amount'];
        //$move['card_det'] = $this->User_model->card_detail($query);
        if($move['card_det'] == "empty"){
          redirect('Booking/cards');
        }else{
          $check['wallet_money'] = $this->User_model->wallet_val($amt);

          if($check['wallet_money'] == 'negative'){
          $message = "Its seems insufficient balance in your wallet. You need to clear your previous dues to create this task.<a href='wallet' >Click here</a>";
          $this->session->set_flashdata('pay_error',$message);
          $this->load->view('header');
          $this->load->view('error');
          $this->load->view('footer');
          }else{

          if($check['wallet_money']['type'] == 1){
            $book_last_id = $check['wallet_money']['last_id'];
            $select_all_data = $this->db->select('*');
                               $this->db->from('tbl_bookingRequests');
                               $this->db->where('id',$book_last_id);
                               $insertData = $check['wallet_money']['last_id'];
            $roww_data = $this->db->get()->row();
            $categoryType = $roww_data->categoryType;
            $pickup_lat = $roww_data->pickup_lat;
            $pickup_long = $roww_data->pickup_long;
            // print_r($pickup_long);die();
            $is_quote = $roww_data->is_quote;
            $valuee = $roww_data->value;
            //print_r($roww_data);die;
            $rType = 1;
                // $categoryType = $this->input->GET('categoryType');
                $catType =  $categoryType;
                $getDrivers = $this->User_model->getLocationNew($pickup_lat,$pickup_long,$rType,$catType);
                // print_r($catType);die();
                $pushData['message'] = "You have recieved a request for new task";
                $pushData['action'] = "new move";
                $pushData['req_id'] = $insertData;
                $pushData['is_quote'] = $is_quote;
                $pushData['value'] = $valuee;
                if($is_quote == 1){
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
                        'is_quote'=>$is_quote,
                        'date_created'=>date('Y-m-d H:i:s')
                    );
                    $insertNotification = $this->User_model->insert_data('tbl_notifications',$notificationArray);

                    $pushData['Utype'] = 2;
                    $selectLogin = $this->User_model->select_data('*','tbl_login',array('user_id'=>$value->id,'status'=>1));
                    foreach ($selectLogin as  $loginUsers) {
                        $pushData['token'] = $loginUsers->token_id;
                        // if(!empty($check_Membership)){
                        if($loginUsers->device_id == 1){
                          // echo "132ewddd3";die;
                            $this->User_model->iosPush($pushData);
                        }else if($loginUsers->device_id == 0){
                            // echo "1323";die;
                            $this->User_model->androidPush($pushData);
                        }
                    }
                }



            $this->session->set_flashdata('msg','Booking Order Successfully');
            redirect('Booking/new_booking');
          }else{
            redirect('Booking/card_detaill');
          }
        }
        }
      }elseif(isset($_SESSION['review_quote_data'])){
        $query = $this->myquery1('tbl_stripeCustomer_details','','$_SESSION["user_id"]');
        $amt = $_SESSION['review_quote_data']['totalprice'];
        //$amtt['money'] = $_SESSION['review_quote_data']['totalprice'];
        $move['card_det'] = $this->User_model->card_detail($query);
        if($move['card_det'] == "empty"){
          redirect('Booking/cards');
        }else{
          $check['wallet_money'] = $this->User_model->wallet_val($amt);
            if($check['wallet_money'] == 1){
              $this->session->set_flashdata('msg','Tast complete Successfully');
              redirect('Booking/your_quote');
            }else{
             $amtt['money'] = $_SESSION['review_quote_data']['totalprice'];
              $this->load->view('header',$move);
              $this->load->view('sidebar',$amtt);
              $this->load->view('all_cards');
              $this->load->view('footer');
            }
        }
      }else{
        redirect('Booking/book_order');
      }
  }
  public function rewiew_order(){
    //$sel = $this->User_model->review_check();
    $this->load->view('header');
    $this->load->view('sidebar');
    $this->load->view('review');
    $this->load->view('footer');
  }
  public function cancel_coupon(){
    unset($_SESSION['promocode_id']);
    unset($_SESSION['suc1']);
    redirect('Booking/rewiew_order');
  }
//   public function added_card(){
//     $last = $this->input->post('card');
//     $card = substr($last,-4);
//     $data = array(
//       'user_id'=>$_SESSION['user_id'],
//       'token_id'=>$this->input->post('token_key'),
//       'card_no'=>$card,
//       'isDefault'=>0,
//       'date_created'=>date('Y-m-d H:i:s')
//     );
//   $ins = $this->User_model->insert_card($data);
//   if($ins == 1){
//     //$_SESSION['makepay'] = $data;
//     $success = '<div class="alert alert-success">
//                     <strong>Success!</strong> Your Card Add Successfully.
//                 </div>';
//     echo $success;
//   }else{
//     echo "error";
//   }
  
// }
  public function added_card(){
    require_once(APPPATH.'libraries/lib/Stripe.php');
    $card = $this->input->post('card');
    $last4 = substr($card,-4);
    $data_card = array(
      'user_id'=>$_SESSION['user_id'],
      'token_id'=>$this->input->post('token_key'),
      'card_no'=>$last4,
      'isDefault'=>0,
      'date_created'=>date('Y-m-d H:i:s')
    );
    $pkey = "sk_test_Lg9DUblnqYKJTdzU9YSAUS0n";
    Stripe::setApiKey($pkey);
    try
    {
     $customer = Stripe_Customer::create(array(
         'email' => $_POST['email'],
         'source'  => $data_card['token_id']
      ));
     $cus_id = $customer['id'];
     $data_cust = array(
        'user_id'=>$_SESSION['user_id'],
        'customer_id'=>$cus_id,
        'card_no'=>$last4,
        'is_default'=>0,
        'date_created'=>date('Y-m-d H:i:s')
      );
     
     $ins = $this->User_model->insert_card($data_card,$data_cust);
     $added = '<div class="alert alert-success">
                <strong>Success!</strong> Your card added successfully.
              </div>';
      echo $added;
    }
    catch(Exception $e)
    {
      error_log("unable to sign up customer:" . $_POST['email'].
        ", error:" . $e->getMessage());
    }
  }

  public function pay(){
    if(isset($_POST['submit'])){
      $last4 = $this->input->post('card');
      //$last4 = substr($last,-4);
      $data = array(
        'id'=>$this->input->post('id'),
        'card'=>$last4,
        'amount'=>$this->input->post('amount')
      );
      //$settng_cal = $this->db->query("SELECT * FROM tbl_settings")->row()->minBooking_charge;
      //$cal_dedt = $data['amount'] * ($settng_cal/100);
      $stripeAmount = ceil($data['amount'] * 100);
      $mve = $this->User_model->token($data);
      //print_r($mve);die;
      require_once(APPPATH.'libraries/lib/Stripe.php');
      Stripe::setApiKey("sk_test_Lg9DUblnqYKJTdzU9YSAUS0n");
      $customer = $mve;
      $email = $_SESSION['email'];

      try{

        if(empty($customer)){
          throw new Exception("The Stripe Token was not generated correctly");
        }else{  
            $aar =  Stripe_Charge::create(array("amount" => $stripeAmount,
                                          "currency" => 'SGD',
                                          "customer" => $customer
                                          //"description" => $email
                                          ));
            $success = '<div class="alert alert-success">
                          <strong>Success!</strong> Your payment was successful.
                        </div>';
            $success1 = '<div class="alert alert-success">
                          <strong>Success!</strong> Your Amount was Added Successfully.
                        </div>';
            //$sel = $this->User_model->payment_record($aar);
            //$this->session->set_flashdata('pay_sucess',$success);
            //redirect('Booking/payment_success');
            if(isset($_SESSION['review_data'])){
              $movee = $this->User_model->bok_order($data,$aar);
              if($movee == 1){
                //$this->session->set_flashdata('msg','Booking Order Successfully');
                redirect('Booking/review_pay');
              }else{
                $this->session->set_flashdata('msg','Booking Request Failed');
                  redirect('Booking/new_booking');
              }
            }elseif(isset($_SESSION['review_quote_data'])){
              $movee1 = $this->User_model->bok_quote_order($data,$aar);
              if($movee1 == 2){
                //$this->session->set_flashdata('msg','Task Creatd Successfully');
                redirect('Booking/review_pay');
              }else{
                $this->session->set_flashdata('msg','Quote Request Failed');
                  redirect('Booking/book_quote');
              }
            }else{
              //$sel = $this->User_model->payment_record($aar);
              //$_SESSION['card_wallet'] = $data['card'];
              $add_wallet = $this->User_model->wallet_money($data,$aar);
              if($add_wallet == 1){
                $this->session->set_flashdata('pay_sucess',$success1);
                redirect('Booking/payment_success');
              }else{
                $this->session->set_flashdata('pay_sucess',"transaction failed");
                redirect('Booking/payment_success');
              }
            }
        }
      }
      catch(Exception $e){
        $error = '<div class="alert alert-danger">
                <strong>Error!</strong> '.$e->getMessage().'
                </div>';
        $this->session->set_flashdata('pay_error',$error);
        redirect('Booking/payment_error');
      }
    }else{
      redirect('Booking/card');
    }
  }
  public function cards(){
    $this->load->view('header');
    $this->load->view('sidebar');
    $this->load->view('wallet');
    $this->load->view('footer'); 
  }
  public function payment_success(){
    $this->load->view('header');
    $this->load->view('sidebar');
    $this->load->view('success');
    $this->load->view('footer'); 
  }
  public function payment_error(){
    $this->load->view('header');
    $this->load->view('sidebar');
    $this->load->view('error');
    $this->load->view('footer'); 
  }

public function updateData(){

  if(isset($_POST['val'])){
    $val = $_POST['val'];
    // print_r($val);
    $category = $_POST['sub_cat'];
    $sel = $this->db->query("SELECT * ,(select wayPoint_charge from tbl_settings where id = '1') as waypoint_charge FROM tbl_subCategory WHERE id = '".$category."'")->row();
  
    $basefare = $sel->base_price;
    $wayPoint_charge = $sel->waypoint_charge;
    $kmchrge = $sel->kmCharge;
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    if(empty($val)){
      $inc = 0;
    }else{
    $inc = $_POST['inc'];}
    $way_cal = $wayPoint_charge * $inc;
    
          $url = "https://maps.googleapis.com/maps/api/directions/json?mode=driving&origin=$origin&destination=$destination&waypoints=$val&sensor=false&key=AIzaSyDurzeFEiJdNJvMe72sxiCIxsOh0YT7YPY";  
            // print_r($url);
      $json = file_get_contents($url);
      $dataS = json_decode($json);
      $polygon = $dataS->routes[0]->overview_polyline->points;
      $path = base64_encode($polygon);
      if(!empty(isset($dataS))){
         $distance = $dataS->routes[0]->legs[0]->distance->value;
         $dist = ceil($distance/1000);
         $duration = $dataS->routes[0]->legs[0]->duration->text;
         $duration = str_replace(array('mins', 'min'), 'Minutes', $duration);
         $time = $dataS->routes[0]->legs[0]->duration->value;
         $end_address = $dataS->routes[0]->legs[0]->end_address;
         $end_address_lat_lng = $dataS->routes[0]->legs[0]->end_location;
         $newdis = ceil($distance /1000);
         // print_r($way_cal); print_r($basefare); print_r($newdis); print_r($kmchrge);
         $mydata = $way_cal + $basefare + ($newdis * $kmchrge);
          // $mydata = $newdis*$rate;
         //print_r()
          echo json_encode(array('key'=>$dist,'key1'=>$duration,'key2'=>$mydata,'key3'=>$path,'key4'=>$time,'key5'=>$end_address,'key6'=>$end_address_lat_lng));
      }else{
        echo "0";
      }
         //$mydata = $newdis*$rate;
        //print_r($total);
      }
}

public function deleteway(){

  if(isset($_POST['val'])){
    $val = $_POST['val'];
    // print_r($val);
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $inc = $_POST['inc'];
          $url = "https://maps.googleapis.com/maps/api/directions/json?mode=driving&origin=$origin&destination=$destination&waypoints=$val&sensor=false&key=AIzaSyDurzeFEiJdNJvMe72sxiCIxsOh0YT7YPY";    
      $json = file_get_contents($url);
      $dataS = json_decode($json);    
       $distance = $dataS->routes[0]->legs[0]->distance->value;
       $newdis = $distance /1000;
       $rate = 12; 
       $mydata = $newdis*$rate;
      print_r($mydata);
    }
  }

  public function calculateFare($req_id){
    // $req_id= $this->input->post('req_id');
    $FareData = $this->User_model->calculateFare($req_id);
    if(empty($FareData)){
      $error = "failed";
    }else{
                  
      $calculateFareResponse = $FareData;

     }

  }






}