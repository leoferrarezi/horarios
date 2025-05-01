<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\VersoesModel;
use Config\Services;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    protected $content_data;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();

        //Pegar o nome da versao atual para todas as paginas
        if (auth()->loggedIn()) 
        {
            $versaoModel = new VersoesModel();
            $versao = $versaoModel->getVersaoByUser(auth()->id());

            if (empty($versao)) 
            {
                $versao = $versaoModel->getLastVersion();
                $versaoModel->setVersaoByUser(auth()->id(), $versao);
            }

            if ($versao > 0) 
            {
                $versao = $versaoModel->find($versao);
                $this->content_data['versao_nome'] = $versao['nome'];
            } 
            else 
            {
                $this->content_data['versao_nome'] = 'Sem versão';

                if($this->request->getUri() != site_url('/sys/versao') && 
                    $this->request->getUri() != site_url('/sys/versao/salvar') && 
                    $this->request->getUri() != site_url('/logout')  )
                {
                    session()->setFlashdata('erros', ['erro' => 'Nenhuma versão selecionada. Por favor, selecione uma versão para continuar. Se necessário, faça a inclusão de uma versão.']);
                    $response = Services::response();
                    $response
                        ->redirect(site_url('/sys/versao'))
                        ->send();
                    exit;
                }                
            }
        }
    }
}
