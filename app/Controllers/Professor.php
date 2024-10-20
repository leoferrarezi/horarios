<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class Professor extends BaseController
{
    public function index()
    {
        //Exibe a lista de professores cadastrados
        $data['content'] = view('sys/lista-professor');
        return view('dashboard', $data);
    }

    public function cadastro(): string
    {
        // Exibe o formulário de cadastro
        $data['content'] = view('sys/cadastro-professor');
        return view('dashboard', $data);
    }

    public function salvar()
    {
        $professor = new \App\Models\ProfessorModel();

        //coloca todos os dados do formulario no vetor dadosPost
        $dadosPost = $this->request->getPost();

        //Verifica se o SIAPE esta vazio e poe NULL neste caso, pra não ir um SIAPE com valor 0 pro banco
        if(empty($dadosPost['siape'])) { $dadosPost['siape'] = NULL; }

        //tenta cadastrar o novo professor no banco
        if($professor->insert($dadosPost))
        {
            //se deu certo, direciona pra lista de professores
            return redirect()->to(uri: '/sys/professor?cadastrado');
        }
        else
        {
            //se deu errado, renderiza a view novamente mostrando os erros
            $prof['erros'] = $professor->errors(); //o(s) erro(s)
            $prof['campos'] = $dadosPost; //os dados preenchidos no form, pra preencher novamente
            
            $data['content'] = view('sys/cadastro-professor', $prof); //renderiza a página de cadastro do prof
            return view('dashboard', $data); //renderiza a página completa com o cadastro de prof "no meio"
        }
    }
}
