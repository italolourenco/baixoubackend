<?php

class Produto
{

    private $codigo;
    private $descricao;
    private $fornecedor;
    private $preco;
    private $datahoraatualizacao;


    public function __construct($codigo, $descricao, $fornecedor, $preco, $datahoraatualizacao)
    {
        $this->codigo = $codigo;
        $this->descricao = $descricao;
        $this->fornecedor = $fornecedor;
        $this->preco = $preco;
        $this->datahoraatualizacao = $datahoraatualizacao;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getFornecedor()
    {
        return $this->fornecedor;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function getDatahoraatualizacao()
    {
        return $this->datahoraatualizacao;
    }



}