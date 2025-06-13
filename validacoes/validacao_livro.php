<?php
require_once '../funcoes.php';

session_start();

if (form_nao_enviado()) {
    header('Location: ../livros.php?codigo=0'); // Formulário não enviado
    exit;
}

if (livro_campos_vazios()) {
    header('Location: ../livros.php?codigo=2'); // Campos vazios
    exit;
}

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$id_usuario = $_SESSION['id'];

require_once '../banco/conexao.php';

$conn = conectar_banco();

// SQL para inserir o livro
$sql = "INSERT INTO tb_livros (titulo, autor, id_usuario) VALUES (?, ?, ?)";

// Prepara a consulta
$stmt = mysqli_prepare($conn, $sql);

// Verifica se a preparação da consulta foi bem-sucedida
if (!$stmt) {
        header('location:restrita.php?codigo=3');
        exit;
    }

// Vincula os parâmetros à consulta
mysqli_stmt_bind_param($stmt, "ssi", $titulo, $autor, $id_usuario);

// Executa a consulta
if(!mysqli_stmt_execute($stmt)){
        header('location:restrita.php?codigo=3');
        exit;
    }

// Armazena o resultado da consulta
mysqli_stmt_store_result($stmt);

// Verifica se a inserção afetou alguma linha
if (mysqli_stmt_affected_rows($stmt) <= 0) {
        header('location:restrita.php?codigo=5');
        exit;
}

// Livro inserido com sucesso
header('Location: ../livros.php');

?>
