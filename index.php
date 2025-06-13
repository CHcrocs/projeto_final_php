<?php
require_once 'funcoes.php';

// Se o usuário já estiver logado, redireciona para a página de livros
if (isset($_SESSION['usuario'])) {
    header('Location: livros.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Biblioteca</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="container">

    <h1 >Sistema de Simulação de Biblioteca</h1>

    <p>Faça login para acessar ao seu registro de livros</p>

    <?php require_once "funcoes.php"; 
    verificar_codigo();
    ?>

    <?php require_once "formularios/form_login.php" ?>

    <h2>Não tem conta?</h2>
    <a href="formularios/cadastro.php" class="botao">Cadastrar</a>

</div>
</body>
</html>
