<?php
include '../../auth.php';
include '../../db.php';

$id = $_GET['id'];
$pdo->prepare("DELETE FROM riwayat WHERE id=?")->execute([$id]);
header("Location: riwayat.php");
exit();
