<?php
// No arquivo "conexao.php"

// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calendario";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>