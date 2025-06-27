<?php
include '../db.php';

$msg = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n = $_POST['nama']; 
    $e = $_POST['email']; 
    $p = $_POST['password']; 
    $c = $_POST['konfirmasi']; 
    if($p == $c) {
        $h = password_hash($p, PASSWORD_BCRYPT);
        $pdo->prepare('INSERT INTO admins (nama, email, password) VALUES (?,?,?)')->execute([$n, $e, $h]);
        $msg = 'Register berhasil!';
    } else {
        $msg = 'Password tidak cocok!';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- BootStrap 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width:400px;">
    <h3 class="text-success text-center">Register Admin</h3>
    <?php if($msg): ?>
        <div class="alert alert-success text-center"><?php echo $msg; ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <label>Nama</label>
            <input required class="form-control" name="nama">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input required class="form-control" name="email" type="email">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input required class="form-control" name="password" type="password">
        </div>
        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input required class="form-control" name="konfirmasi" type="password">
        </div>
        <button class="btn btn-success w-100">Register</button>
    </form>
    <div class="text-center mt-3">
        <a href="login.php" class="text-success">Sudah punya akun? Login</a>
    </div>
</div>
</body>
</html>
