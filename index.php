<?php 
//Iniciando sessão
session_start();
//Conexão com Banco de dados
require_once ("conexao.php");

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <!--Formulário para fazer login-->
    <form class="card" method="POST" action="processalogin.php">
        <img src="img/icon_index.png">
            <h1>Login</h1>
                <input type="text" name="username" placeholder="Usuário" autocomplete="off" require>
                <input type="password" name="password" placeholder="Senha" autocomplete="off" require>
                <input type="submit" value="Login">  
    </form>   
</body>
</html>