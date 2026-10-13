<?php
require_once __DIR__ . '/../koneksi.php';
session_start();
if (!empty($_SESSION['admin_id'])) { header('Location: dashboard.php'); exit; }

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $stmt = $conn->prepare("SELECT id, username, password, nama FROM admins WHERE username=? LIMIT 1");
    $stmt->bind_param('s',$username); $stmt->execute();
    $admin = $stmt->get_result()->fetch_assoc();

    if ($admin && password_verify($password, $admin['password'])) {
        session_regenerate_id(true);
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_name'] = $admin['nama'];
        header('Location: dashboard.php'); exit;
    }
    $error = 'Username atau password salah.';
}
?>
<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Admin Login | Haraka</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"><link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
<style>:root{--g:#D4A017;--g2:#FFD700}*{box-sizing:border-box}body{margin:0;min-height:100vh;display:grid;place-items:center;background:#0A0A0A;color:#fff;font-family:Inter}.box{width:min(430px,calc(100% - 30px));padding:35px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.15);border-radius:22px;box-shadow:0 30px 80px #000;backdrop-filter:blur(18px)}.logo{width:65px;height:65px;border-radius:18px;background:linear-gradient(135deg,var(--g),var(--g2));color:#111;display:grid;place-items:center;font-size:27px;margin-bottom:18px}.brand{font:700 27px "Playfair Display";color:#FFD700}.muted{color:#999;margin:7px 0 25px}.group{margin-bottom:16px}label{display:block;margin-bottom:7px;font-size:13px;color:#ddd}input{width:100%;padding:14px;border-radius:11px;border:1px solid #333;background:#111;color:#fff;outline:0}input:focus{border-color:var(--g)}button{width:100%;padding:14px;border:0;border-radius:11px;background:linear-gradient(135deg,var(--g),var(--g2));font-weight:800;cursor:pointer}.err{background:rgba(220,60,60,.1);border:1px solid rgba(220,60,60,.3);padding:12px;border-radius:10px;color:#ffb0b0;margin-bottom:15px}.back{display:block;margin-top:18px;color:#aaa;text-decoration:none;text-align:center;font-size:13px}</style></head>
<body><div class="box"><div class="logo"><i class="fas fa-scale-balanced"></i></div><div class="brand">HARAKA ADMIN</div><p class="muted">Masuk ke panel administrasi booking & konsultasi.</p>
<?php if($error): ?><div class="err"><?=htmlspecialchars($error)?></div><?php endif; ?>
<form method="POST"><div class="group"><label>Username</label><input name="username" autocomplete="username" required></div><div class="group"><label>Password</label><input type="password" name="password" autocomplete="current-password" required></div><button>Masuk ke Dashboard</button></form>
<a class="back" href="../index.php"><i class="fas fa-arrow-left"></i> Kembali ke website</a></div></body></html>
