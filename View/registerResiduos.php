<?php
include_once  'C:\Turma2\xampp\htdocs\Grupo3Projeto2025\Controller\ResiduoController.php';
include_once 'C:\Turma2\xampp\htdocs\Grupo3Projeto2025\config.php';

$Controller = new ResiduoController($pdo);

if (!empty($_POST)) {
    $tipo_residuo = $_POST['tipo_residuo'];
    $peso = $_POST['peso'];
    $empresa_responsavel = $_POST['empresa_responsavel'];
    $endereco_residuo = $_POST['endereco_residuo'];
    $data_req =$_POST['data_req'];


    $registredResiduo = $Controller->registerResiduo($tipo_residuo, $peso, $empresa_responsavel, $endereco_residuo, $data_req);
    $error_code = 0;

    if ($registred && $error_code == null) {
        header("Location: Relatorio.php");
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
            <form method="POST" enctype="multipart/form-data">
                <select required name="Residuo" placeholder="Tipo do residuo">
                    <option value="organicos">Organicos</option>
                    <option value="reciclaveis">Reciclaveis</option>
                    <option value="especiais">Especiais</option>
                    <option value="rejeitos">Rejeitos</option>
                </select>
                <input type="number">Peso</input>
                <input type="number">Empresa responsavel</input>
                <input type="text">Endereço do residuo</input>
                <input type="date">Data de requisição de retiramento do residuo</input>
                <button type="submit">Cadastrar Residuo</button>
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