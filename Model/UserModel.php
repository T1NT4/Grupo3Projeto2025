<?php
require_once __DIR__ . '/../config.php';

class UserModel
{

    public function register($username, $password)
    {
        global $pdo;


        $username = trim($username);
        $password = trim($password);

        if (empty($username) || empty($password)) {
            return false; // 
        }


        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


        try {
            $stmt = $pdo->prepare("INSERT INTO Reverdecer (username, password) VALUES (?, ?)");
            return $stmt->execute([$username, $hashedPassword]);
        } catch (Exception $e) {

            error_log("Erro ao cadastrar usuário: " . $e->getMessage());
            return false;
        }
    }


    public function login($username, $password)
    {
        global $pdo;


        $username = trim($username);
        $password = trim($password);

        if (empty($username) || empty($password)) {
            return false;
        }

        try {

            $stmt = $pdo->prepare("SELECT * FROM Reverdecer WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch();


            if ($user && password_verify($password, $user['password'])) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['user'] = $user['username'];
                return true;
            }
        } catch (Exception $e) {

            error_log("Erro ao fazer login: " . $e->getMessage());
        }

        return false;
    }
}
