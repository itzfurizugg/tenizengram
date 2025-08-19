<?php
session_start();
include("connect.php");

if (isset($_POST['register'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password != $confirm_password) {
        echo "Konfirmasi password tidak cocok!";
    } else {
        $register = $connect->query("INSERT INTO users (name, username, email, password) VALUES ('$name',  '$username', '$email', '$password')");

        if ($register) {
            // Auto-login
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $name;

            header("Location: index.php");
        } else {
            echo "Register gagal, silahkan coba lagi";
        }
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
            <button name="register">Register</button>
        </div>

        <a href="login.php">
            <button type="button">Sudah memiliki akun? Login</button>
        </a>
    </form>
</body>

</html>