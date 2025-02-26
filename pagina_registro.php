<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Registro</title>
    <link rel="stylesheet" href="View/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <?php
        include __DIR__ ."/View/header.php";
    ?>
    <script src="View/headerResponsivo.js"></script>
    <script src="https://kit.fontawesome.com/f8e1a90484.js" crossorigin="anonymous"> </script>


    <div class="aviso">
        <p><h2>Registro dos resíduos realizado com sucesso!</h2></p>
        <div>
            <a href="registerResiduos.php"><button class="gerar-relatorio">Registrar outro resíduo</button></a>
            <a href="relatorio.php"><button class="gerar-relatorio">Gerar Relatório</button></a>
        </div>
        
    </div>


    <?php
        include __DIR__ ."/View/footer.html";
    ?>
</body>
</html>
