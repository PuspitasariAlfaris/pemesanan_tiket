<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$nama = $_POST['nama'];
$asal = $_POST['asal'];
$tujuan = $_POST['tujuan'];
$tanggal = $_POST['tanggal'];
$jumlah = $_POST['jumlah'];

mysqli_query($conn, "INSERT INTO tiket (user_id, nama, asal, tujuan, tanggal, jumlah) VALUES ('$user_id', '$nama', '$asal', '$tujuan', '$tanggal', '$jumlah')");
header("Location: lihat_pesanan.php");
