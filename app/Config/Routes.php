<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/', 'auth::index');
$routes->post('auth/login', 'Auth::login');
$routes->match(['get', 'post'], 'login', 'Auth::index');
$routes->get('login', 'Auth::index');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');


$routes->post('chat/ask', 'Chat::ask');

$routes->get('/', 'dashboard::index');
$routes->get('/konten/dashboard', 'Dashboard::dashboard');

$routes->get('/', 'product::index');
$routes->get('/konten/product', 'Product::product');