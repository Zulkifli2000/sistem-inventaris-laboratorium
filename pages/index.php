<?php
include '../auth.php';
include '../db.php';

// Hitung jumlah data
$a = $pdo->query('SELECT COUNT(*) FROM admins')->fetchColumn();
$i = $pdo->query('SELECT COUNT(*) FROM inventaris')->fetchColumn();
$r = $pdo->query('SELECT COUNT(*) FROM riwayat')->fetchColumn();
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard Laboratorium </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<!-- BootStrap --> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Navbar dengan link absolute sesuai struktur proyek -->
<?php include '../includes/navbar.php'; ?>

<div class="container mt-3">
    <h2 class="text-success">Dashboard</h2>
    <div class="row mt-3">
        <div class="col">
            <div class="card p-3 text-center">
                <h4>Admins: <?= $a ?></h4>
            </div>
        </div>
        <div class="col">
            <div class="card p-3 text-center">
                <h4>Inventaris: <?= $i ?></h4>
            </div>
        </div>
        <div class="col">
            <div class="card p-3 text-center">
                <h4>Riwayat: <?= $r ?></h4>
            </div>
        </div>
    </div>
</div>

</body>
</html>
