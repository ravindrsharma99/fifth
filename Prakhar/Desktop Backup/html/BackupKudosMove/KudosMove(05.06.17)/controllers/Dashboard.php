<?php
// error_reporting(E_ALL); ini_set('display_errors', 1);
// echo "string";die();
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


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

        $this->load->library('session');
        $haveAccess = $this->session->userdata('logged_in');
        // print_r($haveAccess);
        if (!$haveAccess) {
        	redirect('Login');
        }

        $this->load->model('Admin_model');
        $this->load->helper('date');  
        $this->load->helper(array('form', 'url'));
       
        /*$config = Array(
            'protocol' => 'sendmail',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );*/
        $this->load->library('email', $config);

        $this->load->library('form_validation');

    }

	public function index()
	{
			
		$data['res1'] = $this->Admin_model->select_data('*',"tbl_users",array('user_type'=>0));
		$data['res2'] = $this->Admin_model->select_data('*',"tbl_login",array('status'=>1));
		$data['distance'] = $this->Admin_model->select_data('*',"tbl_users",array('user_type'=>2));
		$data['hourly'] = $this->Admin_model->select_data('*',"tbl_users",array('user_type'=>3));

		$this->load->view('template/header.php');
		$this->load->view('template/subheader.php');
	    $this->load->view('template/sidebar');
		$this->load->view('index.php',$data);
		$this->load->view('template/footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('Login');
	}

	public function template($view,$data)
	{
		$this->load->view('template/header.php',$data);
		$this->load->view('template/subheader.php');
		$this->load->view('template/sidebar.php');
		$this->load->view($view);
		$this->load->view('template/footer.php');
	}

	public function list_users()
	{
        $data['page_title'] = "Users";
		$data['userData'] = $this->Admin_model->select_data('*','tbl_users',array("user_type"=>0));
		$this->template('listUsers.php',$data);

	}

		public function list_drivers()
	{
        $data['page_title'] = "Drivers";
		$data['drivData'] = $this->Admin_model->select_data('*','tbl_users',array("categoryType"=>1));
		$this->template('listDrivers.php',$data);


	}
		public function list_electricians()
	{
        $data['page_title'] = "Electricians";
		$data['elecData'] = $this->Admin_model->select_data('*','tbl_users',array("categoryType"=>2));
		$this->template('listElectricians.php',$data);


	}

	
	public function add_subcategory()
	{
	//	print_r($_POST); 
	
		if (isset($_POST['add_sub'])) {
	
			foreach ($_FILES as $key => $value) {
			
				if (!empty($value['name'])) {
					$upload_path = "Public/img/uploaded";
			        $image = $key;
			        $imagename = $this->file_upload($upload_path, $image); 
				}
			}
            $categoryId = $this->Admin_model->select_data('id','tbl_categories',
            array(
	              'categoryName'=>$this->input->post('categoryId'))
            );    

			$cat_data = array(
                'subCategoryName'=>$this->input->post('subCategoryName'),
                'category_id'=>$categoryId[0]->id,             
                'image'=>$imagename,
                'jobRate_type'=>$this->input->post('jobType'),
                'kmCharge'=>$this->input->post('kmCharge'),             
                'base_price'=>$this->input->post('base_price'),             
                'hourlyCharge'=>$this->input->post('hourlyCharge'),
                'date_created'=> date('Y-m-d H:i:s')
        	);
        	

			$this->Admin_model->insert_data("tbl_subCategory",$cat_data);
			$this->session->set_flashdata('msg', 'Added Successfully!');
		}
		$data['page_title'] = "Add SubCategory";
		$data['data'] = $this->Admin_model->get_data('tbl_subCategory');
		$data['data1'] = $this->Admin_model->get_data('tbl_categories');

		$this->template('addsubCategory.php',$data);
	}

	public function listSubCategories()
	{
        $data['page_title'] = "SubCategories";
		$data['subData'] = $this->Admin_model->get_data('tbl_subCategory');
		$this->template('listSubcategory.php',$data);

	}



		public function add_services()
	{
	//	print_r($_POST); 
	
		if (isset($_POST['add_service'])) {


			$service_data = array(
                'category_id'=>$this->input->post('category_id'),
                'subCategory_id'=>$this->input->post('subCategory_id'),    
                'ServiceTitle'=>$this->input->post('ServiceTitle'),                 
                'ServiceType'=>$this->input->post('ServiceType'),    
                'price'=>$this->input->post('price'),    
                'date_created'=> date('Y-m-d H:i:s')
        	);
        	

			$this->Admin_model->insert_data("tbl_subCategoryServices",$service_data);
			$this->session->set_flashdata('msg', 'Added Successfully!');
		}
		$data['page_title'] = "Add Services";
		$data['dataCat'] = $this->Admin_model->get_data('tbl_categories');
		$this->template('addservices.php',$data);
	}


		public function add_category()
	{
		// print_r($_POST); die;
	
		if (isset($_POST['add_cat'])) {
	
			foreach ($_FILES as $key => $value) {
			
				if (!empty($value['name'])) {
					$upload_path = "Public/img/uploaded";
			        $image = $key;
			        $imagename = $this->file_upload($upload_path, $image); 
				}
			}
          

			$cat_data = array(
                'categoryName'=>$this->input->post('categoryName'),             
                'categoryType'=>$this->input->post('categoryType'),             
                'image'=>$imagename,
                'date_created'=> date('Y-m-d H:i:s')
        	);
        	

			$this->Admin_model->insert_data("tbl_categories",$cat_data);
			$this->session->set_flashdata('msg', 'Added Successfully!');
		}
		$data['page_title'] = "Add Category";
		//$data['data'] = $this->Admin_model->get_data('tbl_subCategory');
		//$data['data1'] = $this->Admin_model->get_data('tbl_categories');

		$this->template('addCategory.php',$data);
	}


		public function listCategories()
	{
        $data['page_title'] = "Categories";
		$data['mainData'] = $this->Admin_model->get_data('tbl_categories');
		$this->template('listCategory.php',$data);


	}

	public function jobView()
	{
		$data['page_title'] = "Job View";
		$data['data'] = $this->Admin_model->select_data('*','tbl_bookingRequests',array('id'=>$_GET['jobid']));
		$this->template('jobView.php',$data);
	}

	public function jobEdit()
	{
		$data['page_title'] = "Job Edit";
		$data['data'] = $this->Admin_model->select_data('*','tbl_bookingRequests',array('id'=>$_GET['jobid']));
		$this->template('jobEdit.php',$data);
	}

	public function serviceRequest()
	{
		$data['page_title'] = "Requested Services";

		if (isset($_POST['assignServiceProvider'])) {
			$user = $this->Admin_model->select_data('id,user_id,device_id,token_id','tbl_login',array('user_id'=>$_POST["userId"],'status'=>1));
			$userDetail = $this->Admin_model->select_data('*','tbl_users',array('id'=>$_POST["userId"]));
			$provider = $this->Admin_model->select_data('id,user_id,device_id,token_id','tbl_login',array('user_id'=>$_POST["serviceProvider"],'status'=>1));
			$providerDetail = $this->Admin_model->select_data('*','tbl_users',array('id'=>$_POST["serviceProvider"]));
			$reqDetail = $this->Admin_model->select_data('*','tbl_bookingRequests',array('id'=>$_POST["reqid"]));

			// echo "<pre>";
			// print_r($_POST);
			// print_r($user);
			// print_r($userDetail);
			// print_r($provider);
			// print_r($providerDetail);
			// print_r($reqDetail);

			foreach ($user as $key => $value) {
				$device = $value->device_id;
				$pushData=array();
				$pushData['token_id'] = $value->token_id;

				if ($device==0) {
					$pushData['API_ACCESS_KEY'] = "AIzaSyBaMNwomWh3o884269FmM9zYC1HdylJDco";

					$pushData['msg'] = array(
				        "message" => $providerDetail[0]->fname.' '.$providerDetail[0]->lname." has accepted your job request",
				        "action" => "Move booked",
				        'req_id' => $_POST['reqid'],
				        "from_name" =>$providerDetail[0]->fname,
				        "from_id" =>$providerDetail[0]->id,
				        "from_pic"=>$providerDetail[0]->profile_pic,
				        'is_quote' => $reqDetail[0]->is_quote,
				        'quote_price' => $reqDetail[0]->totalprice,
				        'value' => $reqDetail[0]->value,
				        'time' => date("Y-m-d H:i:s")
				    );
					$this->androidPush($pushData);
				} else {
					$pushData['pemPath'] = './certs/moveDev.pem';
					$pushData['msg'] = array(
				        "message" => $providerDetail[0]->fname.' '.$providerDetail[0]->lname." has accepted your job request",
				        "action" => "Move booked",
				        'req_id' => $_POST['reqid'],
				        "from_name" =>$providerDetail[0]->fname,
				        "from_id" =>$providerDetail[0]->id,
				        "from_pic"=>$providerDetail[0]->profile_pic,
				        'is_quote' => $reqDetail[0]->is_quote,
				        'quote_price' => $reqDetail[0]->totalprice,
				        'value' => $reqDetail[0]->value,
				        'alert' => $providerDetail[0]->fname.' '.$providerDetail[0]->lname." has accepted your job request",
    					'sound' => 'default'
				    );
					$this->iosPush($pushData);
				}
			}
			foreach ($provider as $key => $value) {
				$device = $value->device_id;
				$pushData=array();
				$pushData['token_id'] = $value->token_id;

				if ($device==0) {
					$pushData['API_ACCESS_KEY'] = "AAAAVoM4uNQ:APA91bH0qje7eQquF9p1v-w5vJUOSSxVpqFYnnYePUjldaIuOENladiyA1JrC1dRl_7asQiQlUxmelbePiOhqTHUzJiAULDFPJZYzWMHUp84an02gT3CVpTGM15DkQo6yvG_iMdqJ7Yi";

					$pushData['msg'] = array(
				        "message" => "Admin has assigned you a job request",
				        "action" => "Move assigned",
				        'req_id' => $_POST['reqid'],
				        'is_quote' => $reqDetail[0]->is_quote,
				        'value' => $reqDetail[0]->value,
				        'time' => date("Y-m-d H:i:s")
				    );
					$this->androidPush($pushData);
				} else {
					$pushData['pemPath'] = './certs/driverDev.pem';
					$pushData['msg'] = array(
				        "message" => "Admin has assigned you a job request",
				        "action" => "Move booked",
				        'req_id' => $_POST['reqid'],
				        "from_name" =>$providerDetail[0]->fname,
				        "from_id" =>$providerDetail[0]->id,
				        "from_pic"=>$providerDetail[0]->profile_pic,
				        'is_quote' => $reqDetail[0]->is_quote,
				        'quote_price' => $reqDetail[0]->totalprice,
				        'value' => $reqDetail[0]->value,
				        'alert' => 'Admin has assigned you a job request',
    					'sound' => 'default'
				    );
					$this->iosPush($pushData);
				}
			}
			// die;

			$this->Admin_model->update_data('tbl_bookingRequests',array('is_accepted'=>$_POST['assignServiceProvider'],'accepted_by'=>$_POST['serviceProvider']),array('id'=>$_POST['reqid']));
			$this->Admin_model->update_data('tbl_moveHistory',array('driver_id'=>$_POST['serviceProvider'],'status'=>1,'accepted_time'=>date("Y-m-d h:i:s")),array('req_id'=>$_POST['reqid']));
		}

		$pending = '(is_accepted=0 and is_started=0 and is_completed=0 and is_cancelled=0)';
		$data['pending'] = $this->Admin_model->select_data('*','tbl_bookingRequests',$pending);

		$activated = '((is_accepted=1 or is_started=1) and is_completed=0 and is_cancelled=0)';
		$data['activated'] = $this->Admin_model->select_data('*','tbl_bookingRequests',$activated);

		$completed = '(is_accepted=1 and is_started=1 and is_completed=1 and is_cancelled=0)';
		$data['completed'] = $this->Admin_model->select_data('*','tbl_bookingRequests',$completed);

		$cancelled = '(is_cancelled=1)';
		$data['cancelled'] = $this->Admin_model->select_data('*','tbl_bookingRequests',$cancelled);
		
		$this->template('serviceRequest.php',$data);
	}

	public function freeProviders()
	{
		$serviceTime = $this->Admin_model->select_data('*','tbl_bookingRequests',array('id'=>$_POST["reqid"]));
		$minTime = $serviceTime[0]->booking_date." ".$serviceTime[0]->booking_time;
		$dt = new DateTime($minTime);
		$dt->modify('- 1 hour');
		// print_r($minTime);
		// print_r($dt);

		$maxTime = $serviceTime[0]->booking_date." ".$serviceTime[0]->booking_time;
		$h =$serviceTime[0]->hours+1;
		$dt2 = new DateTime($maxTime);
		$dt2->modify("+ $h hour");
		// print_r($maxTime);
		// print_r($dt2);

		$list = $this->Admin_model->freeServiceProviders($minTime,$maxTime);
		if (!empty($list)) {
			$arr = '';
			foreach ($list as $key => $value) {
				// print_r($value);
				$arr .= "<option value=$value->id> #$value->id | $value->email | $value->fname $value->lname </option>";
			}
			$a = '<div class="form-group">
			<label for="selectbox">Assign Service Provider</label>
			<select class="form-control" id="serviceProvider" name = "serviceProvider">
			<option disabled>Select Service Provider</option>'.$arr.'
			</select>
			<input type="hidden" name="reqid" value="'.$_POST["reqid"].'">
			<input type="hidden" name="userId" value="'.$_POST["userId"].'">
			</div><button type="submit" name = "assignServiceProvider" value="1" class="btn btn-default">Submit</button>';
			echo json_encode($a);
		} else {
			echo json_encode("No Service Provider Available");
		}
		
		
		// echo json_encode($list);
	}

	public function startService()
	{
		if ($_POST['isStart']==1) {
			$user = $this->Admin_model->select_data('id,user_id,device_id,token_id','tbl_login',array('user_id'=>$_POST["userId"],'status'=>1));
			$userDetail = $this->Admin_model->select_data('*','tbl_users',array('id'=>$_POST["userId"]));

			$provider = $this->Admin_model->select_data('id,user_id,device_id,token_id','tbl_login',array('user_id'=>$_POST["serviceProvider"],'status'=>1));
			$providerDetail = $this->Admin_model->select_data('*','tbl_users',array('id'=>$_POST["serviceProvider"]));
			$reqDetail = $this->Admin_model->select_data('*','tbl_bookingRequests',array('id'=>$_POST["reqid"]));

			// echo "<pre>";
			// print_r($_POST);
			// print_r($user);
			// print_r($userDetail);
			// print_r($provider);
			// print_r($providerDetail);
			// print_r($reqDetail);
			foreach ($user as $key => $value) {
				$device = $value->device_id;
				$pushData=array();
				$pushData['token_id'] = $value->token_id;
				$pushData['msg'] = array(
			        "message" => "Job has started with ".$providerDetail[0]->fname.' '.$providerDetail[0]->lname,
			        "action" => "Move started",
			        'req_id' => $_POST['reqid'],
			        "profile_pic"=>$providerDetail[0]->profile_pic,
			        'is_quote' => $reqDetail[0]->is_quote,
			        'value' => $reqDetail[0]->value,
			    );
				
				if ($device==0) {
					$pushData['API_ACCESS_KEY'] = "AIzaSyBaMNwomWh3o884269FmM9zYC1HdylJDco";

					$this->androidPush($pushData);
				} else {
					$pushData['pemPath'] = './certs/moveDev.pem';
					$this->iosPush($pushData);
				}
				// var_dump($value->token_id);
			}
			foreach ($provider as $key => $value) {
				$device = $value->device_id;
				$pushData=array();
				$pushData['token_id'] = $value->token_id;
			    // var_dump($value->token_id);
				$pushData['msg'] = array(
			        "message" => "Job has started with ".$userDetail[0]->fname.' '.$userDetail[0]->lname,
			        "action" => "Move started",
			        'req_id' => $_POST['reqid'],
			        "profile_pic"=>$userDetail[0]->profile_pic,
			        'is_quote' => $reqDetail[0]->is_quote,
			        'value' => $reqDetail[0]->value,
			    );
				if ($device==0) {
					$pushData['API_ACCESS_KEY'] = "AAAAVoM4uNQ:APA91bH0qje7eQquF9p1v-w5vJUOSSxVpqFYnnYePUjldaIuOENladiyA1JrC1dRl_7asQiQlUxmelbePiOhqTHUzJiAULDFPJZYzWMHUp84an02gT3CVpTGM15DkQo6yvG_iMdqJ7Yi";

					$this->androidPush($pushData);
				} else {
					$pushData['pemPath'] = './certs/driverDev.pem';
					
					$this->iosPush($pushData);
				}
			    // var_dump($pushData);
			}
		}

		$this->Admin_model->update_data('tbl_bookingRequests',array('is_started'=>1),array('id'=>$_POST['reqid']));
		$this->Admin_model->update_data('tbl_moveHistory',array('status'=>2,'started_time'=>$_POST['started_time']),array('req_id'=>$_POST['reqid']));

		$status = 1;
		$response = array();

	    if ( $status == 0 ) {
	        $response['status'] = 'error';
	        $response['message'] = 'This failed';
	    } else {
	        $response['status'] = 'success';
	        $response['message'] = 'This was successful';
	    }

	    echo json_encode($response);
	}

	public function endService()
	{
		$user = $this->Admin_model->select_data('id,user_id,device_id,token_id','tbl_login',array('user_id'=>$_POST["userId"],'status'=>1));
		$userDetail = $this->Admin_model->select_data('*','tbl_users',array('id'=>$_POST["userId"]));
		$provider = $this->Admin_model->select_data('id,user_id,device_id,token_id','tbl_login',array('user_id'=>$_POST["serviceProvider"],'status'=>1));
		$providerDetail = $this->Admin_model->select_data('*','tbl_users',array('id'=>$_POST["serviceProvider"]));
		$reqDetail = $this->Admin_model->select_data('*','tbl_bookingRequests',array('id'=>$_POST["reqid"]));

		// echo "<pre>";
		// print_r($_POST);
		// print_r($user);
		// print_r($userDetail);
		// print_r($provider);
		// print_r($providerDetail);
		// print_r($reqDetail);
		foreach ($user as $key => $value) {
			$device = $value->device_id;
			$pushData=array();
			$pushData['token_id'] = $value->token_id;
			$pushData['msg'] = array(
		        "message" => "Your job with ".$providerDetail[0]->fname.' '.$providerDetail[0]->lname." has completed",
		        "action" => "Move started",
		        'req_id' => $_POST['reqid'],
		        "profile_pic"=>$providerDetail[0]->profile_pic,
		        'is_quote' => $reqDetail[0]->is_quote,
		        'value' => $reqDetail[0]->value,
		    );

			if ($device==0) {
				$pushData['API_ACCESS_KEY'] = "AIzaSyBaMNwomWh3o884269FmM9zYC1HdylJDco";
				$this->androidPush($pushData);
			} else {
				$pushData['pemPath'] = './certs/moveDev.pem';
				$this->iosPush($pushData);
			}
		}
		foreach ($provider as $key => $value) {
			$device = $value->device_id;
			$pushData=array();
			$pushData['token_id'] = $value->token_id;
			$pushData['msg'] = array(
		        "message" => "Your job with ".$userDetail[0]->fname.' '.$userDetail[0]->lname." has completed",
		        "action" => "Move started",
		        'req_id' => $_POST['reqid'],
		        "profile_pic"=>$userDetail[0]->profile_pic,
		        'is_quote' => $reqDetail[0]->is_quote,
		        'value' => $reqDetail[0]->value,
		    );
			if ($device==0) {
				$pushData['API_ACCESS_KEY'] = "AAAAVoM4uNQ:APA91bH0qje7eQquF9p1v-w5vJUOSSxVpqFYnnYePUjldaIuOENladiyA1JrC1dRl_7asQiQlUxmelbePiOhqTHUzJiAULDFPJZYzWMHUp84an02gT3CVpTGM15DkQo6yvG_iMdqJ7Yi";
				$this->androidPush($pushData);
			} else {
				$pushData['pemPath'] = './certs/driverDev.pem';
				$this->iosPush($pushData);
			}
		}
		$this->Admin_model->update_data('tbl_bookingRequests',array('is_completed'=>1),array('id'=>$_POST['reqid']));
		$this->Admin_model->update_data('tbl_moveHistory',array('status'=>3,'completed_time'=>date("Y-m-d H:i:s")),array('req_id'=>$_POST['reqid']));

		$status = 1;
		$response = array();

	    if ( $status == 0 ) {
	        $response['status'] = 'error';
	        $response['message'] = 'This failed';
	    } else {
	        $response['status'] = 'success';
	        $response['message'] = 'This was successful';
	    }

	    echo json_encode($response);
	}

	public function cancelService()
	{
		$user = $this->Admin_model->select_data('id,user_id,device_id,token_id','tbl_login',array('user_id'=>$_POST["userId"],'status'=>1));
		$userDetail = $this->Admin_model->select_data('*','tbl_users',array('id'=>$_POST["userId"]));
		$provider = $this->Admin_model->select_data('id,user_id,device_id,token_id','tbl_login',array('user_id'=>$_POST["serviceProvider"],'status'=>1));
		$providerDetail = $this->Admin_model->select_data('*','tbl_users',array('id'=>$_POST["serviceProvider"]));
		$reqDetail = $this->Admin_model->select_data('*','tbl_bookingRequests',array('id'=>$_POST["reqId"]));

		// echo "<pre>";
		// print_r($_POST);
		// print_r($user);
		// print_r($userDetail);
		// print_r($provider);
		// print_r($providerDetail);
		// print_r($reqDetail);

		foreach ($user as $key => $value) {
			$device = $value->device_id;
			$pushData=array();
			$pushData['token_id'] = $value->token_id;
			$pushData['msg'] = array(
		        "message" => "Job has been cancelled by Admin with ".$providerDetail[0]->fname.' '.$providerDetail[0]->lname,
		        "action" => "Move cancelled",
		        'req_id' => $_POST['reqid'],
		        "profile_pic"=>$providerDetail[0]->profile_pic,
		        'is_quote' => $reqDetail[0]->is_quote,
		        'value' => $reqDetail[0]->value,
		    );

			if ($device==0) {
				$pushData['API_ACCESS_KEY'] = "AIzaSyBaMNwomWh3o884269FmM9zYC1HdylJDco";
				$this->androidPush($pushData);
			} else {
				$pushData['pemPath'] = './certs/moveDev.pem';
				$this->iosPush($pushData);
			}
		}
		foreach ($provider as $key => $value) {
			$device = $value->device_id;
			$pushData=array();
			$pushData['token_id'] = $value->token_id;
			$pushData['msg'] = array(
		        "message" => "Job has been cancelled by Admin with ".$userDetail[0]->fname.' '.$userDetail[0]->lname,
		        "action" => "Move cancelled",
		        'req_id' => $_POST['reqid'],
		        "profile_pic"=>$userDetail[0]->profile_pic,
		        'is_quote' => $reqDetail[0]->is_quote,
		        'value' => $reqDetail[0]->value,
		    );
			if ($device==0) {
				$pushData['API_ACCESS_KEY'] = "AAAAVoM4uNQ:APA91bH0qje7eQquF9p1v-w5vJUOSSxVpqFYnnYePUjldaIuOENladiyA1JrC1dRl_7asQiQlUxmelbePiOhqTHUzJiAULDFPJZYzWMHUp84an02gT3CVpTGM15DkQo6yvG_iMdqJ7Yi";

				$this->androidPush($pushData);
			} else {
				$pushData['pemPath'] = './certs/driverDev.pem';
				$this->iosPush($pushData);
			}
		}
		$this->Admin_model->update_data('tbl_bookingRequests',array('is_cancelled'=>1),array('id'=>$_POST['reqid']));
		$this->Admin_model->update_data('tbl_moveHistory',array('status'=>4,'cancelled_by'=>3,'cancelled_time'=>date("Y-m-d H:i:s")),array('req_id'=>$_POST['reqid']));
		
		$status = 1;
		$response = array();

	    if ( $status == 0 ) {
	        $response['status'] = 'error';
	        $response['message'] = 'This failed';
	    } else {
	        $response['status'] = 'success';
	        $response['message'] = 'This was successful';
	    }

	    echo json_encode($response);
	}

	public function editSubcategory()
	{

	
		if (isset($_POST['subCatSubmit'])) {
	
			foreach ($_FILES as $key => $value) {
			
				if (!empty($value['name'])) {
					$upload_path = "Public/img/uploaded";
			        $image = $key;
			        $imagename = $this->file_upload($upload_path, $image); 
				}
			}
          
            $id = $this->input->post('editId');
			$oldSubCat_data = array(
                'subCategoryName'=>$this->input->post('subCatname'),             
                'image'=>$imagename,
                'jobRate_type'=>$this->input->post('seljobType'),   
                'kmCharge'=>$this->input->post('kmCharge'),   
                'hourlyCharge'=>$this->input->post('hourlyCharge'),   
                'base_price'=>$this->input->post('base_price'),  
                'wayPoint_charge'=>$this->input->post('wayPoint_charge'), 
                'date_created'=> date('Y-m-d H:i:s')
        	);
        	
            $SubCat_data = array_filter($oldSubCat_data);

			$this->Admin_model->update_data("tbl_subCategory",$SubCat_data,array('id'=>$id));
			$this->session->set_flashdata('msg', 'Updated Successfully!');
		}
		$data['page_title'] = "SubCategories";
		$data['subData'] = $this->Admin_model->get_data('tbl_subCategory');
		$this->template('listSubcategory.php',$data);

	}


		public function editUser()
	{
		
	
		if (isset($_POST['editUsers'])) {

		foreach ($_FILES as $key => $value) {

				if (!empty($value['name'])) {
					$upload_path = "Public/img/uploaded";
			        $image = $key;
			        $imagename = $this->file_upload($upload_path, $image); 
				}
			
          }
            $id = $this->input->post('editId');
			$oldUser_data = array(
                'fname'=>$this->input->post('fName'), 
                'lname'=>$this->input->post('lname'), 
                'address'=>$this->input->post('address'),             
                'profile_pic'=>$imagename
        	);
        	$User_data = array_filter($oldUser_data);
        	

			$this->Admin_model->update_data("tbl_users",$User_data,array('id'=>$id));
			$this->session->set_flashdata('msg', 'Updated Successfully!');
		}
		$data['page_title'] = "Users";
		$data['userData'] = $this->Admin_model->select_data('*','tbl_users',array("user_type"=>0));
		$this->template('listUsers.php',$data);
		
	}

	public function editCategory()
	{
		
	
		if (isset($_POST['catSubmit'])) {
	
		foreach ($_FILES as $key => $value) {

				if (!empty($value['name'])) {
					$upload_path = "Public/img/uploaded";
			        $image = $key;
			        $imagename = $this->file_upload($upload_path, $image); 
				}
			
          }
            $id = $this->input->post('editId');
			$oldCat_data = array(
                'categoryName'=>$this->input->post('catName'),             
                'image'=>$imagename,
                'date_created'=> date('Y-m-d H:i:s')
        	);
        	$catData = array_filter($oldCat_data);
        	

			$this->Admin_model->update_data("tbl_categories",$catData,array('id'=>$id));
			$this->session->set_flashdata('msg', 'Updated Successfully!');
		}
		$data['page_title'] = "Categories";
		$data['mainData'] = $this->Admin_model->get_data('tbl_categories');
		$this->template('listCategory.php',$data);
		
	}

	public function listServices()
	{
        $data['page_title'] = "Services";
		$data['mainData'] = $this->Admin_model->get_data('tbl_subCategoryServices');
		$this->template('listServices',$data);


	}

		public function listSubsciptions()
	{
        $data['page_title'] = "listSubsciptions";
		$data['subscriptionData'] = $this->Admin_model->get_data('tbl_subscriptionsList');
		$this->template('listSubsciptions',$data);


	}

		public function pay_providers(){
        $data['page_title'] = "Pay";
		$data['mainData'] = $this->Admin_model->selPrData();
		$this->template('providersList',$data);


	}

			public function addSubscription()
	{
		
	
		if (isset($_POST['addSubscription'])) {

			$Subscription_data = array(
                'name'=>$this->input->post('STitle'),     
                'amount'=>$this->input->post('Samount'),  
                'type'=>$this->input->post('SType'),          
                'date_created'=> date('Y-m-d H:i:s')
        	);
        	$SubscriptionData = array_filter($Subscription_data);
        	

			$this->Admin_model->insert_data("tbl_subscriptionsList",$SubscriptionData);
			$this->session->set_flashdata('msg', 'Added Successfully!');
		}
		$data['page_title'] = "addSubscriptions";
	
		$this->template('addsubscription',$data);
		
	}



		public function editService()
	{
		
	
		if (isset($_POST['subCatServiceSubmit'])) {



            $id = $this->input->post('editId');
			$oldservice_data = array(
                'ServiceTitle'=>$this->input->post('serviceTitle'),     
                'ServiceType'=>$this->input->post('selServiceType'),  
                'price'=>$this->input->post('servicePrice'),          
                'date_created'=> date('Y-m-d H:i:s')
        	);
        	$serviceData = array_filter($oldservice_data);
        	

			$this->Admin_model->update_data("tbl_subCategoryServices",$serviceData,array('id'=>$id));
			$this->session->set_flashdata('msg', 'Updated Successfully!');
		}
		$data['page_title'] = "Services";
		$data['mainData'] = $this->Admin_model->get_data('tbl_subCategoryServices');
		$this->template('listServices',$data);
		
	}

	public function payMoney(){
		if(isset($_POST['payMoney'])){
			// print_r($_POST); die;
			$wb = $this->Admin_model->select_data('balance','tbl_wallet',array('user_id'=>$_POST['editId']));
			if ($_POST['amount']<=$wb[0]->balance) {
				$nwb = $wb[0]->balance-$_POST['amount'];
				$this->Admin_model->update_data("tbl_wallet",array('balance'=>$nwb),array('user_id'=>$_POST['editId']));
			}else{
				$this->session->set_flashdata('payMoneymsg','1');
			}
		}
		redirect('Dashboard/pay_providers');
	}

	

	Public function file_upload($upload_path, $image) {                                  /* File upload function */

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
			//print_r($error);die;
			return $imagename = "";
		}
		else
		{
			$detail = $this->upload->data();
			return $imagename = $baseurl . $upload_path .'/'. $detail['file_name'];
		}
    }



    public function ajaxCall(){
	   if(isset($_POST)){

	   $catId = $_POST['catId'];
	   $data = $this->Admin_model->select_data('*','tbl_subCategory',array('category_id'=>$catId));
	   //print_r($data); die;
	   foreach($data as $dropData){
	  echo "<option value = ".$dropData->id." >".$dropData->subCategoryName."</option>"; 
	}
	  //echo $data;
	  }
    }


    public function ajaxDel(){
	  if(isset($_POST)){

	   $revid = $_POST['revid'];

	   $data = $this->Admin_model->row_delete('tbl_categories',array('id'=>$revid));
	  
	  echo $data;
	  }
	  
	}


    public function ajaxDel1(){
	  if(isset($_POST)){

	   $revid = $_POST['revid'];

	   $data = $this->Admin_model->row_delete('tbl_subCategory',array('id'=>$revid));
	  
	  echo $data;
	  }
	  
	}

    public function ajaxDel2(){
	  if(isset($_POST)){

	   $revid = $_POST['revid'];

	   $data = $this->Admin_model->row_delete('tbl_subCategoryServices',array('id'=>$revid));
	  
	  echo $data;
	  }
	  
	}
	    public function ajaxDel3(){
	  if(isset($_POST)){

	   $revid = $_POST['revid'];

	   $data = $this->Admin_model->row_delete('tbl_subscriptionsList',array('id'=>$revid));
	  
	  echo $data;
	  }
	  
	}

	    public function ajaxPay(){
	  if(isset($_POST)){

	   $payId = $_POST['payId'];
/*
	   $data = $this->Admin_model->row_delete('tbl_subCategoryServices',array('id'=>$payId));*/
	  $data =1;
	  echo $data;
	  }
	  
	}

	public function ajaxDrCall(){
	  if(isset($_POST)){

	   $val = $_POST['status'];

	   $revid = $_POST['revid'];
	   $data = $this->Admin_model->updateReviewStatus($revid,$val);
	  
	  echo $data;
	  }
	  
	}

	public function ajaxUserUpdate(){
	  if(isset($_POST)){
	  	$myid = $_POST['myid'];
	  	$dataSelect = $this->Admin_model->select_data('UserCurrStatus','tbl_users',array('id'=>$myid));

	   if($dataSelect[0]->UserCurrStatus == 0){
	   	$nwStatus = 1;
	   }else{
	   	$nwStatus = 0;
	   }

	   
	   $data = $this->Admin_model->updateUserStatus($myid,$nwStatus);
	  
	  echo $data;
	  }
	  
	}

	public function server_processing()
	{
		// print_r($_GET);die;

		$draw = $_GET['draw'];
		$conditions = array();
		$conditions['tbl_name'] = "mapp_event_report";
		$conditions['selection'] = "*";
		$conditions['order'] = $_GET['order'][0]['dir'];
		
		switch ($_GET['order'][0]['column']) {
			case 0:
				$conditions['order_by'] = 'eventid';
				break;
			case 1:
				$conditions['order_by'] = 'reportedbyid';
				break;
			case 2:
				$conditions['order_by'] = 'eventid';
				break;
			case 3:
				$conditions['order_by'] = 'eventid';
				break;
			case 4:
				$conditions['order_by'] = 'description';
				break;
			case 5:
				$conditions['order_by'] = 'status';
				break;
			case 5:
				$conditions['order_by'] = 'eventdate';
				break;
			default:
				$conditions['order_by'] = 'eventid';
				break;
		}
		
		$conditions['limit'] = $_GET['length'];
		$conditions['offset'] = $_GET['start'];
		$conditions['search'] = $_GET['search']['value'];

		// print_r($conditions['search']);die;
		$count = $this->Admin_model->select_data('count(*)','mapp_event_report');
		$table_row_count = $count[0]->count;

		$data = $this->Admin_model->select_where($conditions);
		print_r($data);die;
		if (!empty($conditions['search'])) {
			$recordsFiltered = $data['filteredRows'];
		} else {
			$recordsFiltered = $table_row_count;
		}
		for ($i=0; $i < count($data)-1; $i++) { 
			$result[$i][] = $data[$i]->id;
			$result[$i][] = $data[$i]->first_name;
			$result[$i][] = $data[$i]->end_address;
			$result[$i][] = $data[$i]->first_name;
			$result[$i][] = $data[$i]->first_name;
			$result[$i][] = $data[$i]->addedOn;
			$result[$i][] = $data[$i]->estimated_price;
		}
		$res = '{"draw":'.$draw.',
			"recordsTotal":'.$table_row_count.',
			"recordsFiltered":'.$recordsFiltered.',
			"data":'.json_encode($result).'}';
		echo "$res";
	}

	public function iosPush($pushData=null)
	{
		// Put your device token here (without spaces):
		$deviceToken = $pushData['token_id'];
		// Put your private key's passphrase here:
		$passphrase = '';
		// Put your alert message here:
		// $message = 'A push notification has been sent!';
		////////////////////////////////////////////////////////////////////////////////
		$ctx = stream_context_create();
		stream_context_set_option($ctx, 'ssl', 'local_cert', $pushData['pemPath']);
		stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
		// Open a connection to the APNS server
		if ($production) {
		    $gateway = 'gateway.push.apple.com:2195';
		} else { 
		    $gateway = 'gateway.sandbox.push.apple.com:2195';
		}
		$fp = stream_socket_client($gateway, $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
		// $fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
		// print_r($pushData);
		// var_dump($ctx);
		// var_dump($gateway);
		if (!$fp)
		exit("Failed to connect: $err $errstr" . PHP_EOL);
		// echo 'Connected to APNS' . PHP_EOL;
		// Ensure that blocking is disabled
		stream_set_blocking($fp, 0);
		// Create the payload body
		$body['aps'] = $pushData['msg'];
		// Encode the payload as JSON
		$payload = json_encode($body);
		// Build the binary notification
		$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
		// Send it to the server
		$result = fwrite($fp, $msg, strlen($msg));
			// if (!$result)
			// 	echo 'Message not delivered' . PHP_EOL;
			// else
			// 	echo 'Message successfully delivered' . PHP_EOL;
		// Close the connection to the server
		fclose($fp);
	}

	public function androidPush($pushData=null)
	{
		$API_ACCESS_KEY = $pushData['API_ACCESS_KEY'];
		$registrationIds = $pushData['token_id'];
		#API access key from Google API's Console
		// define( 'API_ACCESS_KEY', 'YOUR-SERVER-API-ACCESS-KEY-GOES-HERE' );
		// $registrationIds = $_GET['id'];
		#prep the bundle
		
		$fields = array
		(
			'to'	=> $registrationIds,
			'data'	=> $pushData['msg']
		);
		$headers = array
		(
			'Authorization: key=' . $API_ACCESS_KEY,
			'Content-Type: application/json'
		);
		#Send Reponse To FireBase Server
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
		#Echo Result Of FireBase Server
		// echo $result;
	}

	public function serviceProviders()
	{
		$data['page_title'] = "Driver on Map";
		$data['pos'] = $this->Admin_model->select_data('latitude as lat, longitude as lng',"tbl_users",array('user_type'=>2,'latitude !='=>'','longitude !='=>''));
		$this->template('serviceProviders',$data);
	}

	public function serviceProvidersMap()
	{
		$data['page_title'] = "Driver on Map";
		$data['pos'] = $this->Admin_model->select_data('latitude as lat, longitude as lng',"tbl_users",array('user_type'=>2,'latitude !='=>'','longitude !='=>''));
		$this->template('serviceProvidersMap',$data);
	}

	public function providersPosition()
	{
		$position = $this->Admin_model->select_data('*',"tbl_users",array('user_type'=>2,'latitude !='=>'','longitude !='=>''));
		echo(json_encode($position));
	}

	public function reqMap()
	{
		$data['page_title'] = "Request on Map";
		$data['pos'] = $this->Admin_model->select_data('pickup_lat as lat, pickup_long as lng',"tbl_bookingRequests",array('pickup_lat !='=>'','pickup_long !='=>''));
		$this->template('reqMap',$data);
	}

	public function pushNotification()
	{
		$data['page_title'] = "Push Notification";
		if (isset($_POST['send'])) {
					// echo "<pre>";
			if ($_POST['client']) {
			    $client = $this->Admin_model->getpusha();
				foreach ($client as $key => $value) {
					$pushData=array();
					$pushData['token_id'] = $value->token_id;
					// echo($pushData['token_id']);
					if ($value->device_id == 0) { 
						$pushData['API_ACCESS_KEY'] = "AIzaSyBaMNwomWh3o884269FmM9zYC1HdylJDco";
					    $pushData['msg'] = array(
					       'message' => $_POST['message'],
					       'title' => $_POST['title'],
					       "action" => "bulkPush",
					       'time' => date("Y-m-d H:i:s")
					    );
					   $this->androidPush($pushData);
					}
					else {
					 $pushData['pemPath'] = './certs/moveDev.pem';
					  $pushData['msg'] = array(
					     'message' => $_POST['message'],
					      'title' => $_POST['title'],
					      "action" => "bulkPush",
					      'alert' => $_POST['message'],
					  );
					  $this->iosPush($pushData);
					}
	    		}
			}
			elseif ($_POST['driver']) {
			    $data['driver'] = $this->Admin_model->getpushb();
		        foreach ($data['driver'] as $key => $value) {
		        	$pushData=array();
		        	$pushData['token_id'] = $value->token_id;
					// echo($pushData['token_id']);

					if ($value->device_id == 0) { 
						$pushData['API_ACCESS_KEY'] = "AAAAVoM4uNQ:APA91bH0qje7eQquF9p1v-w5vJUOSSxVpqFYnnYePUjldaIuOENladiyA1JrC1dRl_7asQiQlUxmelbePiOhqTHUzJiAULDFPJZYzWMHUp84an02gT3CVpTGM15DkQo6yvG_iMdqJ7Yi";
						$pushData['msg'] = array(
					    'message' => $_POST['message'],
					    'title' => $_POST['title'],
						"action" => "bulkPush",
						"time" => date("Y-m-d H:i:s")
						);
						$this->androidPush($pushData);
					}
					else {
						$pushData['pemPath'] = './certs/driverDev.pem';
						$pushData['msg'] = array(
					    'message' => $_POST['message'],
					    'title' => $_POST['title'],
						"action" => "bulkPush",
						'alert' => $_POST['message'],
						);
						$this->iosPush($pushData);
					}
			    }
			}
			elseif($_POST['all']){
				$data['all'] = $this->Admin_model->getpushall();
				foreach ($data['all'] as $key => $value) {
					$pushData=array();
					// print_r($value->user_type);
					// die();
					$pushData['token_id'] = $value->token_id;
					// echo($pushData['token_id']);

					if ($value->user_type==0) {


						if ($value->device_id == 0) { 
							$pushData['API_ACCESS_KEY'] = "AIzaSyBaMNwomWh3o884269FmM9zYC1HdylJDco";

							$pushData['msg'] = array(
							'message' => $_POST['message'],
					    	'title' => $_POST['title'],
							"action" => "bulkPush",
							'time' => date("Y-m-d H:i:s"),

							);
							$this->androidPush($pushData);
						}
						else {
							$pushData['pemPath'] = './certs/moveDev.pem';
							$pushData['msg'] = array(
							'message' => $_POST['message'],
					    	'title' => $_POST['title'],
							"action" => "bulkPush",
							'alert' => "hello",
							'sound' => 'default'
							);
							$this->iosPush($pushData);
						}
					}
					elseif($value->user_type==2) {


						if ($value->device_id == 0) { 
							$pushData['API_ACCESS_KEY'] = "AAAAVoM4uNQ:APA91bH0qje7eQquF9p1v-w5vJUOSSxVpqFYnnYePUjldaIuOENladiyA1JrC1dRl_7asQiQlUxmelbePiOhqTHUzJiAULDFPJZYzWMHUp84an02gT3CVpTGM15DkQo6yvG_iMdqJ7Yi";

							$pushData['msg'] = array(
							'message' => $_POST['message'],
					    	'title' => $_POST['title'],
							"action" => "bulkPush",
							'time' => date("Y-m-d H:i:s")
							);
							$this->androidPush($pushData);
						}
						else {
							$pushData['pemPath'] = './certs/driverDev.pem';
							$pushData['msg'] = array(
							'message' => $_POST['message'],
					    	'title' => $_POST['title'],
							"action" => "bulkPush",
							'alert' => "hello",
							'sound' => 'default'
							);
							$this->iosPush($pushData);
						}
					}
				}
			}
			// echo "</pre>";
		}
		$this->template('pushNotification');
	}

	public function membershipList()
	{
		$data['page_title'] = "Membership List";
		$data['membershipList'] = $this->Admin_model->get_data('tbl_membership');
		$this->template('membershipList',$data);
	}

	public function addMembership()
	{
		$data['page_title'] = "Add Membership";
		if (isset($_POST['membership'])) {
			// print_r($_POST);
			$isExist = $this->Admin_model->select_data('*',"tbl_membership",array('membership'=>$_POST['membership']));
			if (empty($isExist)) {
				$this->Admin_model->insert_data('tbl_membership',$_POST);
				$this->session->set_flashdata('msg','1');
			}else{
				$this->session->set_flashdata('msg','0');
			}
			
		}
		$this->template('addMembership',$data);
	}

	function editMembership()
	{
		$id = $_POST['id'];
		$membership = $_POST['membership'];
  		$validity = $_POST['validity'];
		$price = $_POST['price'];
		$isExist = $this->Admin_model->select_data('*',"tbl_membership",array('membership'=>$membership,'id !='=>$id));
		if (empty($isExist)) {
			if ( ($type==1 && $value<=100) || $type==0 ) {
				$this->Admin_model->update_data("tbl_membership",array('membership'=>$membership,'validity'=>$validity,'price'=>$price),array('id'=>$id));
				$status = 1;
			}else{
				$status = 2;
			}
		}else{
			$status = 0;
		}
		$data = $this->Admin_model->select_data('*',"tbl_membership",array('id'=>$id));

		$response = array();

        $response['data'] = $data;
	    if ( $status == 0 ) {
	        $response['status'] = 'error';
	        $response['message'] = 'Membership already Exist.';
	    }elseif ($status==2) {
	    	$response['status'] = 'error';
	        $response['message'] = 'Invalid Inputs.';
	    } else {
	        $response['status'] = 'success';
	        $response['message'] = 'Updated Successfully!';
	    }

	    echo json_encode($response);
	}

	public function promocodeList()
	{
		$data['page_title'] = "Promocodes List";
		$data['promocodeList'] = $this->Admin_model->get_data('tbl_promocodes');
		$this->template('promocodeList',$data);
	}

	public function addPromocode()
	{
		$data['page_title'] = "Add Promocode";
		if (isset($_POST['promo_code'])) {
			// print_r($_POST);
			$isExist = $this->Admin_model->select_data('*',"tbl_promocodes",array('promo_code'=>$_POST['promo_code']));
			if (empty($isExist)) {
				$this->Admin_model->insert_data('tbl_promocodes',$_POST);
				$this->session->set_flashdata('msg','1');
			}else{
				$this->session->set_flashdata('msg','0');
			}
			
		}
		$this->template('addPromocode',$data);
	}

	function editPromoCode()
	{
		$id = $_POST['id'];
		$promo_code = $_POST['promo_code'];
  		$value = $_POST['value'];
		$type = $_POST['type'];
		$isExist = $this->Admin_model->select_data('*',"tbl_promocodes",array('promo_code'=>$promo_code,'id !='=>$id));
		if (empty($isExist)) {
			if ( ($type==1 && $value<=100) || $type==0 ) {
				$this->Admin_model->update_data("tbl_promocodes",array('promo_code'=>$promo_code,'value'=>$value,'type'=>$type),array('id'=>$_POST['id']));
				$status = 1;
			}else{
				$status = 2;
			}
		}else{
			$status = 0;
		}
		$data = $this->Admin_model->select_data('*',"tbl_promocodes",array('id'=>$id));

		$response = array();

        $response['data'] = $data;
	    if ( $status == 0 ) {
	        $response['status'] = 'error';
	        $response['message'] = 'Promo Code already Exist.';
	    }elseif ($status==2) {
	    	$response['status'] = 'error';
	        $response['message'] = 'Invalid Inputs.';
	    } else {
	        $response['status'] = 'success';
	        $response['message'] = 'Updated Successfully!';
	    }

	    echo json_encode($response);
	}

	public function settings()
	{
		$data['page_title'] = "Settings";
		$data['settings'] = $this->Admin_model->get_data('tbl_settings');
		$this->template('settings',$data);
	}

	function editSettings()
	{
		$id = $_POST['id'];
		
		$update_data = array(
			'minBooking_charge'=>$_POST['minBooking_charge'],
			'driverCancellation_charge'=>$_POST['driverCancellation_charge'],
			'userCancellation_hours'=>$_POST['userCancellation_hours'],
			'admin_commission'=>$_POST['admin_commission'],
			'promoReferer_amount'=>$_POST['promoReferer_amount'],
			'promoUser_amount'=>$_POST['promoUser_amount'],
			//'wayPoint_charge'=>$_POST['wayPoint_charge']
		);

		$this->Admin_model->update_data("tbl_settings",$update_data,array('id'=>$id));

		$status =1;
		$data = $this->Admin_model->select_data('*',"tbl_settings",array('id'=>$id));

		$response = array();

        $response['data'] = $data;
	    if ( $status == 0 ) {
	        $response['status'] = 'error';
	        $response['message'] = 'Promo Code already Exist.';
	    }elseif ($status==2) {
	    	$response['status'] = 'error';
	        $response['message'] = 'Invalid Inputs.';
	    } else {
	        $response['status'] = 'success';
	        $response['message'] = 'Updated Successfully!';
	    }

	    echo json_encode($response);
	}

	public function ajaxDelUniversal()
	{
		if(isset($_POST)){

			$id = $_POST['id'];
			$tbl_name = $_POST['tbl_name'];

			$data = $this->Admin_model->row_delete($tbl_name,array('id'=>$id));

			echo $data;
		}
	}

	function test($i=null)
	{}

}
