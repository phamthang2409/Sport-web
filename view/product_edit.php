<h2>Sửa sản phẩm</h2>
<?php if (isset($_SESSION['thongbao'])): ?>
    <div class="alert alert-success" role="alexrt">
        <?= $_SESSION['thongbao'] ?>
    </div>
<?php endif;
unset($_SESSION['thongbao']) ?>

<?php if (isset($_SESSION['loi'])): ?>
    <div class="alert alert-danger" role="alexrt">
        <?= $_SESSION['loi'] ?>
    </div>
<?php endif;
unset($_SESSION['loi']) ?>

<form action="" method="POST">
    <div class="mb-3">
        <input type="hidden" name="id" value="<?= $vlSP['MaSP'] ?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Tên Sản phẩm :</label>
        <input type="text" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp"
        name="TenSP" id="TenSP" value="<?= $vlSP['TenSP'] ?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Hình Ảnh :</label>
        <input type="file" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp"
        name="HinhAnh" id="HinhAnh" value="<?= $vlSP['HinhAnh'] ?>">
    </div>
    
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label" >Mô tả :</label>
        <input type="text" class="form-control" id="exampleInputPassword1"
        name="MoTa" id="MoTa" value="<?= $vlSP['MoTa'] ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label" >Số lượng :</label>
        <input type="number" class="form-control" id="exampleInputPassword1" 
        name="SoLuong" id="SoLuong" value="<?= $vlSP['SoLuong'] ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label" >Giá :</label>
        <input type="number" class="form-control" id="exampleInputPassword1" 
        name="Gia" id="Gia" value="<?= $vlSP['Gia'] ?>">
    </div>
    <button type="submit" name="submit" value="submit" class="btn btn-primary">Update</button>
</form>