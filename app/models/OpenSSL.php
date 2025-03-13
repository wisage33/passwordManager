<?php

namespace models;

class OpenSSL
{
    private $cipher = "aes-256-cbc";
    private $key;
    public function __construct($cipher = "aes-256-cbc") {
        $this->cipher = $cipher;
        $key = require '../../config/config.php';
        $this->key = $key['key'];
    }
    public function encrypt($password) {
        $ivlen = openssl_cipher_iv_length($this->cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $encrypted = openssl_encrypt($password, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($iv . $encrypted);
    }
    public function decrypt($encryptedPassword) {
        $password = base64_decode($encryptedPassword);
        $ivlen = openssl_cipher_iv_length($this->cipher);
        $iv = substr($password, 0, $ivlen);
        $encryptedPassword = substr($password, $ivlen);
        return openssl_decrypt($encryptedPassword, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
    }
}