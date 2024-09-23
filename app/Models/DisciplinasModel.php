<?php

namespace App\Models;

use CodeIgniter\Model;

class DisciplinasModel extends Model
{
    protected $table            = 'disciplinas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome', 'codigo', 'matriz_id', 'ch', 'max_tempos_diarios', 'periodo', 'abreviatura', 'grupo_de_ambientes_id'];

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
        'nome' => 'required|max_length[128]',
        'codigo' => 'required|is_unique[disciplinas.codigo,id,{id}]',
        'matriz_id' => 'required|is_not_unique[matrizes.id]|max_length[11]',
        'ch' => 'required|integer|max_length[4]',
        'max_tempos_diarios' => 'required|is_natural|max_length[2]|',
        'periodo' => 'required|integer|max_length[2]',
        'abreviatura' => 'permit_empty|max_length[32]',
        'grupo_de_ambientes_id' => 'required|is_not_unique[grupo_de_ambientes.id]',
    ];
    protected $validationMessages   = [];
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
