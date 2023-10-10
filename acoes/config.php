<?php 
    include '../config.php';

    try{
        $conn = new MySQLi(HOST, USER, PASS, BASE);
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    } catch(mysqli_sql_exception $erro) {
        echo 'Ocorreu um erro: ' . $erro->getMessage();
    }

?>