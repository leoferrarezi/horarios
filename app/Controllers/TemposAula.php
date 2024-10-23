<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TemposAulasModel;

class TemposAula extends BaseController
{
    public function index(): ResponseInterface
    {
        $model = new TemposAulasModel();
        $data = $model->getTemposAula();

        return $this->response->setJSON($data);
    }
}