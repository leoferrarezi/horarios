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

        if (empty($cursos))
        {
            return $this->response->setJSON([]);
        }

        $turmas = $this->turmasModel
            ->select('id, sigla as text')
            ->whereIn('curso_id', $cursos)
            ->orderBy('sigla', 'ASC')
            ->findAll();

        return $this->response->setJSON($turmas);
    }

    public function filtrar()
    {
        $tipo = $this->request->getPost('tipo');

        if (!$tipo)
        {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Tipo de relatório não especificado'
            ]);
        }

        switch ($tipo)
        {
            case 'curso':
                $dados = $this->filtrarCursos();
                break;
            case 'professor':
                $dados = $this->filtrarProfessores();
                break;
            case 'ambiente':
                $dados = $this->filtrarAmbientes();
                break;
            default:
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Tipo de relatório inválido'
                ]);
        }

        return $this->response->setJSON([
            'success' => true,
            'data' => $dados
        ]);
    }

    protected function filtrarCursos()
    {
        $cursos = $this->request->getPost('cursos') ?? [];
        $turmas = $this->request->getPost('turmas') ?? [];

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

        if (!empty($cursos))
        {
            $builder->whereIn('cursos.id', $cursos);
        }

        if (!empty($turmas))
        {
            $builder->whereIn('turmas.id', $turmas);
        }

        return $builder->orderBy('cursos.nome')
            ->orderBy('turmas.sigla')
            ->orderBy('tempos_de_aula.dia_semana')
            ->orderBy('tempos_de_aula.hora_inicio')
            ->orderBy('tempos_de_aula.minuto_inicio')
            ->findAll();
    }

    protected function filtrarProfessores()
    {
        $professores = $this->request->getPost('professores') ?? [];

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

        if (!empty($professores))
        {
            $builder->whereIn('professores.id', $professores);
        }

        return $builder->orderBy('professores.nome')
            ->orderBy('tempos_de_aula.dia_semana')
            ->orderBy('tempos_de_aula.hora_inicio')
            ->orderBy('tempos_de_aula.minuto_inicio')
            ->findAll();
    }

    protected function filtrarAmbientes()
    {
        $ambientes = $this->request->getPost('ambientes') ?? [];

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

        if (!empty($ambientes))
        {
            $builder->whereIn('ambientes.id', $ambientes);
        }

        return $builder->orderBy('ambientes.nome')
            ->orderBy('tempos_de_aula.dia_semana')
            ->orderBy('tempos_de_aula.hora_inicio')
            ->orderBy('tempos_de_aula.minuto_inicio')
            ->findAll();
    }    

    public function exportar()
    {
        $pdf = new \App\Libraries\PDF();

        $pdf->setCSS('
            @page { margin: 10 !important; padding: 0 !important; margin-top: 110px !important; }
            body { font-family: Arial, sans-serif; font-size: 10px; padding: 20px; background: #fff; color: #000; }
            header { align-items: center; padding-bottom: 5px; margin-bottom: 50px; position: fixed; margin-top: -100px; width: 96%; }
            header img { height: 70px; margin-right: 10px; margin-left: 10px; }
            h1 { font-size: 15px; color:rgb(5, 56, 5); padding: 0px; margin: 0px; }
            h2 { font-size: 14px; color: #1a5d1a; padding: 0px; margin: 0px; }
            h3 { font-size: 13px; color: #1a5d1a; padding: 0px; margin: 0px; }
            table { width: 100%; border-collapse: collapse; margin-bottom: 20px; table-layout:fixed; page-break-inside: avoid; }
            .caption { font-size: 13px; font-weight: bold; background-color: #1a5d1a; color: white; padding: 6px; border-radius: 4px 4px 0 0; text-align: center; }
            th, td { border: 1px solid #ccc; padding: 4px; text-align: center; vertical-align: middle; }
            th { background-color: #d1e7d1; color: #1a5d1a; }
            tr:nth-child(even) td { background-color: #f5fdf5; }
            .hora { font-weight: bold; }
            em { font-style: normal; font-weight: bold; display: block; margin-top: 2px; color: #3d7b3d; }
        ');

        $pdf->setHeader('
            <table><tr><td width="25%"><img src="' . base_url("assets/images/logoifro.png") . '" alt="Logo IFRO"></td>
            <td width="75%"><h1>Instituto Federal de Educação, Ciência e Tecnologia de Rondônia</h1><h2><i>Campus</i> Porto Velho Calama</h2><h3>Departamento de Apoio ao Ensino - DAPE</h3><h1>Horários por Cursos e Turmas - versão 2025.1</h1></td>
            </tr></table>');

        $pdf->setBody('
            <table>
                <thead>
                    <tr>
                        <td colspan="6" style="border: none; padding: 0px; text-align: center;">
                            <div class="caption">Licenciatura em Física - 1º p Lic em Física</div>
                        </td>
                    </tr>
                    <tr>
                        <th width="5%">Horário</th>
                        <th width="19%">Segunda</th>
                        <th width="19%">Terça</th>
                        <th width="19%">Quarta</th>
                        <th width="19%">Quinta</th>
                        <th width="19%">Sexta</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="hora">19:00</td>
                        <td>GEOMETRIA ANALIT E VETORI<br><em>Vlademir F<br>Sala 07</em></td>
                        <td>INTROD AO CALCULO<br><em>Vlademir F<br>Sala 07</em></td>
                        <td>FILOS DA ED ETICA PROF<br><em>Mateus G.<br>Sala 07</em></td>
                        <td>LINGUA PORTUGUESA<br><em>Neusa T.<br>Sala 07</em></td>
                        <td>METOD DO TRAB CIENT<br><em>Neusa T.<br>Sala 07</em></td>
                    </tr>
                    <tr>
                        <td class="hora">19:50</td><td>GEOMETRIA ANALIT E VETORI<br><em>Vlademir F<br>Sala 07</em></td>
                        <td>INTROD AO CALCULO<br><em>Vlademir F<br>Sala 07</em></td>
                        <td>FILOS DA ED ETICA PROF<br><em>Mateus G.<br>Sala 07</em></td>
                        <td>LINGUA PORTUGUESA<br><em>Neusa T.<br>Sala 07</em></td>
                        <td>METOD DO TRAB CIENT<br><em>Neusa T.<br>Sala 07</em></td>
                    </tr>
                    <tr>
                        <td class="hora">20:50</td>
                        <td>HISTORIA EPIST DA FISICA<br><em>Cléver R.<br>Sala 07</em></td>
                        <td>METOD PROJ INTEG EXTENS<br><em>Neusa T.<br>Sala 07</em></td>
                        <td>LINGUA PORTUGUESA<br><em>Neusa T.<br>Sala 07</em></td>
                        <td>METOD PROJ INTEG EXTENS<br><em>Neusa T.<br>Sala 07</em></td>
                        <td>—</td>
                    </tr>
                    <tr>
                        <td class="hora">21:40</td>
                        <td>HISTORIA EPIST DA FISICA<br><em>Cléver R.<br>Sala 07</em></td>
                        <td>METOD PROJ INTEG EXTENS<br><em>Neusa T.<br>Sala 07</em></td>
                        <td>LINGUA PORTUGUESA<br><em>Neusa T.<br>Sala 07</em></td>
                        <td>METOD PROJ INTEG EXTENS<br><em>Neusa T.<br>Sala 07</em></td>
                        <td>—</td>
                    </tr>
                </tbody>
            </table>
        ');

        $pdf->generatePDF();
        print_r($this->request->getPost());
    }
}
