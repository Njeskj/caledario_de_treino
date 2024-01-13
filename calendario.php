<?php
// No arquivo "calendario.php"

// Defina o locale para pt-BR
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

// Inicie a sessão
session_start();

// Verifique se o usuário está autenticado
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['usuario_autenticado'] !== true) {
    // Se o usuário não estiver autenticado, redirecione para a página de login
    header("Location: login.php");
    exit;
}

// Inclua o arquivo de conexão
require_once "conexao.php";

// Obtenha a conexão
$conn = conectar();

// Verificar se o botão de atividades anteriores foi clicado
if (isset($_GET['atividades_anteriores'])) {
    $dataAtual = date('Y-m-d');
    $sql = "SELECT * FROM atividades WHERE data < '$dataAtual' ORDER BY data DESC";
} else {
    $dataAtual = date('Y-m-d');
    $sql = "SELECT * FROM atividades WHERE data = '$dataAtual'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Calendário de Atividades Diárias</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <?php
    // Inclua o arquivo "menu.php"
    require_once "menu.php";
    ?>

    <h1>Calendário de Atividades Diárias</h1>

    <?php
    // Adicionar os botões de navegação
    echo '<div class="botoes-navegacao">';
    echo '<a href="?atividades_anteriores=true" class="botao-atividades-anteriores">Atividade Anterior</a>';
    echo '<a href="?proxima_atividade=true" class="botao-proxima-atividade">Próxima Atividade</a>';
    echo '</div>';
    ?>

    <table class="atividades-table">
        <!-- Cabeçalho da tabela -->
        <tr>
            <th>Data</th>
            <th>Descrição da Atividade</th>
        </tr>

        <?php
        // Exiba a atividade da data atual
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<tr>';
            if (strtotime($row['data']) !== false) {
                $dataFormatada = strftime('%A, %d de %B de %Y', strtotime($row['data']));
                echo '<td>' . $dataFormatada . '</td>';
            } else {
                echo '<td>Data Inválida</td>';
            }
            echo '<td>' . $row['descricao'] . '</td>';
            echo '</tr>';
        } else {
            echo '<tr><td colspan="2">Nenhuma atividade encontrada para hoje.</td></tr>';
        }
        ?>
    </table>

    <?php
    // Feche a conexão
    $conn->close();
    ?>
</body>
</html>
