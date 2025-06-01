<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Exceptions\ReferenciaException;

class MatrizCurricularModel extends Model
{
    protected $table            = 'matrizes';
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
    protected $validationRules = [
        'id' => 'permit_empty|is_natural_no_zero|max_length[11]',
        'nome' => 'required|max_length[128]',
    ];
    protected $validationMessages   = [
        "nome" => [
            "required" => "Informe o nome da Matriz Curricular.",
            "max_length" => "O tamanho máximo é 128 caracteres."
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



    public function getMatrizesNome()
    {
        $builder = $this->builder();
        $builder->select('nome');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function checkMatrizExists($matriz)
    {
        $builder = $this->builder();
        $builder->where('nome', $matriz);
        return $builder->countAllResults();
    }

    public function getIdByNome($nome)
    {
        $builder = $this->builder();
        $builder->where('nome', $nome);
        $query = $builder->get();
        $res = $query->getResultArray();
        return $res[0]['id'];
    }
    
    public function getRestricoes($id) 
    {
        $id = $id['id'];
        
        $cursos = $this->db->table('cursos')->where('matriz_id', $id)->get()->getNumRows();
        $disciplinas = $this->db->table('disciplinas')->where('matriz_id', $id)->get()->getNumRows();

        $restricoes = [
            'cursos' => $cursos, 
            'disciplinas' => $disciplinas
        ];

        return $restricoes;
    }
}
