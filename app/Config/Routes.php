<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('auth/logout', 'Auth::logout');
$routes->group('auth', ['filter' => 'noauth'], function ($routes) {
    $routes->get('/', 'Auth::index');
    $routes->get('login', 'Auth::login');
    $routes->post('signin', 'Auth::signin');
    $routes->get('register', 'Auth::register');
    $routes->post('signup', 'Auth::signup');
    $routes->get('success', 'Auth::success');
    // $routes->get('forgot-password', 'Auth::forgot_password');
    // $routes->post('forgot-password', 'Auth::forgot_password');
    // $routes->get('reset-password', 'Auth::reset_password');
});
$routes->resource('books', ['filter' => 'auth']);
