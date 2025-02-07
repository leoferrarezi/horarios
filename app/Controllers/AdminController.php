<?php

namespace App\Controllers;

use App\Models\UserGroupModel;
use CodeIgniter\Controller;
use CodeIgniter\Shield\Models\UserModel;  // Importando o modelo de usuário
use App\Models\GroupModel;
use CodeIgniter\Shield\Entities\User;

class AdminController extends Controller
{
    protected $groupModel;
    protected $userGroupModel;
    protected $userModel;  // Declarando a variável para o UserModel

    public function __construct()
    {
        $this->groupModel = new GroupModel();  // Carregando o modelo de grupos
        $this->userGroupModel = new UserGroupModel();  // Carregando o modelo de associação de usuários a grupos
        $this->userModel = new UserModel();  // Carregando o modelo de usuários do CodeIgniter Shield
    }

    // Método para registrar um novo usuário
    public function registrarUsuario()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ];

        $user = new User($data);

        if (!$this->userModel->save($user)) {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }

        $userId = $this->userModel->getInsertID();
        $userData = $this->userModel->find($userId);
        $createdAt = $userData->created_at;

        $grupo = $this->request->getPost('grupo');

        if ($grupo) {
            if (!$this->userGroupModel->addUserToGroup($userId, $grupo, $createdAt)) {
                log_message('error', "Erro ao vincular o usuário $userId ao grupo $grupo.");
            } else {
                log_message('info', "Usuário $userId vinculado ao grupo $grupo com sucesso.");
            }
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
        $usuarios = $this->userModel->select('id, username')->findAll();

        foreach ($usuarios as &$usuario) {
            $grupos = $this->userGroupModel->where('user_id', $usuario->id)->findAll();
            $usuario->grupos = array_map(function ($grupo) {
                return $grupo['group'];
            }, $grupos);
        }

        return $usuarios;
    }

    // Método para alterar o grupo de um usuário
    public function alterarGrupoUsuario()
    {
        $userId = $this->request->getPost('user_id');
        $novoGrupo = $this->request->getPost('novo_grupo');

        log_message('error', "Usuário ID: " . $userId . " Novo Grupo: " . $novoGrupo);

        if (!$userId || !$novoGrupo) {
            return redirect()->to('/sys/admin/')->with('error', 'Usuário ou grupo inválido.');
        }

        // Busca o grupo pelo nome
        $grupo = $this->groupModel->getGroupByName($novoGrupo);

        if (!$grupo) {
            log_message('error', "Grupo '$novoGrupo' não encontrado no banco de dados.");
            return redirect()->to('/sys/admin/')->with('error', 'Grupo não encontrado.');
        }

        // Verifica se o usuário já pertence ao grupo
        $userGroup = $this->userGroupModel->where('user_id', $userId)->where('group_id', $grupo['id'])->first();

        if ($userGroup) {
            // Se o usuário já pertence ao grupo, não faz nada
            log_message('info', "Usuário $userId já pertence ao grupo '$novoGrupo'. Nenhuma alteração necessária.");
            return redirect()->to('/sys/admin/')->with('info', 'Usuário já pertence ao grupo.');
        }

        // Se o usuário não pertence ao grupo, adiciona
        $result = $this->userGroupModel->addUserToGroup($userId, $grupo['id']);

        if (!$result) {
            log_message('error', "Falha ao alterar grupo do usuário: $userId para $novoGrupo");
            return redirect()->to('/sys/admin/')->with('error', 'Erro ao atualizar grupo do usuário.');
        }

        log_message('info', "Grupo do usuário $userId alterado para $novoGrupo com sucesso.");
        return redirect()->to('/sys/admin/')->with('success', 'Grupo do usuário alterado com sucesso!');
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
