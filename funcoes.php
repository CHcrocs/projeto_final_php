<?php 

function form_nao_enviado() {
    return $_SERVER['REQUEST_METHOD'] !== 'POST';
}

function campos_vazios() {
    return empty($_POST['nome']) || empty($_POST['senha']) || empty($_POST['contato']);
}

function livro_campos_vazios() {
    return empty($_POST['titulo']) || empty($_POST['autor']);
}

function incluir_form_login() {
    session_start();

    if (!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])) {
        require_once 'form_login.php';
    }
}

?>