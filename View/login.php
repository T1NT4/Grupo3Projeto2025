<?php
require_once __DIR__ . "/../Controller/UserController.php";
require_once __DIR__ . "/../config.php";


session_start();

$controller = new UserController();
$controller->login();
?>

<h2>Login</h2>


<?php
if (isset($_SESSION['error'])) {
    echo "<p style='color:red;'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}
?>

<form method="POST" action="">
    <input type="text" name="username" placeholder="Usuário" required>
    <input type="password" name="password" placeholder="Senha" required>
    <button type="submit">Entrar</button>
</form>

<a href="/../View/register.php">Criar Conta</a>