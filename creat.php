<?php
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

    try {
        $sql = "INSERT INTO usuarios (nome_completo, email, senha) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome_completo, $email, $senha]);
        echo "Usuário cadastrado com sucesso!";
    } catch (PDOException $e) {
        die("Erro ao cadastrar usuário: " . $e->getMessage());
    }
}
?>
