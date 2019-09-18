<?php
session_start();
require_once 'settings/conexao.php';


$id_de = $_SESSION['id'];
$id_para = $_POST['id_para'];

var_dump($_POST);
var_dump($_SESSION);
$sql = "INSERT INTO solicitacao(id_de,id_para) VALUES(?,?)";
$sqlprep = $conexao->prepare($sql);
$sqlprep->bind_param("ii",$id_de,$id_para);
$sqlprep->execute();
header("location:index.php");
