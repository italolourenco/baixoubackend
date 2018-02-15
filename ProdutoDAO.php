<?php

require_once("config.php");
require_once("Produto.php");
require_once("Database.php");

class ProdutoDAO
{

    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function addProduto(Produto $produto)
    {
        $codigo = $produto->getCodigo();
        $descricao = $produto->getDescricao();
        $fornecedor = $produto->getFornecedor();
        $preco = $produto->getPreco();
        $data =  $produto->getDatahoraatualizacao();

        $query = "INSERT INTO `produtos` (`codigo`, `descricao`, `fornecedor`, `preco`, `datahoraatualizacao`) VALUES ('$codigo', '$descricao', '$fornecedor', $preco, '$data')";
        mysqli_query($this->db->getConection(), $query);
    }

    public function searchProduto(Produto $produto)
    {

        $res = false;
        $codigo = $produto->getCodigo();

        $query = "SELECT * from produtos where produtos.codigo = '$codigo'";
        $result = mysqli_query($this->db->getConection(), $query);
        if(mysqli_num_rows($result) > 0){
            $res = true;
        }

        return $res;
    }
    
    public function updateProduto(Produto $produto)
    {

        $codigo = $produto->getCodigo();
        $descricao = $produto->getDescricao();
        $fornecedor = $produto->getFornecedor();
        $preco = $produto->getPreco();
        $data =  $produto->getDatahoraatualizacao();

        $query = "UPDATE `produtos` SET `descricao` = '$descricao', `fornecedor` = '$fornecedor', `preco` = '$preco', `datahoraatualizacao` = '$data' WHERE produtos.codigo = '$codigo'";
        mysqli_query($this->db->getConection(), $query);
    }


}