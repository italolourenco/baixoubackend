<?php

require_once("Produto.php");
require_once("config.php");

class XmlService
{

    public function __construct()
    {
    }

    public function getZipUrl()
    {
        file_put_contents(ZIP_DIR, fopen(Baixou_URL, 'r'), LOCK_EX);
    }

    public function clearXml()
    {
        $zip = new ZipArchive;
        $res = $zip->open(ZIP_DIR);

        if ($res === TRUE) {
            $zip->extractTo('zip');
            $xmlFile = file_get_contents("zip/0303.xml");
            $handle = fopen("zip/0303.xml", "r");
            if($handle){
                $handleClear = fopen("zip/clean.xml", "a");
                while(!feof($handle)){
                    $buffer = fgets($handle);
                    preg_match_all( '~<.+?>(.+?)<\/.+?>~' , $buffer , $retorno);
                    if(isset($retorno[1][0])){
                        $d = $retorno[1][0];
                        if($d[0] != '<'){
                            $remove_tag = strip_tags($d);
                            $remove_tag = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $remove_tag);
                            $c = preg_replace("(>(.*)<)", '>'.$remove_tag.'<', $buffer);
                            $buffer = $c;
                        };
                    };
                fwrite($handleClear, $buffer);
            }
            fclose($handleClear);
        };
        fclose($handle);
    }

    }

    public function getProdutos()
    {
        $this->getZipUrl();
        $this->clearXml();
        $xml =  new SimpleXMLElement("zip/clean.xml", null, true);
        $date = date("Y-m-d H:i:s"); 
        $listProdutos = array();
        foreach($xml->produto as $produto){
            $produto = new Produto($produto->Reduzido,$produto->Descricao,$produto->Fornecedor,$produto->PrecoPor, $date);
            array_push($listProdutos, $produto);
        }
        return $listProdutos;
    }



}