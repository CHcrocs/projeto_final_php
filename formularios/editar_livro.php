<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div id="container">
    <h1>Edição de livros</h1>
    <a href="../livros.php">Voltar</a>
    <?php
        require_once '../funcoes.php';

        id_nao_enviado();

        $id = (int)$_GET['id_livro'];

        require_once '../banco/conexao.php';
        $conn = conectar_banco();

        $sql = "SELECT * FROM tb_livros WHERE id_livro = $id";

        $resultado = mysqli_query($conn, $sql);

        $linhas_afetadas = mysqli_affected_rows($conn);

        if ($linhas_afetadas <= 0) {
            header('location:livros.php?codigo=6');
            exit;
        }

        $livro = mysqli_fetch_assoc($resultado);

    ?>

        <form action="../editado.php" method="post">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" value="<?= $livro['titulo'] ?>" required>
            <br>
            <label for="autor">Autor:</label>
            <input type="text" name="autor" id="autor" value="<?= $livro['autor'] ?>" required> 
            <br>
            <label for="id_usuario">Id Usuario</label>
            <input type="number" name="id_usuario" value="<?= $livro['id_usuario'] ?>">
            <input type="hidden" name="id_livro" value="<?= $livro['id_livro'] ?>">
            <br>
            <button type="submit">Editar</button>
            <br>
        </form>
    </div>
</body>
</html>