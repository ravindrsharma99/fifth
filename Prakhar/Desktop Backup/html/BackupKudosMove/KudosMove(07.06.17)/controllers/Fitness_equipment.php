<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set("display_errors", "0");

// error_reporting(E_ALL);

class Fitness_equipment extends CI_Controller

{
  function __construct()
  {
    parent::__construct();
    $this->load->model(array(
      "Site_model",
      "Admin_model"
    ));
    $this->load->library('session');
  }

  public

  function home()
  {
    $data['product'] = $this->Site_model->productSearch("Cardio");
    $data['model_obj'] = $this->Site_model;
    $data['category'] = $this->Site_model->categorySearch('zCardioMenu');
    $data['category2'] = $this->Site_model->categorySearch('zStrengthMenu');
    $data['brand'] = $this->Site_model->allrecord('zFitnessBrand');
    $mydata['promo1'] = $this->Site_model->PromoData();
    $mydata['promo2'] = $this->Site_model->PromoData1();
    $mydata['promo3'] = $this->Site_model->PromoData2();
    $mydata['promo4'] = $this->Site_model->PromoData3();
    $mydata['promo5'] = $this->Site_model->PromoData4();
    $data['Author']  ='Global Fitness, Inc., support@globalfitness.us.com';
    $data['description'] = 'Browse the largest inventory of used fitness equipment and refurbished gym equipment for your gym or home. We ship all commercial brands of used gym equipment worldwide from our factory in Los Angeles';
    $data['keywords'] = 'Used fitness equipment, used exercise equipment, commercial fitness equipment, refurbished gym equipment, fitness equipment, used treadmill, life fitness treadmill, precor elliptical, elliptical trainer, used precor elliptical, global fitness, globalfitness, used gym equipment';
    $data['ptype'] = "0";
    $data['title'] = "Global Fitness Equipment - International Dealer of Used Fitness Equipment";
    $data['menu'] = $this->Site_model->menusearch();
    
    
    $this->load->view('template/site/header', $data);
    $this->load->view('home_new', $mydata);
    $this->load->view('template/site/footer');
  }

  public

  function home1()
  {
    $data['product'] = $this->Site_model->productSearch("Cardio");

    // print_r($data['product'][0]->ListID); die;

    $data['model_obj'] = $this->Site_model;
    $data['category'] = $this->Site_model->categorySearch('zCardioMenu');
    $data['category2'] = $this->Site_model->categorySearch('zStrengthMenu');
    $mydata['promo1'] = $this->Site_model->PromoData();
    $mydata['promo2'] = $this->Site_model->PromoData1();
    $mydata['promo3'] = $this->Site_model->PromoData2();
    $mydata['promo4'] = $this->Site_model->PromoData3();
    $mydata['promo5'] = $this->Site_model->PromoData4();
    $data['ptype'] = "0";
    $data['title'] = "Product List";
    $data['menu'] = $this->Site_model->menusearch();
    $this->load->view('template/site/header', $data);
    // $this->load->view('home_new', $mydata);
    $this->load->view('sales', $mydata);
    $this->load->view('template/site/footer');
  }

  public

  function index()
  {
    $data['product'] = $this->Site_model->productSearch("Cardio");
    $data['model_obj'] = $this->Site_model;
    $data['category'] = $this->Site_model->categorySearch('zCardioMenu');
    $data['category2'] = $this->Site_model->categorySearch('zStrengthMenu');
    $data['ptype'] = "0";
    $data['title'] = "Product List";
    $data['menu'] = $this->Site_model->menusearch();
    $this->load->view('template/site/header', $data);
    $this->load->view('home_view');
    $this->load->view('template/site/footer');
  }
  public

  function product($id)
  {

    // print_r('data');die();

    $id = str_replace("-", " ", $id);
    $id = str_replace("*", "-", $id);
    $id= str_replace("'", "-", $id);

    // $id=rawurldecode($id);
    // if(isset($_POST)){ print_r($_POST); }
    // print_r($_POST);die;

    if (isset($_POST['message_SellProduct'])) {
      $listId = $this->input->post('productId_SellProduct');
      $CheckWaitList = $this->Site_model->CheckSellProduct($listId, $_POST['email_address_SellProduct']);
      if (!$CheckWaitList) {
        $body = "<p><strong>Dear Webmaster,</strong></p>
      <p><strong>First Name:</strong>" . $_POST['firstname_SellProduct'] . "</p>
      <p><strong>Last Name:</strong>" . $_POST['lastname_SellProduct'] . "</p>
      <p><strong>Email:</strong> " . $_POST['email_address_SellProduct'] . "</p>
      <p><strong>Telephone:</strong>" . $_POST['phone_SellProduct'] . "</p>
       <p><strong>Zip:</strong>" . $_POST['zip_code_SellProduct'] . "</p>
      <p><strong>Subject:</strong>Selling Inquiry | Sell Fitness Equipment</p>
      <p><strong>Message:</strong> " . $_POST['message_SellProduct'] . "</p>
      <p><strong>Product Id:</strong>" . $this->input->post('productId_SellProduct') . "</p> 
      <p><strong>Product Name:</strong>" . $this->input->post('productName') . "</p>
      <p><strong>Product Sku:</strong>" . $this->input->post('sku') . "</p> ";
        $body2 = "
      <h4>Dear " . $_POST['firstname_SellProduct'] . "</h4>
      <p>We appreciate you contacting us about the " . $this->input->post('productName') . " . We try to respond as soon as possible so please look out for an email from one of our customer service colleagues that should get back to you within a few hours. </p>
      <p>Thank you for getting in touch and have a great day!</p>
      <p>Global Fitness Team</p>
      ";

        // print_r($body);die;

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers.= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $from = "support@globalfitness.net";
        $to = "email@globalfitness.net";

        //  $to = "labistour@gmail.com";

        $subject = 'Selling Inquiry | Sell Fitness Equipment';
        $message = $body;
        $headers.= 'From: ' . $from . "\r\n" . "X-Mailer: PHP/" . phpversion();
        mail($to, $subject, $message, $headers);
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers.= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $from = "support@globalfitness.net";
        $to = $_POST['email_address_SellProduct'];
        $subject = 'Confirmation ! Global Fitness Equipment Renting Product';
        $message = $body2;
        $headers.= 'From: ' . $from . "\r\n" . "X-Mailer: PHP/" . phpversion();
        mail($to, $subject, $message, $headers);
        $data['SaveSellProduct'] = $this->Site_model->SaveSellProduct($listId, $_POST['email_address_SellProduct'], $_POST['phone_number_SellProduct'], $_POST['message_SellProduct'], $_POST['firstname_SellProduct'], $_POST['lastname_SellProduct'], $_POST['zip_code_SellProduct']);

        // echo "<pre>";print_r($data['WaitListRank']);die;

        $this->session->set_flashdata('email_success', 'Email submitted successfully.');
      }
      else {
        $this->session->set_flashdata('SellProduct_error', 'Sorry, You have already request for rent product');
      }
    }

    if (isset($_POST['message_GenProduct'])) {
      $listId = $this->input->post('productId_GenProduct');
      $CheckWaitList = $this->Site_model->CheckGenProduct($listId, $_POST['email_address_GenProduct']);
      if (!$CheckWaitList) {
        $body = "<p><strong>Dear Webmaster,</strong></p>
      <p><strong>First Name:</strong>" . $_POST['firstname_GenProduct'] . "</p>
      <p><strong>Last Name:</strong>" . $_POST['lastname_GenProduct'] . "</p>
      <p><strong>Email:</strong> " . $_POST['email_address_GenProduct'] . "</p>
      <p><strong>Telephone:</strong>" . $_POST['phone_GenProduct'] . "</p>
      <p><strong>Subject:</strong>General Product Question | Product Page</p>
      <p><strong>Message:</strong> " . $_POST['message_GenProduct'] . "</p>
      <p><strong>Product Id:</strong>" . $this->input->post('productId_GenProduct') . "</p> 
      <p><strong>Product Name:</strong>" . $this->input->post('productName') . "</p>
      <p><strong>Product Sku:</strong>" . $this->input->post('sku') . "</p> ";
        $body2 = "
      <h4>Dear " . $_POST['firstname_GenProduct'] . "</h4>
      <p>We appreciate you contacting us about the " . $this->input->post('productName') . " . We try to respond as soon as possible so please look out for an email from one of our customer service colleagues that should get back to you within a few hours. </p>
      <p>Thank you for getting in touch and have a great day!</p>
      <p>Global Fitness Team</p>
      ";

        // print_r($body);die;

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers.= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $from = "support@globalfitness.net";
        $to = "email@globalfitness.net";
        $headers.= 'From: ' . $from . "\r\n" . "X-Mailer: PHP/" . phpversion();

        //  $to = "labistour@gmail.com";

        $subject = 'General Product Question | Product Page';
        $message = $body;
        mail($to, $subject, $message, $headers);
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers.= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $from = "support@globalfitness.net";
        $to = $_POST['email_address_GenProduct'];
        $headers.= 'From: ' . $from . "\r\n" . "X-Mailer: PHP/" . phpversion();
        $subject = 'General Product Question | Product Page';
        $message = $body2;
        mail($to, $subject, $message, $headers);
        $data['SaveGenProduct'] = $this->Site_model->SaveGenProduct($listId, $_POST['email_address_GenProduct'], $_POST['phone_number_GenProduct'], $_POST['message_GenProduct'], $_POST['firstname_GenProduct'], $_POST['lastname_GenProduct']);

        // echo "<pre>";print_r($data['WaitListRank']);die;

        $this->session->set_flashdata('email_success', 'Email submitted successfully.');
      }
      else {
        $this->session->set_flashdata('GenProduct_error', 'Sorry, You have already request for General Product Question');
      }
    }

    if (isset($_POST['message_RentProduct'])) {
      $listId = $this->input->post('productId_RentProduct');
      $CheckWaitList = $this->Site_model->CheckRentProduct($listId, $_POST['email_address_RentProduct']);
      if (!$CheckWaitList) {
        $body = "<p><strong>Dear Webmaster,</strong></p>
      <p><strong>First Name:</strong>" . $_POST['firstname_RentProduct'] . "</p>
      <p><strong>Last Name:</strong>" . $_POST['lastname_RentProduct'] . "</p>
      <p><strong>Email:</strong> " . $_POST['email_address_RentProduct'] . "</p>
      <p><strong>Telephone:</strong>" . $_POST['phone_RentProduct'] . "</p>
      <p><strong>Subject:</strong>Product Rental Question | Product Page</p>
      <p><strong>Message:</strong> " . $_POST['message_RentProduct'] . "</p>
      <p><strong>Product Id:</strong>" . $this->input->post('productId_RentProduct') . "</p> 
      <p><strong>Product Name:</strong>" . $this->input->post('productName') . "</p>
      <p><strong>Product Sku:</strong>" . $this->input->post('sku') . "</p> ";
        $body2 = "
      <h4>Dear " . $_POST['firstname_RentProduct'] . "</h4>
      <p>We appreciate you contacting us about the " . $this->input->post('productName') . " . We try to respond as soon as possible so please look out for an email from one of our customer service colleagues that should get back to you within a few hours. </p>
      <p>Thank you for getting in touch and have a great day!</p>
      <p>Global Fitness Team</p>
      ";
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers.= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $from = "support@globalfitness.net";
        $to = "email@globalfitness.net";

        $subject = 'Product Rental Question | Product Page';
        $message = $body;
        $headers.= 'From: ' . $from . "\r\n" . "X-Mailer: PHP/" . phpversion();
        mail($to, $subject, $message, $headers);
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers.= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $from = "support@globalfitness.net";
        $to = $_POST['email_address_RentProduct'];
        $subject = 'Product Rental Question | Product Page';
        $message = $body2;
        $headers.= 'From: ' . $from . "\r\n" . "X-Mailer: PHP/" . phpversion();
        mail($to, $subject, $message, $headers);
        $data['SaveRentProduct'] = $this->Site_model->SaveRentProduct($listId, $_POST['email_address_RentProduct'], $_POST['phone_number_RentProduct'], $_POST['message_RentProduct'], $_POST['firstname_RentProduct'], $_POST['lastname_RentProduct']);

        // echo "<pre>";print_r($data['WaitListRank']);die;

        $this->session->set_flashdata('email_success', 'Email submitted successfully.');
      }
      else {
        $this->session->set_flashdata('rentProduct_error', 'Sorry, You have already request for rent product');
      }
    }

    if (isset($_POST['message_waitlist'])) {

      $listId = $this->input->post('productId_waitlist');
      $CheckWaitList = $this->Site_model->CheckWaitList($listId, $_POST['email_address_waitlist']);
      if (!$CheckWaitList) {
        $body = "<p><strong>Dear Webmaster,</strong></p>
      <p><strong>First Name:</strong>" . $_POST['firstname_waitlist'] . "</p>
      <p><strong>Last Name:</strong>" . $_POST['lastname_waitlist'] . "</p>
      <p><strong>Email:</strong> " . $_POST['email_address_waitlist'] . "</p>
      <p><strong>Telephone:</strong>" . $_POST['phone_number_waitlist'] . "</p>
      <p><strong>Subject:</strong>Wait-list Request</p>
      <p><strong>Message:</strong> " . $_POST['message_waitlist'] . "</p>
      <p><strong>Product Id:</strong>" . $this->input->post('productId_waitlist') . "</p> 
      <p><strong>Product Name:</strong>" . $this->input->post('productName') . "</p>
      <p><strong>Product Sku:</strong>" . $this->input->post('sku') . "</p> ";
        $body2 = "
      <h4>Dear " . $_POST['firstname_waitlist'] . "</h4>
      <p>We appreciate you contacting us about the " . $this->input->post('productName') . " . We try to respond as soon as possible so please look out for an email from one of our customer service colleagues that should get back to you within a few hours. </p>
      <p>Thank you for getting in touch and have a great day!</p>
      <p>Global Fitness Team</p>
      ";

        // print_r($body);die;

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers.= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $from = "support@globalfitness.net";
        $to = "email@globalfitness.net";
        // $to = "labistour@gmail.com";
        //  $to = "labistour@gmail.com";

        $subject = 'Wait-list Request';
        $message = $body;
        $headers.= 'From: ' . $from . "\r\n" . "X-Mailer: PHP/" . phpversion();
        mail($to, $subject, $message, $headers);
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers.= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $from = "support@globalfitness.net";
        $to = $_POST['email_address_waitlist'];
        $subject = 'Wait-list Request';
        $message = $body2;
        $headers.= 'From: ' . $from . "\r\n" . "X-Mailer: PHP/" . phpversion();
        mail($to, $subject, $message, $headers);
        $data['WaitListRank'] = $this->Site_model->SaveWaitList($listId, $_POST['email_address_waitlist'], $_POST['phone_number_waitlist'], $_POST['message_waitlist'], $_POST['firstname_waitlist'], $_POST['lastname_waitlist']);
         $x = 1;
        foreach($data['WaitListRank'] as $WaitListRankVal) {
          if ($WaitListRankVal->userEmail == $_POST['email_address_waitlist']) {
            $data['position'] = $x;
          }

          $x++;
        }

        $this->session->set_flashdata('email_success', 'Email submitted successfully.');
      }
      else {
        $this->session->set_flashdata('waitlest_error', 'Sorry, You have already request for waitlist');
      }
    }

    if (isset($_POST['message'])) {

      $body = "<p><strong>Dear Webmaster,</strong></p>
      <p><strong>First Name:</strong>" . $_POST['firstname'] . "</p>
      <p><strong>Last Name:</strong>" . $_POST['lastname'] . "</p>
      <p><strong>Email:</strong> " . $_POST['email_address'] . "</p>
      <p><strong>Telephone:</strong>" . $_POST['phone_number'] . "</p>
      <p><strong>Subject:</strong>Price Inquiry | Product Page</p>
      <p><strong>Message:</strong> " . $_POST['message'] . "</p>
      <p><strong>Product Name:</strong>" . $this->input->post('productName') . "</p><p><strong>Product Sku:</strong>" . $this->input->post('sku') . "</p> ";
      $body2 = "
      <h4>Dear " . $_POST['firstname'] . "</h4>
      <p>We appreciate you contacting us about the " . $this->input->post('productName') . " . We try to respond as soon as possible so please look out for an email from one of our customer service colleagues that should get back to you within a few hours. </p>
      <p>Thank you for getting in touch and have a great day!</p>
      <p>Global Fitness Team</p>
      ";
      $headers = 'MIME-Version: 1.0' . "\r\n";
      $headers.= 'Content-type:text/html;charset=UTF-8' . "\r\n";
      $from = "support@globalfitness.net";
      $to = "email@globalfitness.net";

      //  $to = "labistour@gmail.com";

      $subject = 'Price Inquiry | Product Page';
      $message = $body;
      $headers.= 'From: ' . $from . "\r\n" . "X-Mailer: PHP/" . phpversion();
      mail($to, $subject, $message, $headers);
      $headers = 'MIME-Version: 1.0' . "\r\n";
      $headers.= 'Content-type:text/html;charset=UTF-8' . "\r\n";
      $from = "support@globalfitness.newt_textbox(left, top, width, height)";
      $to = $_POST['email_address'];
      $subject = 'Price Inquiry | Product Page';
      $message = $body2;
      $headers.= 'From: ' . $from . "\r\n" . "X-Mailer: PHP/" . phpversion();
      mail($to, $subject, $message, $headers);
      $this->Site_model->contactform();
      $this->session->set_flashdata('email_success', 'Email submitted successfully.');

      // }else{
      // $this->session->set_flashdata('email_captcha_error', 'Spam!!  If you are not a bot then please check recaptcha.'); }

    }
    else {
      if (isset($_POST['productId'])) {
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
    
        // $this->session->set_flashdata('success', 'Thanks you for submitting your review, our moderators will evaluate your submission and notify you when your review is live.');
        // echo '<script type="text/javascript">alert("Thanks you for submitting your review, our moderators will evaluate your submission and notify you when your review is live.");</script>';

      }

      if (isset($_POST['review_id'])) {
        $this->Site_model->help();

        //  echo '<script type="text/javascript">alert("Thanks you for submitting your review, our moderators will evaluate your submission and notify you when your review is live.");</script>';

      }
    }

    if ($id != "") {
      $result = $this->Site_model->productdetailbyname($id);
      $_SESSION['fitness_details'] = $result;
      if (count($result) > 0) {
        $data['star_count'] = $result[0]->star_count;
        $data['star_rate']  = $result[0]->star_rate;
        $data['review'] = $this->Site_model->getreviews($result[0]->ListID);
        $data['title'] = $result[0]->MetaDetailPageTitleTag;
        $data['description'] = $result[0]->MetaDetailPageDescriptionTag;
        $data['keywords'] = $result[0]->MetaDetailPageKeywordTag;
        $data['detail'] = $result;
        $data['ptype'] = "0";
        $data['category'] = $this->Site_model->categorySearch('zCardioMenu');
        $data['category2'] = $this->Site_model->categorySearch('zStrengthMenu');
        $data['menu'] = $this->Site_model->menusearch();
        $this->load->view('template/site/header', $data);
        
        $this->load->view('shop_view');
        $this->load->view('template/site/footer');
      }
      else {

        // echo "hello"; die;

        redirect("/cardio");
      }
    }
    else {
      redirect("/cardio");
    }
  }

  public

  function SuggestionList()
  {
    if (isset($_POST['data'])) {
      $data = array(
        'key' => 'zFitnessPiece',
        'data1' => $_POST['data']
      );
      $mylist = $this->Site_model->SuggestionList($data);
      echo json_encode($mylist);
    } 

    if (isset($_POST['value'])) {
      
      if (isset($_POST['categories']) == 'fitness-equipment') {
        $data = array(
          'key' => 'zBrandFilterCardio',
          'data1' => $_POST['value']
        );
      }

      if (isset($_POST['categories']) == 'gym-equipment') {
        $data = array(
          'key' => 'zBrandFilterStrength',
          'data1' => $_POST['value']
        );
      }
      else {
        $data = array(
          'key' => 'zFitnessBrand',
          'data1' => $_POST['value']
        );
      }

      $mylist = $this->Site_model->SuggestionList($data);
      echo json_encode($mylist);
    }
  }

  public

  function filter()
  {
    $data['availability'] = $this->Site_model->allrecord('zFitnessAvailability');
    $data['amps'] = $this->Site_model->allrecord('zFitnessAmps');
    $data['voltage'] = $this->Site_model->allrecord('zFitnessVoltage');
    $data['condition'] = $this->Site_model->allrecord('zFitnessConditions');
    $data['product'] = $this->Site_model->productSearchfilter("Cardio");
    /*$data['product'] = $this->Site_model->productSearchBycategoryfilter($name);*/
    $data['category'] = $this->Site_model->categorySearch('zCardioMenu');
    $data['category2'] = $this->Site_model->categorySearch('zStrengthMenu');
    $data['brand'] = $this->Site_model->allrecord1('zBrandFilterCardio');

    // $this->Site_model->fetchBrand($name);

    $data['mmcategory'] = $this->Site_model->allrecord('zFitnessCategory');
    $data['condition'] = $this->Site_model->allrecord('zFitnessConditions');
    $data['piece'] = $this->Site_model->allrecord1('zFitnessPiece');
    // $data['strength_equipment'] = 'fitness_equipment';
    $data['ptype'] = "0";
    $data['title'] = "Product List";
    $data['strength_equipment'] = 'cardio';
    $data['menu'] = $this->Site_model->menusearch();
    $this->load->view('template/site/header', $data);
    $this->load->view('filter_view');
    $this->load->view('template/site/footer');
  }

  public

  function modalAjax()
  { //print_r($_POST); die;
    $secret = '6LctiyIUAAAAAKfEWh_F9Jc--9BUjizTOvt26I9k';
    $response = $_POST['recaptcha'];
    $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
    $arr = json_decode($rsp, TRUE);
    if ($arr['success'] == '1') {
      echo 1;
    }
    else {
      echo 2;
    }

    die();
  }
}
