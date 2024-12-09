<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AmbientesModel;

class Ambientes extends BaseController
{
    public function index()
    {
        $ambientesModel = new AmbientesModel();
        $data['ambientes'] = $ambientesModel->findAll();

        $data['content'] = view('sys/cadastro-ambientes', $data);
        return view('dashboard', $data);
    }

    public function salvar()
    {
        $ambiente = new AmbientesModel();

        $data['ambientes'] = $ambiente->findAll();

        $dadosPost = $this->request->getPost();

        //verifica se já existe um ambiente com o mesmo nome
        if ($ambiente->where('nome', $dadosPost['nome'])->first()) {
            session()->setFlashdata('erro', 'Nome do ambiente já cadastrado');
            return redirect()->to(base_url('sys/cadastro-ambientes'))->withInput();
        }

        if ($ambiente->insert($dadosPost)) {
            session()->setFlashdata('sucesso', 'ambiente cadastrado com sucesso.');
            return redirect()->to(base_url('sys/cadastro-ambientes'));
        } else {
            $data['erros'] = $ambiente->errors();
            return redirect()->to(base_url('sys/cadastro-ambientes'))->with('erros', $data['erros'])->withInput();
        }
    }

    public function atualizar($id)
    {
        $ambienteModel = new ambientesModel();

        $novoNome = trim($this->request->getPost('nome'));

        if ($ambienteModel->where('nome', $novoNome)->first()) {
            session()->setFlashdata('erro', 'Já existe um ambiente com este nome.');
            return redirect()->to(base_url('sys/cadastro-ambientes'))->withInput();
        }
        if ($ambienteModel->update($id, ['nome' => $novoNome])) {
            session()->setFlashdata('sucesso', 'Ambiente atualizado com sucesso.');
            return redirect()->to(base_url('sys/cadastro-ambientes'));
        } else {
            session()->setFlashdata('erro', 'Erro ao atualizar o ambiente.');
            return redirect()->to(base_url('sys/cadastro-ambientes'))->withInput();
        }
    }

    public function deletar($id)
    {
        $ambienteModel = new ambientesModel();

        // Deletar o ambiente pelo ID
        if ($ambienteModel->delete($id)) {
            session()->setFlashdata('sucesso', 'Ambiente deletado com sucesso.');
            return redirect()->to(base_url('/sys/cadastro-ambientes'));
        } else {
            return redirect()->to(base_url('/sys/cadastro-ambientes'))->with('erro', 'Falha ao deletar ambiente');
        }
    }
}
