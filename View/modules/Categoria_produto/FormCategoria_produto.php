<!DOCTYPE html>
<html lang="pt-br">
<head> <!-- ! + ENTER Gera estrutura basica do html -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro da Categoria de produtos</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <fieldset>
        <legend>Cadastro da Categoria de produtos</legend>
			
		<form method="post" action="/categoria_produto/save" >
			
			<input type="hidden" value="<?= $model->id ?>" name="id" />
			
            <label for="nome">Nome:</label>
            <input id="nome" name="nome" value="<?= $model->nome ?>" type="text" />

            <label for="descricao">descricao:</label>
            <input id="descricao" name="descricao" value="<?= $model->descricao ?>" type="text" />

            <button type="submit">Salvar</button>
		</form>
    </fieldset>    
</body>
</html>
















