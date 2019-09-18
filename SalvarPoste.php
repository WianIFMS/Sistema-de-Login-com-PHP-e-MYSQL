<?php
session_start();
require_once 'settings/conexao.php';

$id_usuario = $_SESSION['id'];
//$email = $_POST['email'];
$poste = $_POST['poste'];

$sql = "INSERT INTO publicacao(poste,id_usuario) VALUES(?,?)";
$sqlprep = $conexao->prepare($sql);
$sqlprep->bind_param("si",$poste,$id_usuario);
$sqlprep->execute();
header("location:index.php");

