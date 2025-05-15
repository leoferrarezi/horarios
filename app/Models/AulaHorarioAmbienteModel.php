<?php

namespace App\Models;

use CodeIgniter\Model;

class AulaHorarioAmbienteModel extends Model
{
    protected $table            = 'aula_horario_ambiente';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['aula_horario_id', 'ambiente_id'];

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
        'aula_horario_id' => 'required|is_not_unique[aula_horario.id]|max_length[11]',
        'ambiente_id' => 'required|is_not_unique[ambientes.id]|max_length[11]'
    ];

    protected $validationMessages   = [
        "aula_horario_id" => [
            "required" => "O campo aula é obrigatório",
            "is_not_unique" => "A aula deve estar cadastrada",
            "max_length" => "O tamanho máximo é de 11 dígitos"
        ],
        "ambiente_id" => [
            "required" => "O campo ambiente é obrigatório",
            "is_not_unique" => "O ambiente deve estar cadastrado",
            "max_length" => "O tamanho máximo são 11 digitos"
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
