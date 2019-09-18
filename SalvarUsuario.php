<?php
require_once 'settings/conexao.php';

$username = $_POST['username'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "INSERT INTO usuario (username,email,senha) VALUES(?,?,?)";
$sqlprep = $conexao->prepare($sql);
$sqlprep->bind_param("sss",$username,$email,$senha);

 	$sql2 = "SELECT * FROM usuario WHERE email = '$email'";
 	$insert = mysqli_query($conexao, $sql2) or die("erro");
// header("location: Login.php");
  $result = mysqli_query($conexao, "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha' LIMIT 1") OR die(erro);
        
        if (mysqli_num_rows($insert) == 0) {

            $sqlprep->execute();
           // header("Location: FormLogin.php");
             echo "Cadastrado com  sucesso!";
             echo "<a href='Login.php'>Login</a>";
        } else {
            echo "já existe uma conta com esse email, fassa login ou cadastre outro!";
        }