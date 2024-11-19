<?php
class BillController
{
    public $billQuery;

    public function __construct()
    {
        $this->billQuery = new BillQuery();
    }
    public function __destruct()
    {
    }

    public function list()
    {
        $listBill = $this->billQuery->all();

        include "views/bill/list.php";
    }
}
