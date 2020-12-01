<?php
//Conectando-se ao banco de dados por meio da variavél $conn
$host = "localhost";
$user = "root";
$pass = "";
$database = "projeto";

$conn = mysqli_connect($host, $user, $pass, $database);

//Validação da conexão com o banco de dados
if($conn->connect_errno)
    echo "Falha na conexão";

?>