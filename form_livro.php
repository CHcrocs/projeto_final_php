<h1>Informe o titulo e o nome do autor do livro</h1>

<form action="validacao_livro.php" method="post">
    <label for="titulo">Titulo:</label>
    <input type="text" name="titulo" id="titulo" required placeholder="Digite o título do livro">
    <br>
    <label for="autor">Autor:</label>
    <input type="text" name="autor" id="autor" required placeholder="Digite o nome do autor">
    <br>
    <button type="submit">Registrar livro</button>
</form>