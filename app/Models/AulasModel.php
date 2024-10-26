<?php

namespace App\Models;

use CodeIgniter\Model;

class AulasModel extends Model
{
    protected $table            = 'aulas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['disciplina_id', 'turma_id', 'versao_id'];

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
        'disciplina_id' => 'required|is_not_unique[disciplinas.id]|max_length[11]',
        'turma_id' => 'required|is_not_unique[turmas.id]|max_length[11]',
        'versao_id' => 'is_not_unique[versoes.id]|max_length[11]',
    ];
    protected $validationMessages   = [

        "disciplina_id" => [
            "required" => "O campo disciplina é obrigatório",
            "is_not_unique" => "A disciplina deve estar cadastrada",
            "max_length" => "O tamanho máximo são 11 digitos",
        ],
        "turma_id" => [
            "required" => "O campo turma é obrigatório",
            "is_not_unique" => "A turma deve estar cadastrada",
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
