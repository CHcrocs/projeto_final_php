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
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        a {
            text-decoration: none;
            color: white;
        }

        .botao {
            background-color: #4CAF50;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .botao:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1>Sistema de Simulação de Biblioteca</h1>

    <h2>Login</h2>
    <?php include "formularios/form_login.php" ?>

    <h2>Não tem conta?</h2>
    <p>Cadastre-se para acessar o sistema.</p>
    <a href="cadastro.php" class="botao">Cadastrar</a>

</body>
</html>
