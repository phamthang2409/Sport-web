<?php
    include_once 'model/pdo.php';

    function get_AllCategory(){
        return pdo_query("SELECT * FROM danhmuc");
    }

    function category_GetById($id){
        return pdo_query_one("SELECT * FROM danhmuc WHERE MaDM = ?", $id); //lay danh muc so 1
    }

    function category_count(){
        return pdo_query_value("SELECT COUNT(*) FROM danhmuc");
    }
    function category_GetById2($MaDM){
        return pdo_query_one("SELECT * FROM danhmuc WHERE MaDM = ?", $MaDM);
    }

    function update_category($MaDM,$TenDM, $MoTaDM){
        pdo_execute("UPDATE danhmuc SET TenDanhMuc = ?, MoTaDanhMuc = ?
        WHERE MaDM = ?",$TenDM, $MoTaDM,$MaDM);
    }

    function add_category($TenDM, $MoTaDM){
        pdo_execute("INSERT INTO danhmuc(`TenDanhMuc`,`MoTaDanhMuc`)
        VALUES(?,?)",$TenDM, $MoTaDM);
    }

    function delete_category($MaDM){
        pdo_execute("DELETE FROM danhmuc WHERE MaDM = ?", $MaDM);
    }
?>