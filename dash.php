<?php 
require ("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dash.css">
    <title>Página inicial</title>
</head>
<body>
    <header>
        <div class="header">  
          <div class="info"> 
            <a href="index.php"><button type="button" name="btn-logout" class="logout"><img src="img/logout.png" title="Sair"></button></a>
            <p><b>Bem vindo</b></p>       
          </div>
        </div> 
    </header>

        <div class="card-principal">
           <div class="card-info">
<!-- Exibir número total de registros -->
                <?php
                    $sql = mysqli_query($conn, "SELECT * FROM registro WHERE id");
                    $registros = mysqli_num_rows($sql)
                ?>
                <p><?php echo "Atualmente há: $registros registros." ?></p>
           </div>
           
           <div class="card1">
                <p>Adicionar novo Cadastro.</p>
                <a href="cadastro.php"><button type="button" class="add-btn"><img src="img/big-add.png" title="Adicionar cadastro."></button></a> 
           </div>
            
            <div class="card2">
                <p>Ir para Tabela de Cadastros.</p>
                <a href="crud.php?pagina=1"><button type="button" class="table-btn"><img src="img/table.png" title="Acessar cadastros."></button></a> 
            </div>
        </div>

    <footer>
        <div class="footer">
          <div class="footer2"></div> 
        </div>
    </footer>
</body>
</html>