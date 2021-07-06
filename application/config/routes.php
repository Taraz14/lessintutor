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
$route['default_controller'] = 'welcome';

//auth
$route['login'] = 'auth/auth';
$route['registrasi'] = 'auth/auth/registrasi';
$route['logout'] = 'auth/auth/logout';

//profile
$route['profile'] = 'profile';

//admin
$route['0/dashboard'] = 'admin/dashboard';
$route['0/pengajar'] = 'admin/pengajar';
$route['0/add/pengajar'] = 'admin/pengajar/add_pengajar';
$route['0/hapus/pengajar/(:any)'] = 'admin/pengajar/hapus/$1';
$route['0/add/siswa'] = 'admin/siswa/add_siswa';
$route['0/hapus/siswa/(:any)'] = 'admin/siswa/hapus/$1';
$route['0/siswa'] = 'admin/siswa';
$route['0/pembayaran'] = 'admin/pembayaran';
$route['0/refund'] = 'admin/pembayaran/refund';

//pengajar
$route['1/konfirmasi'] = 'pengajar/dashboard';

//siswa
$route['2/pengajar'] = 'siswa/pengajar';
$route['2/bayar/pengajar/(:any)'] = 'siswa/pengajar/bayar/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
