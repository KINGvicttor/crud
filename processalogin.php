<?php
//Conexão com o banco de dados
require ("conexao.php");

$username = $_POST['username'];
$password = $_POST['password'];
$passcrip = md5($password);

$sql = mysqli_query($conn, "SELECT * FROM crudlogin WHERE usuario = '".$_POST['username']."'");
$sql1 = mysqli_query($conn, "SELECT * FROM crudlogin WHERE senha = '$passcrip'");

    if(mysqli_num_rows($sql) and ($sql1) > 0){
        echo "<script>alert('Bem vindo!');window.location.href='dash.php';</script>";   
    }
    else{
        echo "<script>alert('Login ou Senha inválidos');window.location.href='index.php';</script>";
    }
?>