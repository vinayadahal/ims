<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'login/index';
$route['checkLogin'] = 'login/checkLogin';
$route['dashboard'] = 'dashboard/index';
$route['category'] = 'category/index';
$route['category/(:num)'] = 'category/index/$1';
$route['category/search'] = 'category/search';
$route['category/create'] = 'category/create';
$route['category/edit/(:num)'] = 'category/edit/$1';
$route['category/delete/(:num)/(:any)'] = 'category/delete/$1/$2';
$route['product/(:num)'] = 'product/index/$1';
$route['client/(:num)'] = 'client/index/$1';
$route['usermanagement/(:num)'] = 'usermanagement/index/$1';
$route['logout'] = 'login/logout';

