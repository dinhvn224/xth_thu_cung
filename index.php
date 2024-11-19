<?php
    session_start();
    if (isset($_GET['act']) && $_GET['act'] === 'logout') {

        session_unset();
        session_destroy();

        header('Location: index.php'); 
        exit;
    }

    require_once "commons/env.php";
    require_once "commons/functions.php";

    // Controllers
    require_once "controllers/IndexController.php";
    require_once "controllers/ProductController.php";
    require_once "controllers/AccountController.php";

    // Models
    require_once "models/Product.php";
    require_once "models/ProductQuery.php";
    require_once "models/Category.php";
    require_once "models/CategoryQuery.php";
    require_once "models/Account.php";
    require_once "models/AccountQuery.php";

    $act = $_GET['act'] ?? "";
    $id = $_GET['id'] ?? "";

    try {
        match($act) {
            '' => (new IndexController()) -> home(),

            'detail-pro' => (new ProductController()) -> detailProduct($id),
            'cart' => (new ProductController()) -> cart(),

            'login' => (new AccountController()) -> login(),
            'register' => (new AccountController()) -> register(),
        };
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }

?>