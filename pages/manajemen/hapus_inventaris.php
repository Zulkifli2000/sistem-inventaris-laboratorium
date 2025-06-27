<?php
include '../../auth.php';
include '../../db.php';

// Cek apakah 'id' tersedia
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID tidak valid");
}

$id = $_GET['id'];

// Hapus data
$stmt = $pdo->prepare("DELETE FROM inventaris WHERE id = ?");
$stmt->execute([$id]);

// Kembali ke halaman inventaris
header("Location: inventaris.php");
exit();
