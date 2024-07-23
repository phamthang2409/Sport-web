<h2 class="my-3">Sản phẩm trang web</h2>
<a href="index.php?mod=admin&act=add-product" class="btn btn-success float-end">Thêm sản phẩm</a>
<table class="table text-center align-middle">
    <thead>
        <tr>
            <th>Mã sản phẩm</th>
            <th>Ảnh</th>
            <th class="text-start">Tên Sản phẩm</th>
            <th class="text-start">Giá</th>
            <th>Số lượng</th>
            <th class="text-end">Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($dsSPAdmin as $QLSP): ?>
            <tr>
                <td>
                    <?= $QLSP['MaSP'] ?>
                </td>
                <td>
                    <img src="upload/product/<?= $QLSP['HinhAnh'] ?>" style="width:100px;" class="rounded-circle">
                </td>
                <td class="text-start">
                    <?=$QLSP['TenSP']?>
                </td>
                <td class="text-start">
                    <?=number_format($QLSP['Gia'],0, ".", ",")?>VNĐ
                </td>
                <td>
                    <?= $QLSP['SoLuong'] ?>
                </td>
                <td class="text-end">
                    <a href="index.php?mod=admin&act=update-product&id=<?=$QLSP['MaSP']?>" class="btn btn-warning">Sửa</a>
                    <button onclick="deleteProduct(<?=$QLSP['MaSP']?>)" class="btn btn-danger">Xóa</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    function deleteProduct(MaSP){
        var kq = confirm("Bạn có muốn xóa sản phẩm này không ?");
        if(kq){
            window.location = 'index.php?mod=admin&act=delete-product&id=' + MaSP;
        }
    }
</script>
