<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\LoginController; // Corrigido aqui

/**
 * @var RouteCollection $routes
 */

// Shield Auth routes
service('auth')->routes($routes, ['except' => ['login']]);

// Definindo a rota de login para usar o seu controller personalizado
$routes->get('login', [LoginController::class, 'loginView'], ['as' => 'login']);
$routes->post('login', [LoginController::class, 'loginAction']);

$routes->get('/', 'Home::home');
$routes->get('/sys', 'Home::home');
$routes->get('/sys/home', 'Home::home');
$routes->get('/sys/em-construcao', 'Home::emConstrucao');

//cadastro de turmas
$routes->get('sys/cadastro-turmas', 'Turmas::index');

//cadastro de ambientes
$routes->get('sys/cadastro-ambientes', 'Ambientes::index');
$routes->post('sys/cadastro-ambientes/salvar-ambiente', 'Ambientes::salvarAmbiente');
$routes->post('sys/cadastro-ambientes/deletar-ambiente', 'Ambientes::deletarAmbiente');
$routes->post('sys/cadastro-ambientes/atualizar-ambiente', 'Ambientes::atualizarAmbiente');
$routes->post('sys/cadastro-ambientes/salvar-grupo-ambientes', 'Ambientes::salvarGrupoAmbientes');
$routes->post('sys/cadastro-ambientes/deletar-grupo-ambientes', 'Ambientes::deletarGrupoAmbientes');
$routes->post('sys/cadastro-ambientes/editar-grupo-ambientes', 'Ambientes::editarGrupoAmbientes');
$routes->post('sys/cadastro-ambientes/adicionar-ambientes-grupo', 'Ambientes::adicionarAmbientesAoGrupo');
$routes->post('sys/cadastro-ambientes/remover-ambientes-grupo', 'Ambientes::removerAmbienteDoGrupo');

//horarios de aula
$routes->get('sys/cadastro-horarios-de-aula', 'TemposAula::cadastro');

//Relatórios
$routes->get('sys/relatorios', 'Relatorios::index');

//Tabela Geral de Horários
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
        // $routes->get('preferencias/(:num)', 'Professor::preferencias/$1');
        $routes->post('salvarRestricoes', 'Professor::salvarRestricoes');
        $routes->get('restricoes/(:num)', 'Professor::buscarRestricoes/$1');
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
        $routes->post('importarDisciplinas', 'MatrizCurricular::importarDisciplinas');
        $routes->post('processarImportacaoDisciplinas', 'MatrizCurricular::processarImportacaoDisciplinas');
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
        $routes->post('importar', 'Cursos::importar');
        $routes->post('processarImportacao', 'Cursos::processarImportacao');
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
        $routes->post('importar', 'Turmas::importar');
        $routes->post('processarImportacao', 'Turmas::processarImportacao');
        $routes->get('getTurmasByCurso/(:num)', 'Turmas::getTurmasByCurso/$1');
        $routes->get('getTurmasByCursoAndSemestre/(:num)/(:num)', 'Turmas::getTurmasByCursoAndSemestre/$1/$2');        
    });

    $routes->group('aulas', function ($routes) {
        $routes->get('', 'Aulas::index');
        $routes->post('salvar', 'Aulas::salvar');
        $routes->post('deletar', 'Aulas::deletar');
        $routes->post('atualizar', 'Aulas::atualizar');
        $routes->get('getAulasFromTurma/(:num)', 'Aulas::getAulasFromTurma/$1');
    });

    $routes->group('versao', function ($routes) {

        $routes->get('', 'Versao::index');
        $routes->get('listar', 'Versao::index');
        $routes->get('cadastro', 'Versao::cadastro');
        $routes->post('salvar', 'Versao::salvar');
        $routes->post('atualizar', 'Versao::atualizar');
        $routes->post('deletar', 'Versao::deletar');
        $routes->post('ativar', 'Versao::ativar');
        $routes->post('duplicar', 'Versao::duplicar');
    });

    $routes->group('admin', ['filter' => 'admin'], function ($routes) {
        $routes->get('/', 'AdminController::index'); // Página inicial da admin
        $routes->post('alterar-grupo', 'AdminController::alterarGrupoUsuario'); // Atribuir
        $routes->post('atualizar-usuario', 'AdminController::atualizarUsuario');
        $routes->post('resetar-senha', 'AdminController::resetarSenha'); // Atualizar senha
        $routes->post('desativar-usuario', 'AdminController::desativarUsuario');
        $routes->post('registrar-usuario', 'AdminController::registrarUsuario');
        $routes->get('usuarios-inativos', 'AdminController::usuariosInativos');
        $routes->post('reativar-usuario', 'AdminController::reativarUsuario');
        $routes->post('excluir-permanentemente', 'AdminController::excluirPermanentemente');
    });
});
