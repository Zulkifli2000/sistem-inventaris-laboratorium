<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../../auth.php';
include '../../db.php';

$items = $pdo->query("SELECT * FROM riwayat")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<title>Riwayat</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<!-- BootStrap --> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-3">
    <h3 class="text-success">Riwayat</h3>
    <a href="tambah_riwayat.php" class="btn btn-success btn-sm">Tambah Riwayat</a>
    <table class="table table-hover mt-3">
        <thead class="table-success">
            <tr><th>ID</th><th>Peminjam</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th><th>Status</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            <?php if(count($items) == 0): ?>
                <tr><td colspan="6" class="text-center">Belum ada data riwayat</td></tr>
            <?php else: ?>
                <?php foreach($items as $it): ?>
                <tr>
                    <td><?= $it['id']; ?></td>
                    <td><?= $it['peminjam']; ?></td>
                    <td><?= $it['tanggal_pinjam']; ?></td>
                    <td><?= $it['tanggal_kembali']; ?></td>
                    <td><?= $it['status']; ?></td>
                    <td>
                        <a href="edit_riwayat.php?id=<?= $it['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="hapus_riwayat.php?id=<?= $it['id']; ?>"
                           class="btn btn-danger btn-sm"
                           onClick="return confirm('Hapus riwayat ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <!-- Link kembali ke dashboard -->
    <a href="../index.php" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
</div>
</body>
</html>
