<?php
require_once __DIR__ . '/../funcoes.php';
require_once __DIR__ . '/../banco/conexao.php';

if (form_nao_enviado()) {
    header('Location: ../index.php?erro=1');
    exit;
}

if (campos_vazios_login()) {
    header('Location: ../index.php?erro=2');
    exit;
}

$conn = conectar_banco();

$nome = $_POST['nome'];
$senha = $_POST['senha'];

$query = "SELECT * FROM tb_usuarios WHERE nome = ? AND senha = ?";

$stmt = mysqli_prepare($conn, $query);

if (!$stmt) { 
        header('location:../index.php?codigo=3'); 
        exit;
}

mysqli_stmt_bind_param($stmt, "ss", $nome, $senha);

$resultado = mysqli_stmt_execute($stmt);

if (!$resultado) {
        header('location:../index.php?codigo=3'); // codigo para erros de sql
        exit;
}

mysqli_stmt_store_result($stmt);

$linhas = mysqli_stmt_num_rows($stmt);

if ($linhas <= 0) {

        header('location:../index.php?codigo=1'); 
        // codigo 1 = usuario ou senha inválidos
        exit;
} 

mysqli_stmt_bind_result($stmt, $login_id, $login_usuario, $login_senha, $login_email);
mysqli_stmt_fetch($stmt);

echo "$login_id, $login_usuario, $login_senha, $login_email";
        
session_start();

$_SESSION['id']         = $login_id;
$_SESSION['usuario']    = $login_usuario;
$_SESSION['senha']      = $login_senha;
$_SESSION['email']      = $login_email;
header('Location: ../livros.php');


mysqli_stmt_close($stmt);
mysqli_close($conn);
exit;
