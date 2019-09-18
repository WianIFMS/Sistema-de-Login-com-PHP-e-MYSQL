<?php
session_start();
require_once 'settings/conexao.php';

$id_de = $_POST['id_de'];
$id_para = $_SESSION['id'];

$sql = "INSERT INTO amigos(id_de,id_para) VALUES(?,?)";
$sqlprep = $conexao->prepare($sql);
$sqlprep->bind_param("ii",$id_de,$id_para);
$sqlprep->execute();

header("location: index.php");
