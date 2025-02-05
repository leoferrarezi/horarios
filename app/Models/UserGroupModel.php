<?php

namespace App\Models;

use CodeIgniter\Model;

class UserGroupModel extends Model
{
    protected $table = 'users'; // Nome da tabela
    protected $primaryKey = 'id'; // Chave primária
    protected $allowedFields = ['username', 'status', 'status_message', 'active', 'last_active', 'created_at', 'updated_at', 'deleted_at']; // Campos permitidos

    /**
     * Retorna todos os usuários.
     *
     * @return array Lista de usuários.
     */
    public function findAllUsers()
    {
        return $this->findAll();
    }

    /**
     * Retorna um usuário pelo ID.
     *
     * @param int $userId ID do usuário.
     * @return array|null Dados do usuário ou null se não encontrado.
     */
    public function findUserById($userId)
    {
        return $this->find($userId);
    }

    /**
     * Retorna os usuários que pertencem a um grupo específico.
     *
     * @param string $group Nome do grupo.
     * @return array Lista de usuários no grupo.
     */
    public function findUsersByGroup($group)
    {
        $groupModel = new GroupModel();
        return $groupModel->where('group', $group)->findAll();
    }
}
