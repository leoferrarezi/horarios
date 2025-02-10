<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = 'no-reply@ifrocalama.com';  // Substitua com o seu email de envio
    public string $fromName   = 'Ifro Calama';              // Substitua com o nome do remetente
    public string $recipients = '';                       // Deixe vazio ou coloque destinatário por padrão

    /**
     * The "user agent"
     */
    public string $userAgent = 'CodeIgniter';

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
    public string $SMTPHost = 'sandbox.smtp.mailtrap.io';  // O servidor SMTP do Mailtrap

    /**
     * SMTP Username
     */
    public string $SMTPUser = '3ea968167e2f6a';  // Seu usuário do Mailtrap

    /**
     * SMTP Password
     */
    public string $SMTPPass = '54c3936b073518';  // Sua senha do Mailtrap

    /**
     * SMTP Port
     */
    public int $SMTPPort = 2525;  // A porta SMTP do Mailtrap

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
    public string $SMTPCrypto = 'tls';

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
    public string $mailType = 'text';

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
}
