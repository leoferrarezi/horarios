<?php

namespace App\Controllers;

use App\Models\UserGroupModel;
use App\Models\AuthIdentityModel;
use CodeIgniter\Controller;
use CodeIgniter\Shield\Models\UserModel;
use CodeIgniter\Shield\Entities\User;

class AdminController extends Controller
{
    protected $userGroupModel;
    protected $userModel;
    protected $authIdentityModel;

    public function __construct()
    {
        $this->userGroupModel = new UserGroupModel();
        $this->userModel = new UserModel();
        $this->authIdentityModel = new AuthIdentityModel();
    }

    // Método para registrar um novo usuário
    public function registrarUsuario()
    {
        // Receber os dados do formulário
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ];

        // Criar entidade do usuário
        $user = new User($data);

        // Salvar o usuário
        if (!$this->userModel->save($user)) {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }

        // Obter o ID do usuário recém-criado
        $userId = $this->userModel->getInsertID();

        // Recuperar o registro do usuário para obter o created_at
        $userData = $this->userModel->find($userId);
        $createdAt = $userData->created_at; // Valor de created_at da tabela users

        // Obter o grupo selecionado, assumindo que o nome do grupo vem do formulário
        $grupo = $this->request->getPost('grupo'); // 'admin' ou 'user'

        if ($grupo) {
            // Atribuir o grupo ao usuário, passando o created_at
            if (!$this->userGroupModel->addUserToGroup($userId, $grupo, $createdAt)) {
                log_message('error', "Erro ao vincular o usuário $userId ao grupo $grupo.");
            } else {
                log_message('info', "Usuário $userId vinculado ao grupo $grupo com sucesso.");
            }
        } else {
            log_message(
                'info',
                'Grupo não reconhecido'
            );
        }

        return redirect()->to('/sys/admin')->with('success', 'Usuário cadastrado com sucesso!');
    }

    // Método index - carrega o dashboard com os usuários
    public function index()
    {
        $usuarios = $this->gerenciarUsuarios();
        $data['usuarios'] = $usuarios;
        $data['content'] = view('sys/gerenciar-usuarios', $data);

        return view('dashboard', $data);
    }

    // Método para buscar usuários e seus grupos
    public function gerenciarUsuarios()
    {
        // Buscar os usuários com os campos id e username
        $usuarios = $this->userModel->select('id, username')->findAll();

        foreach ($usuarios as &$usuario) {
            // Buscar o email do usuário
            $emailData = $this->authIdentityModel->where('user_id', $usuario->id)->first();
            $usuario->email = $emailData ? $emailData['secret'] : 'Email não encontrado';

            // Buscar os grupos do usuário
            $grupos = $this->userGroupModel->where('user_id', $usuario->id)->findAll();

            // Armazenar os grupos em um campo 'grupos' no objeto do usuário
            $usuario->grupos = array_map(function ($grupo) {
                return $grupo['group']; // Aqui estamos pegando o nome do grupo
            }, $grupos);
        }

        return $usuarios;
    }

    // Método para adicionar um usuário a um grupo
    public function adicionarUsuarioGrupo()
    {
        $userId = $this->request->getPost('user_id');
        $grupo = $this->request->getPost('grupo');

        if ($userId && $grupo) {
            $result = $this->userGroupModel->addUserToGroup($userId, $grupo);
            if (!$result) {
                log_message('error', 'Falha ao adicionar usuário ao grupo: ' . $userId . ' - ' . $grupo);
            } else {
                log_message('info', 'Usuário adicionado ao grupo com sucesso: ' . $userId . ' - ' . $grupo);
            }
        }

        return redirect()->to('/sys/admin/');
    }

    // Método para remover um usuário de um grupo
    public function removerUsuarioGrupo()
    {
        $userId = $this->request->getPost('user_id');
        $grupo = $this->request->getPost('grupo');

        if ($userId && $grupo) {
            $result = $this->userGroupModel->removeUserFromGroup($userId, $grupo);
            if (!$result) {
                log_message('error', 'Falha ao remover usuário do grupo: ' . $userId . ' - ' . $grupo);
            } else {
                log_message('info', 'Usuário removido do grupo com sucesso: ' . $userId . ' - ' . $grupo);
            }
        }

        return redirect()->to('/sys/admin/');
    }

    // Método para excluir um usuário
    public function excluirUsuario()
    {
        $userId = $this->request->getPost('user_id');

        if ($userId && $this->userModel->find($userId)) {
            $this->userModel->delete($userId);
            log_message('info', 'Usuário excluído com sucesso: ' . $userId);
            return redirect()->to('/sys/admin/')->with('message', 'Usuário excluído com sucesso!');
        }

        log_message('error', 'Usuário não encontrado ou ID inválido: ' . $userId);
        return redirect()->to('/sys/admin/')->with('error', 'Usuário não encontrado ou ID inválido.');
    }
}
