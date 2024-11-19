<?php
class AccountQuery
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
            $sql = "SELECT * FROM account";
            $data = $this->pdo->query($sql)->fetchAll();
            $listAcc = [];
            foreach ($data as $row) {
                $listAcc[] = convertToObjAccount($row);
            }
            return $listAcc;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            echo "<hr>";
        }
    }
}
