<?php

 error_reporting(0);


class Dashboard extends CI_Controller { 
  function __construct(){
    parent::__construct();
    $this->load->model('Admin_model');
    $session_data = $this->session->userdata('logged_in');
    if(!$session_data){
      redirect('admin/login');
    }
  }

  function index(){
    $data['title']="Welcome";
    $data['users'] = $this->Admin_model->alluser();
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar'); 
    $this->load->view('control-panel');
    $this->load->view('template/admin/footer');  
  }

  function customer(){
    $data['customer_list'] = $this->Admin_model->alluser();
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('customer_list');
    $this->load->view('template/admin/footer');    
  }

  function Products(){
    $data['products_list'] = $this->Admin_model->products_list();
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('products_view');
    $this->load->view('template/admin/footer');          
    
  }
  	function PromoCode(){
    $table="zFitnessCoupons";
    $data['controller']="PromoCode";
    $data['promo_list'] = $this->Admin_model->recordall($table,$where ="");
// print_r($data);die();	
  	$this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('promocode_view');
    $this->load->view('template/admin/footer'); 

  	}

  	function AddPromoCode(){
  		
  		$table="zFitnessCoupons";
  	 $data['promo_list'] = $this->Admin_model->recordall($table,$where ="");
  	 // print_r($data);die();	
  	 if(isset($_POST['submitLogPromo'])){
  	 	unset($_POST['submitLogPromo']);
      // echo "<pre>";print_r($_POST);die();
  	 	$this->Admin_model->add_record($table);
  	 	$this->session->set_flashdata('msg','New Promo Code Created successfully.');
  	 }
  	$this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');  
    $this->load->view('add_promocode');
    $this->load->view('template/admin/footer'); 

  	}


    function editpromo($view,$id){
      $views = strtolower($view);
    $data['title'] = "Edit Promo Code";
       if(isset($_POST['submitLogPromo'])){
        unset($_POST['submitLogPromo']);
      $result = $this->Admin_model->updatepromo($table = 'zFitnessCoupons',$key ='id',$id, $value= $_POST);
      if($result ==  1){
        $this->session->set_flashdata('msg','Coupon Code Updated Successfully');
      }else{
        $this->session->set_flashdata('msg','Error Updating Coupon Code');   
      }
    }
    $data['value'] = $this->Admin_model->recordall($table='zFitnessCoupons', $where = ' where id = '.$id.'');
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('edit_promocode');
    $this->load->view('template/admin/footer');  
  

    }

   function ProductsCardio(){
    $data['controller']="ProductsCardio";
    $table = "zProductInfoCardio";
    $data['products_list'] = $this->Admin_model->products_list_cardio($table);    
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('editProducts');
    $this->load->view('template/admin/footer');          
    
  }

  function ProductsStrength(){
    $data['controller']="ProductsStrength";
    $table = "zProductInfoStrength";
    $data['products_list'] = $this->Admin_model->products_list_cardio($table);
    $data['type']="Strength";
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('editProducts');
    $this->load->view('template/admin/footer');          
    
  }



  //  function addProduct(){
  //   if(isset($_POST['submitLog'])){
  //      $this->Admin_model->add_product();
  //     $this->session->set_flashdata('success', 'New Product Created successfully.');
  //       redirect("/Dashboard/Products"); 
  //   }
  //   $this->load->view('template/admin/header');
  //   $this->load->view('dashboard_header_view');
  //   $this->load->view('left-sidebar');    
  //   $this->load->view('add_product');
  //   $this->load->view('template/admin/footer');  
  // }

  function cardioproduct(){
    if(isset($_POST['submitLog'])){         
      if(isset($_FILES['file'])){
        $where2 = "WHERE ID='".$_POST['CategoryID']."'";
        $dir_name =  $this->Admin_model->recordall('zFitnessCategory',$where2);
        $dir_name = $dir_name[0]->Name;
        if(!file_exists("./$dir_name")){
          mkdir("./$dir_name", 7777);
          // mkdir("./$dir_name");  
        }
        $filename = "";
        $config['upload_path'] = "./$dir_name";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '286449800000';
        $config['max_width']  = '10000';
        $config['max_height']  = '111111';
        $config['file_name']  = $_FILES['file']['name'];
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file'))
        { 
          $error = array('error' => $this->upload->display_errors());
        }
        else
        {
          $pp =  $this->upload->data();
          $filename = $pp['file_name'];
        }
      }
      else
      {
        $filename = "";
      } 
      $this->Admin_model->add_product();
      $this->session->set_flashdata('msg','New Cardio Product Created successfully.');
        redirect("/Dashboard/Products"); 
    }
    $data['title'] = "Add Cardio Product";
    $where = "WHERE ClassID=9";
    $data['Amps'] = $this->Admin_model->recordall('zFitnessAmps');
    $data['Brand'] = $this->Admin_model->brand_list();
    $data['category'] = $this->Admin_model->recordall('zFitnessCategory',$where);
     $where = "WHERE (Kingdom = 'cardio')";
    $data['mpn'] = $this->Admin_model->mpnget($where);
    $data['voltage'] = $this->Admin_model->recordall('zFitnessVoltage');
    // echo "<pre>";
    // print_r($data['category']); 
    // die();
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('add_cardio_product');
    $this->load->view('template/admin/footer');  
  }
     function editproduct($view,$id){

      if($view == 'cardioproducts'){
        $data['title'] = "Edit Cardio Product";
        $data['Amps'] = $this->Admin_model->recordall('zFitnessAmps');
        $where = "WHERE (Kingdom = 'cardio')";
        $data['mpn'] = $this->Admin_model->mpnget($where);  
        $where = "WHERE ClassID=9";
      }
      if($view == 'strengthproducts'){        
        $data['title'] = "Edit Strength Product";  
        $where = "WHERE Kingdom=2";
        $data['piece'] = $this->Admin_model->recordall('zFitnessPiece');
        $where = "WHERE (Kingdom = 'strength')";
        $data['mpn'] = $this->Admin_model->mpnget($where);  
      	$where = "WHERE ClassID<>9";
      }
    if(isset($_POST['updateLog']) and $view == 'cardioproducts'){       
      $table = "dbo.zProductInfoCardio";
      $this->Admin_model->edit_cardioproduct($table,$id);
      $this->session->set_flashdata('msg',' Cardio Product Updated successfully.');
        // redirect("/Dashboard/Products"); 
    }
    if(isset($_POST['updateLog']) and $view == 'strengthproducts'){
       $table = "dbo.zProductInfoStrength";
       unset($_POST['AmpsID']);
      $this->Admin_model->edit_cardioproduct($table,$id);
      $this->session->set_flashdata('msg',' Strength Product Updated successfully.');
       }

    $data['category'] = $this->Admin_model->recordall('zFitnessCategory',$where);
    $data['category_list'] = $this->Admin_model->detailall($view,$id);
    $data['Brand'] = $this->Admin_model->brand_list(); 
    $data['voltage'] = $this->Admin_model->recordall('zFitnessVoltage');
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('edit_cardio_products');
    $this->load->view('template/admin/footer');  
  }
 




  function strengthproduct(){
    if(isset($_POST['submitLog'])){
    	// echo "<pre>";
    	// print_r($_POST);
    	// echo "</pre>";
    	// die();
      if(isset($_FILES['file'])){
        $where2 = "WHERE ID='".$_POST['CategoryID']."'";
        $dir_name =  $this->Admin_model->recordall('zFitnessCategory',$where2);
        $dir_name = $dir_name[0]->Name;
        $filename = "";
        if (!file_exists("./$dir_name")){
          mkdir("./$dir_name", 7777);
          // mkdir("./$dir_name");  
        }
        //print_r($dir_name); die;
        $config['upload_path'] = "./$dir_name";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '286449800000';
        $config['max_width']  = '10000';
        $config['max_height']  = '111111';
        $config['file_name']  = $_FILES['file']['name'];
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file'))
        { 
          $error = array('error' => $this->upload->display_errors());
        }
        else
        {
          $pp =  $this->upload->data();
          $filename = $pp['file_name'];
        }
      }
      else{
        $filename = "";
      } 
      $this->Admin_model->add_strength_product();
      $this->session->set_flashdata('msg','New Strength Product Created successfully.');
        redirect("/Dashboard/Products"); 
    }
    $data['title'] = "Add Strength Product";

    $where = " WHERE Kingdom = 2 ";
    $data['Piece'] = $this->Admin_model->recordall('zFitnessPiece',$where);
     
    $data['tz'] = $this->Admin_model->recordall('zFitnessTrainingZone');
  
    $data['Amps'] = $this->Admin_model->recordall('zFitnessAmps');
    $data['Brand'] = $this->Admin_model->brand_list();


    $where = "WHERE LTRIM(RTRIM(ClassID))<>9";
   
    $data['category'] = $this->Admin_model->recordall('zFitnessCategory',$where);
    
    $where = "WHERE (Kingdom = 'Strength')";
    $data['mpn'] = $this->Admin_model->mpnget($where);

    // echo "<pre>";
    // print_r($data['mpn']);
    // die();

    $data['voltage'] = $this->Admin_model->recordall('zFitnessVoltage');

    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('add_strength_product');
    $this->load->view('template/admin/footer');  
  }

        function editproducts($type,$view,$id){ 
         
            $data['type'] = $type;
            if(isset($_POST['submitLog'])){  
                      if(isset($_FILES['file'])){
                          $where2 = "WHERE Name='".$_POST['CategoryName']."'";
                          $dir_name =  $this->Admin_model->recordall('zFitnessCategory',$where2);
                          $dir_name = $dir_name[0]->Name;
                          $filename = "";
                          if (!file_exists("./$dir_name")){
                            mkdir("./$dir_name", 7777);
                            // mkdir("./$dir_name");  
                          }
                         // print_r($dir_name);
                          $config['upload_path'] = "./$dir_name";
                          $config['allowed_types'] = 'gif|jpg|png';
                          $config['max_size'] = '286449800000';
                          $config['max_width']  = '10000';
                          $config['max_height']  = '111111';
                          $config['file_name']  = $_FILES['file']['name'];
                          $this->load->library('upload', $config);
                          if ( ! $this->upload->do_upload('file'))
                          { 
                            $error = array('error' => $this->upload->display_errors());
                          }
                          else
                          {
                            $pp =  $this->upload->data();
                            $filename = $pp['file_name'];
                          }
                        }
                        else{
                          $filename = "";
                        } 

              $this->Admin_model->edit_product("dbo.zItemInventoryDetailAll");
              $this->session->set_flashdata('msg','Product Updated successfully.');
                // redirect("/Dashboard/editcategory"); 
            }
           $data['category_list'] = $this->Admin_model->detailall($view,$id);
           $where = "WHERE ClassID='9' OR ClassID='3'";
            $data['Amps'] = $this->Admin_model->recordall('zFitnessAmps');
            $data['Brand'] = $this->Admin_model->brand_list();
            $data['category'] = $this->Admin_model->recordall('zFitnessCategory',$where);
            $data['condition'] = $this->Admin_model->recordall('zFitnessConditions');
            $data['warranty'] = $this->Admin_model->recordall('zFitnessWarranty');
            $data['mpn'] = $this->Admin_model->recordall('zCardioMPN');
            $data['voltage'] = $this->Admin_model->recordall('zFitnessVoltage');
            $data['version'] = $this->Admin_model->recordall('zFitnessVersion');
            $data['piece'] = $this->Admin_model->recordall('zFitnessPiece');
            $data['class'] = $this->Admin_model->recordall('zFitnessClass');
              //print_r($data['condition']); die;
            $data['title'] = "Edit Product";   
            $this->load->view('template/admin/header',$data);
            $this->load->view('dashboard_header_view');
            $this->load->view('left-sidebar');    
            $this->load->view('edit_products');
            $this->load->view('template/admin/footer');  
          }



  function about_us(){
    if(isset($_POST['type'])){
      $this->Admin_model->update_page();
      $this->session->set_flashdata('msg', 'Updated Successfully');
    }
    $data['result'] =  $this->Admin_model->page_detail("About");
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');      
    $this->load->view('page/about');
    $this->load->view('template/admin/footer'); 
  }

  function privacy(){
    if(isset($_POST['type'])){
      $this->Admin_model->update_page();
      $this->session->set_flashdata('msg', 'Updated Successfully');
    }
    $data['result'] =  $this->Admin_model->page_detail("Privacy");
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');      
    $this->load->view('page/privacy');
      $this->load->view('template/admin/footer'); 
  }

  function term(){
    if(isset($_POST['type'])){
      $this->Admin_model->update_page();
      $this->session->set_flashdata('msg', 'Updated Successfully');
    }
    $data['result'] =  $this->Admin_model->page_detail("Term");
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');      
    $this->load->view('page/term');
      $this->load->view('template/admin/footer'); 
  }

  function shop($name){
    if(isset($_POST['type'])){
      $this->Admin_model->update_page();
      $this->session->set_flashdata('msg', 'Updated Successfully');
    }
    $data['result'] =  $this->Admin_model->page_all_detail($name);
    $data['name'] = $name;
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');      
    $this->load->view('page/custom');
    $this->load->view('template/admin/footer'); 
  }  

  ///////// rudra code ///////////
  
function HomePage($name)
{
  $data['name'] = $name;
  if (isset($_POST['submit'])) {
    $counter = 1;

/*$perms = base_convert(fileperms("./images-fitness-equipment-sale"), 10, 8);
$perms = substr($perms, (strlen($perms) - 3));
echo $perms."wewe";
die;*/
         $filename = "";
        $config['upload_path'] = "images-fitness-equipment-sale";
        $config['allowed_types'] = '*';
        $config['max_size'] = 300000;
        $config['max_width'] = 1920;
        $config['max_height'] = 1280;
        $this->load->library('upload', $config);
        $file_directory = dirname("images-fitness-equipment-sale");
        //$mydata = is_writable($file_directory);

        // print_r($mydata);
        // echo "<pre>";
        // var_dump($mydata);
        // die();
    if (isset($_FILES['SmallImage']) && !empty($_FILES['SmallImage']['name'])) {
      $config['file_name'] = $_FILES['SmallImage']['name'];

        $imageSize = getimagesize($_FILES['SmallImage']['tmp_name']);
        $width = $imageSize[0];
        $height = $imageSize[1];
        if ($data['name'] == 'Promo One' || $data['name'] == 'Promo Two' || $data['name'] == 'Promo Three' || $data['name'] == 'Promo Video') {
          $fixed_width = 320;
          $fixed_height = 180;
        }
        else {
          $fixed_width = 480;
          $fixed_height = 320;
        }
        if ($width == $fixed_width && $height == $fixed_height) {
          $pp = $this->upload->data();
          $data['filename'] = $pp['file_name'];
          $data['SmallImage_path'] = 'images-fitness-equipment-sale/' . $config['file_name'];
          
          $this->upload->do_upload('SmallImage');
          $counter++;



        }
        else {
          $this->session->set_flashdata('msg', 'Please Upload SmallImage with Correct Size');
        }
    }
    if (isset($_FILES['MediumImage']) && !empty($_FILES['MediumImage']['name'])) {
      $config['file_name'] = $_FILES['MediumImage']['name'];
      
        $imageSize = getimagesize($_FILES['MediumImage']['tmp_name']);
        $width = $imageSize[0];
        $height = $imageSize[1];
        if ($data['name'] == 'Promo One' || $data['name'] == 'Promo Two' || $data['name'] == 'Promo Three' || $data['name'] == 'Promo Video') {
          $fixed_width = 480;
          $fixed_height = 270;
        }
        else {
          $fixed_width = 960;
          $fixed_height = 640;
        }
        if ($width == $fixed_width && $height == $fixed_height) {
          $pp = $this->upload->data();
          $data['filename'] = $pp['file_name'];
          $data['MediumImage_path'] = 'images-fitness-equipment-sale/' . $config['file_name'];
           $this->upload->do_upload('MediumImage');
           $counter++;
        }
        else {
          $this->session->set_flashdata('msg', 'Please Upload  MediumImage Image with Correct Size');
        }
    }
    if (isset($_FILES['LargeImage']) && !empty($_FILES['LargeImage']['name'])) {

      $_FILES['LargeImage']['name'];
      $imageSize = getimagesize($_FILES['LargeImage']['tmp_name']);
        
         $width = $imageSize[0];
         $height = $imageSize[1];


      $config['file_name'] = $_FILES['LargeImage']['name'];
      
        $imageSize = getimagesize($_FILES['LargeImage']['tmp_name']);
        $width = $imageSize[0];
        $height = $imageSize[1];
        if ($data['name'] == 'Promo One' || $data['name'] == 'Promo Two' || $data['name'] == 'Promo Three' || $data['name'] == 'Promo Video') {
          $fixed_width = 657;
          $fixed_height = 370;
        }
        else {
          $fixed_width = 1920;
          $fixed_height = 1280;
        }
        if ($width == $fixed_width && $height == $fixed_height) {
          $pp = $this->upload->data();
          $data['LargeImage'] = $pp['file_name'];
          $data['LargeImage_path'] = 'images-fitness-equipment-sale/' . $config['file_name'];
          $this->upload->do_upload('LargeImage');
          $counter++;
        }
        else {
          $this->session->set_flashdata('msg', 'Please Upload LargeImage Image with Correct Size');
        }
    }

if($counter>=4){
    $value = $this->Admin_model->HomePageEntry($data);
    if ($value != 0) {
      $this->session->set_flashdata('msg', 'Inserted Successfully');
    }
    else {
     // $this->session->set_flashdata('msg', 'Please Upload Image with Correct Size');
    }
  
}
  }
  $this->load->view('template/admin/header', $data);
  $this->load->view('dashboard_header_view');
  $this->load->view('left-sidebar');

  if ($data['name'] == 'Promo Video') {
    $this->load->view('page/VideoForm');
  }
  elseif ($data['name'] == 'Slider Image') {
    $this->load->view('page/ImageForm');
  }
  else {
    $this->load->view('page/homepage');
  }

  $this->load->view('template/admin/footer');
}




function ViewHomePage($name)
  {
  $data['name'] = $name;
  $data['result'] = $this->Admin_model->check_page($name);
  $this->load->view('template/admin/header', $data);
  $this->load->view('dashboard_header_view');
  $this->load->view('left-sidebar');
  if ($data['name'] == 'Promo Video')
    {
    $this->load->view('page/ViewVideoForm');
    }
  elseif ($data['name'] == 'Slider Images')
    {
    $this->load->view('page/ViewImageForm');
    }
    else
    {
    $this->load->view('page/ViewHomePage');
    }

  $this->load->view('template/admin/footer');
  }
 public function testing(){

 libxml_disable_entity_loader(false);
    $client = new SoapClient('http://my.yrc.com/myyrc-api/national/WebServices/YRCZipFinder_V2.wsdl', array("trace" => 1, "exception" => true));
    // $params = array();
    // $params['zipCode'] = "44720";
    // $params['country'] = "USA";

     $xml = '
     <soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:yrc="http://my.yrc.com/national/WebServices/YRCZipFinder_V2.wsdl">
   <soapenv:Header></soapenv:Header>
   <soapenv:Body>
      <yrc:lookupCity soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
         <lookupCityRequest xsi:type="yrc:YRCLookupCityRequestV2" xmlns:yrc="http://my.yrc.com/national/WebServices/YRCZipFinderMessages_V2.xsd">
            <zipCode xsi:type="xsd:string">44720</zipCode>
            <country xsi:type="yrc1:YRCCountryCode" xmlns:yrc1="http://my.yrc.com/national/WebServices/YRCCommonTypes_V2.xsd">USA</country>
         </lookupCityRequest>
      </yrc:lookupCity>
   </soapenv:Body>
</soapenv:Envelope>';
// $pc = new PostcodeRequest('SW1A 1AA');
// $postCodeRequest = new SoapVar($pc, SOAP_ENC_OBJECT, 'yrc1:YRCCountryCode', 'http://my.yrc.com/national/WebServices/YRCCommonTypes_V2.xsd');
// $dom->loadXML($xml);
$soapBody = new \SoapVar($xml,SOAP_ENC_OBJECT);
    // print_r($client);die;
    // $response = $client->lookupCity($soapBody);
$client = $client;
// $this->logger = $logger;
header('Content-type:text/xml');
    $response = $client->__SoapCall('lookupCity', array($soapBody));
    // echo "REQUEST:\n" . $client->__getLastRequest() . "\n";
    // $this->logger->debug('Sent SOAP Request XML: ' . $this->getLastRequestXml());
  //  return($response);
echo  '<pre>';print_r($response);

    
  }

function UpdateValues()
{
  if (isset($_POST['id'])) {
    $data = array(
      'id' => $this->input->post('id') ,
      'table' => $this->input->post('table') ,
    );
    if ($data['table'] == 'Promo One') {
      $table = 'dbo.zIndexPagePromo1';
    }
    elseif ($data['table'] == 'Promo Two') {
      $table = 'dbo.zIndexPagePromo2';
    }
    elseif ($data['table'] == 'Promo Three') {
      $table = 'dbo.zIndexPagePromo3';
    }
    elseif ($data['table'] == 'Promo Video') {
      $table = 'dbo.zIndexPromoVideo';
    }
    else {
      $table = 'dbo.zIndexPageCarousel';
    }

    $query = $this->db->query("SELECT  * FROM " . $table . " where id =" . $data['id'])->result();
    if ($query[0]->IsActive == 0) {
      $iSactive = 1;
    }
    else {
      $iSactive = 0;
    }

    $mydata = array(
      "IsActive" => $iSactive
    );
    if ($data['table'] == 'Promo One' || $data['table'] == 'Promo Two' || $data['table'] == 'Promo Three' || $data['table'] == 'Promo Video') {
      $this->db->where('id', $data['id']);
      $updateQuery = $this->db->update($table, $mydata);
      $mysql = $this->db->query("UPDATE " . $table . " SET IsActive = '0' WHERE id !=" . $data['id']);
      if ($iSactive == 1) {
        echo "one";
      }
      else {    
        echo "two";
      }
    }

    if ($data['table'] == 'Slider Images') {
      $query = $this->db->query("SELECT  * FROM " . $table . " where IsActive='1' ")->num_rows();
      if ($query >= 3) {
        if ($iSactive == 1) {
          echo "three";
        }
        else {
          $this->db->where('id', $data['id']);
          $updateQuery = $this->db->update($table, $mydata);
          if ($iSactive == 1) {
            echo "yellow";
          }
          else {
            echo "red";
          }
        }
      }
      else {
        $this->db->where('id', $data['id']);
        $updateQuery = $this->db->update($table, $mydata);
        if ($iSactive == 1) {
          echo "active";
        }
        else {
          echo "deactive";
        }
      }
    }
  }
}
    //////////rudra code end //////////

   function about($name){
    if(isset($_POST['type'])){
      $this->Admin_model->update_page();
      $this->session->set_flashdata('msg', 'Updated Successfully');
    }
    $data['result'] =  $this->Admin_model->page_all_detail($name);
    $data['name'] = $name;
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');      
    $this->load->view('page/custom');
    $this->load->view('template/admin/footer'); 
  } 

  function support($name){
    if(isset($_POST['type'])){
      $this->Admin_model->update_page();
      $this->session->set_flashdata('msg', 'Updated Successfully');
    }
    $data['result'] =  $this->Admin_model->page_all_detail($name);
    $data['name'] = $name;
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');      
    $this->load->view('page/custom');
    $this->load->view('template/admin/footer'); 
  } 

  function contactwithus($name){
    if(isset($_POST['type'])){
      $this->Admin_model->update_page();
      $this->session->set_flashdata('msg', 'Updated Successfully');
    }
    $data['result'] =  $this->Admin_model->page_all_detail($name);
    $data['name'] = $name;
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');      
    $this->load->view('page/link');
    $this->load->view('template/admin/footer'); 
  }

  function approved(){
    if(isset($_POST['decline'])){
      $this->Admin_model->update_review(0);
      $this->session->set_flashdata('msg', 'Successfully Updated Review');

    }
    if(isset($_POST['delete'])){
      $where = array("ID"=>$_POST['delete']);
      $this->Admin_model->delete("customer_rating",$where);
      $this->session->set_flashdata('msg', 'Deleted Successfully');
    }
    $data['status']=1;
    $data['review'] = $this->Admin_model->review_list(1);
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('review_list');
    $this->load->view('template/admin/footer');
  }
  function unaprove(){
    if(isset($_POST['decline'])){
      $this->Admin_model->update_review(1);
      $this->session->set_flashdata('msg', 'Successfully Updated Review');
    }
    if(isset($_POST['delete'])){
      $where = array("ID"=>$_POST['delete']);
      $this->Admin_model->delete("customer_rating",$where);
      $this->session->set_flashdata('msg', 'Deleted Successfully');
    }
    $data['status']= 0;
    $data['review'] = $this->Admin_model->review_list(0);
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('review_list');
    $this->load->view('template/admin/footer');
  }

/*************************** start***Brand list,add,edit*************/
  function brands(){
    if(isset($_POST['delete'])){
      $where = array("ID"=>$_POST['delete']);
      $this->Admin_model->delete("zFitnessBrand",$where);
      $this->session->set_flashdata('msg', 'Deleted Successfully');
    }
    $data['brand_list'] = $this->Admin_model->brand_list();
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('brands_list');
    $this->load->view('template/admin/footer');          
    
  }

   function addbrand(){
    if(isset($_POST['submitLog'])){         
      $this->Admin_model->add_brand();
      $this->session->set_flashdata('msg','New Brand Created successfully.');
        redirect("/Dashboard/brands"); 
    }
    $data['title'] = "Add New Brand";    
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('add_brand');
    $this->load->view('template/admin/footer');  
  }

  function editbrand($view,$id){ 
 
    if(isset($_POST['submitLog'])){  
      $this->Admin_model->edit_category("dbo.zFitnessBrand");
      $this->session->set_flashdata('msg','Brand Updated successfully.');
        // redirect("/Dashboard/editcategory"); 
    }
    $data['category_list'] = $this->Admin_model->detailall($view,$id);
    // print_r($data['category_list']); die;
    $data['title'] = "Edit Brand";   
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('edit_brand');
    $this->load->view('template/admin/footer');  
  }

  /*************END*****************Brand list,add,edit*************/

  /********START********** add, edit, list VERSION ******/
  function version(){
    if(isset($_POST['delete'])){
      $where = array("ID"=>$_POST['delete']);
      $this->Admin_model->delete("zFitnessVersion",$where);
      $this->session->set_flashdata('msg', 'Deleted Successfully');
    }
    $data['brandversion_list'] = $this->Admin_model->brandversion_list();
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('version_list');
    $this->load->view('template/admin/footer');          
    
  }
   function addversion(){
    if(isset($_POST['submitLog'])){  
      $this->Admin_model->add_version();
      $this->session->set_flashdata('msg','New Brand Version Created successfully.');
        redirect("/Dashboard/addversion"); 
    }
    $data['title'] = "Add New Brand Version"; 
    $data['brand_list'] = $this->Admin_model->brand_list();   
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('add_brandversion');
    $this->load->view('template/admin/footer');  
  }

  function editversion($view,$id){ 
 
    if(isset($_POST['submitLog'])){  
      $this->Admin_model->edit_category("dbo.zFitnessVersion");
      $this->session->set_flashdata('msg','Version Updated successfully.');
        // redirect("/Dashboard/editcategory"); 
    }
    $data['category_list'] = $this->Admin_model->detailall($view,$id);
     $data['brand_list'] = $this->Admin_model->brand_list();   
    // print_r($data['category_list']); die;
    $data['title'] = "Edit Version";   
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('edit_version');
    $this->load->view('template/admin/footer');  
  }

/************END****** add, edit, list VERSION ******/


  /* category list, add, edit ****************************************************************/

   function category(){
    if(isset($_POST['delete'])){
      $where = array("ID"=>$_POST['delete']);
      $this->Admin_model->delete("zFitnessCategory",$where);
      $this->session->set_flashdata('msg', 'Deleted Successfully');
    }
    $data['category_list'] = $this->Admin_model->category_list();
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('category_list');
    $this->load->view('template/admin/footer');          
    
  }

  function addcategory(){
    if(isset($_POST['submitLog'])){  
    	
      $this->Admin_model->add_category();
      $this->session->set_flashdata('msg','New Category Created successfully.');
        redirect("/Dashboard/category"); 
    }
    $data['title'] = "Add New Category";   
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('add_category');
    $this->load->view('template/admin/footer');  
  }
    function viewcategory($view,$id){ 
 
    if(isset($_POST['submitLog'])){  
      $this->Admin_model->edit_category("dbo.zFitnessCategory");
      $this->session->set_flashdata('msg','Category Updated successfully.');
        // redirect("/Dashboard/editcategory"); 
    }
    $data['category_list'] = $this->Admin_model->detailall($view,$id);
    // print_r($data['category_list']); die;
    $data['title'] = "Edit Category";   
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('view_category');
    $this->load->view('template/admin/footer');  
  }

  function editcategory($view,$id){ 
 
    if(isset($_POST['submitLog'])){  
      $this->Admin_model->edit_category("dbo.zFitnessCategory");
      $this->session->set_flashdata('msg','Category Updated successfully.');
        // redirect("/Dashboard/editcategory"); 
    }
    $data['category_list'] = $this->Admin_model->detailall($view,$id);
    // print_r($data['category_list']); die;
    $data['title'] = "Edit Category";   
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('edit_category');
    $this->load->view('template/admin/footer');  
  }

/* category list, add, edit **************************************************************************/



   function amps(){
    if(isset($_POST['delete'])){
      $where = array("ID"=>$_POST['delete']);
      $this->Admin_model->delete("zFitnessAmps",$where);
      $this->session->set_flashdata('msg', 'Deleted Successfully');
    }
    $data['brand_list'] = $this->Admin_model->amps_list();
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/amps_list');
    $this->load->view('template/admin/footer');             
  }

  function addamps(){
    if(isset($_POST['submitLog'])){         
      $this->Admin_model->add_amps(); 
      $this->session->set_flashdata('msg','New Amps Created successfully.');
        redirect("/Dashboard/amps"); 
    }
    $data['title'] = "Add New Brand";    
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/add_amps');
    $this->load->view('template/admin/footer');  
  } 

function editamps($view,$id){ 
 
    if(isset($_POST['submitLog'])){  
      $this->Admin_model->edit_category("dbo.zFitnessAmps");
      $this->session->set_flashdata('msg','Amps Updated successfully.');
        // redirect("/Dashboard/editcategory"); 
    }
    $data['category_list'] = $this->Admin_model->detailall($view,$id);
    // print_r($data['category_list']); die;
    $data['title'] = "Edit Amps";   
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/edit_amps');
    $this->load->view('template/admin/footer');  
  }



  function availability(){
    if(isset($_POST['delete'])){
      $where = array("ID"=>$_POST['delete']);
      $this->Admin_model->delete("zFitnessAvailability",$where);
      $this->session->set_flashdata('msg', 'Deleted Successfully');
    }
    $data['brand_list'] = $this->Admin_model->availability_list();
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/aty_list');
    $this->load->view('template/admin/footer');             
  }

  function addavailability(){
    if(isset($_POST['submitLog'])){         
      $this->Admin_model->add_Availability(); 
      $this->session->set_flashdata('msg','New Availability Created successfully.');
        redirect("/Dashboard/availability"); 
    }
    $data['title'] = "Add New Brand";    
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/add_aty');
    $this->load->view('template/admin/footer');  
  } 


function editavailability($view,$id){ 
 
    if(isset($_POST['submitLog'])){  
      $this->Admin_model->edit_category("dbo.zFitnessAvailability");
      $this->session->set_flashdata('msg','Availability Updated successfully.');
        // redirect("/Dashboard/editcategory"); 
    }
    $data['category_list'] = $this->Admin_model->detailall($view,$id);
    // print_r($data['category_list']); die;
    $data['title'] = "Edit Availability";   
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/edit_aty');
    $this->load->view('template/admin/footer');  
  }




  function class_list(){
    if(isset($_POST['delete'])){
      $where = array("ID"=>$_POST['delete']);
      $this->Admin_model->delete("zFitnessClass",$where);
      $this->session->set_flashdata('msg', 'Deleted Successfully');
    }
    $data['brand_list'] = $this->Admin_model->class_list();
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/class_list');
    $this->load->view('template/admin/footer');             
  }
   function addclass(){
    if(isset($_POST['submitLog'])){         
      $this->Admin_model->add_class(); 
      $this->session->set_flashdata('msg','New Class Created successfully.');
        redirect("/Dashboard/class_list"); 
    }
    $data['title'] = "Add New Class";    
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/add_class');
    $this->load->view('template/admin/footer');  
  } 
function editclass($view,$id){ 
 
    if(isset($_POST['submitLog'])){  
      $this->Admin_model->edit_category("dbo.zFitnessClass");
      $this->session->set_flashdata('msg','Class Updated successfully.');
        // redirect("/Dashboard/editcategory"); 
    }
    $data['category_list'] = $this->Admin_model->detailall($view,$id);
    // print_r($data['category_list']); die;
    $data['title'] = "Edit Class";   
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/edit_class');
    $this->load->view('template/admin/footer');  
  }




  function color_list(){
    if(isset($_POST['delete'])){
      $where = array("ID"=>$_POST['delete']);
      $this->Admin_model->delete("zFitnessColorCardio",$where);
      $this->session->set_flashdata('msg', 'Deleted Successfully');
    }
    $data['brand_list'] = $this->Admin_model->recordall("zFitnessColorCardio");
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/color_list');
    $this->load->view('template/admin/footer');             
  }
   function addcolor(){
    if(isset($_POST['submitLog'])){ 
      $this->Admin_model->add_record("zFitnessColorCardio"); 
      $this->session->set_flashdata('msg','New ColorCardio Created successfully.');
        redirect("/Dashboard/color_list"); 
    }
    $data['title'] = "Add New ColorCardio";    
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/addcolor');
    $this->load->view('template/admin/footer');  
  } 
function editcolor($view,$id){ 
 
    if(isset($_POST['submitLog'])){  
      $this->Admin_model->edit_category("dbo.zFitnessColorCardio");
      $this->session->set_flashdata('msg','Color Updated successfully.');
        // redirect("/Dashboard/editcategory"); 
    }
    $data['category_list'] = $this->Admin_model->detailall($view,$id);
    // print_r($data['category_list']); die;
    $data['title'] = "Edit Color";   
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/edit_color');
    $this->load->view('template/admin/footer');  
  }





  function warranty_list(){
    if(isset($_POST['delete'])){
      $where = array("ID"=>$_POST['delete']);
      $this->Admin_model->delete("zFitnessWarranty",$where);
      $this->session->set_flashdata('msg', 'Deleted Successfully');
    }
    $data['brand_list'] = $this->Admin_model->recordall("zFitnessWarranty");
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/warranty_list');
    $this->load->view('template/admin/footer');             
  }
   function addwarrenty(){
    if(isset($_POST['submitLog'])){ 
      $this->Admin_model->add_record("zFitnessWarranty"); 
      $this->session->set_flashdata('msg','New Warrenty Created successfully.');
        redirect("/Dashboard/warranty_list"); 
    }
    $data['title'] = "Add New ColorCardio";    
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/addwaranty');
    $this->load->view('template/admin/footer');  
  }
function editwarranty($view,$id){ 
 
    if(isset($_POST['submitLog'])){  
      $this->Admin_model->edit_category("dbo.zFitnessWarranty");
      $this->session->set_flashdata('msg','Warranty Updated successfully.');
        // redirect("/Dashboard/editcategory"); 
    }
    $data['category_list'] = $this->Admin_model->detailall($view,$id);
    // print_r($data['category_list']); die;
    $data['title'] = "Edit Warranty";   
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/edit_warranty');
    $this->load->view('template/admin/footer');  
  }





  function voltage_list(){
    if(isset($_POST['delete'])){
      $where = array("ID"=>$_POST['delete']);
      $this->Admin_model->delete("zFitnessVoltage",$where);
      $this->session->set_flashdata('msg', 'Deleted Successfully');
    }
    $data['brand_list'] = $this->Admin_model->recordall("zFitnessVoltage");
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/voltage_list');
    $this->load->view('template/admin/footer');             
  }
   function addvoltage(){
    if(isset($_POST['submitLog'])){ 
      $this->Admin_model->add_record("zFitnessVoltage"); 
      $this->session->set_flashdata('msg','New Voltage Created successfully.');
        redirect("/Dashboard/voltage_list"); 
    }
    $data['title'] = "Add New Voltage";    
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/addvoltage');
    $this->load->view('template/admin/footer');  
  }
function editvoltage($view,$id){ 
 
    if(isset($_POST['submitLog'])){  
      $this->Admin_model->edit_category("dbo.zFitnessVoltage");
      $this->session->set_flashdata('msg','Voltage Updated successfully.');
        // redirect("/Dashboard/editcategory"); 
    }
    $data['category_list'] = $this->Admin_model->detailall($view,$id);
    // print_r($data['category_list']); die;
    $data['title'] = "Edit voltage";   
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/edit_voltage');
    $this->load->view('template/admin/footer');  
  }




   function fitnesst_list(){
    if(isset($_POST['delete'])){
      $where = array("ID"=>$_POST['delete']);
      $this->Admin_model->delete("zFitnessTrainingZone",$where);
      $this->session->set_flashdata('msg', 'Deleted Successfully');
    }
    $data['brand_list'] = $this->Admin_model->recordall("zFitnessTrainingZone");
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/fitnesst_list');
    $this->load->view('template/admin/footer');             
  }
   function addfitnesst(){
    if(isset($_POST['submitLog'])){ 
      $this->Admin_model->add_record("zFitnessTrainingZone"); 
      $this->session->set_flashdata('msg','New FitnessTrainingZone Created successfully.');
        redirect("/Dashboard/fitnesst_list"); 
    }
    $data['title'] = "Add New FitnessTrainingZone";    
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/addfitnesst');
    $this->load->view('template/admin/footer');  
  }
function editfitnesst($view,$id){ 
 
    if(isset($_POST['submitLog'])){  
      $this->Admin_model->edit_category("dbo.zFitnessTrainingZone");
      $this->session->set_flashdata('msg','FitnessTrainingZone Updated successfully.');
        // redirect("/Dashboard/editcategory"); 
    }
    $data['category_list'] = $this->Admin_model->detailall($view,$id);
    // print_r($data['category_list']); die;
    $data['title'] = "Edit FitnessTrainingZone";   
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/edit_fitnesst');
    $this->load->view('template/admin/footer');  
  }





  function piece_list(){
    if(isset($_POST['delete'])){
      $where = array("ID"=>$_POST['delete']);
      $this->Admin_model->delete("zFitnessPiece",$where);
      $this->session->set_flashdata('msg', 'Deleted Successfully');
    }
    $data['brand_list'] = $this->Admin_model->recordall("zFitnessPiece");
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/piece_list');
    $this->load->view('template/admin/footer');             
  }
   function addpiece(){
    if(isset($_POST['submitLog'])){ 
      $this->Admin_model->add_record("zFitnessPiece"); 
      $this->session->set_flashdata('msg','New Piece Created successfully.');
        redirect("/Dashboard/piece_list"); 
    }
    $data['title'] = "Add New FitnessTrainingZone";    
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/addpiece');
    $this->load->view('template/admin/footer');  
  }
function editpiece($view,$id){ 
 
    if(isset($_POST['submitLog'])){  
      $this->Admin_model->edit_category("dbo.zFitnessPiece");
      $this->session->set_flashdata('msg','Piece Updated successfully.');
        // redirect("/Dashboard/editcategory"); 
    }
    $data['category_list'] = $this->Admin_model->detailall($view,$id);
    // print_r($data['category_list']); die;
    $data['title'] = "Edit Piece";   
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/edit_piece');
    $this->load->view('template/admin/footer');  
  }




  function condition_list(){
    if(isset($_POST['delete'])){
      $where = array("ID"=>$_POST['delete']);
      $this->Admin_model->delete("zFitnessConditions",$where);
      $this->session->set_flashdata('msg', 'Deleted Successfully');
    }
    $data['brand_list'] = $this->Admin_model->conditionall();
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/condition_list');
    $this->load->view('template/admin/footer');             
  }

    function addcondition(){
    if(isset($_POST['submitLog'])){ 
      $this->Admin_model->add_record("zFitnessConditions"); 
      $this->session->set_flashdata('msg','New Condition Created successfully.');
        redirect("/Dashboard/condition_list"); 
    }
    $data['title'] = "Add New Condition";   
    $data['wr'] = $this->Admin_model->recordall("zFitnessWarranty"); 
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/addcondition');
    $this->load->view('template/admin/footer');  
  }
  function editcondition($view,$id){ 
 
    if(isset($_POST['submitLog'])){  
      $this->Admin_model->edit_category("dbo.zFitnessConditions");
      $this->session->set_flashdata('msg','Condition Updated successfully.');
        // redirect("/Dashboard/editcategory"); 
    }
    $data['category_list'] = $this->Admin_model->detailall($view,$id);
    $data['wr'] = $this->Admin_model->recordall("zFitnessWarranty"); 
    // print_r($data['category_list']); die;
    $data['title'] = "Edit Condition";   
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('admin-page/edit_condition');
    $this->load->view('template/admin/footer');  
  }





  function view($type,$view,$id){
    // print_r($type);print_r($view);print_r($id);die();
    if($id!=""){
      $data['detail'] = $this->Admin_model->detailall($view,$id);
      $data['view'] = $view;
      $data['type'] = $type;
      $this->load->view('template/admin/header',$data);
      $this->load->view('dashboard_header_view');
      $this->load->view('left-sidebar');    
      $this->load->view('all_view');
      $this->load->view('template/admin/footer'); 
    }
    else{
      header("Location:".base_url('/dashboard')."/$view");
    }
  }

  function order($type){
    if(isset($_POST['contact_id'])){
      $this->Admin_model->change_status();
      $this->session->set_flashdata('msg', 'Completed Successfully');
    }
    $data['title'] = $type;
    $data['packages_list'] = $this->Admin_model->calling_list($type);
    $this->load->view('template/admin/header',$data);
    $this->load->view('dashboard_header_view');
    $this->load->view('left-sidebar');    
    $this->load->view('order_list');
    $this->load->view('template/admin/footer');   
  }

  function edit($view,$id){ // for editing in products
    if($id!=""){
      $data['detail'] = $this->Admin_model->detailall($view,$id);
      $data['view'] = $view;
      $this->load->view('template/admin/header',$data);
      $this->load->view('dashboard_header_view');
      $this->load->view('left-sidebar');    
      $this->load->view('all_edit');
      $this->load->view('template/admin/footer'); 
    }
    else{
      header("Location:".base_url('/dashboard')."/$view");
    }
  }

  
}
?>