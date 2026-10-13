<?php
require_once __DIR__ . '/auth.php'; require_admin(); require_once __DIR__ . '/../koneksi.php';
$id=(int)($_POST['id']??0); $status=$_POST['status']??'';
$allowed=['Menunggu','Dikonfirmasi','Selesai','Dibatalkan'];
if($id<1 || !in_array($status,$allowed,true)){die('Permintaan tidak valid.');}
$stmt=$conn->prepare("UPDATE bookings SET status=? WHERE id=?"); $stmt->bind_param('si',$status,$id); $stmt->execute();
header('Location: booking.php'); exit;
?>
