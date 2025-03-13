<?php
require_once "../../vendor/autoload.php";
session_start();

use models\addPassword;
use models\listPasswords;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $url = $_POST['url'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    $user = new addPassword($url, $password, $login);
    $user->add();
    unset($_POST);
}

$listPasswords = new listPasswords();
$listPasswords->getListPasswords();
$list = $listPasswords->getList();
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
    <form action="" method="post">
        <h2>Add password</h2>
        <input type="text" placeholder="Link of website" name="url">
        <input type="email" placeholder="Login" name="login">
        <input type="password" placeholder="Password" name="password">
        <button type="submit">Add</button>
    </form>
    <table>
        <tr>
            <th>URL</th>
            <th>login</th>
            <th>password</th>
        </tr>
        <?php foreach ($list as $password): ?>
        <tr>
            <td><?=htmlspecialchars($password['url'])?></td>
            <td><?=htmlspecialchars($password['login'])?></td>
            <td><?=htmlspecialchars($password['password'])?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
