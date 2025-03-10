<?php

namespace App\Controllers;

use App\Models\UserGroupModel;
use CodeIgniter\Controller;
use CodeIgniter\Shield\Models\UserModel;  // Importando o modelo de usuário
use App\Models\GroupModel;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Authentication\Passwords;
use CodeIgniter\Email\Email;
use Config\Services;

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

        // Verifica se já existe um usuário com o mesmo username
        $existingUsername = $this->userModel->where('username', $data['username'])->first();

        // Verifica se já existe um usuário com o mesmo e-mail (na tabela identities)
        $existingEmail = $this->userModel->db->table('auth_identities')
            ->where('type', 'email_password') // Tipo de identidade (e-mail)
            ->where('secret', $data['email']) // O e-mail está armazenado na coluna `secret`
            ->get()
            ->getRow();

        $errorMessage = '';

        if (
            $existingUsername && $existingEmail
        ) {
            $errorMessage = 'Já existe um usuário com este username e e-mail.';
        } elseif ($existingUsername) {
            $errorMessage = 'Já existe um usuário com este username.';
        } elseif ($existingEmail) {
            $errorMessage = 'Já existe um usuário com este e-mail.';
        }

        if ($errorMessage) {
            return redirect()->back()->withInput()->with('error', $errorMessage);
        }

        // Cria o usuário
        $user = new User($data);

        if (!$this->userModel->save($user)) {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }

        // Obtém o ID do usuário recém-criado
        $userId = $this->userModel->getInsertID();

        // Adiciona o usuário a um grupo (se fornecido)
        $grupo = $this->request->getPost('grupo');

        if ($grupo) {
            if (!$this->userGroupModel->addUserToGroup($userId, $grupo)) {
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
        $data['content'] = view('sys/usuarios', $data);

        return view('dashboard', $data);
    }

    // Método usuariosInativos - carrega o dashboard com os usuários inativos
    public function usuariosInativos()
    {
        // Use o UserModel do Shield
        $userModel = new \CodeIgniter\Shield\Models\UserModel();

        // Filtra usuários desativados (com deleted_at preenchido)
        $data['usuariosDesativados'] = $userModel->onlyDeleted()->findAll();

        // Carrega a view de usuários inativos dentro do layout do dashboard
        $data['content'] = view('sys/usuariosInativos', $data);

        // Retorna a view do dashboard com o conteúdo
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

        log_message('info', "Tentando alterar grupo do usuário ID: $userId para $novoGrupo");

        if (!$userId || !$novoGrupo) {
            return redirect()->to('/sys/admin/')->with('error', 'Usuário ou grupo inválido.');
        }

        // Verifica se o usuário já pertence ao grupo
        $userGroup = $this->userGroupModel->where('user_id', $userId)->where('group', $novoGrupo)->first();

        // Se o usuário já pertence ao grupo, nada precisa ser feito
        if ($userGroup) {
            log_message('info', "Usuário $userId já pertence ao grupo '$novoGrupo'. Nenhuma alteração necessária.");
            return redirect()->to('/sys/admin/')->with('info', 'Usuário já pertence ao grupo.');
        }

        // Se o usuário pertence a um grupo que não está mais no banco, não gera erro, só substitui
        $userCurrentGroup = $this->userGroupModel->where('user_id', $userId)->first();

        if ($userCurrentGroup && !$this->groupModel->getGroupByName($userCurrentGroup['group'])) {
            log_message('info', "Usuário $userId pertence a um grupo não registrado no banco. Substituindo o grupo.");
        }

        // Remove o usuário de todos os grupos antes de adicionar ao novo grupo
        $this->userGroupModel->where('user_id', $userId)->delete();

        // Adiciona o usuário ao novo grupo
        $result = $this->userGroupModel->addUserToGroup($userId, $novoGrupo);

        if (!$result) {
            log_message('error', "Falha ao alterar grupo do usuário: $userId para $novoGrupo");
            return redirect()->to('/sys/admin/')->with('error', 'Erro ao atualizar grupo do usuário.');
        }

        log_message('info', "Grupo do usuário $userId alterado para $novoGrupo com sucesso.");
        return redirect()->to('/sys/admin/')->with('success', 'Grupo do usuário alterado com sucesso!');
    }




    // Método para desativar um usuário
    public function desativarUsuario()
    {
        $request = service('request');
        $userId = $request->getPost('user_id');
        $adminPassword = $request->getPost('admin_password');

        // Obtém o usuário logado (admin)
        $admin = auth()->user();

        if (!$admin) {
            log_message('error', 'Tentativa de desativação sem usuário autenticado.');
            return redirect()->back()->with(
                'error',
                'Você precisa estar autenticado para desativar um usuário.'
            );
        }

        log_message('info', "Usuário autenticado: ID {$admin->id}, Nome: {$admin->username}");

        // Verifica se a senha informada está correta
        if (!password_verify($adminPassword, $admin->password_hash)) {
            log_message('error', "Senha incorreta ao desativar usuário. Admin ID: {$admin->id}");
            return redirect()->back()->with(
                'error',
                'Senha incorreta! A desativação foi cancelada.'
            );
        }

        // Desativa o usuário (soft delete)
        $userModel = new UserModel();
        if ($userModel->delete($userId)) {
            log_message('info', "Usuário ID {$userId} desativado com sucesso pelo Admin ID: {$admin->id}");
            return redirect()->back()->with('success', 'Usuário desativado com sucesso.');
        } else {
            log_message('error', "Erro ao desativar usuário ID {$userId} pelo Admin ID: {$admin->id}");
            return redirect()->back()->with(
                'error',
                'Erro ao desativar usuário.'
            );
        }
    }

    // Método para resetar senha de um usuário
    public function resetarSenha()
    {
        try {
            $userId = $this->request->getPost('user_id');

            // Verificar se o ID foi enviado
            if (!$userId) {
                return redirect()->back()->with('error', 'ID de usuário não fornecido.');
            }

            $users = new UserModel();
            $user = $users->find($userId);

            if (!$user) {
                return redirect()->back()->with('error', 'Usuário não encontrado.');
            }

            // Gerar uma nova senha segura
            $novaSenha = bin2hex(random_bytes(4)); // 8 caracteres aleatórios

            // Instanciar o serviço de hashing de senha
            $passwords = service('passwords');
            $user->password = $passwords->hash($novaSenha);
            $users->save($user);

            // Instanciar o serviço de e-mail com a configuração já definida no arquivo Email.php
            $email = \Config\Services::email();

            // Definir o remetente, destinatário e a mensagem
            $email->setFrom('notifica@ifrocalama.com', 'Ifro Calama');
            $email->setTo($user->email);
            $email->setSubject('Redefinição de Senha');
            $email->setMessage("Olá, {$user->username}!\n\nSua senha foi redefinida pelo administrador.\n\nNova senha: {$novaSenha}\n");

            // Enviar e-mail
            if (!$email->send()) {
                // Registra o erro no log com detalhes
                log_message('error', 'Erro ao enviar e-mail: ' . $email->printDebugger(['headers']));
                // Retorna uma mensagem genérica para o usuário
                return redirect()->back()->with('error', 'Erro ao enviar o e-mail. Por favor, tente novamente mais tarde.');
            }

            return redirect()->back()->with(
                'success',
                "Senha do usuário {$user->username} redefinida com sucesso e enviada ao e-mail."
            );
        } catch (\Exception $e) {
            // Registra a exceção no log
            log_message('error', 'Erro inesperado ao resetar senha: ' . $e->getMessage());
            // Retorna uma mensagem genérica para o usuário
            return redirect()->back()->with('error', 'Ocorreu um erro inesperado. Por favor, tente novamente mais tarde.');
        }
    }

    public function atualizarUsuario()
    {
        $request = service('request');

        // Captura os dados do formulário
        $userId         = $request->getPost('user_id');
        $username       = $request->getPost('username');
        $email          = $request->getPost('email');
        $adminPassword  = $request->getPost('admin_password');

        // Valida se os campos foram preenchidos
        if (!$userId || !$username || !$email || !$adminPassword) {
            return redirect()->to('/sys/admin/')
                ->with('error', 'Todos os campos são obrigatórios.');
        }

        // Obtém o usuário logado (admin)
        $admin = auth()->user();

        if (!$admin) {
            return redirect()->to('/sys/admin/')
                ->with('error', 'Usuário não autenticado.');
        }

        // Verifica se a senha do admin está correta
        if (!password_verify($adminPassword, $admin->password_hash)) {
            return redirect()->to('/sys/admin/')
                ->with('error', 'Senha do administrador incorreta.');
        }

        // Busca o usuário no banco de dados
        $user = $this->userModel->find($userId);
        if (!$user) {
            return redirect()->to('/sys/admin/')
                ->with('error', 'Usuário não encontrado.');
        }

        // Verifica se já existe um usuário com o mesmo username (exceto o próprio usuário)
        $existingUsername = $this->userModel
            ->where('username', $username)
            ->where('id !=', $userId)
            ->first();

        // Verifica se já existe um usuário com o mesmo e-mail (exceto o próprio usuário)
        $existingEmail = $this->userModel->db->table('auth_identities')
            ->where('type', 'email_password')
            ->where('secret', $email)
            ->where('user_id !=', $userId)
            ->get()
            ->getRow();

        // Verifica se há conflitos de username ou e-mail
        if ($existingUsername && $existingEmail) {
            return redirect()->to('/sys/admin/')
                ->with('error', 'Já existe um usuário com este username e e-mail.');
        } elseif ($existingUsername) {
            return redirect()->to('/sys/admin/')
                ->with('error', 'Já existe um usuário com este username.');
        } elseif ($existingEmail) {
            return redirect()->to('/sys/admin/')
                ->with('error', 'Já existe um usuário com este e-mail.');
        }

        // Atualiza os dados do usuário
        $user->username = $username;
        $user->email = $email;

        // Tenta salvar as alterações
        if (!$this->userModel->save($user)) {
            return redirect()->to('/sys/admin/')
                ->with('error', 'Erro ao atualizar usuário.');
        }

        return redirect()->to('/sys/admin/')
            ->with('success', 'Usuário atualizado com sucesso!');
    }

    public function reativarUsuario()
    {
        $request = service('request');
        $userId = $request->getPost('user_id');
        $adminPassword = $request->getPost('admin_password');

        // Obtém o usuário logado (admin)
        $admin = auth()->user();

        if (!$admin) {
            return redirect()->back()->with('error', 'Você precisa estar autenticado para reativar um usuário.');
        }

        // Verifica se a senha do admin está correta
        if (!password_verify($adminPassword, $admin->password_hash)) {
            return redirect()->back()->with('error', 'Senha incorreta! A reativação foi cancelada.');
        }

        // Busca o usuário no banco de dados (incluindo usuários desativados)
        $userModel = new UserModel();
        $user = $userModel->withDeleted()->find($userId);

        if (!$user) {
            return redirect()->back()->with('error', 'Usuário não encontrado.');
        }

        // Reativa o usuário (remove o deleted_at e define active como 1)
        $user->deleted_at = null; // Remove o soft delete
        $user->active = 1; // Define o usuário como ativo

        // Salva as alterações no banco de dados
        if ($userModel->save($user)) {
            // Verifica se o usuário foi atualizado corretamente
            $userAtualizado = $userModel->withDeleted()->find($userId);
            if ($userAtualizado->deleted_at === null && $userAtualizado->active == 1) {
                return redirect()->back()->with('success', 'Usuário reativado com sucesso.');
            } else {
                log_message('error', "Erro ao reativar usuário ID {$userId}. Dados não foram atualizados corretamente.");
                return redirect()->back()->with('error', 'Erro ao reativar usuário. Dados não foram atualizados corretamente.');
            }
        } else {
            log_message('error', "Erro ao salvar usuário ID {$userId} após reativação.");
            return redirect()->back()->with('error', 'Erro ao reativar usuário.');
        }
    }

    public function excluirPermanentemente()
    {
        $request = service('request');

        // Captura os dados do formulário
        $userId = $request->getPost('user_id');
        $adminPassword = $request->getPost('admin_password');

        // Verifica se o ID do usuário e a senha foram fornecidos
        if (!$userId || !$adminPassword) {
            return redirect()->back()->with('error', 'Dados inválidos.');
        }

        // Obtém o usuário logado (admin)
        $admin = auth()->user();

        if (!$admin) {
            return redirect()->back()->with('error', 'Você precisa estar autenticado para excluir um usuário.');
        }

        // Verifica se a senha do admin está correta
        if (!password_verify($adminPassword, $admin->password_hash)) {
            return redirect()->back()->with('error', 'Senha incorreta! A exclusão foi cancelada.');
        }

        // Busca o usuário no banco de dados
        $userModel = new \CodeIgniter\Shield\Models\UserModel();
        $user = $userModel->onlyDeleted()->find($userId);

        if (!$user) {
            return redirect()->back()->with('error', 'Usuário não encontrado.');
        }

        // Exclui permanentemente o usuário
        $userModel->delete($userId, true); // O segundo parâmetro "true" força a exclusão permanente

        return redirect()->back()->with('success', 'Usuário excluído permanentemente com sucesso.');
    }
}
