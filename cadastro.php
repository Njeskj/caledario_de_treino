<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="estilos_login.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Cadastro</h1>
        <form action="processar_cadastro.php" method="post">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="text" name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Cadastrar</button>
        </form>
        <div class="footer">
            <p>Já possui uma conta? <a href="login.php">Faça login</a></p>
        </div>
    </div>
</body>
</html>
