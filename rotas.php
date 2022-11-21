<?php

use App\Controller\PessoaController;
use App\Controller\ProdutoController;
use App\Controller\FuncionarioController;
use App\Controller\Categoria_produtoController;
use App\Controller\LoginController;

// Para saber mais sobre a função parse_url: https://www.php.net/manual/pt_BR/function.parse-url.php
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Para saber mais estrutura switch, leia: https://www.php.net/manual/pt_BR/control-structures.switch.php
switch ($url) 
{
    case '/login':
        LoginController::index();
    break;

    case '/login/auth':
        LoginController::auth();
    break;

    case '/logout':
        LoginController::logout();
    break;




    case '/':
        echo "página inicial";
        break;


    # Categoria_produto
    case '/categoria_produto':
        // Para saber mais sobre o Operador de Resolução de Escopo (::), 
        // leia: https://www.php.net/manual/pt_BR/language.oop5.paamayim-nekudotayim.php
        Categoria_produtoController::index();
        break;
    
    case '/categoria_produto/form':
        Categoria_produtoController::form();
        break;
    
    case '/categoria_produto/form/save':
        Categoria_produtoController::save();
        break;
    
    case '/categoria_produto/delete':
        Categoria_produtoController::delete();
        break;

    # Funcionario
    case '/funcionario':
        FuncionarioController::index();
        break;

    case '/funcionario/form':
        FuncionarioController::form();
        break;

    case '/funcionario/form/save':
        FuncionarioController::save();
        break;

    case '/funcionario/delete':
        FuncionarioController::delete();
        break;




    # Pessoa
    case '/pessoa':
        PessoaController::index();
        break;

    case '/pessoa/form':
        PessoaController::form();
        break;

    case '/pessoa/form/save':
        PessoaController::save();
        break;

    case '/pessoa/delete':
        PessoaController::delete();
        break;

    # Produto
    case '/produto':
        ProdutoController::index();
        break;

    case '/produto/form':
        ProdutoController::form();
        break;

    case '/produto/form/save':
        ProdutoController::save();
        break;

    case '/produto/delete':
        ProdutoController::delete();
        break;



    /*
    default:
        echo "Erro 404";
        break;
    */
}