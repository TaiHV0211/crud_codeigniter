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
// $routes->setDefaultController('Home');
// $routes->setDefaultMethod('index');
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
$routes->get('/', 'User\HomeController::index');
$routes->get('error/404', function(){
    return view('errors/html/error_404');
});
$routes->get('login', 'Admin\LoginController::index');
$routes->post('login', 'Admin\LoginController::login');

$routes->group('admin',['filter' => 'adminFilter'] ,function($routes){
    $routes->get('home', 'Admin\HomeController::index');
    $routes->get('logout', 'Admin\LoginController::logout');
    $routes->group('user', function($routes){
        $routes->get('list', 'Admin\UserController::list');
        $routes->get('add', 'Admin\UserController::add');
        $routes->post('create', 'Admin\UserController::create');
        $routes->get('edit/(:num)', 'Admin\UserController::edit/$1');
        $routes->post('update', 'Admin\UserController::update');
        $routes->get('delete/(:num)', 'Admin\UserController::delete/$1');
    });
    $routes->group('purchase', function($routes){
        $routes->get('list', 'Admin\PurchaseController::list');
        $routes->get('add', 'Admin\PurchaseController::add');
        $routes->post('create', 'Admin\PurchaseController::create');
        $routes->get('edit/(:num)', 'Admin\PurchaseController::edit/$1');
        $routes->post('update', 'Admin\PurchaseController::update');
        $routes->get('delete/(:num)', 'Admin\PurchaseController::delete/$1');
    });

    $routes->group('contact', function($routes){
        $routes->get('list', 'Admin\ContactController::list');
        // $routes->get('add', 'Admin\PurchaseController::add');
        // $routes->post('create', 'Admin\PurchaseController::create');
        // $routes->get('edit/(:num)', 'Admin\PurchaseController::edit/$1');
        // $routes->post('update', 'Admin\PurchaseController::update');
        // $routes->get('delete/(:num)', 'Admin\PurchaseController::delete/$1');
    });
});
/*
 * --------------------------------------------------------------------
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
