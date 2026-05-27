<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;
use Config\Services;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login'); // ⬅️ Dito mo siya itabi gagi!
$routes->post('login-check', 'Home::checkLogin');

// Ito naman yung para sa activity natin:
$routes->get('form', static function () {
    return view('my_form');
});

$routes->setAutoRoute(false);

$routes->post('form', static function () {
    // Kinukuha natin ang text na tinype ng user at ipinapasa sa 'my_form' view
    $data['user_input'] = service('request')->getPost('user_input');
    return view('my_form', $data);
});

$routes->get('login', 'UserController::login');
$routes->get('users', 'UserController::index');
$routes->post('users/upload', 'UserController::upload');