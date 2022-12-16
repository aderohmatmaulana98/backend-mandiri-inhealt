<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['api/register/index'] = 'api/Register/index';
$route['api/auth'] = 'api/Auth';

$route['api/user_profile/getuserprofilebyusername/(:any)'] = 'api/User_profile/GetUserProfileByUsername/$1';
$route['api/user_profile/update/(:any)'] = 'api/User_profile/update/$1';
$route['api/skill/getskill'] = 'api/skill/GetSkills';
$route['api/skill/skill_by_id/(:any)'] = 'api/skill/skill_by_id/$1';
$route['api/skill/create'] = 'api/skill/create';
$route['api/skill/update/(:any)'] = 'api/skill/update/$1';
$route['api/skill/delete/(:any)'] = 'api/skill/delete/$1';

$route['api/skill_level/getskilllevel'] = 'api/skill_level/GetSkillsLevel';
$route['api/skill_level/skill_level_by_id/(:any)'] = 'api/skill_level/skill_level_by_id/$1';
$route['api/skill_level/create'] = 'api/skill_level/create';
$route['api/skill_level/update/(:any)'] = 'api/skill_level/update/$1';
$route['api/skill_level/delete/(:any)'] = 'api/skill_level/delete/$1';

$route['api/user_skill/getuserskill'] = 'api/user_skill/GetUserSkills';
$route['api/user_skill/user_skill_by_id/(:any)'] = 'api/user_skill/user_skill_by_id/$1';
$route['api/user_skill/create'] = 'api/user_skill/create';
$route['api/user_skill/update/(:any)'] = 'api/user_skill/update/$1';
$route['api/user_skill/delete/(:any)'] = 'api/user_skill/delete/$1';
