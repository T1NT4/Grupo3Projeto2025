<?php
include_once __DIR__ . "/Controller/UserController.php";
include_once __DIR__ . "/config.php";

$Controller = new UserController($pdo);


?><!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reverdecer</title>
    <link rel="stylesheet" href="">
</head>

<body>
    <?php if(!isset($_COOKIE['id_user'])) {?>
<button><a href="View/login.php">login</a></button>
<?php }else{?>
<button><a href="View/user.php">Tela do Usuario</a></button>
<?php }?>
   
</body>

</html>


