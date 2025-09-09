<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/empanadas', 'Empanadas::index');
$routes->get('/empanadas/create', 'Empanadas::create');
$routes->get('/empanadas/edit', 'Empanadas::create');
