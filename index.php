<?php
session_start(); 

// Verifica se a sessão foi iniciada corretamente
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once __DIR__ . '/Controller/UserController.php';

// Criação de instância do controlador com nome de variável no padrão de minúsculas
$userController = new UserController();

// Agora você pode chamar métodos dentro do controlador, por exemplo:
// $userController->login();
// Ou outras ações conforme necessário

?>
