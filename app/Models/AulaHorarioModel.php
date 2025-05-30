<?php

namespace App\Models;

use CodeIgniter\Model;

class AulaHorarioModel extends Model
{
    protected $table            = 'aula_horario';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['aula_id', 'tempo_de_aula_id', 'versao_id'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'id' => 'permit_empty|is_natural_no_zero|max_length[11]',
        'aula_id' => 'required|is_not_unique[aulas.id]|max_length[11]',
        'tempo_de_aula_id' => 'required|is_not_unique[tempos_de_aula.id]',
        'versao_id' => 'required|is_not_unique[versoes.id]|max_length[11]'
    ];
    protected $validationMessages   = [
        "aula_id" => [
            "required" => "O campo Aula é obrigatório",
            "is_not_unique" => "A aula já deve estar cadastrada",
            "max_length" => "O tamanho máximo é 11 dígitos",
        ],
        "tempo_de_aula_id" => [
            "required" => "O campo Tempo de Aula é obrigatório",
            "is_not_unique" => "O Tempo de Aula deve estar cadatrado",
        ],
        "versao_id" => [
            "is_not_unique" => "A versão deve estar cadastrada",
            "max_length" => "O tamanho máximo é 11 dígitos"
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAulasFromTurma($turma_id)
    {
        return $this->select('aula_horario.*')
            ->join('aulas', 'aulas.id = aula_horario.aula_id')
            ->where('aulas.turma_id', $turma_id)
            ->where('aula_horario.versao_id', (new VersoesModel())->getVersaoByUser(auth()->id()))
            ->findAll();
    }

    public function getAmbientesFromAulaHorario($aulaHorarioId)
    {
        return $this->select('aula_horario_ambiente.*')
            ->join('aula_horario_ambiente', 'aula_horario_ambiente.aula_horario_id = aula_horario.id')
            ->where('aula_horario.id', $aulaHorarioId)
            ->findAll();
    }

    public function getAulaHorario($aulaHorarioId)
    {
        return $this->select('cursos.nome as curso, disciplinas.nome as disciplina, turmas.sigla as turma, professores.nome as professor, ambientes.nome as ambiente')
            ->join('tempos_de_aula', 'aula_horario.tempo_de_aula_id = tempos_de_aula.id')
            ->join('aula_horario_ambiente', 'aula_horario_ambiente.aula_horario_id = aula_horario.id')
            ->join('ambientes', 'aula_horario_ambiente.ambiente_id = ambientes.id')
            ->join('aulas', 'aula_horario.aula_id = aulas.id')
            ->join('aula_professor', 'aulas.id = aula_professor.aula_id')
            ->join('professores', 'professores.id = aula_professor.professor_id')
            ->join('disciplinas', 'disciplinas.id = aulas.disciplina_id')
            ->join('turmas', 'turmas.id = aulas.turma_id')
            ->join('cursos', 'cursos.id = turmas.curso_id')
            ->where('aula_horario.id', $aulaHorarioId)
            ->get()
            ->getResult();
    }

    public function deleteAulaNoHorario($aula_id, $tempo_de_aula_id, $versao_id)
    {
        $idHorarioAula = $this->select('aula_horario.id')
            ->join('aulas', 'aula_horario.aula_id = aulas.id')
            ->where('aulas.id', $aula_id)
            ->where('aula_horario.tempo_de_aula_id', $tempo_de_aula_id)
            ->where('aula_horario.versao_id', $versao_id)
            //->where('aula_horario.fixa !=', '1')
            ->get();

        if ($idHorarioAula->getNumRows() > 0)
        {
            $idHorarioAula = $idHorarioAula->getRowArray()['id'];
            $this->db->simpleQuery("DELETE FROM aula_horario_ambiente WHERE aula_horario_id = '$idHorarioAula'");
            $this->db->simpleQuery("DELETE FROM aula_horario WHERE id = '$idHorarioAula'");
        }
    }

    public function fixarAulaHorario($tempo_de_aula_id)
    {
        $this->db->simpleQuery("UPDATE aula_horario SET fixa = 1 WHERE id = '$tempo_de_aula_id'");
    }

    public function desfixarAulaHorario($tempo_de_aula_id)
    {
        $this->db->simpleQuery("UPDATE aula_horario SET fixa = 0 WHERE id = '$tempo_de_aula_id'");
    }

    public function checkAulaHorarioByVersao($versao)
    {
        $builder = $this->db->table($this->table);
        $builder->where('versao_id', $versao);
        $query = $builder->get();

        if ($query->getNumRows() > 0)
        {
            return true; // A versão existe na tabela
        }
        else
        {
            return false; // A versão não existe na tabela
        }
    }

    public function checkAulaHorarioByAula($aula)
    {
        $builder = $this->db->table($this->table);
        $builder->where('aula_id', $aula);
        $builder->where('versao_id', (new VersoesModel())->getVersaoByUser(auth()->id()));
        $query = $builder->get();

        if ($query->getNumRows() > 0)
        {
            return true; // A aula existe na tabela
        }
        else
        {
            return false; // A aula não existe na tabela
        }
    }

    public function choqueAmbiente($aulaHorarioId)
    {
        $builder = $this->select('ambiente_id, tempo_de_aula_id')
            ->join('aula_horario_ambiente', 'aula_horario_ambiente.aula_horario_id = aula_horario.id')
            ->where('aula_horario.id', $aulaHorarioId)
            ->where('versao_id', (new VersoesModel())->getVersaoByUser(auth()->id()))
            ->get();

        foreach ($builder->getResult() as $row)
        {
            $ambiente = $row->ambiente_id;
            $tempo = $row->tempo_de_aula_id;

            $builder2 = $this->db->table('tempos_de_aula')->select('*')->where('id', $tempo)->get();
            $dia_semana = $builder2->getRowArray()['dia_semana'];
            $hora_inicio = $builder2->getRowArray()['hora_inicio'];
            $minuto_inicio = $builder2->getRowArray()['minuto_inicio'];

            $builder3 = $this->select('aula_horario.id as theid')
                ->join('tempos_de_aula', 'aula_horario.tempo_de_aula_id = tempos_de_aula.id')
                ->join('aula_horario_ambiente', 'aula_horario_ambiente.aula_horario_id = aula_horario.id')
                ->where('aula_horario.id !=', $aulaHorarioId)
                ->where('aula_horario_ambiente.ambiente_id', $ambiente)
                ->where('tempos_de_aula.dia_semana', $dia_semana)
                ->where('(tempos_de_aula.hora_inicio * 60 + tempos_de_aula.minuto_inicio) <=', $hora_inicio * 60 + $minuto_inicio)
                ->where('(tempos_de_aula.hora_fim * 60 + tempos_de_aula.minuto_fim) >', $hora_inicio * 60 + $minuto_inicio)
                ->get();

            if ($builder3->getNumRows() > 0)
            {
                return $builder3->getRowArray()['theid']; // Conflito encontrado, retorna o ID do horário de aula em conflito
            }
        }

        return 0; // Sem conflito
    }

    public function choqueDocente($aulaHorarioId)
    {
        $builder = $this->select('professor_id, tempo_de_aula_id')
            ->join('aula_professor', 'aula_professor.aula_id = aula_horario.aula_id')
            ->where('aula_horario.id', $aulaHorarioId)
            ->where('versao_id', (new VersoesModel())->getVersaoByUser(auth()->id()))
            ->get();

        foreach ($builder->getResult() as $row)
        {
            $professor = $row->professor_id;
            $tempo = $row->tempo_de_aula_id;

            $builder2 = $this->db->table('tempos_de_aula')->select('*')->where('id', $tempo)->get();
            $dia_semana = $builder2->getRowArray()['dia_semana'];
            $hora_inicio = $builder2->getRowArray()['hora_inicio'];
            $minuto_inicio = $builder2->getRowArray()['minuto_inicio'];

            $builder3 = $this->select('aula_horario.id as theid')
                ->join('tempos_de_aula', 'aula_horario.tempo_de_aula_id = tempos_de_aula.id')
                ->join('aula_professor', 'aula_professor.aula_id = aula_horario.aula_id')
                ->where('aula_horario.id !=', $aulaHorarioId)
                ->where('aula_professor.professor_id', $professor)
                ->where('tempos_de_aula.dia_semana', $dia_semana)
                ->where('(tempos_de_aula.hora_inicio * 60 + tempos_de_aula.minuto_inicio) <=', $hora_inicio * 60 + $minuto_inicio)
                ->where('(tempos_de_aula.hora_fim * 60 + tempos_de_aula.minuto_fim) >', $hora_inicio * 60 + $minuto_inicio)
                ->get();

            if ($builder3->getNumRows() > 0)
            {
                return $builder3->getRowArray()['theid']; // Conflito encontrado, retorna o ID do horário de aula em conflito
            }
        }

        return 0; // Sem conflito
    }

    public function restricaoDocente($aulaHorarioId)
    {
        // Obter professor(es) e o tempo de aula do horário atual
        $builder = $this->select('professor_id, tempo_de_aula_id')
            ->join('aula_professor', 'aula_professor.aula_id = aula_horario.aula_id')
            ->where('aula_horario.id', $aulaHorarioId)
            ->where('versao_id', (new VersoesModel())->getVersaoByUser(auth()->id()))
            ->get();

        // Iterar sobre os resultados
        foreach ($builder->getResult() as $row)
        {
            $professor = $row->professor_id;
            $tempo = $row->tempo_de_aula_id;

            //Obter o dia da semana, hora e minuto de início do tempo de aula
            $builder2 = $this->db->table('tempos_de_aula')->select('*')->where('id', $tempo)->get();
            $dia_semana = $builder2->getRowArray()['dia_semana'];
            $hora_inicio = $builder2->getRowArray()['hora_inicio'];
            $minuto_inicio = $builder2->getRowArray()['minuto_inicio'];

            //Verificar se há restrições para o professor no mesmo dia e horário
            $builder3 = $this->db->table('professor_regras')
                ->select('tempos_de_aula.id as theid')
                ->join('tempos_de_aula', 'tempo_de_aula_id = tempos_de_aula.id')
                ->where('professor_regras.professor_id', $professor)
                ->where('tipo', '2') //restrição
                ->where('tempos_de_aula.dia_semana', $dia_semana)
                ->where('(tempos_de_aula.hora_inicio * 60 + tempos_de_aula.minuto_inicio) <=', $hora_inicio * 60 + $minuto_inicio)
                ->where('(tempos_de_aula.hora_fim * 60 + tempos_de_aula.minuto_fim) >', $hora_inicio * 60 + $minuto_inicio)
                ->get();

            if ($builder3->getNumRows() > 0)
            {
                return $builder3->getRowArray()['theid']; // Conflito encontrado, retorna o ID do da regra conflitante do professor
            }
        }

        return 0; // Sem conflito
    }

    public function verificarTresTurnos($aulaHorarioId)
    {
        // Obter professor(es) e o tempo de aula do horário atual
        $builder = $this->select('professor_id, tempo_de_aula_id')
            ->join('aula_professor', 'aula_professor.aula_id = aula_horario.aula_id')
            ->where('aula_horario.id', $aulaHorarioId)
            ->where('versao_id', (new VersoesModel())->getVersaoByUser(auth()->id()))
            ->get();       

        // Iterar sobre os resultados, para o caso de mais de um professor na aula
        foreach ($builder->getResult() as $row)
        {
            $professor = $row->professor_id;
            $tempo = $row->tempo_de_aula_id;

            //Obter o dia da semana, hora e minuto de início do tempo de aula
            $builder2 = $this->db->table('tempos_de_aula')->select('*')->where('id', $tempo)->get();
            $dia_semana = $builder2->getRowArray()['dia_semana'];
            $hora_inicio = $builder2->getRowArray()['hora_inicio'];

            //Flags para os turnos
            $manha = $tarde = $noite = false;

            //Obter o dia da semana, hora e minuto de início do tempo de aula
            $builder2 = $this->select()
                ->join('aula_professor', 'aula_professor.aula_id = aula_horario.aula_id')
                ->join('tempos_de_aula', 'aula_horario.tempo_de_aula_id = tempos_de_aula.id')
                ->where('aula_professor.professor_id', $professor)
                ->where('tempos_de_aula.dia_semana', $dia_semana)
                ->get();

            foreach ($builder2->getResult() as $row2)
            {            
                $hora_inicio = $row2->hora_inicio;

                if ($hora_inicio < 12)
                    $manha = true;
                else if ($hora_inicio >= 12 && $hora_inicio < 18)
                    $tarde = true;
                else if ($hora_inicio >= 18)
                    $noite = true;            

                if($manha && $tarde && $noite)
                {
                    return 1; // Três turnos para o dia
                }
            }
        }

        return 0; // Sem três turnos para o dia
    }

    public function verificarTempoEntreTurnos($aulaHorarioId)
    {
        // Obter professor(es) e o tempo de aula do horário atual
        $builder = $this->select('professor_id, tempo_de_aula_id')
            ->join('aula_professor', 'aula_professor.aula_id = aula_horario.aula_id')
            ->where('aula_horario.id', $aulaHorarioId)
            ->where('versao_id', (new VersoesModel())->getVersaoByUser(auth()->id()))
            ->get();       

        // Iterar sobre os resultados, para o caso de mais de um professor na aula
        foreach ($builder->getResult() as $row)
        {
            $professor = $row->professor_id;
            $tempo = $row->tempo_de_aula_id;

            //Obter o dia da semana, hora e minuto de início do tempo de aula
            $builder2 = $this->db->table('tempos_de_aula')->select('*')->where('id', $tempo)->get();
            $dia_semana = $builder2->getRowArray()['dia_semana'];
            $hora_inicio = $builder2->getRowArray()['hora_inicio'];
            $hora_fim = $builder2->getRowArray()['hora_fim'];
            $minuto_inicio = $builder2->getRowArray()['minuto_inicio'];
            $minuto_fim = $builder2->getRowArray()['minuto_fim'];

            //dados da aula sendo verificada
            $aula_timestamp_inicio = $hora_inicio * 60 + $minuto_inicio;
            $aula_timestamp_fim = $hora_fim * 60 + $minuto_fim;

            //Flags para os turnos
            $aula_turno = 0;

            if ($hora_inicio < 12) $aula_turno = 1; // Manhã
            else if ($hora_inicio >= 12 && $hora_inicio < 18) $aula_turno = 2; // Tarde
            else if ($hora_inicio >= 18) $aula_turno = 3; // Noite

            //Flags para os turnos
            $manha = $tarde = $noite = false;

            $menor_inicio_manha = $menor_inicio_tarde = $menor_inicio_noite = $amanha_manha_inicio = 9999999;
            $maior_fim_manha = $maior_fim_tarde = $maior_fim_noite = $ontem_noite_fim = 0;

            $menor_inicio_manha_aulaid = $menor_inicio_tarde_aulaid = $menor_inicio_noite_aulaid = $amanha_manha_inicio_aulaid = 0;
            $maior_fim_manha_aulaid = $maior_fim_tarde_aulaid = $maior_fim_noite_aulaid = $ontem_noite_fim_aulaid = 0;

            //Obter o dia da semana, hora e minuto de início do tempo de aula
            $builder2 = $this->select('*, aula_horario.id as theid')
                ->join('aula_professor', 'aula_professor.aula_id = aula_horario.aula_id')
                ->join('tempos_de_aula', 'aula_horario.tempo_de_aula_id = tempos_de_aula.id')
                ->where('aula_professor.professor_id', $professor)
                ->whereIn('tempos_de_aula.dia_semana', [$dia_semana, ($dia_semana+1), ($dia_semana-1)]) //pega horários do dia da aula, e do dia seguinte e anterior também pra comparar a manhã com noite
                ->get();

            foreach ($builder2->getResult() as $row2)
            {
                //dados da aula vinda do banco de dados
                $timestamp_inicio = $row2->hora_inicio * 60 + $row2->minuto_inicio;
                $timestamp_fim = $row2->hora_fim * 60 + $row2->minuto_fim;

                if ($row2->hora_inicio < 12)
                {
                    $manha = true;

                    /*if($row2->dia_semana == $dia_semana && $timestamp_inicio < $menor_inicio_manha) //manhã de hoje - inicio
                    {
                        $menor_inicio_manha = $timestamp_inicio;
                        $menor_inicio_manha_aulaid = $row2->theid;
                    }*/

                    if($row2->dia_semana == $dia_semana && $timestamp_fim > $maior_fim_manha) //manhã de hoje - fim
                    {
                        $maior_fim_manha = $timestamp_fim;
                        $maior_fim_manha_aulaid = $row2->theid;
                    }

                    if($row2->dia_semana == ($dia_semana+1) && $timestamp_inicio < $amanha_manha_inicio) //manhã de amanhã - inicio
                    {
                        $amanha_manha_inicio = $timestamp_inicio;
                        $amanha_manha_inicio_aulaid = $row2->theid;
                    }
                }
                else if ($row2->hora_inicio >= 12 && $row2->hora_inicio < 18)
                {
                    $tarde = true;

                    if($row2->dia_semana == $dia_semana && $timestamp_inicio < $menor_inicio_tarde) //tarde de hoje
                    {
                        $menor_inicio_tarde = $timestamp_inicio;
                        $menor_inicio_tarde_aulaid = $row2->theid;
                    }

                    if($row2->dia_semana == $dia_semana && $timestamp_fim > $maior_fim_tarde) //tarde de hoje
                    {
                        $maior_fim_tarde = $timestamp_fim;
                        $maior_fim_tarde_aulaid = $row2->theid;
                    }
                }
                else if ($row2->hora_inicio >= 18)
                {
                    $noite = true;

                    if($row2->dia_semana == $dia_semana && $timestamp_inicio < $menor_inicio_noite) //noite de hoje - inicio
                    {
                        $menor_inicio_noite = $timestamp_inicio;
                        $menor_inicio_noite_aulaid = $row2->theid;
                    }

                    /*if($row2->dia_semana == $dia_semana && $timestamp_fim < $maior_fim_noite) //noite de hoje - fim
                    {
                        $maior_fim_noite = $timestamp_fim;
                        $maior_fim_noite_aulaid = $row2->theid;
                    }*/

                    if($row2->dia_semana == ($dia_semana-1) && $timestamp_fim > $ontem_noite_fim) //noite de ontem
                    {
                        $ontem_noite_fim = $timestamp_fim;
                        $ontem_noite_fim_aulaid = $row2->theid;
                    }
                }
            }

            // aula atual manhã, e tem aula a tarde
            if(($aula_turno == 1 && $tarde)) 
            {
                if(($menor_inicio_tarde - $aula_timestamp_fim) < (60)) // uma hora de intervalo
                    return "1-" . ($menor_inicio_tarde - $aula_timestamp_fim) . "-" . $menor_inicio_tarde_aulaid;
                    //problema entre manhã e tarde = 1
                    //seguido da diferença de tempo
                    //seguido do id da aula que está causando o problema
            }

            // aula atual a tarde, e tem aula de manhã
            if($aula_turno == 2 && $manha) 
            {
                if(($aula_timestamp_inicio - $maior_fim_manha) < (60)) // uma hora de intervalo
                    return "1-" . ($aula_timestamp_inicio - $maior_fim_manha) . "-" . $maior_fim_manha_aulaid;
                    //problema entre manhã e tarde = 1
                    //seguido da diferença de tempo
                    //seguido do id da aula que está causando o problema
            }

            // aula atual a tarde, e tem aula a noite
            if($aula_turno == 2 && $noite)
            {
                if(($menor_inicio_noite - $aula_timestamp_fim) < (60)) // uma hora de intervalo
                    return "2-" . ($menor_inicio_noite - $aula_timestamp_fim) . "-" . $menor_inicio_noite_aulaid;
                    //problema entre tarde e noite = 2
                    //seguido da diferença de tempo
                    //seguido do id da aula que está causando o problema
            }

            // aula atual a noite, e tem aula a tarde
            if($aula_turno == 3 && $tarde)
            {
                if(($aula_timestamp_inicio - $maior_fim_tarde) < (60)) // uma hora de intervalo
                    return "2-" . ($aula_timestamp_inicio - $maior_fim_tarde) . "-" . $maior_fim_tarde_aulaid;
                    //problema entre tarde e noite = 2
                    //seguido da diferença de tempo
                    //seguido do id da aula que está causando o problema
            }

            // aula atual noite, e tem aula amanhã de manhã
            if($aula_turno == 3 && $amanha_manha_inicio != 9999999)
            {
                if((($amanha_manha_inicio+1440) - $aula_timestamp_fim) < (11*60)) // onze horas de intervalo
                    return "3-" . (($amanha_manha_inicio+1440) - $aula_timestamp_fim) . "-" . $amanha_manha_inicio_aulaid; 
                    //problema entre noite e manhã do dia seguinte = 3
                    //seguido da diferença de tempo
                    //seguido do id da aula que está causando o problema
            }
            
            // aula atual manhã, e tem aula ontem a noite
            if($aula_turno == 1 && $ontem_noite_fim != 0) 
            {
                if((($aula_timestamp_inicio+1440) - $ontem_noite_fim) < (11*60)) // onze horas de intervalo
                    return "4-" . (($aula_timestamp_inicio+1440) - $ontem_noite_fim) . "-" . $ontem_noite_fim_aulaid;
                    //problema entre manhã e noite do dia anterior = 4
                    //seguido da diferença de tempo
                    //seguido do id da aula que está causando o problema
            }

            //FALTA AVALIAR ALGUMAS SITUAÇÕES NO OPOSTO, POR EXEMPLO, VERIFICAR NA NOITE SE TEM HORÁRIO A TARDE COM POUCO TEMPO
        }

        return 0; // Sem problemas de intervalo
    }
}
