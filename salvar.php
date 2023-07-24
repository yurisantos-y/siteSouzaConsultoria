<?php
// Conexão com o banco de dados (substitua pelas suas configurações)
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'sisconsultoria');

// Obtém a frase do CKEditor do campo "frase"
$frase = $_POST['areaTexto'];

// Remover as tags HTML
$frase = strip_tags($frase);

// Preservar os caracteres especiais convertidos em entidades HTML
$frase = htmlspecialchars($frase);

// Salvar a frase no banco de dados ou realizar outras operações necessárias

// Conecta ao banco de dados
$conn = new mysqli(HOST, USER, PASS, BASE);

// Verifica se houve um erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Limpa a frase para evitar problemas com caracteres especiais
$frase = $conn->real_escape_string($frase);

// Insere a nova frase na tabela "frases" associada ao usuário ID 1
$sql = "INSERT INTO frases (usuario_id, frase) VALUES (1, '$frase')";

// No lugar do trecho que exibe a mensagem, utilize o seguinte código:


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