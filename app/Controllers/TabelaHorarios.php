<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CursosModel;
use App\Models\VersoesModel;
use App\Models\AmbientesModel;
use App\Models\AulaHorarioModel;

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
        $dado['aula_id'] = strip_tags($dadosPost['aula_id']);
        $dado['tempo_de_aula_id'] = strip_tags($dadosPost['tempo_de_aula_id']);
        $dado['ambiente_id'] = strip_tags($dadosPost['ambiente_id']);

        $versaoModel = new VersoesModel();
        $dado['versao_id'] = $versaoModel->getVersaoByUser(auth()->id());

        $aulaHorarioModel = new AulaHorarioModel();

        //verificar se já existe para fazer a substituição
        $aulaHorarioModel->deleteAulaNoHorario($dado['aula_id'], $dado['tempo_de_aula_id'], $dado['versao_id']);

        if ($aulaHorarioModel->insert($dado))
        {            
            echo "1";
        }
        else
        {
            echo "0";
        }
    }

    public function removerAula()
    {
        $dadosPost = $this->request->getPost();
        $dado['aula_id'] = strip_tags($dadosPost['aula_id']);
        $dado['tempo_de_aula_id'] = strip_tags($dadosPost['tempo_de_aula_id']);

        $versaoModel = new VersoesModel();
        $dado['versao_id'] = $versaoModel->getVersaoByUser(auth()->id());

        $aulaHorarioModel = new AulaHorarioModel();

        //verificar se já existe para fazer a substituição
        $aulaHorarioModel->deleteAulaNoHorario($dado['aula_id'], $dado['tempo_de_aula_id'], $dado['versao_id']);
        echo "1";        
    }
}
