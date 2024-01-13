<?php
// No arquivo "datas_com_atividades.php"

// Inclua o arquivo de conexão
require_once "conexao.php";

// Obtenha a conexão
$conn = conectar();

// Consulta para obter as datas com atividades
$sql = "SELECT DISTINCT data FROM atividades";
$result = $conn->query($sql);

// Feche a conexão
$conn->close();

// Crie um array para armazenar as datas com atividades
$datas_com_atividades = array();
while ($row = $result->fetch_assoc()) {
    $datas_com_atividades[] = $row['data'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Datas com Atividades</title>
</head>
<body>

<?php
// Em cada arquivo PHP (por exemplo, "calendario.php", "adicionar_atividade.php", etc.)

// Inclua o arquivo de navegação
require_once "menu.php";

// O restante do código do arquivo continua aqui...
?>


    <h1>Datas com Atividades</h1>
    <?php
    if (count($datas_com_atividades) > 0) {
        echo "<ul>";
        foreach ($datas_com_atividades as $data) {
            echo "<li>$data</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Não foram encontradas datas com atividades.</p>";
    }
    ?>
</body>
</html>
