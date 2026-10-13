<?php
declare(strict_types=1);

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'haraka_db';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    http_response_code(500);
    die('Koneksi database gagal. Pastikan MySQL aktif dan database haraka_db sudah dibuat.');
}

$conn->set_charset('utf8mb4');
?>
