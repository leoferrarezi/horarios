<?php

namespace CodeIgniter\Exceptions;

use RuntimeException;

class ReferenciaException extends RuntimeException implements ExceptionInterface
{
    protected $message = 'Este registro não pode ser excluído, pois está sendo usado em outras partes do sistema.';
    // Construtor personalizado
    public function __construct($message = null, $code = 0, \Exception $previous = null)
    {
        // Chama o construtor da classe base (RuntimeException)
        parent::__construct($message ?? $this->message, $code, $previous);
    }
}
