<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AulasModel;

class Aulas extends BaseController
{
  public function index() 
  {
    $aulaModel = new AulasModel();

    $data['aulas'] = $aulaModel->findAll();

    // Exibe os professores cadastrados
    $data['content'] = view('sys/lista-aulas', $data);
    return view('dashboard', $data);
  }
}
