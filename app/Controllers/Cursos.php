<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CursosModel;
use App\Models\MatrizCurricularModel;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Cursos extends BaseController
{

    public function index()
    {
        // Cria a instância de um model do curso
        $cursoModel = new CursosModel();
        $matrizCurricularModel = new MatrizCurricularModel();
        // Faz a busca por todos os cursos cadastrado no banco (tabela cursos)
        $data['matrizes'] = $matrizCurricularModel->orderBy('nome', 'asc')->findAll();
        $data['cursos'] = $cursoModel->orderBy('nome', 'asc')->getCursosWithMatriz();
        // Exibe os cursos cadastrados
        $data['content'] = view('sys/lista-cursos', $data);
        return view('dashboard', $data);
    }

    public function salvar()
    {
        $cursoModel = new CursosModel();

        //coloca todos os dados do formulario no vetor dadosPost
        $dadosPost = $this->request->getPost();

        $dadosLimpos['nome'] = strip_tags($dadosPost['nome']);
        $dadosLimpos['matriz_id'] = strip_tags($dadosPost['matriz_id']);

        //tenta cadastrar o novo professor no banco
        if ($cursoModel->insert($dadosLimpos)) {
            //se deu certo, direciona pra lista de cursos
            session()->setFlashdata('sucesso', 'Curso cadastrado com sucesso.');
            return redirect()->to(base_url('/sys/curso')); // Redireciona para a página de listagem
        } else {
            $data['erros'] = $cursoModel->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/curso'))->with('erros', $data['erros'])->withInput(); //retora com os erros e os inputs
        }
    }
    public function atualizar(){

        $dadosPost = $this->request->getPost();

        $dadosLimpos['id'] = strip_tags($dadosPost['id']);        
        $dadosLimpos['nome'] = strip_tags($dadosPost['nome']);
        $dadosLimpos['matriz_id'] = strip_tags($dadosPost['matriz_id']);

        $cursoModel = new CursosModel();
        if($cursoModel->save($dadosLimpos)){
            session()->setFlashdata('sucesso', 'Curso atualizado com sucesso.');
            return redirect()->to(base_url('/sys/curso')); // Redireciona para a página de listagem
        } else {
            $data['erros'] = $cursoModel->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/curso'))->with('erros', $data['erros']); //retora com os erros
        }

    }
    public function deletar(){
        
        $dadosPost = $this->request->getPost();
        $id = strip_tags($dadosPost['id']);

        $cursoModel = new CursosModel();
        
        if ($cursoModel->delete($id)) {
            session()->setFlashdata('sucesso', 'Curso excluído com sucesso.');
            return redirect()->to(base_url('/sys/curso'));
        } else {
            return redirect()->to(base_url('/sys/curso'))->with('erro', 'Falha ao deletar curso');
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

        $cursosModel = new CursosModel();
        $data['cursosExistentes'] = [];

        $matrizModel = new MatrizCurricularModel();

        foreach($cursosModel->getCursosNome() as $k)
        {
            array_push($data['cursosExistentes'],$k['nome']);
        }

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

            $jaTem = false;

            foreach($dataRows as $k => $v)
            {
                foreach($v as $k2 => $v2)
                {                    
                    if(strcasecmp($rowData[1], $v2) == 0) {
                        $jaTem = true;
                    }                    
                }
            }
            
            if(!$jaTem) {
                $matriz = (isset($rowData[33])) ? explode(" - ", $rowData[33]) : null;
                $matriz = (is_array($matriz)) ? $matriz[count($matriz)-2] : null;
                $matriz = substr($matriz, 0, -7);

                $existe = 0;
                if($matrizModel->checkMatrizExists($matriz) > 0)
                    $existe = 1;                    

                $dataRows[] = [
                    'nome' => $rowData[1] ?? null,
                    'matriz' => $matriz ?? null,
                    'matrizExiste' => $existe,
                ];
            }            
        }

        // Remove cabeçalho
        array_shift($dataRows);

        // Exibe os dados lidos na view
        $data['cursos'] = $dataRows;
        $data['content'] = view('sys/importar-curso-form', $data);
        return view('dashboard', $data);
    }

    public function processarImportacao() {

        $selecionados = $this->request->getPost('selecionados');

        if (empty($selecionados)) {
            session()->setFlashdata('erro', 'Nenhum registro selecionado para importação.');
            return redirect()->to(base_url('/sys/curso'));
        }

        $cursoModel = new CursosModel();
        $matrizModel = new MatrizCurricularModel();

        $insertedCount = 0;

        foreach ($selecionados as $registroJson) {

            $registro = json_decode($registroJson, true);

            unset($registro['matrizExiste']);

            $registro['matriz_id'] = $matrizModel->getIdByNome($registro['matriz']);

            if (!empty($registro['nome'])) {
                $cursoModel->insert($registro);
                $insertedCount++;
            }
        }

        session()->setFlashdata('sucesso', "{$insertedCount} registros importados com sucesso!");
        return redirect()->to(base_url('/sys/curso'));
    }
}
