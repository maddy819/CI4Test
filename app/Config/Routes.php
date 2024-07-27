<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['as' => 'home']);
$routes->get('/about', 'AboutController::index', ['as' => 'about']);
$routes->get('/contact', 'ContactController::index', ['as' => 'contact']);


$routes->group('order', static function ($routes) {
    $routes->get('/', 'OrdersController::index', ['as' => 'orders']);
    $routes->post('save', 'OrdersController::saveOrder', ['as' => 'orders-save']);
    $routes->get('edit/(:any)', 'OrdersController::editOrder/$1', ['as' => 'orders-edit']);
    $routes->get('delete/(:any)', 'OrdersController::deleteOrder/$1', ['as' => 'orders-delete']);
});

$routes->group('shop', static function ($routes) {
    $routes->get('/', 'ShopController::index', ['as' => 'shop']);
    $routes->get('category', 'ShopController::category', ['as' => 'shop-category']);
});


