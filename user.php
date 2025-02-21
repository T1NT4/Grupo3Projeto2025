<?php
include_once __DIR__.'\Controller\UserController.php';
include_once __DIR__.'\config.php';

$Controller = new UserController($pdo);
if(!isset($_COOKIE['id_user'])){
    header("Location: index.php");
}
$username = $Controller->getUserFromID($_COOKIE['id_user'])["username"];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PÁGINA DO USUÁRIO - Reverdecer</title>
    <link rel="stylesheet" href="estilo.css">
    <script defer src="app.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <?php
    include __DIR__."/header.php"
    ?>
    <script src="headerResponsivo.js"></script>
    <script src="https://kit.fontawesome.com/f8e1a90484.js" crossorigin="anonymous"> </script>



    <main>

        <div class="container user-page" method="POST">
            <h2 class="whitetext">Nome de Usuário: <?=$username?></h2>
            <a href="logout.php"><button>Sair da conta</button></a>
            <a href="registerResiduos.php"><button>Registrar Resíduos</button></a>
            <a href="relatorio.php"><button>Relatório Mensal</button></a>
            <a href="feedback.php"><button>Enviar Feedback</button></a>
        </div>
    </main>

<?php
    include __DIR__."/footer.html";
    ?>
</body>

</html>