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

            $chiTietSP = product_GetById($_GET['id']);   // dùng hàm này để lấy được sản phẩm theo mã id, để vào trang chi tiết sản phẩm

            include_once 'model/comment.php';
            
            $dsBL = comment_getByProduct($_GET['id']);
            
            include_once 'view/template_header.php';
            include_once 'view/view_detail.php';
            include_once 'view/template_footer.php';
            break;

            case 'search' :
                //đổi từ $_POST sang $_GET để bắt keyword
                if(isset($_POST['keyword'])){
                    header("Location: index.php?mod=product&act=search&keyword=".$_POST['keyword']);
                }

                //Lấy dữ liệu
                include_once 'model/product.php';
                
                
                $page = 1;  //mặc định page luôn ở trang đầu tiên
                if(isset($_GET['page'])){
                    $page = $_GET['page'];   //kiểm tra số $page có được chuyển lên URL không. Nếu có thì $page sẽ được cập nhập thành giá trị truyền qua từ URL . Ví dụ: index.php?mod=product&act=search&page=1;
                }
                
                $kqSearch = product_search($_GET['keyword'], $page);  //gọi hàm tìm kiếm theo sản phẩm và số trang rồi gán vào $kqSearch
                $sotrang = ceil(product_searchTotal($_GET['keyword'])/4); //gọi hàm product_searchTotal để lấy tổng số lượng sản phẩm tìm kiếm dựa trên từ khóa
                                                                            //kết quả hiện lên mỗi số trang (1 trang được hiện 4 sản phẩm) và sau đó làm tròn bằng hàm 'ceil';


                include_once 'view/template_header.php';
                include_once 'view/view_product_search.php';
                include_once 'view/template_footer.php';

                break;
    
            case 'addToCart' :
                include_once 'model/shoppingcart.php';
            
                if (!isset($_SESSION['user'])) {
                    $_SESSION['loi'] = 'Bạn cần đăng nhập để có thể mua hàng';
                    header('Location: index.php?mod=user&act=login');
                    return;
                }
            
                $MaSP = $_POST['MaSP'];  // Lấy MaSP từ form
                $SoLuongSP = $_POST['SoLuong'];  // Lấy số lượng từ form
                $MaTK = $_SESSION['user']['MaTK'];
                $kq = user_hasCart($MaTK);

            
                try {
                    if ($kq) {
                        // Đúng, đã có giỏ hàng, thêm sản phẩm
                        shopping_addToCart($kq['MaHoaDon'], $MaSP, $SoLuongSP);
                    } else {
                        // Sai, chưa có giỏ hàng, thêm giỏ hàng và sau đó thêm sản phẩm
                        shoppingcart_add($MaTK);
                        $kq = user_hasCart($MaTK);
                        shopping_addToCart($kq['MaHoaDon'], $MaSP, $SoLuongSP);
                    }
                    $_SESSION['thongbao'] = 'Đã thêm sản phẩm vào giỏ hàng';
                } catch (\Throwable $th) {
                    $_SESSION['loi'] = "Sản phẩm này đã có trong giỏ hàng";
                    unset($_SESSION['thongbao']);
                }
            
                header('Location: index.php?mod=product&act=detail&id=' . $MaSP);
                break;

            case 'removeFromCart' :

                include_once 'model/shoppingcart.php';

                $MaTK = $_SESSION['user']['MaTK'];
                $MaSP = $_GET['id'];
                $kq = user_hasCart($MaTK);

                if( $kq ){
                    shopping_removeFromCart($kq['MaHoaDon'], $MaSP);
                }
                header('Location: index.php?mod=page&act=cart');
                break;

            case 'removeCart' :

                include_once 'model/shoppingcart.php';

                $MaTK = $_SESSION['user']['MaTK'];
                $kq = user_hasCart($MaTK);
                if($kq){
                    shopping_removeCart($kq['MaHoaDon']);
                }
                header('Location: index.php?mod=page&act=cart');
                break;
            
            case 'updateCart' :

                include_once 'model/shoppingcart.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $kq = user_hasCart($MaTK);

                if($kq){

                    $SoLuong = $_POST['SoLuong'] + 9 ;
                    var_dump($SoLuong);
                    $ThanhTien = $_POST['ThanhTien'];
                    $TrangThai = 'chuan-bi';

                    include_once 'model/product.php';
                    $ctGioHang = shopping_getCart($MaTK);

                    foreach ($ctGioHang as $sanpham) {
                        product_decreaseAmout($sanpham['MaSP']);
                    }

                    shopping_updateCart($kq['MaHoaDon'], $SoLuong, $ThanhTien, $TrangThai);
                    $_SESSION['thongbao'] = "Đã tiếp nhận đơn hàng của bạn";
                }
                header('Location: index.php?mod=page&act=cart');
                break;
            
            case 'comment' :
                include_once 'model/comment.php';
                comment_add($_SESSION['user']['MaTK'], $_POST['MaSP'], $_POST['NoiDung']);
                header('Location: index.php?mod=product&act=detail&id='.$_POST['MaSP']);
                break;
        default:
            # code...
            break;
    }
}
?>