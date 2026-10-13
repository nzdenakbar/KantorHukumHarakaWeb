<?php
require_once __DIR__ . '/koneksi.php';

$services = [];
$result = $conn->query("SELECT nama_layanan FROM services ORDER BY id ASC");
while ($row = $result->fetch_assoc()) $services[] = $row;

$selected = $_GET['layanan'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking Konsultasi | Kantor Hukum Haraka</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
:root{--gold:#D4A017;--gold2:#FFD700;--dark:#0A0A0A;--dark2:#141414;--muted:#999;--border:rgba(255,255,255,.16)}
*{box-sizing:border-box;margin:0;padding:0} body{font-family:Inter,sans-serif;background:var(--dark);color:#fafafa;min-height:100vh;line-height:1.6}
body:before{content:"";position:fixed;inset:0;background:radial-gradient(circle at 20% 10%,rgba(212,160,23,.12),transparent 35%),radial-gradient(circle at 90% 90%,rgba(212,160,23,.08),transparent 30%);pointer-events:none}
.wrap{width:min(980px,calc(100% - 32px));margin:auto;padding:35px 0 60px}.back{color:var(--gold);text-decoration:none;display:inline-flex;gap:8px;margin-bottom:22px}
.card{background:rgba(255,255,255,.055);border:1px solid var(--border);border-radius:24px;padding:clamp(24px,5vw,50px);box-shadow:0 25px 70px rgba(0,0,0,.55);backdrop-filter:blur(18px);position:relative;overflow:hidden}
.card:before{content:"";position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--gold),var(--gold2),#F4D03F,var(--gold))}
.head{text-align:center;margin-bottom:35px}.icon{width:70px;height:70px;border-radius:18px;margin:0 auto 18px;background:linear-gradient(135deg,var(--gold),var(--gold2));display:grid;place-items:center;color:#111;font-size:28px;box-shadow:0 15px 40px rgba(212,160,23,.28)}
h1{font:700 clamp(2rem,5vw,3.1rem)/1.15 "Playfair Display",serif;background:linear-gradient(135deg,#fff,var(--gold2));-webkit-background-clip:text;background-clip:text;color:transparent}
.sub{color:#aaa;margin-top:9px}.grid{display:grid;grid-template-columns:1fr 1fr;gap:20px}.full{grid-column:1/-1}.group{display:flex;flex-direction:column;gap:8px}label{font-size:13px;font-weight:600;color:#ddd}
input,select,textarea{width:100%;border:1px solid var(--border);background:rgba(255,255,255,.055);color:#fff;padding:14px 15px;border-radius:12px;outline:none;font:inherit;transition:.25s}
select option{background:#111;color:#fff}textarea{min-height:145px;resize:vertical}input:focus,select:focus,textarea:focus{border-color:var(--gold);box-shadow:0 0 0 3px rgba(212,160,23,.1)}
.btn{border:0;width:100%;padding:16px;border-radius:12px;background:linear-gradient(135deg,var(--gold),var(--gold2));color:#111;font-weight:800;cursor:pointer;font-size:15px;transition:.3s;margin-top:8px}.btn:hover{transform:translateY(-2px);box-shadow:0 15px 35px rgba(212,160,23,.3)}
.note{margin-top:20px;padding:14px 16px;border:1px solid rgba(212,160,23,.22);background:rgba(212,160,23,.06);border-radius:12px;color:#bbb;font-size:13px}
@media(max-width:700px){.grid{grid-template-columns:1fr}.full{grid-column:auto}.wrap{width:min(100% - 20px,980px);padding-top:20px}}
</style>
</head>
<body>
<div class="wrap">
<a class="back" href="index.php"><i class="fas fa-arrow-left"></i> Kembali ke Website</a>
<div class="card">
<div class="head"><div class="icon"><i class="fas fa-calendar-check"></i></div><h1>Booking Konsultasi</h1><p class="sub">Jadwalkan konsultasi hukum bersama Kantor Hukum Haraka.</p></div>
<form action="proses_booking.php" method="POST">
<div class="grid">
<div class="group"><label>Nama Lengkap</label><input name="nama" required placeholder="Masukkan nama lengkap"></div>
<div class="group"><label>Email</label><input type="email" name="email" required placeholder="nama@email.com"></div>
<div class="group"><label>Nomor WhatsApp</label><input type="tel" name="no_whatsapp" required placeholder="08xxxxxxxxxx"></div>
<div class="group"><label>Layanan Hukum</label>
<select name="layanan" required><option value="">Pilih layanan</option>
<?php foreach($services as $s): ?><option value="<?=htmlspecialchars($s['nama_layanan'])?>" <?=($selected===$s['nama_layanan']?'selected':'')?>><?=htmlspecialchars($s['nama_layanan'])?></option><?php endforeach; ?>
</select></div>
<div class="group"><label>Tanggal Konsultasi</label><input type="date" name="tanggal" min="<?=date('Y-m-d')?>" required></div>
<div class="group"><label>Jam Konsultasi</label><input type="time" name="jam" min="08:00" max="17:00" required></div>
<div class="group full"><label>Metode Konsultasi</label><select name="metode_konsultasi" required><option value="">Pilih metode</option><option>Tatap Muka</option><option>WhatsApp</option><option>Zoom</option><option>Google Meet</option></select></div>
<div class="group full"><label>Jelaskan Permasalahan</label><textarea name="deskripsi_masalah" required placeholder="Ceritakan secara singkat permasalahan hukum yang ingin dikonsultasikan..."></textarea></div>
<div class="full"><button class="btn" type="submit"><i class="fas fa-paper-plane"></i> Ajukan Booking</button></div>
</div></form>
<div class="note"><i class="fas fa-circle-info"></i> Pengajuan masuk ke sistem administrasi. Admin akan melakukan konfirmasi terhadap jadwal yang dipilih.</div>
</div></div>
</body></html>
