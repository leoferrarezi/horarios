<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Exceptions\ReferenciaException;
use CodeIgniter\Database\RawSql;

class VersoesModel extends Model
{
    protected $table            = 'versoes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome','semestre'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'id' => 'permit_empty|is_natural_no_zero|max_length[11]',
        'nome' => 'required|is_unique[versoes.nome,id,{id}]|max_length[96]',
        'semestre' => 'is_natural_no_zero'
    ];
    protected $validationMessages   = [
        'nome' => [
            'required'   => 'O campo nome é obrigatório.',
            'is_unique'  => 'Já existe uma versão com este nome. O nome deve ser único.',
            'max_length' => 'O campo nome não pode exceder 96 caracteres.'
        ],
        'semestre' => [
            'is_natural_no_zero' => 'O semestre precisa ser o número 1 ou 2',
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
            throw new ReferenciaException("Está versão não pode ser excluída, porque está em uso. <br>
                    Para excluir está versão, primeiro remova as associações em {$referencias} que estão utilizando está versão'.");
        }

        // Se não houver referências, retorna os dados para permitir a exclusão
        return $data;
    }

    private function verificarReferenciasEmTabelas($id)
    {
        // Tabelas e colunas de chave estrangeira a serem verificadas
        $tabelas = [
            //'aula_horario' => 'versao_id',
            //'aula_professor' => 'versao_id',
            'aulas' => 'versao_id',
        ];

        $referenciasEncontradas = [];

        // Verificar se o ID é referenciado
        foreach ($tabelas as $tabela => $fk_coluna) {
            $builder = $this->db->table($tabela);
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

    public function getVersaoByUser($user)
    {
        $builder = $this->db->table('users');
        $builder->select('versao_em_uso');
        $builder->where('id', $user);
        return $builder->get()->getRowArray()['versao_em_uso'];
    }

    public function setVersaoByUser($user,$versao)
    {
        $builder = $this->db->table('users');
        $builder->set('versao_em_uso', $versao);
        $builder->where('id', $user);  
        return $builder->update();
    }

    public function getLastVersion()
    {
        $builder = $this->db->table('versoes');
        $builder->select('id');
        $builder->orderBy('id', 'DESC');

        if($builder->countAllResults() == 0) {
            return 0;
        }

        return $builder->get()->getRowArray()['id'];
    }

    public function copyAllData($versaoOld)
    {         
        $builder = $this->db->table('versoes');
        $builder->select('id');
        $builder->orderBy('id', 'DESC');
        $versaoNew = $builder->get()->getRowArray()['id'];

        $builder = $this->db->table('aulas');
        $query = "SELECT disciplina_id, turma_id, $versaoNew FROM aulas WHERE versao_id = $versaoOld";
        $builder->ignore(true)->setQueryAsData(new RawSql($query), null, "disciplina_id, turma_id, versao_id")->insertBatch();

        $builder = $this->db->table('aula_horario');
        $query = "SELECT aula_id, tempo_de_aula_id, $versaoNew FROM aula_horario WHERE versao_id = $versaoOld";
        $builder->ignore(true)->setQueryAsData(new RawSql($query), null, "aula_id, tempo_de_aula_id, versao_id")->insertBatch();


    }
}
