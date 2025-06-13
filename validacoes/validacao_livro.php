<?php
require_once 'funcoes.php';

if (form_nao_enviado()) {
    header('Location: livros.php?erro=1'); // Formulário não enviado
    exit;
}

if (livro_campos_vazios()) {
    header('Location: livros.php?erro=2'); // Campos vazios
    exit;
}

// Salvar o livro aqui...

header('Location: livros.php?sucesso=1');
exit;
?>
