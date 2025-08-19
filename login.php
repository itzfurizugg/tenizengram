<?php
session_start();
include("connect.php");

if (isset($_POST['login'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = $connect->query("SELECT * FROM users WHERE username = '$username'");
    
    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_assoc();

        if ($password == $data['password']) {
            // Simpan di session
            $_SESSION['username'] = $data['username'];
            $_SESSION['name'] = $data['name'];

            // Simpan cookie (valid 1 jam)
            setcookie("username", $data['username'], time() + 3600, "/");

            header("Location: index.php");
            exit();
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="">name</label>
            <input name="name" type="text" class="form-control" placeholder="name">
        </div>
        <div class="mb-3">
            <label for="">username</label>
            <input name="username" type="text" class="form-control" placeholder="username">
        </div>
        <div class="mb-3">
            <label for="">email</label>
            <input name="email" type="text" class="form-control" placeholder="email">
        </div>
        <div class="mb-3">
            <label for="">password</label>
            <input name="password" type="password" class="form-control" placeholder="password">
        </div>
        <div class="mb-3">
            <label for="">confirm password</label>
            <input name="confirm_password" type="text" class="form-control" placeholder="password">
        </div>
        <div class="mb-3">
            <button name="login">Login</button>
        </div>
        
        <a href="register.php">
            <button type="button">Belum ada akun? Register</button>
        </a>

    </form>
</body>

</html>