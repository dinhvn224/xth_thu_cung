<?php
class CategoryQuery
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = connectDB();
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    public function all()
    {
        try {
            $sql = "SELECT category.id AS id, 
                category.name AS name, 
                category.image_src AS image_src, 
                COUNT(product.id) AS status
            FROM category
            LEFT JOIN product ON category.id = product.category_id
            GROUP BY category.id, category.name, category.image_src";
            
            $data = $this->pdo->query($sql)->fetchAll();
            $listCgr = [];
            foreach ($data as $row) {
                $listCgr[] = convertToObjCategory($row);
            }
            return $listCgr;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            echo "<hr>";
        }
    }

    public function only($id) {
        try {
            $sql = "SELECT * FROM category where id = " . $id;
            $only = pdo_query_one($sql);
            return $only;
        } catch (Exception $e) { 
            echo "Lỗi: " .$e->getMessage();
            echo "<hr>";
        }
    }

    public function add($name, $image_src) {
        try {
            $sql = "INSERT INTO category(name,image_src) values('$name','$image_src')";
            pdo_execute($sql);
        } catch (Exception $e) { 
            echo "Lỗi: " .$e->getMessage();
            echo "<hr>";
        }
    }

    public function edit($id, $name, $image_src) {
        try {
            if($image_src != null){
                $sql = "
                    UPDATE category SET name='$name',image_src='$image_src' WHERE id = $id
                ";
            }else{
                $sql = "
                    UPDATE category SET name='$name' WHERE id = $id
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
            $sql = "DELETE FROM category WHERE id = " . $id;
            pdo_execute($sql);
        } catch (Exception $e) { 
            echo "Lỗi: " .$e->getMessage();
            echo "<hr>";
        }
    }
}