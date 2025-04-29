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
use App\Models\VersoesModel;

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
		$data['turmas'] = $turmasModel->orderBy('CHAR_LENGTH(sigla)')->orderBy('sigla')->findAll();
		$data['cursos'] = $cursosModel->findAll();
		$data['disciplinas'] = $disciplinasModel->findAll();
		$data['professores'] = $professorModel->orderBy('nome')->findAll();
		$data['matrizes'] = $matrizModel->findAll();

		$data['consulta'] = $aulaModel->getAulasComTurmaDisciplinaEProfessores();

		$this->content_data['content'] = view('sys/aulas', $data);
        return view('dashboard', $this->content_data);
	}

	public function salvar()
	{
		$dadosPost = $this->request->getPost();

		$aula = new AulasModel();
		$aula_prof = new AulaProfessorModel();
		$versaoModel = new VersoesModel();

		foreach ($dadosPost['turmas'] as $k => $v) {
			$insert = ["disciplina_id" => $dadosPost['disciplina'], "turma_id" => $v, "versao_id" => $versaoModel->getVersaoByUser(auth()->id())];
			if ($id_aula = $aula->insert($insert)) {
				foreach ($dadosPost['professores'] as $k2 => $v2) {
					$prof_insert = ["professor_id" => $v2, "aula_id" => $id_aula];
					$aula_prof->insert($prof_insert);
				}
			}
		}

		//Criar e testar uma FLAG pra informar se foi sucesso mesmo.
		//Importante efetuar o rollback de tudo que der errado pra não deixar dados-fantasma no banco
		session()->setFlashdata('sucesso', 'Aula(s) cadastrada(s) com sucesso!');
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
		$versaoModel = new VersoesModel();

		$aula_prof = new AulaProfessorModel();
		$aula_prof->where('aula_id', $id)->delete();

		foreach ($dadosPost['professores'] as $k => $v) {
			$prof_insert = ["professor_id" => $v, "aula_id" => $id];
			$aula_prof->insert($prof_insert);
		}

		$update = ["id" => $id, "disciplina_id" => $dadosPost['disciplina'], "turma_id" => $dadosPost['turma'], "versao_id" => $versaoModel->getVersaoByUser(auth()->id())];

		if ($aula->save($update)) {
			session()->setFlashdata('sucesso', 'Dados da Aula atualizados com sucesso!');
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
		session()->setFlashdata('sucesso', 'Aula Removida com sucesso!');
		return redirect()->to(base_url('/sys/aulas'));

		//} catch (ReferenciaException $e) {
		//	return redirect()->to(base_url('/sys/professor'))->with('erros', ['erro' => $e->getMessage()]);
		//}
	}

	public function getAulasFromTurma($turma)
	{
		$aula = new AulasModel();
		$aulas = $aula->select('aulas.id, disciplinas.nome as disciplina, disciplinas.ch, professores.nome as professor')
						->join('disciplinas', 'disciplinas.id = aulas.disciplina_id')
						->join('aula_professor', 'aula_professor.aula_id = aulas.id')
						->join('professores', 'professores.id = aula_professor.professor_id')
						->where('aulas.turma_id', $turma)
						->findAll();

		return json_encode($aulas);
	}
}
