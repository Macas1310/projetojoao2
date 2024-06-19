<?php


if (isset($_GET["id"])){
    $cliente_id = $_GET["id"];


  // conexao com o banco de dados
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db_name = "bd_cadastro";

  $conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error){
  die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$sql = "DELET FROM clientes WHERE ID = $cliente_id";




// header = redimenciona para a pagina cliente php
if ($conn->query($sql) === TRUE) {
    header("Location: clientes.php?excluido=true");
    exit;
}else{
    echo "Erro ao excluir o cliente " . $conn->error;
}

$conn->close();

} else{
    echo "Cliente não especificado para a exclusão.";
}




?>