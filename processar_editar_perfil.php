<!-- processar_editar_perfil.php -->
<?php
// Verifica se o usuário está logado e possui a sessão iniciada
session_start();
if (!isset($_SESSION['usuario_id'])) {
    // Se o usuário não estiver logado, redireciona para a página de login
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

if ($_FILES["imagem"]["error"] == 0) {
    $nome_arquivo = $_FILES["imagem"]["name"];
    $caminho_temporario = $_FILES["imagem"]["tmp_name"];
    $caminho_destino = "img/perfil/usuarios/" . $nome_arquivo;
    
    if (move_uploaded_file($caminho_temporario, $caminho_destino)) {
        // A imagem foi enviada com sucesso, você pode salvar o caminho no banco de dados do usuário.
        // Por exemplo:
        // UPDATE usuarios SET caminho_imagem = '$caminho_destino' WHERE id = $usuario_id;

        // Redirecionar de volta para a página de edição do perfil.
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Ocorreu um erro ao enviar a imagem.";
    }
}
?>
