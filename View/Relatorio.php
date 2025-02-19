
<style>
    @import url('https://fonts.googleapis.com/css2?family=Itim&display=swap');



* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}


html,
body {
    height: 100%;
    width: 100%;
    background-color: #f8f8eb;
    font-family: 'Itim';
}

.logo {
    width: 200px;
}


nav {
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #98ca76;
    position: relative;
    height: 90px;
}

nav ul {
    display: flex;
    gap: 20px;
    align-items: center;
}

nav ul li {
    list-style: none;
}

nav ul li a {
    text-decoration: none;
    color: #fff;
    font-size: 20px;
}


nav a:hover,
nav a.active {
    border-bottom: 2px solid #427023;
    color: #427023;
    transition: 0.1s;
}

.menu-icon {
    display: none;
}


.btn-login{
    display: flex;
    width: 20%;
    justify-content: space-between;
    padding: 10px;
    gap: 20px;
    text-decoration: none;
}

.btn-login button{
    border: none;
    text-decoration: none;
    width: 100px;
    height: 45px;
    border-radius: 20px;
    font-size: 15px;
    gap: 20px;
}

.login-btn button{
    background-color: #5699299a;
    color: #fff;
    font-family: "Itim";
}
   


.login-btn button:hover{
    background-color:  #fff;
    color: #569929;
}


.enter-btn button{
    background-color: #56992900;
    border: 2px solid #fff;
    color: #fff;
    font-family: "Itim";
}


@media (max-width: 700px) {

    nav ul {
        position: absolute;
        top: 70px;
        left: 0;
        right: 0;
        flex-direction: column;
        text-align: center;
        background-color: #98ca76;
        gap: 0;
        overflow: hidden;
    }

    nav ul li {
        padding: 20px;
    }

    .menu-icon {
        display: block;
    }

    .menu-icon i {
        color: #fff;
        font-size: 28px;
       
    }
}
</style>
<?php
include_once '../config.php'; // Conexão com o banco
session_start();

// Obtém o mês e ano atual
$dataAtual = date('Y-m') . '%'; // Exemplo: "2024-02%"

try {
    // Query para buscar registros do mesmo mês e ano atual
    $sql = "SELECT u.username, r.tipo_residuo, r.peso, r.empresa_responsavel, 
                   r.endereco_residuo, r.data_req 
            FROM residuos r
            JOIN users u ON r.user_id = u.id
            WHERE r.data_req LIKE ?
            ORDER BY r.data_req DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$dataAtual]); // Passando diretamente no execute()
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar os dados: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros do Mês Atual</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<button><a href="../index.php">Voltar para tela inicial</a></button>

<h2>Resíduos cadastrados neste mês (<?= date('F Y') ?>)</h2>

<table>
    <thead>
        <tr>
            <th>Usuário</th>
            <th>Tipo de Resíduo</th>
            <th>Peso (kg)</th>
            <th>Empresa Responsável</th>
            <th>Endereço do Resíduo</th>
            <th>Data da Requisição</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($resultados)): ?>
            <?php foreach ($resultados as $resultado): ?>
                <tr>
                    <td><?= htmlspecialchars($resultado['username']) ?></td>
                    <td><?= htmlspecialchars($resultado['tipo_residuo']) ?></td>
                    <td><?= htmlspecialchars($resultado['peso']) ?> kg</td>
                    <td><?= htmlspecialchars($resultado['empresa_responsavel']) ?></td>
                    <td><?= htmlspecialchars($resultado['endereco_residuo']) ?></td>
                    <td><?= htmlspecialchars($resultado['data_req']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Nenhum dado encontrado para este mês.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>

