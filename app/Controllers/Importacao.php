<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Importacao extends BaseController
{
    public function index()
    {

        return view('');
    }

    public function importar_planilha()
    {

        $file = $this->request->getFile('');

        if (!$file->isValid()) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                ->setBody('Erro: Arquivo não enviado.');
        }

        $extension = $file->getClientExtension();
        if (!in_array($extension, ['xls', 'xlsx'])) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_UNSUPPORTED_MEDIA_TYPE)
                ->setBody('Erro: Formato de arquivo não suportado. Apenas XLSX ou XLS');
        }

        $newFileName = $file->getRandomName();
        $file->move(WRITEPATH . '', $newFileName);

        return $this->response->setStatusCode(ResponseInterface::HTTP_OK)
            ->setBody('Arquivo carregado com sucesso.');
    }
}
