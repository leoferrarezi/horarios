<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ProfessorModel;

class Professor extends BaseController
{
    public function index()
    {
    }

    public function cadastro(): string
    {
        // Exibe o formulário de cadastro
        $data['content'] = view('sys/cadastro-professor');
        return view('dashboard', $data);
    }

    public function salvar()
    {
        // Validação dos dados
        $validation = $this->validate([
            'nome' => 'required|min_length[3]',
            'siape' => 'required|numeric',
            'email' => 'required|valid_email',
        ]);

        if (!$validation) {
            // Se a validação falhar, retorna para a view com os erros
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Se passar na validação, salva no banco de dados
        $professorModel = new ProfessorModel();
        
        $professorData = [
            'nome' => $this->request->getPost('nome'),
            'siape' => $this->request->getPost('siape'),
            'email' => $this->request->getPost('email'),
        ];

        $professorModel->save($professorData);

        // Redireciona com mensagem de sucesso
        return redirect()->to('/professor/cadastro')->with('success', 'Professor cadastrado com sucesso!');
    }
}
