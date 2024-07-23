<?php
    session_start();
    include_once 'model/pdo.php';

    include_once 'model/category.php';
    
    $dsCategory = get_AllCategory();
// Kiểm tra xem $_SESSION['user'] có tồn tại và có dữ liệu không
if (isset($_SESSION['user']) && isset($_SESSION['user']['MaTK'])) {

    $MaTK = $_SESSION['user']['MaTK'];
    include_once 'model/order.php';
    $userHasOrder = user_hasOrder($MaTK);

}

    
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

            case 'order' : //đơn hàng, thanh toán
                include_once 'controller/order.php';
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


