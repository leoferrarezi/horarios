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

//cadastro de turmas (em construção)
$routes->get('sys/cadastro-turmas', 'Turmas::index');

//cadastro de ambientes (em construção)
$routes->get('sys/cadastro-ambientes', 'Ambientes::index');
$routes->post('sys/cadastro-ambientes/salvar-ambiente', 'Ambientes::salvarAmbiente');
$routes->post('sys/cadastro-ambientes/deletar-ambiente', 'Ambientes::deletarAmbiente');
$routes->post('sys/cadastro-ambientes/atualizar-ambiente', 'Ambientes::atualizarAmbiente');
$routes->post('sys/cadastro-ambientes/salvar-grupo-ambientes', 'Ambientes::salvarGrupoAmbientes');
$routes->post('sys/cadastro-ambientes/deletar-grupo-ambientes', 'Ambientes::deletarGrupoAmbientes');
$routes->post('sys/cadastro-ambientes/editar-grupo-ambientes', 'Ambientes::editarGrupoAmbientes');
$routes->post('sys/cadastro-ambientes/adicionar-ambientes-grupo', 'Ambientes::adicionarAmbientesAoGrupo');
$routes->post('sys/cadastro-ambientes/remover-ambientes-grupo', 'Ambientes::removerAmbienteDoGrupo');

//cadastro de aulas (em construção)
$routes->get('sys/cadastro-aulas', 'Aulas::index');

//horarios de aula (em construção)
$routes->get('sys/cadastro-horarios-de-aula', 'TemposAula::cadastro');

//Relatórios (em construção)
$routes->get('sys/relatorios', 'Relatorios::index');

//Tabela Geral de Horários (em construção)
$routes->get('sys/tabela-geral-horarios', 'TabelaGeral::index');

//adicionar o filter (middleware de login no group depois)
$routes->group('sys', function ($routes) {

    $routes->group('professor', function ($routes) {
        $routes->get('', 'Professor::index');
        $routes->get('listar', 'Professor::index');
        $routes->get('cadastro', 'Professor::cadastro');
        $routes->post('salvar', 'Professor::salvar');
        $routes->post('atualizar', 'Professor::atualizar');
        $routes->post('deletar', 'Professor::deletar');
        $routes->post('importar', 'Professor::importar');
        $routes->post('processarImportacao', 'Professor::processarImportacao');

        $routes->get('(:num)', 'Professor::professorPorId/$1');
        //Rota área de trabalho
        $routes->get('horarios', 'Professor::horarios');
    });

    $routes->group('matriz', function ($routes) {
        $routes->get('', 'MatrizCurricular::index');
        $routes->get('cadastro', 'MatrizCurricular::cadastro');
        $routes->post('salvar', 'MatrizCurricular::salvar');
        $routes->post('atualizar', 'MatrizCurricular::atualizar');
        $routes->post('deletar', 'MatrizCurricular::deletar');
        $routes->post('importar', 'MatrizCurricular::importar');
        $routes->post('processarImportacao', 'MatrizCurricular::processarImportacao');
    });

    $routes->group('horario', function ($routes) {
        $routes->get('', 'Horario::index');
        $routes->get('cadastro', 'Horario::cadastro');
        $routes->post('salvar', 'Horario::salvar');
        $routes->post('atualizar', 'Horario::atualizar');
        $routes->post('deletar', 'Horario::deletar');
    });

    $routes->group('curso', function ($routes) {
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
    $routes->group('tempoAula', function ($routes) {
        
        $routes->get('', 'TemposAula::index');
        $routes->get('listar', 'TemposAula::index');
        $routes->get('cadastro', 'TemposAula::cadastro');
        $routes->post('salvar', 'TemposAula::salvar');
        $routes->post('atualizar', 'TemposAula::atualizar');
        $routes->post('deletar', 'TemposAula::deletar');
    });
    $routes->group('turma', function ($routes) { 
        $routes->get('', 'Turmas::index');
        $routes->get('listar', 'Turmas::index');
        $routes->get('cadastro', 'Turmas::cadastro');
        $routes->post('salvar', 'Turmas::salvar');
        $routes->post('atualizar', 'Turmas::atualizar');
        $routes->post('deletar', 'Turmas::deletar');
    });
    $routes->group('versao', function ($routes) {
        
        $routes->get('', 'Versao::index');
        $routes->get('listar', 'Versao::index');
        $routes->get('cadastro', 'Versao::cadastro');
        $routes->post('salvar', 'Versao::salvar');
        $routes->post('atualizar', 'Versao::atualizar');
        $routes->post('deletar', 'Versao::deletar');
    });

    // Rotas para alteração da senha do usuário
    $routes->get('alterar-senha', 'AdminController::changePassword');
    $routes->post('alterar-senha', 'AdminController::updatePassword');
});
