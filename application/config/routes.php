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
$route['default_controller'] =  'FrontendController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['page/(:any)'] = "FrontendController/viewDetails/$1";


$route['admin'] = "admin/Auth/index";
$route['admin/login'] = "admin/Auth/login";
$route['admin/dashboard'] = "admin/AdminController/index";
//Users
$route['admin/users'] = "admin/AdminController/users";
$route['admin/addUser'] = "admin/AdminController/addUser";
$route['admin/saveUser'] = "admin/AdminController/saveUser";
$route['admin/editUser/(:any)'] = "admin/AdminController/editUser/$1";
$route['admin/deleteUser/(:any)'] = "admin/AdminController/deleteUser/$1";
//posts
$route['admin/post'] = "admin/AdminController/post";
$route['admin/addPost'] = "admin/AdminController/addPost";
$route['admin/savePost'] = "admin/AdminController/savePost";
$route['admin/editPost/(:any)'] = "admin/AdminController/editPost/$1";
$route['admin/deletePost/(:any)'] = "admin/AdminController/deletePost/$1";
$route['admin/newFlag/(:any)'] = "admin/AdminController/newFlag/$1";
//post type
$route['admin/postType'] = "admin/AdminController/postType";
$route['admin/addPostType'] = "admin/AdminController/addPostType";
$route['admin/savePostType'] = "admin/AdminController/savePostType";
$route['admin/editPostType/(:any)'] = "admin/AdminController/editPostType/$1";
$route['admin/deletePostType/(:any)'] = "admin/AdminController/deletePostType/$1";

$route['admin/account'] = "admin/AdminController/account";
$route['admin/updateAccount'] = "admin/AdminController/updateAccount";
$route['admin/changePassword'] = "admin/AdminController/changePassword";
$route['admin/updatePassword'] = "admin/AdminController/updatePassword";

$route['admin/logout'] = "admin/AdminController/logout";


$route['admin/ckeditor'] = "admin/AdminController/ckeditor";
