<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/sys', 'Home::sys');

//CRUD Professor
$routes->get('/sys/professor', 'Professor::index');
$routes->get('/sys/professor/listar', 'Professor::index');
$routes->get('/sys/professor/cadastro', 'Professor::cadastro');
$routes->post('/sys/professor/salvar', 'Professor::salvar');

// Rotas importacao planilhas
$routes->get('/sys/importacao', 'Importacao::index'); 
$routes->post('/sys/importacao/importar', 'Importacao::importar_planilha'); 

//Rota área de trabalho
$routes->get('/sys/user-desktop', 'AreaTrabalho::areaTrabalho');