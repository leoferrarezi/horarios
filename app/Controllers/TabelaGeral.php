<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CursosModel;
use App\Models\TurmasModel;


class TabelaGeral extends BaseController
{
    public function index()
    {
        $cursosModel = new CursosModel();
        $data['cursos'] = $cursosModel->findAll();

        /*$turmasModel = new TurmasModel();
        $data['turmas'] = $turmasModel->findAll();*/

        $this->content_data['content'] = view('sys/tabela-geral-horarios.php', $data);
        return view('dashboard', $this->content_data);
    }
}
