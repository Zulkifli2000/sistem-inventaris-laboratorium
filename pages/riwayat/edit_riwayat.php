<?php
include '../../auth.php';
include '../../db.php';

$id = $_GET['id']; 
$stmt = $pdo->prepare("SELECT * FROM riwayat WHERE id=?");
$stmt->execute([$id]);
$item = $stmt->fetch();

$msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $p = $_POST['peminjam'];
    $tp = $_POST['tanggal_pinjam'];    // ✅
    $tk = $_POST['tanggal_kembali'];   // ✅
    $s = $_POST['status'];

    $pdo->prepare("UPDATE riwayat 
                   SET peminjam=?, tanggal_pinjam=?, tanggal_kembali=?, status=? 
                   WHERE id=?")
        ->execute([$p, $tp, $tk, $s, $id]);
    $msg = "Data riwayat berhasil diupdate.";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Riwayat</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<!-- BootStrap --> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-3">
    <h3 class="text-success">Edit Riwayat</h3>
    <?php if($msg): ?><div class="alert alert-success"><?php echo $msg;?></div><?php endif; ?>

    <form method="POST">
        <div class="mb-3"><label>Peminjam</label><input required class="form-control" name="peminjam" value="<?= $item['peminjam']; ?>"></div>
        <div class="mb-3"><label>Tanggal Pinjam</label><input required class="form-control" name="tanggal_pinjam" value="<?= $item['tanggal_pinjam']; ?>"></div>
        <div class="mb-3"><label>Tanggal Kembali</label><input required class="form-control" name="tanggal_kembali" value="<?= $item['tanggal_kembali']; ?>"></div>
        <div class="mb-3"><label>Status</label><input required class="form-control" name="status" value="<?= $item['status']; ?>"></div>
        <button class="btn btn-success">Update</button>
    </form>
    <a href="riwayat.php" class="btn btn-secondary mt-3">Kembali</a>
</div>
</body>
</html>
