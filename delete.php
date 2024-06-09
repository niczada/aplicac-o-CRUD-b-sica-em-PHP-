<?php
include '../includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        echo "Usuário excluído com sucesso!";
    } catch (PDOException $e) {
        die("Erro ao excluir usuário: " . $e->getMessage());
    }
}
?>
