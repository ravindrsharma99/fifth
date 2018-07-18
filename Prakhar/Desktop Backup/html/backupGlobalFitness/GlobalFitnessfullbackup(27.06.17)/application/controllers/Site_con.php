<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

// error_reporting(E_ALL);
// ini_set('display_errors',1) ;
 


class Site_con extends CI_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model(array("Site_model","Admin_model"));
	}	
	

	public function addcart($id)
	{
		if($id!=""){
			if(isset($_SESSION['productDetail']['addtocart'])){
				array_push($_SESSION['productDetail']['addtocart'],$id);
				$_SESSION['productDetail']['count'] += 1;
			}
			else{
				$_SESSION['productDetail']['addtocart'] = array($id);
				$_SESSION['productDetail']['count'] = 1;
			}
			redirect("/cart");
		}
		else
		{
			redirect("/cart");
		}
	}
  
	public function step1(){
		if($this->session->userdata('userId')!=""){
			redirect("/cart");
		}
		else{
			$data['title'] ="Sign In | Global Fitness Checkout";
			//$data['category'] =  $this->Site_model->categorySearch();
			$this->load->view('template/site/header',$data);
			$this->load->view('step1');
			$this->load->view('template/site/footer');
		}
	}

  public function shipingDetails()
  {
    /*CONTROLLER:com.rdwy.ec.rexcommon.proxy.http.controller.ProxyApiController
          redir:/tfq561*/
          $LOGIN_USERID="test1234";
          $LOGIN_PASSWORD="testing";
          $BusId="67022240928";
          $BusRole="Shipper";
          $PaymentTerms="Prepaid";
          $OrigCityName="Akron";
          $OrigStateCode="OH";
          $OrigZipCode="44310";
          $OrigNationCode="USA";
          $DestCityName=$this->input->post('DestCityName');
          $DestStateCode=$this->input->post('DestStateCode');
          $DestZipCode=$this->input->post('DestZipCode');
          $DestNationCode="USA";
          $ServiceClass="STD";
          $PickupDate="20090128";
          $TypeQuery="QUOTE";
          $LineItemWeight1=$this->input->post('totalWeight');
          $LineItemNmfcClass1="70";
          $LineItemCount="1";
          $AccOption1="HOMD";
          $Acc="";

          $url = "https://my.yrc.com/dynamic/national/servlet?CONTROLLER=com.rdwy.ec.rexcommon.proxy.http.controller.ProxyApiController&redir=/tfq561&LOGIN_USERID=".$LOGIN_USERID."&LOGIN_PASSWORD=".$LOGIN_PASSWORD."&BusId=".$BusId."&BusRole=".$BusRole."&PaymentTerms=".$PaymentTerms."&OrigCityName=".$OrigCityName."&OrigStateCode=".$OrigStateCode."&OrigZipCode=".$OrigZipCode."&OrigNationCode=".$OrigNationCode."&DestCityName=".$DestCityName."&DestStateCode=".$DestStateCode."&DestZipCode=".$DestZipCode."&DestNationCode=".$DestNationCode."&ServiceClass=".$ServiceClass."&PickupDate=".$PickupDate."&TypeQuery=".$TypeQuery."&LineItemWeight1=".$LineItemWeight1."&LineItemNmfcClass1=".$LineItemNmfcClass1."&LineItemCount=".$LineItemCount."&AccOption1=".$AccOption1."&Acc";   
          // $url = htmlentities($url);
          $curl = curl_init($url);
          curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          $transaction= curl_exec($curl);
          curl_close($curl);

          $transaction = simplexml_load_string($transaction);
          // print_r($Weight);
          // echo "<pre>"; 
          // print_r($transaction->BodyMain->RateQuote->RatedCharges->TotalCharges[0]); 
          // echo "</pre>"; //retrieve a object(SimpleXMLElement)
          // echo($url);
          echo($transaction->BodyMain->RateQuote->RatedCharges->TotalCharges);
          // echo "";
  }

	public function test(){
		$data['title'] ="Product Detail";
		$data['category'] =  $this->Site_model->categorySearch();
		$this->load->view('template/site/header',$data);
		$this->load->view('test_view');
		$this->load->view('template/site/footer');
	}
	public function demo1(){
		$data['title'] ="demo1";
		//$data['category'] =  $this->Site_model->categorySearch();
		$this->load->view('template/site/header',$data);
		$this->load->view('demo1_view');
		$this->load->view('template/site/footer');
	}
	public function step2(){
		if($_SESSION['productDetail']['count']>0){
      if(isset($_POST['firstname'])){
        $_SESSION['shipping']=$_POST;
        header("location:".base_url('/site/payment'));
      }
			$data['title'] ="Shipping Details | Global Fitness Checkout";
			//$data['category'] =  $this->Site_model->categorySearch();

      // echo "<pre>";
      // print_r($_SESSION);
      // die();
			$this->load->view('template/site/header',$data);
			$this->load->view('step2');
			$this->load->view('template/site/footer');
		}
		else{
			redirect('/cart');
		}
	}

public function searchcity($keysearch){
      $keysearch= $_POST['keysearch'];
      $result =  $this->Site_model->searchcity($keysearch);
      
       foreach($result as $data)
            { ?>

                  <tr style="padding:6px">
                 <td style="padding:10px"><a onclick="AddCity('<?php echo $data->zip; ?>')" style="cursor:pointer"><?php echo $data->zip; ?></a></td> 
                </tr>  
      <?php }

    if(empty($result))
    {?>
     <tr style="padding:6px" colspan="3">
      <td ><a>No Code Found</a></td> 
    </tr>
   <?php }

  }

public function searchState(){
        $id= $_POST['id'];
      $result =  $this->Site_model->searchState($id);
      
        if(!empty($result))
        {  
            print_r(json_encode($result));
        }

  }  


	public function demo2(){
		$data['title'] ="demo2";
		//$data['category'] =  $this->Site_model->categorySearch();
		$this->load->view('template/site/header',$data);
		$this->load->view('demo2_view');
		$this->load->view('template/site/footer');
	}
	public function demo3(){
		$data['title'] ="demo3";
		//$data['category'] =  $this->Site_model->categorySearch();
		$this->load->view('template/site/header',$data);
		$this->load->view('demo3_view');
		$this->load->view('template/site/footer');
	}


	public function about(){
	    $data['title'] = "About";
	    $data['category'] =  $this->Site_model->categorySearch();
	    $result =  $this->Admin_model->page_detail("About");
	    $data['title'] = $result[0]->title;
	    $data['description'] = $result[0]->description;
	    $data['keywords'] = $result[0]->keywords;
	    $data['result'] = $result;
	    $this->load->view('template/site/header',$data);
	    $this->load->view('page/front_about');
	    $this->load->view('template/site/footer');  
	}

	
   public function privacy(){
    $data['category'] =  $this->Site_model->categorySearch();
    $result =  $this->Admin_model->page_detail("Privacy");
    $data['title'] = $result[0]->title;
    $data['description'] = $result[0]->description;
    $data['keywords'] = $result[0]->keywords;
    $data['result'] = $result;
    $this->load->view('template/site/header',$data);
    $this->load->view('page/front_about');
    $this->load->view('template/site/footer');  
  }

  public function term(){
    $data['category'] =  $this->Site_model->categorySearch();
    $result =  $this->Admin_model->page_detail("Term");
    $data['title'] = $result[0]->title;
    $data['description'] = $result[0]->description;
    $data['keywords'] = $result[0]->keywords;
    $data['result'] = $result;
    $this->load->view('template/site/header',$data);
    $this->load->view('page/front_about');
    $this->load->view('template/site/footer');  
  }

  public function liveinventory(){
    $data['brand'] = $this->Site_model->allrecord('zFitnessBrand');
    $data['mmcategory'] = $this->Site_model->allrecord('zFitnessCategory');
    $data['condition'] = $this->Site_model->allrecord('zFitnessConditions');
    $data['title'] = "Live Inventory Product";
   	$data['category'] =  $this->Site_model->categorySearch();
   	$data['lproduct'] =  $this->Site_model->liveinventory();
   	$this->load->view('template/site/header',$data);
  	$this->load->view('live_inventory');
  	$this->load->view('template/site/footer'); 
  }

   public function filter(){
    $data['brand'] = $this->Site_model->allrecord('zFitnessBrand');
    $data['mmcategory'] = $this->Site_model->allrecord('zFitnessCategory');
    $data['availability'] = $this->Site_model->allrecord('zFitnessAvailability');
    
    $data['condition'] = $this->Site_model->allrecord('zFitnessConditions');
    $data['piece'] = $this->Site_model->allrecord('zFitnessPiece');
    
    $data['category'] =  $this->Site_model->categorySearch();
    $data['lproduct'] =  $this->Site_model->liveinventory();


    $data['title'] = "Live Inventory Product";
    $this->load->view('template/site/header',$data);
    $this->load->view('filter_live');
    $this->load->view('template/site/footer'); 
  }

	public function addtocart(){
		if(isset($_POST['cartcheckout']))
		{
			$_SESSION['sale']= $_POST['quantity'];
			if($this->session->userdata('userId')!=""){ 
				redirect('/site/step2');
            }
            else{ 
                redirect('/site/step1');
            }
		}			
	    $data['title'] = "My List";
	   	$data['category'] =  $this->Site_model->categorySearch();
	   	$data['l_product'] = $this->Site_model->productSearchF("Cardio");
	  	$this->load->view('template/site/header',$data);
		$this->load->view('cart');
		$this->load->view('template/site/footer'); 
	}
 
  	public function nextrecord(){
  		  //echo "hello"; die;
      //print_r($_POST['record']); echo "<br>"; die;
       //print_r($_POST['filter']); echo "<br>"; die;
      
  		$record = $this->Site_model->nextrecord($_POST['record'],$_POST['filter']);
  		if(count($record)>0){
  			foreach($record as $live){
  				?>
          <tr class="countTr">
            <td class="blank">
            <?php
                if( in_array($live->ProductName , $_SESSION['mylistproduct']['listname']) )
                  {
                    ?>
                    <img class="likeImage" src="<?php echo base_url('public/assets/images/check_img.png'); ?>" data-status="1" data-name="<?php  echo $live->ProductName;  ?>" data-src="<?php echo base_url('public/assets/images/plush_cart.png'); ?>">
                    <?php
                  }
                  else{
                    ?>
                    <img class="likeImage" data-src="<?php echo base_url('public/assets/images/check_img.png'); ?>" data-status="0" data-name="<?php  echo $live->ProductName;  ?>" src="<?php echo base_url('public/assets/images/plush_cart.png'); ?>">  <?php
                  }
               ?></td>
            <td class="min_first">
              <?php echo $live->ProductName; ?></td>
            <td class="mina"><?php echo $live->MPN; ?></td>
            <td class="mina"><?php echo $live->Piece ; ?></td>
            <td class="mina"><?php
              if($live->QuantityOnHand<=0){
                ?><span class="outstock">Out of Stock</span><?php
              }
              else if(($live->QuantityOnHand>0) && ($live->QuantityOnHand<3)){
                echo "< 3";
              }else{
                ?>
                <span class="inerstock">In Stock</span>
              <?php 
              } ?></td>
            <td class="mina"><table><tr><td><?php if($live->Price!="Please Enquire"){ echo "$";} ?><?php echo trim($live->Price,'$'); ?></td><td>
            <?php
              if($live->QuantityOnHand<=0){
                 if($live->countwish==0){                  
                ?><div class="outr"><input type="button"  <?php if($this->session->userdata('userId')==""){ echo 'data-toggle="modal" data-target="#myModal_login"';  }else{ echo 'class="clickwishlist"'; } ?>  data-val="<?php echo $live->ProductName; ?>" value="Wait List Me"></div><?php
                }
 
              }else{
                ?>
                 <div class="filter"><input type="button" value="Add to cart"></div>
              <?php 
              } ?></td></tr></table></td>
          </tr>
        <?php      
  			}  			
  		}
  		else{
  			return 0;
  		}
  	}

  	public function nextmobilerecord(){
  
      $jack = $_POST['record'];
      $jill=$_POST['filter'];
      $record = $this->Site_model->nextrecord($jack,$jill);
  		if(count($record)>0){
  			foreach($record as $live){
          $jack++;
           ?>
           <div class="panel panel-default dashd liveENVTRY">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <i class="indicator glyphicon glyphicon-chevron-up margn pull-left"></i>
                  <a class="accordion-toggle Accccccc" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $jack; ?>">
                    <?php echo $live->ProductName; ?>
                  </a>
                   <span class="stock "><?php
                    if($live->QuantityOnHand<=0){
                      ?>
                      <span class="outstock">Out of Stock</span><?php
                    }
                    else if(($live->QuantityOnHand>0) && ($live->QuantityOnHand<3)){
                      echo "<span>< 3</span>";
                    }else{
                      ?>
                      <span class="inerstock">In Stock</span>
                    <?php 
                    } ?>
                  </span>
                </h4>
              </div>
              <div id="collapse<?php echo $jack; ?>" class="panel-collapse collapse">
                <div class="panel-body">
                 <div class="row inner_product_discription">            

            <div class="row inner_product_container">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="small">
                  <h5><?php echo $live->ProductName; ?></h5>
                </div><!--end of small-->
              </div>

      <div class="col-md-5 col-sm-5 col-md-offset-1">        
          <div class="col-md-12 col-sm-12">
            <div class="product_penal_content">
             <div class="product_penal_shiping2">
              <?php 
                if($live->MPN!=""){
              ?>
                <div class="product_penal_shiping_left">MPN:</div>
                <div class="product_penal_shiping_right"><?php echo $live->MPN; ?></div>
                <?php } 
                if($live->Piece!=""){ ?>
                <div class="product_penal_shiping_left">Piece:</div>
                <div class="product_penal_shiping_right"><?php echo $live->Piece ; ?></div>
                  <?php } 
                if($live->QuantityOnHand!=""){ ?>
                <div class="product_penal_shiping_left">QuantityOnHand</div>
                <div class="product_penal_shiping_right"><?php
              if($live->QuantityOnHand<=0){
                ?><span class="outstock">Out of Stock</span><?php
              }
              else if(($live->QuantityOnHand>0) && ($live->QuantityOnHand<3)){
                echo "<span>< 3</span>";
              }else{
                ?>
                <span class="inerstock">In Stock</span>
              <?php 
              } ?></div> 
              <?php } 

                if($live->Price!=""){ ?>
                <div class="product_penal_shiping_left">Price</div>
                <div class="product_penal_shiping_right"><?php if($live->Price!="Please Enquire"){ echo "$";} ?><?php echo trim($live->Price,'$'); ?></div>
                <?php } ?>
              </div>
              <div class="product_penal__question">
                <div class="col-xs-6 padd">
               <div class="question_heding">
                <div class="requu">  
                   <!-- <img src="<?php echo base_url(); ?>/public/assets/images/plush_cart.png">-->
                <?php
                if( in_array($live->ProductName , $_SESSION['mylistproduct']['listname']) )
                  {
                    ?>
                    <img class="likeImage" src="<?php echo base_url('public/assets/images/check_img.png'); ?>" data-status="1" data-name="<?php  echo $live->ProductName;  ?>" data-src="<?php echo base_url('public/assets/images/plush_cart.png'); ?>">
                    <?php
                  }
                  else
                  {
                    ?>
                    <img class="likeImage" data-src="<?php echo base_url('public/assets/images/check_img.png'); ?>" data-status="0" data-name="<?php  echo $live->ProductName;  ?>" src="<?php echo base_url('public/assets/images/plush_cart.png'); ?>">  <?php
                  }
               ?></div><!--end of requu--></div></div>
                    <div class="col-xs-6 padd">
              <div class="filter_top">
              <?php
              if($live->QuantityOnHand<=0){
                 if($live->countwish==0){                  
                ?><div class="outr"><input type="button"  <?php if($this->session->userdata('userId')==""){ echo 'data-toggle="modal" data-target="#myModal_login"';  }else{ echo 'class="clickwishlist"'; } ?>  data-val="<?php echo $live->ProductName; ?>" value="Wait List Me"></div><?php
                }
             
              }else{
                ?>
                 <div class="filter"><input type="button" value="Add to cart"></div>
              <?php 
              } ?>
            </div><!--end filter--><!--HAVE--></div>
                
                 </div>
               </div>
             </div>
           </div>
         </div>
        </div>
                </div>
              </div>
            </div>
          <?php 
        }
  		}
  		else{
  			echo  0;
  		}
  	}

  	public function addmylist()
	{
		$name = $this->input->post("name");
		$status = $this->input->post("status");
		if($status=="0"){
			if(isset($_SESSION['mylistproduct']['listname'])){
				array_push($_SESSION['mylistproduct']['listname'],$name);
				$_SESSION['mylistproduct']['count'] += 1;
			}
			else{
				$_SESSION['mylistproduct']['listname'] = array($name);
				$_SESSION['mylistproduct']['count'] = 1;
			}			
		}
		else{
		    // unset($_SESSION['mylistproduct']['listname'][array_search($name,$_SESSION['mylistproduct']['listname'])]);
		    $_SESSION['mylistproduct']['listname'] = array_merge(array_diff($_SESSION['mylistproduct']['listname'],array($name)));
		    $_SESSION['mylistproduct']['count'] -= 1;
		}
		echo $_SESSION['mylistproduct']['count'];
	}

	public function mylist(){
    if(isset($_POST['email'])){
     
     $body = "<body><table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#fff'>         <tr>
          <td>
            <table width='800' border='0' cellspacing='0' cellpadding='10' bgcolor='#A5A5A5' align='center'>
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
                      <td style=text-align:left; padding:20px;>
                      <h3>Dear ".$_POST['name'].", </h3>
                       
                        </td>
                    </tr>
                    <tr>
                      <td style=font-size:16px;>
                        <b>Email : </b>
                    
                        <span>".$_POST['email']."</span>
                        </td>                    
                    </tr>";
                   if($_POST['number']!=""){
                        $body.="<td style=font-size:16px;>
                                <b>Telephone : </b>                                
                                    <span>".$_POST['number']."</span>
                                    </td>                    
                                </tr>";
                    }


                  $body.="<tr>
                      <td style=font-size:16px;>
                        <h4><b>List of all Product</b></h4>
                        </td>                    
                    </tr>

                    <tr>
                      <td style=font-size:16px;>";



if($_SESSION['mylistproduct']['count']>0){

   
    

  $body .='<table border="1px solid #000" width="100%" border="0" cellspacing="0" cellpadding="0" >
  <thead>
    <tr class="tb_hdr">
      <th >Sr. No.</th>
      <th >ProductName</th>
      <th >MPN</th>
      <th >Piece</th>
      <th >QuantityOnHand</th>
      <th >Price</th>
    </tr>
   </thead>
<tbody>';
    
   for($i=0; $i<$_SESSION['mylistproduct']['count'];$i++){
      $product = $this->Site_model->mylistmodel($_SESSION['mylistproduct']['listname'][$i]);
      foreach($product as $live){
       $body.='<tr>
          <td>'.($i+1).'</td>
          <td>'.$live->ProductName.'</td>
          <td>'.$live->MPN.'</td>
          <td>'.$live->Piece.'</td> <td>';
            if($live->QuantityOnHand<=0){
              $body.='Out of Stock';
            }
            else if(($live->QuantityOnHand>0) && ($live->QuantityOnHand<3)){
               $body.="< 3";
            }else{
              $body.="In Stock";
            }
        $body.='</td><td>$'.$live->Price.'</td></tr>';
        }
      }
      $body.='</tbody></table>';
    }
    else
    {
      $body.="<h4>No Records Found.</h4>";
    }
         
                    $body.="</td></tr><tr>
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

       // echo $body;
       // die();
        $from = "support@globalfitness.net";
        $to = $this->input->post('email');
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $headers .= 'From: '.$from. "\r\n"."X-Mailer: PHP/" . phpversion();
        $headers .= "Bcc: labistour@gmail.com"."\r\n";

  
        $subject = 'Global Fitness Equipment Inquiry';
        $message = $body;
        mail($to,$subject,$message,$headers);

        $this->session->set_flashdata('fdsjfkjsdf', 'Thank you for your inquiry on those products. Your list has been email to the supplied address and our knowledgeable sales staff will be in touch within 24 hours.');
     
        header('location:'.base_url('site/mylist'));       
    }
		$data['title'] = "My List";
   	$data['category'] =  $this->Site_model->categorySearch();
  	$this->load->view('template/site/header',$data);
		$this->load->view('test_inventory');
		$this->load->view('template/site/footer'); 

	}

	public function success(){ 
		$item_number = $_REQUEST['item_number']; 
		$txn_id = $_REQUEST['txn_id'];
		$payment_gross = $_REQUEST['payment_gross'];
		$currency_code = $_REQUEST['mc_currency'];
		$payment_status = $_REQUEST['payment_status'];
		unset($_SESSION['productDetail']['addtocart'][array_search($item_number,$_SESSION['productDetail']['addtocart'])]);
		$_SESSION['productDetail']['addtocart']= array_merge($_SESSION['productDetail']['addtocart']);
		$_SESSION['productDetail']['count'] -= 1;
		$sql = "INSERT INTO customer_payments(item_number,txn_id,payment_gross,currency_code,payment_status,client_id,careted_date) VALUES('".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','".$payment_status."','".$_SESSION['userId']."','".date("Y-m-d h:i:s")."')";
		$this->Site_model->insertcart($sql);
		redirect("/site/addtocart?sucess");
	}

	public function page($name){
		$name=  str_replace("-", " ",$name);	;
	    $data['category'] =  $this->Site_model->categorySearch();
	    $result =  $this->Admin_model->page_detail($name);
	    $data['title'] = $result[0]->title;
	    $data['description'] = $result[0]->description;
	    $data['keywords'] = $result[0]->keywords;
	    $data['result'] = $result;
	    $this->load->view('template/site/header',$data);
	    $this->load->view('page/front_about');
	    $this->load->view('template/site/footer');  
	}

	

	function delete($name){
		if($name!=""){
			$_SESSION['productDetail']['addtocart'] = array_merge(array_diff($_SESSION['productDetail']['addtocart'],array($name)));
			$_SESSION['productDetail']['count'] -= 1;			
		}
		redirect("/cart");
	}

  function payment(){
    if(isset($_SESSION['shipping'])){
      if(isset($_POST['firstname'])){
        $_SESSION['payment'] = $_POST;
        header("location:".base_url('/site/account'));
      }
      $data['title'] ="Payment Details | Global Fitness Checkout";
      $this->load->view('template/site/header',$data);
      $this->load->view('payment');
      $this->load->view('template/site/footer');
    }
    else{
      redirect("/cart");
    }
  }
  function pay(){
    $LOGINKEY = "globalfitness1";// x_login
    $TRANSKEY = "3Q42aDYenm2b36MR";//x_tran_key
    
    $firstName =urlencode( $_POST['firstname']);
    $lastName =urlencode($_POST['lastnames']);
    $creditCardType =urlencode( $_POST['cardtype']);
    $creditCardNumber = urlencode($_POST['cardnumber']);
    $expDateMonth =urlencode( $_POST['cardmonth']);   
    // Month must be padded with leading zero
    $padDateMonth = str_pad($expDateMonth, 2, '0', STR_PAD_LEFT);   
    $expDateYear =urlencode( $_POST['cardyear']);
    $cvv2Number = urlencode($_POST['cardcvv']);
    $address1 = urlencode($_POST['streetadd']);
    $city = urlencode($_POST['city']);
    $state =urlencode( $_POST['states']);
    $zip = urlencode($_POST['zipcode']);
    //give the actual amount below
    $amount = $_POST['allpayment'];
    $currencyCode="USD";
    $paymentType="Sale";
    $date = $expDateMonth.$expDateYear;
    

  $post_values = array(
    "x_login"     => "$LOGINKEY",
    "x_tran_key"    => "$TRANSKEY",
    "x_version"     => "3.1",
    "x_delim_data"    => "TRUE",
    "x_delim_char"    => "|",
    "x_relay_response"  => "FALSE",
    //"x_market_type"   => "2",
    "x_device_type"   => "1",
      "x_type"      => "AUTH_CAPTURE",
    "x_method"      => "CC",
    "x_card_num"    => $creditCardNumber,
    //"x_exp_date"    => "0115",
    "x_exp_date"    => $date,
    "x_amount"      => $amount,
    //"x_description"   => "Sample Transaction",
    "x_first_name"    => $firstName,
    "x_last_name"   => $lastName,
    "x_address"     => $address1,
    "x_state"     => $state,
    "x_response_format" => "1",
    "x_zip"       => $zip
    // Additional fields can be added here as outlined in the AIM integration
    // guide at: http://developer.authorize.net
  );
    $post_string = "";
    foreach( $post_values as $key => $value )$post_string .= "$key=" . urlencode( $value ) . "&";
    $post_string = rtrim($post_string,"& ");

    //$post_url = "https://test.authorize.net/gateway/transact.dll";
    //for live use this url
   // / $post_url = "https://secure.authorize.net/gateway/transact.dll"; 
    $post_url = "https://secure.authorize.net/gateway/transact.dll"; 

    $request = curl_init($post_url); 
    curl_setopt($request, CURLOPT_HEADER, 0);
    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); 
    curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE);
    $post_response = curl_exec($request);
    curl_close ($request); 
    $response_array = explode($post_values["x_delim_char"],$post_response);

   // echo '<br><br> Response Array'; print_r($response_array);
   if($response_array[0]==2||$response_array[0]==3) 
    {
      echo "Payment Failure";
      echo '<br><b>Reason</b>: '.$response_array[3];
    }
    else
    {
      $ptid = $response_array[6];
      //$ptidmd5 = $response_array[7];
      $_SESSION['shipping']['transactionId']=$ptid ;
      echo "Payment Success";
    }
  }

  public function account(){
    if(isset($_SESSION['payment'])){

        // if($_POST['password']){
        //    $this->Site_model->register();
        // }
        if($this->session->userdata('userId')!=""){
          // echo "<pre>";
          // print_r($_SESSION);
          // die();
            $this->Site_model->storeallpayment();
            redirect('/site/orderall');
        }
        else{
          $data['title'] ="Create Account | Global Fitness Checkout";
          $this->load->view('template/site/header',$data);
          $this->load->view('account');
          $this->load->view('template/site/footer'); 
        }
    }
    else{
      redirect("/cart");
    }
  }

  public function orderall(){
    if($this->session->userdata('userId')!=""){
      $data['order'] = $this->Site_model->orderall();
      $data['title'] = "Order Successful | Global Fitness Checkout";
      $this->load->view('template/site/header',$data);
      $this->load->view('order_detail');
      $this->load->view('template/site/footer');
    }
    else{
      redirect("/cart");
    }
  }
  public function searchajax(){
    $search = $this->Site_model->ajaxsearch();
    if(count($search)>0){
      foreach($search as $products){
        $link  = str_replace("-", "*",$products->ProductName);
          $link  = str_replace(" ", "-",$link);

          if($products->Kingdom=="Cardio"){
            ?>
              <div class="display_box" align="left">
            <a class="searchanchor" href="<?php echo base_url('/fitness_equipment').'/'.$link; ?>">
              <?php  if(file_exists(getcwd().'/'.$products->ImageURL)){ ?>
              <img src="<?php echo base_url().'/'.$products->ImageURL; ?>"  title="<?php echo $products->MetaDetailPageTitleTag; ?>" alt="<?php echo $products->ProductName; ?>" style="width:30px; float:left; margin-right:6px" />
              <?php } ?>
               <?php echo $products->ProductName; ?><br/>           
          </a>
            </div>
            <?php
            }
            else
            {
              ?>
                <div class="display_box" align="left">
               <a class="searchanchor" href="<?php echo base_url('/strength_equipment').'/'.$link; ?>">
                <?php  if(file_exists(getcwd().'/'.$products->ImageURL)){ ?>
              <img src="<?php echo base_url().'/'.$products->ImageURL; ?>"  title="<?php echo $products->MetaDetailPageTitleTag; ?>" alt="<?php echo $products->ProductName; ?>" style="width:30px; float:left; margin-right:6px" />    <?php } ?>
               <?php echo $products->ProductName; ?><br/>
           
          </a>
            </div>
              <?php
            }
           
      }
    }
    else
    {
      ?>
      <div class="display_box" align="left">
          No records Found
      </div>
      <?php
    }
  }

  function add_wish(){
    $this->Site_model->insert_wish();
  }

  function twilliocalling(){
    require "twilio/Services/Twilio.php";
      $version = "2010-04-01";
      $AccountSid = "ACfa15e411f7c9008a41deee95f7a2b685";
      $AuthToken = "9bf888c97a6d72ae2fd56b0fd8c67437";
      $client = new Services_Twilio($AccountSid, $AuthToken);
      try {
        $call = $client->account->calls->create(
        "+15873177119", // The number of the phone initiating the call
        $_GET['number'], // The number of the phone receiving call
        'http://demo.twilio.com/welcome/voice/' // The URL Twilio will request when the call is answered
        );
        $_SESSION['errorto'] = 1;
      } catch (Exception $e) {
          $_SESSION['errorto'] = 'Error: ' . $e->getMessage();
     
      }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }


 public function downexcel(){
     $content= '<html xmlns:x="urn:schemas-microsoft-com:office:excel"><head> <!--[if gte mso 9]><xml> <x:ExcelWorkbook> <x:ExcelWorksheets> <x:ExcelWorksheet> <x:Name>Sheet 1</x:Name> <x:WorksheetOptions> <x:Print> <x:ValidPrinterInfo/> </x:Print> </x:WorksheetOptions> </x:ExcelWorksheet> </x:ExcelWorksheets> </x:ExcelWorkbook> </xml> <![endif]--> </head> <body> <table> <thead> <tr> <th >Sr. No.</th> <th >ProductName</th> <th >MPN</th> <th >Piece</th> <th >QuantityOnHand</th> <th >Price</th> </tr> </thead> <tbody>';

    for($i=0; $i<$_SESSION['mylistproduct']['count'];$i++){
      $product = $this->Site_model->mylistmodel($_SESSION['mylistproduct']['listname'][$i]);
      foreach($product as $live){
       $content.='<tr>
          <td>'.($i+1).'</td>
          <td>'.$live->ProductName.'</td>
          <td>'.$live->MPN.'</td>
          <td>'.$live->Piece.'</td> <td>';
            if($live->QuantityOnHand<=0){
              $content.='Out of Stock';
            }
            else if(($live->QuantityOnHand>0) && ($live->QuantityOnHand<3)){
               $content.="< 3";
            }else{
              $content.="In Stock";
            }
        $content.='</td><td>$'.$live->Price.'</td></tr>';
        }
      }

    $content.='</tbody></table></body></html>';
       header('Content-type: application/excel');
        header('Content-type: image/jpeg,image/gif,image/png');
        header("Content-Disposition: attachment; filename=Mylist.xls");
        header("Pragma: ");
        header("Cache-Control: ");
        echo $content;
  }
}