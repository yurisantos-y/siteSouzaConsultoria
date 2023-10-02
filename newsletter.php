<?php
require_once './index.php';  // Importar as funções e constantes do index.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST["email"];

        // Conectar-se ao banco de dados
        $conn = new mysqli(HOST, USER, PASS, BASE);
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Verificar se o e-mail já está cadastrado
        $sql = "SELECT email FROM newsletter_emails WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            // O e-mail já está cadastrado, redirecionar para index.php
            $mensagemAlerta = "O e-mail já está cadastrado.";
        } else {
            // Gerar um código de confirmação único
            $confirmationCode = uniqid();

            // Inserir o e-mail e o código de confirmação no banco de dados
            $sql = "INSERT INTO newsletter_emails (email, confirmation_code) VALUES ('$email', '$confirmationCode')";
            if ($conn->query($sql) === TRUE) {
                // Enviar e-mail de confirmação
                $assunto = "Confirme sua inscrição na Newsletter";
                $mensagem = "Clique no link abaixo para confirmar sua inscrição:\n";
                $mensagem .= "http://localhost/siteSouzaConsultoria/pages/confirmacao.php?code=$confirmationCode";

                if (enviarEmail($email, $assunto, $mensagem)) {
                    $mensagemAlerta = "Um e-mail de confirmação foi enviado para o seu endereço.";
                } else {
                    $mensagemAlerta = "Erro ao enviar o e-mail de confirmação.";
                }
            } else {
                $mensagemAlerta = "Erro ao cadastrar o e-mail: " . $conn->error;
            }
        }

        // Feche a conexão
        $conn->close();
    } else {
        $mensagemAlerta = "E-mail inválido!";
    }
} else {
    $mensagemAlerta = "Formulário inválido!";
}

echo '<script>alert("' . $mensagemAlerta . '");</script>';
?>
