<?php
// Conectar-se ao banco de dados
include 'config.php';

$conn = new mysqli(HOST, USER, PASS, BASE);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consultar o banco de dados e obter uma frase aleatória com autor
$sql = "SELECT frases.id, frases.frase, autores.nome AS autor 
        FROM frases
        LEFT JOIN autores ON frases.autor_id = autores.id
        ORDER BY RAND() LIMIT 1";

$result = $conn->query($sql);
$response = [];

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $frase = $row["frase"];
    $autor = $row["autor"];

    $response["frase"] = $frase;
    $response["autor"] = $autor;
} else {
    $response["frase"] = "Nenhuma frase encontrada.";
    $response["autor"] = "Autor desconhecido";
}

// Retorna a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
