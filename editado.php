<?php 

require_once 'funcoes.php';

if (form_nao_enviado()) {
    header('Location: livros.php?codigo=0'); // Formulário não enviado
    exit;
}

if (livro_campos_vazios()) {
    header('Location: livros.php?codigo=2'); // Campos vazios
    exit;
}

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];   
$id_usuario = (int)$_POST['id_usuario'];
$id_livro = (int)$_POST['id_livro'];

require_once 'banco/conexao.php';

$conn = conectar_banco();

$sql = "UPDATE tb_livros SET titulo = ?, autor = ?, id_usuario = ? WHERE id_livro = ?";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    header('location:livros.php?codigo=3'); // Erro na preparação da consulta
    exit;
}

mysqli_stmt_bind_param($stmt, "ssii", $titulo, $autor, $id_usuario, $id_livro);

if (!mysqli_stmt_execute($stmt)) {
    header('location:livros.php?codigo=6'); // Erro na execução da consulta
    exit;
}

mysqli_stmt_store_result($stmt);

if (mysqli_stmt_affected_rows($stmt) <= 0) {
    header('location:livros.php?codigo=6'); // Nenhum livro editado
    exit;
}

// Livro editado com sucesso
header('Location: livros.php');

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>