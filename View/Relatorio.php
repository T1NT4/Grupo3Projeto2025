
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
    <title>Registros do Mês Atual</title>
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
                        <td><?= htmlspecialchars($resultado['tipo_residuo']) ?></td>
                        <td><?= htmlspecialchars($resultado['peso']) ?> kg</td>
                        <td><?= htmlspecialchars($resultado['empresa_responsavel']) ?></td>
                        <td><?= htmlspecialchars($resultado['endereco_residuo']) ?></td>
                        <td><?= htmlspecialchars($resultado['data_req']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Nenhum dado encontrado.</td>
                </tr>
            <?php endif; ?>
            <form method="POST">
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
                <br>
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
                <br>
                <button type="submit">Resgatar formulario do Mês.</button>
            </form>
        </tbody>
    </table>
    <button><a href="registerResiduos.php">Registrar Residuos</a></button>
<?php
    include __DIR__."/footer.html";
    ?>
</body>
</html>

