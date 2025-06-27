<?php
include '../../auth.php';
include '../../db.php';

$id = $_GET['id'];
$msg = '';

// Ambil data dari id
$stmt = $pdo->prepare("SELECT * FROM inventaris WHERE id = ?");
$stmt->execute([$id]);
$item = $stmt->fetch();

// Jika item tidak ditemukan
if (!$item) {
    die("Data tidak ditemukan!");
}

// Proses Update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n = $_POST['nama']; 
    $s = $_POST['spesifikasi']; 
    $j = $_POST['jumlah'];

    $pdo->prepare("UPDATE inventaris SET nama=?, spesifikasi=?, jumlah=? WHERE id=?")
        ->execute([$n, $s, $j, $id]);
    $msg = "Data berhasil diupdate.";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Inventaris - <?= htmlentities($item['nama']); ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<!-- BootStrap --> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-3">
    <h3 class="text-success">Edit Inventaris: <?= htmlentities($item['nama']); ?></h3>
    <?php if($msg): ?><div class="alert alert-success"><?php echo $msg;?></div><?php endif; ?>

    <form method="POST">
        <div class="mb-3"><label>Nama</label><input required class="form-control" name="nama" value="<?= htmlentities($item['nama']); ?>"></div>
        <div class="mb-3"><label>Spesifikasi</label><input required class="form-control" name="spesifikasi" value="<?= htmlentities($item['spesifikasi']); ?>"></div>
        <div class="mb-3"><label>Jumlah</label><input required class="form-control" name="jumlah" value="<?= htmlentities($item['jumlah']); ?>"></div>
        <button class="btn btn-success">Update</button>
    </form>

    <a href="inventaris.php" class="btn btn-secondary mt-3">Kembali</a>
</div>
</body>
</html>
