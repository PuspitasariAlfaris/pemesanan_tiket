<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $user = mysqli_fetch_assoc($query);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Login gagal!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
        <h2>Login Pengguna</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button name="login">Login</button>
            <a href="register.php">Belum punya akun? Daftar</a>
        </form>
    </div>
</body>
</html>
