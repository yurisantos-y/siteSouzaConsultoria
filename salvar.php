<?php
// Conexão com o banco de dados (substitua pelas suas configurações)
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'sisconsultoria');

// Obtém a frase do CKEditor do campo "frase"
$frase = $_POST['areaTexto'];

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

if ($conn->query($sql) === TRUE) {
    echo "Frase salva com sucesso!";
} else {
    echo "Erro ao salvar a frase: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
