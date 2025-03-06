<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\ReferenciaException;
use App\Models\TurmasModel;
use App\Models\HorariosModel;
use App\Models\CursosModel;

use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Turmas extends BaseController
{
    public function index()
    {
        $turmas = new TurmasModel();
        $horarios = new HorariosModel();
        $cursos = new CursosModel();

        $data['turmas'] = $turmas->orderBy('sigla', 'asc')->getTurmasWithHorarioAndCursos();
        $data['horarios'] = $horarios->orderBy('nome', 'asc')->findAll();
        $data['cursos'] = $cursos->orderBy('nome', 'asc')->findAll();

        $data['content'] = view('sys/turmas', $data);
        return view('dashboard', $data);
    }

    public function salvar()
    {
        $turmas = new TurmasModel();

        //coloca todos os dados do formulario no vetor dadosPost
        $dadosPost = $this->request->getPost();

        $dadosLimpos['codigo'] = strip_tags($dadosPost['codigo']);
        $dadosLimpos['sigla'] = strip_tags($dadosPost['sigla']);
        $dadosLimpos['ano'] = strip_tags($dadosPost['ano']);
        $dadosLimpos['semestre'] = strip_tags($dadosPost['semestre']);
        $dadosLimpos['periodo'] = strip_tags($dadosPost['periodo']);
        $dadosLimpos['curso_id'] = strip_tags($dadosPost['curso_id']);
        $dadosLimpos['tempos_diarios'] = strip_tags($dadosPost['tempos_diarios']);
        $dadosLimpos['horario_id'] = $dadosPost['horario_id'] ?? "";
        $dadosLimpos['horario_preferencial_id'] = $dadosPost['horario_preferencial_id'] ?? "";

        //tenta cadastrar o nova disciplina no banco
        if ($turmas->insert($dadosLimpos)) {
            session()->setFlashdata('sucesso', 'Turma cadastrada com sucesso.');
            return redirect()->to(base_url('/sys/turma')); // Redireciona para a página de listagem
        } else {
            $data['erros'] = $turmas->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/turma'))->with('erros', $data['erros'])->withInput(); //retora com os erros e os inputs
        }
    }

    public function atualizar()
    {
        $dadosPost = $this->request->getPost();

        $dadosLimpos['id'] = strip_tags($dadosPost['id']);
        $dadosLimpos['codigo'] = strip_tags($dadosPost['codigo']);
        $dadosLimpos['sigla'] = strip_tags($dadosPost['sigla']);
        $dadosLimpos['ano'] = strip_tags($dadosPost['ano']);
        $dadosLimpos['semestre'] = strip_tags($dadosPost['semestre']);
        $dadosLimpos['periodo'] = strip_tags($dadosPost['periodo']);
        $dadosLimpos['curso_id'] = strip_tags($dadosPost['curso_id']);
        $dadosLimpos['tempos_diarios'] = strip_tags($dadosPost['tempos_diarios']);
        $dadosLimpos['horario_id'] = $dadosPost['horario_id'] ?? "";
        $dadosLimpos['horario_preferencial_id'] = $dadosPost['horario_preferencial_id'] ?? "";

        $turmas = new TurmasModel();
        if ($turmas->save($dadosLimpos)) {
            session()->setFlashdata('sucesso', 'Turma atualizada com sucesso.');
            return redirect()->to(base_url('/sys/turma')); // Redireciona para a página de listagem
        } else {
            $data['erros'] = $turmas->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/turma'))->with('erros', $data['erros']); //retora com os erros
        }
    }

    public function deletar()
    {

        $dadosPost = $this->request->getPost();
        $id = strip_tags($dadosPost['id']);

        $turmas = new TurmasModel();
        try {
            if ($turmas->delete($id)) {
                session()->setFlashdata('sucesso', 'Turma excluída com sucesso.');
                return redirect()->to(base_url('/sys/turma'));
            } else {
                return redirect()->to(base_url('/sys/turma'))->with('erro', 'Falha ao deletar disciplina');
            }
        } catch (ReferenciaException $e) {
            return redirect()->to(base_url('/sys/turma'))->with('erros', ['erro' => $e->getMessage()]);
        }
    }

    public function importar() {

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

        $turmaModel = new TurmasModel();
        $data['turmasExistentes'] = [];

        // Lê os dados da planilha
        $primeiraLinha = true;
        foreach ($sheet->getRowIterator() as $row) {

            if($primeiraLinha) {
                $primeiraLinha = false;
                continue;
            }

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $rowData = [];
            foreach ($cellIterator as $cell) {
                $rowData[] = $cell->getValue();
            }

            $curso = (isset($rowData[1])) ? explode(", ", $rowData[1]) : null;
            $curso = (is_array($curso)) ? $curso[0] : null;

            $codigo = (isset($rowData[0])) ? explode(".", $rowData[0]) : null;
            $periodo = (is_array($codigo)) ? $codigo[1] : null;

            $dataRows[] = [
                'codigo' => $rowData[0] ?? null,
                'sigla' => $rowData[2] ?? null,
                'ano' => $rowData[3] ?? null,
                'semestre' => $rowData[4] ?? null,
                'curso' => $curso,
                'periodo' => $periodo
            ];            
        }

        // Exibe os dados lidos na view
        $data['turmas'] = $dataRows;
        $data['content'] = view('sys/importar-turmas-form', $data);
        return view('dashboard', $data);
    }


    public function processarImportacao() {

        $selecionados = $this->request->getPost('selecionados');

        if (empty($selecionados)) {
            session()->setFlashdata('erro', 'Nenhum registro selecionado para importação.');
            return redirect()->to(base_url('/sys/matriz'));
        }

        $turmaModel = new TurmasModel();
        $cursoModel = new CursosModel();
        $insertedCount = 0;

        foreach ($selecionados as $registroJson) {
            $registro = json_decode($registroJson, true);

            $registro['curso_id'] = $cursoModel->getIdByNome($registro['curso']);
            unset($registro['curso']);

            if (!empty($registro['sigla'])) {
                $turmaModel->insert($registro);
                //print_r($turmaModel->errors());
                //die();
                $insertedCount++;
            }
        }

        session()->setFlashdata('sucesso', "{$insertedCount} registros importados com sucesso!");
        return redirect()->to(base_url('/sys/turma'));
    }

}
