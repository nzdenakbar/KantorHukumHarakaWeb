<?php
require_once __DIR__ . '/auth.php'; require_admin(); require_once __DIR__ . '/../koneksi.php';
$rows=$conn->query("SELECT * FROM consultations ORDER BY id DESC");
?>
<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Konsultasi | Haraka Admin</title><link rel="stylesheet" href="admin.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></head>
<body><aside class="side"><div class="brand"><i class="fas fa-scale-balanced"></i><span>HARAKA<br><small>ADMIN PANEL</small></span></div><a href="dashboard.php"><i class="fas fa-chart-pie"></i> Dashboard</a><a href="booking.php"><i class="fas fa-calendar-check"></i> Booking</a><a class="active" href="konsultasi.php"><i class="fas fa-comments"></i> Konsultasi</a><a href="../index.php"><i class="fas fa-globe"></i> Website</a><a href="logout.php"><i class="fas fa-right-from-bracket"></i> Logout</a></aside>
<main><header><div><span class="eyebrow">CONSULTATION INBOX</span><h1>Data Konsultasi</h1><p>Pesan konsultasi yang masuk dari website.</p></div></header>
<section class="panel"><div class="table-wrap"><table><thead><tr><th>Klien</th><th>Layanan</th><th>Metode</th><th>Pesan</th><th>Status</th></tr></thead><tbody>
<?php while($r=$rows->fetch_assoc()): ?><tr><td><b><?=htmlspecialchars($r['nama'])?></b><br><small><?=htmlspecialchars($r['email'])?> · <?=htmlspecialchars($r['no_whatsapp'])?></small></td><td><?=htmlspecialchars($r['layanan'])?></td><td><?=htmlspecialchars($r['metode'])?></td><td style="max-width:420px;white-space:normal"><?=nl2br(htmlspecialchars($r['pesan']))?></td><td><span class="badge"><?=htmlspecialchars($r['status'])?></span></td></tr><?php endwhile; ?>
</tbody></table></div></section></main></body></html>
