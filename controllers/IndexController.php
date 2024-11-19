<?php
    class IndexController {
        public $productQuery;
        public $categoryQuery;

        public function __construct() {
            $this->productQuery = new ProductQuery();
            $this->categoryQuery = new CategoryQuery();
        }
        public function __destruct() {

        }

        public function home() {
            $listPro = $this->productQuery->top8ProductLatest();
            $listCgr = $this->categoryQuery->all();
            include "views/home.php";
        }
    }
?>