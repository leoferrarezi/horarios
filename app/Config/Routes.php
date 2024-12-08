<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Shield Auth routes
service('auth')->routes($routes);
service('auth')->routes($routes, ['except' => ['login', 'register']]);

$routes->get('/', 'Home::home');
$routes->get('/sys', 'Home::home');
$routes->get('/sys/home', 'Home::home');
$routes->get('/sys/em-construcao', 'Home::emConstrucao');

//matriz curricular (em construção)
$routes->get('sys/matriz-curricular', 'MatrizCurricular::index');

//cadastro de turmas (em construção)
$routes->get('sys/cadastro-turmas', 'Turmas::index');

//cadastro de ambientes (em construção)
$routes->get('sys/cadastro-ambientes', 'Ambientes::index');
$routes->post('sys/cadastro-ambientes/salvar', 'Ambientes::salvar');
$routes->post('sys/cadastro-ambientes/deletar/(:num)', 'Ambientes::deletar/$1');

//cadastro de aulas (em construção)
$routes->get('sys/cadastro-aulas', 'Aulas::index');

//horarios de aula (em construção)
$routes->get('sys/cadastro-horarios-de-aula', 'TemposAula::cadastro');

//Relatórios (em construção)
$routes->get('sys/relatorios', 'Relatorios::index');

//adicionar o filter (middleware de login no group depois)
$routes->group('sys', function ($routes) {
    //CRUD Professor
    $routes->group('professor', function ($routes) {
        $routes->get('', 'Professor::index');
        $routes->get('listar', 'Professor::index');
        $routes->get('cadastro', 'Professor::cadastro');
        $routes->post('salvar', 'Professor::salvar');
        $routes->post('atualizar', 'Professor::atualizar');
        $routes->post('deletar', 'Professor::deletar');

        $routes->get('(:num)', 'Professor::professorPorId/$1');        
        //Rota área de trabalho
        $routes->get('horarios', 'Professor::horarios');
    });
    $routes->group('curso', function ($routes){
        $routes->get('', 'Cursos::index');
        $routes->get('listar', 'Cursos::index');
        $routes->get('cadastro', 'Cursos::cadastro');
        $routes->post('salvar', 'Cursos::salvar');
        $routes->post('atualizar', 'Cursos::atualizar');
        $routes->post('deletar', 'Cursos::deletar');
    });
    $routes->group('disciplina', function ($routes) {
        //CRUD Disciplinas
        $routes->get('', 'Disciplinas::index');
        $routes->get('listar', 'Disciplinas::index');
        $routes->get('cadastro', 'Disciplinas::cadastro');
        $routes->post('salvar', 'Disciplinas::salvar');
        $routes->post('atualizar', 'Disciplinas::atualizar');
        $routes->post('deletar', 'Disciplinas::deletar');
    });
    $routes->group('importacao', function ($routes) {
        // Rotas importacao planilhas
        $routes->get('', 'Importacao::index');
        $routes->post('importar', 'Importacao::importar_planilha');
        $routes->post('salvar', 'Importacao::importar_selecionados');
        
    });
});
