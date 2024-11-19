<?php
    class AccountController {
        public $accountQuery;
        public $categoryQuery;


        public function __construct() {
            $this->accountQuery = new AccountQuery();
            $this->categoryQuery = new CategoryQuery();
        }
        public function __destruct() {

        }

        public function login() {
            if (isset($_POST["submitLogin"])) {
                $email = trim($_POST["email"]);
                $password = trim($_POST["password"]);

                $result = $this->accountQuery->checkLogin($email, $password);
                if ($result === false) { 
                    header("location: ?act=register");
                } else {
                    $_SESSION["user_name"] = $result->name ;
                    $_SESSION["user_id"] = $result->id;
                    $_SESSION["user_role"] = $result->role; 

                    header("location: admin/index.php");
                }
            }
            
            $listCgr = $this->categoryQuery->all();
            include "views/account/login.php";
        }
        
        public function register() {
            if (isset($_POST["submitRegister"])) {
                $name = $_POST["name"];
                $address = $_POST["address"];
                $email = $_POST["email"];
                $password = $_POST["password"];
            
                $result = $this->accountQuery->register($name, $address, $email, $password);

                if ($result) {
                    echo "Đăng kí thành công!";
                    header("Location: ?act=login");
                    exit; 
                } else {
                    echo "Đăng kí không thành công! Vui lòng thử lại.";
                }
            }

            $listCgr = $this->categoryQuery->all();
            include "views/account/register.php";
        }
    }
?>