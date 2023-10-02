<?php

require '../vendor/autoload.php';

// Configurar as credenciais
putenv('GOOGLE_APPLICATION_CREDENTIALS=../planilhaprosp.json');

// Criar um cliente do Google Drive
$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->setScopes(Google_Service_Drive::DRIVE);

// Configurar a verificação de certificado SSL
$client->setHttpClient(new GuzzleHttp\Client([
    'verify' => false, // Defina isso como true para habilitar a verificação de certificado
]));

$service = new Google_Service_Drive($client);


session_start();
$isAdmin = isset($_SESSION['adm']) && $_SESSION['adm'];$adm = false;
if (isset($_SESSION['adm']) && $_SESSION['adm']) {
    $adm = true;
}

// Conexão com o banco de dados
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'sisprospere');

$conn = new mysqli(HOST, USER, PASS, BASE);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../style/download.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="shortcut icon" href="../img/icon.ico" type="image/x-icon">
    <title>Prospere | Consultoria</title>
</head>

<body class="centered-body">
    <header>
        <a href="../index.php" class="logoTopo"><img src="../img/logoLaranja.svg" alt="Logo Laranja"></a>
        <div class="mobile-menu-icon">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <ul class="navlista">
            <li><a href="../index.php#servicosHome">Serviços</a></li>
            <li><a href="../pages/sobre.php">Sobre</a></li>
            <li><a href="../pages/download.php">Download</a></li>
        </ul>
        <a href="https://api.whatsapp.com/send?phone=5545999787572" id="numberHeader">(45) 99978-7572</a>
    </header>

    <section class="download">
        <h1>Baixe as planilhas</h1>
        <div class="tabelaDownload">
            <ol>
                <?php
                    
                    $pastaPhpId = '1Vn9NFv7VNQUfMpjLmbQxerdVhN2CDp1W';

                    // Use a API do Google Drive para listar os arquivos na pasta
                    $results = $service->files->listFiles([
                        'q' => "'$pastaPhpId' in parents",
                    ]);

                    // Loop através dos resultados e gere links de download
                    foreach ($results as $file) {
                        $nome = $file->getName();
                        $id = $file->getId();
                        $downloadUrl = "https://drive.google.com/uc?id=$id";
                        
                        echo "<li>";
                        echo "<a href=\"$downloadUrl\" download><img src=\"../img/download.svg\" alt=\"imagem de download\"></a>";
                        echo "<h3>$nome</h3>";
                        echo "</li>";
                    }
                ?>
            </ol>

        </div>
    </section>
    <section class="upload">
        <?php if ($isAdmin): ?>
        <h2>Enviar Nova Planilha</h2>
        <form id="uploadForm" action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="planilha" accept=".xlsx" required>
            <button type="submit">Enviar</button>
        </form>
        <?php endif; ?>

    </section>


    <footer>
        <div class="footer-content">
            <div class="logoFooter">
                <img src="../img/logoFooter.png" alt="">
            </div>
            <div class="services">
                <h3>Serviços</h3>
                <ul>
                        <li><a href="https://api.whatsapp.com/send?phone=5545999787572" target="_blank">Consultoria</a></li>
                        <li><a href="https://www.computec.com.br/" target="_blank">Sistemas</a></li>
                        <li><a href="http://computec.mysuite2.com.br/client/chatan.php?&h=529c04a8920540cca1eac54d6e23474c&inf=" target="_blank">Suporte</a></li>
                        <li><a href="../pages/sobre.php">Sobre</a></li>
                    </ul>
                </div>
                <div class="social">
                    <h3>Social</h3>
                    <ul>
                        <li><a href="https://www.instagram.com/computec.sistemas/" target="_blank">Instagram</a></li>
                        <li><a href="https://www.facebook.com/computecsantahelena?fref=ts" target="_blank">Facebook</a></li>
                        <li><a href="https://br.linkedin.com/company/computec-software" target="_blank">LinkedIn</a></li>
                    </ul>
            </div>
            <div class="newsletter">
                <h3 id="textoNewsletter">Receba novas informações:</h3>
                <form id="newsletterForm" action="newsletter.php" method="POST">
                    <input type="email" name="email" placeholder="Digite seu e-mail" required>
                    <button type="submit">Inscrever-se</button>
                </form>
            </div>
        </div>

        <hr class="divider">

        <div class="footer-bottom">
            <div class="computec">
                <img src="../img/logoComputecDark.svg" alt="">
                <h3>computec</h3>
            </div>
            <div class="rights">
                <p>&copy; <?php echo date('Y'); ?> Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <a href="https://api.whatsapp.com/send?phone=5545999787572" target="_blank" class="whatsapp-icon">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script src="../script/scroll.js"></script>
    <script src="../script/menuMobile.js"></script>
    <script src="../ck/build/ckeditor.js"></script>
    <script src="../script/ckeditor.js"></script>
    <script src="../script/frases.js"></script>
    <script src="../script/slides.js"></script>
    <script>
    initSlider({
        autoPlay: true,
        startAtIndex: 0,
        timeInterval: 2000
    })
    </script>

</body>

</html>