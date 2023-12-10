<?php
    session_start();
    include_once 'model/pdo.php';

    include_once 'model/category.php';
    
    $dsCategory = get_AllCategory();
    
    //dieu huong den cac controller
    if(isset($_GET['mod'])){
        switch ($_GET['mod']) {
            case 'page': //trang chủ
                include_once 'controller/page.php';
                break;

            case 'user': //dang nhap, dang ky, logout
                include_once 'controller/user.php';
                break;

            case 'product' : //nhung cai gi lien quan den san pham
                include_once 'controller/product.php';
                break;

            case 'category' : //danh muc
                include_once 'controller/category.php';
                break;  

            case 'admin' : //quan ly cac san pham, user, ....
                include_once 'controller/admin.php';
                break;

            default:
                
                break;
        }
    }else{
        header("Location:index.php?mod=page&act=home");
    }
?>


