<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MatrizCurricularModel;
use App\Models\DisciplinasModel;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\ReferenciaException;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class MatrizCurricular extends BaseController
{
    public function index()
    {
        $matrizModel = new MatrizCurricularModel();
        $data['matrizes'] = $matrizModel->orderBy('nome', 'asc')->findAll();
        $this->content_data['content'] = view('sys/matriz', $data);
        return view('dashboard', $this->content_data);
    }

    public function salvar()
    {
        $matrizModel = new MatrizCurricularModel();

        //coloca todos os dados do formulario no vetor dadosPost
        $dadosPost = $this->request->getPost();
        $dadosLimpos['nome'] = strip_tags($dadosPost['nome']);


        if ($matrizModel->insert($dadosLimpos)) {
            session()->setFlashdata('sucesso', 'Matriz Curricular cadastrada com sucesso!');
            return redirect()->to(base_url('/sys/matriz'));
        } else {
            $data['erros'] = $matrizModel->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/matriz'))->with('erros', $data['erros'])->withInput(); //retora com os erros e os inputs
        }
    }

    public function atualizar()
    {

        $dadosPost = $this->request->getPost();

        $dadosLimpos['id'] = strip_tags($dadosPost['id']);
        $dadosLimpos['nome'] = strip_tags($dadosPost['nome']);

        $matrizModel = new MatrizCurricularModel();
        if ($matrizModel->save($dadosLimpos)) {
            session()->setFlashdata('sucesso', 'Dados da Matriz Curricular atualizados com sucesso!');
            return redirect()->to(base_url('/sys/matriz')); // Redireciona para a página de listagem
        } else {
            $data['erros'] = $matrizModel->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/matriz'))->with('erros', $data['erros']); //retora com os erros
        }
    }

    public function deletar()
    {
        $dadosPost = $this->request->getPost();
        $id = (int)strip_tags($dadosPost['id']);

        $matrizModel = new MatrizCurricularModel();
        try {
            $restricoes = $matrizModel->getRestricoes(['id' => $id]);

            if (!$restricoes['cursos'] && !$restricoes['disciplinas']) {
                if ($matrizModel->delete($id)) {
                    session()->setFlashdata('sucesso', 'Matriz Curricular excluída com sucesso!');
                    return redirect()->to(base_url('/sys/matriz'));
                } else {
                    return redirect()->to(base_url('/sys/matriz'))->with('erro', 'Erro inesperado ao excluir Matriz!');
                }
            } else {
                $mensagem = "A matriz não pode ser excluída.<br>Esta matriz possui ";
                if ($restricoes['cursos'] && $restricoes['disciplinas']) {
                    $mensagem = $mensagem . "curso(s) e disciplina(s) relacionadas a ela!";
                } else if ($restricoes['cursos']) {
                    $mensagem = $mensagem . "curso(s) relacionado(s) a ela!";
                } else {
                    $mensagem = $mensagem . "disciplina(s) relacionada(s) a ela!";
                }
                throw new ReferenciaException($mensagem);
            }

        } catch (ReferenciaException $e) {
            session()->setFlashdata('erro', $e->getMessage());
            return redirect()->to(base_url('/sys/matriz'));
        }
    }

    public function importar()
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

        $matrizModel = new MatrizCurricularModel();
        $data['matrizesExistentes'] = [];

        foreach ($matrizModel->getMatrizesNome() as $k) {
            array_push($data['matrizesExistentes'], $k['nome']);
        }

        // Lê os dados da planilha
        foreach ($sheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $rowData = [];
            foreach ($cellIterator as $cell) {
                $rowData[] = $cell->getValue();
            }

            $jaTem = false;

            foreach ($dataRows as $k => $v) {
                foreach ($v as $k2 => $v2) {
                    if (strcasecmp($rowData[1], $v2) == 0) {
                        $jaTem = true;
                    }
                }
            }

            if (!$jaTem) {
                $dataRows[] = [
                    'nome' => $rowData[1] ?? null
                ];
            }
        }

        // Remove cabeçalho
        array_shift($dataRows);

        // Exibe os dados lidos na view
        $data['matrizes'] = $dataRows;
        $this->content_data['content'] = view('sys/importar-matriz-form', $data);
        return view('dashboard', $this->content_data);
    }

    public function processarImportacao()
    {

        $selecionados = $this->request->getPost('selecionados');

        if (empty($selecionados)) {
            session()->setFlashdata('erro', 'Nenhum registro selecionado para importação.');
            return redirect()->to(base_url('/sys/matriz'));
        }

        $matrizModel = new MatrizCurricularModel();
        $insertedCount = 0;

        foreach ($selecionados as $registroJson) {
            $registro = json_decode($registroJson, true);

            if (!empty($registro['nome'])) {
                $matrizModel->insert($registro);
                $insertedCount++;
            }
        }

        session()->setFlashdata('sucesso', "{$insertedCount} registros importados com sucesso!");
        return redirect()->to(base_url('/sys/matriz'));
    }

    public function importarDisciplinas()
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

        $dadosPost = $this->request->getPost();
        $matriz = strip_tags($dadosPost['matriz-id']);

        $disciplinaModel = new DisciplinasModel();
        $disciplinaModel->deleteAllDisciplinasFromMatriz($matriz);

        // Lê os dados da planilha e captura Nome e E-mail
        $primeiraLinha = true;
        foreach ($sheet->getRowIterator() as $row) {

            if ($primeiraLinha) {
                $primeiraLinha = false;
                continue;
            }

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $rowData = [];
            foreach ($cellIterator as $cell) {
                $rowData[] = $cell->getValue();
            }

            $nome = (isset($rowData[3])) ? explode(" - ", $rowData[3]) : null;
            $nome = (is_array($nome)) ? $nome[1] : null;

            $periodo = (isset($rowData[1])) ? $rowData[1] : null;
            $periodo = ($periodo != null && $periodo == "-") ? 0 : $periodo;

            $ch = (isset($rowData[9])) ? explode("CH Aula: ", $rowData[9]) : null;
            $ch =  (is_array($ch)) ? $ch[1] : null;

            preg_match_all('/[A-Z]/', $nome, $matches);
            $abreviatura = implode('', $matches[0]);

            $dataRows[] = [
                'nome' => $nome,
                'codigo' => $rowData[2] ?? null,
                'matriz_id' => $matriz,
                'ch' => $ch,
                'max_tempos_diarios' => (($ch / 20) > 4) ? 4 : (int)($ch / 20),
                'periodo' => $periodo,
                'abreviatura' => $abreviatura
            ];
        }

        // Remove cabeçalho
        //array_shift($dataRows);

        // Exibe os dados lidos na view
        $data['disciplinas'] = $dataRows;
        $this->content_data['content'] = view('sys/importar-disciplinas-form', $data);
        return view('dashboard', $this->content_data);
    }

    public function processarImportacaoDisciplinas()
    {

        $selecionados = $this->request->getPost('selecionados');

        if (empty($selecionados)) {
            session()->setFlashdata('erro', 'Nenhum registro selecionado para importação.');
            return redirect()->to(base_url('/sys/matriz'));
        }

        $disciplinaModel = new DisciplinasModel();
        $insertedCount = 0;

        foreach ($selecionados as $registroJson) {
            $registro = json_decode($registroJson, true);

            if (!empty($registro['nome'])) {
                if (!$disciplinaModel->insert($registro)) {
                    print_r($registro);
                    print_r($disciplinaModel->errors());
                    die();
                }
                $insertedCount++;
            }
        }

        session()->setFlashdata('sucesso', "{$insertedCount} registros importados com sucesso!");
        return redirect()->to(base_url('/sys/matriz'));
    }
}
