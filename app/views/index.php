<?php
session_start();

use models\addPassword;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $user = new addPassword($login, $password);
    $user->add();
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
</head>
<body>
    <h1>Hello, <?=htmlspecialchars($_SESSION['user']['login'])?></h1>
    <form action="../models/addPassword.php" method="post">
        <h2>Add password</h2>
        <input type="text" placeholder="Login" name="login">
        <input type="email" placeholder="Email" name="email">
        <input type="password" placeholder="Password" name="password">
        <button type="submit">Add</button>
    </form>
    <table>
        <tr>
            <th>login</th>
            <th>email</th>
            <th>password</th>
        </tr>

    </table>
</body>
</html>
