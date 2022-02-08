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
$route['default_controller'] = 'dashboard/mainDashboard';
$route['404_override'] = 'Settings/not_found';
$route['translate_uri_dashes'] = FALSE;

$route['login']       = 'Login';
$route['logout']      = 'Login/logout';
$route['sign_up']     = 'Login/sign_up';
$route['do_register'] = 'Login/do_register';

$route['get_username']= 'Settings/get_username';

$route['customeradd'] = 'CustomerAdd';
$route['customeredit']= 'CustomerEdit';
$route['customerview']= 'CustomerView';
$route['vehicleview'] = 'VehicleView';
$route['userprofile'] = 'UserProfile';
$route['vehicleadd']  = 'VehicleAdd';
$route['vehicle_make']= 'Vehicle_Make';


$route['vehicleedit/custedit/myformAjax/(:any)'] = 'VehicleEdit/myformAjax/$1';
$route['vehicleedit/custedit/myformAjax/(:any)'] = 'VehicleEdit/myformAjax/$1';
$route['vehicleedit/custedit/(:any)'] = 'VehicleEdit/custedit/$1';
$route['vehicleedit/do_update'] = 'VehicleEdit/do_update_data';
$route['vehicleadd/do_update_data'] = 'VehicleAdd/do_update_data';

$route['customeredit/custedit/(:any)'] = 'CustomerEdit/custedit/$1';

$route['vehicle_make/edit_val/(:any)'] = 'Vehicle_Make/edit_val/$1';
$route['vehicle_model/edit_val/(:any)'] = 'Vehicle_Model/edit_val/$1';

$route['customeredit/do_update'] = 'CustomerEdit/do_update';
$route['customeradd/do_upload'] = 'CustomerAdd/do_update';

$route['userprofile/do_update'] = 'UserProfile/do_update';

$route["report_del/(:any)/(:num)"]="Accounts/report_del/$1/$2";
$route["invoice_print/(:any)/(:num)"]="Accounts/invoice_print/$1/$2";






