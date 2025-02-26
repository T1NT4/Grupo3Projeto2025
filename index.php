<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de gerenciamento do registro de resíduos sustentáveis! - Reverdecer</title>
    <link rel="stylesheet" href="View/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>

    <?php
    include __DIR__."/View/header.php";
    ?>

    <!--Efeito JAVASCRIPT-->
    <script src="View/headerResponsivo.js"></script>

    <script src="https://kit.fontawesome.com/f8e1a90484.js" crossorigin="anonymous"> </script>


    <div class="content">
        <h1>Transforme resíduos em soluções verdes</h1>
        <p>
        <h2>Otimize processos, reduza impactos e contribua para um futuro mais verde com nosso sistema inteligente de
            gerenciamento.</h2>
        </p>

        <a href="#saiba-mais" class="btn-saiba-mais">Saiba mais...</a>

    </div>

    <div class="img planeta-gigante">
        <img src="img/foto.png" alt="">
    </div>

    <div class="carrossel">
        <div class="slides">
            <div class="slide">
                <img src="img/CARROSSEL 1.png" alt="Imagem 1">
            </div>
            <div class="slide">
                <img src="img/CARROSSEL 2.png" alt="Imagem 2">
            </div>
            <div class="slide right">
                <img src="img/CARROSSEL 3.png" alt="Imagem 3">
            </div>
            <div class="slide">
                <img src="img/CARROSSEL 1.png" alt="Imagem 1">
            </div>
        </div>
    </div>
<!-- 3 sessões contendo 1 tópico cada um (objetivo, público-alvo e desenvolvimento) -->
    <div class="secao" id="saiba-mais">
        <div class="topico">
            
            <div class="icon-container">
                <div class="icone">
                    <i class="fa fa-bullseye"></i>
                </div>
                <h2>Objetivo</h2>
            </div>
            <h4>O objetivo principal do nosso sistema é otimizar e auxiliar a coleta de resíduos em empresas e
                condomínios afim de reduzir o descarte incorreto prezando o bem do meio ambiente.</h4>
            </p>
        </div>

        <div class="topico">
            <div class="icon-container">
                <div class="icone">
                    <i class="fa fa-users"></i>
                </div>
                <h2>Público-Alvo</h2>
            </div>
            <h4> Contudo, temos como público-alvo, e pretendemos ter
                como usuários, os donos de condomínios, e a equipe de gerenciamento e
                monitoramento da limpeza desde as pequenas empresas às
                multinacionais.</h4>
        </div>

        <div class="topico">
            <div class="icon-container">
                <div class="icone">
                    <i class="fa fa-cogs"></i>
                </div>
                <h2>Desenvolvimento</h2>
            </div>
            <h4>Desenvolvemos uma aplicação web utilizando PHP, HTML, CSS e JavaScript, tendo como desenvolvedores Karen,
                Gustavo, Ana Luiza, Thiago, Eric e Julia. Focando na integração da tecnologia verde para criar uma
                plataforma funcional, responsiva e com boa usabilidade.</h4>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
    
<?php
    include __DIR__."/View/footer.html";
    ?>
</body>
</html>