<?php
// esse arquivo faz autentificação do usuario
session_start();
// sempre que formos usar a var super global session, chamamos sua função
// a ideia do login: temos paginas protegidas, e pro usuario acessar essa pagina, ele tem que passar por um processo de auntentificação

try {

    include 'DAO/MySQL.php';

    $mysql = new MySQL();

    $sql = "SELECT id, nome FROM usuarios WHERE usuario=? AND senha= sha1(?) ";

    // prepare statement, prepara o codigo sql, pegando ele e substituindo os ?
    $stmt = $mysql->prepare($sql);
    // bindValue substitue o ? do usuario=? AND senha=?]
    // por user e pass
    $stmt->bindValue(1, $_POST["usuario"]);
    $stmt->bindValue(2, $_POST["senha"]);

    // executa a consulta
    $stmt->execute();

    // fetchObject: se a consulta retornar algo, ele pega o resultado dela e vai 
    // organizar em um objeto generico do php e vai armazenar no dados usuario 
    $dados_do_usuario = $stmt->fetchObject();

    if($dados_do_usuario) {

        $_SESSION["usuario_logado"] = $dados_do_usuario->id;
        header("Location: index.php");

    } else
        header("Location: login.php?falhou=true");


    /*
    $usuario_certo = "lucas";
    $senha_certa = "123";


    // o que o usuario digitou em login.php, que esta vindo como post
    $usuario_digitado = $_POST["user"];
    $senha_digitada = $_POST["pass"];

    // verificando se os dados estao certos(autentificação) para startar a sessão
    if($usuario_digitado == $usuario_certo)
    {
        if($senha_digitada == $senha_certa)
        {
            // startando a sessao:
            $_SESSION["usuario_logado"] = $usuario_digitado;
            /* ela amarra a maquina do usuario, cria um arquivo de cookie na maquina do usuario, 
            e cria um arquivo com a mesma id no servidor, as duas ficam vinculadas por um certo tempo, 
            ate a sessão expirar
            * /
            header("Location: index.php");
        } else {
            // header define um cabeçalho no protocolo http
            header("Location: login.php?falhou=true");
        }
    } else {
        header("Location: login.php?falhou=true");
    }
    */

    

} catch(Exception $e){
    //as exceções podem acontecer, temos que trata-las
    echo $e->getMessage();

}
