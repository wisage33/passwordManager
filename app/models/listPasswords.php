<?php

namespace models;

use PDO;

class listPasswords
{
    private $list = [];
    private $db;

    public function __construct()
    {
        $config = require "../../config/config.php";
        $this->db = new DataBase($config['db']);
    }
    public function getListPasswords()
    {
        $stmt = $this->db->getConnection()->prepare("SELECT * FROM listPasswords WHERE user_id = :user_id");
        $stmt->execute([
            "user_id" => $_SESSION['user']['id']
        ]);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $this->list[] = $row;
            }
        }
    }
    public function getList() {
        return $this->list;
    }
}