<?php

namespace App\Models;

use CodeIgniter\Model;

class UserGroupModel extends Model
{
    protected $table = 'auth_groups_users'; // Tabela do Shield
    protected $allowedFields = ['user_id', 'group', 'created_at']; // Campos permitidos
    protected $useTimestamps = false; // Gerenciamento automático de timestamps

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
    public function addUserToGroup($userId, $group, $createdAt = null)
    {
        // Verifique se o usuário e o grupo são válidos
        if (empty($userId) || empty($group)) {
            log_message('error', 'ID do usuário ou grupo inválido.');
            return false;
        }

        // Verifique se o usuário já está no grupo
        if ($this->isUserInGroup($userId, $group)) {
            log_message('info', 'Usuário já está no grupo: ' . $group);
            return false;
        }

        // Prepare os dados para inserção
        $data = [
            'user_id' => $userId,
            'group' => $group,
            'created_at' => $createdAt ?? date('Y-m-d H:i:s'), // Usar o created_at fornecido ou o atual
        ];

        // Tente inserir o registro
        try {
            $result = $this->insert($data);
            if ($result) {
                log_message('info', 'Usuário adicionado ao grupo com sucesso: ' . $userId . ' - ' . $group);
                return true;
            } else {
                log_message('error', 'Falha ao adicionar usuário ao grupo: ' . $userId . ' - ' . $group);
                return false;
            }
        } catch (\Exception $e) {
            log_message('error', 'Erro ao adicionar usuário ao grupo: ' . $e->getMessage());
            return false;
        }
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
