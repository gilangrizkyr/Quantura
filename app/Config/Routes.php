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

$routes->get('/', 'Product::index'); // Halaman utama menampilkan produk
$routes->get('/product', 'Product::index'); // Alias /product

// CRUD Routing
$routes->post('/product/save', 'Product::save');
$routes->get('/product/edit/(:num)', 'Product::edit/$1');
$routes->get('/product/detail/(:num)', 'Product::detail/$1');
$routes->get('/product/delete/(:num)', 'Product::delete/$1');
