<?php 
//Conexão com banco de dados
require ("conexao.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de cadastro</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>
    <!-- Formulário de Cadastro -->
    <form class="card" method="POST" action="processacadastro.php">
        <img src="img/icon_index.png">
            <h1>Cadastro de Usuários</h1> 
                <input type="text" name="name" placeholder="Nome" autocomplete="off" >       
                <input type="text" name="name2" placeholder="Sobrenome" autocomplete="off" >                
                <input type="text" name="email" placeholder="Email" autocomplete="off" > 
                <input type="text" name="username" placeholder="Usuário" autocomplete="off" >
                <input type="password" name="password" placeholder="Senha" autocomplete="off" >
                <input type="submit" value="Cadastrar">                    
            <!--Redirecionar para Lista de Clientes-->
            <p>Retornar para Lista de Cadastros</p>
            <a href="crud.php?pagina=1"><img src="img/back-button.png"></a> 
    </form>   
</body>
</html>