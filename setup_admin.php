<?php
require_once __DIR__ . '/koneksi.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $nama = trim($_POST['nama'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!$username || !$nama || strlen($password) < 8) {
        $message = 'Isi semua field. Password minimal 8 karakter.';
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO admins (username,password,nama) VALUES (?,?,?)");
        $stmt->bind_param('sss',$username,$hash,$nama);
        if ($stmt->execute()) {
            $message = 'Admin berhasil dibuat. Hapus file setup_admin.php setelah selesai.';
        } else {
            $message = 'Gagal membuat admin. Username mungkin sudah digunakan.';
        }
    }
}
?>
<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Setup Admin</title>
<style>body{font-family:Arial;background:#0a0a0a;color:#fff;display:grid;place-items:center;min-height:100vh}.box{width:min(420px,90%);padding:30px;background:#151515;border:1px solid #D4A017;border-radius:18px}input{width:100%;padding:12px;margin:7px 0 15px;background:#0b0b0b;color:#fff;border:1px solid #333;border-radius:8px;box-sizing:border-box}button{width:100%;padding:13px;background:#D4A017;border:0;border-radius:8px;font-weight:bold}p{color:#aaa}</style></head>
<body><div class="box"><h2>Setup Admin Haraka</h2><p>Buat akun admin pertama. Setelah berhasil, hapus file ini dari server.</p><?php if($message): ?><p><?=htmlspecialchars($message)?></p><?php endif; ?><form method="POST"><label>Nama</label><input name="nama" required><label>Username</label><input name="username" required><label>Password</label><input type="password" name="password" minlength="8" required><button>Buat Admin</button></form></div></body></html>
