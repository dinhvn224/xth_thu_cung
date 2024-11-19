<div class="shadow bg-light pb-5 mt-4 ms-4 col-md-8">
    <form method="post" action="?act=edit-pro" enctype="multipart/form-data" class="pb-5 mt-4 ms-4 me-4">
        <div>
            <h4 class="">Cập nhật sản phẩm</h4>
        </div>
        <hr />
        <div class="row">
            <input type="hidden" name="id" value="<?= $only['id'] ?>">
            <div class="">
                <label for="inputEmail4" class="form-label">Ảnh sản phẩm</label>
                <img class="w-25" src="<?= BASE_URL_IMG . $only['image_src']; ?>" alt="">
                <br><br>
                <input type="file" class="form-control rounded-0" id="inputEmail4" name="image_src" />
            </div>
            <div class="">
                <label for="inputEmail4" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập tên sản phẩm"
                    name="name" value="<?= $only['name'] ?>" />
            </div>
            <div class="">
                <label for="inputPassword4" class="form-label">Mô tả</label>
                <textarea id="" cols="30" rows="3" class="form-control" placeholder="Mô tả"
                    name="description"><?= $only['description'] ?></textarea>
            </div>
            <div class="">
                <label for="inputEmail4" class="form-label">Số lượng</label>
                <input type="text" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập số lượng"
                    name="quantity" value="<?= $only['quantity'] ?>" />
            </div>
            <div class="">
                <label for="inputEmail4" class="form-label">Giá cũ</label>
                <input type="text" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập giá bán"
                    name="price_old" value="<?= $only['price_old'] ?>" />
            </div>
            <div class="">
                <label for="inputEmail4" class="form-label">Giá mới</label>
                <input type="text" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập giá bán"
                    name="price_new" value="<?= $only['price_new'] ?>" />
            </div>
            <div class="mt-3">
                <span class="form-label">Danh mục sản phẩm:</span>
                <select class="form-control" name="category_id">
                    <?php foreach ($listCgr as $cgr): ?>
                    <option value="<?= $cgr->id ?>" <?php if($only['category_id'] == $cgr->id): ?> select
                        <?php endif; ?>>
                        <?= $cgr->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mt-3">
                <span class="form-label">Trạng thái</span>
                <div class="row ps-3 pt-2">
                    <div class="form-check col-2">
                        <input class="form-check-input" type="radio" name="status" value="1" id="1"
                            <?php if (isset($only['status']) && $only['status'] == 1): ?> checked <?php endif; ?> />
                        <label class="form-check-label" for="1">Còn hàng</label>
                    </div>
                    <div class="form-check col-5">
                        <input class="form-check-input" type="radio" name="status" value="0" id="0"
                            <?php if (isset($only['status']) && $only['status'] == 0): ?> checked <?php endif; ?> />
                        <label class="form-check-label" for="2">Hết hàng</label>
                    </div>
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-warning">Sửa</button>
            </div>
        </div>
    </form>
</div>