<h2 class="my-3">Quản lý    </h2>

<table class="table text-center align-middle">
    <thead>
        <tr>
            <th>Mã Hóa Đơn</th>
            <th>Mã Tài Khoản</th>
            <!-- <th>Ảnh</th> -->
            <th class="text-start">Số Lượng</th>
            <th class="text-start">Thành Tiền</th>
            <th>Ngày Mua</th>
            <th>Trạng Thái</th>
            <th class="text-end">Trạng Thái Thanh Toán</th>
            <th class="text-end">Phương Thức Thanh Toán</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($adminOrder as $order): ?>
            <tr>
                <td>
                    <?= $order['MaHoaDon'] ?>
                </td>
                <td>
                    <?= $order['MaTK'] ?>
                </td>
                <td>
                <?= $order['SoLuong'] ?>
                </td>
                <td class="text-end">
                    <?=number_format($order['ThanhTien'],0, ".", ",")?>VNĐ
                </td>
                <td class="text-start">
                    <?=$order['NgayMua']?>
                </td>
                <td>
                    <?= $order['TrangThai'] ?>
                </td>
                <td>
                    <?= $order['TrangThaiThanhToan'] ?>
                </td>
                <td class="text-end">
                    <?= $order['PhuongThucThanhToan'] ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
