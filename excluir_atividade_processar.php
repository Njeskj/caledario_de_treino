<?php
// No arquivo "excluir_atividade_processar.php"

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['data'];
    $atividade_id = $_POST['atividade_id'];
    
    // Valide a data para garantir que está no formato correto (AAAA-MM-DD)
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $data)) {
        echo "Data inválida.";
        exit;
    }

    // Inclua o arquivo de conexão
    require_once "conexao.php";

    // Obtenha a conexão
    $conn = conectar();

    // Consulta para excluir a atividade pelo ID
    $sql = "DELETE FROM atividades WHERE id = $atividade_id AND data = '$data'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Atividade excluída com sucesso!";
    } else {
        echo "Erro ao excluir atividade: " . $conn->error;
    }

    // Feche a conexão
    $conn->close();
}
?>
