<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
	</head>

	<body>
		<h2><a href="Cadastro.php">Novo Usuario</a></h2>
		<h1>Login</h1>
		<form action="ValidaLogin.php" method="post">
			<label>E-mail</label>
			<input type="email" name="email">
			<label>Senha</label>
			<input type="password" name="senha">
			<button type="submit">Entrar</button>	
		</form>

	</body>

</html>