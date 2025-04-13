<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TabelaGeral extends BaseController
{
    public function index()
    {
        $this->content_data['content'] = view('sys/tabela-geral-horarios.php');
        return view('dashboard', $this->content_data);
    }
}
