<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MatrizCurricularModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\ReferenciaException;

class MatrizCurricular extends BaseController
{
    public function index()
    {
        $matrizModel = new MatrizCurricularModel();
        $data['matrizes'] = $matrizModel->orderBy('nome', 'asc')->findAll();
        $data['content'] = view('sys/lista-matriz', $data);
        return view('dashboard', $data);
    }

    public function salvar()
    {
        $matrizModel = new MatrizCurricularModel();

        //coloca todos os dados do formulario no vetor dadosPost
        $dadosPost = $this->request->getPost();
        $dadosLimpos['nome'] = strip_tags($dadosPost['nome']);

        
        if ($matrizModel->insert($dadosLimpos)) {
            
            session()->setFlashdata('sucesso', 'Matriz cadastrado com sucesso.');
            return redirect()->to(base_url('/sys/matriz'));
        } else {
            $data['erros'] = $matrizModel->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/matriz'))->with('erros', $data['erros'])->withInput(); //retora com os erros e os inputs
        }
    }
    public function atualizar(){

        $dadosPost = $this->request->getPost();

        $dadosLimpos['id'] = strip_tags($dadosPost['id']);        
        $dadosLimpos['nome'] = strip_tags($dadosPost['nome']);

        $matrizModel = new MatrizCurricularModel();
        if($matrizModel->save($dadosLimpos)){
            session()->setFlashdata('sucesso', 'Matriz atualizado com sucesso.');
            return redirect()->to(base_url('/sys/matriz')); // Redireciona para a página de listagem
        } else {
            $data['erros'] = $matrizModel->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/matriz'))->with('erros', $data['erros']); //retora com os erros
        }

    }
    public function deletar(){
        
        $dadosPost = $this->request->getPost();
        $id = strip_tags($dadosPost['id']);

        $matrizModel = new MatrizCurricularModel();
        try {
            
            if ($matrizModel->delete($id)) {
                session()->setFlashdata('sucesso', 'Matriz excluído com sucesso.');
                return redirect()->to(base_url('/sys/matriz'));
            } else {
                return redirect()->to(base_url('/sys/matriz'))->with('erro', 'Falha ao deletar matriz');
            }
        } catch (ReferenciaException $e) {
            return redirect()->to(base_url('/sys/matriz'))->with('erros', ['erro' => $e->getMessage()]);
        }
    }
}
