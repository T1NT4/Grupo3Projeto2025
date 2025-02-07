<?php
session_start();

// Limpa todas as variáveis de sessão
session_unset();

// Destrói a sessão
session_destroy();

// Redireciona para a página inicial
header("Location: /Grupo3Projeto2025/index.php");
exit;
?>
