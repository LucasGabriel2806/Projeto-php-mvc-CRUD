<?php

use App\Controller\
{
    PessoaController,
    ProdutoController,
    Categoria_produtoController,
    FuncionarioController
};


$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//echo $uri_parse;
//echo "<hr />";

include 'Controller/PessoaController.php';
include 'Controller/ProdutoController.php';
include 'Controller/Categoria_produtoController.php';
include 'Controller/FuncionarioController.php';




switch($uri_parse)
{
	
	
    # ROTAS PARA PESSOA
    case '/pessoa':
        PessoaController::index();
    break;

    case '/pessoa/form':
        PessoaController::form();
    break;

    case '/pessoa/save':
        PessoaController::save();
    break;
	
	case '/pessoa/delete':
        PessoaController::delete();
    break;



    # ROTAS PARA PRODUTO
    case '/produto':
        ProdutoController::index();
    break;

    case '/produto/form': 
        ProdutoController::form();
    break;

    case '/produto/save':
        ProdutoController::save();
    break;

	case '/produto/delete': 
        ProdutoController::delete();
    break;

    
        
    # ROTAS PARA CATEGORIA DE PRODUTOS
    case '/categoria_produto':
        Categoria_produtoController::index();
    break;

    case '/categoria_produto/form':
        Categoria_produtoController::form();
    break;

    case '/categoria_produto/save':
        Categoria_produtoController::save();
    break;

	case '/categoria_produto/delete':
        Categoria_produtoController::delete();
    break;


    
    # ROTAS PARA FUNCIONARIO
    case '/funcionario':
        FuncionarioController::index();
    break;

    case '/funcionario/form':
        FuncionarioController::form();
    break;

    case '/funcionario/save':
        FuncionarioController::save();
    break;

	case '/funcionario/delete':
        FuncionarioController::delete();
    break;

    default:
        echo "erro 404";
    break;
}