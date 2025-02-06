<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthIdentityModel extends Model
{
    protected $table      = 'auth_identities';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'secret']; // Defina os campos permitidos para o modelo
    protected $useTimestamps = true;

    // Método para buscar o email
    public function getEmailByUserId($userId)
    {
        return $this->where('user_id', $userId)->first(); // Retorna o primeiro registro encontrado
    }
}
