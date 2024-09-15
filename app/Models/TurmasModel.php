<?php

namespace App\Models;

use CodeIgniter\Model;

class TurmasModel extends Model
{
    protected $table            = 'turmas';
    protected $primaryKey       = 'turma_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['turma_id', 'codigo', 'sigla', 'ano', 'semestre', 'curso', 'tempos_diarios', 'tabela_de_horarios', 'tabela_de_horarios_preferenciais'];

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
        'turma_id' => 'is_natural_no_zero|max_length[11]',
        'codigo' => 'required|max_length[32]',
        'sigla' => 'required|max_length[32]',
        'ano' => 'required|regex_match[/^(20)\d{2}$/]', //regex valida se o ano começa com 20 e aceita qualquer outros 2 dígitos no fim | 2000 até 2099. issue RF05.
        'semestre' => 'required|regex_match[/^[12]$/]', //verifica se 1 ou 2.
        'curso' => 'required|max_length[11]|is_not_unique[cursos.curso_id]',
        'tempos_diarios' => 'permit_empty|is_natural, max_length[2]',
        // 'tabela_de_horarios' => '',
        // 'tabela_de_horarios_preferenciais' => '',
    ];
    protected $validationMessages   = [];
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
}
