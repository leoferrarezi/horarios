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
        //Conteúdo da página interna
        $this->content_data['content'] = view('sys/home');

        //Conteúdo da estrutura externa
        return view('dashboard', $this->content_data);
    }

    public function emConstrucao(): string
    {
        $pageContent['title'] = "Página em Construção";
        $this->content_data['content'] = view('sys/em-construcao', $pageContent);
        return view('dashboard', $this->content_data);
    }
}
