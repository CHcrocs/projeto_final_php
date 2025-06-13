<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div id="container">
    <h1 >Cadastre seu nome de usuário, contato e senha</h1>
    <form action="../validacoes/validacao_cadastro.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <br>
        <label for="contato">Contato:</label>
        <input type="text" name="contato" id="contato" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <br>
        <button type="submit">Cadastrar</button>
        <button><a href="../index.php">Voltar</a></button>
    </form>
    </div>
</body>
</html>
