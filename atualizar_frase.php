<?php
// Conectar-se ao banco de dados
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'sisprospere');

$conn = new mysqli(HOST, USER, PASS, BASE);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consultar o banco de dados e obter uma frase aleatória
$sql = "SELECT frase FROM frases ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);
$frase = "";
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $frase = $row["frase"];
}
$conn->close();

// Retorna a frase como resposta
echo $frase;
