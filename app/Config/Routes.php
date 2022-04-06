<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->post('/login/auth', 'Login::auth');
$routes->get('/login', 'Login::index');
$routes->get('/logout', 'Login::logout');

// Home
$routes->get('/', 'Home::index');
$routes->get('/home',  'Home::index');

//Dashboard
$routes->get('/', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/dashboard',  'Dashboard::index', ['filter' => 'auth']);

//Tanaman
$routes->get('/', 'Tanaman::index', ['filter' => 'auth']);
$routes->get('/tanaman',  'Tanaman::index', ['filter' => 'auth']);

//Pengelola
$routes->get('/', 'Pengelola::index', ['filter' => 'auth']);
$routes->get('/pengelola',  'Pengelola::index', ['filter' => 'auth']);

//Perawatan
$routes->get('/', 'Perawatan::index', ['filter' => 'auth']);
$routes->get('/perawatan',  'Perawatan::index', ['filter' => 'auth']);

//Laporan
$routes->get('/', 'Laporan::index', ['filter' => 'auth']);
$routes->get('/laporan',  'Laporan::index', ['filter' => 'auth']);

// Lokasi
$routes->get('/', 'Lokasi::index', ['filter' => 'auth']);
$routes->get('/lokasi', 'Lokasi::index', ['filter' => 'auth']);
$routes->get('/lokasi/lokasi', 'Lokasi::lokasi', ['filter' => 'auth']);
$routes->get('/lokasi/sublokasi', 'Lokasi::sublokasi', ['filter' => 'auth']);

// Klasifikasi
$routes->get('/', 'Klasifikasi::index', ['filter' => 'auth']);
$routes->get('/klasifikasi', 'Klasifikasi::index', ['filter' => 'auth']);
$routes->get('/klasifikasi/genus', 'Klasifikasi::genus', ['filter' => 'auth']);
$routes->get('/klasifikasi/spesies', 'Klasifikasi::spesies', ['filter' => 'auth']);
$routes->get('/klasifikasi/famili', 'Klasifikasi::famili', ['filter' => 'auth']);

//Learning
$routes->get('/', 'Learning::index');
$routes->get('/learning',  'Learning::index');

/*
 * -----------------------------------s---------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}