<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Livro::index');
$routes->post('categoria', 'CategoriaController::create');