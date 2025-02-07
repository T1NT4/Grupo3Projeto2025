<?php
require_once  '/../models/User.php';

class UserController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = new UserModel();

            if ($user->login($username, $password)) {
                header("Location: index.php");
                exit;
            } else {
                $error = "Usuário ou senha incorretos.";
                require_once  '/../views/login.php';
            }
        } else {
            require_once  '/../views/login.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = new UserModel();

            if ($user->register($username, $password)) {
                header("Location: login.php");
                exit;
            } else {
                $error = "Erro ao cadastrar usuário.";
                require_once  '/../views/register.php';
            }
        } else {
            require_once  '/../views/register.php';
        }
    }
}
?>