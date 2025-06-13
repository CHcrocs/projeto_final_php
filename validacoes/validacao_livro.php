<?php
require_once '../funcoes.php';

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

$sql = "INSERT INTO tb_livros (titulo, autor, id_usuario) VALUES (?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
        header('location:restrita.php?codigo=3');
        exit;
    }

mysqli_stmt_bind_param($stmt, "ssi", $titulo, $autor, $id_usuario);

if(!mysqli_stmt_execute($stmt)){
        header('location:restrita.php?codigo=3');
        exit;
    }

mysqli_stmt_store_result($stmt);

if (mysqli_stmt_affected_rows($stmt) <= 0) {
        header('location:restrita.php?codigo=5');
        exit;
}

header('Location: ../livros.php?sucesso=1');

?>
