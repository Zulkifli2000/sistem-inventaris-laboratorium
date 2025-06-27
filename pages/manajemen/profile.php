<?php
include '../../auth.php';
include '../../db.php';

$msg = '';
// Ambil data admin dari database
$stmt = $pdo->prepare("SELECT * FROM admins WHERE id = ?");
$stmt->execute([$_SESSION['admin_id']]);
$admin = $stmt->fetch();

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if (!empty($pass)) {
        $hash = password_hash($pass, PASSWORD_BCRYPT);
        $pdo->prepare("UPDATE admins SET nama=?, email=?, password=? WHERE id=?")
            ->execute([$nama, $email, $hash, $_SESSION['admin_id']]);
    } else {
        $pdo->prepare("UPDATE admins SET nama=?, email=? WHERE id=?")
            ->execute([$nama, $email, $_SESSION['admin_id']]);
    }
    $msg = "Data berhasil diupdate.";
    $_SESSION['admin_name'] = $nama; // Update session
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Profile Admin</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<!-- BootStrap --> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-3">
    <h3 class="text-success">Profile Admin</h3>
    <?php if($msg): ?>
      <div class="alert alert-success"><?= $msg ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <label>Nama</label>
            <input required class="form-control" name="nama" value="<?= htmlentities($admin['nama']); ?>">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input required class="form-control" name="email" type="email" value="<?= htmlentities($admin['email']); ?>">
        </div>
        <div class="mb-3">
            <label>Password Baru (kosongkan jika tidak diganti)</label>
            <input class="form-control" name="password" type="password">
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
    <!-- Link kembali ke dashboard -->
    <a href="../index.php" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
</div>
</body>
</html>
