<?php
session_start();
include_once 'C:\Turma2\xampp\htdocs\Grupo3Projeto2025\Controller\UserController.php';
include_once 'C:\Turma2\xampp\htdocs\Grupo3Projeto2025\config.php';

$Controller = new UserController($pdo);

if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $logged_in = $Controller->login($username, $password);

    $_SESSION['user_id'] = $logged_in["id"];

    if (!empty($logged_in)) {
       


        header("Location: ../index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">

    <title>Pagina de login</title>
</head>

<body>
    <header class="">

        <h1>Reverdecer</h1>
    </header>

    <section class="marginend">
        <div class="login">
            <form method="POST">
                <input required type="text" name="username" placeholder="nome de usuário">
                <input required type="password" name="password" placeholder="senha">

                <button type="submit">Login</button>
            </form>
            <p>

        </div>
        Não tem uma conta? registre uma </p>
        <div class="outro"><button><a href="register.php">aqui!</a></button></div>



        <?php
        if (isset($logged_in) && empty($logged_in)) {
            echo "usuário ou senha estão errados, tente novamente!";
        } else {
        }
        ?>
    </section>


</body>

</html>