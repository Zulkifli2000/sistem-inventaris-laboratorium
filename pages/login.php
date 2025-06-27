<?php
include '../db.php';
session_start();
$msg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $e = $_POST['email']; 
    $p = $_POST['password'];
    $user = $pdo->prepare('SELECT * FROM admins WHERE email=?');
    $user->execute([$e]);
    $user = $user->fetch();

    if ($user && password_verify($p, $user['password'])) {
        $_SESSION['admin_id'] = $user['id']; 
        $_SESSION['admin_name'] = $user['nama']; 
        header('Location: index.php'); 
        exit();
    } else {
        $msg = 'Email atau password salah!';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<!-- BootStrap CDN-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width:400px;">
    <h3 class="text-success text-center">Login Admin</h3>
    <?php if ($msg): ?>
        <div class="alert alert-danger text-center"><?= $msg ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label>Email</label>
            <input required class="form-control" name="email" type="email">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input required class="form-control" name="password" type="password">
        </div>
        <button class="btn btn-success w-100">Login</button>
    </form>
    <div class="text-center mt-3">
        <a href="register.php" class="text-success">Belum punya akun? Register</a>
    </div>
</div>
</body>
</html>
