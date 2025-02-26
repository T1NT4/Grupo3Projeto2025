<?php
include_once __DIR__.'/config.php'; // Certifique-se de que está pegando o arquivo corretamente

if(!isset($_COOKIE['id_user'])){
    header("Location: Index.php");
}

$user_id = $_COOKIE['id_user'];

if (!empty($_POST)) {
    // Coleta os dados enviados via POST
    $tipo_residuo = $_POST['tipo_residuo'] ?? null;
    $peso = $_POST['peso'] ?? null;
    $empresa_responsavel = $_POST['empresa_responsavel'] ?? null;
    $endereco_residuo = $_POST['endereco_residuo'] ?? null;
    $data_req = $_POST['data_req'] ?? null;

    // Verifica se todos os campos obrigatórios foram preenchidos
    if (!$user_id || !$tipo_residuo || !$peso || !$empresa_responsavel || !$endereco_residuo || !$data_req) {
        // Redireciona com um erro caso algum campo esteja vazio
        header("Location: registerResiduos.php?error=Todos os campos são obrigatórios!");
        exit();
    }

    try {
        // Prepara o SQL para inserir os dados no banco
        $sql = "INSERT INTO residuos (user_id, tipo_residuo, peso, empresa_responsavel, endereco_residuo, data_req)
                VALUES (? , ?, ?, ?, ?, ?)";

        // Executa a consulta no banco
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([ $user_id, $tipo_residuo, $peso, $empresa_responsavel, $endereco_residuo, $data_req]);

        // Redireciona para a página com uma mensagem de sucesso
        header("Location: relatorio.php");
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
    <link rel="stylesheet" href="estilo.css">
    <title>FORMULÁRIO</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <?php
    $logado = true;
    include __DIR__ . "/header.php";
    ?>
    
    <script src="headerResponsivo.js"></script>
    
    <main class="formular">
        <div class="form1">
            <form action="" method="post" class="form registrar">
                <label for="tipo_residuo">Tipo:</label>
                <div class="checkbox">
                    <div>
                    <input type="radio" id="reciclavel" name="tipo_residuo" value="reciclável" checked required />
                    <label for="reciclavel">reciclável</label>
                    </div>
                    
                    <div>
                    <input type="radio" id="organico" name="tipo_residuo" value="orgânico" required />
                    <label for="organico"> orgânico </label>
                    </div>
                </div>
                <div></div>

                <label for="peso">Peso:</label>
                <input type="number" name="peso" class="btn-form" step="0.01" required />
                <label for="peso">kg</label>
                
                <label for="data_req">Data de requisição:</label>
                <input type="date" name="data_req" class="btn-form" value="<?=date("Y-m-d")?>"required>
                <div></div>
                
                <label for="endereco_residuo">Endereço do Resíduo:</label>
                <input type="text" name="endereco_residuo" class="btn-form" required>
                <div></div>
                
                <label for="descricao">Empresa Responsável:</label>
                <input type="text" name="empresa_responsavel" class="btn-form" required>
                <div></div>
                
                <button type="submit">Registrar</button>

            </form>
        </div>
    </main>  
    
<?php
    include __DIR__."/footer.html";
    ?>
</body>

</html>