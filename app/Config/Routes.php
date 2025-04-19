<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LivroController::index');
$routes->post('livro', 'LivroController::create');
$routes->post('livro', 'LivroController::getAllBook');
$routes->post('categoria', 'CategoriaController::create');
$routes->get('categoria', 'CategoriaController::getAllCategory');
