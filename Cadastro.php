<!DOCTYPE html>
<html>
	<head>
		<title>Cadastro</title>
	</head>

	<body>
		<h1>Cadstro</h1>
	
		<form action="SalvarUsuario.php" method="post">
			<label>Nome</label>
			<input type="text" name="username">
			<label>E-mail</label>
			<input type="email" name="email">
			<label>Senha</label>
			<input type="password" name="senha">
			<button type="submit">Salvar</button>
		</form>
	</body>

</html>