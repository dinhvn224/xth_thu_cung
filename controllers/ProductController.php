<?php
class ProductController {
    public $productQuery;
    public $categoryQuery;

    public function __construct() {
        $this->productQuery = new ProductQuery();
        $this->categoryQuery = new CategoryQuery();
    }

    public function __destruct() {}

    public function list() {
        $listPro = $this->productQuery->all();
        include "views/product/list.php";
    }

    public function detailProduct($id) {
        try {
            $id = $_GET['id'];
            $only = $this->productQuery->only($id);
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }

        $listCgr = $this->categoryQuery->all();
        include "views/product/detail.php";
    }

    public function cart() {
        if (isset($_POST['addToCart']) && isset($_POST['id']) && $_POST["id"] > 0) {
            $product = $this->productQuery->find($_POST['id']);
            if ($product) {
                $quantity = $_POST['quantity'];
                $total = $product['price_new'] * $quantity;

                if (!isset($_SESSION["myCart"])) {
                    $_SESSION["myCart"] = [];
                }

                $productExists = false;
                foreach ($_SESSION["myCart"] as &$cartItem) {
                    if ($cartItem['id'] == $product['id']) {
                        $cartItem['quantity'] += $quantity;
                        $cartItem['total'] = $cartItem['price_new'] * $cartItem['quantity'];
                        $productExists = true;
                        break;
                    }
                }

                if (!$productExists) {
                    $array_pro = [
                        "id" => $product['id'],
                        "image_src" => $product['image_src'],
                        "name" => $product['name'],
                        "price_new" => $product['price_new'],
                        "quantity" => $quantity,
                        "total" => $total
                    ];
                    $_SESSION["myCart"][] = $array_pro;
                }
            } else {
                echo "Product not found.";
            }
        }

        if (isset($_POST['removeFromCart']) && isset($_POST['id']) && $_POST['id'] > 0) {
            foreach ($_SESSION["myCart"] as $key => $cartItem) {
                if ($cartItem['id'] == $_POST['id']) {
                    unset($_SESSION["myCart"][$key]);
                    break;
                }
            }
            $_SESSION["myCart"] = array_values($_SESSION["myCart"]);
        }

        $totalAmount = 0;
        if (isset($_SESSION["myCart"])) {
            foreach ($_SESSION["myCart"] as $pro) {
                $totalAmount += $pro['total'];
            }
        }

        $listCgr = $this->categoryQuery->all();
        include "views/cart.php";
    }
}
?>