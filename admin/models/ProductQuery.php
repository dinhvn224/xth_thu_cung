<?php
    class ProductQuery {
        public $pdo;

        public function __construct() {
            $this->pdo = connectDB();
        }

        public function __destruct() {
            $this->pdo = null;
        }

        public function all() {
            try {
                $sql = "SELECT * FROM product";
                $data = $this->pdo->query($sql)->fetchAll();
                $listPro = [];
                foreach ($data as $row) {
                    // Chuyển đổi dữ liệu -> object Product
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
                $sql = "SELECT * FROM product where id = " . $id;
                $only = pdo_query_one($sql);
                return $only;
            } catch (Exception $e) { 
                echo "Lỗi: " .$e->getMessage();
                echo "<hr>";
            }
        }

        public function add($name, $description, $price_old, $price_new, $quantity, $image_src, $category_id, $status) {
            try {
                $sql = "INSERT INTO product(name,image_src,price_old,price_new,description,quantity,status,category_id ) values('$name','$image_src','$price_old','$price_new','$description','$quantity','$category_id','$status')";
                pdo_execute($sql);
            } catch (Exception $e) { 
                echo "Lỗi: " .$e->getMessage();
                echo "<hr>";
            }
        }

        public function edit($id, $name, $description, $price_old, $price_new, $quantity, $image_src, $category_id, $status) {
            try {
                if($image_src != null){
                    $sql = "
                        UPDATE product SET name='$name',description='$description',price_old='$price_old',price_new='$price_new',quantity='$quantity',image_src='$image_src',category_id='$category_id',status='$status' WHERE id = $id
                    ";
                }else{
                    $sql = "
                        UPDATE product SET name='$name',description='$description',price_old='$price_old',price_new='$price_new',quantity='$quantity',category_id='$category_id',status='$status' WHERE id = $id
                    ";
                }
                pdo_execute($sql);
            } catch (Exception $e) { 
                echo "Lỗi: " .$e->getMessage();
                echo "<hr>";
            }
        }

        public function del($id) {
            try {
                $sql = "DELETE FROM product WHERE id = " . $id;
                pdo_execute($sql);
            } catch (Exception $e) { 
                echo "Lỗi: " .$e->getMessage();
                echo "<hr>";
            }
        }
    }
?>