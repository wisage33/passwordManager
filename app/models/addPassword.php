<?php

namespace models;

use models\OpenSSL;
class addPassword
{
    private $url;
    private $login;
    private $password;
    private $db;
    private $openssl;
    public function __construct($url, $password, $login = null)
    {
        $this->url = $url;
        $this->login =$login;
        $this->password = $password;
        $config = require "../../config/config.php";
        $this->db = new DataBase($config['db']);
        $this->openssl = new OpenSSL();
    }
    public function add()
    {
        $stmt = $this->db->getConnection()->prepare("INSERT INTO listPasswords 
        (user_id, url, login, password) 
        VALUES (:user_id, :url, :login, :password)");

        $stmt->execute([
            'user_id' => $_SESSION['user']['id'],
            "url" => $this->url,
            "login" => $this->login,
            "password" => $this->openssl->encrypt($this->password)
        ]);
        echo "<script>console.log('Password added');</script>";
        header("Location:". $_SERVER['PHP_SELF']);
    }
}