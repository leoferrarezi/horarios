<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Exceptions\ReferenciaException;

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
        'abreviatura' => 'required|max_length[32]',
        //'grupo_de_ambientes_id' => 'required|is_not_unique[grupos_de_ambientes.id]',
    ];
    protected $validationMessages   = [
        "nome" => [
            "required" => "Informe o nome da Disciplina.",
            "max_length" => "O nome da Disciplina deve ter no máximo 128 caracteres.",
        ],
        "codigo" => [
            "required" => "Informe o Código da Disciplina.",
            "is_unique" => "O Código informado já está cadastrado.",
        ],
        "matriz_id" => [
            "required" => "Informe a Matriz Curricular.",
            "is_not_unique" => "A Matriz Curricular deve estar cadastrada.",
            "max_length" => "O tamanho máximo de Matriz Curricular é 11 dígitos.",
        ],
        "ch" => [
            "required" => "Informe a Carga Horária da disciplina.",
            "integer" => "Carga Horária deve ser um número inteiro.",
            "max_length" => "O tamanho máximo da Carga Horária é 4 dígitos.",
        ],
        "max_tempos_diarios" => [
            "required" => "Informe o Tempo Máximo Diário.",
            "is_natural" => "Tempo Máximo Diário deve ser um número.",
            "max_length" => "O tamanho máximo de Tempo é 2 dígitos.",
        ],
        "periodo" => [
            "required" => "Informe o Período da Disciplina.",
            "integer" => "Período deve ser um número inteiro.",
            "max_length" => "O tamanho máximo de Período é 2 dígitos.",
        ],
        "abreviatura" => [
            "required" => "Informe a Abreviatura da Disciplina.",
            "max_length" => "O tamanho máximo de Abreviatura é 32 caracteres.",
        ],
        "grupo_de_ambientes_id" => [
            "required" => "Selecione o Grupo de Ambiente da Disciplina.",
            "is_not_unique" => "O Grupo de Ambiente deve estar cadastrado.",
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

    public function getDisciplinaWithMatrizAndGrupo()
    {
        return $this->select('disciplinas.*, matriz.nome as nome_matriz, ga.nome as grupo_de_ambiente')
            ->join('matrizes as matriz', 'matriz.id = disciplinas.matriz_id')
            ->join('grupos_de_ambientes as ga', 'ga.id = disciplinas.grupo_de_ambientes_id', 'left')
            ->findAll();
    }

    public function deleteAllDisciplinasFromMatriz($matriz)
    {
        $this->where('matriz_id', $matriz)->delete();
    }

    public function verificarReferencias(array $data)
    {
        $id = $data['id'];

        $referencias = $this->verificarReferenciasEmTabelas($id);
        $referencias = implode(", ", $referencias);
        // Se o ID for referenciado em outras tabelas, lança a exceção
        if (!empty($referencias)) {
            // Passa o nome das tabelas onde o ID foi encontrado para a exceção
            throw new ReferenciaException("Esta disciplina não pode ser excluída, porque está em uso. <br>
                    Para excluir esta disciplina, primeiro remova as associações em {$referencias} que estão utilizando esta disciplina'.");
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
            'aulas' => 'disciplina_id',
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
