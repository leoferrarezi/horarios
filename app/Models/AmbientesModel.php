<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Exceptions\ReferenciaException;

class AmbientesModel extends Model
{
    protected $table            = 'ambientes';
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
        'nome' => 'required|is_unique[ambientes.nome,id,{id}]|max_length[128]',
    ];
    protected $validationMessages   = [
        "nome" => [
            "required" => "Informe o nome do Ambiente.",
            "is_unique" => "Este ambiente já está cadastrado.",
            "max_length" => "O tamanho do Ambiente deve ser de no máximo 128 caracteres.",
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

        $grupos = $this->db->table('ambiente_grupo')->where('ambiente_id', $id)->get()->getNumRows();
        $horarios = $this->db->table('aula_horario_ambiente')->where('ambiente_id', $id)->get()->getNumRows();

        $restricoes = [
            'grupos' => $grupos, 
            'horarios' => $horarios
        ];

        return $restricoes;
    }
}
