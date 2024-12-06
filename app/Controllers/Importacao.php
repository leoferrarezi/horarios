<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfessorModel;
use CodeIgniter\HTTP\ResponseInterface;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Importacao extends BaseController
{
    public function index()
    {
        // Exibe a página de upload da planilha
        $data['content'] = view('sys/importacao_form');
        return view('dashboard', $data); // Certifique-se de que a view 'dashboard' existe e está configurada
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

        // Lê os dados da planilha e captura apenas as colunas Nome e E-mail
        foreach ($sheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $rowData = [];
            foreach ($cellIterator as $cell) {
                $rowData[] = $cell->getValue();
            }

            // Captura apenas Nome (índice 1) e E-mail (índice 4)
            $dataRows[] = [
                'nome' => $rowData[1] ?? null, // Nome
                'email' => $rowData[4] ?? null // E-mail
            ];
        }

        // Remove o cabeçalho da planilha
        array_shift($dataRows);

        // Inserção no banco de dados
        $professorModel = new ProfessorModel();
        $insertedCount = 0;

        foreach ($dataRows as $data) {
            if (!empty($data['nome']) && !empty($data['email'])) {
                $professorModel->insert($data);
                $insertedCount++;
            }
        }

        // Retorna uma mensagem de sucesso
        session()->setFlashdata('sucesso', "{$insertedCount} registros importados com sucesso!");
        return redirect()->to(base_url('/sys/importacao'));
    }
}
