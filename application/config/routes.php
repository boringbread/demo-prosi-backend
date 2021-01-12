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
$route['default_controller'] = 'C_Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['passw'] = 'C_Login/generatePass';
$route['login'] = 'C_Login/loadView';
$route['logout'] = 'C_Login/logout';
$route['uploadFile'] = 'C_Home/unggahBukti';
$route['unggahBukti'] = 'C_Home/loadUnggahBukti';
$route['unggahBukti2'] = 'C_Home/loadUnggahBukti2';
$route['unggahBukti3'] = 'C_Home/loadUnggahBukti3';

$route['tatapamong'] = 'C_Tabel1/loadView';

$route['inputMahasiswa'] = 'C_Tabel2Input/loadView';
$route['asing'] = 'C_Tabel2Asing/loadView';

$route['profil'] = 'C_Tabel3Profil/loadView';
$route['kinerja'] = 'C_Tabel3Kinerja/loadView';

$route['keuangan'] = 'C_Tabel4/loadView';

$route['kurikulum'] = 'C_Tabel5Kurikulum/loadView';
$route['Integrasi'] = 'C_Tabel5Integrasi/loadView';
$route['kepuasanMahasiswa'] = 'C_Tabel5Kepuasan/loadView';

$route['melibatkanMahasiswa'] = 'C_Tabel6/loadView';

$route['PKM'] = 'C_Tabel7/loadView';

$route['capaian'] = 'C_Tabel8Capaian/loadView';
$route['prestasi'] = 'C_Tabel8Prestasi/loadView';
$route['efektivitas'] = 'C_Tabel8Efektivitas/loadView';
$route['dayasaing'] = 'C_Tabel8DayaSaing/loadView';
$route['kepuasan'] = 'C_Tabel8Kinerja/loadView';
$route['publikasi'] = 'C_Tabel8Publikasi/loadView';
