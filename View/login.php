<?php
require_once __DIR__ . "/../Controller/UserController.php";
require_once __DIR__ . "/../config.php";




$controller = new UserController();
$controller->login();
?>

<h2>Login</h2>




<form method="POST" action="#">
    <input type="text" name="username" placeholder="Usuário" required>
    <input type="password" name="password" placeholder="Senha" required>
    <button type="submit">Entrar</button>
</form>

<a href="/../View/register.php">Criar Conta</a>

