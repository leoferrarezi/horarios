<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Cursos extends BaseController
{
    public function cadastro()
    {
        $data['content'] = view('sys/cadastro-cursos');
        return view('dashboard', $data);

    }
}
