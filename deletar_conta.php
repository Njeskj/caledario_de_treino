<?php
// No arquivo "deletar_conta.php"

// Inclua o arquivo de conexão
require_once "conexao.php";

// Inicie a sessão para recuperar os dados do usuário logado
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION["usuario_id"]) || !isset($_SESSION["nome"])) {
    // Se não estiver logado, redirecione para a página de login
    header("Location: login.php");
    exit;
}

// Dados do usuário logado
$usuario_id = $_SESSION["usuario_id"];
$nome = $_SESSION["nome"];

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter a confirmação para deletar a conta
    $confirmacao = $_POST["confirmacao"];

    if ($confirmacao === "confirmar") {
        // Conectar ao banco de dados
        $conn = conectar();

        // Deletar a conta do usuário do banco de dados
        $sql = "DELETE FROM usuarios WHERE usuario_id = '$usuario_id'";
        if ($conn->query($sql) === TRUE) {
            // Deleção bem-sucedida, redirecionar para a página de login ou outra página de sua escolha
            session_destroy(); // Encerra a sessão após deletar a conta
            header("Location: login.php");
            exit;
        } else {
            echo "Erro ao deletar a conta: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Confirmação inválida. A conta não foi deletada.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Adicione os metadados, título e links para os estilos -->
</head>
<body>
    <?php
    // Inclua o arquivo "menu.php"
    require_once "menu.php";
    ?>

    <div class="container">
        <h1>Deletar Conta</h1>
        <p>Tem certeza de que deseja deletar sua conta? Esta ação é irreversível.</p>
        <form method="POST">
            <input type="text" name="confirmacao" placeholder="Digite 'confirmar' para confirmar" required><br>
            <input type="submit" value="Deletar Conta">
        </form>
    </div>
</body>
</html>
