<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoa</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <fieldset>

        <legend>Cadastro de Usuarios</legend>

		<form method="post" action="/login/form/save">

			<input type="hidden" value="<?= $model->id ?>" name="id" />

            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario">

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha">

            <button type="submit">Salvar</button>
		</form>
    </fieldset>    
</body>
</html>