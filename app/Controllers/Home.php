<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('login');
    }

    public function sys(): string
    {

        $pageContent['title'] = "RRELOU, BEIBE.";

        $data['content'] = view('sys/home', $pageContent);

        return view('dashboard', $data);
        
    }
}
