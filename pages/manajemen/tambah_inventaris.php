<?php
include '../../auth.php';
include '../../db.php';

$msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n = $_POST['nama']; 
    $s = $_POST['spesifikasi']; 
    $j = $_POST['jumlah'];

    $pdo->prepare("INSERT INTO inventaris (nama, spesifikasi, jumlah) VALUES (?,?,?)")
        ->execute([$n, $s, $j]);
    $msg = "Data berhasil ditambahkan.";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Tambah Inventaris</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<!-- BootStrap --> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-3">
    <h3 class="text-success">Tambah Inventaris</h3>
    <?php if($msg): ?><div class="alert alert-success"><?php echo $msg;?></div><?php endif; ?>
    <form method="POST">
        <div class="mb-3"><label>Nama</label><input required class="form-control" name="nama"></div>
        <div class="mb-3"><label>Spesifikasi</label><input required class="form-control" name="spesifikasi"></div>
        <div class="mb-3"><label>Jumlah</label><input required class="form-control" name="jumlah" type="number"></div>
        <button class="btn btn-success">Simpan</button>
    </form>
    <a href="inventaris.php" class="btn btn-secondary mt-3">Kembali</a>
</div>
</body>
</html>
