<div class="shadow bg-light pb-5 mt-4 ms-4 col-md-8">
    <h4 class="p-3">Danh sách đơn hàng</h4>
    <hr>
    <div class="d-flex justify-content-between align-items-center">
        <form action="" class="ms-4">
            <div class="input-group input-group-sm">
                <input class="form-control rounded-0 mb-2" type="search" id="search" name="search" placeholder="Nhập từ khóa tìm kiếm" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                <div class="input-group-sm">
                    <button type="button" class="btn btn-secondary rounded-0">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <div class="me-4">
            <button class="btn btn-success">
                <i class="fa-solid fa-plus"></i>
                <a href="" class="text-light">Thêm</a>
            </button>
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
                    <th scope="col">Đơn của...</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listBill as $bill) : ?>
                    <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td scope="row"><?= $bill->id ?></td>
                        <td>
                            <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 199px;">
                                <?= $bill->name ?>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-warning">
                                <a href="" class="text-white">
                                    <i class="fa-solid fa-pen-to-square"></i> Sửa
                                </a>
                            </button>
                            <button class="btn btn-danger">
                                <a href="" class="text-white">
                                    <i class="fa-solid fa-trash"></i> Xóa
                                </a>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>