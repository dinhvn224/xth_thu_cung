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
}