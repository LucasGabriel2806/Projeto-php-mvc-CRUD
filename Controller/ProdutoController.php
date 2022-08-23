<?php

namespace App\Controller;

use App\Model\ProdutoModel;


class ProdutoController
{
    public static function index() 
    {

        // Para saber mais sobre include , leia: https://www.php.net/manual/pt_BR/function.include.php
		// index vai ser respondavel por devolver a listagem dos dados do meu usuario(devolve a view de listagem)
        include 'Model/ProdutoModel.php'; // inclusão do arquivo model.
        
        $model = new ProdutoModel(); // Instância da Model
        $model->getAllRows(); // Obtendo todos os registros, abastecendo a propriedade $rows da model.

        include 'View/modules/Produto/ProdutoListar.php';
    }

    public static function form()
    {

        include 'Model/ProdutoModel.php'; // inclusão do arquivo model.
        $model = new ProdutoModel();

        if(isset($_GET['id'])) // Verificando se existe uma variável $_GET
			// se existir ele vai no banco de dados buscar o acesso a ela
            $model = $model->getById( (int) $_GET['id']); // Typecast e obtendo o model preenchido vindo da DAO.
			// Typecast: eu to pegando o que ta vindo da barra do navegador: $_GET['id'] e estou convertendo pra (int) 
            // Para saber mais sobre Typecast, leia: https://tiago.blog.br/type-cast-ou-conversao-de-tipos-do-php-isso-pode-te-ajudar-muito/

        include 'View/modules/Produto/ProdutoCadastro.php';
    }

    public static function save()
    {
        include 'Model/ProdutoModel.php';


        $model = new ProdutoModel();
        $model->id =  $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->preco = $_POST['preco'];
        $model->descricao = $_POST['descricao'];
        
        $model->save();

        header("Location: /produto");
    }


    /**
     * Método para tratar a rota delete. 
     */
    public static function delete()
    {
        include 'Model/ProdutoModel.php'; // inclusão do arquivo model.

        $model = new ProdutoModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

        header("Location: /produto"); // redirecionando o usuário(localização) para outra rota.
    }


}