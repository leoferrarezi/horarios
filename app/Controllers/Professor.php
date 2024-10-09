<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Professor extends BaseController
{
    public function index()
    {
        //
    }

    public function cadastro(): string
    {
        $data['content'] = view('sys/cadastro-professor');
        return view('dashboard', $data);
    }

    public function salvar(): ResponseInterface
    {
        $professor = new \App\Models\ProfessorModel();

        if($professor->insert($this->request->getPost())){
            echo'inserido com sucesso';
        }else{
            print_r($professor->errors()) ;
        }

        return redirect()->to(uri: '/sys/professor/cadastro');
    }   

    

}
