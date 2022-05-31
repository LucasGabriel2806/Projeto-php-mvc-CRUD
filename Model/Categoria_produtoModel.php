<?php

class Categoria_produtoModel
{
    
    public $id, $nome, $descricao;

    public $rows;

    
    public function save()
    {
        include 'DAO/Categoria_produtoDAO.php';

        $dao = new Categoria_produtoDAO();

        
        // Verificando se a propriedade id foi preenchida no model
        // Para saber mais sobre a palavra-chave this, leia: https://pt.stackoverflow.com/questions/575/quando-usar-self-vs-this-em-php
        if(empty($this->id))
        {
            // Chamando o método insert que recebe o próprio objeto model
            // já preenchido
			// se id tivar vazia, faz o insert
            $dao->insert($this);
			/**
			 * $this: instancia de todo meu objeto, se refere ao objeto (instância) atual(nesse caso é a model),  
			 * em vez de colocar $model, colocamos $this, usa-se $this para acessar membros (atributos, métodos) da instância
			 */
			
        } else {
			// se id não estiver vazia, faz update
            $dao->update($this); // Como existe um id, passando o model para ser atualizado.
        } 

    }

    public function getAllRows()
    {
        include 'DAO/Categoria_ProdutoDAO.php';
        
        
        $dao = new Categoria_ProdutoDAO();

        
        $this->rows = $dao->select();
    }


    
    public function getById(int $id)
    {
        include 'DAO/Categoria_ProdutoDAO.php'; 

        $dao = new Categoria_ProdutoDAO();

        $obj = $dao->selectById($id);

        
        return ($obj) ? $obj : new Categoria_ProdutoModel();

    }

    /**
     * Método que encapsula o acesso a DAO do método delete.
     * O método recebe um parâmetro do tipo inteiro que é o id do registro
     * que será excluido da tabela no MySQL, via camada DAO.
     */
    public function delete(int $id)
    {
        include 'DAO/Categoria_produtoDAO.php'; // Incluíndo o arquivo DAO

        $dao = new Categoria_produtoDAO();

        $dao->delete($id);
    }

}