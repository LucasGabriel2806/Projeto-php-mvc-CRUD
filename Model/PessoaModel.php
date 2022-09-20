<?php

namespace App\Model;

use App\DAO\PessoaDAO;


class PessoaModel extends Model
{
    /**
     * Declaração das propriedades conforme campos da tabela no banco de dados.
     * Atributos(caracteristicas)
     */
    public $id, $nome, $rg, $cpf;
    public $data_nascimento, $email;
    public $telefone, $endereco;



    /**
     * Declaração do método save que chamará a DAO para gravar no banco de dados
     * o model preenchido.
     */
    public function save()
    {

        $dao = new PessoaDAO();

        // Se id for nulo, significa que trata-se de um novo registro
        // caso contrário, é um update poque a chave primária já existe.
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
        // Instância do objeto e conexão no banco de dados via construtor
        $dao = new PessoaDAO();

        // Abastecimento da propriedade $rows com as "linhas" vindas do MySQL
        // via camada DAO.
        $this->rows = $dao->select();
    }


    /**
     * Método que encapsula o acesso ao método selectById da camada DAO
     * O método recebe um parâmetro do tipo inteiro que é o id do registro
     * a ser recuperado do MySQL, via camada DAO.
     */
    public function getById(int $id)
    {

        $dao = new PessoaDAO();

        $obj = $dao->selectById($id); // Obtendo um model preenchido da camada DAO

        // Para saber mais operador ternário, leia: https://pt.stackoverflow.com/questions/56812/uso-de-e-em-php
        return ($obj) ? $obj : new PessoaModel(); // Operador Ternário

        /*if($obj)
        {
            return  $obj;
        } else {
            return new PessoaModel();
        }*/
    }

    /**
     * Método que encapsula o acesso a DAO do método delete.
     * O método recebe um parâmetro do tipo inteiro que é o id do registro
     * que será excluido da tabela no MySQL, via camada DAO.
     */
    public function delete(int $id)
    {
        $dao = new PessoaDAO();

        $dao->delete($id);
    }

}