<?php
session_start();
require 'settings/conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];
$result = mysqli_query($conexao, "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha' LIMIT 1") OR die(erro);

if (mysqli_num_rows($result) > 0) {
	$row  = $result->fetch_assoc();
	$_SESSION['id'] = $row['id'];
	$_SESSION['username'] = $row["username"];
	$_SESSION['online'] = $row['ativo'];
	$_SESSION['email'] = $email;
	$_SESSION['senha'] = $senha;

	$sql = "UPDATE usuario SET ativo = 1 WHERE id = ?";

    $sqlprep = $conexao->prepare($sql);
    $sqlprep->bind_param("i", $_SESSION["id"]);
    $sqlprep->execute();

    header('Location:index.php');
}else{
	   unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: Login.php?login=erro');
}