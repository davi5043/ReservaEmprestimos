<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/auth.php';
exigirAdmin();

$id = (int)($_GET['id'] ?? 0);
if ($id) {
    try {
        $stmt = $pdo->prepare('DELETE FROM categorias WHERE id = ?');
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        die('Não é possível excluir: existe recurso usando esta categoria.');
    }
}
redirect('listar.php');
