<?php 
    include_once 'model/pdo.php';

    function user_hasCart($MaTK){
        return pdo_query_one("SELECT * FROM hoadon WHERE MaTK = ? AND TrangThai = 'gio-hang'",$MaTK);
    }

    function shoppingcart_add($MaTK){
        pdo_execute("INSERT INTO hoadon (`MaTK` , `NgayMua`, `TrangThai`) VALUES(?,?,?)",
        $MaTK, date('Y-m-d H:i:s'), 'gio-hang');
    }
    function shopping_addToCart($MaHoaDon, $MaSP){
        pdo_execute("INSERT INTO hoadonchitiet(`MaHoaDon`, `MaSP`) VALUES(?,?)", $MaHoaDon, $MaSP);
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
        pdo_execute("UPDATE hoadon set SoLuong = ?, ThanhTien = ?, TrangThai = ?WHERE MaHoaDon = ?",$SoLuong, $ThanhTien, $TrangThai, $MaHoaDon);
    }

    function shopping_getUser($MaTK){
        return pdo_query_one("SELECT * FROM hoadon hd INNER JOIN taikhoan tk on hd.MaTK = tk.MaTK
        WHERE MaTK = ?",$MaTK);
    }
?>