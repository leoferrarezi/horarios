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
    protected $beforeDelete   = ['getRestricoes'];
    protected $afterDelete    = [];

    public function getTemposAulaWithHorario()
    {
        return $this->select('tempos_de_aula.*, horario.nome as nome_horario')
            ->join('horarios as horario', 'horario.id = tempos_de_aula.horario_id') // Relacionamento com a tabela users
            ->orderBy('dia_semana,hora_inicio,minuto_inicio')
            ->findAll(); // Retorna todos os registros
    }

    public function getTemposAulas($professorID = null)
    {
        $builder = $this->table('tempos_de_aula')
            ->select("id, dia_semana,
                CASE 
                    WHEN hora_inicio < 12 THEN 'Manhã'
                    WHEN hora_inicio < 18 THEN 'Tarde'
                    ELSE 'Noite'
                END AS periodo,
                CONCAT(LPAD(hora_inicio, 2, '0'), ':', LPAD(minuto_inicio, 2, '0')) AS inicio,
                CONCAT(LPAD(hora_fim, 2, '0'), ':', LPAD(minuto_fim, 2, '0')) AS fim")
            ->orderBy('dia_semana', 'ASC')
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

        foreach ($tempos as $tempo)
        {
            $diaSemanaNome = $diasSemana[$tempo['dia_semana']] ?? 'Desconhecido';
            $periodo = $tempo['periodo'];

            $tipo = null;

            if ($professorID)
            {
                $regra = $professorRegrasModel->where([
                    'professor_id' => $professorID,
                    'tempo_de_aula_id' => $tempo['id']
                ])->first();
                $tipo = $regra['tipo'] ?? 0;
            }

            $horarioFormatado = [
                'id' => $tempo['id'],
                'inicio' => $tempo['inicio'],
                'fim' => $tempo['fim'],
                'tipo' => $tipo
            ];

            if (!isset($horariosPorDia[$diaSemanaNome][$periodo]))
            {
                $horariosPorDia[$diaSemanaNome][$periodo] = [];
            }

            $jatem = false;

            foreach ($horariosPorDia[$diaSemanaNome][$periodo] as $tudo)
            {
                if($tudo['inicio'] == $horarioFormatado['inicio'] && $tudo['fim'] == $horarioFormatado['fim'])
                {
                    $jatem = true;
                    break;
                }
            }

            if (!$jatem)
            {
                $horariosPorDia[$diaSemanaNome][$periodo][] = $horarioFormatado;
            }
        }

        return $horariosPorDia;
    }

    // Método para obter os tempos de aula de uma turma específica
    public function getTemposFromTurma($turma)
    {
        return $this->select("tempos_de_aula.id, dia_semana, hora_inicio, LPAD(minuto_inicio, 2, '0') as minuto_inicio, hora_fim, LPAD(minuto_fim, 2, '0') as minuto_fim")
            ->join('turmas', 'turmas.horario_id = tempos_de_aula.horario_id')
            ->where('turmas.id', $turma)
            ->orderBy('dia_semana, hora_inicio, minuto_inicio')
            ->findAll();
    }

    public function getRestricoes($id)
    {
        $id = $id['id'];

        $aula_horario = $this->db->table('aula_horario')->where('tempo_de_aula_id', $id)->get()->getNumRows();
        $professor_regras = $this->db->table('professor_regras')->where('tempo_de_aula_id', $id)->get()->getNumRows();

        $restricoes = [
            'horarios' => $aula_horario, 
            'regras' => $professor_regras
        ];

        return $restricoes;
    }
}
