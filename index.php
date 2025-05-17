<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pemesanan Tiket</title>
    <style>
        body { background-color: #ffe6f0; font-family: Arial; }
        .container {
            width: 400px; margin: 80px auto; background: #fff0f5;
            padding: 25px; border-radius: 10px; box-shadow: 0 0 15px #ff99cc;
        }
        h2 { text-align: center; color: #d63384; }
        input, select, button {
            width: 100%; padding: 10px; margin: 8px 0;
            border: 1px solid #ffb6c1; border-radius: 5px;
        }
        button {
            background-color: #ff69b4; color: white; font-weight: bold;
            cursor: pointer; border: none;
        }
        button:hover { background-color: #ff1493; }
        .link { text-align: center; margin-top: 15px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Pesan Tiket Kereta</h2>
    <form method="POST" action="proses.php">
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <select name="asal" required>
            <option value="">-- Pilih Asal --</option>
            <option>Jakarta</option>
            <option>Bandung</option>
            <option>Surabaya</option>
        </select>
        <select name="tujuan" required>
            <option value="">-- Pilih Tujuan --</option>
            <option>Yogyakarta</option>
            <option>Semarang</option>
            <option>Malang</option>
        </select>
        <input type="date" name="tanggal" required>
        <input type="number" name="jumlah" placeholder="Jumlah Tiket" required>
        <button type="submit">Pesan</button>
    </form>
    <div class="link">
        <a href="lihat_pesanan.php">Lihat Pesanan</a> | <a href="logout.php">Logout</a>
    </div>
</div>
</body>
</html>
