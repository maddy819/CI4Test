<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['as' => 'home']);
$routes->get('/about', 'AboutController::index', ['as' => 'about']);
$routes->get('/contact', 'ContactController::index', ['as' => 'contact']);

$routes->group('shop', static function ($routes) {
    $routes->get('/', 'ShopController::index', ['as' => 'shop']);
    $routes->get('category', 'ShopController::category', ['as' => 'shop-category']);
});


