<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Atividade</title>
    <link rel="stylesheet" type="text/css" href="estilos_adicionar.css">
</head>
<body>
    <?php
    // Inclua o arquivo "menu.php"
    require_once "menu.php";

    // Verifique se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = $_POST['titulo'];
        $data = $_POST['data'];
        $descricao = $_POST['descricao'];

        // Valide os dados, se necessário
        // ...

        // Inclua o arquivo de conexão
        require_once "conexao.php";

        // Obtenha a conexão
        $conn = conectar();

        // Consulta para inserir a nova atividade no banco de dados
        $sql = "INSERT INTO atividades (titulo, data, descricao) VALUES ('$titulo', '$data', '$descricao')";

        if ($conn->query($sql) === TRUE) {
            echo '<div class="mensagem-sucesso">Atividade adicionada com sucesso!</div>';
        } else {
            echo '<div class="mensagem-erro">Erro ao adicionar atividade: ' . $conn->error . '</div>';
        }

        // Feche a conexão
        $conn->close();
    }
    ?>

    <div class="container">
        <h1>Adicionar Nova Atividade</h1>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>
            <br>
            <label for="data">Data:</label>
            <input type="date" id="data" name="data" required>
            <br>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="4" required></textarea>
            <br>
            <input type="submit" value="Adicionar">
        </form>
    </div>
</body>
</html>
