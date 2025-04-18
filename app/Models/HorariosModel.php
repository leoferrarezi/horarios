<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Exceptions\ReferenciaException;

class HorariosModel extends BaseModel
{
    protected $table            = 'horarios';
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
        'nome' => 'required|is_unique[horarios.nome,id,{id}]|max_length[64]',
    ];
    protected $validationMessages   = [
        "nome" => [
            "required" => "Informe o nome da Grade de Horário.",
            "is_unique" => "A Grade de Horário informada já está cadastrada.",
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = ['logInsert'];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = ['logUpdate'];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = ['verificarReferencias'];
    protected $afterDelete    = ['logDelete'];

    public function verificarReferencias(array $data)
    {
        $id = $data['id'];

        $referencias = $this->verificarReferenciasEmTabelas($id);
        $referencias = implode(", ", $referencias);
        // Se o ID for referenciado em outras tabelas, lança a exceção
        if (!empty($referencias)) {
            // Passa o nome das tabelas onde o ID foi encontrado para a exceção
            throw new ReferenciaException("Este horário não pode ser excluído, porque está em uso. <br>
                    Para excluir este horário, primeiro remova as associações em {$referencias} que estão utilizando este horário'.");
        }

        // Se não houver referências, retorna os dados para permitir a exclusão
        return $data;
    }

    public function getHorariosAulas()
    {
        // Conecta ao banco de dados
        $db = \Config\Database::connect();

        // Cria o builder para a tabela 'horario'
        $builder = $this->builder();
        $builder->orderBy('id');
        $horarios = $builder->get()->getResultArray();

        // Para cada horário, busca os tempos de aula relacionados
        foreach ($horarios as &$horario) {
            $builder2 = $db->table('tempos_de_aula');
            $tempos = $builder2->where('horario_id', $horario['id'])->get()->getResultArray();
            $horario['tempos_de_aula'] = $tempos;
        }

        return $horarios;
    }

    private function verificarReferenciasEmTabelas($id)
    {
        // Conectar ao banco de dados
        $db = \Config\Database::connect();

        // Tabelas e colunas de chave estrangeira a serem verificadas
        $tabelas = [
            'tempos_de_aula' => 'horario_id',
            'turmas' => 'horario_id',
            'turmas' => 'horario_preferencial_id',

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
    protected function logInsert(array $data)
    {
        $this->registrarLog('Inserção', 'Nova grade de horário adicionado', $data['id'] ?? null);
        return $data;
    }

    protected function logUpdate(array $data)
    {
        $this->registrarLog('Edição', 'Grade de horário atualizado', $data['id'][0] ?? null);
        return $data;
    }

    protected function logDelete(array $data)
    {
        $this->registrarLog('Exclusão', 'Grade de horário removido', $data['id'][0] ?? null);
        return $data;
    }
}
