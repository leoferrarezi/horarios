<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/sys', 'Home::sys');

//CRUD Professor
$routes->get('/sys/professor/cadastro', 'Professor::cadastro');
$routes->get('/sys/professor/horarios', 'Professor::horarios');
$routes->get('/sys/professor/confirmar-importacao', 'Professor::validarImportacao');
$routes->get('/sys/professor/listar-professor', 'Professor::listaProfessor');
$routes->get('/sys/professor/importar-professor', 'Professor::importarProfessor');
$routes->get('/sys/disciplina/cadastro', 'Disciplinas::cadastro');