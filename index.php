<?php
session_start();
//Essa é a nossa pagina protegida, só conseguimos acessa-la se criarmos a var de sessao


// Verificando de o usuario está logado
if(!isset($_SESSION["usuario_logado"]))
    header("Location: login.php");


// Para fazer o logout (sair)
if(isset($_GET["sair"])) {
    // Quando existir na barra de endereço um parametro get chamado sair entro nesse if
    // vou destruir minha var de sessão com a unset
    unset($_SESSION["usuario_logado"]);
    header("Location: login.php");
}

try {

    include 'DAO/MySQL.php';

    $mysql = new MySQL();

    // prepare statement, prepara o codigo sql, pegando ele e substituindo os ?
    $stmt = $mysql->prepare("SELECT nome FROM usuarios WHERE id=:marcador_id");
    // executa a consulta
    $stmt->execute(array('marcador_id' => $_SESSION['usuario_logado']));

    // fetchObject: se a consulta retornar algo, ele pega o resultado dela e vai 
    // organizar em um objeto generico do php e vai armazenar no dados usuario 
    $dados_do_usuario = $stmt->fetchObject();


} catch(Exception $e){
    //as exceções podem acontecer, temos que trata-las
    echo $e->getMessage();

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

<h1>Bem vindo <strong> <?= $dados_do_usuario->nome ?>, </strong> à ÁREA RESTRITA</h1>

<a href="index.php?sair=true">Sair</a>

