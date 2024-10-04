<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/sys', 'Home::sys');

//CRUD Professor
$routes->get('/sys/professor/cadastro', 'Professor::cadastro');

// Rotas importacao planilhas
$routes->get('/sys/importacao', 'Importacao::index'); 
$routes->post('/sys/importacao/importar', 'Importacao::importar_planilha'); 

