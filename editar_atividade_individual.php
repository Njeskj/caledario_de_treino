<?php
// No arquivo "editar_atividade_individual.php"

// Verifique se o parâmetro 'id' foi passado na URL
if (isset($_GET['id'])) {
    $atividade_id = $_GET['id'];

    // Inclua o arquivo de conexão
    require_once "conexao.php";

    // Obtenha a conexão
    $conn = conectar();

    // Consulta para obter os detalhes da atividade pelo ID
    $sql = "SELECT * FROM atividades WHERE id = $atividade_id";
    $result = $conn->query($sql);

    // Feche a conexão
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Atividade Individual</title>
</head>
<body>
    <?php
    // Inclua o arquivo de navegação
    require_once "menu.php";
    ?>

    <?php
    // Exiba os detalhes da atividade
    if (isset($_GET['id']) && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <h1>Editar Atividade Individual</h1>
        <form action="editar_atividade_processar_individual.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="<?php echo $row['titulo']; ?>" required>
            <br>
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" rows="4" required><?php echo $row['descricao']; ?></textarea>
            <br>
            <input type="submit" value="Salvar Alterações">
        </form>
        <?php
    } elseif (isset($_GET['id'])) {
        echo '<p>Atividade não encontrada para o ID especificado.</p>';
    } else {
        echo '<p>Nenhum ID de atividade especificado.</p>';
    }
    ?>
</body>
</html>
