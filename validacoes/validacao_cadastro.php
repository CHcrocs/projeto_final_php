<?php 
require_once 'funcoes.php';

// Verifica se o formulário foi enviado e enviar usuario para a pagina inicial com o formulário de login
if (form_nao_enviado()) {
    header('Location: cadastro.php');
    exit;
}

// Verifica se os campos do formulário estão vazios
if (campos_vazios_cadastro()) {
    header('Location: cadastro.php');
    exit;
}
// depois das verificações logar usuario utilizando session e mandalo para a pagina de livros
?>