<?php

namespace models;

use models\DataBase;
use PDO;

class Login
{
    private $id;
    private $login;
    private $password;
    private $db;
    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
        $config = require "../../config/config.php";
        $this->db = new Database($config['db']);
    }
    public function login()
    {
        $stmt = $this->db->getConnection()->prepare("SELECT * FROM users WHERE login = :login");
        $stmt->execute([
            "login" => $this->login
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user['login'] == $this->login) {
            if (password_verify($this->password, $user['password'])) {
                echo "<script>console.log('Sign up successfully')</script>";
                $_SESSION['message'] = "Sign up successfully";
                $_SESSION['user'] = [
                    "id" => $user['id'],
                    "login" => $user['login'],
                    "password" => $user['password']
                ];
                header("Location: ../views/index.php");
                return true;
            } else {
                echo "<script>console.log('Sign up failed')</script>";
                $_SESSION['message'] = "Sign up failed";
                return false;
            }
        } else {
            echo "<script>console.log('Sign up failed')</script>";
            $_SESSION['message'] = "Sign up failed";
            return false;
        }
    }

    public function getId()
    {
        return $this->id;
    }
}