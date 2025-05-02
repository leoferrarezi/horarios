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
    protected $allowedFields    = ['aula_id', 'tempo_de_aula_id', 'versao_id', 'ambiente_id'];

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
        'versao_id' => 'required|is_not_unique[versoes.id]|max_length[11]',
        'ambiente_id' => 'required|is_not_unique[ambientes.id]|max_length[11]'
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
        ],
        "ambiente_id" => [
            "is_not_unique" => "O ambiente deve estar cadastrado",
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

    public function deleteAulaNoHorario($aula_id, $tempo_de_aula_id, $versao_id)
    {
        $this->db->simpleQuery("
            DELETE horario FROM aula_horario as horario 
            JOIN aulas ON aulas.id = horario.aula_id 
            WHERE horario.tempo_de_aula_id = '$tempo_de_aula_id' AND horario.versao_id = '$versao_id'
            AND aulas.turma_id = (SELECT turma_id FROM aulas WHERE aulas.id = '$aula_id'AND versao_id = '$versao_id')
        ");        
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
        $builder = $this->select('ambiente_id, tempo_de_aula_id')->where('id', $aulaHorarioId)->get();
        $ambiente = $builder->getRowArray()['ambiente_id'];
        $tempo = $builder->getRowArray()['tempo_de_aula_id'];

        $builder = $this->db->table('tempos_de_aula')->select('*')->where('id', $tempo)->get();
        $dia_semana = $builder->getRowArray()['dia_semana'];
        $hora_inicio = $builder->getRowArray()['hora_inicio'];
        $minuto_inicio = $builder->getRowArray()['minuto_inicio'];
        $hora_fim = $builder->getRowArray()['hora_fim'];
        $minuto_fim = $builder->getRowArray()['minuto_fim'];

        $builder = $this->select('aula_horario.id as theid')
            ->join('tempos_de_aula', 'aula_horario.tempo_de_aula_id = tempos_de_aula.id')
            ->where('aula_horario.id !=', $aulaHorarioId)
            ->where('aula_horario.ambiente_id', $ambiente)
            ->where('tempos_de_aula.dia_semana', $dia_semana)
            ->where('(tempos_de_aula.hora_inicio * 60 + tempos_de_aula.minuto_inicio)', $hora_inicio * 60 + $minuto_inicio)
            ->where('(tempos_de_aula.hora_fim * 60 + tempos_de_aula.minuto_fim)', $hora_fim * 60 + $minuto_fim)
            ->get();

        if($builder->getNumRows() > 0)
        {
            return $builder->getRowArray()['theid']; // Conflito encontrado, retorna o ID do horário de aula em conflito
        }
        else
        {
            return 0; // Sem conflito
        }
    }

    public function choqueDocente()
    {
        //verificar se o professor não está em 2 aulas ao mesmo tempo
    }

    public function restricaoDocente()
    {
        //verificar restrições cadastradas
    }

    public function restricaoHorarios()
    {
        //intervalo de xxxx tempo minimo
        //ultima da noite + primeira da manha
    }
}
