<?php
include '../../auth.php';
include '../../db.php';
$items = $pdo->query("SELECT * FROM admins")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<title>Daftar Admin</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<!-- BootStrap --> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-3">
    <h3 class="text-success">Daftar Admin</h3>
    <table class="table table-hover mt-3">
        <thead class="table-success">
            <tr><th>ID</th><th>Nama</th><th>Email</th></tr>
        </thead>
        <tbody>
            <?php foreach($items as $it): ?>
                <tr>
                    <td><?= $it['id']; ?></td>
                    <td><?= $it['nama']; ?></td>
                    <td><?= $it['email']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- Perbaikan link kembali ke dashboard -->
    <a href="../index.php" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
</div>
</body>
</html>
