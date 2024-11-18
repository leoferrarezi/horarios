<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CursosModel;
use App\Models\MatrizCurricularModel;

class Cursos extends BaseController
{

    public function index()
    {
        // Cria a instância de um model do curso
        $cursoModel = new CursosModel();
        $matrizCurricularModel = new MatrizCurricularModel();
        // Faz a busca por todos os cursos cadastrado no banco (tabela cursos)
        $data['matrizes'] = $matrizCurricularModel->orderBy('nome', 'asc')->findAll();
        $data['cursos'] = $cursoModel->orderBy('nome', 'asc')->getCursosWithMatriz();
        // Exibe os cursos cadastrados
        $data['content'] = view('sys/lista-cursos', $data);
        return view('dashboard', $data);
    }

    public function salvar()
    {
        $cursoModel = new CursosModel();

        //coloca todos os dados do formulario no vetor dadosPost
        $dadosPost = $this->request->getPost();

        $dadosLimpos['nome'] = strip_tags($dadosPost['nome']);
        $dadosLimpos['matriz_id'] = strip_tags($dadosPost['matriz_id']);

        //tenta cadastrar o novo professor no banco
        if ($cursoModel->insert($dadosLimpos)) {
            //se deu certo, direciona pra lista de cursos
            session()->setFlashdata('sucesso', 'Curso cadastrado com sucesso.');
            return redirect()->to(base_url('/sys/curso')); // Redireciona para a página de listagem
        } else {
            $data['erros'] = $cursoModel->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/curso'))->with('erros', $data['erros'])->withInput(); //retora com os erros e os inputs
        }
    }
    public function atualizar(){

        $dadosPost = $this->request->getPost();

        $dadosLimpos['id'] = strip_tags($dadosPost['id']);        
        $dadosLimpos['nome'] = strip_tags($dadosPost['nome']);
        $dadosLimpos['matriz_id'] = strip_tags($dadosPost['matriz_id']);

        $cursoModel = new CursosModel();
        if($cursoModel->save($dadosLimpos)){
            session()->setFlashdata('sucesso', 'Professor atualizado com sucesso.');
            return redirect()->to(base_url('/sys/curso')); // Redireciona para a página de listagem
        } else {
            $data['erros'] = $cursoModel->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/curso'))->with('erros', $data['erros']); //retora com os erros
        }

    }
    public function deletar(){
        
        $dadosPost = $this->request->getPost();
        $id = strip_tags($dadosPost['id']);

        $cursoModel = new CursosModel();
        
        if ($cursoModel->delete($id)) {
            session()->setFlashdata('sucesso', 'Curso excluído com sucesso.');
            return redirect()->to(base_url('/sys/curso'));
        } else {
            return redirect()->to(base_url('/sys/curso'))->with('erro', 'Falha ao deletar professor');
        }
    }
}
