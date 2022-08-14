<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard/index';
$route['help'] = 'dashboard/help';
$route['pay/check'] = 'pay/check';

$route['404_override'] = '';
$route['dashboard'] = 'dashboard/dashboard';
$route['translate_uri_dashes'] = FALSE;
