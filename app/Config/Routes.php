<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/sys', 'Home::sys');

//CRUD Home
$routes->get('/sys/home', 'Home::home');
$routes->get('/sys/em-construcao', 'Home::emConstrucao');

//CRUD Professor
$routes->get('/sys/professor', 'Professor::index');
$routes->get('/sys/professor/listar', 'Professor::index');
$routes->get('/sys/professor/cadastro', 'Professor::cadastro');
$routes->post('/sys/professor/salvar', 'Professor::salvar');

// Rotas importacao planilhas
$routes->get('/sys/importacao', 'Importacao::index'); 
$routes->post('index.php/sys/importacao/importar', 'Importacao::importar_planilha'); 

//Rota área de trabalho
$routes->get('/sys/user-desktop', 'AreaTrabalho::areaTrabalho');
$routes->get('/sys/professor/horarios', 'Professor::horarios');
$routes->get('/sys/professor/confirmar-importacao', 'Professor::validarImportacao');
$routes->get('/sys/professor/listar-professor', 'Professor::listaProfessor');
$routes->get('/sys/professor/importar-professor', 'Professor::importarProfessor');
$routes->get('/sys/disciplina/cadastro', 'Disciplinas::cadastro');