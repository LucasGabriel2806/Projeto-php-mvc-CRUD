<?php

namespace App\Controller;

use App\Model\Categoria_produtoModel;

class Categoria_produtoController extends Controller
{
    
    public static function index() 
    {
        
        $model = new Categoria_produtoModel(); // Instância da Model
        $model->getAllRows(); // Obtendo todos os registros, abastecendo a propriedade $rows da model.

        /**
         * O método render foi idealizado para encapsular o include de views de como que
         * se o endereço de uma view por passado de forma equivocada nós possamos tratar
         * o arquivo não encontrado e mostrar uma mensagem mais amigável ao usuário.
         * Veja que o método recebe dois parâmetros: 1) caminho da view dentro da pasta modules
         * e 2) o model da view da entidade em questão, este segundo arguimento é opcional.
         */
        parent::render('Categoria_produto/ListaCategoria_produto', $model);
    }

   
    public static function form()
    {

        $model = new Categoria_produtoModel();

        if(isset($_GET['id'])) // Verificando se existe uma variável $_GET
			// se existir ele vai no banco de dados buscar o acesso a ela
            $model = $model->getById( (int) $_GET['id']); // Typecast e obtendo o model preenchido vindo da DAO.
			// Typecast: eu to pegando o que ta vindo da barra do navegador: $_GET['id'] e estou convertendo pra (int) 
            // Para saber mais sobre Typecast, leia: https://tiago.blog.br/type-cast-ou-conversao-de-tipos-do-php-isso-pode-te-ajudar-muito/

        parent::render('Categoria_produto/FormCategoria_produto', $model);
        
    }

    
    public static function save() {
        
        $model = new Categoria_produtoModel();

        $model->id =  $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->descricao = $_POST['descricao'];

        $model->save();  

        header("Location: /categoria_produto"); 
    }


    /**
     * Método para tratar a rota delete. 
     */
    public static function delete()
    {

        $model = new Categoria_produtoModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

        header("Location: /categoria_produto"); // redirecionando o usuário(localização) para outra rota.
    }


}