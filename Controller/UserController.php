<?php
require_once __DIR__ . '/../Model/UserModel.php';

class UserController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = new UserModel();

            if ($user->login($username, $password)) {
                header("Location: index.php");
                exit;
            } else {

                session_start();
                $_SESSION['error'] = "Usuário ou senha incorretos.";
                header("Location: /View/login.php");
                exit;
            }
        } else {

            header("Location: /View/login.php");
            exit;
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = new UserModel();

            if ($user->register($username, $password)) {
                header("Location: /View/login.php");
                exit;
            } else {

                session_start();
                $_SESSION['error'] = "Erro ao cadastrar usuário.";
                header("Location: /View/register.php");
                exit;
            }
        } else {

            header("Location: /View/register.php");
            exit;
        }
    }
}
