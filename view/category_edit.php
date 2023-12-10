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
        <label for="exampleInputEmail1" class="form-label" >Tên Danh Mục :</label>
        <input type="text" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp"
        name="TenDM" id="TenDM" value="<?= $vlDM['TenDanhMuc'] ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Mô tả danh mục:</label>
        <input type="text" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp"
        name="MoTaDM" id="MoTaDM" value="<?= $vlDM['MoTaDanhMuc'] ?>">
    </div>
    <button type="submit" name="submit" value="submit" class="btn btn-primary">Update</button>
</form>