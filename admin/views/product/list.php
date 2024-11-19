<div class="shadow bg-light pb-5 mt-4 ms-4 col-md-8">
    <h4 class="p-3">Danh sách sản phẩm</h4>
    <hr>
    <div class="d-flex justify-content-between align-items-center">
        <form action="" class="ms-4">
            <div class="input-group input-group-sm">
                <input class="form-control rounded-0 mb-2" type="search" id="search" name="search"
                    placeholder="Nhập từ khóa tìm kiếm" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm">
                <div class="input-group-sm">
                    <button type="button" class="btn btn-secondary rounded-0">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <div class="me-4">
            <a href="?act=add-pro" class="text-light">
                <button class="btn btn-success">
                    <i class="fa-solid fa-plus"></i> Thêm
                </button>
            </a>
            <button class="btn btn-danger">
                <i class="fa-solid fa-trash"></i>
                <a href="" class="text-light">Xóa</a>
            </button>
        </div>
    </div>


    <div class="pt-4 ms-4 me-4">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th scope="col">#</th>
                    <th scope="col">Ảnh sản phẩm</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá cũ</th>
                    <th scope="col">Giá mới</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listPro as $pro): ?>
                <tr>
                    <td>
                        <input type="checkbox">
                    </td>
                    <td scope="row"><?= $pro->id ?></td>
                    <td><img src="<?= BASE_URL_IMG . $pro->image_src ?>" class="w-100" alt=""></td>
                    <td>
                        <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 150px;">
                            <?= $pro->name ?>
                        </div>
                    </td>
                    <td><?= $pro->quantity ?></td>
                    <td><?= $pro->price_old ?></td>
                    <td><?= $pro->price_new ?></td>
                    <td>
                        <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 100px;">
                            <?= $pro->category_id ?>
                        </div>
                    </td>
                    <td>
                        <?php if($pro->status == 1): ?>
                        <span class="badge bg-success">Còn hàng</span>
                        <?php endif; ?>
                        <?php if($pro->status == 0): ?>
                        <span class="badge bg-danger">Hết hàng</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="?act=edit-pro&id=<?= $pro->id ?>" class="text-white">
                            <button class="btn btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i> Sửa
                            </button>
                        </a>
                        <br>
                        <br>
                        <a href="?act=del-pro&id=<?= $pro->id ?>"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')" class="text-white">
                            <button class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i> Xóa
                            </button>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>