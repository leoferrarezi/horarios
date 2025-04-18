<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CursosModel;
use App\Models\VersoesModel;
use App\Models\AmbientesModel;

class TabelaGeral extends BaseController
{
    public function index()
    {
        $ambientesModel = new AmbientesModel();
        $data['ambientes'] = $ambientesModel->findAll();

        $cursosModel = new CursosModel();
        $data['cursos'] = $cursosModel->findAll();

        $versaoModel = new VersoesModel();
        $versao = $versaoModel->getVersaoByUser(auth()->id());
        if (empty($versao))
        {
            $versao = $versaoModel->getLastVersion();
            $versaoModel->setVersaoByUser(auth()->id(), $versao);
        }

        if ($versao > 0)
        {
            $versao = $versaoModel->find($versao);
            $data['semestre'] = $versao['semestre'];
        }

        $this->content_data['content'] = view('sys/tabela-geral-horarios.php', $data);
        return view('dashboard', $this->content_data);
    }
}
