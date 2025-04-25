<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LivroController::index');
$routes->post('livro', 'LivroController::create', ['filter' => 'auth']);
$routes->get('livro', 'LivroController::getAllBook');
$routes->post('categoria', 'CategoriaController::create', ['filter' => 'auth']);
$routes->get('categoria', 'CategoriaController::getAllCategory');

$routes->post('token', 'TokenController::generateToken');
