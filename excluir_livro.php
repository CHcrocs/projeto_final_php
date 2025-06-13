<?php

    // verifica se o parâmetro id_livro foi enviado via GET
    if (!isset($_GET['id_livro']))  {
        header('location:livros.php'); // redireciona para a página de livros se o parâmetro não estiver presente
        exit; // impede que outro trecho de códig seja executado após o redirecionamento
    }

    $id_livro = (int)$_GET['id_livro']; // força o parâmetro a ser int

    $sql = "DELETE FROM tb_livros WHERE id_livro = $id_livro"; // SQL para excluir o livro com o id_livro especificado

    require_once 'banco/conexao.php'; 

    $conn = conectar_banco();

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) <= 0) { // verifica se a exclusão foi bem-sucedida
        // Se não houver livros com o id_livro especificado, redireciona para a página de livros com um código de erro
        header('location:livros.php?codigo=4');
        exit;
    }

    header('location:livros.php');

?>