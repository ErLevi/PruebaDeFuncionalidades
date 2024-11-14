<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentsManagerController extends Controller
{
    public function readPdf() {
        $file = storage_path('app/private/documents/Constancia_Fiscal.pdf');
        if(file_exists($file)){
          $parseador = new \Smalot\PdfParser\Parser();
          $nombreDocumento = $file;
          $documento = $parseador->parseFile($nombreDocumento);

          $texto = $documento->getText();
          $rfc = explode('CÉDULA DE IDENTIFICACIÓN FISCAL', $texto)[1];
          $rfc = substr($rfc, 0, 13);

          $name = explode('Registro Federal de Contribuyentes', $texto)[1];
          $name = explode('Nombre,', $name)[0];;
          return $rfc . " - " . $name;
        }
        return "no";
    }
}
