<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('login');
    }

    public function home(): string
    {
        $pageContent['title'] = "BEM - VINDO (A).";

        $data['content'] = view('sys/home', $pageContent);

        return view('dashboard', $data);
    }

    public function dashboard(): string
    {
        // Adicione o conteúdo que deseja exibir na página inicial do dashboard
        $pageContent['title'] = "Página Inicial do Dashboard";

        $data['content'] = view('sys/dashboard', $pageContent);

        return view('dashboard', $data);
    }

    public function emConstrucao(): string
    {
        $pageContent['title'] = "Página em Construção";

        $data['content'] = view('sys/em-construcao', $pageContent);

        return view('dashboard', $data);
    }
}
