<?php
require_once __DIR__ . '/../funcoes.php';
require_once __DIR__ . '/../banco/conexao.php';

if (form_nao_enviado()) {
    header('Location: ../form_cadastro.php?codigo=1');
    exit;
}

if (campos_vazios_cadastro()) {
    header('Location: ../form_cadastro.php?codigo=2');
    exit;
}

$conn = conectar_banco();

$nome = $_POST['nome'];
$contato = $_POST['contato'];
$senha = $_POST['senha'];

$stmt = mysqli_prepare($conn, "INSERT INTO tb_usuarios (nome, contato, senha) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sss", $nome, $contato, $senha);

if (mysqli_stmt_execute($stmt)) {
    session_start();
    header('Location: ../index.php');
} else {
    header('Location: ../form_cadastro.php?codigo=3');
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
exit;