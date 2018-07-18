<?php
use Twilio\Rest\Client;
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceProviders extends CI_Controller {

	/**
     * @package  CodeIgniter
     * @author   Saurabh
     * @category Controller
     *
	 */
	function __construct() {
        // Construct the parent class
        parent::__construct();
        // Configure limits on our controller methods

        $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->model('Admin_model');
        $this->load->helper('date');  
        $this->load->helper(array('form', 'url'));
       // $this->load->library('email', $config);
        $this->load->library('form_validation');

    }

    public function index(){
        $data['catData']= $this->Admin_model->get_data('tbl_categories');
   
        $this->load->view('serviceProvider',$data);
    }
    public function next(){
        if (empty($_POST['cat'])) {
            redirect('ServiceProviders/');
        }
     //$data['subCatData']= $this->Admin_model->get_data('tbl_subCategory');
        $this->load->view('serviceProviderNext');
    }
	public function Service_signup()
	{
        if (empty($_POST['userType']) ) {
            redirect('ServiceProviders/');
        }else{
            // print_r($_POST);die;
            
            if (isset($_POST['add_driver'])) {
                $checkEmail = $this->Admin_model->select_data('email',"tbl_users",array('email'=>$_POST['email']));
                if (!empty($checkEmail)) {
                    $this->session->set_flashdata('error', 'Email id Already Exist!');
                    redirect('ServiceProviders/');
                } else {
        			$upload_path = "Public/img/driverImages";
        			$image = "profile_pic";
        			$imagename = $this->file_upload($upload_path, $image);

                    /*$upload_path = "Public/img/driverImages";
                    $image1 = "reg_image";
                    $regImage = $this->file_upload($upload_path, $image1);*/

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

                    $phone = $_POST['concode'].$_POST['phone'];
                    // print_r($phone);die;
                    
        		    $main_data = array(
                        'fname'=>$this->input->post('fname'),
                        'lname'=>$this->input->post('lname'),
                        'gender'=>$this->input->post('gender'),
                        'categoryType'=>$this->input->post('userType'),
                        'email'=>$this->input->post('email'),
                        'password'=>md5($this->input->post('password')),
                        'address'=>$this->input->post('address'),
                        'phone'=>$phone,
                        'user_type'=>2,
                        'profile_pic' =>$imagename,
                        'signupVia_email'=>1,
                        'date_created'=> date('Y-m-d H:i:s'),
                	);
                	$sec_data = array(
                        //'licence_no'=>$this->input->post('licence_no'),
                       // 'registration_id'=>$this->input->post('registration_id'),
                      //  'registration_expiry'=>$this->input->post('registration_expiry'),
                        //'insurance_no'=>$this->input->post('insurance_no'),
                        // 'reg_image'=>$regImage,
                        'date_created'=> date('Y-m-d H:i:s'),
                        'appliedAs'=>$this->input->post('appliedAs'),
                        'compName'=>$this->input->post('compName'),
                        'compAddress'=>$this->input->post('compAddress'),
                        'joinType'=>$this->input->post('joinType'),
                        'icno'=>$this->input->post('icno'),
                        'icf_image'=>$icf_image,
                        'icb_image'=>$icb_image,
                	);
                    if ($_POST['userType']==1) {
                        $driver_data = array(
                            'acraNo'=>$this->input->post('acraNo'),
                            'ownOrRented'=>$this->input->post('ownOrRented'),
                            'logo'=>$this->input->post('logo'),
                            'commercialRadio'=>$this->input->post('commercialRadio'),
                            'dlf_image'=>$dlf_image,
                            'dlb_image'=>$dlb_image,
                            'frontPicture'=>$frontPicture,
                            'sidePicture'=>$sidePicture,
                            'acraBiz'=>$acraBizImg,
                        );
                        $sec_data = array_merge($sec_data, $driver_data);
                    }
                    
                    $mainInsert = $this->Admin_model->insert_data('tbl_users',$main_data);
                    $sec_data['user_id'] = $mainInsert;
                    $SecInsert = $this->Admin_model->insert_data('tbl_serviceProvider_Lookup',$sec_data);
                    $amount = 0;
                    $addBal = $this->Admin_model->insert_data('tbl_wallet',array('balance'=>$amount,'user_id'=>$mainInsert,'date_created'=>date('Y-m-d H:i:s')));
                    $addtransArray = array(
                      'amount_credited'=>$amount,
                      'user_id'=>$mainInsert,
                      'txnId'=>'from_wallet',
                      'date_created'=>date('Y-m-d H:i:s')
                      );

                    $userPaymentData = array(
                        'user_id' => $mainInsert,
                        'paypalId' => $this->input->post('paypalId'),
                        'accHolderName' => $this->input->post('accHolderName'),
                        'accountNumber' => $this->input->post('accountNumber'),
                        'ifcsc' => $this->input->post('ifcsc'),
                        'addedOn' => date("Y-m-d H:i:s"),
                    );
                    $this->Admin_model->insert_data('tbl_userPayment',$userPaymentData);
                    foreach ($_POST['subCatHidden'] as  $value) {
                     $serviceArray = array(
                        "user_id"=>$mainInsert,
                        "user_type"=>2,
                        "subCategory_id"=>$value,
                        "date_created"=>date('Y-m-d H:i:a')
                        );
                         if(!empty($value)){
                         $serviceInsert = $this->Admin_model->insert_data('tbl_serviceProviders',$serviceArray);
                         }
                    }
                	$this->session->set_flashdata('msg', 'Added Successfully!');
                    redirect('ServiceProviders/');
                }
    		}
    		$this->load->view('service_signup');
        }
	}

    public function emailCheck()
    {
        $checkEmail = $this->Admin_model->select_data('email',"tbl_users",array('email'=>$_POST['email']));
        if (empty($checkEmail)) {
            $status = 1;
        } else {
            $status = 0;
        }
        
        $response = array();

        if ( $status == 0 ) {
            $response['status'] = 'error';
            $response['message'] = 'This failed';
        } else {
            $response['status'] = 'success';
            $response['message'] = 'Successful!!';
        }

        echo json_encode($response);
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

    public function sendOTP()
    {
        /* Twilio sms verification start*/
        $phone = $_POST['phone'];
        $otp = $this->generateRandomString();
        $check = $this->Admin_model->select_data('*',"tbl_otp",array('phone'=>$phone));
        if (empty($check)) {
            $this->Admin_model->insert_data('tbl_otp',array('phone'=>$phone,'otp'=>$otp,'addedOn'=>date("Y-m-d H:i:s")));
        } else {
            $this->Admin_model->update_data('tbl_otp',array('otp'=>$otp,'updatedOn'=>date("Y-m-d H:i:s")),array('phone'=>$phone));
        }
        

        $msg = array('to'=>$phone,'body'=>"Your verification code for Kudos is: $otp");
        $status = $this->twilioMessage($msg);

        $status = 1;
        $response = array();

        if ( $status == 0 ) {
            $response['status'] = 'error';
            $response['message'] = 'This failed';
        } else {
            $response['status'] = 'success';
            $response['message'] = 'OTP sent successfully';
        }

        echo json_encode($response);
        /* Twilio sms verification End */
    }

    public function verifyOtp()
    {
        /* Twilio sms verification start*/
        $phone = $_POST['phone'];
        $otp = $_POST['otp'];
        $check = $this->Admin_model->select_data('*',"tbl_otp",array('phone'=>$phone,'otp'=>$otp));

        if (empty($check)) {
            $status = 0;
        } else {
            $status = 1;
        }
        
        $response = array();

        if ( $status == 0 ) {
            $response['status'] = 'error';
            $response['message'] = 'OTP doesn\'t match';
        } else {
            $response['status'] = 'success';
            $response['message'] = 'OTP verified successfully';
        }

        echo json_encode($response);
        /* Twilio sms verification End */
    }

    public function electrician_signup()
    {
        // print_r($_POST); die;


        if (isset($_POST['add_driver'])) {
            $upload_path = "Public/img/driverImages";
            $image = "profile_pic";
            $imagename = $this->file_upload($upload_path, $image);
            
            $upload_path = "Public/img/driverImages";
            $image1 = "reg_image";
            $regImage = $this->file_upload($upload_path, $image1); 

            $phone2 = $_POST['concode'].$_POST['phone'];

            $main_data = array(
                'fname'=>$this->input->post('fname'),
                'lname'=>$this->input->post('lname'),
                'gender'=>$this->input->post('gender'),
                'phone'=>$phone2,
                'email'=>$this->input->post('email'),
                'password'=>md5($this->input->post('password')),
                'address'=>$this->input->post('address'),
                'user_type'=>3,
                'date_created'=> date('Y-m-d H:i:s'),
            );

            // $sec_data = array(
            //     'licence_no'=>$this->input->post('licence_no'),             
            //     'licence_expiry'=>$this->input->post('licence_expiry'),             
            //     'registration_id'=>$this->input->post('registration_id'),
            //     'registration_expiry'=>$this->input->post('registration_expiry'),             
            //     'insurance_no'=>$this->input->post('insurance_no'),
            //     'insurance_expiry'=>$this->input->post('insurance_expiry'),             
            //     'date_created'=> date('Y-m-d H:i:s')
            // );

            $mainInsert = $this->Admin_model->insert_data('tbl_users',$main_data);
           // $sec_data['user_id'] = $mainInsert;
            //$SecInsert = $this->Admin_model->insert_data('tbl_serviceProvider_Lookup',$sec_data);
            $this->session->set_flashdata('msg', 'Added Successfully!');
        }
        $this->load->view('electrician_signup');
    }


		Public function file_upload($upload_path, $image) 
    {                                  /* File upload function */

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

    public function test()
    {
        echo "string";
        flush();
        sleep(5);
        echo "dsfgdsg";
    }
}
