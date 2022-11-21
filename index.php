<?php
session_start();

if(!isset($_SESSION["usuario_logado"]))
    header("Location: login.php");


if(isset($_GET["sair"])) {
    // Quando existir na barra de endereço um parametro get chamado sair entro nesse if
    // vou destruir minha var de sessão com a unset
    unset($_SESSION["usuario_logado"]);
    header("Location: login.php");
}


/**
 * Melhorias
 * 1) palavra chave final no método render da Controller
 * 2) Estender PDO na classe DAO
 * 3) Parametro levels no dirname
 */

include 'config.php';
include 'autoload.php';
include 'rotas.php';

?>

<h1>ÁREA RESTRITA</h1>

<a href="index.php?sair=true">Sair</a>

