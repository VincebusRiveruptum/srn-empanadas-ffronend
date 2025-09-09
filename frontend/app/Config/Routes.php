<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/empanadas', 'Empanadas::index');
$routes->get('/empanadas/(:num)', 'Empanadas::show/$1');
$routes->get('/empanadas/create', 'Empanadas::create');
$routes->get('/empanadas/(:num)/edit', 'Empanadas::edit/$1');
$routes->get('/empanadas/(:num)/delete', 'Empanadas::delete/$1');
