<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = 'notifica@ifrocalama.com';  // E-mail de remetente
    public string $fromName   = 'Ifro Calama';              // Nome do remetente
    public string $recipients = '';                       // Deixe vazio ou coloque destinatário por padrão

    /**
     * O protocolo para envio de e-mail (mail, sendmail, smtp)
     */
    public string $protocol = 'smtp';

    /**
     * O caminho do Sendmail. No caso de SMTP não será usado.
     */
    public string $mailPath = '/usr/sbin/sendmail';

    /**
     * SMTP Server Hostname
     */
    public string $SMTPHost = 'mail.smtp2go.com';  // Servidor SMTP do SMTP2Go

    /**
     * SMTP Username
     */
    public string $SMTPUser = 'notifica@ifrocalama.com';  // Seu e-mail de autenticação

    /**
     * SMTP Password
     */
    public string $SMTPPass;  // Senha de autenticação (será carregada do .env)

    /**
     * SMTP Port
     */
    public int $SMTPPort = 8025;  // Porta SMTP (você pode usar 2525, 8025, 587, 80 ou 25)

    /**
     * SMTP Timeout (em segundos)
     */
    public int $SMTPTimeout = 5;

    /**
     * Ativar conexões SMTP persistentes
     */
    public bool $SMTPKeepAlive = false;

    /**
     * SMTP Encryption.
     * Defina como 'tls' para a comunicação segura.
     */
    public string $SMTPCrypto = 'tls';  // Use 'tls' para criptografia

    /**
     * Habilitar o Word Wrap
     */
    public bool $wordWrap = true;

    /**
     * Contagem de caracteres para quebra de linha
     */
    public int $wrapChars = 76;

    /**
     * Tipo de e-mail, pode ser 'text' ou 'html'
     */
    public string $mailType = 'html';  // Use 'html' para e-mails com formatação

    /**
     * Conjunto de caracteres (UTF-8, iso-8859-1, etc.)
     */
    public string $charset = 'UTF-8';

    /**
     * Se o e-mail deve ser validado
     */
    public bool $validate = false;

    /**
     * Prioridade do e-mail (1 = mais alto, 5 = mais baixo, 3 = normal)
     */
    public int $priority = 3;

    /**
     * Caracteres de Nova Linha
     */
    public string $CRLF = "\r\n";

    /**
     * Caracteres de Nova Linha (alternativo)
     */
    public string $newline = "\r\n";

    /**
     * Ativar o modo de BCC em lote
     */
    public bool $BCCBatchMode = false;

    /**
     * Quantidade de e-mails em cada lote de BCC
     */
    public int $BCCBatchSize = 200;

    /**
     * Ativar mensagens de notificação do servidor
     */
    public bool $DSN = false;

    /**
     * Construtor para carregar a senha do SMTP do .env
     */
    public function __construct()
    {
        parent::__construct();

        // Carrega a senha do SMTP do arquivo .env
        $this->SMTPPass = env('SMTP_PASSWORD', ''); // O segundo parâmetro é um valor padrão caso a variável não exista
    }
}
