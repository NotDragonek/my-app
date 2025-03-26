<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Admin routes
$routes->get('admin/dashboard', 'AdminController::dashboard');
$routes->get('admin/products', 'AdminController::products');
$routes->get('admin/categories', 'AdminController::categories');
$routes->get('admin/delete_user/(:num)', 'AdminController::delete_user/$1');
$routes->get('admin/delete_product/(:num)', 'AdminController::delete_product/$1');
$routes->get('admin/delete_category/(:num)', 'AdminController::delete_category/$1');

// Seller routes
$routes->get('/seller', 'SellerController::index');  
$routes->get('/seller/add_product', 'SellerController::add_product');  
$routes->post('/seller/save_product', 'SellerController::save_product');  
$routes->get('/seller/edit_product/(:num)', 'SellerController::edit_product/$1');  
$routes->post('/seller/update_product/(:num)', 'SellerController::update_product/$1');  
$routes->get('/seller/delete_product/(:num)', 'SellerController::delete_product/$1');  


// Auth routes
$routes->get('/auth/login', 'AuchController::login');
$routes->get('/auth/register', 'AuchController::register');
$routes->get('/auth/logout', 'AuchController::logout');

// Category routes
$routes->get('/category', 'CategoryController::index');
$routes->get('/category/view/(:num)', 'CategoryController::view/$1');

// Product routes
$routes->get('/product/list', 'ProductController::index');
$routes->get('/product/details/(:num)', 'ProductController::details/$1');


// Cart routes
$routes->get('/cart', 'CartController::index');
$routes->get('/cart/add/(:num)', 'CartController::add/$1');
$routes->get('/cart/remove/(:num)', 'CartController::remove/$1');

// Default controller (home page)
$routes->get('/', 'Home::index');

// 404 Error page
$routes->set404Override();
