<?php

namespace App\Models;

use CodeIgniter\Model;

class AulaProfessorModel extends Model
{
    protected $table            = 'aula_professor';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['professor_id', 'aula_id', 'versao_id'];

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
        'professor_id' => 'required|is_not_unique[professores.id]|max_length[11]',
        'aula_id' => 'required|is_not_unique[aulas.id]|max_length[11]',
        'versao_id' => 'is_not_unique[versoes.id]|max_length[11]',
        
    ];
    protected $validationMessages   = [
        "professor_id" => [
            "required" => "O campo professor é obrigatório",
            "is_not_unique" => "O professor deve estar cadastrado",
            "max_length" => "O tamanho máximo é de 11 dígitos",
        ],
        "aula_id" => [
            "required" => "O campo aula é obrigatório",
            "is_not_unique" => "A aula deve estar cadastrada",
            "max_length" => "O tamanho máximo são 11 digitos",
        ],
        "versao_id" => [
            "is_not_unique" => "A versão precisa ser registrada",
            "max_length" => "O tamanho máximo são 11 digitos",
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
}
