<?php
// newsletter.php

// Incluir o arquivo index.php para ter acesso à função enviarEmail()
require_once 'index.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar se o e-mail foi enviado corretamente
    if (isset($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        // E-mail do destinatário (pode ser o seu próprio e-mail para testar)
        $destinatario = "ziltron123@gmail.com"; // Substitua pelo e-mail do destinatário

        // Assunto do e-mail
        $assunto = "Inscrição na Newsletter";

        // Conteúdo do e-mail
        $mensagem = "E-mail cadastrado na Newsletter: " . $_POST["email"];

        // Chame a função enviarEmail() para enviar o e-mail
        if (enviarEmail($destinatario, $assunto, $mensagem)) {
            // E-mail enviado com sucesso
            // Você pode redirecionar o usuário para uma página de sucesso ou exibir uma mensagem na página atual
            echo "E-mail enviado com sucesso!";
        } else {
            // Erro ao enviar o e-mail
            // Você pode redirecionar o usuário para uma página de erro ou exibir uma mensagem na página atual
            echo "Erro ao enviar o e-mail.";
        }
    } else {
        // Caso o e-mail não seja válido
        // Você pode redirecionar o usuário para uma página de erro ou exibir uma mensagem na página atual
        echo "E-mail inválido!";
    }
} else {
    // Caso o formulário não tenha sido enviado corretamente
    // Você pode redirecionar o usuário para uma página de erro ou exibir uma mensagem na página atual
    echo "Formulário inválido!";
}
?>
