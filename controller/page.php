<?php
//Quan ly view va model lien quan: trang chu, lien he, gioi thieu
// Goi duoc: view (giao dien html, css, js)
// mode (csdl)
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'home':

            include_once 'model/product.php';

            $dsSP = get_Product();

            include_once 'view/template_header.php';
            include_once 'view/view_home.php';
            include_once 'view/template_footer.php';
            
            break;
            
            
        case 'cart':
            include_once 'model/shoppingcart.php';
            $MaTK = $_SESSION['user']['MaTK'];
            $GioHang = user_hasCart($MaTK);

            if ($GioHang) { //nếu đúng thì giỏ hàng có và hiển thị sản phẩm trong giỏ hàng
                $ctGioHang = shopping_getCart($MaTK);
            } else {
                $ctGioHang = [];
            }

            include_once 'view/template_header_cart.php';
            include_once 'view/page_cart.php';
            include_once 'view/template_footer.php';

        default:
            # code...
            break;
    }
}
?>