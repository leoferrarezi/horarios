<?php

namespace App\Libraries;

require_once APPPATH . 'ThirdParty' . DIRECTORY_SEPARATOR . 'dompdf' . DIRECTORY_SEPARATOR . 'autoload.inc.php'; 
use Dompdf\Dompdf;

class PDF
{
    private $dompdf;

    public function __construct()
    {
        $this->dompdf = new Dompdf();
        $this->dompdf->setPaper('A4', 'landscape');
    }

    public function generatePDF()
    {        
        $this->dompdf->loadHtml('<p>hello <b>world</b></p>');
        $this->dompdf->render();
        $this->dompdf->stream();
    }
}