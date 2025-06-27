<?php
include '../../auth.php';
include '../../db.php';
$msg = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $p = $_POST['peminjam'];
    $tp = $_POST['tanggal_pinjam'];
    $tk = $_POST['tanggal_kembali'];
    $s = $_POST['status'];

    $pdo->prepare("INSERT INTO riwayat (peminjam, tanggal_pinjam, tanggal_kembali, status) VALUES (?,?,?,?)")
        ->execute([$p, $tp, $tk, $s]);
    $msg = "Data riwayat berhasil ditambahkan.";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Tambah Riwayat</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<!-- BootStrap --> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-3">
    <h3 class="text-success">Tambah Riwayat</h3>
    <?php if($msg): ?><div class="alert alert-success"><?php echo $msg;?></div><?php endif; ?>
    <form method="POST">
        <div class="mb-3"><label>Peminjam</label><input required class="form-control" name="peminjam"></div>
        <div class="mb-3"><label>Tanggal Pinjam</label><input required class="form-control" name="tanggal_pinjam" type="datetime-local"></div>
        <div class="mb-3"><label>Tanggal Kembali</label><input required class="form-control" name="tanggal_kembali" type="datetime-local"></div>
        <div class="mb-3"><label>Status</label><input required class="form-control" name="status"></div>
        <button class="btn btn-success">Simpan</button>
    </form>
    <a href="riwayat.php" class="btn btn-secondary mt-3">Kembali</a>
</div>
</body>
</html>
