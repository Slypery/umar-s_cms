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
$route['default_controller'] = 'controllerdashboard';
$route['feedback'] = 'controllerdashboard/feedback';
$route['feedback/submit'] = 'controllerdashboard/feedback_submit';
$route['feedback/success'] = 'controllerdashboard/feedback_success';
$route['content'] = 'controllerdashboard/content_detail';

$route['admin'] = 'controlleradmin';
$route['user'] = 'controlleruser';
$route['admin/auth'] = 'auth/login_page';
$route['user/auth'] = 'auth/login_page';

$route['user/content'] = 'controlleruser/content';
$route['user/content/add_content'] = 'controlleruser/content_page_add_content';
$route['user/content/do_add_content'] = 'controlleruser/content_page_do_add_content';
$route['user/content/edit_content'] = 'controlleruser/content_page_edit_content';
$route['user/content/do_edit_content'] = 'controlleruser/content_page_do_edit_content';
$route['user/content/view_content_detail'] = 'controlleruser/content_page_detail';
$route['user/feedback'] = 'controlleruser/feedback_page';

$route['admin/user'] = 'controlleradmin/user_page';
$route['admin/user/add_user'] = 'controlleradmin/user_page_add_user';
$route['admin/user/do_add_user'] = 'controlleradmin/user_page_do_add_user';
$route['admin/user/edit_user'] = 'controlleradmin/user_page_edit_user';
$route['admin/user/do_edit_user'] = 'controlleradmin/user_page_do_edit_user';


$route['admin/carousel'] = 'controlleradmin/carousel_page';
$route['admin/carousel/add_carousel'] = 'controlleradmin/carousel_page_add_carousel';
$route['admin/carousel/edit_carousel'] = 'controlleradmin/carousel_page_edit_carousel';
$route['admin/carousel/do_edit_carousel'] = 'controlleradmin/carousel_page_do_edit_carousel';


$route['admin/content_category'] = 'controlleradmin/content_category_page';


$route['admin/content'] = 'controlleradmin/content_page';
$route['admin/content/view_content_detail'] = 'controlleradmin/content_page_detail';
$route['admin/content/add_content'] = 'controlleradmin/content_page_add_content';
$route['admin/content/do_add_content'] = 'controlleradmin/content_page_do_add_content';
$route['admin/content/edit_content'] = 'controlleradmin/content_page_edit_content';
$route['admin/content/do_edit_content'] = 'controlleradmin/content_page_do_edit_content';


$route['admin/configuration'] = 'controlleradmin/config_page';
$route['admin/feedback'] = 'controlleradmin/feedback_page';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
