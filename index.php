<?php
session_start();
require_once'settings/conexao.php';

if (!isset($_SESSION['email']) && !isset($_SESSION['senha'])) {
	header("location: Login.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Index</title>
	</head>

	<body>
		Usuario: <?php echo $_SESSION['username'];  ?>
		<a href="Logout.php">SAIR</a>
		<h1>Olá, estou na Index!</h1>
		<!-- inicio dos seguidores-->
	
	</body>

</html>