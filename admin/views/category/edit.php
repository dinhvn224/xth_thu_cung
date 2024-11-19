<div class="shadow bg-light pb-5 mt-4 ms-4 col-md-8">
    <form method="post" action="index.php?act=edit-cgr" enctype="multipart/form-data" class="pb-5 mt-4 ms-4 me-4">
        <div>
            <h4 class="">Sửa danh mục</h4>
            <?php if (isset($_SESSION['success']) && isset($_GET['msg'])): ?>
            <span style="color: green"><?= $_SESSION['success'] ?></span>
            <?php endif; ?>
        </div>

        <hr />
        <div class="row">
            <input type="hidden" name="id" value="<?= $only['id'] ?>">
            <div class="">
                <label for="inputEmail4" class="form-label">Ảnh danh mục</label>
                <img class="w-25" src="<?= BASE_URL_IMG . $only['image_src']; ?>" alt="">
                <br><br>
                <input type="file" class="form-control rounded-0" id="inputEmail4" name="image_src" />
            </div>
            <div class="">
                <label for="inputEmail4" class="form-label">Tên danh mục</label>
                <input type="text" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập tên danh mục"
                    name="name" value="<?= $only['name'] ?>" />
            </div>

            <div class="mt-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Sửa</button>
            </div>
        </div>
    </form>
</div>