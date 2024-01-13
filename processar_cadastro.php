<?php
// No arquivo "processar_cadastro.php"

// Verificar se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $nome = $_POST["nome"];
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

    // Criptografar a senha antes de armazenar no banco de dados (opcional, mas recomendado)
    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    // Preparar a consulta SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO usuarios (nome, usuario, senha) VALUES ('$nome', '$usuario', '$senhaCriptografada')";

    // Executar a consulta SQL
    if ($conn->query($sql) === TRUE) {
        // Cadastro realizado com sucesso, redirecionar para index.php
        header("Location: index.php");
        exit; // Certifique-se de incluir um exit para interromper a execução do script após o redirecionamento
    } else {
        // Erro ao cadastrar o usuário
        echo "Erro ao cadastrar o usuário: " . $conn->error;
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
}
?>
