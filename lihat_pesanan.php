<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$data = mysqli_query($conn, "SELECT * FROM tiket WHERE user_id='$user_id'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pesanan Saya</title>
    <style>
        body { background-color: #ffe6f0; font-family: Arial; }
        .container {
            width: 600px; margin: 50px auto; background: #fff0f5;
            padding: 20px; border-radius: 10px; box-shadow: 0 0 15px #ff99cc;
        }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ccc; }
        th { background-color: #ffb6c1; }
        a { color: #ff1493; text-decoration: none; }
    </style>
</head>
<body>
<div class="container">
    <h2>Daftar Pesanan</h2>
    <table>
        <tr>
            <th>Nama</th><th>Asal</th><th>Tujuan</th><th>Tanggal</th><th>Jumlah</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($data)): ?>
        <tr>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['asal'] ?></td>
            <td><?= $row['tujuan'] ?></td>
            <td><?= $row['tanggal'] ?></td>
            <td><?= $row['jumlah'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br><a href="index.php">⟵ Kembali</a>
</div>
</body>
</html>
