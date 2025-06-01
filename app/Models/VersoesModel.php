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
        // Obtem o ID da versão mais recente
        $builder = $this->db->table('versoes');
        $builder->select('id');
        $builder->orderBy('id', 'DESC');
        $versaoNew = $builder->get()->getRowArray()['id'];
        
        // Selecionar todas as aulas da versão antiga
        $builder = $this->db->table('aulas')
            ->select('id, disciplina_id, turma_id')
            ->where('versao_id', $versaoOld);
        
        $aulas = $builder->get()->getResultArray();

        // Inserir as aulas na nova versão
        if (!empty($aulas))
        {
            foreach ($aulas as $aula)
            {
                //Inserir a aula na nova versão
                $insert = [
                    'disciplina_id' => $aula['disciplina_id'],
                    'turma_id' => $aula['turma_id'],
                    'versao_id' => $versaoNew
                ];
                $builder = $this->db->table('aulas');
                $builder->insert($insert);

                $id_aula_antiga = $aula['id'];
                $id_nova_aula = $this->db->insertID();

                // Selecionar os horários da aula antiga
                $builder = $this->db->table('aula_professor')
                    ->select('professor_id')
                    ->where('aula_id', $id_aula_antiga);

                $professores = $builder->get()->getResultArray();

                // Inserir os professores na nova aula
                if (!empty($professores))
                {
                    foreach ($professores as $professor) 
                    {
                        $insert = [
                            'aula_id' => $id_nova_aula,
                            'professor_id' => $professor['professor_id']
                        ];
                        $builder = $this->db->table('aula_professor');
                        $builder->insert($insert);
                    }
                }

                // Selecionar os horários da aula antiga
                $builder = $this->db->table('aula_horario')
                    ->select('id, tempo_de_aula_id, fixa')
                    ->where('aula_id', $id_aula_antiga);
                
                $horarios = $builder->get()->getResultArray();

                // Inserir os horários na nova aula
                if (!empty($horarios))
                {
                    foreach ($horarios as $horario)
                    {
                        $insert = [
                            'aula_id' => $id_nova_aula,
                            'tempo_de_aula_id' => $horario['tempo_de_aula_id'],
                            'versao_id' => $versaoNew,
                            'fixa' => $horario['fixa']
                        ];
                        $builder = $this->db->table('aula_horario');
                        $builder->insert($insert);

                        $id_novo_horario = $this->db->insertID();

                        // Selecionar os ambientes do horário antigo
                        $builder = $this->db->table('aula_horario_ambiente')
                            ->select('ambiente_id')
                            ->where('aula_horario_id', $horario['id']);

                        $ambientes = $builder->get()->getResultArray();

                        // Inserir os ambientes na nova aula
                        if (!empty($ambientes))
                        {
                            foreach ($ambientes as $ambiente) 
                            {
                                $insert = [
                                    'aula_horario_id' => $id_novo_horario,
                                    'ambiente_id' => $ambiente['ambiente_id']
                                ];
                                $builder = $this->db->table('aula_horario_ambiente');
                                $builder->insert($insert);
                            }
                        }
                    }
                }
            }
        }
    }

    public function getRestricoes($id) 
    {
        $id = $id['id'];

        $aulas = $this->db->table('aulas')->where('versao_id', $id)->get()->getNumRows();
        $aulaHorarios = $this->db->table('aula_horario')->where('versao_id', $id)->get()->getNumRows();

        $restricoes = [
            'aulas' => $aulas, 
            'horarios' => $aulaHorarios
        ];

        return $restricoes;
    }
}
