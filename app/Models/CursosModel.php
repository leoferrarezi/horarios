<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Exceptions\ReferenciaException;

class CursosModel extends Model
{
    protected $table            = 'cursos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome', 'matriz_id'];

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
        'nome' => 'required|is_unique[cursos.nome,id,{id}]|max_length[128]',
        'matriz_id' => 'required|is_not_unique[matrizes.id]|max_length[11]'
    ];
    protected $validationMessages   = [
        "nome" => [
            "required" => "Informe o nome do Curso.",
            "is_unique" => "O Curso informado já está cadastrado.",
            "max_length" => "O nome do Curso deve ter no máximo 128 caracteres.",
        ],
        "matriz_id" => [
            "required" => "Informe a Matriz Curricular.",
            "is_not_unique" => "A Matriz Curricular informada deve estar cadastrada.",
            "max_length" => "A Matriz Curricular deve ter no máximo 11 caracteres.",
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
    protected $beforeDelete   = ['verificarReferencias'];
    protected $afterDelete    = [];

    public function getCursosWithMatriz()
    {
        return $this->select('cursos.*, matriz.nome as nome_matriz')
            ->join('matrizes as matriz', 'matriz.id = cursos.matriz_id') // Relacionamento com a tabela users
            ->findAll(); // Retorna todos os registros
    }

    public function getCursosNome()
    {
        $builder = $this->builder();
        $builder->select('nome');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getIdByNome($nome)
    {
        $builder = $this->builder();
        $builder->where('nome', $nome);
        $query = $builder->get();

        if($query->getNumRows() == 1)
        {
            $res = $query->getResultArray();
            return $res[0]['id'];
        }
        
        return null;
    }

    public function verificarReferencias(array $data)
    {
        $id = $data['id'];

        $referencias = $this->verificarReferenciasEmTabelas($id);
        $referencias = implode(", ", $referencias);
        // Se o ID for referenciado em outras tabelas, lança a exceção
        if (!empty($referencias)) {
            // Passa o nome das tabelas onde o ID foi encontrado para a exceção
            throw new ReferenciaException("Este curso não pode ser excluído, porque está em uso. <br>
                    Para excluir este curso, primeiro remova as associações em {$referencias} que estão utilizando este curso'.");
        }

        // Se não houver referências, retorna os dados para permitir a exclusão
        return $data;
    }

    private function verificarReferenciasEmTabelas($id)
    {
        // Conectar ao banco de dados
        $db = \Config\Database::connect();

        // Tabelas e colunas de chave estrangeira a serem verificadas
        $tabelas = [
            'turmas' => 'curso_id',
        ];

        $referenciasEncontradas = [];

        // Verificar se o ID é referenciado
        foreach ($tabelas as $tabela => $fk_coluna) {
            $builder = $db->table($tabela);
            $builder->where($fk_coluna, $id);
            $query = $builder->get();

            if ($query->getNumRows() > 0) {
                // Adiciona a tabela à lista de referências encontradas
                $referenciasEncontradas[] = $tabela;
            }
        }

        // Retorna as tabelas onde o ID foi encontrado
        return $referenciasEncontradas;
    }
}
