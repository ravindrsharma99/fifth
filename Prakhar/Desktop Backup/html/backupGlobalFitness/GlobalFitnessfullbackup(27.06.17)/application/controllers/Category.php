	
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Category extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			"Site_model",
			"Admin_model"
		));
		$this->load->helper("url");
	}
	function index($name)
	{
		$name = str_replace("-", " ", $name);
		$name = str_replace("*", "-", $name);
		$name = ucwords($name);
		$name1 = $name;
		$name == 'Paginated Selectorized Station' ? $name = 'Selectorized Station' : $name;
		$this->Site_model->hitcount($name);
		$kingdom = 'Strength';
		$data['CategoryData'] = $this->Site_model->category_listing1($name, $kingdom);
		$data['product'] = $this->Site_model->productSearchBycategory1($name, $kingdom);
		$data['category'] = $this->Site_model->categorySearch('zCardioMenu');
		$data['category2'] = $this->Site_model->categorySearch('zStrengthMenu');
		$result = $this->Site_model->categorymetadata($name);
		$data['metatitle'] = $result[0]->MetaCategoryPageTitle;
		$data['category_name'] = $name;
		$data['description'] = $result[0]->MetaCategoryPageDescription;
		$data['CollapsiblePanelDescription'] = $result[0]->CollapsiblePanelDescription;
		$data['keywords'] = $result[0]->MetaCategoryPageKeywords;
		$data['detail'] = $result;
		$data['getcategory'] = "1";
		$data['check_filter'] = $name;
		$data['menu'] = $this->Site_model->menusearch();
		$data['strength_equipment'] = 'Category';
		$data['filter_check'] = 'Strength';
		$this->load->view('template/site/header', $data);
		$name == 'Selectorized Station' ? $this->load->view('selectorized') : $this->load->view('hello_view');
		$this->load->view('template/site/footer');
	}
	function test($name)
	{
		$name = str_replace("-", " ", $name);
		$name = str_replace("*", "-", $name);
		$name = ucwords($name);
		$name1 = $name;
		$this->Site_model->hitcount($name);
		$kingdom = 'Cardio';
		$data['CategoryData'] = $this->Site_model->category_listing1($name, $kingdom);
		$data['product'] = $this->Site_model->productSearchBycategory1($name, $kingdom);
		$data['filter_check'] = 'Cardio';
		$data['category'] = $this->Site_model->categorySearch('zCardioMenu');
		$data['category2'] = $this->Site_model->categorySearch('zStrengthMenu');
		$result = $this->Site_model->categorymetadata($name);
		$data['metatitle'] = $result[0]->MetaCategoryPageTitle;
		$data['category_name'] = $name;
		$data['description'] = $result[0]->MetaCategoryPageDescription;
		$data['CollapsiblePanelDescription'] = $result[0]->CollapsiblePanelDescription;
		$data['keywords'] = $result[0]->MetaCategoryPageKeywords;
		$data['detail'] = $result;
		$data['getcategory'] = "1";
		$data['check_filter'] = $name;
		$data['menu'] = $this->Site_model->menusearch();
		$data['strength_equipment'] = 'Category';
		$this->load->view('template/site/header', $data);
		$this->load->view('hello_view');
		$this->load->view('template/site/footer');
	}
	function accessories($name)
	{
		$name = str_replace("-", " ", $name);
		$name = str_replace("*", "-", $name);
		$name = ucwords($name);
		$name1 = $name;
		$this->Site_model->hitcount($name);
		$kingdom = 'Cardio';
		$data['CategoryData'] = $this->Site_model->category_listing($name);
		$data['product'] = $this->Site_model->productSearchBycategory($name);
		$data['category'] = $this->Site_model->categorySearch('zCardioMenu');
		$data['category2'] = $this->Site_model->categorySearch('zStrengthMenu');
		$result = $this->Site_model->categorymetadata($name);
		$data['metatitle'] = $result[0]->MetaCategoryPageTitle;
		$data['category_name'] = $name;
		$data['description'] = $result[0]->MetaCategoryPageDescription;
		$data['CollapsiblePanelDescription'] = $result[0]->CollapsiblePanelDescription;
		$data['keywords'] = $result[0]->MetaCategoryPageKeywords;
		$data['detail'] = $result;
		$data['getcategory'] = "1";
		$data['check_filter'] = $name;
		$data['menu'] = $this->Site_model->menusearch();
		$data['strength_equipment'] = 'Category';
		$this->load->view('template/site/header', $data);
		$this->load->view('hello_view');
		$this->load->view('template/site/footer');
	}
	public function NextCategoryRecord()
	{
		$record = $this->Site_model->NextCategoryRecord($_POST['record'], $_POST['filter'], $_POST['categoryname']);
		if (count($record) > 0) {
			foreach($record as $products) {
				$link = str_replace("-", "*", $products->ProductName);
				$link = str_replace(" ", "-", $link);
?>
  <div class="col-md-<?php
				print_r($_POST['style']); ?> col-sm-4 col-xs-6 padd_0">
   <div class="img_block">
    <?php
				if ($ptype == "0" || $products->Kingdom == 'Cardio') {
?>
             <div class="pp_img"><i><a href="<?php
					echo base_url('/cardio') . '/' . $link; ?>">
              <img alt="<?php
					echo $products->ProductName; ?>" title="<?php
					echo $products->MetaDetailPageTitleTag; ?>"
               src="<?php
					echo base_url() . '/' . $products->ImageURL; ?>" /></a></i></div>
            <?php
				}
				else {
?>
             <div class="pp_img"><i><a href="<?php
					echo base_url('/strength') . '/' . $link; ?>"><img alt="<?php
					echo $products->ProductName; ?>" title="<?php
					echo $products->MetaDetailPageTitleTag; ?>"  src="<?php
					echo base_url() . '/' . $products->ImageURL; ?>" /></a></i></div>
            <?php
				}
?>

     <div class="img_content">

       <h5><?php
				echo $products->ProductName; ?></h5>
        <p><?php
				if ($products->Price != "Please Enquire") {
					echo "$";
				} ?><?php
				echo trim($products->Price, "$"); ?><p>
       <?php
				$id = $products->ListID;
				$rate = $this->Site_model->getrating($id);
				$add = '';
				foreach($rate as $rates) {
					$add+= $rates->star_rate;
				}
				$divide = count($rate);
				if ($divide < 1) {
					$divide = 1;
				}
				else {
					$avg_rate = $add / $divide;
				}
?>

      <!-- <input id="input-21b" class="rating form-control hide" data-min="0" data-max="5" data-step="1" value="" data-disabled="true" data-size="xs" data-show-clear="false" data-show-caption="false"> -->
      <div class="star-rating rating-xs rating-disabled">
      <div class="rating-container rating-gly-star" data-content="">
      <div class="rating-stars" data-content="" style="width: 0%;">
      	<input id="input-21b" class="rating" data-min="0" data-max="5" data-step="1"
        value='<?php
				echo $avg_rate; ?>' data-disabled="true" data-size="xs" data-show-clear="false" data-show-caption="false" >
      </div>
      </div>
      </div>

       <p>Available to ship:

              <?php
				if ($products->QuantityOnHand <= 0) {
?><span class="outstock">Out of Stock</span><?php
				}
				else if (($products->QuantityOnHand > 0) && ($products->QuantityOnHand < 3)) {
?><span class="lowstock">Low Stock</span> <?php
				}
				else {
?>
                      <span class="inerstock">In Stock</span>
                    <?php
				} ?>
        </p>
     </div>
   </div>
 </div>
    <?php
				// print_r($products);die();
			}
		}
		else {
			return 0;
		}
	}
	public function filtering($name)

	{
		$data['myname'] = "gym-equipment";
		$name = str_replace("-", " ", $name); //spinner like name exactly
		$name = str_replace("*", "-", $name);
		$name1 = $name;
		$name = ucwords($name);
		$data['availability'] = $this->Site_model->allrecord('zFitnessAvailability');
		$data['amps'] = $this->Site_model->allrecord('zFitnessAmps');
		$data['voltage'] = $this->Site_model->allrecord('zFitnessVoltage');
		$data['condition'] = $this->Site_model->allrecord('zFitnessConditions');
		$data['ptype'] = "Selectorized";
		$cate = 'Strength';
		$data['category'] = $this->Site_model->categorySearch('zCardioMenu');
		$data['category2'] = $this->Site_model->categorySearch('zStrengthMenu');
		$data['product'] = $this->Site_model->productSearchBycategoryfilter1($name1, $cate);
		$result = $this->Site_model->categorymetadata($name1);
		$data['metatitle'] = $result[0]->MetaCategoryPageTitle;
		$data['category_name'] = $name;
		$data['description'] = $result[0]->MetaCategoryPageDescription;
		$data['keywords'] = $result[0]->MetaCategoryPageKeywords;
		$data['detail'] = $result;
		$data['CollapsiblePanelDescription'] = $result[0]->CollapsiblePanelDescription;
		$categoryDetails = $this->Site_model->categoryDetails($name1);
		$data['strength_equipment'] = 'Category';
		$data['brand'] = $this->Site_model->fetchBrand($name1);
		$data['piece'] = $this->Site_model->fetchPiece($name1);
		$data['getcategory'] = "1";
		$data['mmcategory'][0]->Name = $name1;
		$data['condition1'] = $this->Site_model->fetchCondition($name1);
		$data['check_filter'] = $name;
		$data['title'] = "Product List";
		$data['menu'] = $this->Site_model->menusearch();
		$this->load->view('template/site/header', $data);
		$this->load->view('filtering_view');
		$this->load->view('template/site/footer');
	}
	public function filters($name)

	{
		$name = str_replace("-", " ", $name); //spinner like name exactly
		$name = str_replace("*", "-", $name);
		$name1 = $name;
		$name = ucwords($name);
		if ($name == 'Paginated Selectorized Station') {
			$name = 'Selectorized Station';
		}
		$data['availability'] = $this->Site_model->allrecord('zFitnessAvailability');
		$data['amps'] = $this->Site_model->allrecord('zFitnessAmps');
		$data['voltage'] = $this->Site_model->allrecord('zFitnessVoltage');
		$data['condition'] = $this->Site_model->allrecord('zFitnessConditions');
		if ($this->input->get('type') == "fitness_equipment") {
			$data['ptype'] = "0";
		}
		else {
			$data['ptype'] = "1";
		}
		$data['myname'] = "fitness-equipment";
		$cate = 'Cardio';
		$data['category'] = $this->Site_model->categorySearch('zCardioMenu');
		$data['category2'] = $this->Site_model->categorySearch('zStrengthMenu');
		$data['product'] = $this->Site_model->productSearchBycategoryfilter1($name1, $cate);
		$result = $this->Site_model->categorymetadata($name1);
		$data['metatitle'] = $result[0]->MetaCategoryPageTitle;
		$data['category_name'] = $name;
		$data['description'] = $result[0]->MetaCategoryPageDescription;
		$data['keywords'] = $result[0]->MetaCategoryPageKeywords;
		$data['detail'] = $result;
		$data['CollapsiblePanelDescription'] = $result[0]->CollapsiblePanelDescription;
		$categoryDetails = $this->Site_model->categoryDetails($name1);
		$data['brand'] = $this->Site_model->fetchBrand($name1);
		$data['piece'] = $this->Site_model->fetchPiece($name1);
		$data['getcategory'] = "1";
		$data['mmcategory'][0]->Name = $name1;
		$data['condition1'] = $this->Site_model->fetchCondition($name1);
		$data['check_filter'] = $name1;
		// $data['strength_equipment'] ='category';
		$data['strength_equipment'] = 'Category';
		$data['title'] = "Product List";
		$data['menu'] = $this->Site_model->menusearch();
		$this->load->view('template/site/header', $data);
		$this->load->view('filtering_view');
		$this->load->view('template/site/footer');
	}
	public function filteringz($name)

	{
		$data['myname'] = "gym-accessories";
		$name = str_replace("-", " ", $name); //spinner like name exactly
		$name = str_replace("*", "-", $name);
		$name = ucwords($name);
		if ($name == 'Paginated Selectorized Station') {
			$name = 'Selectorized Station';
		}
		$data['availability'] = $this->Site_model->allrecord('zFitnessAvailability');
		$data['amps'] = $this->Site_model->allrecord('zFitnessAmps');
		$data['voltage'] = $this->Site_model->allrecord('zFitnessVoltage');
		$data['condition'] = $this->Site_model->allrecord('zFitnessConditions');
		if ($this->input->get('type') == "fitness_equipment") {
			$data['ptype'] = "0";
		}
		else {
			$data['ptype'] = "1";
		}
		$data['category'] = $this->Site_model->categorySearch('zCardioMenu');
		$data['category2'] = $this->Site_model->categorySearch('zStrengthMenu');
		$data['product'] = $this->Site_model->productSearchBycategoryfilter2($name);
		$result = $this->Site_model->categorymetadata($name);
		$data['metatitle'] = $result[0]->MetaCategoryPageTitle;
		$data['category_name'] = $name;
		$data['description'] = $result[0]->MetaCategoryPageDescription;
		$data['keywords'] = $result[0]->MetaCategoryPageKeywords;
		$data['detail'] = $result;
		$data['CollapsiblePanelDescription'] = $result[0]->CollapsiblePanelDescription;
		$categoryDetails = $this->Site_model->categoryDetails($name);
		$data['strength_equipment'] = 'Category';
		$data['brand'] = $this->Site_model->fetchBrand($name);
		$data['piece'] = $this->Site_model->fetchPiece($name);
		$data['getcategory'] = "1";
		$data['mmcategory'][0]->Name = $name;
		$data['condition1'] = $this->Site_model->fetchCondition($name);
		$data['check_filter'] = $name;
		$data['title'] = "Product List";
		$data['menu'] = $this->Site_model->menusearch();
		$this->load->view('template/site/header', $data);
		$this->load->view('filtering_view');
		$this->load->view('template/site/footer');
	}
	public function filter($name)

	{
		$name = str_replace("-", " ", $name); //spinner like name exactly
		$name = str_replace("*", "-", $name);
		$name = ucwords($name);
		// $name=rawurldecode($name);
		$data['availability'] = $this->Site_model->allrecord('zFitnessAvailability');
		$data['amps'] = $this->Site_model->allrecord('zFitnessAmps');
		$data['voltage'] = $this->Site_model->allrecord('zFitnessVoltage');
		$data['condition'] = $this->Site_model->allrecord('zFitnessConditions');
		if ($this->input->get('type') == "fitness_equipment") {
			$data['ptype'] = "0";
		}
		else {
			$data['ptype'] = "1";
		}
		$data['category'] = $this->Site_model->categorySearch('zCardioMenu');
		$data['category2'] = $this->Site_model->categorySearch('zStrengthMenu');
		$data['product'] = $this->Site_model->productSearchBycategoryfilter($name);
		$result = $this->Site_model->categorymetadata($name);
		$data['metatitle'] = $result[0]->MetaCategoryPageTitle;
		$data['category_name'] = $name;
		$data['description'] = $result[0]->MetaCategoryPageDescription;
		$data['keywords'] = $result[0]->MetaCategoryPageKeywords;
		$data['detail'] = $result;
		$data['CollapsiblePanelDescription'] = $result[0]->CollapsiblePanelDescription;
		$categoryDetails = $this->Site_model->categoryDetails($name);
		$data['strength_equipment'] = 'Category';
		$data['brand'] = $this->Site_model->fetchBrand($name);
		$data['piece'] = $this->Site_model->fetchPiece($name);
		$data['getcategory'] = "1";
		$data['mmcategory'][0]->Name = $name;
		$data['condition1'] = $this->Site_model->fetchCondition($name);
		$data['check_filter'] = $name;
		// $data['strength_equipment'] ='category';
		$data['title'] = "Product List";
		$data['menu'] = $this->Site_model->menusearch();
		$this->load->view('template/site/header', $data);
		$this->load->view('filter_view');
		$this->load->view('template/site/footer');
	}
}
