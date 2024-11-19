<?php
class ProductController {
    public $productQuery;
    public $categoryQuery;

    public function __construct() {
        $this->productQuery = new ProductQuery();
        $this->categoryQuery = new CategoryQuery();
    }

    public function __destruct() {

    }

    public function list() {
        $listPro = $this->productQuery->all();
        include "views/product/list.php";
    }

    public function addProduct() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price_old = $_POST['price_old'] ?? '';
            $price_new = $_POST['price_new'] ?? '';
            $quantity = $_POST['quantity'] ?? '';
            $category_id = $_POST['category_id'] ?? '';
            $status = $_POST['status'] ?? '';

            $image_src = $_FILES['image_src']['name'];

            try {
                $result = $this->productQuery->add($name, $description, $price_old, $price_new, $quantity, $image_src, $category_id, $status);
                if ($result) {
                    redirect('success', 'Thêm mới thành công', 'add-pro');
                }  
            } catch (Exception $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        } 

        $listCgr = $this->categoryQuery->all();
        include "views/product/add.php";
    }

    public function editProduct($id) {
        $id = $_GET['id'] ?? '';
        if(isset($id) & $id > 0){
            $only = $this->productQuery->only($id);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price_old = $_POST['price_old'] ?? '';
            $price_new = $_POST['price_new'] ?? '';
            $quantity = $_POST['quantity'] ?? '';
            $category_id = $_POST['category_id'] ?? '';
            $status = $_POST['status'] ?? '';

            $image_src = $_FILES['image_src']['name'];
            try {
                $this->productQuery->edit($id, $name, $description, $price_old, $price_new, $quantity, $image_src, $category_id, $status);
                $result = "Sửa thành công";
                header("location: ?act=list-pro");   
            } catch (Exception $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        } 

        $listCgr = $this->categoryQuery->all();
        include "views/product/edit.php";
    }

    public function delProduct($id) {
        try {
            $id = $_GET['id'];
            $this->productQuery->del($id);

            header("location: ?act=list-pro");   
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
?>