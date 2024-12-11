<?php

namespace App\Models;

use CodeIgniter\Model;

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
        'dia_semana' => 'required|regex_match[/^[0123456]$/]', //o regex verifica se está entre 0 a 6
        'hora_inicio' => 'required|regex_match[/^(?:[01][0-9]|2[0-3])$/]', //aceita de 00 a 23
        'minuto_inicio' => 'required|regex_match[/^(?:[0-5][0-9])$/]', //aceita entre 00 a 59
        'hora_fim' => 'required|regex_match[/^(?:[01][0-9]|2[0-3])$/]', //aceita de 00 a 23
        'minuto_fim' => 'required|regex_match[/^(?:[0-5][0-9])$/]', //aceita entre 00 a 59
    ];
    protected $validationMessages   = [
        "horario_id" => [
            "required" => "O campo hórario é obrigatório",
            "is_not_unique" => "O hórario deve estar cadastrado",
            "max_length" => "O tamanho máximo é 11 dígitos",
        ],
        'dia_semana' => [
            'required'    => 'O campo dia da semana é obrigatório.',
            'regex_match' => 'O campo dia da semana deve ser um número entre 0 e 6.'
        ],
        'hora_inicio' => [
            'required'    => 'O campo hora de início é obrigatório.',
            'regex_match' => 'O campo hora de início deve estar entre 00 e 23.'
        ],
        'minuto_inicio' => [
            'required'    => 'O campo minuto de início é obrigatório.',
            'regex_match' => 'O campo minuto de início deve estar entre 00 e 59.'
        ],
        'hora_fim' => [
            'required'    => 'O campo hora de término é obrigatório.',
            'regex_match' => 'O campo hora de término deve estar entre 00 e 23.'
        ],
        'minuto_fim' => [
            'required'    => 'O campo minuto de término é obrigatório.',
            'regex_match' => 'O campo minuto de término deve estar entre 00 e 59.'
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

    public function getTemposAulaWithHorario() {
        return $this->select('tempos_de_aula.*, horario.nome as nome_horario')
                    ->join('horarios as horario', 'horario.id = tempos_de_aula.horario_id') // Relacionamento com a tabela users
                    ->findAll(); // Retorna todos os registros
    }
}
