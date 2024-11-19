<?php
    class AccountQuery {
        public $pdo;

        public function __construct() {
            $this->pdo = connectDB();
        }

        public function __destruct() {}

        // Viết hàm kiểm tra thông tin người dùng nhập vào
        public function checkLogin($email, $password) {
            try {
                $sql = "SELECT * FROM `account` WHERE email = '$email' and password = '$password';"; 
                $data = $this->pdo->query($sql)->fetch();
                // trường hợp ko tìm thấy tài khoản $data = false / 0
                if ($data === false) {
                    return $data;
                } else {
                    $account = new Account();
                    $account->id = $data['id'];
                    $account->name = $data['name'];
                    $account->address = $data['address'];
                    $account->email = $data['email'];
                    $account->password = $data['password'];
                    $account->role = $data['role'];
                    return $account;
                }
            } catch (Exception $e) {
                echo "Lỗi: " . $e->getMessage();
                echo "<hr>";
            }
        }

        public function register($name, $address, $email, $password) {
            try {
                $sql = "INSERT INTO `account` (`name`, `address`, `email`, `password`) VALUES ('$name', '$address', '$email', '$password')";
                $result = $this->pdo->exec($sql);
                return $result;
            } catch (Exception $e) {
                echo "Lỗi: " . $e->getMessage();
                echo "<hr>";
            }
        }
        
    }
?>