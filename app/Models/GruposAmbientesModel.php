<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Exceptions\ReferenciaException;

class GruposAmbientesModel extends Model
{
    protected $table            = 'grupos_de_ambientes';
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
        'nome' => 'required|max_length[64]|is_unique[grupos_de_ambientes.nome,id,{id}]',
    ];
    protected $validationMessages   = [
        "nome" => [
            "required" => "O campo nome é obrigatório",
            "max_length" => "O tamanho máximo é 64 caracteres",
            "is_unique" => "O Grupo Ambiente já cadastrado",
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

    public function getRestricoes($id)
    {
        $id = $id['id'];

        $ambientes = $this->db->table('ambiente_grupo')->where('grupo_de_ambiente_id', $id)->get()->getNumRows();
        $disciplinas = $this->db->table('disciplinas')->where('grupo_de_ambientes_id', $id)->get()->getNumRows();

        $restricoes = [
            'ambientes' => $ambientes, 
            'disciplinas' => $disciplinas
        ];

        return $restricoes;
    }
}
