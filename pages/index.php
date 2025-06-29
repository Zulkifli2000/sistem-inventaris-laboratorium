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
  <title>Dashboard Laboratorium</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <!-- BootStrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons (optional) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include '../includes/navbar.php'; ?>

<div class="container mt-4">
  <h2 class="text-success mb-4 text-center">Dashboard Laboratorium</h2>
  <div class="row g-3">
    <div class="col-12 col-md-4">
      <div class="card text-center shadow-sm border-0">
        <div class="card-body">
          <i class="bi bi-person-fill text-success" style="font-size: 2rem;"></i>
          <h5 class="card-title mt-2">Admins</h5>
          <p class="card-text fs-4"><?= $a ?></p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card text-center shadow-sm border-0">
        <div class="card-body">
          <i class="bi bi-hdd-network-fill text-primary" style="font-size: 2rem;"></i>
          <h5 class="card-title mt-2">Inventaris</h5>
          <p class="card-text fs-4"><?= $i ?></p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card text-center shadow-sm border-0">
        <div class="card-body">
          <i class="bi bi-clock-history text-warning" style="font-size: 2rem;"></i>
          <h5 class="card-title mt-2">Riwayat</h5>
          <p class="card-text fs-4"><?= $r ?></p>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
