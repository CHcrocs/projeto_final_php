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

// SQL para atualizar o livro
$sql = "UPDATE tb_livros SET titulo = ?, autor = ?, id_usuario = ? WHERE id_livro = ?";

// Prepara a consulta
$stmt = mysqli_prepare($conn, $sql);

// Verifica se a preparação da consulta foi bem-sucedida
if (!$stmt) {
    header('location:livros.php?codigo=3'); // Erro na preparação da consulta
    exit;
}

// Vincula os parâmetros à consulta
mysqli_stmt_bind_param($stmt, "ssii", $titulo, $autor, $id_usuario, $id_livro);

// Executa a consulta
if (!mysqli_stmt_execute($stmt)) {
    header('location:livros.php?codigo=6'); // Erro na execução da consulta
    exit;
}

// Armazena o resultado da consulta
mysqli_stmt_store_result($stmt);

// Verifica se a atualização afetou alguma linha
if (mysqli_stmt_affected_rows($stmt) <= 0) {
    header('location:livros.php?codigo=6'); // Nenhum livro editado
    exit;
}

// Livro editado com sucesso
header('Location: livros.php');


mysqli_stmt_close($stmt);
mysqli_close($conn);
?>