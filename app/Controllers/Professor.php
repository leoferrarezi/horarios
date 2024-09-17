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
}
