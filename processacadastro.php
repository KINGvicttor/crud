<?php
use function PHPSTORM_META\type;
//Conexão com o banco de dados
require ("conexao.php");

$name = $_POST['name'];
$name2 = $_POST['name2'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
//Criptografando a senha
$passcrip = md5($password);

//Verificando se já existe apenas o usuário no banco de dados
$sql = mysqli_query($conn, "SELECT * FROM registro WHERE usuario = '".$_POST['username']."' ");

    if(mysqli_num_rows($sql) >= 1){
        echo "<script>alert('Usuário já esta sendo utilizado.');window.location.href='cadastro.php?pagina=1';</script>";
        return die;
    }
    else{
//Verificando se já existe apenas o email no banco de dados
$sql = mysqli_query($conn, "SELECT * FROM registro WHERE email = '".$_POST['email']."' ");
    
    if(mysqli_num_rows($sql) >= 1){
        echo "<script>alert('Email já está sendo utilizado.');window.location.href='cadastro.php';</script>";
        return die;
    }
    else{
//Inserindo o cadastro no banco de dados
$sql = mysqli_query($conn, "INSERT INTO registro (nome, sobrenome, email, usuario, senha, dia) VALUE ('$name', '$name2', '$email', '$username', '$passcrip', NOW() )");   

//Verificando resultado do insert
    if($sql){
        echo "<script>alert('Cadastrado com sucesso!');window.location.href='crud.php?pagina=1';</script>";
    }
    else{
        echo "<script>alert('Não foi possível realizar o cadastro.');window.location.href='cadastro.php';</script>";    
}//fecha validação do insert 
}//fecha validação de email duplicados    
}//fecha validação de usuarios duplicados
?>