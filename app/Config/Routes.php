<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/sys', 'Home::sys');

//CRUD Professor
$routes->get('/sys/professor/cadastro', 'Professor::cadastro');
