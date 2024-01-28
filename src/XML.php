<?php

namespace Simplify\Xml;

use SimpleXMLElement;

class XML
{
      // Uma classe responsavel por auxiliar a trasnformação de arquivos XML em objetos JSON
      // essa classe tambem permite salvar os dados em arquivos.
      //
      private ?SimpleXMLElement $Data = null;
      private ?string $originalfilepath = null;
      public function __construct(string $entradaXML)
      {

            $xmlDados = null;

            if (file_exists($entradaXML)) {
                  // se a entrada é um arquivo
                  $xmlDados = file_get_contents($entradaXML);
                  $this->originalfilepath = $entradaXML;
            }

            // aqui temos certeza que a entrada é o arquivo XML.
            $xmlDados = simplexml_load_string(($entradaXML));

            # essa linha transforma o código em um objeto JSON ao inves de um SimpleXMLElement
            #$xmlDados = json_encode($xmlDados, JSON_PRETTY_PRINT);

            $this->Data = $xmlDados;
      }

      // getters
      public function GetXmlJson($flag = JSON_PRETTY_PRINT)
      {
            return json_encode($this->Data, $flag);
      }

      public function GetXmlObject()
      {
            return $this->Data;
      }
      public function GetJsonString()
      {
            return json_encode($this->Data);
      }
      public function GetXmlString()
      {
            return $this->Data->asXML();
      }
      // save function

      public function SaveData($filepath = null, $filetype = "xml", $filedata = null)
      {
            if ($filepath === null and $this->originalfilepath === null) {
            }

            if ($filedata === null) {
                  $filedata = $this->GetXmlString();
            }

            $filename = $filepath . "." . $filetype;

            $arquivoSaida = fopen($filename, "w");

            if ($arquivoSaida) {
                  fwrite($arquivoSaida, $filedata);
            }
      }

      public function SaveDataAsJSON($filepath, $jsonflag = JSON_PRETTY_PRINT, $filetype = "json", $json = null)
      {

            #salva os dados atuais em um arquivo .JSON 
            #primeiro converte para a versão em texto do arquivo.
            if ($json === null) {
                  $json = $this->Data;
            }

            $json = json_encode($json, $jsonflag);

            $this->SaveData($filepath, $filetype, $json);
      }
}
