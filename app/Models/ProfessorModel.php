<?php

namespace App\Models;

use CodeIgniter\Model;

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
            "required" => "O campo nome é obrigatório",
            "is_unique" => "O campo nome deve ser único",
            "max_length" => "O tamanho máximo é 96 caracteres",
        ],
        "siape" => [
            "is_unique" => "O siape deve ser único",
            "exact_length" => "O tamanho máximo e 7 dígitos"
        ],
        "email" => [
            "valid_email" => "O email é invalido",
            "max_length" => "O tamanho máximo é 128 caracteres"
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


     //função pra retornar todos os professores cadastrados no banco
    public function getProfessores($id = null)
    {
        if ($id === null) {
            $professores = $this->findAll();
        } else {
            return $this->professores->find($id);
        }
    }
}





    //função pra retornar todos os professores cadastrados no banco
    public function getProfessores($id = null){
        if($id === null){
            $professores = $this->findAll();
        }else{
            return $this->professores->find($id);
        }
    }
}


