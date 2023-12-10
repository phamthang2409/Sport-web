<h5></h5>
<div class="row">
    <div class="col-md-6">
        <img src="upload/product/<?=$chiTietSP['HinhAnh']?>" class="w-100" alt="">
    </div>
    <div class="col-md-5">
        <h3><?=$chiTietSP['TenSP']?></h3>
        <div class="row">
            <!-- <div class="col-md-6">Tác giả: <strong>Trịnh Công Sơn</strong></div> -->
            <div class="col-md-6"> Danh mục: <strong><?=$chiTietSP['TenDanhMuc']?></strong></div>
        </div>
        <div class="text-danger fs-2">Giá: <?=number_format($chiTietSP['Gia'],0, ".", ",")?>đ</div>
        <div>
            <h5>Size giày:</h5>
            <button type="button" class="btn btn-secondary">38</button>
            <button type="button" class="btn btn-secondary">39</button>
            <button type="button" class="btn btn-secondary">40</button>
            <button type="button" class="btn btn-secondary">41</button>
            <button type="button" class="btn btn-secondary">42</button>
        </div>
        <small>Còn:<strong> <?=$chiTietSP['SoLuong']?> </strong> Sản phẩm trong kho hàng</small>
        <br>
        <a href="index.php?mod=product&act=addToCart&id=<?=$chiTietSP['MaSP']?>" class="btn btn-primary">Thêm vào giỏ hàng</a>


        <?php if (isset($_SESSION['thongbao'])): ?>
            <div class="alert alert-success mt-2" role="alexrt">
                <?=$_SESSION['thongbao']?>
            </div>
        <?php endif; unset($_SESSION['thongbao']) ?>

        
        
        <?php if (isset($_SESSION['loi'])): ?>
            <div class="alert alert-danger mt-2" role="alexrt">
                <?=$_SESSION['loi']?>
            </div>
        <?php endif; unset($_SESSION['loi']) ?>

        <hr>

        <p class="my-3 "><?=$chiTietSP['MoTa']?></p>

    </div>
</div>

<h2>Có thể bạn thích sản phẩm này</h2>
<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="card mb-3 ">
            <img src="upload/product/giay1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Giày </h5>
                <p class="card-text">800.000đ</p>
                <a href="#" class="btn btn-primary">Xem thêm</a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="card mb-3 ">
            <img src="upload/product/giay1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Giày </h5>
                <p class="card-text">800.000đ</p>
                <a href="#" class="btn btn-primary">Xem thêm</a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="card mb-3 ">
            <img src="upload/product/giay1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Giày </h5>
                <p class="card-text">800.000đ</p>
                <a href="#" class="btn btn-primary">Xem thêm</a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="card mb-3 ">
            <img src="upload/product/giay1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Giày </h5>
                <p class="card-text">800.000đ</p>
                <a href="#" class="btn btn-primary">Xem thêm</a>
            </div>
        </div>
    </div>
</div>


<h2>Bình luận của khách hàng</h2>
<?php if(isset($_SESSION['user'])) :?>

<form action="index.php?mod=product&act=comment" method="post">
    <input type="text" name="NoiDung" class="form-control form-control-lg"
    placeholder="Bạn nghĩ gì về sản phẩm này">
    <input type="hidden" name="MaSP" value="<?=$chiTietSP['MaSP']?>">
    <button type="submit" class="btn btn-primary btn-lg mt-2">Gửi bình luận</button>
</form>

<?php endif ; ?>

<?php foreach ($dsBL as $comment) :?>
<div class="row my-3 border rounded-3">
    <div class="col-sm-3">
        <strong><?=$comment['HoTen']?></strong> <br>
        <?=$comment['NgayGui']?><br>
        <i>Đã mua hàng</i>
    </div>
    <div class="col-sm-9">
        <?=$comment['NoiDung']?>.
    </div>
</div>
<?php endforeach; ?>
<!-- </div> thêm div mỗi trang ở cuối  -->
</div>