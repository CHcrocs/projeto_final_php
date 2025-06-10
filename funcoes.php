<?php 

function form_nao_enviado() {
    return $_SERVER['REQUEST_METHOD'] !== 'POST';
}

function campos_vazios() {
    return empty($_POST['nome']) || empty($_POST['senha']) || empty($_POST['contato']);
}



?>