<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupModel extends Model
{
    protected $table = 'groups';  // O nome da tabela que contém os grupos
    protected $primaryKey = 'id'; // Supondo que a chave primária seja 'id'
    protected $allowedFields = ['name'];  // Ou outros campos que a tabela 'groups' tenha

    // Método para buscar um grupo pelo nome
    public function getGroupByName($groupName)
    {
        return $this->where('name', $groupName)->first();
    }
}
