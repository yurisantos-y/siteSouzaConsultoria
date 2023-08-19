<?php
require_once './index.php';  // Importar as funções e constantes do index.php

$conn = new mysqli(HOST, USER, PASS, BASE);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["code"])) {
    $confirmationCode = $_GET["code"];

    // Filtrar e escapar o código de confirmação para prevenir SQL injection
    $confirmationCode = mysqli_real_escape_string($conn, $confirmationCode);

    // Conectar-se ao banco de dados
    $conn = new mysqli(HOST, USER, PASS, BASE);
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Verificar se o código de confirmação existe no banco de dados
    $sql = "SELECT email FROM newsletter_emails WHERE confirmation_code = '$confirmationCode'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Atualizar o status de confirmação do e-mail
        $emailRow = $result->fetch_assoc();
        $email = $emailRow["email"];

        // Filtrar e escapar o e-mail para prevenir SQL injection
        $email = mysqli_real_escape_string($conn, $email);

        $updateSql = "UPDATE newsletter_emails SET confirmed = 1 WHERE email = '$email'";
        if ($conn->query($updateSql) === TRUE) {
            echo "E-mail confirmado com sucesso. Obrigado por se inscrever na newsletter!";
        } else {
            echo "Erro ao confirmar o e-mail: " . $conn->error;
        }
    } else {
        echo "Código de confirmação inválido.";
    }

    // Feche a conexão
    $conn->close();
} else {
    echo "Requisição inválida.";
}
?>
