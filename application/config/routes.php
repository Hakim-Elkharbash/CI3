<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//------------------ DB routes
$route['db'] = 'Database/Db/index';

$route['db/add'] = 'Database/Db/add';
$route['db/save'] = 'Database/Db/save';

$route['db/edit/(:num)'] = 'Database/Db/edit/$1';
$route['db/update'] = 'Database/Db/update';

$route['db/del'] = 'Database/Db/del';
$route['db/delAll'] = 'Database/Db/delAll';

//------------------ Upload routes
$route['upload'] = 'Upload/Upload/index';

$route['upload/add'] = 'Upload/Upload/add';

$route['upload/upload'] = 'Upload/Upload/upload';

$route['upload/del'] = 'Upload/Upload/del';

//------------------ Import routes
$route['import'] = 'Import/Import/index';

$route['import/add'] = 'Import/Import/add';

$route['import/read'] = 'Import/Import/read';

$route['import/update'] = 'Import/Import/update';