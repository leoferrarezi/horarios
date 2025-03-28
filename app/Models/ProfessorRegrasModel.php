<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfessorRegrasModel extends Model
{
    protected $table            = 'professor_regras';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['professor_id', 'tempo_de_aula_id', 'tipo'];

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
        'tempo_de_aula_id' => 'required|is_not_unique[tempos_de_aula.id]|max_length[11]',
        'tipo' => 'required|is_natural|max_length[1]',
    ];
    protected $validationMessages   = [
        "professor_id" => [
            "required" => "O campo professor é obrigatório",
            "is_not_unique" => "O professor deve estar cadastrado",
            "max_length" => "O tamanho máximo é 11 dígitos",
        ],
        "tempo_de_aula_id" => [
            "required" => "O campo Tempo de Aula é obrigatório",
            "is_not_unique" => "O Tempo de Aula deve estar cadastrado",
            "max_length" => "O tamanho máximo é 11 dígitos",
        ],
        "tipo" => [
            "required" => "O campo tipo deve ser obrigatório",
            "is_natural" => "O campo deve ser um número",
            "max_length" => "O tamanho máximo é 1 dígito",
        ],
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
