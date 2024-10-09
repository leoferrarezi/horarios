<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AreaTrabalho extends BaseController
{
    public function index()
    {
        //
    }
    public function areaTrabalho(): string
    {
        $data['content'] = view('sys/user-desktop');
        return view('dashboard', $data);
    }
}