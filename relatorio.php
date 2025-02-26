<?php
include_once __DIR__.'/config.php'; // Conexão com o banco

if(!isset($_COOKIE['id_user'])){
    header("Location: ../Index.php");
}
if(!empty($_POST)){
    $mes = $_POST['mes'];
    $ano = $_POST['ano'];
}else{
    $mes = (int)date('m');
    $ano = (int)date('Y');
    
}
if ($mes <= 9){
    $mes = "0$mes";
}

$user_id = $_COOKIE['id_user'];

// Obtém o mês e ano atual
$dataAtual = "%$ano-$mes%"; // Exemplo: "%2024-02%"
try {
    // Query para buscar registros do mesmo mês e ano atual
    $sql = "SELECT * 
            FROM residuos
            WHERE data_req LIKE ? AND
            user_id = ? 
            ORDER BY data_req DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$dataAtual, $user_id]); // Passando diretamente no execute()
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
    <title>RELATÓRIO</title>
    <link rel="stylesheet" href="estilo.css">
    <script defer src="app.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>

    
    <?php
    include __DIR__ . "/header.php";
    ?>

    <script src="headerResponsivo.js"></script>
    <script src="https://kit.fontawesome.com/f8e1a90484.js" crossorigin="anonymous"> </script>

    
    <main class="relatorio">
        <h2>Relatório</h2>
        <div class="tabela-relatorio">
            <!-- escolher mes do relatorio -->
            <form method="POST" class="escolher-mes">
                    <div>
                    <label for="mes">Mês do Relatório:</label>
                    <select name="mes">
                        <?php
                        $meses = [
                            [1, "Janeiro"],
                            [2, "Fevereiro"],
                            [3, "Março"],
                            [4, "Abril"],
                            [5, "Maio"],
                            [6, "Junho"],
                            [7, "Julho"],
                            [8, "Agosto"],
                            [9, "Setembro"],
                            [10, "Outubro"],
                            [11, "Novembro"],
                            [12, "Dezembro"]
                        ];
                        
                        echo "<option value='". $meses[$mes-1][0] ."'> ". $meses[$mes-1][1] ."</option>";
                        foreach ($meses as $mesz):?>
                        <option value="<?=$mesz[0]?>" ><?=$mesz[1]?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                    <div>
                    <label for="ano">Ano do Relatório:</label>
                    <select name="ano">
                        <option value="<?=$ano?>"><?=$ano?></option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                    </select>
                    </div>
                    <button type="submit">Resgatar formulario do Mês.</button>
            </form>
            <div></div>
                <div class="verde">TIPO</div>
                <div class="verde">PESO (kg)</div>
                <div class="verde">EMPRESA RESPONSÁVEL</div>
                <div class="verde">ENDEREÇO DO RESÍDUO</div>
                <div class="verde">DATA</div>
            <div></div>
         <?php if (!empty($resultados)): $total = 0; ?>
                <?php foreach ($resultados as $resultado): $total += $resultado['peso']?>
                    <div></div>
                        <div class="branco"><?= htmlspecialchars($resultado['tipo_residuo']) ?></div>
                        <div class="branco"><?= htmlspecialchars($resultado['peso']) ?> kg</div>
                        <div class="branco"><?= htmlspecialchars($resultado['empresa_responsavel']) ?></div>
                        <div class="branco"><?= htmlspecialchars($resultado['endereco_residuo']) ?></div>
                        <div class="branco"><?= htmlspecialchars(date("d/m/Y", strtotime($resultado['data_req']))) ?></div>
                    <div></div>
                <?php endforeach; ?>
                <div></div>
                <div class="verde">TOTAL: </div>
                <div class="branco"><?=$total?> kg</div>
                <div></div>
            <?php else: ?>
                <div></div>
                    <div class="branco tem-nada"> Nenhum dado Encontrado    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>
  
<?php
    include __DIR__."/footer.html";
    ?>
</body>

</html>