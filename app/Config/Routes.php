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

$routes->get('/', 'Product::index');
$routes->get('/product', 'Product::index');
$routes->post('/product/save', 'Product::save');
$routes->get('/product/edit/(:num)', 'Product::edit/$1');
$routes->get('/product/detail/(:num)', 'Product::detail/$1');
$routes->get('/product/delete/(:num)', 'Product::delete/$1');

$routes->get('/', 'Pergerakan::index');
$routes->get('/pergerakan', 'Pergerakan::index');
$routes->post('/pergerakan/save', 'Pergerakan::save');
$routes->get('/pergerakan/edit/(:num)', 'Pergerakan::edit/$1');
$routes->get('/pergerakan/detail/(:num)', 'Pergerakan::detail/$1');
$routes->get('/pergerakan/delete/(:num)', 'Pergerakan::delete/$1');

$routes->get('/', 'Category::index');
$routes->get('/category', 'Category::index');
$routes->post('/category/save', 'Category::save');
$routes->get('/category/edit/(:num)', 'Category::edit/$1');
$routes->get('/category/detail/(:num)', 'Category::detail/$1');
$routes->get('/category/delete/(:num)', 'Category::delete/$1');

$routes->get('/', 'Warehouse::index');
$routes->get('/warehouse', 'Warehouse::index');
$routes->post('/warehouse/save', 'Warehouse::save');
$routes->get('/warehouse/edit/(:num)', 'Warehouse::edit/$1');
$routes->get('/warehouse/detail/(:num)', 'Warehouse::detail/$1');
$routes->get('/warehouse/delete/(:num)', 'Warehouse::delete/$1');

$routes->get('/', 'Customers::index');
$routes->get('/customers', 'Customers::index');
$routes->post('/customers/save', 'Customers::save');
$routes->get('/customers/edit/(:num)', 'Customers::edit/$1');
$routes->get('/customers/detail/(:num)', 'Customers::detail/$1');
$routes->get('/customers/delete/(:num)', 'Customers::delete/$1');


$routes->get('/', 'Users::index');
$routes->get('/users', 'Users::index');
$routes->post('/users/save', 'Users::save');
$routes->get('/users/edit/(:num)', 'Users::edit/$1');
$routes->get('/users/detail/(:num)', 'Users::detail/$1');
$routes->get('/users/delete/(:num)', 'Users::delete/$1');
