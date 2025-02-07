<?php
session_start();
session_destroy();
header("Location: /Grupo3Projeto2025/index.php");
exit;
?>