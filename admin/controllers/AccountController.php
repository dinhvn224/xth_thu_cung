<?php
class AccountController
{
    public $accountQuery;

    public function __construct()
    {
        $this->accountQuery = new AccountQuery();
    }
    public function __destruct()
    {
    }

    public function list()
    {
        $listAcc = $this->accountQuery->all();

        include "views/account/list.php";
    }
}
