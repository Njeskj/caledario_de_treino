<!-- upload_imagem.php -->
<?php
if ($_FILES["imagem"]["error"] == 0) {
    $nome_arquivo = $_FILES["imagem"]["name"];
    $caminho_temporario = $_FILES["imagem"]["tmp_name"];
    $caminho_destino = "img/perfil/usuarios/" . $nome_arquivo;
    
    if (move_uploaded_file($caminho_temporario, $caminho_destino)) {
        // A imagem foi enviada com sucesso, você pode salvar o caminho no banco de dados do usuário.
        // Por exemplo: UPDATE usuarios SET caminho_imagem = '$caminho_destino' WHERE id = $usuario_id;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Ocorreu um erro ao enviar a imagem.";
    }
}
?>
