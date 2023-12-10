<h2 class="mt-2">Thêm danh mục</h2>
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
        <input type="hidden" name="id" >
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Tên Danh Mục :</label>
        <input type="text" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp"
        name="TenDM" id="TenDM">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Mô tả danh mục:</label>
        <input type="text" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp"
        name="MoTaDM" id="MoTaDM">
    </div>
    <button type="submit" name="submit" value="submit" class="btn btn-primary">ADD</button>
</form>