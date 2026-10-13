<?php
require_once __DIR__ . '/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: booking.php'); exit; }

$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$wa = trim($_POST['no_whatsapp'] ?? '');
$layanan = trim($_POST['layanan'] ?? '');
$tanggal = $_POST['tanggal'] ?? '';
$jam = $_POST['jam'] ?? '';
$metode = $_POST['metode_konsultasi'] ?? '';
$deskripsi = trim($_POST['deskripsi_masalah'] ?? '');

if (!$nama || !$email || !$wa || !$layanan || !$tanggal || !$jam || !$metode || !$deskripsi) die('Data booking belum lengkap.');
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) die('Format email tidak valid.');
if ($tanggal < date('Y-m-d')) die('Tanggal konsultasi tidak valid.');

$allowedMethods = ['Tatap Muka','WhatsApp','Zoom','Google Meet'];
if (!in_array($metode, $allowedMethods, true)) die('Metode konsultasi tidak valid.');

$check = $conn->prepare("SELECT id FROM bookings WHERE tanggal=? AND jam=? AND status <> 'Dibatalkan' LIMIT 1");
$check->bind_param('ss', $tanggal, $jam);
$check->execute();
if ($check->get_result()->num_rows > 0) {
    die('<script>alert("Jadwal tersebut sudah digunakan. Silakan pilih waktu lain.");history.back();</script>');
}

$kode = 'HRK-' . date('Ymd') . '-' . strtoupper(bin2hex(random_bytes(3)));

$stmt = $conn->prepare("INSERT INTO bookings (kode_booking,nama,email,no_whatsapp,layanan,tanggal,jam,metode_konsultasi,deskripsi_masalah) VALUES (?,?,?,?,?,?,?,?,?)");
$stmt->bind_param('sssssssss',$kode,$nama,$email,$wa,$layanan,$tanggal,$jam,$metode,$deskripsi);
if (!$stmt->execute()) die('Booking gagal disimpan: '.htmlspecialchars($stmt->error));
?>
<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Booking Berhasil</title>
<style>body{margin:0;min-height:100vh;display:grid;place-items:center;background:#0a0a0a;color:#fff;font-family:Inter,Arial}.card{width:min(520px,calc(100% - 36px));padding:42px 30px;text-align:center;background:#141414;border:1px solid #D4A017;border-radius:24px;box-shadow:0 30px 80px #000}.ok{width:76px;height:76px;border-radius:50%;display:grid;place-items:center;background:linear-gradient(135deg,#D4A017,#FFD700);color:#111;font-size:32px;margin:auto auto 20px}h1{font-family:Georgia;color:#FFD700}.code{margin:22px 0;padding:18px;border:1px dashed #D4A017;border-radius:12px}.code strong{display:block;font-size:25px;color:#FFD700;margin-top:6px}.btn{display:inline-block;padding:13px 20px;border-radius:10px;background:#D4A017;color:#111;text-decoration:none;font-weight:700}</style></head>
<body><div class="card"><div class="ok">✓</div><h1>Booking Berhasil</h1><p>Pengajuan konsultasi Anda telah diterima.</p><div class="code">Kode Booking<strong><?=htmlspecialchars($kode)?></strong></div><p>Simpan kode booking ini untuk keperluan komunikasi dengan pihak Kantor Hukum Haraka.</p><a class="btn" href="index.php">Kembali ke Website</a></div></body></html>
