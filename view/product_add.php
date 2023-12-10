<h2>Thêm sản phẩm</h2>
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

    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Tên Sản phẩm :</label>
        <input type="text" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp"
        name="TenSP" id="TenSP">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Hình Ảnh :</label>
        <input type="file" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp"
        name="HinhAnh" id="HinhAnh">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label" >Mô tả :</label>
        <input type="text" class="form-control" id="exampleInputPassword1"
        name="MoTa" id="MoTa">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label" >Số lượng :</label>
        <input type="number" class="form-control" id="exampleInputPassword1" 
        name="SoLuong" id="SoLuong">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label" >Giá :</label>
        <input type="number" class="form-control" id="exampleInputPassword1" 
        name="Gia" id="Gia">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label" >Mã danh mục :</label>
        <select class="form-select" name="MaDM" id="MaDM">
            <option value="1" selected>Giày</option>
            <option value="2">Quần, Áo</option>
            <option value="3">Dụng cụ thể thao</option>
        </select>
    </div>
    <button type="submit" name="submit" value="submit" class="btn btn-primary">ADD</button>
</form>