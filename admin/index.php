<?php
    session_start();

    require_once "../commons/env.php";
    require_once "../commons/functions.php";

    // Controllers
    require_once "controllers/IndexController.php";
    require_once "controllers/ProductController.php";
    require_once "controllers/CategoryController.php";
    require_once "controllers/AccountController.php";
    require_once "controllers/BillController.php";

    // Models
    require_once "models/Product.php";
    require_once "models/ProductQuery.php";
    require_once "models/Category.php";
    require_once "models/CategoryQuery.php";
    require_once "models/Account.php";
    require_once "models/AccountQuery.php";
    require_once "models/Bill.php";
    require_once "models/BillQuery.php";

    $act = $_GET['act'] ?? "";
    $id = $_GET['id'] ?? "";

    include "views/component/header.php";
    include "views/component/sidebar.php";
    
    if (isset($_SESSION["user_id"]) && isset($_SESSION["user_name"]) && $_SESSION["user_role"] === 0) {
            match($act) {
                '' => (new IndexController()) -> home(),
                'list-pro' => (new ProductController()) -> list(),
                'add-pro' => (new ProductController()) -> addProduct(),
                'edit-pro' => (new ProductController()) -> editProduct($id),
                'del-pro' => (new ProductController()) -> delProduct($id),
                
                'list-cgr' => (new CategoryController()) -> list(),
                'add-cgr' => (new CategoryController()) -> addCategory(),
                'edit-cgr' => (new CategoryController()) -> editCategory($id),
                'del-cgr' => (new CategoryController()) -> delCategory($id),

                'list-acc' => (new AccountController()) -> list(),

                'list-bill' => (new BillController()) -> list(),
            };
            
    } else {
        header('Location: ../index.php');
    }

    include "views/component/footer.php";
    
?>