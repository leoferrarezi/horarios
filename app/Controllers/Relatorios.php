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
            'cursos' => $this->cursosModel->orderBy('nome')->findAll(),
            'professores' => $this->professorModel->orderBy('nome')->findAll(),
            'ambientes' => $this->ambientesModel->orderBy('nome')->findAll(),
            'gruposAmbientes' => $this->gruposAmbientesModel->orderBy('nome')->findAll(),
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
                CONCAT(LPAD(tempos_de_aula.hora_inicio, 2, "0"), ":", LPAD(tempos_de_aula.minuto_inicio, 2, "0")) as hora_inicio
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
                CONCAT(LPAD(tempos_de_aula.hora_inicio, 2, "0"), ":", LPAD(tempos_de_aula.minuto_inicio, 2, "0")) as hora_inicio
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
        $grupos = $this->request->getPost('grupos_ambientes') ?? [];

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

        if (!empty($grupos))
        {
            $builder->join('ambiente_grupo', 'ambiente_grupo.ambiente_id = ambientes.id')
                ->whereIn('ambiente_grupo.grupo_de_ambiente_id', $grupos); // Ajuste aqui
        }

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
        $tipo = $this->request->getPost('tipoRelatorio');

        if (!$tipo)
        {
            die("Sem tipo selecionado.");
        }

        switch ($tipo)
        {
            case 'curso':
                $dados = $this->filtrarCursos();
                $this->exportarCursoTurma($dados);
                break;
            case 'professor':
                $dados = $this->filtrarProfessores();
                $this->exportarProfessor($dados);
                break;
            case 'ambiente':
                $dados = $this->filtrarAmbientes();
                $this->exportarAmbiente($dados);
                break;
            default:
                die("Tipo inválido.");
        }
    }

    public function exportarAmbiente($dados)
    {
        $tabelas = [];

        foreach ($dados as $key => $value)
        {
            if (!in_array($value['ambiente'], $tabelas))
            {
                $tabelas[$value['ambiente']] = [];
            }
        }

        foreach ($dados as $key => $value)
        {
            for ($i = 1; $i <= 5; $i++)
            {
                if (!in_array($i, $tabelas[$value['ambiente']]))
                {
                    $tabelas[$value['ambiente']][$i] = [];
                }
            }
        }

        foreach ($dados as $key => $value)
        {
            if (!in_array($value['hora_inicio'], $tabelas[$value['ambiente']][$value['dia_semana']]))
            {
                $tabelas[$value['ambiente']][$value['dia_semana']][$value['hora_inicio']] = [];
            }
        }

        foreach ($dados as $key => $value)
        {
            if (empty($tabelas[$value['ambiente']][$value['dia_semana']][$value['hora_inicio']]['disciplina']))
            {
                $tabelas[$value['ambiente']][$value['dia_semana']][$value['hora_inicio']]['professor'] = $value['professor'];
                $tabelas[$value['ambiente']][$value['dia_semana']][$value['hora_inicio']]['disciplina'] = $value['disciplina'];
                $tabelas[$value['ambiente']][$value['dia_semana']][$value['hora_inicio']]['curso'] = $value['curso'];
                $tabelas[$value['ambiente']][$value['dia_semana']][$value['hora_inicio']]['turma'] = $value['turma'];
            }
            else
            {
                if ($tabelas[$value['ambiente']][$value['dia_semana']][$value['hora_inicio']]['professor'] != $value['professor'])
                {
                    $tabelas[$value['ambiente']][$value['dia_semana']][$value['hora_inicio']]['professor'] .= ', ' . $value['professor'];
                }
            }
        }

        $pdf = new \App\Libraries\PDF();

        $pdf->setCSS('
            @page { margin: 10 !important; padding: 0 !important; margin-top: 100px !important; }
            body { font-family: Arial, sans-serif; font-size: 9px; padding: 10px; background: #fff; color: #000; }
            header { align-items: center; padding-bottom: 2px; margin-bottom: 10px; position: fixed; margin-top: -80px; width: 98%; }
            header img { height: 60px; margin-right: 10px; margin-left: 10px; }
            h1 { font-size: 13px; color:rgb(5, 56, 5); padding: 0px; margin: 0px; }
            h2 { font-size: 12px; color: #1a5d1a; padding: 0px; margin: 0px; }
            h3 { font-size: 11px; color: #1a5d1a; padding: 0px; margin: 0px; }
            table { width: 100%; border-collapse: collapse; margin-bottom: 10px; table-layout:fixed;  }
            .caption { font-size: 13px; font-weight: bold; background-color: #1a5d1a; color: white; padding: 2px; border-radius: 4px 4px 0 0; text-align: center; }
            .periodo { font-size: 10px; font-weight: bold; background-color: #1a5d1a; color: white; padding: 0px; text-align: center; border: none }
            th, td { border: 1px solid #ccc; padding: 4px; text-align: center; vertical-align: middle; }
            th { background-color: #d1e7d1; color: #1a5d1a; }
            tr:nth-child(even) td { background-color: #f5fdf5; }
            .hora { font-weight: bold; }
            em { font-style: normal;  display: block; margin-top: 1px; color: #3d7b3d; }
            .page_break { page-break-before: always; }
        ');

        $pdf->setHeader('
            <table>
                <tr>
                    <td width="25%"><img src="' . base_url("assets/images/logoifro.png") . '" alt="Logo IFRO"></td>
                    <td width="75%">
                        <h1>Instituto Federal de Educação, Ciência e Tecnologia de Rondônia</h1>
                        <h2><i>Campus</i> Porto Velho Calama</h2>
                        <h3>Departamento de Apoio ao Ensino - DAPE</h3>
                        <h1>Horários por Ambiente</h1>
                    </td>
                </tr>
            </table>');

        $nome_dia = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'];

        $conta = 0;

        foreach ($tabelas as $ambiente => $dias)
        {
            $temDias = [1, 2, 3, 4, 5];
            $temHorarios = [];

            foreach ($dias as $dia => $horarios) //catalogar os dias da semana que estão no horário do curso/turma
            {
                foreach ($horarios as $hora_inicio => $outros)
                {
                    if (in_array($hora_inicio, $temHorarios))
                        continue;

                    array_push($temHorarios, $hora_inicio);
                }
            }

            sort($temDias);
            sort($temHorarios);

            if ($conta > 0 && $conta < sizeof($tabelas))
                $pdf->appendHTML('<div class="page_break"></div>');

            $pdf->appendHTML('
                <table>
                    <thead>
                        <tr>
                            <td colspan="' . (sizeof($temDias) + 1) . '" style="border: none; padding: 0px; text-align: center;">
                                <div class="caption">' . $ambiente . '</div>
                            </td>
                        </tr>
                        <tr>
                            <th width="5%">Horário</th>');

            foreach ($temDias as $dia)
            {
                $pdf->appendHTML('
                    <th width="19%">' . $nome_dia[$dia] . '</th>
                ');
            }

            $pdf->appendHTML('</tr></thead><tbody>');

            $ultimoTurno = 0;

            foreach ($temHorarios as $horario)
            {
                $horarioAtual = (int)(substr($horario, 0, 2));
                $turnoAtual = ($horarioAtual <= 12) ? 1 : (($horarioAtual >= 13 && $horarioAtual <= 17) ? 2 : 3);

                if ($ultimoTurno == 0 || $turnoAtual != $ultimoTurno)
                {
                    if ($turnoAtual == 1)
                        $pdf->appendHTML('<tr><th colspan="' . (sizeof($temDias) + 1) . '" class="periodo">M A N H Ã</th></tr>');
                    else if ($turnoAtual == 2)
                        $pdf->appendHTML('<tr><th colspan="' . (sizeof($temDias) + 1) . '" class="periodo">T A R D E</th></tr>');
                    else
                        $pdf->appendHTML('<tr><th colspan="' . (sizeof($temDias) + 1) . '" class="periodo">N O I T E</th></tr>');
                }

                $ultimoTurno = $turnoAtual;

                $pdf->appendHTML('<tr>');
                $pdf->appendHTML('<td class="hora">' . $horario . '</td>');

                foreach ($temDias as $dia)
                {
                    if (isset($tabelas[$ambiente][$dia]))
                    {
                        if (isset($tabelas[$ambiente][$dia][$horario]))
                        {
                            $pdf->appendHTML('<td>');

                            if (strlen($tabelas[$ambiente][$dia][$horario]['disciplina']) >= 40)
                                $pdf->appendHTML('<small>');

                            $pdf->appendHTML('<strong>' . $tabelas[$ambiente][$dia][$horario]['disciplina'] . '</strong>');

                            if (strlen($tabelas[$ambiente][$dia][$horario]['disciplina']) >= 40)
                                $pdf->appendHTML('</small>');

                            $pdf->appendHTML('<br />');
                            $pdf->appendHTML('<em>');

                            if (strlen($tabelas[$ambiente][$dia][$horario]['curso']) >= 40)
                                $pdf->appendHTML('<small>');

                            $pdf->appendHTML($tabelas[$ambiente][$dia][$horario]['curso']);

                            if (strlen($tabelas[$ambiente][$dia][$horario]['curso']) >= 40)
                                $pdf->appendHTML('</small>');

                            $pdf->appendHTML('<br />');

                            if (strlen($tabelas[$ambiente][$dia][$horario]['turma']) >= 40)
                                $pdf->appendHTML('<small>');

                            $pdf->appendHTML($tabelas[$ambiente][$dia][$horario]['turma']);

                            if (strlen($tabelas[$ambiente][$dia][$horario]['turma']) >= 40)
                                $pdf->appendHTML('</small>');

                            $pdf->appendHTML('<br />');

                            if (strlen($tabelas[$ambiente][$dia][$horario]['professor']) >= 40)
                                $pdf->appendHTML('<small>');

                            $pdf->appendHTML('<strong>' . $tabelas[$ambiente][$dia][$horario]['professor'] . '</strong>');

                            if (strlen($tabelas[$ambiente][$dia][$horario]['professor']) >= 40)
                                $pdf->appendHTML('</small>');

                            $pdf->appendHTML('</em>');
                            $pdf->appendHTML('</td>');
                        }
                        else
                        {
                            $pdf->appendHTML('<td>—</td>');
                        }
                    }
                }

                $pdf->appendHTML('</tr>');
            }

            $pdf->appendHTML('
                    </tbody>
                </table>
            ');

            $conta++;
        }

        $pdf->generatePDF("horarios_por_ambiente");
    }

    public function exportarProfessor($dados)
    {
        $tabelas = [];

        foreach ($dados as $key => $value)
        {
            if (!in_array($value['professor'], $tabelas))
            {
                $tabelas[$value['professor']] = [];
            }
        }

        foreach ($dados as $key => $value)
        {
            for ($i = 1; $i <= 5; $i++)
            {
                if (!in_array($i, $tabelas[$value['professor']]))
                {
                    $tabelas[$value['professor']][$i] = [];
                }
            }
        }

        foreach ($dados as $key => $value)
        {
            if (!in_array($value['hora_inicio'], $tabelas[$value['professor']][$value['dia_semana']]))
            {
                $tabelas[$value['professor']][$value['dia_semana']][$value['hora_inicio']] = [];
            }
        }

        foreach ($dados as $key => $value)
        {
            if (empty($tabelas[$value['professor']][$value['dia_semana']][$value['hora_inicio']]['disciplina']))
            {
                $tabelas[$value['professor']][$value['dia_semana']][$value['hora_inicio']]['professor'] = $value['professor'];
                $tabelas[$value['professor']][$value['dia_semana']][$value['hora_inicio']]['disciplina'] = $value['disciplina'];
                $tabelas[$value['professor']][$value['dia_semana']][$value['hora_inicio']]['ambiente'] = $value['ambiente'];
                $tabelas[$value['professor']][$value['dia_semana']][$value['hora_inicio']]['curso'] = $value['curso'];
                $tabelas[$value['professor']][$value['dia_semana']][$value['hora_inicio']]['turma'] = $value['turma'];
            }
            else
            {
                if ($tabelas[$value['professor']][$value['dia_semana']][$value['hora_inicio']]['professor'] != $value['professor'])
                {
                    $tabelas[$value['professor']][$value['dia_semana']][$value['hora_inicio']]['professor'] .= ', ' . $value['professor'];
                }
                else if ($tabelas[$value['professor']][$value['dia_semana']][$value['hora_inicio']]['ambiente'] != $value['ambiente'])
                {
                    $tabelas[$value['professor']][$value['dia_semana']][$value['hora_inicio']]['ambiente'] .= ', ' . $value['ambiente'];
                }
            }
        }

        $pdf = new \App\Libraries\PDF();

        $pdf->setCSS('
            @page { margin: 10 !important; padding: 0 !important; margin-top: 100px !important; }
            body { font-family: Arial, sans-serif; font-size: 9px; padding: 10px; background: #fff; color: #000; }
            header { align-items: center; padding-bottom: 2px; margin-bottom: 10px; position: fixed; margin-top: -80px; width: 98%; }
            header img { height: 60px; margin-right: 10px; margin-left: 10px; }
            h1 { font-size: 13px; color:rgb(5, 56, 5); padding: 0px; margin: 0px; }
            h2 { font-size: 12px; color: #1a5d1a; padding: 0px; margin: 0px; }
            h3 { font-size: 11px; color: #1a5d1a; padding: 0px; margin: 0px; }
            table { width: 100%; border-collapse: collapse; margin-bottom: 10px; table-layout:fixed; }
            .caption { font-size: 13px; font-weight: bold; background-color: #1a5d1a; color: white; padding: 2px; border-radius: 4px 4px 0 0; text-align: center; }
            .periodo { font-size: 10px; font-weight: bold; background-color: #1a5d1a; color: white; padding: 0px; text-align: center; border: none }
            th, td { border: 1px solid #ccc; padding: 4px; text-align: center; vertical-align: middle; }
            th { background-color: #d1e7d1; color: #1a5d1a; }
            tr:nth-child(even) td { background-color: #f5fdf5; }
            .hora { font-weight: bold; }
            em { font-style: normal;  display: block; margin-top: 1px; color: #3d7b3d; }
            .page_break { page-break-before: always; }
        ');

        $pdf->setHeader('
            <table>
                <tr>
                    <td width="25%"><img src="' . base_url("assets/images/logoifro.png") . '" alt="Logo IFRO"></td>
                    <td width="75%">
                        <h1>Instituto Federal de Educação, Ciência e Tecnologia de Rondônia</h1>
                        <h2><i>Campus</i> Porto Velho Calama</h2>
                        <h3>Departamento de Apoio ao Ensino - DAPE</h3>
                        <h1>Horários por Professor</h1>
                    </td>
                </tr>
            </table>');

        $nome_dia = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'];

        $conta = 0;

        foreach ($tabelas as $professor => $dias)
        {
            $temDias = [1, 2, 3, 4, 5];
            $temHorarios = [];

            foreach ($dias as $dia => $horarios) //catalogar os dias da semana que estão no horário do curso/turma
            {
                foreach ($horarios as $hora_inicio => $outros)
                {
                    if (in_array($hora_inicio, $temHorarios))
                        continue;

                    array_push($temHorarios, $hora_inicio);
                }
            }

            sort($temDias);
            sort($temHorarios);

            $pdf->appendHTML('
                <table>
                    <thead>
                        <tr>
                            <td colspan="' . (sizeof($temDias) + 1) . '" style="border: none; padding: 0px; text-align: center;">
                                <div class="caption">' . $professor . '</div>
                            </td>
                        </tr>
                        <tr>
                            <th width="5%">Horário</th>');

            foreach ($temDias as $dia)
            {
                $pdf->appendHTML('
                    <th width="19%">' . $nome_dia[$dia] . '</th>
                ');
            }

            $pdf->appendHTML('</tr></thead><tbody>');

            $ultimoTurno = 0;


            foreach ($temHorarios as $horario)
            {
                $horarioAtual = (int)(substr($horario, 0, 2));
                $turnoAtual = ($horarioAtual <= 12) ? 1 : (($horarioAtual >= 13 && $horarioAtual <= 17) ? 2 : 3);

                if ($ultimoTurno == 0 || $turnoAtual != $ultimoTurno)
                {
                    if ($turnoAtual == 1)
                        $pdf->appendHTML('<tr><th colspan="' . (sizeof($temDias) + 1) . '" class="periodo">M A N H Ã</th></tr>');
                    else if ($turnoAtual == 2)
                        $pdf->appendHTML('<tr><th colspan="' . (sizeof($temDias) + 1) . '" class="periodo">T A R D E</th></tr>');
                    else
                        $pdf->appendHTML('<tr><th colspan="' . (sizeof($temDias) + 1) . '" class="periodo">N O I T E</th></tr>');
                }

                $ultimoTurno = $turnoAtual;

                $pdf->appendHTML('<tr>');
                $pdf->appendHTML('<td class="hora">' . $horario . '</td>');

                foreach ($temDias as $dia)
                {
                    if (isset($tabelas[$professor][$dia]))
                    {
                        if (isset($tabelas[$professor][$dia][$horario]))
                        {
                            $pdf->appendHTML('<td>');

                            if (strlen($tabelas[$professor][$dia][$horario]['disciplina']) >= 40)
                                $pdf->appendHTML('<small>');

                            $pdf->appendHTML('<strong>' . $tabelas[$professor][$dia][$horario]['disciplina'] . '</strong>');

                            if (strlen($tabelas[$professor][$dia][$horario]['disciplina']) >= 40)
                                $pdf->appendHTML('</small>');

                            $pdf->appendHTML('<br />');
                            $pdf->appendHTML('<em>');

                            if (strlen($tabelas[$professor][$dia][$horario]['curso']) >= 40)
                                $pdf->appendHTML('<small>');

                            $pdf->appendHTML($tabelas[$professor][$dia][$horario]['curso']);

                            if (strlen($tabelas[$professor][$dia][$horario]['curso']) >= 40)
                                $pdf->appendHTML('</small>');

                            $pdf->appendHTML('<br />');

                            if (strlen($tabelas[$professor][$dia][$horario]['turma']) >= 40)
                                $pdf->appendHTML('<small>');

                            $pdf->appendHTML($tabelas[$professor][$dia][$horario]['turma']);

                            if (strlen($tabelas[$professor][$dia][$horario]['turma']) >= 40)
                                $pdf->appendHTML('</small>');

                            $pdf->appendHTML('<br />');

                            if (strlen($tabelas[$professor][$dia][$horario]['ambiente']) >= 40)
                                $pdf->appendHTML('<small>');

                            $pdf->appendHTML('<strong>' . $tabelas[$professor][$dia][$horario]['ambiente'] . '</strong>');

                            if (strlen($tabelas[$professor][$dia][$horario]['ambiente']) >= 40)
                                $pdf->appendHTML('</small>');

                            $pdf->appendHTML('</em>');
                            $pdf->appendHTML('</td>');
                        }
                        else
                        {
                            $pdf->appendHTML('<td>—</td>');
                        }
                    }
                }

                $pdf->appendHTML('</tr>');
            }

            $pdf->appendHTML('
                    </tbody>
                </table>
            ');

            $conta++;

            if ($conta < sizeof($tabelas))
                $pdf->appendHTML('<div class="page_break"></div>');
        }

        $pdf->generatePDF("horarios_por_professor");
    }

    public function exportarCursoTurma($dados)
    {
        $tabelas = [];

        foreach ($dados as $key => $value)
        {
            if (!in_array($value['curso'], $tabelas))
            {
                $tabelas[$value['curso']] = [];
            }
        }

        foreach ($dados as $key => $value)
        {
            if (!in_array($value['turma'], $tabelas[$value['curso']]))
            {
                $tabelas[$value['curso']][$value['turma']] = [];
            }
        }

        foreach ($dados as $key => $value)
        {
            for ($i = 1; $i <= 5; $i++)
            {
                if (!in_array($i, $tabelas[$value['curso']][$value['turma']]))
                {
                    $tabelas[$value['curso']][$value['turma']][$i] = [];
                }
            }
        }

        foreach ($dados as $key => $value)
        {
            if (!in_array($value['hora_inicio'], $tabelas[$value['curso']][$value['turma']][$value['dia_semana']]))
            {
                $tabelas[$value['curso']][$value['turma']][$value['dia_semana']][$value['hora_inicio']] = [];
            }
        }

        foreach ($dados as $key => $value)
        {
            if (empty($tabelas[$value['curso']][$value['turma']][$value['dia_semana']][$value['hora_inicio']]['disciplina']))
            {
                $tabelas[$value['curso']][$value['turma']][$value['dia_semana']][$value['hora_inicio']]['disciplina'] = $value['disciplina'];
                $tabelas[$value['curso']][$value['turma']][$value['dia_semana']][$value['hora_inicio']]['professor'] = $value['professor'];
                $tabelas[$value['curso']][$value['turma']][$value['dia_semana']][$value['hora_inicio']]['ambiente'] = $value['ambiente'];
            }
            else
            {
                if ($tabelas[$value['curso']][$value['turma']][$value['dia_semana']][$value['hora_inicio']]['professor'] != $value['professor'])
                {
                    $tabelas[$value['curso']][$value['turma']][$value['dia_semana']][$value['hora_inicio']]['professor'] .= ', ' . $value['professor'];
                }
                else if ($tabelas[$value['curso']][$value['turma']][$value['dia_semana']][$value['hora_inicio']]['ambiente'] != $value['ambiente'])
                {
                    $tabelas[$value['curso']][$value['turma']][$value['dia_semana']][$value['hora_inicio']]['ambiente'] .= ', ' . $value['ambiente'];
                }
            }
        }

        $pdf = new \App\Libraries\PDF();

        $pdf->setCSS('
            @page { margin: 10 !important; padding: 0 !important; margin-top: 100px !important; }
            body { font-family: Arial, sans-serif; font-size: 9px; padding: 10px; background: #fff; color: #000; }
            header { align-items: center; padding-bottom: 2px; margin-bottom: 10px; position: fixed; margin-top: -80px; width: 98%; }
            header img { height: 60px; margin-right: 10px; margin-left: 10px; }
            h1 { font-size: 13px; color:rgb(5, 56, 5); padding: 0px; margin: 0px; }
            h2 { font-size: 12px; color: #1a5d1a; padding: 0px; margin: 0px; }
            h3 { font-size: 11px; color: #1a5d1a; padding: 0px; margin: 0px; }
            table { width: 100%; border-collapse: collapse; margin-bottom: 10px; table-layout:fixed; page-break-inside: avoid; }
            .caption { font-size: 13px; font-weight: bold; background-color: #1a5d1a; color: white; padding: 2px; border-radius: 4px 4px 0 0; text-align: center; }
            .periodo { font-size: 10px; font-weight: bold; background-color: #1a5d1a; color: white; padding: 0px; text-align: center; border: none }
            th, td { border: 1px solid #ccc; padding: 4px; text-align: center; vertical-align: middle; }
            th { background-color: #d1e7d1; color: #1a5d1a; }
            tr:nth-child(even) td { background-color: #f5fdf5; }
            .hora { font-weight: bold; }
            em { font-style: normal;  display: block; margin-top: 1px; color: #3d7b3d; }
        ');

        $pdf->setHeader('
            <table>
                <tr>
                    <td width="25%"><img src="' . base_url("assets/images/logoifro.png") . '" alt="Logo IFRO"></td>
                    <td width="75%">
                        <h1>Instituto Federal de Educação, Ciência e Tecnologia de Rondônia</h1>
                        <h2><i>Campus</i> Porto Velho Calama</h2>
                        <h3>Departamento de Apoio ao Ensino - DAPE</h3>
                        <h1>Horários por Cursos e Turmas</h1>
                    </td>
                </tr>
            </table>');

        $nome_dia = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'];

        foreach ($tabelas as $curso => $turmas)
        {
            foreach ($turmas as $turma => $dias)
            {
                $temDias = [];
                $temHorarios = [];

                foreach ($dias as $dia => $horarios) //catalogar os dias da semana que estão no horário do curso/turma
                {
                    if (!in_array($dia, $temDias))
                        array_push($temDias, $dia);

                    foreach ($horarios as $hora_inicio => $outros)
                    {
                        if (in_array($hora_inicio, $temHorarios))
                            continue;

                        array_push($temHorarios, $hora_inicio);
                    }
                }

                sort($temDias);
                sort($temHorarios);

                $pdf->appendHTML('
                    <table>
                        <thead>
                            <tr>
                                <td colspan="' . (sizeof($temDias) + 1) . '" style="border: none; padding: 0px; text-align: center;">
                                    <div class="caption">' . $curso . ' - ' . $turma . '</div>
                                </td>
                            </tr>
                            <tr>
                                <th width="5%">Horário</th>');

                foreach ($temDias as $dia)
                {
                    $pdf->appendHTML('
                        <th width="19%">' . $nome_dia[$dia] . '</th>
                    ');
                }

                $pdf->appendHTML('</tr></thead><tbody>');

                $ultimoTurno = 0;

                foreach ($temHorarios as $horario)
                {
                    $horarioAtual = (int)(substr($horario, 0, 2));
                    $turnoAtual = ($horarioAtual <= 12) ? 1 : (($horarioAtual >= 13 && $horarioAtual <= 17) ? 2 : 3);

                    if ($ultimoTurno == 0 || $turnoAtual != $ultimoTurno)
                    {
                        if ($turnoAtual == 1)
                            $pdf->appendHTML('<tr><th colspan="' . (sizeof($temDias) + 1) . '" class="periodo">M A N H Ã</th></tr>');
                        else if ($turnoAtual == 2)
                            $pdf->appendHTML('<tr><th colspan="' . (sizeof($temDias) + 1) . '" class="periodo">T A R D E</th></tr>');
                        else
                            $pdf->appendHTML('<tr><th colspan="' . (sizeof($temDias) + 1) . '" class="periodo">N O I T E</th></tr>');
                    }

                    $ultimoTurno = $turnoAtual;

                    $pdf->appendHTML('<tr>');
                    $pdf->appendHTML('<td class="hora">' . $horario . '</td>');

                    foreach ($temDias as $dia)
                    {
                        if (isset($tabelas[$curso][$turma][$dia]))
                        {
                            if (isset($tabelas[$curso][$turma][$dia][$horario]))
                            {
                                $pdf->appendHTML('<td>');

                                if (strlen($tabelas[$curso][$turma][$dia][$horario]['disciplina']) >= 40)
                                    $pdf->appendHTML('<small>');

                                $pdf->appendHTML('<strong>' . $tabelas[$curso][$turma][$dia][$horario]['disciplina'] . '</strong>');

                                if (strlen($tabelas[$curso][$turma][$dia][$horario]['disciplina']) >= 40)
                                    $pdf->appendHTML('</small>');

                                $pdf->appendHTML('<br />');
                                $pdf->appendHTML('<em>');

                                if (strlen($tabelas[$curso][$turma][$dia][$horario]['professor']) >= 40)
                                    $pdf->appendHTML('<small>');

                                $pdf->appendHTML($tabelas[$curso][$turma][$dia][$horario]['professor']);

                                if (strlen($tabelas[$curso][$turma][$dia][$horario]['professor']) >= 40)
                                    $pdf->appendHTML('</small>');

                                $pdf->appendHTML('<br />');

                                if (strlen($tabelas[$curso][$turma][$dia][$horario]['ambiente']) >= 40)
                                    $pdf->appendHTML('<small>');

                                $pdf->appendHTML('<strong>' . $tabelas[$curso][$turma][$dia][$horario]['ambiente'] . '</strong>');

                                if (strlen($tabelas[$curso][$turma][$dia][$horario]['ambiente']) >= 40)
                                    $pdf->appendHTML('</small>');

                                $pdf->appendHTML('</em>');
                                $pdf->appendHTML('</td>');
                            }
                            else
                            {
                                $pdf->appendHTML('<td>—</td>');
                            }
                        }
                    }

                    $pdf->appendHTML('</tr>');
                }

                $pdf->appendHTML('
                        </tbody>
                    </table>
                ');
            }
        }

        $pdf->generatePDF("horarios_por_curso");
    }

    public function getAmbientesByGrupo()
    {
        $grupos = $this->request->getPost('grupos');

        if (empty($grupos))
        {
            return $this->response->setJSON([]);
        }

        $ambientes = $this->ambientesModel
            ->select('ambientes.id, ambientes.nome')
            ->join('ambiente_grupo', 'ambiente_grupo.ambiente_id = ambientes.id')
            ->whereIn('ambiente_grupo.grupo_de_ambiente_id', $grupos)
            ->orderBy('ambientes.nome', 'ASC')
            ->findAll();

        return $this->response->setJSON($ambientes);
    }
}
