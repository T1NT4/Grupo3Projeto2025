<?php
require_once __DIR__ . "/../Controller/UserController.php";
require_once __DIR__ . "/../config.php";

// Inicia a sessão para capturar mensagens de erro
session_start();

$controller = new UserController();
$controller->register();
?>

<h2>Register</h2>

<!-- Exibe mensagem de erro se houver -->
<?php
if (isset($_SESSION['error'])) {
    echo "<p style='color:red;'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']); // Limpa a mensagem de erro após exibi-la
}
?>

<form method="POST" action="">
    <input type="text" name="username" placeholder="Usuário" required>
    <input type="password" name="password" placeholder="Senha" required>
    <button type="submit">Criar Conta</button>
</form>
