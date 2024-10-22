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
}
