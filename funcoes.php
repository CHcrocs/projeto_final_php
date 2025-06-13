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
    return empty($_POST['titulo']) || empty($_POST['autor']); 
}

function verificar_codigo() {

    if (!isset($_GET['codigo'])) {
        return;
    }

    $codigo = (int)$_GET['codigo'];

    switch ($codigo) {

        case 0:
            $msg = "<h3>Você não tem permissão para acessar a página requisitada</h3>";
            break;

        case 1:
            $msg = "<h3>Usuário ou senha inválidos. Por favor, tente novamente!</h3>";
            break;

        case 2:
            $msg = "<h3>Por favor, preencha todos os campos do form</h3>";
            break;

        case 3:
            $msg = "<h3>Erro na estrutura da consulta SQL. Verifique com o suporte ou 
            tente novamente mais tarde</h3>";
            break;

        case 4:
            $msg = "<h3>Erro ao excluir tarefa selecionada. Verifique com o suporte ou 
            tente novamente mais tarde</h3>";
            break;

        case 5:
            $msg = "<h3>Erro ao cadastrar tarefa. Verifique com o suporte ou 
            tente novamente mais tarde</h3>";
            break;

        default:
            $msg = "";
            break;
    }

    echo $msg;

}

?>
