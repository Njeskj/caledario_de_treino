<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="estilos_login.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="processar_login.php" method="post">
            <input type="text" name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
        <div class="footer">
            <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
            <p><a href="javascript:history.go(-1)">Voltar</a></p>
        </div>
    </div>
</body>
</html>
