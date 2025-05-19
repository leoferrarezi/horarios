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

    $options = $this->dompdf->getOptions();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);
  }

  public function generatePDF()
  {
    $this->dompdf->loadHtml('        
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <title>Horários de Graduação - IFRO</title>
    <style>
    @page {
              margin: 10 !important;
              padding: 0 !important;
              margin-top: 110px !important;
          }

      body {
        font-family: Arial, sans-serif;
        font-size: 10px;
        padding: 20px;
        background: #fff;
        color: #000;
      }

      header {
        align-items: center;
        padding-bottom: 5px;
        margin-bottom: 50px;
        position: fixed;
        margin-top: -100px;
        width: 96%;
      }

      header img {
        height: 70px;
        margin-right: 10px;
        margin-left: 10px;
      }

      h1 {
        font-size: 15px;
        color:rgb(5, 56, 5);
        padding: 0px;
        margin: 0px;
      }

      h2 {
        font-size: 14px;
        color: #1a5d1a;
        padding: 0px;
        margin: 0px;
      }

      h3 {
        font-size: 13px;
        color: #1a5d1a;
        padding: 0px;
        margin: 0px;
      }
        
      table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        table-layout:fixed;
        page-break-inside: avoid;
      }

      .caption {
        font-size: 13px;
        font-weight: bold;
        background-color: #1a5d1a;
        color: white;
        padding: 6px;
        border-radius: 4px 4px 0 0;
        text-align: center;
      }

      th, td {
        border: 1px solid #ccc;
        padding: 4px;
        text-align: center;
        vertical-align: middle;
      }

      th {
        background-color: #d1e7d1;
        color: #1a5d1a;
      }

      tr:nth-child(even) td {
        background-color: #f5fdf5;
      }

      .hora {  
        font-weight: bold;
      }

      em {
        font-style: normal;
        font-weight: bold;
        display: block;
        margin-top: 2px;
        color: #3d7b3d;
      }
      
    </style>
  </head>
  <body>
    <header>
      <table>
        <tr>
          <td width="25%">
            <img src="' . base_url("assets/images/logoifro.png") . '" alt="Logo IFRO">
          </td>
          <td width="75%">
            <h1>Instituto Federal de Educação, Ciência e Tecnologia de Rondônia</h1>
            <h2><i>Campus</i> Porto Velho Calama</h2>
            <h3>Departamento de Apoio ao Ensino - DAPE</h3>
            <h1>Horários por Cursos e Turmas - versão 2025.1</h1>
          </td>
        </tr>
      </table>
    </header>

    <table>
      <thead>
      <tr>
        <td colspan="6" style="border: none; padding: 0px; text-align: center;">
          <div class="caption">Licenciatura em Física - 1º p Lic em Física</div>
        </td>
      </tr>
        <tr>
          <th width="5%">Horário</th>
          <th width="19%">Segunda</th>
          <th width="19%">Terça</th>
          <th width="19%">Quarta</th>
          <th width="19%">Quinta</th>
          <th width="19%">Sexta</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="hora">19:00</td>
          <td>GEOMETRIA ANALIT E VETORI<br><em>Vlademir F<br>Sala 07</em></td>
          <td>INTROD AO CALCULO<br><em>Vlademir F<br>Sala 07</em></td>
          <td>FILOS DA ED ETICA PROF<br><em>Mateus G.<br>Sala 07</em></td>
          <td>LINGUA PORTUGUESA<br><em>Neusa T.<br>Sala 07</em></td>
          <td>METOD DO TRAB CIENT<br><em>Neusa T.<br>Sala 07</em></td>
        </tr>
        <tr>
          <td class="hora">19:50</td><td>GEOMETRIA ANALIT E VETORI<br><em>Vlademir F<br>Sala 07</em></td>
          <td>INTROD AO CALCULO<br><em>Vlademir F<br>Sala 07</em></td>
          <td>FILOS DA ED ETICA PROF<br><em>Mateus G.<br>Sala 07</em></td>
          <td>LINGUA PORTUGUESA<br><em>Neusa T.<br>Sala 07</em></td>
          <td>METOD DO TRAB CIENT<br><em>Neusa T.<br>Sala 07</em></td>
        </tr>
        <tr>
          <td class="hora">20:50</td>
          <td>HISTORIA EPIST DA FISICA<br><em>Cléver R.<br>Sala 07</em></td>
          <td>METOD PROJ INTEG EXTENS<br><em>Neusa T.<br>Sala 07</em></td>
          <td>LINGUA PORTUGUESA<br><em>Neusa T.<br>Sala 07</em></td>
          <td>METOD PROJ INTEG EXTENS<br><em>Neusa T.<br>Sala 07</em></td>
          <td>—</td>
        </tr>
        <tr>
          <td class="hora">21:40</td>
          <td>HISTORIA EPIST DA FISICA<br><em>Cléver R.<br>Sala 07</em></td>
          <td>METOD PROJ INTEG EXTENS<br><em>Neusa T.<br>Sala 07</em></td>
          <td>LINGUA PORTUGUESA<br><em>Neusa T.<br>Sala 07</em></td>
          <td>METOD PROJ INTEG EXTENS<br><em>Neusa T.<br>Sala 07</em></td>
          <td>—</td>
        </tr>
      </tbody>
    </table>
  </body>
</html>        
        ');
    $this->dompdf->render();
    $this->dompdf->stream();
  }
}
