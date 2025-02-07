<?php
require_once  'C:\Turma2\xampp\htdocs\Grupo3Projeto2025\Model\UserModel.php';

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
                require_once  '/../view/login.php';
            }
        } else {
            require_once  '/../view/login.php';
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
                require_once  '/../view/register.php';
            }
        } else {
            require_once  '/../view/register.php';
        }
    }
}
?>