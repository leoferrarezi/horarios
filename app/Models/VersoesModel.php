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
    protected $beforeDelete   = ['getRestricoes'];
    protected $afterDelete    = [];

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

        //$builder = $this->db->table('aula_horario');
        //$query = "SELECT aula_id, tempo_de_aula_id, $versaoNew, ambiente_id FROM aula_horario WHERE versao_id = $versaoOld";
        //$builder->ignore(true)->setQueryAsData(new RawSql($query), null, "aula_id, tempo_de_aula_id, versao_id, ambiente_id")->insertBatch();
    }

    public function getRestricoes($id) 
    {
        $db = \Config\Database::connect();
        $id = $id['id'];

        $aulas = $db->table('aulas')->where('versao_id', $id)->get()->getNumRows();
        $aulaHorarios = $db->table('aula_horario')->where('versao_id', $id)->get()->getNumRows();

        $restricoes = [
            'aulas' => $aulas, 
            'horarios' => $aulaHorarios
        ];

        return $restricoes;
    }
}
