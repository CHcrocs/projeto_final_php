<?php
$erro = $_GET['erro'] ?? null;
$mensagem = '';

switch ($erro) {
    case 1:
        $mensagem = 'Formulário não enviado corretamente.';
        break;
    case 2:
        $mensagem = 'Preencha todos os campos obrigatórios.';
        break;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastre seu nome de usuário, contato e senha</h1>

    <?php if ($mensagem): ?>
        <p style="color:red;"><?= $mensagem ?></p>
    <?php endif; ?>

    <form action="validacoes/validacao_cadastro.php" method="post">
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
    </form>
</body>
</html>
