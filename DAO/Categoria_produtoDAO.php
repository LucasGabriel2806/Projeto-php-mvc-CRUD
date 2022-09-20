<?php

namespace App\DAO;

use App\Model\Categoria_produtoModel;
use \PDO;

class Categoria_produtoDAO extends DAO
{
    
    
    public function __construct() 
    {
        parent::__construct();
    
    }


    
    public function insert(Categoria_produtoModel $model) 
    {
        
        $sql = "INSERT INTO categoria_produto 
                (nome, descricao) 
                VALUES (?, ?)";
        
        
        $stmt = $this->conexao->prepare($sql);

        
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->descricao);
        
        
        $stmt->execute();  
            
    }


    /**
     * Método que recebe o Model preenchido e atualiza no banco de dados.
     * Note que neste model é necessário ter a propriedade id preenchida.
     */
    public function update(Categoria_produtoModel $model)
    {
        $sql = "UPDATE categoria_produto SET nome=?, descricao=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->id);
        $stmt->execute();
    }


    public function select()
    {
        $sql = "SELECT * FROM categoria_produto ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


    public function selectById(int $id)
    {

        $sql = "SELECT * FROM categoria_produto WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("Categoria_ProdutoModel"); 
    }


    public function delete(int $id)// id é inteiro.
    {
        $sql = "DELETE FROM categoria_produto WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }


}