<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionario</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <fieldset>
		
        <legend>Cadastro de Funcionario</legend>
		
		<form method="post" action="/funcionario/save">
		
			<input type="hidden" value="<?= $model->id ?>" name="id" />
			
            <label for="nome">Nome:</label>
            <input id="nome" name="nome" value="<?= $model->nome ?>" type="text" />

            <label for="rg">RG:</label>
            <input id="rg" name="rg" value="<?= $model->rg ?>" type="text" />

            <label for="cpf">CPF:</label>
            <input id="cpf" name="cpf" value="<?= $model->cpf ?>" type="number" />

            <label for="data_nascimento">Data Nascimento:</label>
            <input id="data_nascimento" name="data_nascimento" value="<?= $model->data_nascimento ?>" type="date" />

            <label for="email">E-mail:</label>
            <input id="email" name="email" value="<?= $model->email ?>" type="email" />

            <label for="telefone">Telefone:</label>
            <input id="telefone" name="telefone" value="<?= $model->telefone ?>" type="numer" />

            <label for="endereco">Endereço:</label>
            <input id="endereco" name="endereco" value="<?= $model->endereco ?>" type="text" />

            <button type="submit">Salvar</button>
		</form>
    </fieldset>    
</body>
</html>