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
$route['default_controller'] = 'C_Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['melibatkanMahasiswa'] = 'C_Tabel6/loadView';
$route['unggahBukti'] = 'C_Home/loadUnggahBukti';
$route['uploadFile'] = 'C_Home/unggahBukti';

$route['PKM'] = 'C_Tabel7/loadView';
$route['unggahBukti'] = 'C_Home/loadUnggahBukti';
$route['uploadFile'] = 'C_Home/unggahBukti';

$route['inputMahasiswa'] = 'C_Tabel2Input/loadView';
$route['unggahBukti'] = 'C_Home/loadUnggahBukti';
$route['uploadFile'] = 'C_Home/unggahBukti';

$route['asing'] = 'C_Tabel2Asing/loadView';
$route['unggahBukti'] = 'C_Home/loadUnggahBukti';
$route['uploadFile'] = 'C_Home/unggahBukti';

$route['profil'] = 'C_Tabel3Profil/loadView';
$route['unggahBukti'] = 'C_Home/loadUnggahBukti';
$route['uploadFile'] = 'C_Home/unggahBukti';

$route['kinerja'] = 'C_Tabel3Kinerja/loadView';
$route['unggahBukti'] = 'C_Home/loadUnggahBukti';
$route['uploadFile'] = 'C_Home/unggahBukti';

$route['tatapamong'] = 'C_Tabel1/loadView';
$route['unggahBukti'] = 'C_Home/loadUnggahBukti';
$route['uploadFile'] = 'C_Home/unggahBukti';

$route['keuangan'] = 'C_Tabel4/loadView';
$route['unggahBukti'] = 'C_Home/loadUnggahBukti';
$route['uploadFile'] = 'C_Home/unggahBukti';

$route['kurikulum'] = 'C_Tabel5Kurikulum/loadView';
$route['unggahBukti'] = 'C_Home/loadUnggahBukti';
$route['uploadFile'] = 'C_Home/unggahBukti';

$route['Integrasi'] = 'C_Tabel5Integrasi/loadView';
$route['unggahBukti'] = 'C_Home/loadUnggahBukti';
$route['uploadFile'] = 'C_Home/unggahBukti';

$route['kepuasan'] = 'C_Tabel5Kepuasan/loadView';
$route['unggahBukti'] = 'C_Home/loadUnggahBukti';
$route['uploadFile'] = 'C_Home/unggahBukti';

$route['capaian'] = 'C_Tabel8Capaian/loadView';
$route['unggahBukti'] = 'C_Home/loadUnggahBukti';
$route['uploadFile'] = 'C_Home/unggahBukti';

$route['prestasi'] = 'C_Tabel8Prestasi/loadView';
$route['unggahBukti'] = 'C_Home/loadUnggahBukti';
$route['uploadFile'] = 'C_Home/unggahBukti';

$route['efektivitas'] = 'C_Tabel8Efektivitas/loadView';
$route['unggahBukti'] = 'C_Home/loadUnggahBukti';
$route['uploadFile'] = 'C_Home/unggahBukti';

$route['dayasaing'] = 'C_Tabel8DayaSaing/loadView';
$route['unggahBukti'] = 'C_Home/loadUnggahBukti';
$route['uploadFile'] = 'C_Home/unggahBukti';

$route['kepuasan'] = 'C_Tabel8Kinerja/loadView';
$route['unggahBukti'] = 'C_Home/loadUnggahBukti';
$route['uploadFile'] = 'C_Home/unggahBukti';

$route['publikasi'] = 'C_Tabel8Publikasi/loadView';
$route['unggahBukti'] = 'C_Home/loadUnggahBukti';
$route['uploadFile'] = 'C_Home/unggahBukti';