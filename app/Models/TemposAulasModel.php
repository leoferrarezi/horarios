<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Exceptions\ReferenciaException;

class TemposAulasModel extends Model
{
    protected $table            = 'tempos_de_aula';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['horario_id', 'dia_semana', 'hora_inicio', 'minuto_inicio', 'hora_fim', 'minuto_fim'];

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
        'horario_id' => 'required|is_not_unique[horarios.id]|max_length[11]',
        'dia_semana' => 'required',
        'hora_inicio' => 'required|regex_match[/^(?:[01][0-9]|2[0-3])$/]', //aceita de 00 a 23
        'minuto_inicio' => 'required|regex_match[/^(?:[0-5][0-9])$/]', //aceita entre 00 a 59
        'hora_fim' => 'required|regex_match[/^(?:[01][0-9]|2[0-3])$/]', //aceita de 00 a 23
        'minuto_fim' => 'required|regex_match[/^(?:[0-5][0-9])$/]', //aceita entre 00 a 59
    ];
    protected $validationMessages   = [
        "horario_id" => [
            "required" => "Informe o Horário.",
            "is_not_unique" => "O Horário deve estar cadastrado.",
            "max_length" => "O Horário deve ter no máximo 11 caracteres.",
        ],
        'dia_semana' => [
            'required'    => 'Informe o Dia da Semana.',
            'regex_match' => 'Dia da Semana deve ser um número entre 0 e 6.'
        ],
        'hora_inicio' => [
            'required'    => 'Informe a Hora início.',
            'regex_match' => 'Hora ínicio deve estar entre 00 e 23.',
        ],
        'minuto_inicio' => [
            'required'    => 'Informe o Minuto início.',
            'regex_match' => 'Minuto início deve estar entre 00 e 59.'
        ],
        'hora_fim' => [
            'required'    => 'Informe a Hora Fim.',
            'regex_match' => 'Hora Fim deve estar entre 00 e 23.'
        ],
        'minuto_fim' => [
            'required'    => 'Informe o Minuto Fim.',
            'regex_match' => 'Minuto Fim deve estar entre 00 e 59.'
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

    public function getTemposAulaWithHorario()
    {
        return $this->select('tempos_de_aula.*, horario.nome as nome_horario')
            ->join('horarios as horario', 'horario.id = tempos_de_aula.horario_id') // Relacionamento com a tabela users
            ->orderBy('dia_semana,hora_inicio,minuto_inicio')
            ->findAll(); // Retorna todos os registros
    }

    public function verificarReferencias(array $data)
    {
        $id = $data['id'];

        $referencias = $this->verificarReferenciasEmTabelas($id);
        $referencias = implode(", ", $referencias);
        // Se o ID for referenciado em outras tabelas, lança a exceção
        if (!empty($referencias)) {
            // Passa o nome das tabelas onde o ID foi encontrado para a exceção
            throw new ReferenciaException("Este tempo de aula não pode ser excluído, porque está em uso. <br>
                    Para excluir este tempo de aula, primeiro remova as associações em {$referencias} que estão utilizando este tempo de aula'.");
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
            'aula_horario' => 'tempo_de_aula_id',
            'professor_regras' => 'tempo_de_aula_id',

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
  
    public function getTemposAulas($professorID = null)
    {
        $builder = $this->table('tempos_de_aula');
        $builder->select("id, dia_semana,
            CASE 
                WHEN hora_inicio < 12 THEN 'Manhã'
                WHEN hora_inicio < 18 THEN 'Tarde'
                ELSE 'Noite'
            END AS periodo,
            CONCAT(LPAD(hora_inicio, 2, '0'), ':', LPAD(minuto_inicio, 2, '0')) AS inicio,
            CONCAT(LPAD(hora_fim, 2, '0'), ':', LPAD(minuto_fim, 2, '0')) AS fim");
        $builder->orderBy('dia_semana', 'ASC')
                ->orderBy('hora_inicio', 'ASC')
                ->orderBy('minuto_inicio', 'ASC');

        $tempos = $builder->get()->getResultArray();

        $diasSemana = [
            0 => 'Domingo',
            1 => 'Segunda',
            2 => 'Terça',
            3 => 'Quarta',
            4 => 'Quinta',
            5 => 'Sexta',
            6 => 'Sábado'
        ];

        $horariosPorDia = [];

        $professorRegrasModel = new \App\Models\ProfessorRegrasModel();

        foreach ($tempos as $tempo) {
            $diaSemanaNome = $diasSemana[$tempo['dia_semana']] ?? 'Desconhecido';
            $periodo = $tempo['periodo'];

        $tipo = null;
        if ($professorID) {
            $regra = $professorRegrasModel->where([
                'professor_id' => $professorID,
                'tempo_de_aula_id' => $tempo['id']
            ])->first();
            $tipo = $regra['tipo'] ?? -1;
        }

        $horarioFormatado = [
            'id' => $tempo['id'],
            'inicio' => $tempo['inicio'],
            'fim' => $tempo['fim'],
            'tipo' => $tipo
        ];

        if (!isset($horariosPorDia[$diaSemanaNome][$periodo])) {
            $horariosPorDia[$diaSemanaNome][$periodo] = [];
        }

        if (!in_array($horarioFormatado, $horariosPorDia[$diaSemanaNome][$periodo])) {
            $horariosPorDia[$diaSemanaNome][$periodo][] = $horarioFormatado;
            }
        }    

        return $horariosPorDia;
    }
}
