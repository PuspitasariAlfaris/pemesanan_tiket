<?php
include 'db.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah terdaftar');</script>";
    } else {
        mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
        echo "<script>alert('Berhasil daftar! Silakan login');window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body { background-color: #ffe6f0; font-family: Arial; }
        .container {
            width: 300px; margin: 100px auto; background: #fff0f5;
            padding: 20px; border-radius: 10px; box-shadow: 0 0 10px #ff99cc;
        }
        input, button {
            width: 100%; padding: 10px; margin: 10px 0;
            border: 1px solid #ffb6c1; border-radius: 5px;
        }
        button { background: #ff69b4; color: white; border: none; }
        button:hover { background: #ff1493; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Pengguna</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button name="register">Register</button>
            <a href="login.php">Sudah punya akun? Login</a>
        </form>
    </div>
</body>
</html>
