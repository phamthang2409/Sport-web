<h2>Sản phẩm hot</h2>
<div class="row">

<?php foreach ($dsSPHot as $sanpham): ?>
        
        <div class="col-sm-3 mb-3">
            <div class="card">
                <img src="upload/product/<?= $sanpham['HinhAnh'] ?>" class="card-img-top" alt="..." style="height:100%; width:100%; object-fit: cover;" >
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $sanpham['TenSP'] ?>
                    </h5>
                    <p class="card-text">
                        <?=number_format($sanpham['Gia'],0, ".", ",")?>đ
                    </p>
                    <a href="index.php?mod=product&act=detail&id=<?=$sanpham['MaSP']?>"
                    class="btn btn-primary">Xem thêm</a>
                </div>
            </div>
        </div>

<?php endforeach; ?>
</div>



<h2>Sản phẩm của shop</h2>
<div class="row">
<?php foreach ($dsSP as $sanpham): ?>
        
        <div class="col-sm-3 mb-3">
            <div class="card">
                <img src="upload/product/<?= $sanpham['HinhAnh'] ?>" class="card-img-top" alt="..." style="height:100%; width:100%; object-fit: cover;" >
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $sanpham['TenSP'] ?>
                    </h5>
                    <p class="card-text">
                        <?=number_format($sanpham['Gia'],0, ".", ",")?>đ
                    </p>
                    <a href="index.php?mod=product&act=detail&id=<?=$sanpham['MaSP']?>"
                    class="btn btn-primary">Xem thêm</a>
                </div>
            </div>
        </div>

<?php endforeach; ?>
</div>

</div>

