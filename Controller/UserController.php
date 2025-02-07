<?php
require_once  '/../Model/UserModel.php';

class UserController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = new UserModel();

            if ($user->login($username, $password)) {
                header("Location: /index.php");
                exit;
            } else {
                $error = "Usuário ou senha incorretos.";
                require_once  '/../View/login.php';
            }
        } else {
            require_once  '/../View/login.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = new UserModel();

            if ($user->register($username, $password)) {
                header("Location: /View/login.php");
                exit;
            } else {
                $error = "Erro ao cadastrar usuário.";
                require_once  '/../View/register.php';
            }
        } else {
            require_once  '/../View/register.php';
        }
    }
}
?>
