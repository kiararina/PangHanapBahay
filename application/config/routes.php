<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['default_controller'] 			= 'pb_ctr_home';
$route['404_override'] 					= 'pb_ctr_404';

$route['home']							= 'pb_ctr_home';
$route['(:any)/about']					= 'pb_ctr_home/about';
$route['contact']						= 'pb_ctr_contact';
$route['(:any)/privacy']				= 'pb_ctr_home/privacy';
$route['(:any)/usage']					= 'pb_ctr_home/usage';
$route['(:any)/search']					= 'pb_ctr_home/search';
$route['(:any)/home/detail/(:any)']		= 'pb_ctr_home/detail/$1';

$route['register']						= 'pb_ctr_register';
$route['register/create_member']		= 'pb_ctr_register/create_member';
$route['login']							= 'pb_ctr_login';
$route['login/validate_credentials']	= 'pb_ctr_login/validate_credentials';
$route['login/logout']					= 'pb_ctr_login/logout';

$route['pb_ctr_reset']					= 'user/pb_ctr_change_pass/changepwd';
$route['pb_ctr_reset/change_pass']		= 'user/pb_ctr_change_pass/change';
$route['pb_ctr_change_profile']			= 'user/pb_ctr_update/update';


$route['forgot']						= 'pb_ctr_forgot';
$route['forgot/index']					= 'pb_ctr_forgot/index';
$route['forgot_get_password']			= 'pb_ctr_forgot_get_password';

$route['agent']							= 'pb_ctr_agent';
$route['agent/edit']					= 'pb_ctr_agent/edit';
$route['agent/detail']					= 'pb_ctr_agent/detail';
$route['agent/delete']					= 'pb_ctr_agent/delete';
$route['agent/add']						= 'pb_ctr_agent/add';
$route['agent/upload/(:any)']			= 'pb_ctr_agent/upload';
$route['agent/uploadImage']				= 'pb_ctr_agent/uploadImage';

$route['tenant']						= 'pb_ctr_tenant';
$route['tenant/detail']					= 'pb_ctr_tenant/detail';

$route['tenant_agent']					= 'pb_ctr_tenant_agent';

/* possible routes to the comments controller class */
$route['comments/add/(:any)'] 			= 'pb_ctr_comments/action/$1';
$route['(:any)/comments/add/(:any)']	= 'pb_ctr_comments/action/$1';
$route['comments/add/(:any)']			= 'pb_ctr_comments/action/$1';
$route['comments/view/(:any)']			= 'pb_ctr_comments/display/$1';
$route['comments/(:any)']				= 'pb_ctr_comments/display/$1';
$route['(:any)/comments']				= 'pb_ctr_comments';
$route['comments']						= 'pb_ctr_comments';


/* End of file routes.php */
/* Location: ./application/config/routes.php */