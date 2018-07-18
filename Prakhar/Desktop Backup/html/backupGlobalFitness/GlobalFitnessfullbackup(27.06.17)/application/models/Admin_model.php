<?php

class Admin_model extends CI_Model {
	
	public function login($e){
		$query = $this->db->get_where('dbo.zFitnessAdminUsers', array('Email' => $e['email'],'Password' => $e['password'],'Is_Active'=>'1','UserRole'=>'0'));
		$result = $query->result();
		if($result){
			return $result;
		}		
	}
		
	function products_list($id = ''){
	if($id == ''){
		$query = $this->db->query("SELECT TOP 50 *  FROM [dbo].[zItemInventoryDetailAll]")
							->result();
							//print_r($this->db->last_query()); die;
		
	}	else{
		$where = "where ID = '".$id."'";
		$query = $this->db->query("SELECT TOP 50 *  FROM [dbo].[zItemInventoryDetailAll] $where")
							->result();
							//print_r($this->db->last_query()); die;
		
	}	
		return $query;
	}

    
    function products_list_strength(){
	    $kingdom="Strength";
		$query = $this->db->query("SELECT TOP 4000 *  FROM [dbo].[zItemInventoryDetailAll] where Kingdom='".$kingdom."'")
							->result();
							//print_r($this->db->last_query()); die;
		return $query;
	}

	function products_list_cardio($table){
	    // $kingdom="Cardio";

		$query = $this->db->query("SELECT TOP 4000 * FROM [dbo].[".$table."]")
							->result();
		// $query = $this->db->query("SELECT TOP 4000 * FROM [dbo].[zItemInventoryDetailAll] where Kingdom='".$kingdom."'")
							// ->result();
							//print_r($this->db->last_query()); die;
		
		return $query;
	}




	function recordall($table,$where=""){		
		$query = $this->db->query("SELECT  * FROM [dbo].[$table] $where")
							->result();
							
		return $query;
	}	


	function mpnget($where=""){		
		$query = $this->db->query("SELECT  StockKeepingUnit + ' - ' + SalesDesc AS MPNshow ,ManufacturerPartNumber as MPN FROM dbo.zItemInventoryAll $where order by MPN ASC")->result();
		
		return $query;
	}	


	function add_product(){
		unset($_POST['submitLog']);
        
        /*$_POST['Keywords']=$this->db->escape($_POST['Keywords']);
        $_POST['Description']=$this->db->escape($_POST['Description']);
        $_POST['Feature1st']=$this->db->escape($_POST['Feature1st']);
        $_POST['Feature2nd']=$this->db->escape($_POST['Feature2nd']);
        $_POST['Feature3rd']=$this->db->escape($_POST['Feature3rd']);
        $_POST['Feature4th']=$this->db->escape($_POST['Feature4th']);
        $_POST['Feature5th']=$this->db->escape($_POST['Feature5th']);
        $_POST['Feature6th']=$this->db->escape($_POST['Feature6th']);
        $_POST['Feature7th']=$this->db->escape($_POST['Feature7th']);
        $_POST['Feature8th']=$this->db->escape($_POST['Feature8th']);*/

		/*$array = $_POST;*/
		$array = array_map( 'addslashes', $_POST );
		//$array=$this->db->escape($_POST);
		
		//print_r($array);
		$this->db->insert("dbo.zProductInfoCardio",$array);
		// print_r($this->db->last_query());
	 //    die();
	}
	function add_brand(){
		unset($_POST['submitLog']);
		$this->db->insert("dbo.zFitnessBrand",$_POST);
		// print_r($this->db->last_query());
	 //    die();
	}
	function add_amps(){
		unset($_POST['submitLog']);
		$this->db->insert("dbo.zFitnessAmps",$_POST);
		// print_r($this->db->last_query());
	 //    die();
	}
	function add_class(){
		unset($_POST['submitLog']);
		$this->db->insert("dbo.zFitnessClass",$_POST);
		// print_r($this->db->last_query());
	 //    die();
	}
	function add_version(){
		unset($_POST['submitLog']);
		$this->db->insert("dbo.zFitnessVersion",$_POST);
		// print_r($this->db->last_query());
	 //    die();
	}
	function add_Availability(){
		unset($_POST['submitLog']);
		$this->db->insert("dbo.zFitnessAvailability",$_POST);
		// print_r($this->db->last_query());
	 //    die();
	}

	function add_strength_product(){
		// print_r($_POST); print_r($_FILES); die;
		unset($_POST['submitLog']);
		$array = array_map( 'addslashes', $_POST );
		$this->db->insert("dbo.zProductInfoStrength",$array);
	} 

	function alluser(){		
		$query = $this->db->select("*,(SELECT count(*)
FROM dbo.customer_user where UserRole='0' and Is_Active='1') as active, (SELECT count(*)
FROM dbo.customer_user where UserRole='0' and Is_Active='0') as deactive")
			->from("dbo.customer_user")
			->where("UserRole","0")
			->get()->result();
		return $query ;
	}

	function page_detail($status){
		$query = $this->db->select("*")->where("Type",$status)->get("dbo.custom_page")->result();
		return $query;		
	}

	function update_page(){	 
		$data= array("Content"=>$this->input->post("content"),"title"=>$this->input->post("title"),"description"=>$this->input->post("description"),"keywords"=>$this->input->post("keyword"));
		$this->db->where('Type',$this->input->post('type'));
		$this->db->update("dbo.custom_page",$data);
	}

	function register(){
		$data = array("FirstName"=>$this->input->post("first"),
					  "MiddleName"=>$this->input->post("middle"), 
					   "LastName"=>$this->input->post("last"),
						"Email"=>$this->input->post("email"),
						"Password"=>md5($this->input->post("password")),
						"Title"=>"",
						"UserName"=>$this->input->post("username"),
						"phone_number"=>$this->input->post("phone_number"),
						"UserRole"=>"0",
						"CreateDate"=>date("Y-m-d h:i:s"),
						"ModifyDate"=>date("Y-m-d h:i:s"),
						"Is_Active"=>"1");

		$this->db->insert("dbo.customer_user",$data);
		$userId = $this->db->insert_id();
		$query = $this->db->query("SELECT  * FROM [dbo].[customer_user] where ID='".$userId."'")->result();
		foreach($query as $q){
				$dat['userId']=$q->ID;
				$dat['userRole']=$q->UserRole;
				$dat['email']=$q->Email;
				$dat['title']=$q->Title;
				$dat['username']=$q->UserName;
				$dat['firstname']=$q->FirstName;
				$dat['phone_number']=$q->phone_number;
				$dat['middlename']=$q->MiddleName;
				$dat['lastname']=$q->LastName;
				break;
		}
			$this->session->set_userdata($dat);
	
	}

	function ajaxlogin(){
		$secret = '6LctiyIUAAAAAKfEWh_F9Jc--9BUjizTOvt26I9k';
		$response = $_POST['recaptcha'];
		 $rsp=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
	     $arr= json_decode($rsp,TRUE);
	       
		// echo "<pre>";
		// print_r($_POST); 
		// print_r($arr);
		// die();
		if($arr['success'] == '1'){
		//var_dump($rsp); die;
		$where = "(Email = '".$this->input->post('email')."' OR UserName = '".$this->input->post('email')."') AND Password = '".md5($this->input->post('password'))."' AND Is_Active = '1'";

		$query = $this->db->query("SELECT  * FROM [dbo].[customer_user] where $where")->result();
		// echo "<pre>";
		// print_r($query);
		// die();
		if(count($query)==0){
			echo 1;
			die();
		}
		else
		{				
			foreach($query as $q){
				$dat['userId']=$q->ID;
				$dat['userRole']=$q->UserRole;
				$dat['email']=$q->Email;
				$dat['title']=$q->Title;
				$dat['username']=$q->UserName;
				$dat['firstname']=$q->FirstName;
				$dat['phone_number']=$q->phone_number;
				$dat['middlename']=$q->MiddleName;
				$dat['lastname']=$q->LastName;
				break;
			}
			$this->session->set_userdata($dat);
		}
	  }else{
  	echo 2; die();
  	}
	}

	function page_all_detail($status){
		$query = $this->db->select("*")->where("Type",$status)->get("dbo.custom_page")->result();
		return $query;		
	}
	///////// rudra code /////////
	function check_page($name){
		if($name == 'Promo One'){
		  $table = "[dbo].[zIndexPagePromo1]";
		}
		elseif($name == 'Promo Two'){
			$table = "[dbo].[zIndexPagePromo2]";	
		}
		elseif($name == 'Promo Three'){
			$table = "[dbo].[zIndexPagePromo3]";
		}
		elseif($name == 'Promo Video'){
			$table = "[dbo].[zIndexPromoVideo]";
		}
		else{
			$table = "[dbo].[zIndexPageCarousel]";
		}
		$query = $this->db->query("SELECT  * FROM ".$table)->result();
		
		return $query;
	}
	function HomePageEntry($data)
	{
	if($data['name'] == 'Promo One' || $data['name'] == 'Promo Two' || $data['name'] == 'Promo Three'){
		if(!empty($data['SmallImage_path']) && !empty($data['MediumImage_path']) && !empty($data['LargeImage_path']) ) {
	  $mydata = array(
        'ProductBrand'=>$this->input->post('Brand'),
        'ProductName'=>$this->input->post('Name'),
        'PNLinkTitleAttribute'=>$this->input->post('title'),
        'ImageSmall'=>$data['SmallImage_path'],
        'ImageMedium'=>$data['MediumImage_path'],
        'ImageLarge'=>$data['LargeImage_path'],
        'ImageTitleAttribute'=>$this->input->post('ImageTitle'),
        'ImageAltAttribute'=>$this->input->post('AltAttribute'),
        'LinkCallToAction'=>$this->input->post('ImgLink'),
        'Hyperlink'=>$this->input->post('HyperLink'),
        'CTALinkTitleAttribute'=>$this->input->post('TitleAttribute'),
        'IsActive'=>$this->input->post('ok'),
        );
	}
	else{
		return 0;
	 }
	}
	elseif($data['name'] == 'Promo Video'){
	   $mydata = array(
        'VideoTitle'=>$this->input->post('Brand'),
        'VideoSubTitle'=>$this->input->post('Name'),
        'VideoSmall'=>$this->input->post('title'),
        'VideoMedium'=>$this->input->post('SmallImage'),
        'VideoLarge'=>$this->input->post('MediumImage'),
        'VideoLinkCallToAction'=>$this->input->post('LargeImage'),
        'VideoHyperlink'=>$this->input->post('ImageTitle'),       
        'IsActive'=>$this->input->post('ok'),
        );
	}
	else{
if(!empty($data['SmallImage_path']) && !empty($data['MediumImage_path']) && !empty($data['LargeImage_path']) ) {

	   $mydata = array(
        'CarouselTitle'=>$this->input->post('Brand'),
        'CarouselSubTitle'=>$this->input->post('Name'),
        'CarouselSubTitleAltAttribute'=>$this->input->post('title'),
        'IndexCarouselImageSmall'=>$this->input->post('SmallImage'),
        'IndexCarouselImageMedium'=>$this->input->post('MediumImage'),
        'IndexCarouselImageLarge'=>$this->input->post('LargeImage'),
        'CarouselImageTitleAtribute'=>$this->input->post('ImageTitle'),
        'CarouselImageAltAtribute'=>$this->input->post('AltAttribute'),
        'CarouselFooter'=>$this->input->post('ImgLink'),
        'CarouselHyperlink'=>$this->input->post('HyperLink'),
        'CarouselFooterTitleAttribute'=>$this->input->post('TitleAttribute'),
        'IsActive'=>$this->input->post('ok'),
        );
	}
	   else{
	   	return 0;
	   }
	}
		if($data['name'] == 'Promo One'){
		  $table = "dbo.zIndexPagePromo1";
		}
		elseif($data['name'] == 'Promo Two'){
			$table = "dbo.zIndexPagePromo2";	
		}
		elseif($data['name'] == 'Promo Three'){
			$table = "dbo.zIndexPagePromo3";
		}
		elseif($data['name'] == 'Promo Video'){
			$table = "dbo.zIndexPagePromoVideo";
		}
		else{
			$table = "dbo.zIndexPageCarousel";
		}
		$result = $this->db->insert($table,$mydata);
			
		return $result;
	}
	///////// rudra code end /////////
	function review_list($aprove){
		$query = $this->db->select("dbo.zItemInventoryDetailAll.ProductName,dbo.customer_rating.*,dbo.customer_user.FirstName,dbo.customer_user.MiddleName,dbo.customer_user.LastName,(SELECT COUNT(*) from [dbo].[review_help] where [dbo].[review_help].[review_id] = [dbo].[customer_rating].[ID]) as total, (SELECT COUNT(*) from [dbo].[review_help] where [dbo].[review_help].[review_id] = [dbo].[customer_rating].[ID] AND [dbo].[review_help].[action] = 'Yes') as totalhelp")
				->from("dbo.customer_rating")
				->join("dbo.customer_user","dbo.customer_user.ID=dbo.customer_rating.customer_id")
				->join("dbo.zItemInventoryDetailAll","dbo.zItemInventoryDetailAll.ListID=dbo.customer_rating.product_id")
				->where("dbo.customer_rating.admin_status",$aprove)
				->order_by("dbo.customer_rating.created","ASC")
				->get()->result();
		return $query;
	}

	function update_review($app){	 
		$data= array("admin_status"=>$app);
		$this->db->where('ID',$this->input->post('decline'));
		$this->db->update("dbo.customer_rating",$data);
	}

	function delete($table_name,$where){
		if(count($where)>0){
			$this->db->where($where);
		}
		$this->db->delete($table_name);
	}

	function brand_list(){		
		$query = $this->db->query("SELECT  * FROM [dbo].[zFitnessBrand] ORDER BY Name ASC")
							->result();
		return $query;
	}
	function brandversion_list(){
		$query = $this->db->select("dbo.zFitnessVersion.*,dbo.zFitnessBrand.Name as bname ")
							->from("dbo.zFitnessVersion")
							->join("dbo.zFitnessBrand","dbo.zFitnessVersion.Brand=dbo.zFitnessBrand.ID")
							->order_by("dbo.zFitnessVersion.Name","ASC")
							->get()->result();	
		return $query;
	}

	function category_list(){		
		$query = $this->db->query("SELECT  * FROM [dbo].[zFitnessCategory]")
							->result();
		return $query;
	}
	function add_category(){
		unset($_POST['submitLog']);
		$this->db->insert("dbo.zFitnessCategory",$_POST);
		// print_r($this->db->last_query());
	 //    die();
	}

/******************** Model for editing all values**************************/
	function edit_category($tbl_name){
		//print_r($_POST); die;
		unset($_POST['submitLog']);
		$this->db->where('id', $_POST['id']);
		unset($_POST['id']);
		$this->db->update($tbl_name,$_POST);
		// print_r($this->db->last_query());
	 //    die();
	}
	function edit_cardioproduct($tbl_name,$id){
		unset($_POST['updateLog']);
		$this->db->where('ID', $id);
		$this->db->update($tbl_name,$_POST);
	}



		function edit_product($tbl_name){   // if else unset imageurl
		
		unset($_POST['submitLog']);
		unset($_FILES['file']);
		
		$this->db->where('ListID', $_POST['ListID']);
		
		$this->db->update($tbl_name,$_POST);		
	}

		function updatepromo($table,$key,$id,$value){
						$this->db->where($key, $id);
		
		$result = $this->db->update($table,$_POST);
		return $result;
		}

	/************** editing all values*******************************/


	function amps_list(){		
		$query = $this->db->query("SELECT  * FROM [dbo].[zFitnessAmps]")
							->result();
		return $query;
	}
	function availability_list(){		
		$query = $this->db->query("SELECT  * FROM [dbo].[zFitnessAvailability]")
							->result();
		return $query;
	}

	function class_list(){		
		$query = $this->db->query("SELECT  * FROM [dbo].[zFitnessClass]")
							->result();
		return $query;
	}

	function add_record($table){
		unset($_POST['submitLog']);
		$this->db->insert("dbo.".$table,$_POST);
	}

	function conditionall(){
		$query = $this->db->select("dbo.zFitnessConditions.*,dbo.zFitnessWarranty.Name as wname ")
							->from("dbo.zFitnessConditions")
							->join("dbo.zFitnessWarranty","dbo.zFitnessConditions.WarrantyID=dbo.zFitnessWarranty.ID")
							->get()->result();	
		return $query;
	}

	function detailall($view,$id){
		if($view=="category"){
			$table = "zFitnessCategory";
			$where = "where ID = '".$id."'";
		}
		if($view=="brands"){
			$table = "zFitnessBrand";
			$where = "where ID = '".$id."'";
		}	
		if($view=="amps"){
			$table = "zFitnessAmps";
			$where = "where ID = '".$id."'";
		}
		if($view=="availability"){
			$table = "zFitnessAvailability";
			$where = "where ID = '".$id."'";
		}
		if($view=="class_list"){
			$table = "zFitnessClass";
			$where = "where ID = '".$id."'";
		}
		if($view=="color_list"){
			$table = "zFitnessColorCardio";
			$where = "where ID = '".$id."'";
		}
		if($view=="warranty_list"){
			$table = "zFitnessWarranty";
			$where = "where ID = '".$id."'";
		}
		if($view=="voltage_list"){
			$table = "zFitnessVoltage";
			$where = "where ID = '".$id."'";
		}
		if($view=="products"){
			$table = "zItemInventoryDetailAll";
			$where = "where ListID = '".$id."'";
		}
		if($view=="cardioproducts"){
			$table = "zProductInfoCardio";
			$where = "where ID = '".$id."'";
		}
		if($view=="promocode"){
			
  		$table="zFitnessCoupons";
			$where = "where id = '".$id."'";
		}
		if($view=="strengthproducts"){
			$table = "zProductInfoStrength";
			$where = "where ID = '".$id."'";
		}
		if($view=="version"){
			$table = "zFitnessVersion";
			$where = "where ID = '".$id."'"; 
		}
		if($view=="fitnesst_list"){
			$table = "zFitnessTrainingZone";
			$where = "where ID = '".$id."'"; 
		}
		if($view=="piece_list"){
			$table = "zFitnessPiece";
			$where = "where ID = '".$id."'"; 
		}
		if($view=="condition_list"){
			$table = "zFitnessConditions";
			$where = "where ID = '".$id."'"; 
		}
		if($view=="order_detail"){
			$table = "order_detail";
			$where = "where ID = '".$id."'"; 
		}
		if($view=="class"){
			$table = "zFitnessClass";
			$where = "where ID = '".$id."'"; 
		}	
		if($view=="class"){
			$table = "zFitnessCoupons";
			$where = "where ID = '".$id."'"; 
		}	
		$query = $this->db->query("SELECT  * FROM [dbo].[$table] $where")
							->result();
		return $query;
	}

	function calling_list($type){
		if($type=="new"){
			$status = "NULL";
		}
		else{
			$status = "NOT NULL";
		}
		$query =$this->db->query("SELECT  * FROM [dbo].[order_detail] where status  IS ".$status." ")
							->result();;
		return $query;
	}
	function change_status(){
		$data =array("status"=>"1");
		$this->db->where("ID",$this->input->post('contact_id'));
		$this->db->update("dbo.order_detail",$data);
	}

	public function check_email($email){
		$query = $this->db->get_where('dbo.customer_user', array('Email' => $email));
		$result = $query->result();
		return $result;
	
	}

	public function check_id($email){
		$query = $this->db->get_where('dbo.customer_user', array('ID' => $email));
		$result = $query->result();
		return $result;
	
	}

	function update_password_detail($id) {

        //print_r($attribute);
        $data = array(
            'Password' => md5($this->input->post('password'))
        );
		$this->db->where('ID', $id);
		$this->db->update('dbo.customer_user', $data);
      
    }
}
?>