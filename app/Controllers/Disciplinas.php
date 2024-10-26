<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Disciplinas extends BaseController
{
    public function index()
    {
        //
    }
    
    public function cadastro(): string
    {
        $data['content'] = view('sys/cadastro-disciplina');
        return view('dashboard', $data);
    }
}
