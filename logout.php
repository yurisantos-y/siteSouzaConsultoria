<?php 
    session_start();
    unset($_SESSION["usuario"]);
    unset($_SESSION["nome"]);
    unset($_SESSION["adm"]);
    session_destroy();
    header("Location: index.php");
    exit; 

?>