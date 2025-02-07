<?php
require_once __DIR__ . '/../config.php';

class UserModel {
    // Função para cadastrar um usuário
    public function register($username, $password) {
        global $pdo;

        // Higieniza e valida os dados de entrada
        $username = trim($username);
        $password = trim($password);

        if (empty($username) || empty($password)) {
            return false; // Dados inválidos
        }

        // Hash da senha
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepara e executa a inserção no banco
        try {
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            return $stmt->execute([$username, $hashedPassword]);
        } catch (Exception $e) {
            // Em caso de erro no banco de dados, loga o erro
            error_log("Erro ao cadastrar usuário: " . $e->getMessage());
            return false;
        }
    }

    // Função para login do usuário
    public function login($username, $password) {
        global $pdo;

        // Higieniza e valida os dados de entrada
        $username = trim($username);
        $password = trim($password);

        if (empty($username) || empty($password)) {
            return false; // Dados inválidos
        }

        try {
            // Prepara e executa a consulta
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            // Verifica a senha
            if ($user && password_verify($password, $user['password'])) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start(); // Inicia a sessão se ainda não estiver iniciada
                }
                $_SESSION['user'] = $user['username']; // Salva o nome do usuário na sessão
                return true;
            }
        } catch (Exception $e) {
            // Em caso de erro no banco de dados, loga o erro
            error_log("Erro ao fazer login: " . $e->getMessage());
        }

        return false;
    }
}
?>
