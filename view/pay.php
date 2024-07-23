<!-- orderView.php -->
<h2 class="mt-2">Thanh Toán</h2>

<?php if (isset($_SESSION['thongbao'])): ?>
    <div class="alert alert-success" role="alert">
        <?=$_SESSION['thongbao']?>
    </div>
    <?php unset($_SESSION['thongbao']); ?>
<?php endif; ?>

<?php if (!empty($orders)): ?>
    <form action="index.php?mod=order&act=pay" method="POST">
        <table class="table">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Tổng thành tiền</th>
                    <th>Trạng thái</th>
                    <th>Chọn thanh toán</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?=$order['MaHoaDon']?></td>
                        <td><?=number_format($order['ThanhTien'], 0, ".", ",")?> VNĐ</td>
                        <td><?=$order['TrangThai']?></td>
                        <td>
                            <label>
                                <input type="checkbox" name="selectedOrders[]" value="<?=$order['MaHoaDon']?>" />
                                Chọn thanh toán
                            </label>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Thêm các tùy chọn thanh toán ở đây -->
        <div>
            <label for="paymentMethod">Chọn phương thức thanh toán:</label>
            <select id="paymentMethod" name="paymentMethod">
                <option value="CASH">Thanh toán bằng tiền mặt</option>
                <option value="MOMO">Thanh toán qua MoMo</option>
                <option value="VNPAY">Thanh toán qua VNPAY</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Thanh toán</button>
    </form>
<?php else: ?>
    <p>Không có đơn hàng nào.</p>
<?php endif; ?>
