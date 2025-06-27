<?php
include '../../auth.php';
include '../../db.php';
$items = $pdo->query("SELECT * FROM inventaris")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<title>Inventaris</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<!-- BootStrap --> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-3">
    <h2 class="text-success">Inventaris</h2>
    <a href="tambah_inventaris.php" class="btn btn-success btn-sm">Tambah</a>
    <table class="table table-hover mt-3">
        <thead class="table-success">
            <tr><th>ID</th><th>Nama</th><th>Spesifikasi</th><th>Jumlah</th><th>Aksi</th></tr>
        </thead>
        <tbody>
        <?php foreach($items as $it): ?>
            <tr>
                <td><?= $it['id']; ?></td>
                <td><?= $it['nama']; ?></td>
                <td><?= $it['spesifikasi']; ?></td>
                <td><?= $it['jumlah']; ?></td>
                <td>
                    <a href="edit_inventaris.php?id=<?= $it['id']; ?>" class="btn btn-primary btn-sm">Edit</a> 
                    <a href="hapus_inventaris.php?id=<?= $it['id']; ?>" class="btn btn-danger btn-sm" onClick="return confirm('Hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <!-- Link kembali ke dashboard menggunakan relative path naik satu level ke pages/index.php -->
    <a href="../index.php" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
</div>
</body>
</html>
