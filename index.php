<?php include 'includes/header.php'; ?>

<h2>Cadastrar Novo Usuário</h2>
<form action="actions/create.php" method="POST">
    <label for="nome_completo">Nome Completo:</label>
    <input type="text" name="nome_completo" required>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <label for="senha">Senha:</label>
    <input type="password" name="senha" required>
    <input type="submit" value="Cadastrar">
</form>

<?php include 'includes/footer.php'; ?>
