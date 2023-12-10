<h2 class="my-3">Thêm tài khoản</h2>
<?php if (isset($_SESSION['thongbao'])): ?>
            <div class="alert alert-success" role="alexrt">
                <?=$_SESSION['thongbao']?>
            </div>
        <?php endif; unset($_SESSION['thongbao']) ?>

        <?php if (isset($_SESSION['loi'])): ?>
            <div class="alert alert-danger" role="alexrt">
                <?=$_SESSION['loi']?>
            </div>
<?php endif; unset($_SESSION['loi']) ?>

<form action="" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Họ và tên :</label>
        <input type="text" class="form-control" name="HoTen" id="HoTen" >
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Email :</label>
        <input type="email" class="form-control" name="Email" id="Email" >
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Số điện thoại :</label>
        <input type="number" class="form-control" name="SoDienThoai" id="SoDienThoai" >
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label" >Địa chỉ :</label>
        <input type="text" class="form-control" name="DiaChi" id="DiaChi">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label" >Quyền</label>
        <select class="form-select" name="Quyen" id="Quyen">
            <option value="0" selected>Khách hàng</option>
            <option value="1">Quản lý trang web</option>
        </select>
    </div>

    <button type="submit" name="submit" value="submit" class="btn btn-primary">Xác nhận</button>
</form>


