<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HorariosModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\ReferenciaException;

class Horario extends BaseController
{
    public function index()
    {
        $horarioModel = new HorariosModel();
        $data['horarios'] = $horarioModel->orderBy('nome', 'asc')->findAll();
        $data['content'] = view('sys/horarios', $data);
        return view('dashboard', $data);
    }

    public function salvar()
    {
        $horarioModel = new HorariosModel();

        //coloca todos os dados do formulario no vetor dadosPost
        $dadosPost = $this->request->getPost();
        $dadosLimpos['nome'] = strip_tags($dadosPost['nome']);

        
        if ($horarioModel->insert($dadosLimpos)) {
            
            session()->setFlashdata('sucesso', 'Horário cadastrado com sucesso.');
            return redirect()->to(base_url('/sys/horario'));
        } else {
            $data['erros'] = $horarioModel->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/horario'))->with('erros', $data['erros'])->withInput(); //retora com os erros e os inputs
        }
    }
    public function atualizar(){

        $dadosPost = $this->request->getPost();

        $dadosLimpos['id'] = strip_tags($dadosPost['id']);        
        $dadosLimpos['nome'] = strip_tags($dadosPost['nome']);

        $horarioModel = new HorariosModel();
        if($horarioModel->save($dadosLimpos)){
            session()->setFlashdata('sucesso', 'Horário atualizado com sucesso.');
            return redirect()->to(base_url('/sys/horario')); // Redireciona para a página de listagem
        } else {
            $data['erros'] = $horarioModel->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/horario'))->with('erros', $data['erros']); //retora com os erros
        }

    }
    public function deletar(){
        
        $dadosPost = $this->request->getPost();
        $id = strip_tags($dadosPost['id']);

        $horarioModel = new HorariosModel();
        try {
            if ($horarioModel->delete($id)) {
                session()->setFlashdata('sucesso', 'Horário excluído com sucesso.');
                return redirect()->to(base_url('/sys/horario'));
            } else {
                return redirect()->to(base_url('/sys/horario'))->with('erro', 'Falha ao deletar horário');
            }
        } catch (ReferenciaException $e) {
            return redirect()->to(base_url('/sys/horario'))->with('erros', ['erro' => $e->getMessage()]);
        }
    }
}
