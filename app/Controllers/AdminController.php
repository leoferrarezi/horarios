<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Shield\Entities\User;
use App\Models\GroupModel;
use App\Models\UserGroupModel;

class AdminController extends Controller
{
    protected $helpers = ['form'];
    protected $groupModel;
    protected $userGroupModel;

    public function __construct()
    {
        // Carrega os modelos necessários
        $this->groupModel = new GroupModel();
        $this->userGroupModel = new UserGroupModel();
    }

    /**
     * Exibe a página inicial da administração.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse|string
     */
    public function index()
    {
        // Verifica se o usuário é um admin
        /* if (!auth()->user()->inGroup('admin')) {
            return redirect()->to('/')->with('error', 'Acesso negado.');
        } */

        // Busca todos os usuários e grupos
        $data['users'] = auth()->getProvider()->findAll();
        $data['groups'] = $this->groupModel->findAll();

        // Carrega a view da página inicial da admin
        $data['content'] = view('sys/gerenciar-usuarios', $data);
        return view('dashboard', $data);
    }

    /**
     * Exibe a página para alterar a senha.
     *
     * @return string
     */
    public function changePassword()
    {
        return view('sys/alterar-senha');
    }

    /**
     * Processa a atualização da senha.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function updatePassword()
    {
        $validation = service('validation');

        // Regras de validação
        $validation->setRules([
            'current_password' => 'required',
            'new_password'     => 'required|min_length[8]',
            'confirm_password' => 'required|matches[new_password]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            log_message('error', 'Validação falhou ao tentar alterar a senha: ' . json_encode($validation->getErrors()));
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $currentPassword = $this->request->getPost('current_password');
        $newPassword     = $this->request->getPost('new_password');

        // Obtém o usuário autenticado
        $user = auth()->user();

        if (!$user) {
            log_message('error', 'Usuário autenticado não encontrado.');
            return redirect()->back()->with('error', 'Erro ao processar a solicitação. Usuário não encontrado.');
        }

        // Busca o e-mail (secret) e a senha (secret2) do usuário em auth_identities
        $db = db_connect();
        $query = $db->table('auth_identities')
            ->select('secret, secret2')
            ->where('user_id', $user->id)
            ->get()
            ->getRow();

        if (!$query || !$query->secret2 || !$query->secret) {
            log_message('error', 'Credenciais não encontradas para o e-mail: ' . ($query->secret ?? 'Desconhecido'));
            return redirect()->back()->with('error', 'Erro ao processar a solicitação. Credenciais não encontradas.');
        }

        $email = $query->secret; // E-mail do usuário
        $hashedPassword = $query->secret2; // Senha armazenada

        // Verifica se a senha atual está correta
        if (!password_verify($currentPassword, $hashedPassword)) {
            log_message('error', 'Senha incorreta para o e-mail: ' . $email);
            return redirect()->back()->withInput()->with('error', 'A senha atual está incorreta.');
        }

        // Atualiza a senha
        $user->setPassword($newPassword);

        // Atualiza a nova senha na tabela auth_identities
        $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $db->table('auth_identities')
            ->where('user_id', $user->id)
            ->update(['secret2' => $newHashedPassword]);

        log_message('info', 'Senha alterada com sucesso para o e-mail: ' . $email);

        return redirect()->to('/sys/home')->with('success', 'Senha alterada com sucesso.');
    }

    /**
     * Exibe a página de gerenciamento de usuários.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse|string
     */
    public function manageUsers()
    {
        // Verifica se o usuário é um admin
        /* if (!auth()->user()->inGroup('admin')) {
        return redirect()->to('/')->with('error', 'Acesso negado.');
    } */

        // Busca todos os usuários e grupos
        $usersArray = auth()->getProvider()->findAll(); // Retorna um array de arrays
        $data['users'] = array_map(function ($userData) {
            return new \CodeIgniter\Shield\Entities\User($userData); // Converte cada array em um objeto User
        }, $usersArray);

        $data['groups'] = $this->groupModel->findAll(); // Retorna uma coleção de objetos Group

        return view('admin/manage_users', $data);
    }

    /**
     * Atribui um grupo a um usuário.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function assignGroup()
    {
        // Verifica se o usuário é um admin
        if (!auth()->user()->inGroup('admin')) {
            return redirect()->to('/')->with('error', 'Acesso negado.');
        }

        $userId = $this->request->getPost('user_id');
        $groupId = $this->request->getPost('group_id');

        // Verifica se o usuário já está no grupo
        $existing = $this->userGroupModel->where('user_id', $userId)->where('group_id', $groupId)->first();
        if ($existing) {
            return redirect()->back()->with('error', 'O usuário já está neste grupo.');
        }

        // Atribui o grupo ao usuário
        $this->userGroupModel->insert([
            'user_id' => $userId,
            'group_id' => $groupId
        ]);

        return redirect()->back()->with('success', 'Grupo atribuído com sucesso.');
    }

    /**
     * Remove um grupo de um usuário.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function removeGroup()
    {
        // Verifica se o usuário é um admin
        if (!auth()->user()->inGroup('admin')) {
            return redirect()->to('/')->with('error', 'Acesso negado.');
        }

        $userId = $this->request->getPost('user_id');
        $groupId = $this->request->getPost('group_id');

        // Remove o grupo do usuário
        $this->userGroupModel->where('user_id', $userId)->where('group_id', $groupId)->delete();

        return redirect()->back()->with('success', 'Grupo removido com sucesso.');
    }
}
