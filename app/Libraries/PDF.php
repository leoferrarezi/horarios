<?php

namespace App\Libraries;

require_once APPPATH . 'ThirdParty' . DIRECTORY_SEPARATOR . 'dompdf' . DIRECTORY_SEPARATOR . 'autoload.inc.php';

use Dompdf\Dompdf;

class PDF
{
	private $dompdf;
	private $css;
	private $html;
	private $header;

	public function __construct()
	{
		$this->dompdf = new Dompdf();
		$this->dompdf->setPaper('A4', 'landscape');

		$options = $this->dompdf->getOptions();
		$options->set('isHtml5ParserEnabled', true);
		$options->set('isRemoteEnabled', true);
	}

	public function setCSS($css)
	{
		$this->css = $css;
	}

	public function appendCSS($css)
	{
		$this->css .= $css;
	}

	public function setHeader($header)
	{
		$this->header = $header;
	}

	public function setBody($html)
	{
		$this->html = $html;
	}

	public function appendHTML($html)
	{
		$this->html .= $html;
	}

	public function generatePDF($file_name)
	{
		$render = '<!DOCTYPE html><html lang="pt-BR"><head><meta charset="UTF-8" />';
		$render .= '<style>';
		$render .= $this->css;
		$render .= '</style>';
		$render .= '</head>';
		$render .= '<body>';
		$render .= '<header>';
		$render .= $this->header;
		$render .= '</header>';
		$render .= $this->html;
		$render .= '</body>';
		$render .= '</html>';

		$this->dompdf->loadHtml($render);
		$this->dompdf->render();

		//echo $render;
		
		$this->dompdf->stream($file_name . ".pdf", ['Attachment' => 1]);
	}
}
