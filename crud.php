<?php 

//iniciar conexão
require ("conexao.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/crud.css">
    <title>Tabela de Registros</title>   

</head>
<body>
<!-- Exibir o nome do usuário que fez login -->      
    <?php 
    ?>
<!-- Cabeçalho da página -->    
    <header>
        <div class="header">  
          <div class="info"> 
            <a href="dash.php"><button type="button" class="home"><img src="img/home.png" title="Página inicial"></button></a>  
            <a href="index.php"><button type="button" class="logout"><img src="img/logout.png" title="Sair"></button></a>
            <p><b>Bem vindo</b></p>
          </div>
        </div>
    </header>
<!-- tabela -->
    <table class="table">      
        <caption class="title">dados cadastrados</caption>
            <thead>
                <th class="left">ID:</th>
                <th >Nome:</th>
                <th>Sobrenome:</th>
                <th>Email:</th>
                <th style="border-right: 2px solid black;">Usuário:</th>
                <th class="right" colspan="2"><a href="cadastro.php" class="add"><button style="background: none; border: none; cursor: pointer;" type="submit" name="add"><img src="img/add.png" title="Adicionar novo Cadastro."></button></a></th>
            </thead>
            <tbody>
<!-- Filtrar quantidade de cadastros exibidos por páginas -->                
                <?php
                    $page_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
                    $page = (!empty($page_atual)) ? $page_atual : 1; 
                    $qnt_page = 5;
                    $inicio = ($qnt_page * $page) - $qnt_page;
//looping para que os dados sejam obtidos do banco de dados e inseridos em crud.php por meio da variavel $sqlcrud
                    $sql = mysqli_query($conn, "SELECT * FROM registro LIMIT $inicio, $qnt_page");
                    while ($sqlcrud = mysqli_fetch_array($sql)):                   
                ?>
            <tr> 
                <td class="td-left"> <?php echo $sqlcrud['id']; ?></td>
                <td > <?php echo $sqlcrud['nome']; ?></td>
                <td><?php echo $sqlcrud['sobrenome']; ?></td>
                <td><?php echo $sqlcrud['email']; ?></td>
                <td><?php echo $sqlcrud['usuario']; ?></td> 
                <td class="td-edit"><a href="editar.php?id=<?php echo $sqlcrud['id']; ?>" ><button style="background: none; border: none; cursor: pointer; margin: auto;" type="submit"><img src="img/edit.png" title="Editar"></button></a>  </td>
                <td class="td-right"><a onclick="return confirm('Deseja realmente deletar esse Registro?')" href="" class="remove" name="delete-btn"><form action="delete.php" method="POST"><input type="hidden" name="id" value="<?php echo $sqlcrud['id']; ?>"><button style="background: none; border: none; cursor: pointer; margin: auto;" type="submit" name="delete"><img src="img/remove.png" title="Deletar"></button></form></a></td>
            </tr>
<!-- Fecha bloco do looping -->                  
                <?php endwhile; ?>
            </tbody>           
            <tfoot> 
<!-- Configurar páginação -->                
                <?php 
                    $result_page = mysqli_query($conn, "SELECT COUNT(id) AS num_result FROM registro");
                    $sqlpage = mysqli_fetch_assoc($result_page);
                //----------------
                    $quantidade_page = ceil($sqlpage['num_result'] / $qnt_page);    
                //---------------
                    $max_links = 1;
                ?>
<!-- Estrutura de páginação da tabela -->
              <td class="foot" colspan=7>
                <?php
                    for ($page_ant = $page - $max_links; $page_ant <= $page - 1; $page_ant ++){ 
                        if($page_ant >= 1){ echo "<a href='crud.php?pagina=$page_ant' class='pages'><img src='img/back-button.png' title='Página anterior'></a>";}
                        } 
                    ?>      
                <?php
                    for ($page_ant = $page - $max_links; $page_ant <= $page - 1; $page_ant ++){
                        if($page_ant >= 1){ echo "<a href='crud.php?pagina=$page_ant' class='pages'>$page_ant</a>";}
                    } 
                ?> 

                <a href="" class="pages"><?php echo $page_atual; ?></a>

                <?php
                    for($page_next = $page + $max_links; $page_next <= $page + 1; $page_next ++){
                        if($page_next <= $quantidade_page){echo "<a href='crud.php?pagina=$page_next' class='pages'>$page_next</a>";}
                    }
                ?>
                <?php
                    for ($page_next = $page + $max_links; $page_next <= $page + 1; $page_next ++){ 
                        if($page_next <= $quantidade_page){ echo "<a href='crud.php?pagina=$page_next' class='pages'><img src='img/next-button.png' title='Próxima página'></a>";} 
                    }    
                ?>
              </td>                           
            </tfoot>
    </table>
<!-- Rodapé da página -->
    <footer>
        <div class="footer">
          <div class="info2"></div> 
        </div>
    </footer>     
</html>