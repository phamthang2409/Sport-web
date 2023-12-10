<?php
//Quan ly view va model lien quan: trang chu, lien he, gioi thieu
// Goi duoc: view (giao dien html, css, js)
// mode (csdl)
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'detail':
            include_once 'model/connect.php';
            include_once 'model/product.php';
            include_once 'model/category.php';

            $chiTietSP = product_GetById($_GET['id']);

            include_once 'model/user.php';

            include_once 'model/shoppingcart.php';
            
            // $tkShopping = shopping_getUser();

            include_once 'view/template_header.php';
            include_once 'view/view_detail.php';
            include_once 'view/template_footer.php';
            break;


        default:
            # code...
            break;
    }
}
?>