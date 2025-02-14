<?php
include_once '../config.php'; // Certifique-se de que está pegando o arquivo corretamente

// Verifique se o usuário está logado e se a sessão do usuário existe
session_start();
$user_id = $_SESSION['user_id'] ?? null;  // Garantir que user_id é recuperado da sessão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados enviados via POST
    $tipo_residuo = $_POST['tipo_residuo'] ?? null;
    $peso = $_POST['peso'] ?? null;
    $empresa_responsavel = $_POST['empresa_responsavel'] ?? null;
    $endereco_residuo = $_POST['endereco_residuo'] ?? null;
    $data_req = $_POST['data_req'] ?? null;

    // Verifica se todos os campos obrigatórios foram preenchidos
    if (!$tipo_residuo || !$peso || !$empresa_responsavel || !$endereco_residuo || !$data_req || !$user_id) {
        // Redireciona com um erro caso algum campo esteja vazio
        header("Location: registerResiduos.php?error=Todos os campos são obrigatórios!");
        exit();
    }

    try {
        // Prepara o SQL para inserir os dados no banco
        $sql = "INSERT INTO residuos (tipo_residuo, peso, empresa_responsavel, endereco_residuo, data_req, user_id) 
                VALUES (:tipo_residuo, :peso, :empresa_responsavel, :endereco_residuo, :data_req, :user_id)";

        // Executa a consulta no banco
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':tipo_residuo' => $tipo_residuo,
            ':peso' => $peso,
            ':empresa_responsavel' => $empresa_responsavel,
            ':endereco_residuo' => $endereco_residuo,
            ':data_req' => $data_req,
            ':user_id' => $user_id,  // Aqui você insere o user_id
        ]);

        // Redireciona para a página com uma mensagem de sucesso
        header("Location: registerResiduos.php?success=Resíduo cadastrado com sucesso!");
        exit();
    } catch (PDOException $e) {
        // Redireciona em caso de erro com uma mensagem de erro
        header("Location: registerResiduos.php?error=Erro ao registrar resíduo");
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reverdecer - registrar residuos</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <header>
        <h1>Reverdecer</h1>
    </header>
    <section>
        <div>
            <form method="POST" action="registerResiduos.php">
                <label for="tipo_residuo">Tipo de Resíduo:</label>
                <select name="tipo_residuo" required>
                    <option value="organicos">Orgânicos</option>
                    <option value="recicláveis">Recicláveis</option>
                    <option value="especiais">Especiais</option>
                    <option value="rejeitos">Rejeitos</option>
                </select>

                <label for="peso">Peso (kg):</label>
                <input type="number" step="0.01" name="peso" required>

                <label for="empresa_responsavel">Empresa Responsável:</label>
                <input type="text" name="empresa_responsavel" required>

                <label for="endereco_residuo">Endereço do Resíduo:</label>
                <input type="text" name="endereco_residuo" required>

                <label for="data_req">Data de Requisição:</label>
                <input type="date" name="data_req" required>

                <button type="submit">Cadastrar Resíduo</button>
            </form>

        </div>






        <?php
        if (isset($registredResiduo) && !$registredResiduo) {
            echo "<p>esse residuo ja está cadastrado! tente outro tipo de residuo ou mude suas informações.</p>";
        }
        if (isset($error_code) && $error_code != null) {
            echo $error_code;
        }
        ?>

    </section>


</body>

</html>