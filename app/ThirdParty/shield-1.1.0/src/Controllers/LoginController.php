<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter Shield.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace CodeIgniter\Shield\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Shield\Authentication\Authenticators\Session;
use CodeIgniter\Shield\Traits\Viewable;
use CodeIgniter\Shield\Validation\ValidationRules;

class LoginController extends BaseController
{
    use Viewable;

    /**
     * Displays the form the login to the site.
     *
     * @return RedirectResponse|string
     */
    public function loginView()
    {
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->loginRedirect());
        }

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // If an action has been defined, start it up.
        if ($authenticator->hasAction()) {
            return redirect()->route('auth-action-show');
        }

        return $this->view(setting('Auth.views')['login']);
    }

    /**
     * Attempts to log the user in.
     */
    public function loginAction(): RedirectResponse
    {
        // Validate here first, since some things,
        // like the password, can only be validated properly here.
        $rules = $this->getValidationRules();

        // Valida os dados de login
        if (! $this->validateData($this->request->getPost(), $rules, [], config('Auth')->DBGroup)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Verificação do reCAPTCHA
        $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
        if (!$this->validateRecaptcha($recaptchaResponse)) {
            // Caso o reCAPTCHA falhe, retorna erro e não permite o login
            return redirect()->back()->withInput()->with('error', 'Falha na verificação do reCAPTCHA.');
        }

        /** @var array $credentials */
        $credentials = $this->request->getPost(setting('Auth.validFields')) ?? [];
        $credentials = array_filter($credentials);
        $credentials['password'] = $this->request->getPost('password');
        $remember = (bool) $this->request->getPost('remember');

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // Tentativa de login
        $result = $authenticator->remember($remember)->attempt($credentials);
        if (! $result->isOK()) {
            // Caso a autenticação falhe, retorna erro com a razão
            return redirect()->route('login')->withInput()->with('error', $result->reason());
        }

        // Redireciona após login bem-sucedido
        return redirect()->to(config('Auth')->loginRedirect())->withCookies();
    }


    /**
     * Returns the rules that should be used for validation.
     *
     * @return array<string, array<string, list<string>|string>>
     */
    protected function getValidationRules(): array
    {
        $rules = new ValidationRules();

        return $rules->getLoginRules();
    }

    /**
     * Logs the current user out.
     */
    public function logoutAction(): RedirectResponse
    {
        // Capture logout redirect URL before auth logout,
        // otherwise you cannot check the user in `logoutRedirect()`.
        $url = config('Auth')->logoutRedirect();

        auth()->logout();

        return redirect()->to($url)->with('message', lang('Auth.successLogout'));
    }

    // Método para validar o reCAPTCHA
    protected function validateRecaptcha(string $recaptchaResponse): bool
    {
        $secret = '6LcEEXEqAAAAAI7DUKafGPUUyp54wsQ6faY0_m-a';
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        // Monta os parâmetros para a requisição
        $postData = http_build_query([
            'secret' => $secret,
            'response' => $recaptchaResponse,
        ]);

        // Inicializa a requisição cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);  // Assegura verificação do certificado SSL

        $resposta = curl_exec($ch);

        // Verifica se houve erro na execução do cURL
        if ($resposta === false) {
            curl_close($ch);
            log_message('error', 'Erro ao validar reCAPTCHA: ' . curl_error($ch));
            return false;
        }

        curl_close($ch);

        // Log da resposta do reCAPTCHA para depuração
        log_message('debug', 'Resposta do reCAPTCHA: ' . $resposta);

        // Decodifica a resposta do reCAPTCHA
        $resultado = json_decode($resposta);

        // Log do objeto resultado
        log_message('debug', 'Resultado do reCAPTCHA: ' . print_r($resultado, true));

        // Verifica se a resposta contém o campo 'success' e se está marcado como verdadeiro
        return isset($resultado->success) && $resultado->success === true;
    }
}
