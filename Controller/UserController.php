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
                header("Location: /Grupo3Projeto2025/index.php");
                exit;
            } else {

                session_start();
                $_SESSION['error'] = "Usuário ou senha incorretos.";
                header("Location: /Grupo3Projeto2025/View/login.php");
                exit;
            }
        } else {

            header("Location: /Grupo3Projeto2025/View/login.php");
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
                header("Location: /Grupo3Projeto2025/View/login.php");
                exit;
            } else {

                session_start();
                $_SESSION['error'] = "Erro ao cadastrar usuário.";
                header("Location: /Grupo3Projeto2025/View/register.php");
                exit;
            }
        } else {

            header("Location: /Grupo3Projeto2025/View/register.php");
            exit;
        }
    }
}
