<?php
include_once __DIR__.'\Controller\UserController.php';
include_once __DIR__.'\config.php';

$Controller = new UserController($pdo);

if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $currentdatetime = new DateTime('now');
    $data_de_registro = $currentdatetime->format("Y-m-d H:i:s" . ".000000");


    $registred = $Controller->register($username, $password, $data_de_registro);
    $error_code = 0;

    if ($registred && $error_code == null) {
        header("Location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRAR USUÁRIO - Reverdecer</title>
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

        <form class="container" method="POST">
            <h2>Cadastrar Conta</h2>
            <img src="IMG/Black_White_Minimalist_Modern_Aesthetic_Initials_Font_Logo__1_-removebg-preview.png" alt=""
                class="image">
            <br><br>

            <div class="navbarlog">
                <div class="loguser">
                    <input type="text" name="username" id="" placeholder="Nome de usuário" class="inp-login" required>
                    <span class="fa-solid fa-user" id="usericon"></span>
                </div>
                <br>
                <div class="loguser">
                    <input type="password" name="password" id="" placeholder="Sua senha" class="inp-login" required>
                    <span class="fa-solid fa-lock" id="paswicon"></span>
             
                </div>

            </div>

            </button><br><br>

            <button class="btn-enter">
                <p>CADASTRAR CONTA</p>
            </button>
            <br>
            <br>
            <p>Já tem uma conta? Faça login <a class="text-link"href="login.php">aqui!</a></p>
            
            <?php
                if (isset($registred) && !$registred) {
                    echo "<br><p class='error' >esse usuário ja existe! tente outro nome de usuário.</p>";
                }
                if (isset($error_code) && $error_code != null) {
                    echo "<br class='error' >".$error_code;
                }
            ?>
        </form>
    </main>

<?php
    include __DIR__."/View/footer.html";
    ?>
</body>

</html>