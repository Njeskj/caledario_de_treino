<?php
// autenticar.php

// Inicie a sessão
session_start();

// Simule a verificação do usuário e senha (substitua isso pela autenticação real)
$usuario_valido = "usuario";
$senha_valida = "senha";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $usuario_valido && $password === $senha_valida) {
        // Autenticação bem-sucedida, redirecione para a página calendario.php
        $_SESSION['usuario_autenticado'] = true;
        header("Location: calendario.php");
        exit;
    } else {
        // Autenticação falhou, redirecione novamente para a página de login com uma mensagem de erro
        $_SESSION['mensagem_erro'] = "Usuário ou senha inválidos.";
        header("Location: login.php");
        exit;
    }
} else {
    // Se não foram passados os dados do formulário, redirecione para a página de login
    header("Location: login.php");
    exit;
}
?>
