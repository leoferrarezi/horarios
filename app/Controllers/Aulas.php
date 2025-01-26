<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AulasModel;
use App\Models\TurmasModel;
use App\Models\CursosModel;
use App\Models\DisciplinasModel;
use App\Models\ProfessorModel;
use App\Models\MatrizCurricularModel;

class Aulas extends BaseController
{
    public function index()
    {
        $aulaModel = new AulasModel();
        $turmasModel = new TurmasModel();
        $cursosModel = new CursosModel();
        $disciplinasModel = new DisciplinasModel();
        $professorModel = new ProfessorModel();
        $matrizModel = new MatrizCurricularModel();

        $data['aulas'] = $aulaModel->findAll();
        $data['turmas'] = $turmasModel->findAll();
        $data['cursos'] = $cursosModel->findAll();
        $data['disciplinas'] = $disciplinasModel->findAll();
        $data['professores'] = $professorModel->findAll();
        $data['matrizes'] = $matrizModel->findAll();

        $data['content'] = view('sys/lista-aulas', $data);
        return view('dashboard', $data);
    }
}
