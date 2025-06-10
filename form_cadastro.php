<h1>Cadastre seu nome de usuário, contato e senha</h1>

<form action="validacao.php" method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required placeholder="Digite seu nome">
    <br>
    <label for="contato">Contato:</label>
    <input type="contato" name="contato" id="contato" required placeholder="Digite seu contato">
    <br>
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" required placeholder="Digite sua senha">
    <br>
    <button type="submit">Cadastrar</button>
</form>