<?php
include '../includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        $usuario = $stmt->fetch();
    } catch (PDOException $e) {
        die("Erro ao buscar usuário: " . $e->getMessage());
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];
    $senha = !empty($_POST['senha']) ? password_hash($_POST['senha'], PASSWORD_BCRYPT) : $usuario['senha'];

    try {
        $sql = "UPDATE usuarios SET nome_completo = ?, email = ?, senha = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome_completo, $email, $senha, $id]);
        echo "Usuário atualizado com sucesso!";
    } catch (PDOException $e) {
        die("Erro ao atualizar usuário: " . $e->getMessage());
    }
}
?>

<?php include '../includes/header.php'; ?>

<h2>Editar Usuário</h2>
<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>">
    <label for="nome_completo">Nome Completo:</label>
    <input type="text" name="nome_completo" value="<?php echo htmlspecialchars($usuario['nome_completo']); ?>" required>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
    <label for="senha">Senha (deixe em branco para não alterar):</label>
    <input type="password" name="senha">
    <input type="submit" value="Atualizar">
</form>

<?php include '../includes/footer.php'; ?>
