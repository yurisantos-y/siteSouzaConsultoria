<?php
// newsletter.php

// Incluir o arquivo index.php para ter acesso à função enviarEmail()
require_once 'index.php';

// Conectar-se ao banco de dados (já existe uma conexão no arquivo index.php, mas não precisamos dela aqui)
$conn = new mysqli(HOST, USER, PASS, BASE);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar se o e-mail foi enviado corretamente
    if (isset($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailCadastrado = $_POST["email"];

        // Conectar-se ao banco de dados (já existe uma conexão no arquivo index.php, mas não precisamos dela aqui)
        $conn = new mysqli(HOST, USER, PASS, BASE);
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Verificar se o e-mail já existe na base de dados
        $sql = "SELECT email FROM newsletter_emails WHERE email = '$emailCadastrado'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo "E-mail já cadastrado na newsletter.";
        } else {
            // E-mail do destinatário (pode ser o seu próprio e-mail para testar)
            $destinatario = ""; // Substitua pelo e-mail do destinatário

            // Assunto do e-mail
            $assunto = "Inscrição na Newsletter";

            // Conteúdo do e-mail
            $mensagem = "E-mail cadastrado na Newsletter: " . $_POST["email"];

            // Chame a função enviarEmail() para enviar o e-mail
            if (enviarEmail($destinatario, $assunto, $mensagem)) {
                // E-mail enviado com sucesso

                // Insira o e-mail cadastrado no banco de dados
                $sql = "INSERT INTO lista_emails (email) VALUES ('$emailCadastrado')";
                if ($conn->query($sql) === TRUE) {
                    echo "E-mail cadastrado e enviado com sucesso!";
                } else {
                    echo "Erro ao cadastrar o e-mail: " . $conn->error;
                }

            } else {
                // Erro ao enviar o e-mail
                echo "Erro ao enviar o e-mail.";
            }
        }
    } else {
        // Caso o e-mail não seja válido
        echo "E-mail inválido!";
    }
} else {
    // Caso o formulário não tenha sido enviado corretamente
    echo "Formulário inválido!";
}

// Feche a conexão após utilizá-la
$conn->close();
?>
