<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VersoesModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\ReferenciaException;

class Versao extends BaseController
{
    public function index()
    {
        $versao = new VersoesModel();
        $data['versoes'] = $versao->orderBy('nome', 'asc')->findAll();
        $data['content'] = view('sys/lista-versoes', $data);
        return view('dashboard', $data);
    }

    public function salvar()
    {
        $versao = new VersoesModel();

        //coloca todos os dados do formulario no vetor dadosPost
        $dadosPost = $this->request->getPost();
        $dadosLimpos['nome'] = strip_tags($dadosPost['nome']);

        
        if ($versao->insert($dadosLimpos)) {
            
            session()->setFlashdata('sucesso', 'Versão cadastrado com sucesso.');
            return redirect()->to(base_url('/sys/versao'));
        } else {
            $data['erros'] = $versao->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/versao'))->with('erros', $data['erros'])->withInput(); //retora com os erros e os inputs
        }
    }
    public function atualizar(){

        $dadosPost = $this->request->getPost();

        $dadosLimpos['id'] = strip_tags($dadosPost['id']);        
        $dadosLimpos['nome'] = strip_tags($dadosPost['nome']);

        $versao = new VersoesModel();
        if($versao->save($dadosLimpos)){
            session()->setFlashdata('sucesso', 'Versão atualizado com sucesso.');
            return redirect()->to(base_url('/sys/versao')); // Redireciona para a página de listagem
        } else {
            $data['erros'] = $versao->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/versao'))->with('erros', $data['erros']); //retora com os erros
        }

    }
    public function deletar(){
        
        $dadosPost = $this->request->getPost();
        $id = strip_tags($dadosPost['id']);

        $versao = new VersoesModel();
        try {
            
            if ($versao->delete($id)) {
                session()->setFlashdata('sucesso', 'Versão excluído com sucesso.');
                return redirect()->to(base_url('/sys/versao'));
            } else {
                return redirect()->to(base_url('/sys/versao'))->with('erro', 'Falha ao deletar versão');
            }
        } catch (ReferenciaException $e) {
            return redirect()->to(base_url('/sys/versao'))->with('erros', ['erro' => $e->getMessage()]);
        }
    }
}
