<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');
$routes->get('auth', 'Auth::index');
$routes->get('dashboard', 'Dashboard::index');

// kasus
$routes->get('dashboard/kasus', 'Dashboard::kasus');
$routes->get('dashboard/kasus/tambah', 'Dashboard::tambah_kasus');
$routes->get('dashboard/kasus/edit/(:any)', 'Dashboard::edit_kasus/$1');
$routes->get('dashboard/kasus/delete/(:any)', 'Dashboard::delete_kasus/$1');

$routes->post('dashboard/kasus/tambah/proses', 'Dashboard::proses_tambah_kasus');
$routes->post('dashboard/kasus/proses-edit/(:any)', 'Dashboard::proses_edit_kasus/$1');

// kriteria
$routes->get('dashboard/kriteria/lihat/(:any)', 'Dashboard::kriteria/$1');
$routes->get('dashboard/kriteria/tambah/(:any)', 'Dashboard::tambah_kriteria/$1');
$routes->get('dashboard/kriteria/edit/(:any)/(:any)', 'Dashboard::edit_kriteria/$1/$2');
$routes->get('dashboard/kriteria/delete/(:any)/(:any)', 'Dashboard::delete_kriteria/$1/$2');

$routes->post('dashboard/kriteria/proses-tambah/(:any)/(:num)', 'Dashboard::proses_tambah_kriteria/$1/$2');
$routes->post('dashboard/kriteria/proses-edit/(:any)/(:num)', 'Dashboard::proses_edit_kriteria/$1/$2');

// alternatif
$routes->get('dashboard/alternatif/lihat/(:any)', 'Dashboard::alternatif/$1');
$routes->get('dashboard/alternatif/tambah/(:any)', 'Dashboard::tambah_alternatif/$1');
$routes->get('dashboard/alternatif/edit/(:any)/(:any)', 'Dashboard::edit_alternatif/$1/$2');
$routes->get('dashboard/alternatif/delete/(:any)/(:any)', 'Dashboard::delete_alternatif/$1/$2');

$routes->get('dashboard/alternatif/detail/(:any)/(:any)', 'Dashboard::detail_alternatif/$1/$2');
$routes->get('dashboard/alternatif/tambah-nilai/(:any)/(:any)', 'Dashboard::tambah_nilai_alternatif/$1/$2');
$routes->get('dashboard/alternatif/edit-nilai/(:any)/(:any)/(:any)', 'Dashboard::edit_nilai_alternatif/$1/$2/$3');
$routes->get('dashboard/alternatif/delete-nilai/(:any)/(:any)/(:any)', 'Dashboard::delete_nilai_alternatif/$1/$2/$3');

$routes->post('dashboard/alternatif/proses-tambah/(:any)/(:num)', 'Dashboard::proses_tambah_alternatif/$1/$2');
$routes->post('dashboard/alternatif/proses-edit/(:any)/(:any)', 'Dashboard::proses_edit_alternatif/$1/$2');
$routes->post('dashboard/alternatif/proses-tambah-nilai/(:any)/(:any)', 'Dashboard::proses_tambah_nilai_alternatif/$1/$2');
$routes->post('dashboard/alternatif/proses-edit-nilai/(:any)/(:any)/(:any)', 'Dashboard::proses_edit_nilai_alternatif/$1/$2/$3');

// user
$routes->get('dashboard/user', 'Dashboard::user');	
$routes->get('dashboard/user/delete/(:any)', 'Dashboard::delete_user/$1');	

// hasil
$routes->get('dashboard/detail-hasil/(:any)', 'Dashboard::detail_hasil/$1');

// profile
$routes->get('profile/index/(:any)', 'Profile::index/$1');
$routes->get('profile/edit-profile/(:any)', 'Profile::edit_profile/$1');

$routes->post('profile/proses-edit-profile/(:any)', 'Profile::proses_edit_profile/$1');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
