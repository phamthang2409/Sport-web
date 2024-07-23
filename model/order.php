<?php
include_once 'model/pdo.php';

function get_Order($MaTK)
{
    return pdo_query("SELECT * FROM hoadon WHERE MaTK = ?", $MaTK);
}

function user_hasOrder($MaTK)
{
    return pdo_query_one("SELECT COUNT(*) FROM hoadon WHERE MaTK = ? AND TrangThaiThanhToan = 'Chưa Thanh Toán'", $MaTK);
}
// orderModel.php
function processPayment($orderID, $paymentMethod)
{
    $MaHoaDon = intval($orderID);
    pdo_execute("UPDATE hoadon SET TrangThaiThanhToan = 'da-thanh-toan', TrangThai = 'cho-giao', PhuongThucThanhToan = ? WHERE MaHoaDon = ?",  $paymentMethod, $orderID);
}

function get_orderDetail($MaTK){
    return pdo_query("SELECT * FROM hoadonchitiet hdct
    INNER JOIN hoadon  hd ON hdct.MaHoaDon = hd.MaHoaDon
    INNER JOIN sanpham sp ON hdct.MaSP = sp.MaSP
    WHERE hd.TrangThaiThanhToan = 'da-thanh-toan' AND hd.MaTK = ?",$MaTK);
}

function get_allOrder(){
    return pdo_query("SELECT * FROM hoadon");
}
?>