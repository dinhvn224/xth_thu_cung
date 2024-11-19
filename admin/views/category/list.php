<div class="shadow bg-light pb-5 mt-4 ms-4 col-md-8">
    <h4 class="p-3">Danh sách danh mục</h4>
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
            <a href="?act=add-cgr" class="text-light">
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
                    <th scope="col">Ảnh</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Số lượng sản phẩm</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listCgr as $cgr) : ?>
                <tr>
                    <td>
                        <input type="checkbox">
                    </td>
                    <td scope="row"><?= $cgr->id ?></td>
                    <td><img src="..." alt=""></td>
                    <td>
                        <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 100px;">
                            <?= $cgr->name ?>
                        </div>
                    </td>
                    <td>
                        <span class="badge bg-primary"><?= $cgr->status ?></span>
                    </td>
                    <td>
                        <a href="?act=edit-cgr&id=<?= $cgr->id?>" class="text-white">
                            <button class="btn btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i> Sửa
                            </button>
                        </a>
                        <a href="?act=del-cgr&id=<?= $cgr->id?>"
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