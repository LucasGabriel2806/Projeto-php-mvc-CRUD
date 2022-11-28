<?php

namespace App\DAO;

use App\Model\LoginModel;
use \PDO;

class LoginDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectByEmailANDSenha($usuario, $senha)
    {
        $sql = "SELECT * FROM usuarios WHERE usuario = ? AND senha = sha1(?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $usuario);
        $stmt->bindValue(2, $senha);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\LoginModel");
        
    }

    public function insert(LoginModel $model){
        $sql = "insert into usuarios (nome, usuario, senha) values('teste', ?, sha1(?))";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->usuario);
        $stmt->bindValue(2, $model->senha);
        $stmt->execute();

        header("Location: /area_restrita");
    }

    public function update(LoginModel $model)
    {
        $sql = "UPDATE usuarios SET nome=?, usuario=?, senha=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->usuario);
        $stmt->bindValue(3, $model->senha);
        $stmt->bindValue(4, $model->id);
        $stmt->execute();

        header("Location: /area_restrita");
    }

    public function select()
    {
        $sql = "SELECT * FROM usuarios ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        // Retorna um array com as linhas retornadas da consulta. Observe que
        // o array é um array de objetos. Os objetos são do tipo stdClass e 
        // foram criados automaticamente pelo método fetchAll do PDO.
        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }

    public function delete(int $id)// id é inteiro.
    {
        $sql = "DELETE FROM usuarios WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        header("Location: /area_restrita");
    }





}