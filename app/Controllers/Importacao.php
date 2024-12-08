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
        return view('dashboard', $data);
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

        $reader = $extension === 'xlsx' ? new Xlsx() : new Xls();

        try {
            $spreadsheet = $reader->load($file->getRealPath());
        } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR)
                ->setBody('Erro ao carregar o arquivo: ' . $e->getMessage());
        }

        $sheet = $spreadsheet->getActiveSheet();
        $dataRows = [];

        // Lê os dados da planilha e captura Nome e E-mail
        foreach ($sheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $rowData = [];
            foreach ($cellIterator as $cell) {
                $rowData[] = $cell->getValue();
            }

            $dataRows[] = [
                'nome' => $rowData[1] ?? null,
                'email' => $rowData[4] ?? null,
            ];
        }

        // Remove cabeçalho
        array_shift($dataRows);

        // Exibe os dados lidos na view
        $data['professores'] = $dataRows;
        $data['content'] = view('sys/importacao_form', $data);
        return view('dashboard', $data);
    }

    public function importar_selecionados()
    {
        $selecionados = $this->request->getPost('selecionados');

        if (empty($selecionados)) {
            session()->setFlashdata('erro', 'Nenhum registro selecionado para importação.');
            return redirect()->to(base_url('/sys/importacao'));
        }

        $professorModel = new ProfessorModel();
        $insertedCount = 0;

        foreach ($selecionados as $registroJson) {
            $registro = json_decode($registroJson, true);

            if (!empty($registro['nome']) && !empty($registro['email'])) {
                $professorModel->insert($registro);
                $insertedCount++;
            }
        }

        session()->setFlashdata('sucesso', "{$insertedCount} registros importados com sucesso!");
        return redirect()->to(base_url('/sys/importacao'));
    }
}
