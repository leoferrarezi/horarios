<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AulaHorarioModel;
use App\Models\AmbientesModel;
use App\Models\CursosModel;
use App\Models\TurmasModel;
use App\Models\ProfessorModel;
use App\Models\GruposAmbientesModel;

class Relatorios extends BaseController
{
    protected $aulaHorarioModel;
    protected $ambientesModel;
    protected $cursosModel;
    protected $turmasModel;
    protected $professorModel;
    protected $gruposAmbientesModel;

    public function __construct()
    {
        $this->aulaHorarioModel = new AulaHorarioModel();
        $this->ambientesModel = new AmbientesModel();
        $this->cursosModel = new CursosModel();
        $this->turmasModel = new TurmasModel();
        $this->professorModel = new ProfessorModel();
        $this->gruposAmbientesModel = new GruposAmbientesModel();
    }

    public function index()
    {
        $data = [
            'cursos' => $this->cursosModel->findAll(),
            'professores' => $this->professorModel->findAll(),
            'ambientes' => $this->ambientesModel->findAll(),
            'gruposAmbientes' => $this->gruposAmbientesModel->findAll(),
        ];

        $this->content_data['content'] = view('sys/relatorios', $data);
        return view('dashboard', $this->content_data);
    }

    public function getTurmasByCurso()
    {
        $cursos = $this->request->getPost('cursos');

        if (empty($cursos)) {
            return $this->response->setJSON([]);
        }

        $turmas = $this->turmasModel
            ->select('id, sigla as text')
            ->whereIn('curso_id', $cursos)
            ->orderBy('sigla', 'ASC')
            ->findAll();

        return $this->response->setJSON($turmas);
    }

    public function getProfessoresByCurso()
    {
        $cursos = $this->request->getPost('cursos');

        if (empty($cursos)) {
            return $this->response->setJSON([]);
        }

        $professores = $this->professorModel
            ->select('professores.id, professores.nome as text')
            ->join('aula_professor', 'aula_professor.professor_id = professores.id')
            ->join('aulas', 'aulas.id = aula_professor.aula_id')
            ->join('turmas', 'turmas.id = aulas.turma_id')
            ->whereIn('turmas.curso_id', $cursos)
            ->where('aulas.versao_id', (new \App\Models\VersoesModel())->getVersaoByUser(auth()->id()))
            ->groupBy('professores.id')
            ->orderBy('professores.nome', 'ASC')
            ->findAll();

        return $this->response->setJSON($professores);
    }

    public function getAmbientesByCurso()
    {
        $cursos = $this->request->getPost('cursos');

        if (empty($cursos)) {
            return $this->response->setJSON([]);
        }

        $ambientes = $this->ambientesModel
            ->select('ambientes.id, ambientes.nome as text')
            ->join('aula_horario_ambiente', 'aula_horario_ambiente.ambiente_id = ambientes.id')
            ->join('aula_horario', 'aula_horario.id = aula_horario_ambiente.aula_horario_id')
            ->join('aulas', 'aulas.id = aula_horario.aula_id')
            ->join('turmas', 'turmas.id = aulas.turma_id')
            ->whereIn('turmas.curso_id', $cursos)
            ->where('aula_horario.versao_id', (new \App\Models\VersoesModel())->getVersaoByUser(auth()->id()))
            ->groupBy('ambientes.id')
            ->orderBy('ambientes.nome', 'ASC')
            ->findAll();

        return $this->response->setJSON($ambientes);
    }

    public function getGruposByCurso()
    {
        $cursos = $this->request->getPost('cursos');

        if (empty($cursos)) {
            return $this->response->setJSON([]);
        }

        $grupos = $this->aulaHorarioModel
            ->select('grupos_de_ambientes.id, grupos_de_ambientes.nome as text')
            ->join('aulas', 'aulas.id = aula_horario.aula_id')
            ->join('turmas', 'turmas.id = aulas.turma_id')
            ->join('aula_horario_ambiente', 'aula_horario_ambiente.aula_horario_id = aula_horario.id')
            ->join('ambientes', 'ambientes.id = aula_horario_ambiente.ambiente_id')
            ->join('ambiente_grupo', 'ambiente_grupo.ambiente_id = ambientes.id')
            ->join('grupos_de_ambientes', 'grupos_de_ambientes.id = ambiente_grupo.grupo_de_ambiente_id')
            ->whereIn('turmas.curso_id', $cursos)
            ->where('aula_horario.versao_id', (new \App\Models\VersoesModel())->getVersaoByUser(auth()->id()))
            ->groupBy('grupos_de_ambientes.id')
            ->orderBy('grupos_de_ambientes.nome', 'ASC')
            ->findAll();

        return $this->response->setJSON($grupos);
    }

    public function gerar()
    {
        $tipo = $this->request->getGet('tipo');

        if (!$tipo) {
            return redirect()->to('/sys/relatorios')->with('error', 'Tipo de relatório não especificado');
        }

        // Carrega os dados com base no tipo de relatório
        switch ($tipo) {
            case 'curso':
                return $this->gerarRelatorioCursos();
            case 'professor':
                return $this->gerarRelatorioProfessores();
            case 'ambiente':
                return $this->gerarRelatorioAmbientes();
            default:
                return redirect()->to('/sys/relatorios')->with('error', 'Tipo de relatório inválido');
        }
    }

    protected function gerarRelatorioCursos()
    {
        $cursos = $this->request->getGet('cursos') ?? [];
        $turmas = $this->request->getGet('turmas') ?? [];

        $builder = $this->aulaHorarioModel
            ->select('
                cursos.nome as curso,
                turmas.sigla as turma,
                disciplinas.nome as disciplina,
                professores.nome as professor,
                ambientes.nome as ambiente,
                tempos_de_aula.dia_semana,
                CONCAT(LPAD(tempos_de_aula.hora_inicio, 2, "0"), ":", LPAD(tempos_de_aula.minuto_inicio, 2, "0")) as hora_inicio,
                CONCAT(LPAD(tempos_de_aula.hora_fim, 2, "0"), ":", LPAD(tempos_de_aula.minuto_fim, 2, "0")) as hora_fim
            ')
            ->join('aulas', 'aulas.id = aula_horario.aula_id')
            ->join('disciplinas', 'disciplinas.id = aulas.disciplina_id')
            ->join('turmas', 'turmas.id = aulas.turma_id')
            ->join('cursos', 'cursos.id = turmas.curso_id')
            ->join('aula_professor', 'aula_professor.aula_id = aulas.id')
            ->join('professores', 'professores.id = aula_professor.professor_id')
            ->join('aula_horario_ambiente', 'aula_horario_ambiente.aula_horario_id = aula_horario.id')
            ->join('ambientes', 'ambientes.id = aula_horario_ambiente.ambiente_id')
            ->join('tempos_de_aula', 'tempos_de_aula.id = aula_horario.tempo_de_aula_id')
            ->where('aula_horario.versao_id', (new \App\Models\VersoesModel())->getVersaoByUser(auth()->id()));

        if (!empty($cursos)) {
            $builder->whereIn('cursos.id', $cursos);
        }

        if (!empty($turmas)) {
            $builder->whereIn('turmas.id', $turmas);
        }

        $dados = $builder->orderBy('cursos.nome')
            ->orderBy('turmas.sigla')
            ->orderBy('tempos_de_aula.dia_semana')
            ->orderBy('tempos_de_aula.hora_inicio')
            ->orderBy('tempos_de_aula.minuto_inicio')
            ->findAll();

        // Organiza os dados por curso e turma para o relatório
        $relatorio = [];
        foreach ($dados as $item) {
            $curso = $item['curso'];
            $turma = $item['turma'];

            if (!isset($relatorio[$curso])) {
                $relatorio[$curso] = [];
            }

            if (!isset($relatorio[$curso][$turma])) {
                $relatorio[$curso][$turma] = [];
            }

            $relatorio[$curso][$turma][] = $item;
        }

        return $this->gerarPDF('relatorio_cursos', [
            'titulo' => 'Relatório por Cursos e Turmas',
            'dados' => $relatorio,
            'filtros' => [
                'cursos' => $this->cursosModel->whereIn('id', $cursos)->findAll(),
                'turmas' => $this->turmasModel->whereIn('id', $turmas)->findAll()
            ]
        ]);
    }

    protected function gerarRelatorioProfessores()
    {
        $professores = $this->request->getGet('professores') ?? [];

        $builder = $this->aulaHorarioModel
            ->select('
                professores.nome as professor,
                cursos.nome as curso,
                turmas.sigla as turma,
                disciplinas.nome as disciplina,
                ambientes.nome as ambiente,
                tempos_de_aula.dia_semana,
                CONCAT(LPAD(tempos_de_aula.hora_inicio, 2, "0"), ":", LPAD(tempos_de_aula.minuto_inicio, 2, "0")) as hora_inicio,
                CONCAT(LPAD(tempos_de_aula.hora_fim, 2, "0"), ":", LPAD(tempos_de_aula.minuto_fim, 2, "0")) as hora_fim
            ')
            ->join('aulas', 'aulas.id = aula_horario.aula_id')
            ->join('disciplinas', 'disciplinas.id = aulas.disciplina_id')
            ->join('turmas', 'turmas.id = aulas.turma_id')
            ->join('cursos', 'cursos.id = turmas.curso_id')
            ->join('aula_professor', 'aula_professor.aula_id = aulas.id')
            ->join('professores', 'professores.id = aula_professor.professor_id')
            ->join('aula_horario_ambiente', 'aula_horario_ambiente.aula_horario_id = aula_horario.id')
            ->join('ambientes', 'ambientes.id = aula_horario_ambiente.ambiente_id')
            ->join('tempos_de_aula', 'tempos_de_aula.id = aula_horario.tempo_de_aula_id')
            ->where('aula_horario.versao_id', (new \App\Models\VersoesModel())->getVersaoByUser(auth()->id()));

        if (!empty($professores)) {
            $builder->whereIn('professores.id', $professores);
        }

        $dados = $builder->orderBy('professores.nome')
            ->orderBy('tempos_de_aula.dia_semana')
            ->orderBy('tempos_de_aula.hora_inicio')
            ->orderBy('tempos_de_aula.minuto_inicio')
            ->findAll();

        // Organiza os dados por professor para o relatório
        $relatorio = [];
        foreach ($dados as $item) {
            $professor = $item['professor'];

            if (!isset($relatorio[$professor])) {
                $relatorio[$professor] = [];
            }

            $relatorio[$professor][] = $item;
        }

        return $this->gerarPDF('relatorio_professores', [
            'titulo' => 'Relatório por Professores',
            'dados' => $relatorio,
            'filtros' => [
                'professores' => $this->professorModel->whereIn('id', $professores)->findAll()
            ]
        ]);
    }

    protected function gerarRelatorioAmbientes()
    {
        $ambientes = $this->request->getGet('ambientes') ?? [];

        $builder = $this->aulaHorarioModel
            ->select('
                ambientes.nome as ambiente,
                cursos.nome as curso,
                turmas.sigla as turma,
                disciplinas.nome as disciplina,
                professores.nome as professor,
                tempos_de_aula.dia_semana,
                CONCAT(LPAD(tempos_de_aula.hora_inicio, 2, "0"), ":", LPAD(tempos_de_aula.minuto_inicio, 2, "0")) as hora_inicio,
                CONCAT(LPAD(tempos_de_aula.hora_fim, 2, "0"), ":", LPAD(tempos_de_aula.minuto_fim, 2, "0")) as hora_fim
            ')
            ->join('aulas', 'aulas.id = aula_horario.aula_id')
            ->join('disciplinas', 'disciplinas.id = aulas.disciplina_id')
            ->join('turmas', 'turmas.id = aulas.turma_id')
            ->join('cursos', 'cursos.id = turmas.curso_id')
            ->join('aula_professor', 'aula_professor.aula_id = aulas.id')
            ->join('professores', 'professores.id = aula_professor.professor_id')
            ->join('aula_horario_ambiente', 'aula_horario_ambiente.aula_horario_id = aula_horario.id')
            ->join('ambientes', 'ambientes.id = aula_horario_ambiente.ambiente_id')
            ->join('tempos_de_aula', 'tempos_de_aula.id = aula_horario.tempo_de_aula_id')
            ->where('aula_horario.versao_id', (new \App\Models\VersoesModel())->getVersaoByUser(auth()->id()));

        if (!empty($ambientes)) {
            $builder->whereIn('ambientes.id', $ambientes);
        }

        $dados = $builder->orderBy('ambientes.nome')
            ->orderBy('tempos_de_aula.dia_semana')
            ->orderBy('tempos_de_aula.hora_inicio')
            ->orderBy('tempos_de_aula.minuto_inicio')
            ->findAll();

        // Organiza os dados por ambiente para o relatório
        $relatorio = [];
        foreach ($dados as $item) {
            $ambiente = $item['ambiente'];

            if (!isset($relatorio[$ambiente])) {
                $relatorio[$ambiente] = [];
            }

            $relatorio[$ambiente][] = $item;
        }

        return $this->gerarPDF('relatorio_ambientes', [
            'titulo' => 'Relatório por Ambientes',
            'dados' => $relatorio,
            'filtros' => [
                'ambientes' => $this->ambientesModel->whereIn('id', $ambientes)->findAll()
            ]
        ]);
    }

    protected function gerarPDF($view, $data) {}
}
