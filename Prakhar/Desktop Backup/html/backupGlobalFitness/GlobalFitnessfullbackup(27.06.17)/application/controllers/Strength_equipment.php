	<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
// error_reporting(E_ALL);
 // ini_set('display_errors',1) ;
class Strength_equipment extends CI_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model(array("Site_model","Admin_model"));        		
	}

	public function index()
	{
		$data['product'] = $this->Site_model->productSearch("Strength");
		$data['category'] =  $this->Site_model->categorySearch('zStrengthMenu');
		$data['category2'] =  $this->Site_model->categorySearch('zCardioMenu');
		$data['ptype'] = "1";
		$data['title'] = "Product List";
    $data['menu']  = $this->Site_model->menusearch();
		$this->load->view('template/site/header',$data);
		$this->load->view('home_view');
		$this->load->view('template/site/footer');
	}

	public function product($id)
	{
	    $id  = str_replace("-", " ",$id); 
	    $id  = str_replace("*", "-",$id);       
      	$id  = str_replace("'", "-", $id);
	   if(isset($_POST['message_SellProduct'])){
      $listId=$this->input->post('productId_SellProduct');
      $CheckWaitList=$this->Site_model->CheckSellProduct($listId,$_POST['email_address_SellProduct']);
      
      if(!$CheckWaitList)
      {	
      $body = "<p><strong>Dear Webmaster,</strong></p>
      <p><strong>First Name:</strong>".$_POST['firstname_SellProduct']."</p>
      <p><strong>Last Name:</strong>".$_POST['lastname_SellProduct']."</p>
      <p><strong>Email:</strong> ".$_POST['email_address_SellProduct']."</p>
      <p><strong>Telephone:</strong>".$_POST['phone_SellProduct']."</p>
       <p><strong>Zip:</strong>".$_POST['zip_code_SellProduct']."</p>
      <p><strong>Subject:</strong>Selling Inquiry | Sell Fitness Equipment</p>
      <p><strong>Message:</strong> ".$_POST['message_SellProduct']."</p>
      <p><strong>Product Id:</strong>".$this->input->post('productId_SellProduct')."</p> 
      <p><strong>Product Name:</strong>".$this->input->post('productName')."</p>
      <p><strong>Product Sku:</strong>".$this->input->post('sku')."</p> " ;

      $body2="
      <h4>Dear ".$_POST['firstname_SellProduct']."</h4>
      <p>We appreciate you contacting us about the ".$this->input->post('productName')." . We try to respond as soon as possible so please look out for an email from one of our customer service colleagues that should get back to you within a few hours. </p>
      <p>Thank you for getting in touch and have a great day!</p>
      <p>Global Fitness Team</p>";
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $from = "support@globalfitness.net";
        $to = "email@globalfitness.net";
        $subject = 'Selling Inquiry | Sell Fitness Equipment';
        $message = $body;
        $headers .= 'From: '.$from. "\r\n"."X-Mailer: PHP/" . phpversion();
        mail($to,$subject,$message,$headers);
        
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $from = "support@globalfitness.net";
        $to = $_POST['email_address_SellProduct'];
        $subject = 'Selling Inquiry | Sell Fitness Equipment';
        $message = $body2;
        $headers .= 'From: '.$from. "\r\n"."X-Mailer: PHP/" . phpversion();
	    mail($to,$subject,$message,$headers);   
	    
		$data['SaveSellProduct']=$this->Site_model->SaveSellProduct($listId,$_POST['email_address_SellProduct'],$_POST['phone_number_SellProduct'],$_POST['message_SellProduct'],$_POST['firstname_SellProduct'],$_POST['lastname_SellProduct'],$_POST['zip_code_SellProduct']);
		$this->session->set_flashdata('email_success', 'Email submitted successfully.');

	   }else
	   {
          $this->session->set_flashdata('SellProduct_error', 'Sorry, You have already request for rent product');
	   }
        
      } 
      /////////////////////rudra code start ////////////////

       if(isset($_POST['message_GenProduct'])){
      $listId=$this->input->post('productId_GenProduct');
      $CheckWaitList=$this->Site_model->CheckGenProduct($listId,$_POST['email_address_GenProduct']);
      if(!$CheckWaitList)
      { 
      $body = "<p><strong>Dear Webmaster,</strong></p>
      <p><strong>First Name:</strong>".$_POST['firstname_GenProduct']."</p>
      <p><strong>Last Name:</strong>".$_POST['lastname_GenProduct']."</p>
      <p><strong>Email:</strong> ".$_POST['email_address_GenProduct']."</p>
      <p><strong>Telephone:</strong>".$_POST['phone_GenProduct']."</p>
      <p><strong>Subject:</strong>General Product Question | Product Page</p>
      <p><strong>Message:</strong> ".$_POST['message_GenProduct']."</p>
      <p><strong>Product Id:</strong>".$this->input->post('productId_GenProduct')."</p> 
      <p><strong>Product Name:</strong>".$this->input->post('productName')."</p>
      <p><strong>Product Sku:</strong>".$this->input->post('sku')."</p> " ;

      $body2="
      <h4>Dear ".$_POST['firstname_GenProduct']."</h4>
      <p>We appreciate you contacting us about the ".$this->input->post('productName')." . We try to respond as soon as possible so please look out for an email from one of our customer service colleagues that should get back to you within a few hours. </p>
      <p>Thank you for getting in touch and have a great day!</p>
      <p>Global Fitness Team</p>
      ";
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $from = "support@globalfitness.net";
        $to = "email@globalfitness.net";
        $headers .= 'From: '.$from. "\r\n"."X-Mailer: PHP/" . phpversion();
      //  $to = "labistour@gmail.com";
        $subject = 'General Product Question | Product Page';
        $message = $body;
        mail($to,$subject,$message,$headers);

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $from = "support@globalfitness.net";
        $to = $_POST['email_address_GenProduct'];
        $headers .= 'From: '.$from. "\r\n"."X-Mailer: PHP/" . phpversion();
        $subject = 'General Product Question | Product Page';
        $message = $body2;
      mail($to,$subject,$message,$headers);   
      
    $data['SaveGenProduct']=$this->Site_model->SaveGenProduct($listId,$_POST['email_address_GenProduct'],$_POST['phone_number_GenProduct'],$_POST['message_GenProduct'],$_POST['firstname_GenProduct'],$_POST['lastname_GenProduct']);
     $this->session->set_flashdata('email_success', 'Email submitted successfully.');
     }else
     {
          $this->session->set_flashdata('GenProduct_error', 'Sorry, You have already request for Equipment Renting Product');
       }
      }
    ////////////////////// rudra code end /////////////////////

    if(isset($_POST['message_RentProduct'])){
      $listId=$this->input->post('productId_RentProduct');
      $CheckWaitList=$this->Site_model->CheckRentProduct($listId,$_POST['email_address_RentProduct']);
      if(!$CheckWaitList)
      {	
      $body = "<p><strong>Dear Webmaster,</strong></p>
      <p><strong>First Name:</strong>".$_POST['firstname_RentProduct']."</p>
      <p><strong>Last Name:</strong>".$_POST['lastname_RentProduct']."</p>
      <p><strong>Email:</strong> ".$_POST['email_address_RentProduct']."</p>
      <p><strong>Telephone:</strong>".$_POST['phone_RentProduct']."</p>
      <p><strong>Subject:</strong>Product Rental Question | Product Page</p>
      <p><strong>Message:</strong> ".$_POST['message_RentProduct']."</p>
      <p><strong>Product Id:</strong>".$this->input->post('productId_RentProduct')."</p> 
      <p><strong>Product Name:</strong>".$this->input->post('productName')."</p>
      <p><strong>Product Sku:</strong>".$this->input->post('sku')."</p> " ;

      $body2="
      <h4>Dear ".$_POST['firstname_RentProduct']."</h4>
      <p>We appreciate you contacting us about the ".$this->input->post('productName')." . We try to respond as soon as possible so please look out for an email from one of our customer service colleagues that should get back to you within a few hours. </p>
      <p>Thank you for getting in touch and have a great day!</p>
      <p>Global Fitness Team</p>
      ";

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $from = "support@globalfitness.net";
        $to = "email@globalfitness.net";
      //  $to = "labistour@gmail.com";
        $subject = 'Product Rental Question | Product Page';
        $message = $body;
        $headers .= 'From: '.$from. "\r\n"."X-Mailer: PHP/" . phpversion();
        mail($to,$subject,$message,$headers);

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $from = "support@globalfitness.net";
        $to = $_POST['email_address_RentProduct'];
        $subject = 'Product Rental Question | Product Page';
        $message = $body2;
        $headers .= 'From: '.$from. "\r\n"."X-Mailer: PHP/" . phpversion();
	    mail($to,$subject,$message,$headers);   
	    
		$data['SaveRentProduct']=$this->Site_model->SaveRentProduct($listId,$_POST['email_address_RentProduct'],$_POST['phone_number_RentProduct'],$_POST['message_RentProduct'],$_POST['firstname_RentProduct'],$_POST['lastname_RentProduct']);
		$this->session->set_flashdata('email_success', 'Email submitted successfully.');

	   }else
	   {
          $this->session->set_flashdata('rentProduct_error', 'Sorry, You have already request for rent product');
	   }
        
      }

	  if(isset($_POST['message_waitlist'])){
      $listId=$this->input->post('productId_waitlist');
      $CheckWaitList=$this->Site_model->CheckWaitList($listId,$_POST['email_address_waitlist']);
      
      if(!$CheckWaitList)
      {	

      $body = "<p><strong>Dear Webmaster,</strong></p>
      <p><strong>First Name:</strong>".$_POST['firstname_waitlist']."</p>
      <p><strong>Last Name:</strong>".$_POST['lastname_waitlist']."</p>
      <p><strong>Email:</strong> ".$_POST['email_address_waitlist']."</p>
      <p><strong>Telephone:</strong>".$_POST['phone_number_waitlist']."</p>
      <p><strong>Subject:</strong>Wait-list Request</p>
      <p><strong>Message:</strong> ".$_POST['message_waitlist']."</p>
      <p><strong>Product Id:</strong>".$this->input->post('productId_waitlist')."</p> 
      <p><strong>Product Name:</strong>".$this->input->post('productName')."</p>
      <p><strong>Product Sku:</strong>".$this->input->post('sku')."</p> " ;

      $body2="
      <h4>Dear ".$_POST['firstname_waitlist']."</h4>
      <p>We appreciate you contacting us about the ".$this->input->post('productName')." . We try to respond as soon as possible so please look out for an email from one of our customer service colleagues that should get back to you within a few hours. </p>
      <p>Thank you for getting in touch and have a great day!</p>
      <p>Global Fitness Team</p>
      ";


     // print_r($body);die;
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $from = "support@globalfitness.net";
        $to = "email@globalfitness.net";
      //  $to = "labistour@gmail.com";
        $subject = 'Wait-list Request';
        $message = $body;
        $headers .= 'From: '.$from. "\r\n"."X-Mailer: PHP/" . phpversion();
      
        mail($to,$subject,$message,$headers);

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $from = "support@globalfitness.net";
        $to = $_POST['email_address'];
        $subject = 'Wait-list Request';
        $message = $body2;
        $headers .= 'From: '.$from. "\r\n"."X-Mailer: PHP/" . phpversion();
      
	    mail($to,$subject,$message,$headers);   
	    
		$data['WaitListRank']=$this->Site_model->SaveWaitList($listId,$_POST['email_address_waitlist'],$_POST['phone_number_waitlist'],$_POST['message_waitlist'],$_POST['firstname_waitlist'],$_POST['lastname_waitlist']);
        $x=1;
		foreach($data['WaitListRank'] as $WaitListRankVal)
		{
             if($WaitListRankVal->userEmail==$_POST['email_address_waitlist'])
             {
               $data['position']=$x;
             }
		$x++;
		}

		$this->session->set_flashdata('email_success', 'Email submitted successfully.');

	   }else
	   {
          $this->session->set_flashdata('waitlest_error', 'Sorry, You have already request for waitlist');
	   }
        
      }

		
		if(isset($_POST['message'])){
	

      $body = "<p><strong>Dear Webmaster,</strong></p>
      <p><strong>First Name:</strong>".$_POST['firstname']."</p>
      <p><strong>Last Name:</strong>".$_POST['lastname']."</p>
      <p><strong>Email:</strong> ".$_POST['email_address']."</p>
      <p><strong>Telephone:</strong>".$_POST['phone_number']."</p>
      <p><strong>Subject:</strong>Price Inquiry | Product Page</p>
      <p><strong>Message:</strong> ".$_POST['message']."</p>
      <p><strong>Product Name:</strong>".$this->input->post('productName')."</p><p><strong>Product Sku:</strong>".$this->input->post('sku')."</p> " ;

      $body2="
      <h4>Dear ".$_POST['firstname']."</h4>
      <p>We appreciate you contacting us about the ".$this->input->post('productName')." . We try to respond as soon as possible so please look out for an email from one of our customer service colleagues that should get back to you within a few hours. </p>
      <p>Thank you for getting in touch and have a great day!</p>
      <p>Global Fitness Team</p>
      ";
  
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $from = "support@globalfitness.net";
        $to = "email@globalfitness.net";
        $subject = 'Price Inquiry | Product Page';
        $message = $body;
        $headers .= 'From: '.$from. "\r\n"."X-Mailer: PHP/" . phpversion();
      
        mail($to,$subject,$message,$headers);

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $from = "support@globalfitness.net";
        $to = $_POST['email_address'];
        $subject = 'Price Inquiry | Product Page';
        $message = $body2;
        $headers .= 'From: '.$from. "\r\n"."X-Mailer: PHP/" . phpversion();
      
          mail($to,$subject,$message,$headers);   
          $this->Site_model->contactform();
         $this->session->set_flashdata('email_success', 'Email submitted successfully.');
		}
		else{
			if(isset($_POST['productId'])){
				$this->Site_model->rate($this->input->post('productId'));
        
        $body = "<p><strong>Dear Webmaster,</strong></p>
      <p><strong>First Name:</strong>" . $_SESSION['firstname'] . "</p>
      <p><strong>Last Name:</strong>" . $_SESSION['lastname'] . "</p>
      <p><strong>Email:</strong> " . $_SESSION['email'] . "</p>
      <p><strong>Telephone:</strong>" . $_SESSION['phone_number'] . "</p>
      <p><strong>Subject:Product Review Submitted </strong></p>
      <p><strong>Product Name:</strong>" . $id . "</p>";
      $body2 = "
      <h4>Dear " . $_SESSION['firstname'] . "</h4>
      <p>We appreciate you review about the " . $this->input->post('productName') . " . We try to respond as soon as possible so please look out for an email from one of our customer service colleagues that should get back to you within a few hours. </p>
      <p>Thank you for getting in touch and have a great day!</p>
      <p>Global Fitness Team</p>
      ";$headers = 'MIME-Version: 1.0' . "\r\n";
      $headers.= 'Content-type:text/html;charset=UTF-8' . "\r\n";
      $from = "support@globalfitness.net";
      $to = "email@globalfitness.net";
      $subject = 'Product Review Submitted';
      $message = $body;
      $headers.= 'From: ' . $from . "\r\n" . "X-Mailer: PHP/" . phpversion();
      mail($to, $subject, $message, $headers);
      $headers = 'MIME-Version: 1.0' . "\r\n";
      $headers.= 'Content-type:text/html;charset=UTF-8' . "\r\n";
      $from = "support@globalfitness.net";
      $to = $_SESSION['email'];
      $subject = 'Price Inquiry | Product Page';
      $message = $body2;
      $headers.= 'From: ' . $from . "\r\n" . "X-Mailer: PHP/" . phpversion();
      mail($to, $subject, $message, $headers);
    
				//echo '<script type="text/javascript">alert("Thanks you for submitting your review, our moderators will evaluate your submission and notify you when your review is live.");</script>';
			}
			if(isset($_POST['review_id'])){
				$this->Site_model->help();
				//echo '<script type="text/javascript">alert("Thanks you for submitting your review, our moderators will evaluate your submission and notify you when your review is live.");</script>';
			}
		}

		if($id!=""){
			$data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
			$data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
			$result =  $this->Site_model->productdetailbyname($id);
      $subs = $this->Site_model->productdetailbyMPN($result);
      // echo "<pre>";print_r($result);die();
      $_SESSION['strength_details'] = $result;
			if(count($result)>0){
          $data['star_count'] = $result[0]->star_count;
          $data['star_rate']  = $result[0]->star_rate;
   				$data['review'] = $this->Site_model->getreviews($result[0]->ListID);
				  $data['title'] = $result[0]->MetaDetailPageTitleTag;
			    $data['description'] = $result[0]->MetaDetailPageDescriptionTag;
			    $data['ptype'] = "1";
			    $data['keywords'] = $result[0]->MetaDetailPageKeywordTag;
			    $data['detail'] = $result;
          $data['menu']  = $this->Site_model->menusearch();
          $data['MPN'] = $subs;
          // echo "<pre>";print_r($data);die();
  				$this->load->view('template/site/header',$data);
  				// $this->load->view('test_disorder');
          if(isset($_SESSION['letssEE']) ){
             $this->load->view('test_disorder');
          }else{
             $this->load->view('selectorized_circuit');
          }
          $this->load->view('template/site/footer');
			}
			else{
				redirect("/strength");
			}
		}
		else{
			redirect("/strength");
		}
	}
	
	public function filter()
	{
		$data['availability'] = $this->Site_model->allrecord('zFitnessAvailability');
		$data['amps'] = $this->Site_model->allrecord('zFitnessAmps');
		$data['voltage'] = $this->Site_model->allrecord('zFitnessVoltage');
		$data['condition'] = $this->Site_model->allrecord('zFitnessConditions');
		$data['product'] = $this->Site_model->productSearchfilter("Strength");
		$data['category'] = $this->Site_model->categorySearch('zCardioMenu');
		$data['category2'] = $this->Site_model->categorySearch('zStrengthMenu');
		$data['brand'] = $this->Site_model->allrecord1('zBrandFilterStrength');
		$data['mmcategory'] = $this->Site_model->allrecord('zFitnessCategory');	    
		$data['condition'] = $this->Site_model->allrecord('zFitnessConditions');
		$data['piece'] = $this->Site_model->allrecord('zFitnessPiece');
		$data['strength_equipment'] ='strength';
		$data['ptype'] = "1";
		$data['title'] = "Product List";
		$data['menu']  = $this->Site_model->menusearch();
		$this->load->view('template/site/header',$data);
    $this->load->view('filter_view');
    $this->load->view('template/site/footer');    
	}

}