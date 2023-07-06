<?php 
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('BASE', 'sisconsultoria');

    try{
        $conn = new MySQLi(HOST, USER, PASS, BASE);
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    } catch(mysqli_sql_exception $erro) {
        echo 'Ocorreu um erro: ' . $erro->getMessage();
    }

?>