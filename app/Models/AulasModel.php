<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Exceptions\ReferenciaException;

class AulasModel extends Model
{
    protected $table            = 'aulas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['disciplina_id', 'turma_id', 'versao_id'];

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
        'disciplina_id' => 'required|is_not_unique[disciplinas.id]|max_length[11]',
        'turma_id' => 'required|is_not_unique[turmas.id]|max_length[11]',
        'versao_id' => 'is_not_unique[versoes.id]|max_length[11]',
    ];
    protected $validationMessages   = [

        "disciplina_id" => [
            "required" => "O campo disciplina é obrigatório",
            "is_not_unique" => "A disciplina deve estar cadastrada",
            "max_length" => "O tamanho máximo são 11 digitos",
        ],
        "turma_id" => [
            "required" => "O campo turma é obrigatório",
            "is_not_unique" => "A turma deve estar cadastrada",
            "max_length" => "O tamanho máximo são 11 digitos",
        ],
        "versao_id" => [
            "is_not_unique" => "A versão precisa ser registrada",
            "max_length" => "O tamanho máximo são 11 digitos",
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

    public function verificarReferencias(array $data)
    {
        $id = $data['id'];

        $referencias = $this->verificarReferenciasEmTabelas($id);
        $referencias = implode(", ", $referencias);
        // Se o ID for referenciado em outras tabelas, lança a exceção
        if (!empty($referencias)) {
            // Passa o nome das tabelas onde o ID foi encontrado para a exceção
            throw new ReferenciaException("Está aula não pode ser excluída, porque está em uso. <br>
                    Para excluir está aula, primeiro remova as associações em {$referencias} que estão utilizando está aula'.");
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
            'aula_horario' => 'aula_id',
            'aula_professor' => 'aula_id',
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

    public function getAulasComTurmaDisciplinaEProfessores()
    {        
        return $this->select(
            "aulas.*, 
            turma.sigla as turma_sigla,
            turma.id as turma_id,
            disciplina.nome as disciplina_nome,
            disciplina.id as disciplina_id,
            curso.nome as curso_nome,
            curso.id as curso_id,
            GROUP_CONCAT(professores.nome) as professores_nome,
            GROUP_CONCAT(professores.id) as professores_id"
            )
            ->join("disciplinas as disciplina", "aulas.disciplina_id = disciplina.id")
            ->join("turmas as turma", "aulas.turma_id = turma.id")
            ->join("cursos as curso", "turma.curso_id = curso.id")
            ->join("aula_professor as ap", "aulas.id = ap.aula_id") // Relaciona aula com os professores
            ->join("professores as professores", "ap.professor_id = professores.id") // Relaciona a aula_professor com os professores
            ->groupBy("aulas.id") // Agrupa por ID da aula
            ->findAll();
    }
}
