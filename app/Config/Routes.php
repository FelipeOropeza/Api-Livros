<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('', ['filter' => 'cors'], static function (RouteCollection $routes): void {
    $routes->get('/', 'LivroController::index');
    $routes->post('livro', 'LivroController::create', ['filter' => 'auth']);
    $routes->get('livro', 'LivroController::getAllBook');
    $routes->get('livro/(:num)', 'LivroController::getIdBook/$1');
    $routes->post('categoria', 'CategoriaController::create', ['filter' => 'auth']);
    $routes->get('categoria', 'CategoriaController::getAllCategory');
    $routes->post('token', 'TokenController::generateToken');

    $routes->options('livro', static fn () => null);
    $routes->options('livro/(:any)', static fn () => null);
    $routes->options('categoria', static fn () => null);
    $routes->options('categoria/(:any)', static fn () => null);
});
