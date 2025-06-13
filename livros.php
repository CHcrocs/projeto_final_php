<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['nome'])) { // Verifica se as variáveis de sessão estão definidas
    header('Location: index.php?codigo=0'); // Redireciona para a página de login com código de erro
    exit; // Impede que outro trecho de código seja executado após o redirecionamento
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
    <h1 >Seja bem-vindo <?= $_SESSION['nome'] ?></h1>

    <a href="logout.php">Deslogar</a>

    <?php

    require_once 'formularios/form_livro.php';

    echo "<br>";

    require_once 'funcoes.php';

    verificar_codigo();

    $id = $_SESSION['id'];

    // Consulta SQL para buscar os livros do usuário logado
    // Utiliza INNER JOIN para obter informações do usuário associado a cada livro
    $sql = "    SELECT id_livro, titulo, autor FROM tb_livros
            INNER JOIN tb_usuarios
            ON tb_livros.id_usuario = tb_usuarios.id
            WHERE id_usuario= $id";

    require_once 'banco/conexao.php';

    $conn = conectar_banco();

    $resultado = mysqli_query($conn, $sql);

    // Verifica se a consulta retornou resultados
    if (mysqli_affected_rows($conn) <= 0) {
        // Se não houver livros registrados, exibe uma mensagem e encerra o script
        exit("<h3>Não há Livros registrados ainda</h3>");
    }

    echo "<h3>Lista de Livros:</h3>";

    echo "<ol>";

    // Loop para exibir cada livro encontrado na consulta
    // Utiliza mysqli_fetch_assoc para obter os dados de cada livro como um array associativo
    while ($titulo = mysqli_fetch_assoc($resultado)) {

        $id_livro = $titulo['id_livro'];
        $livro_atual = $titulo['titulo'];
        $autor_atual = $titulo['autor'];

        echo    "<li>";
        echo        "Titulo: " . $livro_atual . "<br> Autor: " . $autor_atual . " ";
        echo        ' <a href="formularios/editar_livro.php?id_livro=' . $id_livro . '"> Editar </a>';
        echo    '<a href="excluir_livro.php?id_livro=' . $id_livro . '"> X </a>';
        echo    "</li>";
    }
    echo "<ol>";

    ?>

</div>
</body>

</html>