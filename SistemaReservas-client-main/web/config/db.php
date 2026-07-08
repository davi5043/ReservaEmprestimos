<?php
/**
 * Conexão com o banco de dados (PDO).
 * Ajuste usuário/senha se o seu MySQL do XAMPP tiver senha (padrão: root sem senha).
 */

$DB_HOST = 'localhost';
$DB_NAME = 'reservas_db';
$DB_USER = 'root';
$DB_PASS = '';          // no XAMPP padrão a senha do root é vazia

try {
    $pdo = new PDO(
        "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4",
        $DB_USER,
        $DB_PASS,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    die('Erro ao conectar no banco: ' . $e->getMessage());
}
