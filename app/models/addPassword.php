<?php

namespace models;
class addPassword
{
    private $login;
    private $password;
    private $db;
    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
        $config = require "../../config/config.php";
        $this->db = new DataBase($config['db']);
    }
    public function add()
    {
//        $stmt = $this->db->getConnection()->prepare("INSERT INTO listPasswords (login, password) VALUES (:login, :password)");
//        $stmt->execute([
//            "login" => $this->login,
//            "password" => $this->password
//        ]);
        echo "<script>console.log('Password added');</script>')";
    }
}