<?php
    class ProductQuery {
        public $pdo;

        public function __construct() {
            $this->pdo = connectDB();
        }

        public function __destruct() {
            $this->pdo = null;
        }

        public function top8ProductLatest() {
            try {
                $sql = "SELECT * FROM product order by id DESC LIMIT 8";
                $data = $this->pdo->query($sql)->fetchAll();
                $listPro = [];
                foreach ($data as $row) {
                    $listPro[] = convertToObjProduct($row);
                }
                return $listPro;
            } catch (Exception $e) { 
                echo "Lỗi: " .$e->getMessage();
                echo "<hr>";
            }
        }

        public function only($id) {
            try {
                $sql = "SELECT *, product.id as id, category.name as cgr_name, product.image_src as pro_img FROM product
                INNER JOIN category on product.category_id = category.id 
                where product.id = " . $id;
                $only = pdo_query_one($sql);
                return $only;
            } catch (Exception $e) {
                echo "Lỗi: " .$e->getMessage();
                echo "<hr>";
            }
        }

        public function find($id) {
            try {
                $sql = "SELECT * FROM product WHERE id = $id";
                $product = pdo_query_one($sql);
                return $product;
            } catch (Exception $e) {
                echo "Lỗi: " .$e->getMessage();
                echo "<hr>";
            }
        }
    }
?>