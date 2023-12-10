<?php
    include_once 'model/pdo.php';
    function user_Login($email, $MatKhau){
        return pdo_query_one("SELECT * FROM taikhoan WHERE Email = ? AND MatKhau = ?",$email, $MatKhau);
    }
    
    function user_Register($HoTen, $Email, $SoDienThoai, $DiaChi, $MatKhau, $Hinh, $Quyen){
        pdo_execute("INSERT INTO taikhoan (`HoTen`,`Email`,`SoDienThoai`,`DiaChi`, `MatKhau`,`Hinh`,`Quyen`) 
        VALUES(?,?,?,?,?,?,?)",$HoTen, $Email, $SoDienThoai, $DiaChi, $MatKhau, $Hinh, $Quyen);
    }
    

    function check_Email($Email){
        return pdo_query_one("SELECT * FROM taikhoan WHERE Email = ?", $Email);
    }
    
    function user_getAll(){
        return pdo_query("SELECT * FROM taikhoan");
    }

    function user_getById($MaTK){
        return pdo_query_one("SELECT * FROM taikhoan WHERE MaTK = ?", $MaTK);
    }
    function user_add($HoTen, $Email ,$SoDienThoai,  $MatKhau, $Hinh, $DiaChi, $Quyen){
        pdo_execute("INSERT INTO taikhoan ( `HoTen`,`Email`,`SoDienThoai`, `MatKhau` ,`Hinh`, `DiaChi` , `Quyen`)
        VALUES (?,?,?,?,?,?,?)", $HoTen, $Email ,$SoDienThoai, $MatKhau, $Hinh, $DiaChi, $Quyen);
    }
    function user_update($MaTK, $HoTen ,$Email,$SoDienThoai, $DiaChi, $Quyen){
        pdo_execute("UPDATE taikhoan SET  HoTen = ?, Email = ?,SoDienThoai = ?, DiaChi = ?, Quyen = ? 
        WHERE MaTK = ?", $HoTen, $Email ,$SoDienThoai,  $DiaChi,$Quyen, $MaTK);
    }

    function delete_user($MaTK){
        pdo_execute("DELETE FROM taikhoan WHERE MaTK = ?", $MaTK);
    }
    
    function user_count(){
        return pdo_query_value("SELECT COUNT(*) FROM taikhoan");
    }
?>