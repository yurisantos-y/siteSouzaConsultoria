<?php
// Verifica se o usuário está autenticado como administrador
session_start();
if (!isset($_SESSION['adm']) || !$_SESSION['adm']) {
    echo json_encode(array("success" => false, "message" => "Acesso não autorizado."));
    exit();
}

// Diretório de destino para o upload das planilhas
$uploadDir = "/caminho/para/planilhas"; // Defina o diretório correto

// Verifica se o arquivo foi enviado com sucesso
if (!isset($_FILES['planilha']) || $_FILES['planilha']['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(array("success" => false, "message" => "Erro ao enviar o arquivo."));
    exit();
}

// Verifica se o arquivo é uma planilha válida (exemplo: somente .xlsx)
$allowedExtensions = array("xlsx"); // Defina as extensões permitidas
$uploadedExtension = strtolower(pathinfo($_FILES['planilha']['name'], PATHINFO_EXTENSION));
if (!in_array($uploadedExtension, $allowedExtensions)) {
    echo json_encode(array("success" => false, "message" => "Tipo de arquivo não suportado."));
    exit();
}

// Gere um nome único para o arquivo
$newFileName = uniqid("planilha_") . "." . $uploadedExtension;

// Move o arquivo para o diretório de destino
if (!move_uploaded_file($_FILES['planilha']['tmp_name'], $uploadDir . "/" . $newFileName)) {
    echo json_encode(array("success" => false, "message" => "Erro ao mover o arquivo."));
    exit();
}

// Conexão com o banco de dados
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'sisprospere');

$conn = new mysqli(HOST, USER, PASS, BASE);
if ($conn->connect_error) {
    echo json_encode(array("success" => false, "message" => "Falha na conexão com o banco de dados."));
    exit();
}

// Insere informações sobre a nova planilha no banco de dados
$planilhaNome = $_FILES['planilha']['name'];
$planilhaCaminho = $uploadDir . "/" . $newFileName;

$sql = "INSERT INTO planilhas (nome, caminho) VALUES ('$planilhaNome', '$planilhaCaminho')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(array("success" => true, "message" => "Planilha enviada com sucesso e registrada no banco de dados!"));
} else {
    echo json_encode(array("success" => false, "message" => "Erro ao inserir os dados no banco de dados."));
}

$conn->close();
?>
