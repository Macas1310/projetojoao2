<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_cadastro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Erro na conexao com o banco de dados: " . $conn->connect_error);
}

$termo = $_GET["termo"];

$sql = "SELECT * FROM clientes WHERE nome LIKE '%$termo%' OR email LIKE '%$termo%' OR telefone LIKE '%$termo%' OR descricao LIKE '%$termo%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
    echo "<h2>Resultados da Pesquisas</h2>";
    echo "<table border='1'";
    echo "<tr><th>Nome</th><th>Email</th><th>Telefone</th><th>Descrição</th></tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr><td>".$row["nome"]."<tr><td>".$row["email"]."<tr><td>".$row["telefone"]."<tr><td>".$row["descricao"]."</td></tr>";
    }
    echo "</table>";
}else {
    echo "Nenhum resultado encontrado.";
}

$conn->close();













?>