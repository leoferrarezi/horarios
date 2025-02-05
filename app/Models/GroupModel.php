<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupModel extends Model
{
    protected $table = 'auth_groups_users'; // Nome da tabela
    protected $primaryKey = 'id'; // Chave primária
    protected $allowedFields = ['user_id', 'group', 'created_at']; // Campos permitidos

    /**
     * Retorna todos os grupos de um usuário.
     *
     * @param int $userId ID do usuário.
     * @return array Lista de grupos do usuário.
     */
    public function getUserGroups($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }

    /**
     * Adiciona um usuário a um grupo.
     *
     * @param int $userId ID do usuário.
     * @param string $group Nome do grupo.
     * @return bool|int ID do registro inserido ou false em caso de erro.
     */
    public function addUserToGroup($userId, $group)
    {
        $data = [
            'user_id' => $userId,
            'group' => $group,
            'created_at' => date('Y-m-d H:i:s') // Data atual
        ];

        return $this->insert($data);
    }

    /**
     * Remove um usuário de um grupo.
     *
     * @param int $userId ID do usuário.
     * @param string $group Nome do grupo.
     * @return bool True se a remoção foi bem-sucedida, false caso contrário.
     */
    public function removeUserFromGroup($userId, $group)
    {
        return $this->where('user_id', $userId)->where('group', $group)->delete();
    }

    /**
     * Verifica se um usuário pertence a um grupo.
     *
     * @param int $userId ID do usuário.
     * @param string $group Nome do grupo.
     * @return bool True se o usuário pertence ao grupo, false caso contrário.
     */
    public function isUserInGroup($userId, $group)
    {
        return $this->where('user_id', $userId)->where('group', $group)->countAllResults() > 0;
    }
}
