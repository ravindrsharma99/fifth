<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'fitness_equipment/home';
$route['seo/sitemap\.xml'] = "seo/sitemap"; 
/*custom Routes*/
$route['live-inventory'] = "site/liveinventory";
$route['live-inventory/filter'] = "site/filter";

/* Cardio routes*/

$route['(:any)/filter']="$1/filter";
$route['home'] = 'fitness_equipment/home';
$route['cardio'] = "fitness_equipment/index";
// $route['home'] = "fitness_equipment/index";
// $route['fitness_equipment/(:any)']="fitness_equipment/product/$1";
$route['cardio/(:any)']="fitness_equipment/product/$1";
// $route['cardio1/(:any)']="fitness_equipment/product1/$1";
$route['filter/cardio'] = "fitness_equipment/filter";
$route['filter/strength'] = "strength_equipment/filter";
$route['strength'] = "strength_equipment/index";
$route['strength/(:any)']="strength_equipment/product/$1";
$route['brand/(:any)'] = "brand/index/$1";
$route['filter/brand'] = "brand/filter";
$route['gym-equipment/(:any)'] = "category/index/$1";
$route['fitness-equipment/(:any)'] = "category/test/$1";
$route['gym-accessories/(:any)'] = "category/accessories/$1";

$route['gym-accessories/filters/(:any)'] = "category/filteringz/$1";
$route['gym-equipment/filters/(:any)'] = "category/filtering/$1";
$route['fitness-equipment/filters/(:any)'] = "category/filters/$1";
$route['cart'] = "site/addtocart";


/*user routes*/
$route['logout'] = "user/logout";
// $route['admin'] = "admin/login";

/*Custom page routes*/
$route['page/(:any)'] = "site/page/$1";
$route['sell-fitness-equipment'] = "site/page/sell-fitness-equipment";

$route['lease-gym-equipment'] = "site/page/lease-gym-equipment";

$route['replacement-gym-parts'] = "site/page/replacement-gym-parts";
$route['about-global-fitness'] = "site/page/about-global-fitness";



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//$route['default_controller'] = 'webpages'; //Our default Controller

//Get rid of the first segment (in our case we get rid of webpages)
//$route["product_details"] = 'site/product_details'; 
// $route["blog/(.*)"] = 'webpages/blog/$1';
// $route["view/(.*)"] = 'webpages/view/$1';