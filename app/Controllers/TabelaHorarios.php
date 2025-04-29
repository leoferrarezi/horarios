<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CursosModel;
use App\Models\VersoesModel;
use App\Models\AmbientesModel;

class TabelaHorarios extends BaseController
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

        $this->content_data['content'] = view('sys/tabela-horarios.php', $data);
        
        return view('dashboard', $this->content_data);
    }

    public function atribuirAula()
    {
        $dadosPost = $this->request->getPost();
        $aula_id = strip_tags($dadosPost['aula_id']);
        $tempo_de_aula_id = strip_tags($dadosPost['tempo_de_aula_id']);
        $ambiente_id = strip_tags($dadosPost['ambiente_id']);

        


        echo "$aula_id $tempo_de_aula_id $ambiente_id";
    }
}
