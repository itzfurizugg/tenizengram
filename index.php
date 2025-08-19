<?php
session_start();
?>   

<!DOCTYPE html>
<html>
<head>
    <title>Beranda</title>
</head>
<body>
    <?php if (isset($_SESSION['username'])): ?>
        <h1>Halo, <?= $_SESSION['name'] ?>!</h1>
        <a href="logout.php">Logout</a>

    <?php elseif (isset($_COOKIE['username'])): ?>
        <h1>Selamat datang kembali, <?= $_COOKIE['username'] ?>!</h1>
        <button a href="logout.php">Logout</button>

    <?php else: ?>
        <h1>Anda belum login!</h1>
        <a href="login.php">Login</a>
    <?php endif; ?>
</body>
</html>
