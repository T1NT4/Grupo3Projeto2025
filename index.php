<?php
session_start();


if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once __DIR__ . '/Controller/UserController.php';


$userController = new UserController();
$userController->login();
