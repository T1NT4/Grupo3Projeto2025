<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Resíduos Mensal</title>
    
</head>
<body>
    <h2>Relatório de Usuários e Resíduos</h2>

    <table>
        <thead>
            <tr>
                <th>username</th>
                <th>password</th>
                <th>data de registro</th>
                
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($resultados)): ?>
                <?php foreach ($resultados as $resultados): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['nome']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['data_registro']) ?></td>
                        <td><?= $row['tipo'] ? htmlspecialchars($row['tipo']) : "Nenhum resíduo cadastrado" ?></td>
                        <td><?= $row['quantidade'] ? htmlspecialchars($row['quantidade']) : "-" ?></td>
                        <td><?= $row['data_coleta'] ? htmlspecialchars($row['data_coleta']) : "-" ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Nenhum dado encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>