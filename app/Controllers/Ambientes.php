<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AmbienteGrupoModel;
use App\Models\AmbientesModel;
use App\Models\GruposAmbientesModel;

class Ambientes extends BaseController
{
    public function index()
    {
        $ambientesModel = new AmbientesModel();
        $gruposAmbientesModel = new GruposAmbientesModel();
        $ambienteGrupoModel = new AmbienteGrupoModel();

        // Carrega todos os ambientes e grupos
        $data['ambientes'] = $ambientesModel->orderBy('nome')->findAll();
        $data['grupos'] = $gruposAmbientesModel->findAll();

        // Para cada grupo, recuperar os ambientes associados
        foreach ($data['grupos'] as &$grupo) {
            // recupera os ambientes associados ao grupo específico
            $grupo['ambientes'] = $ambienteGrupoModel
                ->where('grupo_de_ambiente_id', $grupo['id'])
                ->join('ambientes', 'ambientes.id = ambiente_grupo.ambiente_id')
                //->orderBy('nome')
                ->findAll();
        }

        $this->content_data['content'] = view('sys/ambientes', $data);

        return view('dashboard', [
            'ambientes' => $data['ambientes'],
            'grupos' => $data['grupos'],
            'content' => view('sys/ambientes', $this->content_data)
        ]);
    }

    public function salvarAmbiente()
    {
        $ambiente = new AmbientesModel();
        $dadosPost = $this->request->getPost();

        if ($ambiente->insert($dadosPost)) {
            session()->setFlashdata('sucesso', 'Ambiente cadastrado com sucesso!');
            return redirect()->to(base_url('sys/cadastro-ambientes'));
        } else {
            $data['erros'] = $ambiente->errors();
            return redirect()->to(base_url('sys/cadastro-ambientes'))->with('erros', $data['erros'])->withInput();
        }
    }

    public function atualizarAmbiente()
    {

        $ambiente = new AmbientesModel();

        $dadosPost = $this->request->getPost();

        $idAmbiente = strip_tags($dadosPost['id']);
        $novoNome = strip_tags($dadosPost['nome']);


        if ($ambiente->update($idAmbiente, ['nome' => $novoNome])) {
            session()->setFlashdata('sucesso', 'Nome do ambiente atualizado com sucesso!');
        } else {
            session()->setFlashdata('erro', 'Erro ao atualizar o nome do ambiente.');
        }

        return redirect()->to(base_url('/sys/cadastro-ambientes'));
    }

    public function deletarAmbiente()
    {
        $ambienteId = $this->request->getPost('id');
        $ambienteModel = new AmbientesModel();
        $ambienteGrupoModel = new AmbienteGrupoModel();

        $ambiente = $ambienteModel->find($ambienteId);
        if (!$ambiente) {
            session()->setFlashdata('erro', 'Ambiente não encontrado.');
            return redirect()->to(base_url('/sys/cadastro-ambientes'));
        }

        $relacoes = $ambienteGrupoModel->where('ambiente_id', $ambienteId)->findAll();
        foreach ($relacoes as $relacao) {
            $ambienteGrupoModel->delete($relacao['id']);
        }

        if ($ambienteModel->delete($ambienteId)) {
            session()->setFlashdata('sucesso', 'Ambiente removido com sucesso!');
        } else {
            session()->setFlashdata('erro', 'Erro ao excluir o ambiente.');
        }

        return redirect()->to(base_url('/sys/cadastro-ambientes'));
    }

    public function salvarGrupoAmbientes()
    {
        $grupoAmbientesModel = new GruposAmbientesModel();

        $dadosPost = $this->request->getPost();
        $dadosLimpos['nome'] = strip_tags($dadosPost['nome']);

        if ($grupoAmbientesModel->insert($dadosLimpos)) {
            session()->setFlashdata('sucesso', 'Grupo de Ambiente cadastrado com sucesso!');
            return redirect()->to(base_url('/sys/cadastro-ambientes'));
        } else {
            $data['erros'] = $grupoAmbientesModel->errors();
            return redirect()->to(base_url('/sys/cadastro-ambientes'))->with('erros', $data['erros'])->withInput();
        }
    }

    public function editarGrupoAmbientes()
    {
        $dadosPost = $this->request->getPost();

        $idGrupo = strip_tags($dadosPost['id']);
        $novoNome = strip_tags($dadosPost['nome']);

        $gruposModel = new GruposAmbientesModel();

        if ($gruposModel->update($idGrupo, ['nome' => $novoNome])) {
            session()->setFlashdata('sucesso', 'Nome do Grupo de Ambientes atualizado com sucesso!');
        } else {
            session()->setFlashdata('erro', 'Erro ao atualizar o nome do grupo.');
        }

        return redirect()->to(base_url('/sys/cadastro-ambientes'));
    }

    public function deletarGrupoAmbientes()
    {
        $grupoId = $this->request->getPost('id');
        $gruposAmbientesModel = new GruposAmbientesModel();
        $ambienteGrupoModel = new AmbienteGrupoModel();

        $grupo = $gruposAmbientesModel->find($grupoId);
        if (!$grupo) {
            session()->setFlashdata('erro', 'Grupo não encontrado.');
            return redirect()->to(base_url('/sys/cadastro-ambientes'));
        }

        $relacoes = $ambienteGrupoModel->where('grupo_de_ambiente_id', $grupoId)->findAll();
        foreach ($relacoes as $relacao) {
            $ambienteGrupoModel->delete($relacao['id']);
        }

        if ($gruposAmbientesModel->delete($grupoId)) {
            session()->setFlashdata('sucesso', 'Grupo de ambientes removido com sucesso!');
        } else {
            session()->setFlashdata('erro', 'Erro ao excluir o grupo de ambientes.');
        }

        return redirect()->to(base_url('/sys/cadastro-ambientes'));
    }

    public function adicionarAmbientesAoGrupo()
    {
        $ambienteGrupoModel = new AmbienteGrupoModel();
        $gruposAmbientesModel = new GruposAmbientesModel();

        $grupoId = $this->request->getPost('idGrupo');
        $ambientes = $this->request->getPost('ambientes');

        if (!$gruposAmbientesModel->find($grupoId)) {
            session()->setFlashdata('erro', 'Grupo de ambientes não encontrado.');
            return redirect()->to(base_url('/sys/cadastro-ambientes'));
        }

        if (empty($ambientes)) {
            session()->setFlashdata('erro', 'Nenhum Ambiente foi selecionado para adicionar ao grupo!');
            return redirect()->to(base_url('/sys/cadastro-ambientes'));
        }

        foreach ($ambientes as $ambienteId) {
            if ($ambienteGrupoModel
                ->where('grupo_de_ambiente_id', $grupoId)
                ->where('ambiente_id', $ambienteId)
                ->first()
            ) {
                session()->setFlashdata('erro', "O(s) Ambiente(s) selecionados já está(ão) no grupo!");
                return redirect()->to(base_url('/sys/cadastro-ambientes'))->withInput();
            }
            $ambienteGrupoModel->insert([
                'grupo_de_ambiente_id' => $grupoId,
                'ambiente_id' => $ambienteId,
            ]);
        }
        session()->setFlashdata('sucesso', 'Ambiente(s) adicionado(s) ao grupo com sucesso!');
        return redirect()->to(base_url('/sys/cadastro-ambientes'));
    }

    public function removerAmbienteDoGrupo()
    {
        $grupoId = $this->request->getPost('grupo_id');
        $ambienteId = $this->request->getPost('ambiente_id');

        $ambienteGrupoModel = new AmbienteGrupoModel();

        $relacao = $ambienteGrupoModel
            ->where('grupo_de_ambiente_id', $grupoId)
            ->where('ambiente_id', $ambienteId)
            ->first();

        if (!$relacao) {
            session()->setFlashdata('erro', 'Ambiente não encontrado no grupo.');
            return redirect()->to(base_url('/sys/cadastro-ambientes'));
        }

        if ($ambienteGrupoModel->delete($relacao['id'])) {
            session()->setFlashdata('sucesso', 'Ambiente removido do grupo com sucesso!');
        } else {
            session()->setFlashdata('erro', 'Falha ao remover o ambiente do grupo.');
        }

        return redirect()->to(base_url('/sys/cadastro-ambientes'));
    }
}
