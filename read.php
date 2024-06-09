<?php
include '../includes/db.php';
include '../includes/header.php';

echo "<h2>Lista de Usuários</h2>";

try {
    $stmt = $pdo->query("SELECT id, nome_completo, email FROM usuarios");
    echo "<table>";
    echo "<tr><th>ID</th><th>Nome Completo</th><th>Email</th><th>Ações</th></tr>";
    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nome_completo']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td><a href='update.php?id=" . $row['id'] . "'>Editar</a> | <a href='delete.php?id=" . $row['id'] . "'>Excluir</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    die("Erro ao buscar usuários: " . $e->getMessage());
}

include '../includes/footer.php';
?>
