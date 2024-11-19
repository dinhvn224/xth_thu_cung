<?php include "views/component/header.php"; ?>

<main class="container">
    <!-- Main content -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Đơn Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Số Tiền</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php 
                if (isset($_SESSION["myCart"]))  {
                    foreach ($_SESSION["myCart"] as $pro) : ?>
            <tr>
                <th scope="row" style="width: 50%;">
                    <input type="checkbox" class="me-2">
                    <img src="<?= BASE_URL_IMG. $pro["image_src"] ?>" width="20%" alt="">
                    <span><?= $pro["name"]?></span>
                </th>
                <td>
                    <div class="d-flex text-center">
                        <span class="text-black fw-bold pe-2"><?= number_format($pro["price_new"]) ?> VNĐ</span>
                    </div>
                </td>
                <td>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination d-flex">
                            <li class="page-item">
                                <a class="page-link text-success" aria-label="Next">
                                    <span> - </span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link text-success" href="#"><?= $pro["quantity"] ?></a>
                            </li>
                            <li class="page-item">
                                <a class="page-link text-success" aria-label="Previous">
                                    <i class="fa-solid fa-plus fa-xs"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </td>
                <td><?= number_format($pro["total"]) ?> VNĐ</td>
                <td>
                    <form action="?act=cart" method="POST">
                        <input type="hidden" name="id" value="<?= $pro['id'] ?>">
                        <button class="btn btn-danger" name="removeFromCart">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; }?>
        </tbody>
    </table>
    <div class="d-flex justify-content-between mb-3">
        <div>
            <input type="checkbox" class="me-3">
            <span class="me-3">Chọn tất cả (<?php
            if(isset($_SESSION["myCart"]) && count($_SESSION["myCart"]) > 0) {
                echo count($_SESSION["myCart"]);
            } else {
                echo "0";
            }
                 ?>)</span>
            <button class="btn btn-danger">Xóa</button>
        </div>
        <div class="d-flex">
            <div>
                <span><b>Tổng tiền: </b><?= number_format($totalAmount) ?> VNĐ</span>
            </div>
            <a href="#">
                <button class="btn btn-success mx-2">Mua hàng</button>
            </a>
        </div>
    </div>
    <!-- End main content -->
</main>

<?php include "views/component/footer.php"; ?>