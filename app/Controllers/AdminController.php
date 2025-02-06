<?php

namespace App\Controllers;

use App\Models\UserGroupModel;
use App\Models\AuthIdentityModel;
use CodeIgniter\Controller;
use CodeIgniter\Shield\Models\UserModel;

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

    // Método index - carrega o container (dashboard) com os usuários
    public function index()
    {
        // Chama o método gerenciarUsuarios para obter os dados dos usuários
        $usuarios = $this->gerenciarUsuarios();

        // Passa os dados de usuários para a view do dashboard
        $data['usuarios'] = $usuarios;
        $data['content'] = view('sys/gerenciar-usuarios', $data); // Caminho correto para a view

        return view('dashboard', $data);
    }

    // Método que busca os usuários e seus grupos
    public function gerenciarUsuarios()
    {
        // Verifique se está fazendo a consulta correta no modelo UserModel
        $usuarios = $this->userModel->select('id, username')->findAll(); // Não selecione o 'email' aqui, pois ele está em auth_identities

        // Agora vamos buscar o 'email' da tabela auth_identities (supondo que o email esteja lá)
        foreach ($usuarios as &$usuario) {
            // Busque o email da tabela auth_identities, onde 'user_id' é o mesmo que 'id' do usuário
            $emailData = $this->authIdentityModel->where('user_id', $usuario->id)->first(); // Acessa id como propriedade de objeto

            // Verifique se encontrou o email
            if ($emailData) {
                $usuario->email = $emailData['secret']; // Atribui o 'secret' (email) ao usuário
            } else {
                $usuario->email = 'Email não encontrado'; // Se não encontrar, atribui uma mensagem padrão
            }
        }

        // Se a consulta não trouxe nenhum usuário, exibir uma mensagem de depuração
        if (empty($usuarios)) {
            die("Nenhum usuário encontrado!");
        }

        return $usuarios;  // Apenas retorna os dados dos usuários
    }

    // Método para adicionar um usuário a um grupo
    public function adicionarUsuarioGrupo()
    {
        $userId = $this->request->getPost('user_id');
        $grupo = $this->request->getPost('grupo');

        if ($userId && $grupo) {
            if (!$this->userGroupModel->isUserInGroup($userId, $grupo)) {
                $this->userGroupModel->addUserToGroup($userId, $grupo);
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
            $this->userGroupModel->removeUserFromGroup($userId, $grupo);
        }

        return redirect()->to('/sys/admin/');
    }

    // Método para excluir um usuário
    public function excluirUsuario()
    {
        $userId = $this->request->getPost('user_id');

        if ($userId) {
            // Usando o método delete() do UserModel para excluir o usuário
            $user = $this->userModel->find($userId);

            if ($user) {
                $this->userModel->delete($userId);
                return redirect()->to('/sys/admin/')->with('message', 'Usuário excluído com sucesso!');
            } else {
                return redirect()->to('/sys/admin/')->with('error', 'Usuário não encontrado.');
            }
        }

        return redirect()->to('/sys/admin/')->with('error', 'ID do usuário não fornecido.');
    }
}
