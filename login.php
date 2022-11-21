<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <div id="global">
        <header>
            <h1>login</h1>
        </header>
        <main>
            <!--login devem ser sempre realizados em post, pra nao aparecer a senha do usuario na barra de endereço-->
            <form method="post" action="autenticador.php">
                <label>Usuário:
                    <input name="user" type="text" />
                </label>

                <label>Senha:
                    <input name="pass" type="password" />
                </label>
                <button type="submit">Entrar</button>
            </form>
        </main>
        <footer>
        </footer>

    </div>
    
</body>
</html>
