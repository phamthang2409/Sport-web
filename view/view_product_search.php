<h2>Kết quả tìm kiếm với từ khóa "<?=$_GET['keyword']?>":</h2>
<div class="row">

<?php foreach ($kqSearch as $sanpham): ?>
        <div class="col-sm-3 mb-3" >
            <div class="card">
                <img src="upload/product/<?= $sanpham['HinhAnh'] ?>" class="card-img-top" alt="..." style="height: 250px;" >
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

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item <?=($page<=1)?'disabled' :''?>">
      <a class="page-link" href="index.php?mod=product&act=search&keyword=<?=$_GET['keyword']?>&page=<?=$page-1?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    
    <?php for($i=1; $i<=$sotrang; $i++) : ?>
    <li class="page-item <?=($page==$i)?'active' :''?>">
        <a class="page-link" href="index.php?mod=product&act=search&keyword=<?=$_GET['keyword']?>&page=<?=$i?>">
        <?=$i?></a>
    </li>
    
    <?php endfor; ?>
    
    <li class="page-item <?=($page>=$sotrang)?'disabled' :''?>">
      <a class="page-link" href="index.php?mod=product&act=search&keyword=<?=$_GET['keyword']?>&page=<?=$page+1?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>