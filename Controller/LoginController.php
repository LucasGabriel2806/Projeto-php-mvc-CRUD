<?php

namespace App\Controller;

use App\Model\LoginModel;

class LoginController extends Controller
{
    
    public static function index()
    {
        parent::render('Login/login');
    }

    public static function area_restrita()
    {
        $model = new LoginModel();
        
        $model->getAllRows();
        
        parent::render('Login/area_restrita', $model);
    }

    public static function auth()
    {
        $model = new LoginModel();

        $model->usuario = $_POST['usuario'];
        $model->senha = $_POST['senha'];

        $usuario_logado = $model->autenticar();

        if ($usuario_logado !== null){

            $_SESSION['usuario_logado'] = $usuario_logado;

            header("Location: /area_restrita");

         } else
             header("Location: /login?erro=true");
    }

    /**
     * Devolve uma View contendo um formulário para o usuário.
     */
    public static function form()
    {
        parent::isAuthenticated();

        $model = new LoginModel();

        if(isset($_GET['id'])) // Verificando se existe uma variável $_GET
			// se existir ele vai no banco de dados buscar o acesso a ela
            $model = $model->selectById( (int) $_GET['id']); // Typecast e obtendo o model preenchido vindo da DAO.
			// Typecast: eu to pegando o que ta vindo da barra do navegador: $_GET['id'] e estou convertendo pra (int) 
            // Para saber mais sobre Typecast, leia: https://tiago.blog.br/type-cast-ou-conversao-de-tipos-do-php-isso-pode-te-ajudar-muito/

            parent::render('Login/Formlogin', $model);
    }

    public static function logout()
    {   
        unset($_SESSION['usuario_logado']);

        parent::isAuthenticated();
    }   

    public static function save(){
        $model  = new LoginModel();
        
        $model->usuario = $_POST['usuario'];
        $model->senha = $_POST['senha'];

        $model->save();

        header("Location: /login");
    }

    public static function delete()
    {
        parent::isAuthenticated();

        $model = new LoginModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

        header("Location: /login"); // redirecionando o usuário(localização) para outra rota.
    }
}