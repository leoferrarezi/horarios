<?php

namespace App\Models;

use CodeIgniter\Model;

class UserGroupModel extends Model
{
    protected $table = 'auth_groups_users'; // Tabela do Shield
    protected $allowedFields = ['user_id', 'group', 'created_at']; // Campos permitidos
    protected $useTimestamps = true; // Gerenciamento automático de timestamps

    /**
     * Retorna todos os grupos de um usuário.
     */
    public function getUserGroups($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }

    /**
     * Adiciona um usuário a um grupo.
     */
    public function addUserToGroup($userId, $group)
    {
        $data = [
            'user_id' => $userId,
            'group' => $group
        ];

        return $this->save($data);
    }

    /**
     * Remove um usuário de um grupo.
     */
    public function removeUserFromGroup($userId, $group)
    {
        if ($this->isUserInGroup($userId, $group)) {
            return $this->where('user_id', $userId)->where('group', $group)->delete();
        }
        return false;
    }

    /**
     * Verifica se um usuário pertence a um grupo.
     */
    public function isUserInGroup($userId, $group)
    {
        return $this->where('user_id', $userId)->where('group', $group)->countAllResults() > 0;
    }
}
