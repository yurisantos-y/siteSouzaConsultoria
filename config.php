<?php 

$filename = 'servidor.txt';

if (file_exists($filename)) {
    //echo "The file $filename exists";
    //aqui vai a configuracao do servidor
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('BASE', 'sisprospere');
    define('SITE_URL', 'https://www.prosperecf.com.br/');
    
} else {
    //echo "The file $filename does not exist";
    //aqui vai a configuracao para a maquina local
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('BASE', 'sisprospere');
    define('SITE_URL', 'https://www.prosperecf.com.br/');
}


?>