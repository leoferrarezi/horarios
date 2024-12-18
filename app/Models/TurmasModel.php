<?php

namespace App\Models;

use CodeIgniter\Model;

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
        'codigo' => 'required|is_unique[turmas.codigo,id,{id}]|max_length[32]',
        'sigla' => 'required|max_length[32]',
        'ano' => 'required|regex_match[/^(20)\d{2}$/]', //regex valida se o ano começa com 20 e aceita qualquer outros 2 dígitos no fim | 2000 até 2099. issue RF05.
        'semestre' => 'required|regex_match[/^[12]$/]', //verifica se 1 ou 2.
        'periodo' => 'required',
        'curso_id' => 'required|max_length[11]|is_not_unique[cursos.id]',
        'tempos_diarios' => 'permit_empty|is_natural|max_length[2]',
        'horario_id' => 'permit_empty|is_not_unique[horarios.id]|max_length[11]',
        'horario_preferencial_id' => 'permit_empty|is_not_unique[horarios.id]|max_length[11]'
    ];
    protected $validationMessages   = [
        'codigo' => [
            'required'    => 'O campo código é obrigatório.',
            'max_length'  => 'O campo código não pode exceder 32 caracteres.'
        ],
        'sigla' => [
            'required'    => 'O campo sigla é obrigatório.',
            'max_length'  => 'O campo sigla não pode exceder 32 caracteres.'
        ],
        'ano' => [
            'required'    => 'O campo ano é obrigatório.',
            'regex_match' => 'O campo ano deve ser um valor válido, começando com "20" e seguido por dois dígitos (ex: 2000 a 2099).'
        ],
        'semestre' => [
            'required'    => 'O campo semestre é obrigatório.',
            'regex_match' => 'O campo semestre deve ser "1" ou "2".'
        ],
        'periodo' => [
            'required'    => 'O campo semestre é obrigatório.'
        ],
        'curso_id' => [
            'required'       => 'O campo curso é obrigatório.',
            'max_length'     => 'O campo curso não pode exceder 11 caracteres.',
            'is_not_unique'  => 'O curso informado não existe no banco de dados.'
        ],
        'tempos_diarios' => [
            'permit_empty' => 'O campo tempos diários é opcional.',
            'is_natural'   => 'O campo tempos diários deve conter um número natural.',
            'max_length'   => 'O campo tempos diários não pode exceder 2 caracteres.'
        ],
        'horario_id' => [
            'permit_empty'  => 'O campo horário é opcional.',
            'is_not_unique' => 'O horário informado não existe no banco de dados.',
            'max_length'    => 'O campo horário não pode exceder 11 caracteres.'
        ],
        'horario_preferencial_id' => [
            'permit_empty'  => 'O campo horário preferencial é opcional.',
            'is_not_unique' => 'O horário preferencial informado não existe no banco de dados.',
            'max_length'    => 'O campo horário preferencial não pode exceder 11 caracteres.'
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
            ->join('horarios as horario', 'horario.id = turmas.horario_id')
            ->join('horarios as hp', 'hp.id = turmas.horario_preferencial_id')
            ->join('cursos as curso', 'curso.id = turmas.curso_id')
            ->findAll();
    }
}
