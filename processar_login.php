<?php
// No arquivo "processar_login.php"

// Verificar se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    // Realizar a validação dos dados (você pode adicionar mais validações conforme necessário)

    // Conectar ao banco de dados (ajuste as informações de conexão de acordo com o seu ambiente)
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "calendario";

    $conn = new mysqli($host, $username, $password, $database);

    // Verificar se a conexão foi estabelecida corretamente
    if ($conn->connect_error) {
        die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
    }

    // Preparar a consulta SQL para verificar o usuário e a senha no banco de dados
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Usuário encontrado, verificar a senha
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row["senha"])) {
            // Senha correta, fazer login e redirecionar para a página de dashboard ou outra página de sua escolha
            session_start();
            $_SESSION["usuario_id"] = $row["usuario_id"];
            $_SESSION["nome"] = $row["nome"];
            header("Location: dashboard.php"); // Substitua "dashboard.php" pelo nome da página que deseja redirecionar após o login
            exit;
        } else {
            // Senha incorreta
            echo "Senha incorreta.";
        }
    } else {
        // Usuário não encontrado
        echo "Usuário não encontrado.";
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
}
?>
