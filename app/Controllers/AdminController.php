<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Shield\Entities\User;

class AdminController extends Controller
{
    protected $helpers = ['form'];

    public function changePassword()
    {
        return view('sys/alterar-senha');
    }

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
}
