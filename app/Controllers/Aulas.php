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

	public function salvar()
	{
		$dadosPost = $this->request->getPost();

		$aula = new AulasModel(); //disciplina_id , turma_id , versao_id

		foreach ($dadosPost['turmas'] as $k => $v) {
			$insert = ["disciplina_id" => $dadosPost['disciplina'], "turma_id" => $v, "versao_id" => 1];
			if ($aula->insert($insert)) {
				//session()->setFlashdata('sucesso', 'Professor cadastrado com sucesso.');
				//return redirect()->to(base_url('/sys/professor')); // Redireciona para a página de listagem
			} else {
				$data['erros'] = $aula->errors(); //o(s) erro(s)
				return redirect()->to(base_url('/sys/aulas'))->with('erros', $data['erros'])->withInput();
			}
		}

		session()->setFlashdata('sucesso', 'Aula(s) cadastrada(s) com sucesso.');
		return redirect()->to(base_url('/sys/aulas'));
	}

    public function teste(){
        $aulaModel = new AulasModel();
        $dados = $aulaModel->getAulasComTurmaDisciplinaEProfessores();
        return $this->response->setJSON($dados);
    }
}
