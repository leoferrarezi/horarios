<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TemposAulasModel;
use App\Models\HorariosModel;
use App\Models\AulaHorarioModel;
use App\Models\ProfessorRegrasModel;
use CodeIgniter\Exceptions\ReferenciaException;
use DateTime;

class TemposAula extends BaseController
{
    public function index()
    {
        // Cria a instância de um model do curso
        $tempoAulaModel = new TemposAulasModel();
        $horarioModel = new HorariosModel();

        // Faz a busca por todos os cursos cadastrado no banco (tabela cursos)
        $data['temposAulas'] = $tempoAulaModel->orderBy('horario_id', 'asc')->getTemposAulaWithHorario();
        $data['horarios'] = $horarioModel->orderBy('nome', 'asc')->findAll();

        // Exibe os cursos cadastrados
        $this->content_data['content'] = view('sys/temposDeAula', $data);
        return view('dashboard', $this->content_data);
    }

    public function salvar()
    {
        $tempoAulaModel = new TemposAulasModel();

        //coloca todos os dados do formulario no vetor dadosPost
        $dadosPost = $this->request->getPost();

        //$dadosLimpos['dia_semana'] = strip_tags($dadosPost['dia_semana']);
        $dadosLimpos['horario_id'] = strip_tags($dadosPost['horario_id']);

        if (!empty($dadosPost['tempo_inicio'])) {
            $horaInicio = new DateTime($dadosPost['tempo_inicio']); // Criamos um objeto DateTime com o valor de tempo_inicio
            $dadosLimpos['hora_inicio'] = $horaInicio->format('H'); // Hora no formato de 24 horas
            $dadosLimpos['minuto_inicio'] = $horaInicio->format('i'); // Minutos
        }

        // Se tiver o tempo_fim, faz o mesmo processo para o campo tempo_fim
        if (!empty($dadosPost['tempo_fim'])) {
            $horaFim = new DateTime($dadosPost['tempo_fim']);
            $dadosLimpos['hora_fim'] = $horaFim->format('H');
            $dadosLimpos['minuto_fim'] = $horaFim->format('i');
        }

        $deuErro = false;

        //Iterar por todos os possíveis dias da semana
        for ($i = 0; $i < 7; $i++) {
            if (isset($dadosPost["$i"])) {
                $dadosLimpos['dia_semana'] = $i;
                if ($tempoAulaModel->insert($dadosLimpos) == false) {
                    $deuErro = true;
                    break;
                }
            }
        }

        if (!$deuErro) {
            //se deu certo, direciona pra lista de cursos
            session()->setFlashdata('sucesso', 'Tempo de aula cadastrado com sucesso!');
            return redirect()->to(base_url('/sys/tempoAula')); // Redireciona para a página de listagem
        } else {
            $data['erros'] = $tempoAulaModel->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/tempoAula'))->with('erros', $data['erros'])->withInput(); //retora com os erros e os inputs
        }
    }

    public function atualizar()
    {

        $dadosPost = $this->request->getPost();

        $dadosLimpos['id'] = strip_tags($dadosPost['id']);
        $dadosLimpos['dia_semana'] = strip_tags($dadosPost['dia_semana']);
        $dadosLimpos['horario_id'] = strip_tags($dadosPost['horario_id']);

        if (!empty($dadosPost['tempo_inicio'])) {
            $horaInicio = new DateTime($dadosPost['tempo_inicio']); // Criamos um objeto DateTime com o valor de tempo_inicio
            $dadosLimpos['hora_inicio'] = $horaInicio->format('H'); // Hora no formato de 24 horas
            $dadosLimpos['minuto_inicio'] = $horaInicio->format('i'); // Minutos
        }

        // Se tiver o tempo_fim, faz o mesmo processo para o campo tempo_fim
        if (!empty($dadosPost['tempo_fim'])) {
            $horaFim = new DateTime($dadosPost['tempo_fim']);
            $dadosLimpos['hora_fim'] = $horaFim->format('H');
            $dadosLimpos['minuto_fim'] = $horaFim->format('i');
        }

        $tempoAulaModel = new TemposAulasModel();
        if ($tempoAulaModel->save($dadosLimpos)) {
            session()->setFlashdata('sucesso', 'Dados do Tempo de Aula atualizados com sucesso!');
            return redirect()->to(base_url('/sys/tempoAula')); // Redireciona para a página de listagem
        } else {
            $data['erros'] = $tempoAulaModel->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/tempoAula'))->with('erros', $data['erros']); //retora com os erros
        }
    }

    public function deletar()
    {
        $dadosPost = $this->request->getPost();
        $id = (int)strip_tags($dadosPost['id']);

        $tempoAulaModel = new TemposAulasModel();
        try {
            $restricoes = $tempoAulaModel->getRestricoes(['id' => $id]);
            if (!$restricoes['horarios']) {
                $profRegraModel = new ProfessorRegrasModel();
                $profRegraModel->where('tempo_de_aula_id', $id)->delete();
                if ($tempoAulaModel->delete($id)) {
                    session()->setFlashdata('sucesso', 'Tempo de Aula excluído com sucesso!');
                    return redirect()->to(base_url('/sys/tempoAula'));
                } else {
                    return redirect()->to(base_url('/sys/tempoAula'))->with('erro', 'Erro inesperado ao excluir Tempo de Aula!');
                }
            } else {
                $mensagem = "O tempo de aula não pode ser excluído.<br>Este tempo de aula possui ";
                if ($restricoes['regras'] && $restricoes['horarios']) {
                    $mensagem = $mensagem . "horário relacionado a ele!";
                }
                throw new ReferenciaException($mensagem);
            }
        } catch (ReferenciaException $e) {
            session()->setFlashdata('erro', $e->getMessage());
            return redirect()->to(base_url('/sys/tempoAula'));
        }
    }

    //Retorna um jSon com os tempos de aula da turma
    public function getTemposFromTurma($turma)
    {
        $tempoAulaModel = new TemposAulasModel();
        $tempos = [];
        $tempos['tempos'] = $tempoAulaModel->getTemposFromTurma($turma);

        $aulaHorarioModel = new AulaHorarioModel();
        $tempos['aulas'] = $aulaHorarioModel->getAulasFromTurma($turma);

        foreach($tempos['aulas'] as $k=>$v)
        {
            foreach($aulaHorarioModel->getAmbientesFromAulaHorario($tempos['aulas'][$k]['id']) as $k2 => $v2)
            {
                $tempos['aulas'][$k]['ambiente'][$k2] = $v2['ambiente_id'];
            }

            $tempos['aulas'][$k]['choqueProfessor'] = 0;
            $tempos['aulas'][$k]['choqueAmbiente'] = 0;
            
            $tempos['aulas'][$k]['choque'] = $aulaHorarioModel->choqueAmbiente($tempos['aulas'][$k]['id']);

            if($tempos['aulas'][$k]['choque'] == 0) //se não deu choque de ambiente, verifica o choque de professor
            {
                $tempos['aulas'][$k]['choque'] = $aulaHorarioModel->choqueDocente($tempos['aulas'][$k]['id']);
                
                if($tempos['aulas'][$k]['choque'] != 0)
                {
                    $tempos['aulas'][$k]['choqueProfessor'] = 1;
                }
            }
            else
            {
                $tempos['aulas'][$k]['choqueAmbiente'] = 1;
            }

            //Verifica se o docente tem restrição neste horário
            $tempos['aulas'][$k]['restricao'] = $aulaHorarioModel->restricaoDocente($tempos['aulas'][$k]['id']);

            //Verifica se o docente está em três turnos no mesmo dia
            $tempos['aulas'][$k]['tresturnos'] = $aulaHorarioModel->verificarTresTurnos($tempos['aulas'][$k]['id']);

            //Verifica o intervalo entre turnos
            $tempos['aulas'][$k]['intervalo'] = $aulaHorarioModel->verificarTempoEntreTurnos($tempos['aulas'][$k]['id']);
        }

        return $this->response->setJSON($tempos); // Retorna os dados em formato JSON
    }
}
