<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../style/sobre.css">
    <link rel="shortcut icon" href="../img/icon.ico" type="image/x-icon">
    <title>Prospere | Consultoria</title>
</head>

<body class="centered-body">

    <!--  -->
    <header>
        <a href="index.php" class="logoTopo"><img src="../img/logoLaranja.svg" alt="Logo Laranja"></a>
        <div class="mobile-menu-icon">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <ul class="navlista">
            <li><a href="index.php#servicosHome">Serviços</a></li>
            <li><a href="index.php">Início</a></li>
            <li><a href="../pages/download.php">Download</a></li>
        </ul>
        <a href="#" id="numberHeader">(45) 99978-7572</a>
    </header>
    <main>

        <div class="conteudo">

            <p class="paragrafo">
                <span class="destaque">Olá, sou Natal</span> Um empresário de sucesso com uma sólida experiência na
                indústria da tecnologia. Na Computec, minha empresa de consultoria líder, desenvolvemos e implementamos
                um avançado sistema de gerenciamento de entrada e saída. Nosso sistema é projetado para otimizar e
                aprimorar o fluxo de pessoas e recursos dentro das organizações, oferecendo soluções eficientes e
                seguras para o controle de acesso. <br>
                <br>
                Com nossa expertise em tecnologia e consultoria, ajudamos empresas a melhorar sua segurança, eficiência
                operacional e satisfação do cliente por meio de um gerenciamento de entrada e saída inteligente. Nossa
                abordagem personalizada e soluções inovadoras permitem que as empresas tenham um controle mais efetivo
                do fluxo de pessoas, monitorando a entrada e saída de funcionários, visitantes e mercadorias de forma
                eficiente e precisa. Na Computec, estamos comprometidos em fornecer sistemas de gerenciamento de entrada
                e saída de ponta, que impulsionam o sucesso e a produtividade de nossos clientes.
            </p>



            <div class="imagemNatal">
                <img src="../img/natal.jpg" alt="Natal">
            </div>
        </div>

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


        <!-- Ícone Flutuante do WhatsApp -->
        <a href="https://api.whatsapp.com/send?phone=5545999787572" target="_blank" class="whatsapp-icon">
            <i class="fab fa-whatsapp"></i>
        </a>



    </main>
</body>

</html>