<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'login/index';
$route['checkLogin'] = 'login/checkLogin';
$route['dashboard'] = 'dashboard/index';
$route['category'] = 'category/index';
$route['logout'] = 'login/logout';
