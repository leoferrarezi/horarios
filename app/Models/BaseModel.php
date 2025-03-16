<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Shield\Authentication\Authenticators\SessionAuthenticator;
use CodeIgniter\Shield\Entities\User;

class BaseModel extends Model
{
    protected $logModel;

    public function __construct()
    {
        parent::__construct();
        $this->logModel = new LogsModel();
    }

    protected function registrarLog($acao, $detalhes, $registroId = null)
    {
        // $auth = service('authentication');
        $user = auth()->user(); 

        $usuario = $user ? "ID: {$user->id} NOME: {$user->username}" : 'Sistema'; 
        
        $this->logModel->insert([
            'usuario'       => $usuario,
            'acao'          => $acao,
            'detalhes'      => $detalhes,
            'tabela_afetada'=> $this->table,
            'registro_id'   => $registroId,
        ]);
    }
}
