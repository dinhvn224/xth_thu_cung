<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/be9ed8669f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header class="bg-light pb-2 pt-2">
        <div class="container">
            <!-- Header top -->
            <div class="d-flex justify-content-between align-items-center pb-2">
                <!-- Left -->
                <div class="d-flex justify-content-between align-items-center">
                    <div class="pe-3">
                        <i class="fa-solid fa-phone"></i> +84386596511
                    </div>
                    <div>
                        <i class="fa-solid fa-envelope"></i> khangtdph44354@fpt.edu.vn
                    </div>
                </div>
                <div class="d-flex justify-content-end align-items-center">
                    <i class="fa-solid fa-user me-2"></i>
                    <?php if (isset($_SESSION["user_name"])) {?>
                    Xin chào <?= $_SESSION["user_name"] ?> .
                    <a class="nav-link text-danger" href="?act=logout">-. Logout</a>
                    <?php } else {?>
                    <a class="nav-link" href="?act=login">Login</a>
                    <?php } ?>
                </div>
            </div>
            <!-- End header top -->
            <!-- Header bottom -->
            <div class="d-flex justify-content-between align-items-center bg-white rounded-pill mb-2">
                <div class="d-flex align-items-center justify-content-center p-2 ms-2">
                    <img src="../img/logo.png" class="pe-2" alt="">
                    <h3>PET SHOP </h3>
                </div>
                <!-- MENU -->
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav">
                            <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                            <?php foreach ($listCgr as $cgr): ?>
                            <a class="nav-link" href="#"><?= $cgr->name ?></a>
                            <?php endforeach ?>

                            <a class="nav-link" href="#">Liên hệ</a>
                        </div>
                    </div>
                </nav>
                <!-- END MENU -->
                <div class="d-flex justify-content-between align-items-center pe-2">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2 rounded-pill" type="search" placeholder="Search"
                            aria-label="Search">
                    </form>
                    <i class="fa-regular fa-heart me-2"></i>
                    <a href="?act=cart" class="text-dark"><i class="fa-solid fa-cart-shopping me-2"></i></a>
                </div>
            </div>
            <!-- End header bottom -->
        </div>
    </header>