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
        'versao_id' => 'is_not_unique[versoes.id]|max_length[11]',
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
}
