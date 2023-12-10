<?php
//Quan ly view va model lien quan: trang chu, lien he, gioi thieu
// Goi duoc: view (giao dien html, css, js)
// mode (csdl)
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'detail':

            include_once 'model/category.php';
            
            include_once 'model/product.php';

            $chiTietDM = category_GetById($_GET['id']); //dung de lay danh muc theo ma danh muc

            $dsCungDanhMuc = products_GetByCategory($_GET['id']); //dung de lay san pham theo ma danh muc

            include_once 'view/template_header.php';
            include_once 'view/view_category_detail.php';
            include_once 'view/template_footer.php';

            break;


        default:
            # code...
            break;
    }
}
?>