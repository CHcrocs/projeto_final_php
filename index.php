<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Biblioteca</title>
    <style>
        a {
            text-decoration: none;
            color: black;            
        }
    </style>
</head>
<body>
    <h1>Sistema de simulação de biblioteca</h1>
    <?php 
    // usuario vai ser apresentado o form de login e recebera a opção de cadastrar caso não tenha conta
    require_once 'funcoes.php';

    incluir_form_login();

    // se o usuario ja estiver logado (utilizando session), ele vai ser redirecionado para a pagina de livros 
    ?>
    <h2>Não tem conta?</h2>
    <p>Cadastre-se para acessar o sistema.</p>
    <button><a href="form_cadastro.php">Cadastrar</a></button>
</body>
</html>