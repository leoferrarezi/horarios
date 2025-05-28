<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Exceptions\ReferenciaException;

class ProfessorModel extends Model
{
    protected $table            = 'professores';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome', 'siape', 'email'];

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
    protected $validationRules = [
        'id' => 'permit_empty|is_natural_no_zero|max_length[11]',
        'nome' => 'required|is_unique[professores.nome,id,{id}]|max_length[96]',
        'siape' => 'permit_empty|is_unique[professores.siape,id,{id}]|exact_length[7]',
        'email' => 'permit_empty|valid_email|max_length[128]'
    ];

    protected $validationMessages   = [
        "nome" => [
            "required" => "Informe o nome do professor",
            "is_unique" => "Já existe um registro com esse nome",
            "max_length" => "O nome pode ter no máximo 96 caracteres",
        ],
        "siape" => [
            "is_unique" => "Este SIAPE já está cadastrado. Verifique e tente novamente.",
            "exact_length" => "O SIAPE deve ter 7 dígitos"
        ],
        "email" => [
            "valid_email" => "Informe um endereço de e-mail válido",
            "max_length" => "O e-mail pode ter no máximo 128 caracteres"
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
    protected $beforeDelete   = ['getRestricoes'];
    protected $afterDelete    = [];


    //função pra retornar todos os professores cadastrados no banco
    public function getProfessores($id = null)
    {
        if ($id === null) {
            $professores = $this->findAll();
        } else {
            return $this->professores->find($id);
        }
    }

    public function getProfessoresNome()
    {
        $builder = $this->builder();
        $builder->select('nome');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getRestricoes($id) 
    {
        $id = $id['id'];
        
        $aulas = $this->db->table('aula_professor')->where('professor_id', $id)->get()->getNumRows();
        $regras = $this->db->table('professor_regras')->where('professor_id', $id)->get()->getNumRows();

        $restricoes = [
            'aulas' => $aulas, 
            'regras' => $regras
        ];

        return $restricoes;
    }
}
