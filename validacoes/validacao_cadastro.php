<?php
require_once __DIR__ . '/../funcoes.php';
require_once __DIR__ . '/../banco/conexao.php';

if (form_nao_enviado()) {
    header('Location: ../formularios/form_cadastro.php?codigo=1');
    exit;
}

if (campos_vazios_cadastro()) {
    header('Location: ../formularios/form_cadastro.php?codigo=2');
    exit;
}

$conn = conectar_banco();

$nome = $_POST['nome'];
$contato = $_POST['contato'];
$senha = $_POST['senha'];

// Prepara a consulta SQL para evitar injeção de SQL
$stmt = mysqli_prepare($conn, "INSERT INTO tb_usuarios (nome, contato, senha) VALUES (?, ?, ?)");

// Verifica se a preparação da consulta foi bem-sucedida
mysqli_stmt_bind_param($stmt, "sss", $nome, $contato, $senha);

// Executa a consulta
if (mysqli_stmt_execute($stmt)) {
    header('Location: ../index.php');
} else {
    header('Location: ../formularios/cadastro.php?codigo=3');
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
exit;