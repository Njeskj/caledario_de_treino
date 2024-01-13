<?php
// No arquivo "logout.php"

// Inicie a sessão
session_start();

// Destrua a sessão (encerra a sessão e limpa os dados da sessão)
session_destroy();

// Redirecione o usuário de volta para a página de login
header("Location: index.php");
exit;
?>
