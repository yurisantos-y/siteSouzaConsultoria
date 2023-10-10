<?php 
session_start();

if (empty($_POST) || empty($_POST["usuario"]) || empty($_POST["senha"])) {
    print "<script>location.href='../pages/index.php';</script>";
}

include './config.php';

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuarios 
        WHERE usuario = '{$usuario}' 
        AND senha = '{$senha}'";

$res = $conn->query($sql) or die($conn->error);

$qtd = $res->num_rows;

if ($qtd > 0) {
    $row = $res->fetch_assoc(); // Obter a linha do resultado como um array associativo

    $_SESSION["usuario"] = $usuario;
    $_SESSION["nome"] = $row["nome"];
    $_SESSION["adm"] = $row["adm"];
    print "<script>location.href='../index.php';</script>";
} else {
    print "<script>alert('Usuário e/ou senha incorreto')</script>";
    print "<script>location.href='../index.php';</script>";
}
?>