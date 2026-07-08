<?php
/** GET lista de categorias (para os botões de filtro no app). */
require_once __DIR__ . '/_config.php';

$rows = $pdo->query('SELECT id, nome FROM categorias ORDER BY nome')->fetchAll();
foreach ($rows as &$r) { $r['id'] = (int)$r['id']; }
responder(['status' => 'ok', 'categorias' => $rows]);
