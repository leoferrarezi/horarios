<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Exceptions\ReferenciaException;

class TurmasModel extends Model
{
    protected $table            = 'turmas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['codigo', 'sigla', 'ano', 'semestre', 'periodo', 'curso_id', 'tempos_diarios', 'horario_id', 'horario_preferencial_id'];

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
        'codigo' => 'required|max_length[32]',
        'sigla' => 'required|max_length[32]',
        'ano' => 'required|regex_match[/^(20)\d{2}$/]', //regex valida se o ano começa com 20 e aceita qualquer outros 2 dígitos no fim | 2000 até 2099. issue RF05.
        'semestre' => 'required|regex_match[/^[12]$/]', //verifica se 1 ou 2.
        'periodo' => 'required',
        'curso_id' => 'required|max_length[11]|is_not_unique[cursos.id]',
        //'tempos_diarios' => 'required|is_natural|max_length[2]',
        'horario_id' => 'permit_empty|is_not_unique[horarios.id]|max_length[11]',
        'horario_preferencial_id' => 'permit_empty|is_not_unique[horarios.id]|max_length[11]'
    ];

    protected $validationMessages   = [
        'codigo' => [
            'required'    => 'Informe o Código da Turma.',
            'max_length'  => 'O Código da Turma deve ter no máximo 32 caracteres.'
        ],
        'sigla' => [
            'required'    => 'Informe a Sigla da Turma.',
            'max_length'  => 'A Sigla da Turma deve ter no máximo 32 caracteres.'
        ],
        'ano' => [
            'required'    => 'Informe o Ano da Turma',
            'regex_match' => 'O Ano da Turma deve ser um ano válido, começando com "20" e seguido por dois dígitos (ex: 2000 - 2099).'
        ],
        'semestre' => [
            'required'    => 'Informe o Semestre da Turma.',
            'regex_match' => 'O Semestre da Turma deve ser 1 ou 2.'
        ],
        'periodo' => [
            'required'    => 'Informe o Período da Turma.'
        ],
        'curso_id' => [
            'required'       => 'Informe o Curso da Turma.',
            'max_length'     => 'O Curso deve ter no máximo 11 caracteres.',
            'is_not_unique'  => 'O Curso informado não está cadastrado.'
        ],
        /*'tempos_diarios' => [
            'required'     => 'Informe os Tempos de Aula Diários da turma.',
            'is_natural'   => 'O campo tempos diários deve ser um número.',
            'max_length'   => 'O campo tempos diários não pode exceder 2 caracteres.'
        ],*/
        'horario_id' => [
            'permit_empty'  => 'O campo Horário é opcional.',
            'is_not_unique' => 'O Horário informado não está cadastrado.',
            'max_length'    => 'Horário deve ter no máximo 11 caracteres.'
        ],
        'horario_preferencial_id' => [
            'permit_empty'  => 'O campo Horário Preferencial é opcional.',
            'is_not_unique' => 'O Horário Preferencial informado não está cadastrado.',
            'max_length'    => 'Horário Preferencial deve ter no máximo 11 caracteres.'
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
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getTurmasWithHorarioAndCursos()
    {
        return $this->select('turmas.*, horario.nome as horario, hp.nome as horario_preferencial, curso.nome as curso')
            ->join('horarios as horario', 'horario.id = turmas.horario_id', 'left')
            ->join('horarios as hp', 'hp.id = turmas.horario_preferencial_id', 'left')
            ->join('cursos as curso', 'curso.id = turmas.curso_id')
            ->orderBy('turmas.sigla', 'asc')
            ->findAll();
    }

    public function getTurmasByCursos($curso_id)
    {
        return $this->select('id,sigla')->where('curso_id', $curso_id)->orderBy('sigla')->findAll();
    }

    public function getTurmasByCursosAndSemestre($curso_id,$semestre)
    {
        return $this->select('id,sigla')->where(['curso_id' => $curso_id, 'semestre' => $semestre])->orderBy('sigla')->findAll();
    }

    public function verificarReferencias(array $data)
    {
        $id = $data['id'];

        $referencias = $this->verificarReferenciasEmTabelas($id);
        $referencias = implode(", ", $referencias);

        // Se o ID for referenciado em outras tabelas, lança a exceção
        if (!empty($referencias)) 
        {
            // Passa o nome das tabelas onde o ID foi encontrado para a exceção
            throw new ReferenciaException("Esta turma não pode ser excluída, porque está em uso. <br>
                    Para excluir esta turma, primeiro remova as associações em {$referencias} que estão utilizando esta turma'.");
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
            'aulas' => 'turma_id',
        ];

        $referenciasEncontradas = [];

        // Verificar se o ID é referenciado
        foreach ($tabelas as $tabela => $fk_coluna) 
        {
            $builder = $db->table($tabela);
            $builder->where($fk_coluna, $id);
            $query = $builder->get();

            if ($query->getNumRows() > 0) 
            {
                // Adiciona a tabela à lista de referências encontradas
                $referenciasEncontradas[] = $tabela;
            }
        }

        // Retorna as tabelas onde o ID foi encontrado
        return $referenciasEncontradas;
    }
}
