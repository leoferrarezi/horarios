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

        // Verificar se o usuário pertence ao grupo 'admin'
        if (!Services::auth()->hasGroup('admin')) {
            log_message('debug', 'Usuário não é do grupo admin');
            return redirect()->to('/unauthorized');
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Não há necessidade de lógica após a requisição
    }
}
