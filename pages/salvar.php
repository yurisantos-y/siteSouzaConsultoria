<?php
session_start(); // Certifique-se de iniciar a sessão se ainda não estiver iniciada

// Conexão com o banco de dados (substitua pelas suas configurações)
include 'config.php';

// Obtém a frase do CKEditor do campo "areaTexto"
$frase = $_POST['areaTexto'];

// Obtém o nome do autor do campo "autor"
$autor = $_POST['autor'];

// Remover as tags HTML
$frase = strip_tags($frase);
$autor = strip_tags($autor);

// Preservar os caracteres especiais convertidos em entidades HTML
$frase = htmlspecialchars($frase);
$autor = htmlspecialchars($autor);

// Salvar a frase no banco de dados ou realizar outras operações necessárias

// Conecta ao banco de dados
$conn = new mysqli(HOST, USER, PASS, BASE);

// Verifica se houve um erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Limpa a frase e o autor para evitar problemas com caracteres especiais
$frase = $conn->real_escape_string($frase);
$autor = $conn->real_escape_string($autor);

// Verifica se o autor já existe na tabela autores
$sqlAutor = "SELECT id FROM autores WHERE nome = '$autor'";
$resultAutor = $conn->query($sqlAutor);

if ($resultAutor->num_rows > 0) {
    $rowAutor = $resultAutor->fetch_assoc();
    $autorId = $rowAutor["id"];
} else {
    // Se o autor não existir, insere o autor na tabela autores e obtém o ID
    $sqlInserirAutor = "INSERT INTO autores (nome) VALUES ('$autor')";
    if ($conn->query($sqlInserirAutor) === TRUE) {
        $autorId = $conn->insert_id;
    } else {
        die("Erro ao inserir o autor: " . $conn->error);
    }
}

// Insere a nova frase na tabela "frases" com o autor_id correto
$sql = "INSERT INTO frases (usuario_id, frase, autor_id) VALUES (1, '$frase', $autorId)";

$response = [];

if ($conn->query($sql) === TRUE) {
    $response = array(
        "success" => true,
        "message" => "Frase salva com sucesso!",
        "popup" => true
    );
    $_SESSION["popup_message"] = "Frase salva com sucesso!";
    $_SESSION["popup_status"] = "success";
} else {
    $response = array(
        "success" => false,
        "message" => "Erro ao salvar a frase: " . $conn->error,
        "popup" => true
    );
    $_SESSION["popup_message"] = "Erro ao salvar a frase: " . $conn->error;
    $_SESSION["popup_status"] = "error";
}

// Retorna o JSON como resposta
header('Content-Type: application/json');
echo json_encode($response);

// Fecha a conexão com o banco de dados
$conn->close();
?>
