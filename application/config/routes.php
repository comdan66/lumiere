<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['scent/(:num)'] = "scents/content/$1";
$route['product/(:num)'] = "products/content/$1";
$route['portfolio/(:num)'] = "portfolios/content/$1";
$route['scent/(:num)'] = "scents/content/$1";
$route['scents/(:any)'] = "scents/index/$1";

$route['admin'] = "admin/main";
$route['admin/edit'] = "admin/main/edit";
$route['admin/login'] = "admin/main/login";
$route['admin/logout'] = "admin/main/logout";

$route['default_controller'] = "main";
$route['404_override'] = '';
