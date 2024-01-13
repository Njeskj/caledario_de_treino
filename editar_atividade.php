<?php
// No arquivo "editar_atividade.php"

// Inclua o arquivo de conexão
require_once "conexao.php";

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['data'];
    
    // Valide a data para garantir que está no formato correto (AAAA-MM-DD)
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $data)) {
        echo "Data inválida.";
        exit;
    }

    // Obtenha a conexão
    $conn = conectar();

    // Consulta para obter as atividades da data especificada
    $sql = "SELECT * FROM atividades WHERE data = '$data'";
    $result = $conn->query($sql);

    // Feche a conexão
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Atividade</title>
</head>
<body>
    <?php
    // Inclua o arquivo de navegação
    require_once "menu.php";
    ?>

    <!-- Formulário para selecionar a data -->
    <h1>Editar Atividade</h1>
    <form action="" method="post">
        <label for="data">Selecione a data:</label>
        <input type="date" name="data" required>
        <input type="submit" value="Buscar Atividades">
    </form>

    <?php
    // Exiba a lista de atividades para a data selecionada
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $result->num_rows > 0) {
        echo '<h2>Atividades encontradas para a data selecionada:</h2>';
        echo '<form action="editar_atividade_processar.php" method="post">';
        echo '<input type="hidden" name="data" value="' . $data . '">';
        while ($row = $result->fetch_assoc()) {
            echo '<p>';
            echo '<strong>Título:</strong> ' . $row['titulo'] . ' ';
            echo '<strong>Descrição:</strong> ' . $row['descricao'] . ' ';
            // Adicionar botão "editar" para cada atividade
            echo '<a href="editar_atividade_individual.php?id=' . $row['id'] . '">Editar</a>';
            echo '</p>';
        }
        echo '</form>';
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo '<p>Nenhuma atividade encontrada para a data selecionada.</p>';
    }
    ?>
</body>
</html>
