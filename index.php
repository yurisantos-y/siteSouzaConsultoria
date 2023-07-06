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
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Souza Consultoria</title>
</head>
<body>
      <!-- Inclua o cabeçalho da página -->
  <header>
    <a href="#" class="logo"><img src="img/logoLaranja.svg" alt="Logo Laranja"></a>

    <ul class="navlista">
        <li><a href="#">Serviços</a></li>
        <li><a href="#">Sobre</a></li>
        <li><a href="#">Contato</a></li>
    </ul>

    <a href="#" id="numberHeader">(45) 99978-7572</a>
  </header>

  <!-- Inclua o conteúdo principal da página -->
  <main>
    <section class="landingPage">
        <h1>TRANSFORME DESAFIOS EM <br>OPORTUNIDADES E CONQUISTE O <br>SUCESSO.</h1>
        <img src="img/imageLandingPage.png" alt="" id="imagemLP">
    </section>

    <section class="servicosHome">
      <ol class="grid-list">
        <li>
          <img src="img/rentabilidade.svg" alt="" id="img1">
          <h3>Estudo de rentabilidade e viabilidade de negócios</h3>
          <p>Estudo de rentabilidade e viabilidade de negócios: Análise profunda da lucratividade e sustentabilidade econômica de um negócio, considerando projeções financeiras e identificando possíveis riscos e oportunidades.</p>
        </li>

        <li>
          <img src="img/planejamentoFinanceiro.svg" alt="">
          <h3>Planejamento Financeiro</h3>
          <p>Elaboração de um plano estratégico que engloba as finanças da empresa, permitindo o controle e a organização dos recursos de forma eficiente.</p>
        </li>

        <li>
          <img src="img/estrategia.svg" alt="">
          <h3>Auxílio em estratégias</h3>
          <p> Identificação de oportunidades e desenvolvimento de estratégias personalizadas para otimizar o desempenho e alcançar resultados significativos no negócio.</p>
        </li>

        <li>
          <img src="img/aumentoResultado.svg" alt="">
          <h3>Aumento de resultados e eficiência</h3>
          <p>Implementação de ações e práticas que visam maximizar os resultados e a eficiência operacional da empresa, melhorando sua produtividade e lucratividade.</p>
        </li>

        <li>
          <img src="img/controleFinanceiro.svg" alt="">
          <h3>Controle e organização financeira</h3>
          <p>Estabelecimento de processos e ferramentas para garantir o controle adequado das finanças, permitindo uma gestão sólida e organizada do fluxo de caixa, custos e despesas.</p>
        </li>

        <li>
          <img src="img/precificacao.svg" alt="">
          <h3>Avaliação da precificação</h3>
          <p>Análise detalhada da estratégia de precificação dos produtos e/ou serviços, visando garantir a competitividade de mercado e a rentabilidade do negócio.</p>
        </li>

        <li>
          <img src="img/fluxoCaixa.svg" alt="">
          <h3>Fluxo de caixa</h3>
          <p>Estudo de rentabilidade e viabilidade de negócios: Análise profunda da lucratividade e sustentabilidade econômica de um negócio, considerando projeções financeiras e identificando possíveis riscos e oportunidades.</p>
        </li>

        <li>
          <img src="img/DRE.svg" alt="">
          <h3>D.R.E</h3>
          <p>Relatório Gerencial que apresenta as operações financeiras da empresa, incluindo receitas, custos, despesas, lucros e impostos, permitindo uma análise aprofundada do desempenho financeiro.</p>
        </li>

        <li>
          <img src="img/pontoEquilibrio.svg" alt="">
          <h3>Ponto de equilíbrio</h3>
          <p>Determinação do nível mínimo de faturamento necessário para cobrir todos os custos e despesas, permitindo uma gestão eficiente e estratégica das operações financeiras da empresa.</p>
        </li>
      </ol>

    </section>

    <section class="frase">
      <?php if (isset($_SESSION["adm"]) && $_SESSION["adm"]): ?>
          <h2>Conteúdo exclusivo para administradores</h2>
          <p>Este conteúdo só será exibido se o usuário estiver conectado como administrador.</p>
          <a href="logout.php">Sair</a>
      <?php endif; ?>
    </section>




  </main>

  <!-- Inclua o rodapé da página -->
  <footer>
    <!-- Aqui você pode adicionar informações de contato, links para redes sociais, etc. -->
    <p>&copy; <?php echo date('Y'); ?> Minha Empresa. Todos os direitos reservados.</p>
  </footer>

  <!-- Aqui você pode incluir scripts JavaScript ou links para arquivos externos -->
</body>
</html>
