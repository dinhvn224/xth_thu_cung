<?php include "views/component/header.php" ?>

<main class="container">
    <!-- Main content -->
    <div class="container d-flex justify-content-center">
        <div style="width: 50%; background-color: #FBA81F; margin:20px 0;" class="rounded-3">
            <form class="pb-2 bg-opacity-50 " method="POST">
                <H3 class="text-center pt-3 text-light">Đăng nhập</H3>
                <div class="mb-3 pe-3 pt-3 ps-3">
                    <input type="text" class="form-control" placeholder="Email" name="email" required>
                </div>
                <div class="mb-3 pe-3 pt-3 ps-3">
                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password" required>
                </div>
                <div class="pe-3 pt-3 ps-3 d-flex justify-content-center">
                    <button type="submit" name="submitLogin" class="btn"
                        style="background-color: #F87537; color:#ffffff">
                        Đăng nhập
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- End main content -->
</main>

<?php include "views/component/footer.php" ?>