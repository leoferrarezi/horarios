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
        'grupo_de_ambientes_id' => 'required|is_not_unique[grupos_de_ambientes.id]',
    ];
    protected $validationMessages   = [
        "nome" => [
            "required" => "O campo nome é obrigatório",
            "max_length" => "O tamanho máximo e 128 dígitos",
        ],
        "codigo" => [
            "required" => "O campo o código é obrigatório",
            "is_unique" => "O código da disciplina já cadastrado",
        ],
        "matriz_id" => [
            "required" => "O campo matriz é obrigatório",
            "is_not_unique" => "A matriz deve estar cadastrada",
            "max_length" => "O tamanho máximo é 11 dígitos",
        ],
        "ch" => [
            "required" => "O campo ch é obrigatório",
            "integer" => "O campo deve ser um número inteiro",
            "max_length" => "O tamanho máximo é 4 dígitos",
        ], 
        "max_tempos_diarios" => [
            "required" => "O campo Tempo Máximo Diario é obrigatório",
            "is_natural" => "O campo deve ser um número",
            "max_length" => "O tamanho máximo é 2 dígitos",
        ],
        "periodo" => [
            "required" => "O campo período é obrigatório",
            "integer" => "O campo deve ser um número inteiro",
            "max_length" => "O tamanho máximo é 2 dígitos",
        ],
        "abreviatura" => [
            "max_length" => "O tamanho máximo é 32 caracteres",
        ],
        "grupo_de_ambientes_id" => [
            "required" => "O campo Grupo de Ambiente é obrigatório",
            "is_not_unique" => "O Grupo de Ambiente deve estar cadastrado",
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

    public function getDisciplinaWithMatrizAndGrupo() {
        return $this->select('disciplinas.*, matriz.nome as nome_matriz, ga.nome as grupo_de_ambiente')
                    ->join('matrizes as matriz', 'matriz.id = disciplinas.matriz_id')
                    ->join('grupos_de_ambientes as ga', 'ga.id = disciplinas.grupo_de_ambientes_id')
                    ->findAll();
    }
}
