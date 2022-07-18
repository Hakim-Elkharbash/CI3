<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//------------------ DB routes
$route['db'] = 'Database/Db/index';
$route['db/add'] = 'Database/Db/add';
$route['db/save'] = 'Database/Db/save';
$route['db/delAll'] = 'Database/Db/delAll';


