<!-- Trong view, chẳng hạn 'paidOrdersView.php' -->
<h2 class="mt-2">Các dơn hàng bạn đã thanh toán</h2>

<?php if (!empty($orderDetails)): ?>
    <table class="table">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <!-- Thêm các thông tin sản phẩm bạn muốn hiển thị -->
                <th>Ảnh sản phẩm</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderDetails as $order): ?>
                <tr>
                    <td><?=$order['MaHoaDon']?></td>
                    <td><?=number_format($order['Gia'], 0, ".", ",")?> VNĐ</td>
                    <td><?=$order['TrangThai']?></td>
                    <!-- Thêm các trường thông tin sản phẩm -->
                    <td><img src="upload/product/<?=$order['HinhAnh']?>" alt="Product Image" style="width: 50px;"></td>
                    <td><?=$order['SoLuongSP']?></td>
                    <td><?=number_format($order['ThanhTien'], 0, ".", ",")?> VNĐ</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Không có đơn hàng nào đã thanh toán.</p>
<?php endif; ?>
