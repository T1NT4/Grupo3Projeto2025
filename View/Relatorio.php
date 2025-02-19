<?php
include_once '../config.php'; // Conexão com o banco
session_start();
try {
    $sql = "SELECT u.username, r.tipo_residuo, r.peso, r.empresa_responsavel, 
                   r.endereco_residuo, r.data_req 
            FROM residuos r
            JOIN users u ON r.user_id = u.id
            ORDER BY r.data_req DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
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
    <title>Relatório de Usuários e Resíduos</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
<button><a href="../index.php">Voltar para tela inicial</a></button>
    <h2>Relatório de Usuários e Resíduos</h2>

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
                <?php foreach ($resultado as $resultados): ?>
                    <tr>
                        <td><?= htmlspecialchars($resultados['username']) ?></td>
                        <td><?= htmlspecialchars($resultados['tipo_residuo']) ?></td>
                        <td><?= htmlspecialchars($resultados['peso']) ?> kg</td>
                        <td><?= htmlspecialchars($resultados['empresa_responsavel']) ?></td>
                        <td><?= htmlspecialchars($resultados['endereco_residuo']) ?></td>
                        <td><?= htmlspecialchars($resultados['data_req']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Nenhum dado encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
