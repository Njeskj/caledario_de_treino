<?php
// No arquivo "editar_perfil.php"

// Verifica se o usuário está logado e possui a sessão iniciada
session_start();
if (!isset($_SESSION['usuario_id'])) {
    // Se o usuário não estiver logado, redireciona para a página de login
    header("Location: login.php");
    exit();
}

// Exemplo de dados do usuário (substitua por dados reais do banco de dados)
$usuario_id = $_SESSION['usuario_id'];
// ...


// Dados do usuário logado
$usuario_id = $_SESSION["usuario_id"];
$nome = $_SESSION["nome"];
$email = $_SESSION["email"];
$data_nascimento = $_SESSION["data_nascimento"];
$telefone = $_SESSION["telefone"];
$endereco = $_SESSION["endereco"];
$bairro = $_SESSION["bairro"];
$cidade = $_SESSION["cidade"];
$estado = $_SESSION["estado"];
$pais = $_SESSION["pais"];
$cep = $_SESSION["cep"];

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $novo_nome = $_POST["novo_nome"];
    $novo_email = $_POST["novo_email"];
    $nova_data_nascimento = $_POST["nova_data_nascimento"];
    $novo_telefone = $_POST["novo_telefone"];
    $novo_endereco = $_POST["novo_endereco"];
    $novo_bairro = $_POST["novo_bairro"];
    $nova_cidade = $_POST["nova_cidade"];
    $novo_estado = $_POST["novo_estado"];
    $novo_pais = $_POST["novo_pais"];
    $novo_cep = $_POST["novo_cep"];

    // Realizar a validação dos dados (você pode adicionar mais validações conforme necessário)

    // Conectar ao banco de dados e atualizar as informações do usuário
    // (você precisa implementar essa parte de acordo com a sua lógica de conexão e atualização)
    // ...

    // Atualizar os dados na sessão
    $_SESSION["nome"] = $novo_nome;
    $_SESSION["email"] = $novo_email;
    $_SESSION["data_nascimento"] = $nova_data_nascimento;
    $_SESSION["telefone"] = $novo_telefone;
    $_SESSION["endereco"] = $novo_endereco;
    $_SESSION["bairro"] = $novo_bairro;
    $_SESSION["cidade"] = $nova_cidade;
    $_SESSION["estado"] = $novo_estado;
    $_SESSION["pais"] = $novo_pais;
    $_SESSION["cep"] = $novo_cep;

    // Redirecionar para o dashboard com uma mensagem de sucesso (você pode ajustar a mensagem conforme necessário)
    header("Location: dashboard.php?success=1");
    exit;
}
?>

<?php include 'header.php'; ?>

<link rel="stylesheet" href="estilos_editar_perfil.css">

    <?php
    // Inclua o arquivo "menu.php"
    require_once "menu.php";
    ?>

    <div class="container">
        <h1>Editar Perfil</h1>
        
        <div class="editar-perfil-form">
        <form action="processar_editar_perfil.php" method="post" enctype="multipart/form-data">

            <label for="imagem">Foto do Perfil:</label>
            <input type="file" name="imagem" id="imagem">

            <label for="novo_nome">Nome:</label>
            <input type="text" name="novo_nome" value="<?php echo $nome; ?>" required><br>

            <label for="novo_email">Email:</label>
            <input type="email" name="novo_email" value="<?php echo $email; ?>" required><br>

            <label for="nova_data_nascimento">Data de Nascimento:</label>
            <input type="date" name="nova_data_nascimento" value="<?php echo $data_nascimento; ?>" required><br>

            <label for="novo_telefone">Telefone:</label>
            <input type="text" name="novo_telefone" value="<?php echo $telefone; ?>" required><br>

            <label for="novo_endereco">Endereço:</label>
            <input type="text" name="novo_endereco" value="<?php echo $endereco; ?>" required><br>

            <label for="novo_bairro">Bairro:</label>
            <input type="text" name="novo_bairro" value="<?php echo $bairro; ?>" required><br>

            <label for="nova_cidade">Cidade:</label>
            <input type="text" name="nova_cidade" value="<?php echo $cidade; ?>" required><br>

            <label for="novo_estado">Estado:</label>
            <input type="text" name="novo_estado" value="<?php echo $estado; ?>" required><br>

            <label for="novo_pais">País:</label>
            <input type="text" name="novo_pais" value="<?php echo $pais; ?>" required><br>

            <label for="novo_cep">CEP:</label>
            <input type="text" name="novo_cep" value="<?php echo $cep; ?>" required><br>

            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
</div>


<?php include 'footer.php'; ?>
