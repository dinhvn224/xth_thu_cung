<?php include "views/component/header.php"; ?>

<main class="container">
    <!-- Main content -->
    <div class="row p-4">
        <div class="col-md-4 rounded-2">
            <img src="<?= BASE_URL_IMG . $only['pro_img']?>" class="rounded-4" alt="">
        </div>

        <div class="col-md-6 d-flex justify-content-center flex-column">
            <h3 class="fw-bold fs-2"><?= $only['name'] ?></h3>
            <h2 class="text-danger fw-bold pe-2 fs-5"><?= number_format($only['price_new']) ?> VNĐ</h2>
            <div class="d-flex align-items-center">
                <span class="text-body text-decoration-line-through ps-2 fs-5"><?= number_format($only['price_old']) ?>
                    VNĐ</span>
                <?php if($only['status'] == 1): ?>
                <span class="badge bg-success rounded-pill ps-2 ms-3">Còn hàng</span>
                <?php endif; ?>
                <?php if($only['status'] == 0): ?>
                <span class="badge bg-danger rounded-pill ps-2 ms-3">Hết hàng</span>
                <?php endif; ?>
            </div>
            <br>
            <nav aria-label="Page navigation example">
                <ul class="pagination d-flex">
                    <li class="page-item">
                        <a class="page-link text-success" aria-label="Next">
                            <span> - </span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link text-success" href="#">1</a></li>
                    <li class="page-item">
                        <a class="page-link text-success" aria-label="Previous">
                            <i class="fa-solid fa-plus fa-xs"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <span>Số lượng: <?= $only['quantity'] ?></span>
            <br>
            <div>
                <a href="./XacNhanSp.html"><button class="btn btn-success">Mua ngay</button></a>
                <form action="?act=cart" method="POST">
                    <input type="hidden" name="id" value="<?= $only['id'] ?>">
                    <input type="hidden" name="quantity" value="1">
                    <button class="btn btn-success" name="addToCart">Thêm vào giỏ hàng</button>
                </form>
            </div>
            <br>
            <div class="border-top">
                <span class="pt-1">Danh mục: <?= $only['cgr_name'] ?></span>
            </div>
            <br>
        </div>
    </div>
    <h3>Mô tả sản phẩm</h3>
    <hr>
    <p><?= $only['description'] ?></p>
</main>

<?php include "views/component/footer.php"; ?>