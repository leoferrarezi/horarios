<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

class Importacao extends BaseController
{
    public function index()
    {
        return view('importacao_form'); // view vai aqui
    }

    public function importar_planilha()
    {
        $file = $this->request->getFile('arquivo'); // 

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
        $file->move(WRITEPATH . 'uploads', $newFileName); 

        $filePath = WRITEPATH . 'uploads/' . $newFileName;

        
        if ($extension === 'xlsx') {
            $reader = new Xlsx();
        } else {
            $reader = new Xls();
        }

        try {
            $spreadsheet = $reader->load($filePath);
        } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR)
                ->setBody('Erro ao carregar o arquivo: ' . $e->getMessage());
        }

        
        $sheet = $spreadsheet->getActiveSheet();
        $data = [];

        
        foreach ($sheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $rowData = [];
            foreach ($cellIterator as $cell) {
                $rowData[] = $cell->getValue();
            }

            $data[] = $rowData;
        }

            echo '<pre>';
            print_r($data);
            echo '</pre>';
            exit;

        

        return $this->response->setStatusCode(ResponseInterface::HTTP_OK)
            ->setBody('Arquivo carregado e dados processados com sucesso.');
    }
}
