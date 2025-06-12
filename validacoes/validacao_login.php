<?php
require_once 'funcoes.php';

// Verifica se o formulário foi enviado e enviar usuario para a pagina inicial com o formulário de login
if (form_nao_enviado()) {
    header('Location: index.php?codigo=0');
    exit;
}

// Verifica se os campos do formulário estão vazios
if (campos_vazios()) {
    header('Location: index.php?codigo=2');
    exit;
}

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

require_once 'conexao.php';
// Verifica se o usuário e senha estão corretos
$conn = conectar_banco();
$sql = "SELECT * FROM tb_usuarios WHERE usuario = ? AND senha = ?";

$stmt = mysqli_prepare($conn, $query);

if (!$stmt) { // se houver algum problema com a conslta acima, retorna para a home
    header('location:index.php?codigo=3'); // codigo para erros de sql
    exit;
}

// prosseguimos com o bind (associação) das variáveis no nosso statemant
mysqli_stmt_bind_param($stmt, "ss", $usuario, $senha);

// executa comando preparado (stmt)
$resultado = mysqli_stmt_execute($stmt);

if (!$resultado) {
    header('location:index.php?codigo=3'); // codigo para erros de sql
    exit;
}

mysqli_stmt_store_result($stmt);

// armazena o numero de linhas afetadas pelo comand sql executado
$linhas = mysqli_stmt_num_rows($stmt);

// verificar se usuário e senha estão incorretos:
// se usuario e senha corresponderem a algum registro na tabela, 
// as linhas afetadas serão maiores que zero.
// se o numero de linahs afetadas for menor ou igual a zero, signficina que
// não há usuario e senha informados salvos na tabela do BD
if ($linhas <= 0) {

    header('location:index.php?codigo=1');
    // codigo 1 = usuario ou senha inválidos
    exit;
}

// sconfigurar variaveis para receber o retorno no comando sql executado
mysqli_stmt_bind_result($stmt, $login_id, $login_usuario, $login_senha, $login_contato);

// salvar nas variaveis locais o resultado vindo deste select executado acima
mysqli_stmt_fetch($stmt);

echo "$login_id, $login_usuario, $login_senha, $login_contato";
// iniciar a sessão
session_start();
// registrar as variáveis de sessão
$_SESSION['id'] = $login_id;
$_SESSION['usuario'] = $login_usuario;
$_SESSION['senha'] = $login_senha;
$_SESSION['contato'] = $login_contato;

// redirecionar para a página restrita
header('location:livros.php');
