<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>FORMULÁRIO</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <?php
    $logado = true;
    include __DIR__ . "/header.php";
    ?>
    
    <script src="headerResponsivo.js"></script>
    <div class="formular">


        <div class="form1">
            <form action="" method="post" class="form registrar">
                <label for="tipo">Tipo:</label>
                <div class="checkbox">
                    <input type="radio" id="reciclavel" name="tipo" value="raciclavel" checked />
                    <label for="coding"> reciclavel </label>
                    <div class="middiv"></div>
                    <input type="radio" id="organico" name="tipo" value="organico" />
                    <label for="organico"> organico </label>
                </div>
                <div></div>

                <label for="peso">Peso:</label>
                <input type="text" id="peso" class="btn-form" />
                <label for="peso">kg</label>
                
                <label for="date">Data:</label>
                <input type="date" id="date" class="btn-form">
                <div></div>
                
                <label for="localizacao">Localização:</label>
                <input type="text" id="localizacao" class="btn-form">
                <div></div>
                
                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" class="btn-form">
                <div></div>
                
                <button type="button">Registrar</button>

            </form>
        </div>
    </div>  
</body>

</html>