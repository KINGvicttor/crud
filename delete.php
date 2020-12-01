<?php 
require ("conexao.php");

$id = $_POST['id'];
$sql = mysqli_query($conn, "DELETE FROM registro WHERE id = '$id'");

    if($sql){
        echo "<script>alert('Registro deletado com sucesso.');window.location.href='crud.php?pagina=1';</script>";
        return die;
    }
    else{
        echo "<script>alert('Não foi possivel deletar o Registro.');window.location.href='crud.php';</script>";  
        return die; 
    }//Fecha resultado do deletar 
?>