<?php
$host = "sql101.infinityfree.com";           // Dari halaman Control Panel
$db   = "if0_39334231_inventaris";        // Ganti dengan nama database kamu
$user = "if0_39334231";                      // Username dari Control Panel
$pass = "Inventaris123";                        // Password hosting kamu

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>
