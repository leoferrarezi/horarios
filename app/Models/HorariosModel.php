<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Exceptions\ReferenciaException;

class HorariosModel extends BaseModel
{
    protected $table            = 'horarios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome'];

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
        'nome' => 'required|is_unique[horarios.nome,id,{id}]|max_length[64]',
    ];
    protected $validationMessages   = [
        "nome" => [
            "required" => "Informe o nome da Grade de Horário.",
            "is_unique" => "A Grade de Horário informada já está cadastrada.",
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = ['logInsert'];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = ['logUpdate'];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = ['getRestricoes'];
    protected $afterDelete    = ['logDelete'];

    public function getHorariosAulas()
    {
        // Conecta ao banco de dados
        $db = \Config\Database::connect();

        // Cria o builder para a tabela 'horario'
        $builder = $this->builder();
        $builder->orderBy('id');
        $horarios = $builder->get()->getResultArray();

        // Para cada horário, busca os tempos de aula relacionados
        foreach ($horarios as &$horario) {
            $builder2 = $db->table('tempos_de_aula');
            $tempos = $builder2->where('horario_id', $horario['id'])->get()->getResultArray();
            $horario['tempos_de_aula'] = $tempos;
        }

        return $horarios;
    }

    protected function logInsert(array $data)
    {
        $this->registrarLog('Inserção', 'Nova grade de horário adicionado', $data['id'] ?? null);
        return $data;
    }

    protected function logUpdate(array $data)
    {
        $this->registrarLog('Edição', 'Grade de horário atualizado', $data['id'][0] ?? null);
        return $data;
    }

    protected function logDelete(array $data)
    {
        $this->registrarLog('Exclusão', 'Grade de horário removido', $data['id'][0] ?? null);
        return $data;
    }

    public function getRestricoes($id) 
    {
        $id = $id['id'];

        $tempos_aula = $this->db->table('tempos_de_aula')->where('horario_id', $id)->get()->getNumRows();
        $turmas = $this->db->table('turmas')->where('horario_id', $id)->get()->getNumRows();
        $turmas_pref = $this->db->table('turmas')->where('horario_preferencial_id', $id)->get()->getNumRows();

        $restricoes = [
            'tempos_aula' => $tempos_aula, 
            'turmas' => $turmas, 
            'turmas_pref' => $turmas_pref
        ];

        return $restricoes;
    }
}
