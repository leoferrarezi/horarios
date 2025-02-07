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
     * Adiciona um usuário a um grupo (sem necessidade de verificação prévia).
     */
    public function addUserToGroup($userId, $group, $createdAt = null)
    {
        if (empty($userId) || empty($group)) {
            log_message('error', 'ID do usuário ou grupo inválido.');
            return false;
        }

        // Prepare os dados para inserção
        $data = [
            'user_id' => $userId,
            'group' => $group,
            'created_at' => $createdAt ?? date('Y-m-d H:i:s'),
        ];

        // Tente inserir o novo grupo
        try {
            $this->insert($data);
            log_message('info', "Usuário $userId adicionado ao grupo $group com sucesso.");
            return true;
        } catch (\Exception $e) {
            log_message('error', "Erro ao adicionar usuário ao grupo: " . $e->getMessage());
            return false;
        }
    }
}
