<?php
include_once '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mensagem = ($_POST['mensagem']);
    $data_envio = date("Y-m-d H:i:s" . ".000000");

    if (!empty($mensagem)) {
        $sql = "INSERT INTO feedbacks (mensagem) VALUES(?)";
        $stmt = $pdo->prepare($sql);


        if ($stmt->execute([$mensagem])) {
            echo "Feedback enviado com sucesso!";
        } else {
            echo "Erro ao enviar o feedback.";
        }
    } else {
        echo "O campo de feedback não pode estar vazio!";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
</head>

<body>
    <form action="#" method="POST">
        <textarea name="mensagem" required placeholder="Digite seu feedback..."></textarea>
        <br>
        <button type="submit">Enviar Feedback</button>
    </form>
</body>

</html>