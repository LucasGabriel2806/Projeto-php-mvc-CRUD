<?php

namespace App\Model;

use App\DAO\LoginDAO;


class LoginModel extends Model
{
    public $id, $nome, $usuario, $senha, $rows;


    public function autenticar()
    {
        $dao = new LoginDAO();

        $dados_usuario_logado = $dao->selectByEmailANDSenha($this->usuario, $this->senha);

        if(is_object($dados_usuario_logado))
            return $dados_usuario_logado;
        else
            null;
    }

    public function selectById(int $id)
    {

        $dao = new LoginDAO();

        $obj = $dao->selectByEmailANDSenha($this->usuario, $this->senha); // Obtendo um model preenchido da camada DAO

        // Para saber mais operador ternário, leia: https://pt.stackoverflow.com/questions/56812/uso-de-e-em-php
        return ($obj) ? $obj : new PessoaModel(); // Operador Ternário

        /*if($obj)
        {
            return  $obj;
        } else {
            return new PessoaModel();
        }*/
    }


    public function save(){
        $dao = new LoginDAO();

        $dao->insert($this);
    }

    public function delete(int $id)
    {
        $dao = new LoginDAO();

        $dao->delete($id);
    }

    public function getAllRows()
    {        
        // Instância do objeto e conexão no banco de dados via construtor
        $dao = new LoginDAO();

        // Abastecimento da propriedade $rows com as "linhas" vindas do MySQL
        // via camada DAO.
        $this->rows = $dao->select();
    }

}