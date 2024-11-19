<?php
class CategoryController
{
    public $categoryQuery;

    public function __construct()
    {
        $this->categoryQuery = new CategoryQuery();
    }
    public function __destruct()
    {
    }

    public function list()
    {
        $listCgr = $this->categoryQuery->all();
        
        include "views/category/list.php";
    }

    public function addCategory() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';

            $image_src = $_FILES['image_src']['name'];

            try {
                $result = $this->categoryQuery->add($name, $image_src);
                if ($result) {
                    redirect('success', 'Thêm mới thành công', 'add-cgr');
                }  
            } catch (Exception $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        } 

        include "views/category/add.php";
    }

    public function editCategory($id) {
        $id = $_GET['id'] ?? '';
        if(isset($id) & $id > 0){
            $only = $this->categoryQuery->only($id);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $name = $_POST['name'] ?? '';
            
            $image_src = $_FILES['image_src']['name'];
            try {
                $this->categoryQuery->edit($id, $name, $image_src);

                header("location: ?act=list-cgr");   
            } catch (Exception $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        } 

        include "views/category/edit.php";
    }

    public function delCategory($id) {
        try {
            $id = $_GET['id'];
            $this->categoryQuery->del($id);

            header("location: ?act=list-cgr");   
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}