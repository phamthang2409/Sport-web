
<h2><?=$chiTietDM['TenDanhMuc']?></h2>

<div class="row">

    <?php foreach ($dsCungDanhMuc as $sanpham): ?>
        <div class="col-sm-3 mb-3" >
            <div class="card">
                <img src="upload/product/<?= $sanpham['HinhAnh'] ?>" class="card-img-top" alt="..."  >
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $sanpham['TenSP'] ?>
                    </h5>
                    <p class="card-text">
                        <?= $sanpham['Gia'] ?>
                    </p>
                    <a href="index.php?mod=product&act=detail&id=<?=$sanpham['MaSP']?>"
                    class="btn btn-primary">Xem thêm</a>
                </div>
            </div>

        </div>

<?php endforeach; ?>
</div>

</div>