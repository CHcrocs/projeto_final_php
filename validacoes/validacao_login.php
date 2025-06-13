<?php
require_once '/../funcoes.php';
require_once '/../banco/conexao.php';

if (form_nao_enviado()) {
    header('Location: ../index.php?codigo=0');
    exit;
}

if (campos_vazios_login()) {
    header('Location: ../index.php?codigo=2');
    exit;
}

$conn = conectar_banco();

$nome = $_POST['nome'];
$senha = $_POST['senha'];

// Prepara a consulta SQL para evitar injeção de SQL
// Utilizando prepared statements para maior segurança
$query = "SELECT * FROM tb_usuarios WHERE nome = ? AND senha = ?";
$stmt = mysqli_prepare($conn, $query);

// Verifica se a preparação da consulta foi bem-sucedida
if (!$stmt) { 
        header('location:../index.php?codigo=3'); 
        exit;
}

// Vincula os parâmetros à consulta
mysqli_stmt_bind_param($stmt, "ss", $nome, $senha);

// Executa a consulta
$resultado = mysqli_stmt_execute($stmt);

// Verifica se a execução da consulta foi bem-sucedida
if (!$resultado) {
        header('location:../index.php?codigo=3'); // codigo para erros de sql
        exit;
}

// Armazena o resultado da consulta
mysqli_stmt_store_result($stmt);

// Verifica se a consulta retornou algum resultado
// Se não houver resultados, redireciona para a página de login com um código de erro
$linhas = mysqli_stmt_num_rows($stmt);
if ($linhas <= 0) {

        header('location:../index.php?codigo=1'); 
        // codigo 1 = usuario ou senha inválidos
        exit;
}   

// Se a consulta retornou resultados, vincula as variáveis para obter os dados do usuário
mysqli_stmt_bind_result($stmt, $login_id, $login_nome, $login_senha, $login_contato);
// Busca os dados do usuário
mysqli_stmt_fetch($stmt);

// Exibe os dados do usuário (opcional, para depuração)
echo "$login_id, $login_nome, $login_senha, $login_contato";
        
session_start();

// Armazena os dados do usuário na sessão
$_SESSION['id']         = $login_id;
$_SESSION['nome']    = $login_nome;
$_SESSION['senha']      = $login_senha;
$_SESSION['email']      = $login_contato;
header('Location: ../livros.php');


mysqli_stmt_close($stmt);
mysqli_close($conn);
exit;