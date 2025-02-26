<?php
include_once __DIR__.'\Controller\UserController.php';
include_once __DIR__.'\config.php';

$Controller = new UserController($pdo);

if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $logged_in = $Controller->login($username, $password);

    if (!empty($logged_in)) {
        setcookie("id_user", $logged_in["id"], time()+60*60*24, "/");
        header("Location: user.php");
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - Reverdecer</title>
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

        <form class="container" method="POST">

            <img src="IMG/Black_White_Minimalist_Modern_Aesthetic_Initials_Font_Logo__1_-removebg-preview.png" alt=""
                class="image">
            <br><br>

            <div class="navbarlog">
                <div class="loguser">
                    <input type="text" name="username" id="" placeholder="nome do usuário" class="inp-login" required>
                    <span class="fa-solid fa-user" id="usericon"></span>
                </div>
                <br>
                <div class="loguser">
                    <input type="password" name="password" id="" placeholder="sua senha" class="inp-login" required>
                    <span class="fa-solid fa-lock" id="paswicon"></span>
             
                </div>

            </div>

            </button><br><br>

            <button class="btn-enter">
                <p>LOGIN</p>
            </button>
            <br>
            <br>
            <p>Não tem uma conta? cadastre uma <a class="text-link"href="register.php">aqui!</a></p>
            
            <?php
            if (isset($logged_in) && empty($logged_in)) {
                echo "<br> <p>usuário ou senha estão errados, tente novamente!</p>";
            } else {
            }
            ?>
        </form>
    </main>

    
<?php
    include __DIR__."/footer.html";
    ?>
</body>

</html>