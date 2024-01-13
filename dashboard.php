<?php
// No arquivo "dashboard.php"

// Inclua o arquivo de conexão
require_once "conexao.php";

// Inicie a sessão para recuperar os dados do usuário logado
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION["usuario_id"]) || !isset($_SESSION["nome"])) {
    // Se não estiver logado, redirecione para a página de login
    header("Location: login.php");
    exit;
}

// Exemplo de dados do usuário (substitua por dados reais do banco de dados)
$usuario_id = $_SESSION['usuario_id'];
// ...

// Recupere o caminho da imagem do usuário do banco de dados e armazene na variável $caminho_imagem
// Por exemplo:
$caminho_imagem = "SELECT caminho_imagem FROM usuarios WHERE usuario_id = $usuario_id";


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

// Conectar ao banco de dados (você precisa implementar a lógica de conexão)
// ...

// Consultar o banco de dados para obter o plano de treinamento do usuário
// Supondo que você tenha uma tabela chamada "planos_treinamento" no banco de dados
$sql = "SELECT * FROM planos_treinamento WHERE usuario_id = $usuario_id";
$result = $conn->query($sql);

// Verificar se o plano de treinamento foi encontrado
if ($result->num_rows > 0) {
    // Obter os dados do plano de treinamento
    $plano_treinamento = $result->fetch_assoc();
    $objetivo = $plano_treinamento["objetivo"];
    $treino_semana = $plano_treinamento["treino_semana"];
    //... (outros campos do plano de treinamento)
} else {
    // Se o plano de treinamento não foi encontrado, você pode exibir uma mensagem ou realizar alguma ação padrão
    $objetivo = "Nenhum plano de treinamento encontrado";
    $treino_semana = "";
    //... (outros campos do plano de treinamento)
}
?>

<?php
    require_once "header.php";
    ?>

<link rel="stylesheet" href="estilos_dashboard.css">


    <?php
    // Inclua o arquivo "menu.php"
    require_once "menu.php";
    ?>

<div class="container">
        <!-- Sidebar com informações do usuário -->
        <div class="sidebar">
            <h2>Perfil</h2>
            <div class="perfil-info"><div class="perfil-img">
            <img src="<?php echo $caminho_imagem; ?>" alt="Foto do Perfil">
            </div></div>
            <p><strong>Nome:</strong> <?php echo $nome; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Data de Nascimento:</strong> <?php echo $data_nascimento; ?></p>
            <p><strong>Telefone:</strong> <?php echo $telefone; ?></p>
            <p><strong>Endereço:</strong> <?php echo $endereco; ?></p>
            <p><strong>Bairro:</strong> <?php echo $bairro; ?></p>
            <p><strong>Cidade:</strong> <?php echo $cidade; ?></p>
            <p><strong>Estado:</strong> <?php echo $estado; ?></p>
            <p><strong>País:</strong> <?php echo $pais; ?></p>
            <p><strong>CEP:</strong> <?php echo $cep; ?></p>
            <a href="editar_perfil.php">Editar Perfil</a>
        </div>

        <!-- Plano de Treinamento no centro da página -->
        <div class="plano-treinamento">
            <h2>Plano de Treinamento</h2>
            <p><strong>Objetivo:</strong> <?php echo $objetivo; ?></p>
            <p><strong>Treino da Semana:</strong></p>
            <p><?php echo $treino_semana; ?></p>
            <!-- ... (outros campos do plano de treinamento) -->
        </div>
    </div>
    


    <?php
    require_once "footer.php";
    ?>