<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Relatorios extends BaseController
{
    public function index()
    {
        $data['content'] = view('sys/em-construcao');
        return view('dashboard', $data);

    }
}
