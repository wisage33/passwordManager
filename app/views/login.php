<?php
session_start();
require_once "../../vendor/autoload.php";

use models\Login;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];
}

if (!empty($login) && !empty($password)) {
    $user = new Login($login, $password);
    $user->login();
} else {
    $_SESSION['message'] = "Login or Password is invalid";
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/css/main.css?<?=time()?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Sign In</title>
</head>
<body>
<div class="card">
    <h1 class="title"><?= isset($_SESSION['message']) ? htmlspecialchars($_SESSION['message']) : 'Sign In' ?></h1>
    <?php unset($_SESSION['message']); ?>
    <form action="" method="POST" class="form">
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Register</button>
    </form>
    <span><a href="register.php">Sign Up</a></span>
</div>
</body>
</html>