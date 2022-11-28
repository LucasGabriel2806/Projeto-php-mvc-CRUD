<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Usuarios</title>
</head>
<body>

    <h1>Bem vindo à ÁREA RESTRITA</h1>

    <table>
        <tr>
            <th></th>
            <th>Id</th>
            <th>Nome</th>
            <th>Usuario</th>
            <th>Senha</th>
        </tr>

        <?php foreach($model->rows as $item): ?>
        <tr>
            <td>
                <a href="/login/delete?id=<?= $item->id ?>">X</a>
            </td>

            <td><?= $item->id ?></td>

            <td>
                <a href="/login/form?id=<?= $item->id ?>"><?= $item->nome ?></a>
            </td>

            <td><?= $item->usuario ?></td>
            <td><?= $item->senha ?></td>
        </tr>
        <?php endforeach ?>

        
        <?php //if(count($model->rows) == 0): ?>
            <tr>
                <td colspan="5">Nenhum registro encontrado.</td>
            </tr>
        <?php //endif ?>

    </table>
    
    <a href="Login/login.php">Sair</a>


</body>
</html>