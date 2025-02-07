<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupModel extends Model
{
    protected $table = 'auth_groups_users';  // O nome da tabela que contém os grupos
    protected $primaryKey = 'id'; // Supondo que a chave primária seja 'id'
    protected $allowedFields = ['user_id'];  // Ou outros campos que a tabela 'groups' tenha

    // Método para buscar um grupo pelo nome
    public function getGroupByName($groupName)
    {
        return $this->where('group', $groupName)->first();
    }
}
