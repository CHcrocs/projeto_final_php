<?php
session_start();

function form_nao_enviado(): bool {
    return $_SERVER['REQUEST_METHOD'] !== 'POST';
}

function campos_vazios_cadastro(): bool {
    return empty($_POST['nome']) || empty($_POST['contato']) || empty($_POST['senha']);
}

function campos_vazios_login(): bool {
    return empty($_POST['nome']) || empty($_POST['senha']);
}

function livro_campos_vazios(): bool {
    return empty($_POST['titulo']) || empty($_POST['autor']); // Ajuste conforme seu formulário de livros
}
?>
