<?php
session_start();

// Verificar se o usuário é um administrador
$adm = false;
if (isset($_SESSION['adm']) && $_SESSION['adm']) {
    $adm = true;
}

// Verificar se o usuário deseja fazer logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}


// Conectar-se ao banco de dados
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'sisprospere');

$conn = new mysqli(HOST, USER, PASS, BASE);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consultar o banco de dados e obter uma frase aleatória
$sql = "SELECT frase FROM frases ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

if (!$result || $result->num_rows === 0) {
    // Caso ocorra um erro na consulta ou não haja resultados
    $frase = "Nenhuma frase encontrada.";
} else {
    // Caso a consulta retorne resultados
    $row = $result->fetch_assoc();
    $frase = $row["frase"];

    // Decodificar os caracteres especiais da frase
    $frase = htmlspecialchars_decode($frase);
}

$conn->close();


require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
require '../PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Crie uma função para enviar e-mails
function enviarEmail($destinatario, $assunto, $mensagem) {
    $mail = new PHPMailer();

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Informe o host do servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'yuri01.sp@gmail.com';  // Informe o usuário do servidor SMTP
        $mail->Password = 'iadvnsuqljvbvuxp';  // Informe a senha do servidor SMTP
        $mail->SMTPSecure = 'tls';  // Use 'tls' ou 'ssl' de acordo com a configuração do seu servidor
        $mail->Port = 587;  // Porta do servidor SMTP

        // Remetente e destinatário
        $mail->setFrom('seu_email', 'Seu Nome');
        $mail->addAddress($destinatario);

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = $assunto;
        $mail->Body = $mensagem;

        // Enviar e-mail
        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return false;
    }
}


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/slider.css">
    <link rel="shortcut icon" href="../img/icon.ico" type="image/x-icon">
    <title>Prospere | Consultoria</title>
</head>

<body>

    <!--  -->
    <header>
        <a href="#" class="logoTopo"><img src="../img/logoLaranja.svg" alt="Logo Laranja"></a>
        <div class="mobile-menu-icon">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <ul class="navlista">
            <li><a href="#servicosHome">Serviços</a></li>
            <li><a href="../pages/sobre.php">Sobre</a></li>
            <li><a href="../pages/download.php">Download</a></li>
        </ul>
        <a href="#" id="numberHeader">(45) 99978-7572</a>
    </header>


    <main>
        <section class="landingPage">
            <h1>TRANSFORME DESAFIOS EM <br>OPORTUNIDADES E CONQUISTE O <br> <span id="palavraSucesso">SUCESSO.</span>
            </h1>
            <img src="../img/imageLandingPage.png" alt="" id="imagemLP">
            <div class="icone-aleatorio-container">
                <img src="../img/icon1LP.png" alt="" id="icon1">
                <img src="../img/icon2LP.png" alt="" id="icon2">
                <img src="../img/icon3LP.png" alt="" id="icon3">

            </div>
        </section>

        <section class="gota">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 505.7 70.1"
                xml:space="preserve">
                <title>curve-hollow-grey-out</title>
                <path class="d-block"
                    d="M351,32.6c-55.9,30.1-71.4,32.7-98.2,32.7s-42.3-2.6-98.2-32.7S28,0,28,0H0v70.1h28h449.6h28.1V0h-28.1C477.6,0,407,2.5,351,32.6z">
                </path>
            </svg>

            <a href="#servicosHome" class="scroll-link">
                <img class="animated-arrow" src="../img/arrowgota.svg" alt="" srcset="">
            </a>
        </section>

        <section class="servicosHome" id="servicosHome">
            <h1 id="descricaoGeralh1">Mas como fazer sua empresa prosperar com a <span
                    id="palavraProspere">Prospere?</span> É muito mais simples do que parece.</h1>
            <p class="descricaoGeralp">Nós realizamos a coleta de todas as informações financeiras da sua empresa,
                avaliamos a precificação de
                produtos e/ou serviços e começamos o planejamento financeiro do seu empreendimento usando os dados
                obtidos. Vamos implementar ferramentas como: fluxo de caixa, DRE e ponto de equilíbrio; analisaremos a
                viabilidade e rentabilidade do negócio, forneceremos suporte em estratégias, impulsionaremos resultados
                e eficiência, e por fim, organizaremos e controlaremos as finanças de toda a sua operação. <br></p>

            <p class="descricaoFinalp">Tudo isso será feito em reuniões online frequentes, com uma linguagem simples e
                descomplicada.</p>
            <ol class="grid-list">
                <li>
                    <img src="../img/rentabilidade.svg" alt="" id="img1">
                    <h3>Estudo de rentabilidade e viabilidade de negócios</h3>
                    <p>Estudo de rentabilidade e viabilidade de negócios: Análise profunda da lucratividade e
                        sustentabilidade econômica de um negócio, considerando projeções financeiras e identificando
                        possíveis riscos e oportunidades.</p>
                </li>

                <li>
                    <img src="../img/planejamentoFinanceiro.svg" alt="">
                    <h3>Planejamento Financeiro</h3>
                    <p>Elaboração de um plano estratégico que engloba as finanças da empresa, permitindo o controle
                        e a
                        organização dos recursos de forma eficiente.</p>
                </li>

                <li>
                    <img src="../img/estrategia.svg" alt="">
                    <h3>Auxílio em estratégias</h3>
                    <p> Identificação de oportunidades e desenvolvimento de estratégias personalizadas para otimizar
                        o
                        desempenho e alcançar resultados significativos no negócio.</p>
                </li>

                <li>
                    <img src="../img/aumentoResultado.svg" alt="">
                    <h3>Aumento de resultados e eficiência</h3>
                    <p>Implementação de ações e práticas que visam maximizar os resultados e a eficiência
                        operacional da
                        empresa, melhorando sua produtividade e lucratividade.</p>
                </li>

                <li>
                    <img src="../img/controleFinanceiro.svg" alt="">
                    <h3>Controle e organização financeira</h3>
                    <p>Estabelecimento de processos e ferramentas para garantir o controle adequado das finanças,
                        permitindo uma gestão sólida e organizada do fluxo de caixa, custos e despesas.</p>
                </li>

                <li>
                    <img src="../img/precificacao.svg" alt="">
                    <h3>Avaliação da precificação</h3>
                    <p>Análise detalhada da estratégia de precificação dos produtos e/ou serviços, visando garantir
                        a
                        competitividade de mercado e a rentabilidade do negócio.</p>
                </li>

                <li>
                    <img src="../img/fluxoCaixa.svg" alt="">
                    <h3>Fluxo de caixa</h3>
                    <p>Estudo de rentabilidade e viabilidade de negócios: Análise profunda da lucratividade e
                        sustentabilidade econômica de um negócio, considerando projeções financeiras e identificando
                        possíveis riscos e oportunidades.</p>
                </li>

                <li>
                    <img src="../img/DRE.svg" alt="">
                    <h3>D.R.E</h3>
                    <p>Relatório Gerencial que apresenta as operações financeiras da empresa, incluindo receitas,
                        custos, despesas, lucros e impostos, permitindo uma análise aprofundada do desempenho
                        financeiro.</p>
                </li>

                <li>
                    <img src="../img/pontoEquilibrio.svg" alt="">
                    <h3>Ponto de equilíbrio</h3>
                    <p>Determinação do nível mínimo de faturamento necessário para cobrir todos os custos e
                        despesas,
                        permitindo uma gestão eficiente e estratégica das operações financeiras da empresa.</p>
                </li>
            </ol>

        </section>




        <section class="frase">
            <?php if (isset($_SESSION["adm"]) && $_SESSION["adm"]): ?>
            <form id="fraseForm" action="./salvar.php" method="POST">
                <textarea name="areaTexto" class="ckeditor" id="areaTexto"></textarea>
                <button type="submit" class="enviar-button">Enviar</button>
            </form>

            <a href="./logout.php" id="sairCK">Sair</a>
            <?php else: ?>
            <img src="../img/aspas.svg" alt="" id="aspas">
            <p id="frase" class="frase-dinamica"></p>
            <?php endif; ?>


        </section>


        <div id="popup" class="popup">
            <p id="popupMessage"></p>
        </div>

        <script>
        // Função para fechar o pop-up
        function closePopup() {
            document.getElementById("popup").style.display = "none";
        }

        // Verificar se o pop-up deve ser exibido ao carregar a página
        document.addEventListener("DOMContentLoaded", function() {
            <?php
        if (isset($_SESSION["popup_message"])) {
            $popupMessage = $_SESSION["popup_message"];
            $popupStatus = $_SESSION["popup_status"];
            unset($_SESSION["popup_message"]);
            unset($_SESSION["popup_status"]);
        ?>
            var popupMessage = "<?php echo $popupMessage; ?>";
            var popupStatus = "<?php echo $popupStatus; ?>";
            if (popupStatus === "success") {
                document.getElementById("popupMessage").style.color = "green";
            } else {
                document.getElementById("popupMessage").style.color = "red";
            }
            document.getElementById("popupMessage").innerText = popupMessage;
            document.getElementById("popup").style.display = "block";
            <?php } ?>
        });
        </script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
        // Função para fechar o pop-up
        function closePopup() {
            document.getElementById("popup").style.display = "none";
        }

        $(document).ready(function() {
            // Intercepta o evento de envio do formulário
            $("#fraseForm").submit(function(event) {
                // Impede que o formulário seja enviado normalmente
                event.preventDefault();

                // Obtem os dados do formulário
                var formData = $(this).serialize();

                // Envia os dados via AJAX
                $.ajax({
                    type: "POST",
                    url: $(this).attr("action"),
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        // Verifica a resposta do servidor
                        if (response.success) {
                            // Define a mensagem do pop-up com sucesso ou erro
                            var popupMessage = response.message;
                            if (response.popup) {
                                document.getElementById("popupMessage").style.color =
                                    "green";
                            } else {
                                document.getElementById("popupMessage").style.color = "red";
                            }
                            document.getElementById("popupMessage").innerText =
                                popupMessage;

                            // Exibe o pop-up
                            document.getElementById("popup").style.display = "block";

                            // Se a mensagem foi enviada com sucesso, limpa o conteúdo do CKEditor
                            if (response.success && response.popup) {
                                CKEDITOR.instances.areaTexto.setData("");
                            }
                        } else {
                            alert("Erro ao enviar a mensagem!");
                        }
                    },
                    error: function() {
                        alert("Erro ao enviar a mensagem!");
                    }
                });
            });
        });
        </script>



        <section class="wrapper">

            <div class="overlay-wrapper"></div>

            <div class="slide-wrapper" data-slide="wrapper">

                <button class="slide-nav-button slide-nav-previous fas fa-chevron-left"
                    data-slide="nav-previous-button"></button>
                <button class="slide-nav-button slide-nav-next fas fa-chevron-right"
                    data-slide="nav-next-button"></button>

                <div class="slide-list" data-slide="list">
                    <div class="slide-item" data-slide="item" data-index="0">
                        <div class="slide-content">
                            <img class="slide-image" src="../img/imgSlide.jpg" alt="">
                        </div>
                    </div>
                    <div class="slide-item" data-slide="item" data-index="1">
                        <div class="slide-content">
                            <img class="slide-image" src="../img/imgSlide.jpg" alt="">
                        </div>
                    </div>
                    <div class="slide-item" data-slide="item" data-index="2">
                        <div class="slide-content">
                            <img class="slide-image" src="../img/imgSlide.jpg" alt="">
                        </div>
                    </div>
                    <div class="slide-item" data-slide="item" data-index="3">
                        <div class="slide-content">
                            <img class="slide-image" src="../img/imgSlide.jpg" alt="">
                        </div>
                    </div>
                    <div class="slide-item" data-slide="item" data-index="4">
                        <div class="slide-content">
                            <img class="slide-image" src="../img/imgSlide.jpg" alt="">
                        </div>
                    </div>
                    <div class="slide-item" data-slide="item" data-index="5">
                        <div class="slide-content">
                            <img class="slide-image" src="../img/imgSlide.jpg" alt="">
                        </div>
                    </div>
                    <div class="slide-item" data-slide="item" data-index="6">
                        <div class="slide-content">
                            <img class="slide-image" src="../img/imgSlide.jpg" alt="">
                        </div>
                    </div>
                    <div class="slide-item" data-slide="item" data-index="7">
                        <div class="slide-content">
                            <img class="slide-image" src="../img/imgSlide.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
                    <form id="newsletterForm" action="./newsletter.php" method="POST">
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