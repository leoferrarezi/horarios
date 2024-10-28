<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfessorModel;

class Professor extends BaseController
{
    
    public function index()
    {
        // Cria a instância de um model do professor
        $professorModel = new ProfessorModel();

        // Faz a busca por todos os professores cadastrado no banco (tabela professores)
        $data['professores'] = $professorModel->findAll();

        // Exibe os professores cadastrados
        $data['content'] = view('sys/lista-professor', $data);
        return view('dashboard', $data);
    }

    public function cadastro(): string
    {
        // Exibe o formulário de cadastro
        $data['content'] = view('sys/cadastro-professor');
        return view('dashboard', $data);
    }

    public function professorPorId($id)
    {
        $professorModel = new ProfessorModel();
        $professor = $professorModel->find($id);

        return $this->response->setJSON($professor);
    }


    public function salvar()
    {
        $professor = new ProfessorModel();

        $data['professores'] = $professor->findAll();

        //coloca todos os dados do formulario no vetor dadosPost
        $dadosPost = $this->request->getPost();

        //Verifica se o SIAPE esta vazio e poe NULL neste caso, pra não ir um SIAPE com valor 0 pro banco
        if (empty($dadosPost['siape'])) {
            $dadosPost['siape'] = NULL;
        }

        //tenta cadastrar o novo professor no banco
        if ($professor->insert($dadosPost)) {
            //se deu certo, direciona pra lista de professores
            session()->setFlashdata('sucesso', 'Professor cadastrado com sucesso.');
            return redirect()->to(base_url('/sys/professor')); // Redireciona para a página de listagem
        } else {
            $data['erros'] = $professor->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/professor'))->with('erros', $data['erros'])->withInput(); //retora com os erros e os inputs
        }
    }
    public function atualizar($id){

        $dadosPost = $this->request->getPost();
        $dadosLimpos['id'] = $id;
        
        $dadosLimpos['nome'] = strip_tags($dadosPost['nome']);
        $dadosLimpos['siape'] = strip_tags($dadosPost['siape']);
        $dadosLimpos['email'] = strip_tags($dadosPost['email']);


        $professorModel = new ProfessorModel();
        if($professorModel->save($dadosLimpos)){
            session()->setFlashdata('sucesso', 'Professor Atualizado com sucesso.');
            return redirect()->to(base_url('/sys/professor')); // Redireciona para a página de listagem
        } else {
            $data['erros'] = $professorModel->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/professor'))->with('erros', $data['erros']); //retora com os erros
        }

    }
    public function deletar($id){
        $professorModel = new ProfessorModel();
        
        // Deletar o usuário pelo ID
        if ($professorModel->delete($id)) {
            session()->setFlashdata('sucesso', 'Professor Deletado com sucesso.');
            return redirect()->to(base_url('/sys/professor'));
        } else {
            return redirect()->to(base_url('/sys/professor'))->with('erro', 'Falha ao deletar professor');
        }
    }
}
