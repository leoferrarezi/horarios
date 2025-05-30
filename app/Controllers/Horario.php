<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HorariosModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\ReferenciaException;

class Horario extends BaseController
{
    public function index()
    {
        $horarioModel = new HorariosModel();
        $data['horarios'] = $horarioModel->orderBy('nome', 'asc')->findAll();
        $this->content_data['content'] = view('sys/horarios', $data);
        return view('dashboard', $this->content_data);
    }

    public function salvar()
    {
        $horarioModel = new HorariosModel();

        //coloca todos os dados do formulario no vetor dadosPost
        $dadosPost = $this->request->getPost();
        $dadosLimpos['nome'] = strip_tags($dadosPost['nome']);


        if ($horarioModel->insert($dadosLimpos)) {

            session()->setFlashdata('sucesso', 'Horário cadastrado com sucesso!');
            return redirect()->to(base_url('/sys/horario'));
        } else {
            $data['erros'] = $horarioModel->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/horario'))->with('erros', $data['erros'])->withInput(); //retora com os erros e os inputs
        }
    }
    public function atualizar()
    {

        $dadosPost = $this->request->getPost();

        $dadosLimpos['id'] = strip_tags($dadosPost['id']);
        $dadosLimpos['nome'] = strip_tags($dadosPost['nome']);

        $horarioModel = new HorariosModel();
        if ($horarioModel->save($dadosLimpos)) {
            session()->setFlashdata('sucesso', 'Dados do Horário atualizados com sucesso!');
            return redirect()->to(base_url('/sys/horario')); // Redireciona para a página de listagem
        } else {
            $data['erros'] = $horarioModel->errors(); //o(s) erro(s)
            return redirect()->to(base_url('/sys/horario'))->with('erros', $data['erros']); //retora com os erros
        }
    }
    public function deletar()
    {
        $dadosPost = $this->request->getPost();
        $id = strip_tags($dadosPost['id']);

        $horarioModel = new HorariosModel();
        try {
            $restricoes = $horarioModel->getRestricoes(['id' => $id]);

            if (!$restricoes['tempos_aula'] && !$restricoes['turmas'] && !$restricoes['turmas_pref']) {
                if ($horarioModel->delete($id)) {
                    session()->setFlashdata('sucesso', 'Horário excluído com sucesso!');
                    return redirect()->to(base_url('/sys/horario'));
                } else {
                    return redirect()->to(base_url('/sys/horario'))->with('erro', 'Erro inesperado ao excluir horário!');
                }
            } else {
                $mensagem = "O horário não pode ser excluído.<br>Este horário possui ";
                if ($restricoes['tempos_aula'] && ($restricoes['turmas'] || $restricoes['turmas_pref'])) {
                    $mensagem = $mensagem . "tempo(s) de aula e turma(s) relacionadas a ele!";
                } else if ($restricoes['tempos_aula']) {
                    $mensagem = $mensagem . "tempo(s) de aula relacionado(s) a ele!";
                } else {
                    $mensagem = $mensagem . "turma(s) relacionada(s) a ele!";
                }
                throw new ReferenciaException($mensagem);
            }
        } catch (ReferenciaException $e) {
            session()->setFlashdata('erro', $e->getMessage());
            return redirect()->to(base_url('/sys/horario'));
        }
    }
}
