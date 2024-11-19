<?php
class BillQuery
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
            $sql = "SELECT bill.id as id, account.name as name FROM bill inner join account where bill.account_id = account.id;";
            $data = $this->pdo->query($sql)->fetchAll();
            $listBill = [];
            foreach ($data as $row) {
                $listBill[] = convertToObjBill($row);
            }
            return $listBill;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            echo "<hr>";
        }
    }
}
