<?php 
require ("conexao.php");

$id = $_POST['id'];
$name = $_POST['name'];
$name2 = $_POST['name2'];
$email = $_POST['email'];
$username = $_POST['username'];

//update dos dados cadastrados
$sql ="UPDATE registro SET nome = '$name' , sobrenome = '$name2', email= '$email', usuario = '$username'".
 "WHERE id = '$id'";
$sqlresult = mysqli_query($conn, $sql);

//verificando resultado do update
    if($sqlresult){
        echo "<script>alert('Editado com sucesso.');window.location.href='crud.php?pagina=1';</script>";
    }
    else{
        echo "<script>alert('Falha ao editar.');window.location.href='editar.php?pagina=1';</script>";   
}//Fecha resultado do update
?>