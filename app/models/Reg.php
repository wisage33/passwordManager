<?php
namespace models;

require_once "../../vendor/autoload.php";

use models\DataBase;
use PDO;

class Reg
{
    private $login;
    private $password;
    private $db;
    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
        $config = require '../../config/config.php';
        $this->db = new DataBase($config['db']);
    }
    public function signUp()
    {
        $stmt = $this->db->getConnection()->prepare("SELECT * FROM users WHERE login = :login");
        $stmt->execute(['login' => $this->login]);

        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<script>console.log('User already exists')</script>";
            $_SESSION['message'] = "User already exists";
            return false;
        }

        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt = $this->db->getConnection()->prepare("INSERT INTO users (login, password) VALUES (:login, :password)");
        $stmt->execute([
            ":login" => $this->login,
            ":password" => $hashedPassword
        ]);
        echo "<script>console.log('Sign up successfully')</script>";
        $_SESSION['message'] = "Sign up successfully";
        return true;
    }
    public function getBd()
    {
        return $this->db;
    }
}