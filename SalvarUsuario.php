<?php
require_once 'settings/conexao.php';
$username = $_POST['username'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "INSERT INTO usuario (username,email,senha) VALUES(?,?,?)";
$sqlprep = $conexao->prepare($sql);
$sqlprep->bind_param("sss",$username,$email,$senha);
$sqlprep->execute();