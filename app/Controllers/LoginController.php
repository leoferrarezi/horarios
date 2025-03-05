<?php

namespace App\Controllers;

use CodeIgniter\Shield\Controllers\LoginController as ShieldLoginController;
use CodeIgniter\HTTP\RedirectResponse;

class LoginController extends ShieldLoginController
{
    /**
     * Attempts to log the user in.
     */
    public function loginAction(): RedirectResponse
    {
        // Validação dos dados de login
        log_message('info', 'Tentativa de login recebida.');

        $rules = $this->getValidationRules();
        if (! $this->validateData($this->request->getPost(), $rules, [], config('Auth')->DBGroup)) {
            log_message('error', 'Validação dos dados de login falhou. Erros: ' . json_encode($this->validator->getErrors()));
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Verificação do reCAPTCHA
        $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
        if (!$recaptchaResponse) {
            session()->setFlashdata('error', 'Por favor, complete o reCAPTCHA.');
            return redirect()->back()->withInput();
        }

        try {
            if (!$this->validateRecaptcha($recaptchaResponse)) {
                session()->setFlashdata('error', 'Falha na validação do reCAPTCHA. Tente novamente.');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Erro interno ao validar o reCAPTCHA.');
            return redirect()->back()->withInput();
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
            log_message('error', 'Falha na tentativa de login. Razão: ' . $result->reason());
            return redirect()->route('login')->withInput()->with('error', $result->reason());
        }

        log_message('info', 'Login realizado com sucesso para o usuário: ' . $credentials['email']);
        session()->setFlashdata('success', 'Login realizado com sucesso! ReCAPTCHA verificado.');

        // Redireciona após login bem-sucedido
        return redirect()->to(config('Auth')->loginRedirect())->withCookies();
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

        // Decodifica a resposta do reCAPTCHA
        $resultado = json_decode($resposta);

        // Verifica se a resposta contém o campo 'success' e se está marcado como verdadeiro
        if (isset($resultado->success) && $resultado->success === true) {
            return true;
        }

        return false;
    }
}
