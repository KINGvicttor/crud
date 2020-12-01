<?php 
//Iniciar sessão 
session_start();
//conexão banco de dados
require ("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de cadastro</title>
    <link rel="stylesheet" href="css/editar.css">
</head>
<body>
    <form class="card" method="POST" action="processaeditar.php">
        <img src="img/icon_index.png">
            <h1>Editar Cadastro</h1> 

            <?php
            //Pegar o paramêtro ID pela url para poder fazer o update no registro
            
            $id = $_GET['id'];

            $sql = "SELECT * FROM registro WHERE id = '$id'";
            $sqlresult = mysqli_query($conn, $sql);

            $sqledit = mysqli_fetch_assoc($sqlresult);
            mysqli_close($conn)
            
            ?>
                <input type="hidden" name="id" value="<?php echo $sqledit['id'];?>" autocomplete="off">   
                <input type="text" name="name" value="<?php echo $sqledit['nome'];?>" autocomplete="off">       
                <input type="text" name="name2" value="<?php echo $sqledit['sobrenome'];?>" autocomplete="off">                
                <input type="text" name="email" value="<?php echo $sqledit['email'];?>" autocomplete="off">
                <input type="text" name="username" value="<?php echo $sqledit['usuario'];?>" autocomplete="off">
                <input type="submit" value="Editar">                        
            <p>Retornar para Lista de Cadastros</p>
            <a href="crud.php?pagina=1"><img src="img/back-button.png"></a> 
    </form>   
</body>
</html>