<?php
include_once __DIR__.'/config.php';
if(!isset($_COOKIE['id_user'])){
    header('Location: index.php');
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mensagem = ($_POST['mensagem']);
    $data_envio = date("Y-m-d H:i:s" . ".000000");

    if (!empty($mensagem)) {
        $sql = "INSERT INTO feedbacks (mensagem) VALUES(?)";
        $stmt = $pdo->prepare($sql);
    
        header("Location: user.php");
    } else {
        echo "O campo de feedback não pode estar vazio!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PÁGINA DO USUÁRIO - Reverdecer</title>
    <link rel="stylesheet" href="View/estilo.css">
    <script defer src="app.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <?php
    include __DIR__."/View/header.php"
    ?>
    <script src="View/headerResponsivo.js"></script>
    <script src="https://kit.fontawesome.com/f8e1a90484.js" crossorigin="anonymous"> </script>



    <main>
        <form class="container user-page feedback" method="POST">
            <h2 class="whitetext">Valorizamos muito o seu feedback! Reserve um momento para avaliar sua experiência e nos fornecer seus valiosos comentários</h2>
            <textarea name="mensagem" required placeholder="Conte-nós sobre sua experiência..."></textarea>
            <button type="submit">Enviar Feedback</button>
        </form>
    </main> 

<?php
    include __DIR__."/View/footer.html";
    ?>
</body>

</html>