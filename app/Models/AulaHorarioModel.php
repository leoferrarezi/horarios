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
            ->get();

        if ($idHorarioAula->getNumRows() > 0)
        {
            $idHorarioAula = $idHorarioAula->getRowArray()['id'];
            $this->db->simpleQuery("DELETE FROM aula_horario_ambiente WHERE aula_horario_id = '$idHorarioAula'");
            $this->db->simpleQuery("DELETE FROM aula_horario WHERE id = '$idHorarioAula'");
        }
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
}
