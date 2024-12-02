<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Importacao extends BaseController
{
    public function index()
    {
        // Adiciona o conteúdo específico da página
        $data['content'] = view('sys/importacao_form');
        return view('dashboard', $data); // Retorna a dashboard com o conteúdo
    }

    public function importar_planilha()
    {
        $file = $this->request->getFile('arquivo');

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

        $reader = $extension === 'xlsx' ? new Xlsx() : new Xls();

        try {
            $spreadsheet = $reader->load($filePath);
        } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR)
                ->setBody('Erro ao carregar o arquivo: ' . $e->getMessage());
        }

        $sheet = $spreadsheet->getActiveSheet();
        $dataRows = [];

        foreach ($sheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $rowData = [];
            foreach ($cellIterator as $cell) {
                $rowData[] = $cell->getValue();
            }

            $dataRows[] = $rowData;
        }

        // Passa os dados processados para a variável content
        $data['dados'] = $dataRows;
        $data['content'] = view('sys/importacao_form', ['dados' => $dataRows]);
        return view('dashboard', $data);
    }
}
