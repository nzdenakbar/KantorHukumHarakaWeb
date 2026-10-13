<?php
require_once __DIR__ . '/auth.php'; require_admin();
require_once __DIR__ . '/../koneksi.php';

function count_status(mysqli $conn, string $table, string $statusCol, string $status): int {
    $stmt=$conn->prepare("SELECT COUNT(*) total FROM `$table` WHERE `$statusCol`=?"); $stmt->bind_param('s',$status); $stmt->execute();
    return (int)$stmt->get_result()->fetch_assoc()['total'];
}
$totalBooking=(int)$conn->query("SELECT COUNT(*) total FROM bookings")->fetch_assoc()['total'];
$waiting=count_status($conn,'bookings','status','Menunggu');
$confirmed=count_status($conn,'bookings','status','Dikonfirmasi');
$newConsult=count_status($conn,'consultations','status','Baru');
$recent=$conn->query("SELECT kode_booking,nama,layanan,tanggal,jam,status FROM bookings ORDER BY id DESC LIMIT 8");
?>
<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Dashboard Admin | Haraka</title><link rel="stylesheet" href="admin.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></head>
<body><aside class="side"><div class="brand"><i class="fas fa-scale-balanced"></i><span>HARAKA<br><small>ADMIN PANEL</small></span></div><a class="active" href="dashboard.php"><i class="fas fa-chart-pie"></i> Dashboard</a><a href="booking.php"><i class="fas fa-calendar-check"></i> Booking</a><a href="konsultasi.php"><i class="fas fa-comments"></i> Konsultasi</a><a href="../index.php"><i class="fas fa-globe"></i> Website</a><a href="logout.php"><i class="fas fa-right-from-bracket"></i> Logout</a></aside>
<main><header><div><span class="eyebrow">ADMINISTRATION</span><h1>Dashboard</h1><p>Selamat datang, <?=htmlspecialchars($_SESSION['admin_name'] ?? 'Administrator')?>.</p></div><a class="gold-btn" href="booking.php"><i class="fas fa-plus"></i> Booking</a></header>
<section class="stats"><div class="stat"><i class="fas fa-calendar-days"></i><span>Total Booking</span><strong><?=$totalBooking?></strong></div><div class="stat"><i class="fas fa-hourglass-half"></i><span>Menunggu</span><strong><?=$waiting?></strong></div><div class="stat"><i class="fas fa-circle-check"></i><span>Dikonfirmasi</span><strong><?=$confirmed?></strong></div><div class="stat"><i class="fas fa-message"></i><span>Konsultasi Baru</span><strong><?=$newConsult?></strong></div></section>
<section class="panel"><div class="panel-head"><div><span class="eyebrow">RECENT ACTIVITY</span><h2>Booking Terbaru</h2></div><a href="booking.php">Lihat semua <i class="fas fa-arrow-right"></i></a></div>
<div class="table-wrap"><table><thead><tr><th>Kode</th><th>Klien</th><th>Layanan</th><th>Jadwal</th><th>Status</th></tr></thead><tbody>
<?php while($r=$recent->fetch_assoc()): ?><tr><td><b><?=htmlspecialchars($r['kode_booking'])?></b></td><td><?=htmlspecialchars($r['nama'])?></td><td><?=htmlspecialchars($r['layanan'])?></td><td><?=date('d/m/Y',strtotime($r['tanggal']))?> · <?=substr($r['jam'],0,5)?></td><td><span class="badge <?=strtolower($r['status'])?>"><?=htmlspecialchars($r['status'])?></span></td></tr><?php endwhile; ?>
</tbody></table></div></section></main></body></html>
