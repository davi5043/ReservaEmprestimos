<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/auth.php';
$tituloPagina = 'Meu Histórico';

// cancelar reserva própria
if (isset($_GET['cancelar'])) {
    $rid = (int)$_GET['cancelar'];
    $pdo->prepare("UPDATE reservas SET status='cancelada' WHERE id=? AND usuario_id=?")
        ->execute([$rid, $_SESSION['usuario_id']]);
    redirect('historico.php');
}

$stmt = $pdo->prepare(
    "SELECT r.*, rec.nome AS recurso
     FROM reservas r JOIN recursos rec ON rec.id = r.recurso_id
     WHERE r.usuario_id = ?
     ORDER BY r.data_reserva DESC, r.criado_em DESC");
$stmt->execute([$_SESSION['usuario_id']]);
$lista = $stmt->fetchAll();

require __DIR__ . '/../includes/header.php';
?>
<div class="toolbar">
    <h1>Meu Histórico de Reservas</h1>
    <a class="btn btn-verde" href="reservar.php">+ Nova reserva</a>
</div>
<table>
    <thead><tr><th>Recurso</th><th>Data</th><th>Turno</th><th>Origem</th><th>Status</th><th>Ação</th></tr></thead>
    <tbody>
    <?php if (!$lista): ?>
        <tr><td colspan="6">Você ainda não fez reservas.</td></tr>
    <?php else: foreach ($lista as $r): ?>
        <tr>
            <td><?= e($r['recurso']) ?></td>
            <td><?= date('d/m/Y', strtotime($r['data_reserva'])) ?></td>
            <td><?= e(nomeTurno($r['turno'])) ?></td>
            <td><span class="badge"><?= e($r['origem']) ?></span></td>
            <td><?= $r['status']==='ativa' ? 'Ativa' : 'Cancelada' ?></td>
            <td>
                <?php if ($r['status']==='ativa'): ?>
                    <a class="btn btn-peq btn-excluir" href="?cancelar=<?= $r['id'] ?>"
                       onclick="return confirm('Cancelar esta reserva?')">Cancelar</a>
                <?php else: ?>—<?php endif; ?>
            </td>
        </tr>
    <?php endforeach; endif; ?>
    </tbody>
</table>
<?php require __DIR__ . '/../includes/footer.php'; ?>
