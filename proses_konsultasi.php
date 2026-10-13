<?php
require_once __DIR__ . '/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php#contact'); exit; }

$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$layanan = trim($_POST['layanan'] ?? '');
$pesan = trim($_POST['pesan'] ?? '');
$wa = trim($_POST['no_whatsapp'] ?? '');
$metode = trim($_POST['metode'] ?? 'Belum dipilih');

if (!$nama || !$email || !$layanan || !$pesan) die('Form konsultasi belum lengkap.');
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) die('Format email tidak valid.');

$stmt = $conn->prepare("INSERT INTO consultations (nama,email,no_whatsapp,layanan,metode,pesan) VALUES (?,?,?,?,?,?)");
$stmt->bind_param('ssssss',$nama,$email,$wa,$layanan,$metode,$pesan);
if (!$stmt->execute()) die('Konsultasi gagal disimpan.');

header('Location: index.php?consultation=success#contact');
exit;
?>
