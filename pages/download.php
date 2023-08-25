<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../style/download.css">
    <link rel="shortcut icon" href="../img/icon.ico" type="image/x-icon">
    <title>Prospere | Consultoria</title>
</head>

<body>
    <header>
        <a href="#" class="logoTopo"><img src="../img/logoLaranja.svg" alt="Logo Laranja"></a>
        <div class="mobile-menu-icon">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <ul class="navlista">
            <li><a href="index.php#servicosHome">Serviços</a></li>
            <li><a href="../pages/sobre.php">Sobre</a></li>
            <li><a href="../pages/download.php">Download</a></li>
        </ul>
        <a href="#" id="numberHeader">(45) 99978-7572</a>
    </header>
    <section class="download">
        <h1>Baixe as planilhas</h1>
        <div class="tabelaDownload">
            <ol>
                <li>
                    <a href="/planilhas/planilha1.xlsx" download>
                        <img src="../img/download.svg" alt="imagem de download">
                    </a>
                    <h3>Planilha 1</h3>
                    <p><a href="/planilhas/planilha1.xlsx"></p>
                </li>
                <li>
                    <a href="/planilhas/planilha2.xlsx" download>
                        <img src="../img/download.svg" alt="imagem de download">
                    </a>
                    <h3>Planilha 2</h3>
                    <p><a href="/planilhas/planilha2.xlsx"></p>
                </li>
                <!-- Adicione mais planilhas conforme necessário -->
            </ol>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="logoFooter">
                <img src="../img/logoFooter.png" alt="">
            </div>
            <div class="services">
                <h3>Serviços</h3>
                <ul>
                    <li><a href="#">Consultoria</a></li>
                    <li><a href="#">Sistemas</a></li>
                    <li><a href="#">Suporte</a></li>
                    <li><a href="#">Soluções</a></li>
                </ul>
            </div>
            <div class="social">
                <h3>Social</h3>
                <ul>
                    <li><a href="https://www.instagram.com">Instagram</a></li>
                    <li><a href="https://www.facebook.com">Facebook</a></li>
                    <li><a href="https://www.linkedin.com">LinkedIn</a></li>
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

</body>

</html>