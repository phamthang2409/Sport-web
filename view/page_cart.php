<h2 class="mt-2">Giỏ hàng</h2>

<?php if (isset($_SESSION['thongbao'])): ?>
    <div class="alert alert-success" role="alexrt">
        <?=$_SESSION['thongbao']?>
    </div>
<?php endif; unset($_SESSION['thongbao']) ?>

<form action="index.php?mod=product&act=updateCart" method="POST">
    <input type="hidden" name="SoLuong" id="SoLuong">
    <input type="hidden" name="ThanhTien" id="ThanhTien">
<table class="table">
    <thead>
        <tr>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th class="text-end">Giá</th>
            <th class="text-end">Thành tiền</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php $i; foreach($ctGioHang as $item): ?>
        <tr>
            <td>
                <img src="upload/product/<?=$item['HinhAnh']?>" alt="" style="width:100px">
            </td>
            <td class="text-start"><?=$item['TenSP']?></td>
            <td>
                1
            </td>
            <td class="text-end"><?=number_format($item['Gia'],0, ".", ",")?>VNĐ</td>
            <td class="text-end"></td>
            <td>
                <a href="index.php?mod=product&act=removeFromCart&id=<?=$item['MaSP']?>" class="btn btn-outline-danger">Xóa</a>
            </td>
        </tr>
        <?php endforeach ; ?>
    </tbody>
    <tfoot>
        <tr>
            <th class="text-end" colspan="4">TỔNG THÀNH TIỀN</th>
            <th class="text-end"></th>
            <th>
                <a href="index.php?mod=product&act=removeCart" class="btn btn-outline-danger">Xóa hết</a>
            </th>
        </tr>
    </tfoot>
</table>

<!-- <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
  <input type="radio" class="btn-check" name="HinhThucThanhToan" id="HinhThucThanhToan" autocomplete="off" checked>
  <label class="btn btn-outline-primary" for="btnradio1">Thanh toán bằng tiền mặt</label>

  <input type="radio" class="btn-check" name="HinhThucThanhToan" id="HinhThucThanhToan" autocomplete="off">
  <label class="btn btn-outline-primary" for="btnradio2">MOMO</label>

  <input type="radio" class="btn-check" name="HinhThucThanhToan" id="HinhThucThanhToan" autocomplete="off">
  <label class="btn btn-outline-primary" for="btnradio3">VNPAY</label>
</div>
-->

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Thanh Toán
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tiến hành thanh toán</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bạn có chắc là mình mua số hàng ở trên không ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
        <button type="submit" class="btn btn-primary">Thanh toán</button>
      </div>
    </div>
  </div>
</div>
</form>
</div>
<script>
    function formatCurrency(number) {
        return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(number);
    }
    function tinhThanhTien() {
        var dsSP = document.querySelectorAll('table tbody tr');
        var soLuong = 1;
        var thanhTien = 0;
        for (const sanpham of dsSP) {
            var gia = Number(sanpham.querySelector('td:nth-child(4)').innerText.replace('VNĐ', '').replace(',', ''));
            var tien = gia * soLuong;
            sanpham.querySelector('td:nth-child(5)').innerText = formatCurrency(tien);

            thanhTien = thanhTien + tien;
        }
        document.querySelector('tfoot th:nth-child(2)').innerText = formatCurrency(thanhTien);
        document.querySelector('#SoLuong').value = dsSP.length;
        document.querySelector('#ThanhTien').value = thanhTien;
    }
    tinhThanhTien();
</script>
