<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Biblioteca</title>
</head>
<body>

    <h1>Seja bem-vindo <?= $_SESSION['nome'] ?></h1>

    <a href="logout.php">Deslogar</a>

<?php 

require_once 'formularios/form_livro.php';

require_once 'funcoes.php';
    
verificar_codigo();

$id = $_SESSION['id'];

$sql = "    SELECT id_livro, titulo FROM tb_livros
            INNER JOIN tb_usuarios
            ON tb_livros.id_usuario = tb_usuarios.id
            WHERE id_usuario= $id";

require_once 'banco/conexao.php';

$conn = conectar_banco();

$resultado = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) <= 0) {
        exit ("<h3>Não há Livros registrados ainda</h3>");
}

echo "<h3>Lista de Livros:</h3>";

echo "<ol>";

while($titulo = mysqli_fetch_assoc($resultado)) {

    $id_livro = $titulo['id_livro'];
    $livro_atual = $titulo['titulo'];

    echo    "<li>" ;
    echo        "<p>" . $livro_atual . " | ";
    echo    '<a class="btn btn-outline-danger btn-sm" 
                style="--bs-btn-padding-y: .10rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                href="excluir_tarefa.php?id_tarefa='.$id_livro.'"> X </a></p>';
    echo    "</li>";
}
echo "<ol>";

?>

</body>
</html>