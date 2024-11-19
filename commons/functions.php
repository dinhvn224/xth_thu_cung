<?php
    function connectDB()
    {
        $host = DB_HOST;
        $dbName = DB_NAME;

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbName", DB_USER, DB_PASS);
            return $conn;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            echo "<hr>";
        }
    }

    function convertToObjProduct($row) {
        $product = new Product();
        $product->id = $row['id'];
        $product->name = $row['name'];
        $product->description = $row['description'];
        $product->price_old = $row['price_old'];
        $product->price_new = $row['price_new'];
        $product->quantity = $row['quantity'];
        $product->image_src = $row['image_src'];
        $product->category_id = $row['category_id'];
        $product->status = $row['status'];
        return $product;
    }

    function convertToObjCategory($row) {
        $category = new Category();
        $category->id = $row['id'];
        $category->name = $row['name'];
        $category->image_src = $row['image_src'];
        $category->status = $row['status'];
        return $category;
    }

    function convertToObjAccount($row) {
        $account = new Account();
        $account->id = $row['id'];
        $account->name = $row['name'];
        $account->address = $row['address'];
        $account->email = $row['email'];
        $account->password = $row['password'];
        $account->role = $row['role'];
        return $account;
    }

    function convertToObjBill($row) {
        $bill = new Bill();
        $bill->id = $row['id'];
        $bill->name = $row['name'];
        return $bill;
    }

    function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = connectDB();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);

    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


function pdo_executeid($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = connectDB();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $lastInsertId = $conn->lastInsertId();

        return $lastInsertId;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);

    try {
        $conn = connectDB();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);

    try {
        $conn = connectDB();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }

}
?>