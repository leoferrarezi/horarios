<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Verificar se o usuário está autenticado
        if (!Services::auth()->loggedIn()) {
            log_message('debug', 'Usuário não autenticado');
            return redirect()->to('/login');
        }

        // Obter o ID do usuário autenticado
        $userId = Services::auth()->id();
        log_message('debug', 'ID do usuário autenticado: ' . $userId);

        // Verificar se o usuário pertence ao grupo 'admin'
        $userGroupModel = new \App\Models\UserGroupModel();
        $isAdmin = $userGroupModel->where('user_id', $userId)->where('group', 'admin')->countAllResults() > 0;

        if (!$isAdmin) {
            return redirect()->to('/');
        }
    }



    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Não há necessidade de lógica após a requisição
    }
}
