
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Brand extends CI_Controller

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
		$this->Site_model->hitcount($name);
		$data['product'] = $this->Site_model->productSearchByBrand($name);
		$data['category'] = $this->Site_model->categorySearch('zCardioMenu');
		$data['category2'] = $this->Site_model->categorySearch('zStrengthMenu');
		$data['title'] = $data['product'][0]->MetaDetailPageTitleTag;
		$data['category_name'] = $name;
		$data['description'] = $data['product'][0]->MetaDetailPageDescriptionTag;
		$data['keywords'] = $data['product'][0]->MetaDetailPageKeywordTag;
		$data['detail'] = $data['product'];
		$data['mycategory'] = "1";
		$data['check_filter'] = $name;
		$data['menu'] = $this->Site_model->menusearch();
		$data['strength_equipment'] = 'brand';
		$this->load->view('template/site/header', $data);
		$this->load->view('home_view');
		$this->load->view('template/site/footer');
		}
	public function filter($name)

		{
		$data['categoryname'] = $name;
		$name = str_replace("-", " ", $name); //spinner like name exactly
		$name = str_replace("*", "-", $name);
		// $name=rawurldecode($name);
		$data['product'] = $this->Site_model->productSearchByBrand($name);
		$data['category'] = $this->Site_model->categorySearch('zCardioMenu');
		$data['category2'] = $this->Site_model->categorySearch('zStrengthMenu');
		// $result =  $this->Site_model->categorymetadata($name);
		$data['title'] = $data['product'][0]->MetaDetailPageTitleTag;
		$data['description'] = $data['product'][0]->MetaDetailPageDescriptionTag;
		// $data['CollapsiblePanelDescription'] = $result[0]->CollapsiblePanelDescription;
		$data['keywords'] = $data['product'][0]->MetaDetailPageKeywordTag;
		$data['detail'] = $data['product'];
		$data['mycategory'] = "1";
		$data['check_filter'] = $name;
		$data['menu'] = $this->Site_model->menusearch();
		$data['strength_equipment'] = 'brand';
		$data['availability'] = $this->Site_model->allrecord('zFitnessAvailability');
		$data['amps'] = $this->Site_model->allrecord('zFitnessAmps');
		$data['voltage'] = $this->Site_model->allrecord('zFitnessVoltage');
		$data['condition'] = $this->Site_model->allrecord('zFitnessConditions');
		// $data['product'] = $this->Site_model->productSearchBycategoryfilter($name);
		// $result =  $this->Site_model->categorymetadata($name);
		// $data['title'] = $result[0]->MetaCategoryPageTitle;
		// $data['category_name'] = $name;
		// $data['description'] = $result[0]->MetaCategoryPageDescription;
		// $data['keywords'] = $result[0]->MetaCategoryPageKeywords;
		// $data['detail'] = $result;
		// $data['CollapsiblePanelDescription'] = $result[0]->CollapsiblePanelDescription;
		$data['strength_equipment'] = 'brand';
		$categoryDetails = $this->Site_model->categoryDetails($name);
		// $data['strength_equipment'] ='Category';
		$data['brand'] = $this->Site_model->fetchBrand($name);
		$data['piece'] = $this->Site_model->fetchPiece($name);
		// $data['getcategory'] = "1";
		$data['mmcategory'][0]->Name = $name;
		// echo "<pre>";
		// print_r($data['mmcategory']);
		// echo "</pre>";
		$data['condition1'] = $this->Site_model->fetchCondition($name);
		$data['check_filter'] = $name;
		// print_r($categoryDetails->ID);die;
		// $Piece = array();
		// foreach ($data['product'] as $h) {
		//     $Piece[] = $h->Piece;
		//     // print_r();
		// }
		// print_r($Piece);
		// $data['piece'] = array_unique($Piece);
		$data['title'] = "Product List";
		$data['menu'] = $this->Site_model->menusearch();
		// phpinfo();
		// echo "<pre>";
		// print_r($data);die;
		$this->load->view('template/site/header', $data);
		$this->load->view('filter_view');
		$this->load->view('template/site/footer');
		}
	}