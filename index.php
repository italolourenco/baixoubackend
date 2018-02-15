<?php

require_once("Produto.php");
require_once("XmlService.php");
require_once("Database.php");
require_once("ProdutoDAO.php");

  echo '<h1 style="text-align:center">Baixou Back-End Teste</h1>';
  echo '<h2 style="text-align:center">Ítalo Lourenço</h2>';

  function executeScript()
  {
    $xmlService = new XmlService();
    $db = new Database();
    $dao = new ProdutoDAO($db);
  
    $listProdutos = $xmlService->getProdutos();
    foreach($listProdutos as $produto){
        $result = $dao->searchProduto($produto);
        if(!$result){
          $dao->addProduto($produto);
        }
        $dao->updateProduto($produto);
    }
  
    unlink("zip/clean.xml");
    unlink("zip/0303.xml");
    unlink("zip/zip-download.zip");
  }

  executeScript();


?>