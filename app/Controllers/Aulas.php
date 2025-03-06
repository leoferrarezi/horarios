<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AulaProfessorModel;
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

		$data['consulta'] = $aulaModel->getAulasComTurmaDisciplinaEProfessores();

		$data['content'] = view('sys/aulas', $data);
		return view('dashboard', $data);
	}

	//TODO - SISTEMA DE VERSÕES NAS INSERÇÕES
	public function salvar()
	{
		$dadosPost = $this->request->getPost();

		$aula = new AulasModel();
		$aula_prof = new AulaProfessorModel();

		foreach ($dadosPost['turmas'] as $k => $v) {
			$insert = ["disciplina_id" => $dadosPost['disciplina'], "turma_id" => $v, "versao_id" => 1];
			if ($id_aula = $aula->insert($insert)) {
				foreach ($dadosPost['professores'] as $k2 => $v2) {
					$prof_insert = ["professor_id" => $v2, "aula_id" => $id_aula];
					$aula_prof->insert($prof_insert);
				}
			}
		}

		//Criar e testar uma FLAG pra informar se foi sucesso mesmo.
		//Importante efetuar o rollback de tudo que der errado pra não deixar dados-fantasma no banco
		session()->setFlashdata('sucesso', 'Aula(s) cadastrada(s) com sucesso.');
		return redirect()->to(base_url('/sys/aulas'));
		/*
			$data['erros'] = $aula->errors(); //o(s) erro(s)
			return redirect()->to(base_url('/sys/aulas'))->with('erros', $data['erros'])->withInput();
		*/
	}

	//TODO - SISTEMA DE VERSÕES NA ATUALIZAÇÃO
	public function atualizar()
	{
		$dadosPost = $this->request->getPost();
		$id = strip_tags($dadosPost['id']);

		$aula = new AulasModel();

		$aula_prof = new AulaProfessorModel();
		$aula_prof->where('aula_id', $id)->delete();

		foreach ($dadosPost['professores'] as $k => $v) {
			$prof_insert = ["professor_id" => $v, "aula_id" => $id];
			$aula_prof->insert($prof_insert);
		}

		$update = ["id" => $id , "disciplina_id" => $dadosPost['disciplina'] , "turma_id" => $dadosPost['turma'] , "versao_id" => 1];

		if ($aula->save($update)) {
			session()->setFlashdata('sucesso', 'Aula atualizada com sucesso.');
			return redirect()->to(base_url('/sys/aulas'));
		} else {
			$data['erros'] = $aula->errors(); //o(s) erro(s)
			return redirect()->to(base_url('/sys/aulas'))->with('erros', $data['erros']);
		}
	}

	//TODO - Realizar a conferencia das referências
	public function deletar()
	{
		$dadosPost = $this->request->getPost();
		$id = strip_tags($dadosPost['id']);

		$aula = new AulasModel();

		//try {
		$aula_prof = new AulaProfessorModel();
		$aula_prof->where('aula_id', $id)->delete();
		$aula->delete($id);
		session()->setFlashdata('sucesso', 'Aula excluída com sucesso.');
		return redirect()->to(base_url('/sys/aulas'));

		//} catch (ReferenciaException $e) {
		//	return redirect()->to(base_url('/sys/professor'))->with('erros', ['erro' => $e->getMessage()]);
		//}
	}
}
