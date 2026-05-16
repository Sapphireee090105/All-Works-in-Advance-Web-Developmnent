<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Ito yung natanggal mo, ibalik lang natin:
$routes->get('/', 'Home::index');

// Ito naman yung para sa activity natin:
$routes->get('form', static function() { 
    return view('my_form'); 
});

$routes->post('form', static function() {
    // Kinukuha natin ang text na tinype ng user at ipinapasa sa 'my_form' view
    $data['user_input'] = request()->getPost('user_input');
    return view('my_form', $data);
});

$routes->get('users', 'UserController::index');
$routes->post('users/upload', 'UserController::upload');