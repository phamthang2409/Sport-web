<?php 
    include_once 'model/pdo.php';

    function user_hasCart($MaTK){
        return pdo_query_one("SELECT * FROM hoadon WHERE MaTK = ? AND TrangThai = 'gio-hang'",$MaTK);
    }

    function shoppingcart_add($MaTK){
        pdo_execute("INSERT INTO hoadon (`MaTK` , `NgayMua`, `TrangThai`) VALUES(?,?,?)",
        $MaTK, date('Y-m-d H:i:s'), 'gio-hang');
    }
    function shopping_addToCart($MaHoaDon, $MaSP, $SoLuongSP){
        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $existingItem = pdo_query_one("SELECT * FROM hoadonchitiet WHERE MaHoaDon = ? AND MaSP = ?", $MaHoaDon, $MaSP);
    
        if ($existingItem) {
            // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
            pdo_execute("UPDATE hoadonchitiet SET SoLuongSP = SoLuongSP + ? WHERE MaHoaDon = ? AND MaSP = ?", $SoLuongSP, $MaHoaDon, $MaSP);
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
            pdo_execute("INSERT INTO hoadonchitiet(MaHoaDon, MaSP, SoLuongSP) VALUES(?,?,?)", $MaHoaDon, $MaSP, $SoLuongSP);
        }
    }
    
    function shopping_getCart($MaTK){
        return pdo_query("SELECT * FROM hoadon hd INNER JOIN hoadonchitiet cthd ON hd.MaHoaDon = cthd.MaHoaDon
        INNER JOIN sanpham sp ON cthd.MaSP = sp.MaSP WHERE MaTK = ? AND hd.TrangThai = ?", $MaTK, 'gio-hang');
    }

    function shopping_removeFromCart($MaHoaDon, $MaSP){
        pdo_execute("DELETE FROM hoadonchitiet WHERE MaHoaDon = ? AND MaSP = ?",$MaHoaDon, $MaSP);
    }
    function shopping_removeCart($MaHoaDon){
        pdo_execute("DELETE FROM hoadonchitiet WHERE MaHoaDon = ?", $MaHoaDon);
    }
    
    function shopping_updateCart($MaHoaDon, $SoLuong, $ThanhTien, $TrangThai){
    pdo_execute("UPDATE hoadon SET SoLuong = SoLuong + ?, ThanhTien = ?, TrangThai = ? WHERE MaHoaDon = ?", $SoLuong, $ThanhTien, $TrangThai, $MaHoaDon);
}


            

?>