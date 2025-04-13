<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Relatorios extends BaseController
{
    public function index()
    {
        $this->content_data['content'] = view('sys/relatorios.php');
        return view('dashboard', $this->content_data);

    }
}
