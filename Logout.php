<?php

require_once("settings/conexao.php");
session_start();

$sql = "UPDATE usuario SET ativo = 0 WHERE id = ?";
$sqlprep = $conexao->prepare($sql);
$sqlprep->bind_param("i", $_SESSION["id"]);
$sqlprep->execute();

//Destrói a sessão inciada
session_destroy();

header('Location: Login.php');
?>