<?php

namespace App\Models;

use CodeIgniter\Model;

class AmbienteGrupoModel extends Model
{
    protected $table            = 'ambiente_grupo';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['ambiente_id', 'grupo_de_ambiente_id'];

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
        'ambiente_id' => 'required|is_not_unique[ambientes.id]|max_length[11]',
        'grupo_de_ambiente_id' => 'required|is_not_unique[grupos_de_ambientes.id]',
    ];
    protected $validationMessages   = [
        "ambiente_id" => [
            "required" => "O campo ambiente é obrigatório",
            "is_not_unique" => "Ambiente não cadastrado",
            "max_length" => "Tamanho limite são 11 dígitos"
        ],
        "grupo_de_ambiente_id" => [
            "required" => "O campo Grupo de ambiente é obrigatório",
            "is_not_unique" => "Grupo de ambiente não cadastrado"
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
