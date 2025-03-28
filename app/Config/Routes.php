<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Admin routes
$routes->get('admin/dashboard', 'AdminController::dashboard');
$routes->get('admin/products', 'AdminController::products');
$routes->get('admin/users', 'AdminController::users');
$routes->get('admin/delete_product/(:num)', 'AdminController::delete_product/$1');
$routes->get('admin/delete_user/(:num)', 'AdminController::delete_user/$1');
$routes->get('admin/edit_product/(:num)', 'AdminController::edit_product/$1');
$routes->post('admin/update_product/(:num)', 'AdminController::update_product/$1');


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
$routes->post('/auth/process_register', 'AuchController::process_register');
$routes->post('/auth/process_login', 'AuchController::process_login');
$routes->get('/auth/logout', 'AuchController::logout');

// Category routes 
$routes->get('/category', 'CategoryController::index');
$routes->get('/category/view/(:num)', 'CategoryController::view/$1');

// Product routes
$routes->get('/product/list', 'ProductController::index');
$routes->get('/product/details/(:num)', 'ProductController::details/$1');


// Cart routes
$routes->post('cart/add/(:num)', 'CartController::add_to_cart/$1');
$routes->get('cart/view', 'CartController::view_cart');
$routes->get('cart/remove_item/(:num)', 'CartController::remove_item/$1');
$routes->get('cart/purchase', 'CartController::purchase');
$routes->get('cart/clear_cart', 'CartController::clear_cart');


// Default controller (home page)
$routes->get('/', 'Home::index');

// 404 Error page
$routes->set404Override();
