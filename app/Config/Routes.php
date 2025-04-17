<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LivroController::index');
$routes->post('categoria', 'CategoriaController::create');