<?php

namespace App\Models;

use CodeIgniter\Model;

class TemposAulasModel extends Model
{
    protected $table            = 'tempos_de_aula';
    protected $primaryKey       = 'tempo_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tempo_id','time_inicio', 'time_fim'];

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
        'tempo_id' => 'is_natural_no_zero|max_length[11]',
        'time_inicio' => 'required|regex_match[/^([01]\d|2[0-3]):[0-5]\d$/]', //valida de acordo com o hórario 24 horas 00:00 até 23:59
        'time_fim' => 'required|regex_match[/^([01]\d|2[0-3]):[0-5]\d$/]', //mesma validação de cima :D.
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
