<?php
    include_once 'model/pdo.php';

    function get_Product(){
        return pdo_query("SELECT * FROM sanpham");
    }
    
    function get_ProductHot(){
        return pdo_query("SELECT * FROM sanpham WHERE hot = 1");
    }


    function product_GetById($id){ //lay san pham theo ma sp (id)
        return pdo_query_one("SELECT * FROM sanpham sp INNER JOIN danhmuc dm ON sp.MaDM = dm.MaDM 
        WHERE sp.MaSP = $id"); //vi du lay thong tin thang so 3
    }

    function products_GetByCategory($id){
        return pdo_query("SELECT * FROM sanpham WHERE MaDM = $id"); //lay toan bo thong tin cua nhung san pham co madm = 1;
    }
    
    function product_decreaseAmout($MaSP){
        pdo_execute("UPDATE sanpham SET SoLuong = SoLuong - 10 WHERE MaSP = ?",$MaSP);
    }
    function product_increaseAmout($MaSP){
        pdo_execute("UPDATE sanpham SET SoLuong = SoLuong + 1 WHERE MaSP = ?",$MaSP);
    }
    function product_count(){
        return pdo_query_value("SELECT COUNT(*) soluong FROM sanpham");
    }
    
    function product_search($keyword, $page=1){
        $batdau = ($page-1)*4;

        //1 Trang chỉ hiện thị 8 sản phẩm
        //Trang 1 bắt đầu từ 0 -> 7
        //Trang 2 bắt đầu từ 8
        //Trang 3 bắt đầu từ 16
        //Trang n bắt đầu từ (n-1)*8
        //Ví dụ trang 1 (1-1) = 0 , 0 * 8 = 0;
        //Trang 2 (2-1) = 1, 1*8 = 8 .....


        //1 Trang chỉ hiện thị 4 sản phẩm
        //Trang 1 bắt đầu từ 0 -> 3
        //Trang 2 bắt đầu từ 4
        //Trang 3 bắt đầu từ 8
        //Trang n bắt đầu từ (n-1)*4
        //Ví dụ trang 1 (1-1) = 0 , 0 * 4 = 0;
        //Trang 2 (2-1) = 1, 1*4 = 4 .....


        return pdo_query("SELECT * FROM sanpham WHERE TenSP LIKE '%$keyword%'
        LIMIT $batdau,4 ");

    }
    
    function product_searchTotal($keyword){
        return pdo_query_value("SELECT COUNT(*) FROM sanpham WHERE TenSP LIKE '%$keyword%'");
        
    } //đếm 8 sản phẩm trong sản phẩm
    
    
    function product_getById2($MaSP) {
        return pdo_query_one("SELECT * FROM sanpham WHERE MaSP = ?", $MaSP);
    }

    function add_product($TenSP, $HinhAnh, $MoTa, $SoLuong, $Gia, $MaDM){
        pdo_execute("INSERT INTO sanpham (`TenSP`, `HinhAnh`, `MoTa`, `SoLuong`, `Gia`,`MaDM`)
        VALUES(?,?,?,?,?,?)",$TenSP, $HinhAnh, $MoTa, $SoLuong, $Gia, $MaDM);
    }

    function update_product($MaSP, $TenSP, $HinhAnh, $MoTa, $SoLuong, $Gia){
        pdo_execute("UPDATE sanpham SET TenSP = ?, HinhAnh = ?, MoTa = ?, SoLuong = ?, Gia = ? 
        WHERE MaSP = ?", $TenSP, $HinhAnh, $MoTa, $SoLuong, $Gia, $MaSP);
    } //sua thong tin cua san pham so 22

    function delete_product($MaSP){
        pdo_execute("DELETE FROM sanpham WHERE MaSP = ?", $MaSP);
    } //xoa san pham so 22

    function product_count2(){
        return pdo_query_value("SELECT COUNT(*) FROM sanpham");
    }

    function cart_count(){
        return pdo_query_value("SELECT COUNT(*) FROM hoadon");
    }
?>  