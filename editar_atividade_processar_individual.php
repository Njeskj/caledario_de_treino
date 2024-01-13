<?php
// No arquivo "editar_atividade_processar_individual.php"

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $atividade_id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    
    // Valide os dados, se necessário
    // ...

    // Inclua o arquivo de conexão
    require_once "conexao.php";

    // Obtenha a conexão
    $conn = conectar();

    // Consulta para atualizar a atividade no banco de dados
    $sql = "UPDATE atividades SET titulo = '$titulo', descricao = '$descricao' WHERE id = $atividade_id";
    
    if ($conn->query($sql) === TRUE) {
        // Mensagem de sucesso
        echo "Atividade atualizada com sucesso! <br><br><br>Redirecionando a página...";
        
        // Redirecionar para a página de calendário após 2 segundos
        header("refresh:2;url=calendario.php");
    } else {
        echo "Erro ao atualizar atividade: " . $conn->error;
    }

    // Feche a conexão
    $conn->close();
}
?>
