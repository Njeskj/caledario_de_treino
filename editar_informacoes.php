<?php
// No arquivo "editar_informacoes.php"

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

// Obtém as informações pessoais atuais do usuário
$conn = conectar();
$sql = "SELECT * FROM usuarios WHERE usuario_id = '$usuario_id'";
$result = $conn->query($sql);
$dados_usuario = $result->fetch_assoc();
$conn->close();

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $novo_nome = $_POST["novo_nome"];
    $nova_email = $_POST["nova_email"];

    // Realizar a validação dos dados (você pode adicionar mais validações conforme necessário)

    // Conectar ao banco de dados
    $conn = conectar();

    // Atualizar as informações pessoais do usuário no banco de dados
    $sql = "UPDATE usuarios SET nome = '$novo_nome', email = '$nova_email' WHERE usuario_id = '$usuario_id'";
    if ($conn->query($sql) === TRUE) {
        // Atualização bem-sucedida, redirecionar para a página de dashboard ou outra página de sua escolha
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Erro ao atualizar as informações pessoais: " . $conn->error;
    }

    $conn->close();
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
        <h1>Editar Informações Pessoais</h1>
        <form method="POST">
            <label for="novo_nome">Nome:</label>
            <input type="text" name="novo_nome" value="<?php echo $dados_usuario['nome']; ?>" required><br>
            <label for="nova_email">Email:</label>
            <input type="email" name="nova_email" value="<?php echo $dados_usuario['email']; ?>" required><br>
            <input type="submit" value="Salvar Alterações">
        </form>
    </div>
</body>
</html>
