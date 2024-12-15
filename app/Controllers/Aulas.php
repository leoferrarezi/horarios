<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Aulas extends BaseController
{
  public function index() 
  {
    $data['content'] = view('sys/em-construcao');
    return view('dashboard', $data);
  }
}
