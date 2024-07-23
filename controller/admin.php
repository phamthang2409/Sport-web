<?php
//Quan ly view va model lien quan: trang chu, lien he, gioi thieu
// Goi duoc: view (giao dien html, css, js)
// mode (csdl)
if(isset($_GET['act'])) {
    switch($_GET['act']) {
        case 'dashboard':

            include_once 'model/product.php';

            $tkSP = product_count2();   //đếm tất cả sản phẩm

            $tkHoaDon = cart_count();   //đếm hóa đơn

            include_once 'model/user.php';

            $tkUser = user_count(); //đếm tài khoản khách hàng và admin

            include_once 'model/category.php';

            $tkDM = category_count(); //đếm toàn bộ danh mục

            include_once 'view/template_admin_header.php';
            include_once 'view/admin_dashboard.php';
            include_once 'view/template_admin_footer.php';

            $view_name = 'admin_dashboard';
            break;


        case 'admin-user':

            include_once 'model/user.php';

            $dsTK = user_getAll();   //lấy toàn bộ tài khoản có trong bảng taikhoan (database)

            include_once 'view/template_admin_header.php';
            include_once 'view/admin_user.php';
            include_once 'view/template_admin_footer.php';

            $view_name = 'admin_user';
            break;


        case 'add-user': //them tai khoan khach hang

            include_once 'model/user.php';

            if(isset($_POST['submit'])) {

                $HoTen = $_POST['HoTen'];
                $Email = $_POST['Email'];
                $SoDienThoai = $_POST['SoDienThoai'];
                $DiaChi = $_POST['DiaChi'];
                $Quyen = $_POST['Quyen'];

                $kq = check_Email($Email);

                if($kq) { //dung thi email da ton tai khong cho tao tk
                    $_SESSION['loi'] = "Email <strong>'.$Email.'</strong> đã tồn tại.";
                } else { //email chua co, tao tk
                    $MatKhau = 123456789;
                    $Hinh = 'avatar1.jpg';
                    user_add($HoTen, $Email, $SoDienThoai, $MatKhau, $Hinh, $DiaChi, $Quyen);
                    $_SESSION['thongbao'] = 'Đã tạo tài khoản với Email : <strong>'.$Email.'</strong>
                    và mật khẩu mặc định là : <strong>'.$MatKhau.'</strong>';
                }
            }
            include_once 'view/template_admin_header.php';
            include_once 'view/user_add.php';
            include_once 'view/template_admin_footer.php';
            break;

        case 'edit-user': //sua tai khoan khach hang
            include_once 'model/user.php';

            $MaTK = $_GET['id'];

            if(isset($_POST['submit'])) { //kiem tra thong tin co duoc nhap chua

                $HoTen = $_POST['HoTen'];
                $Email = $_POST['Email'];
                $SoDienThoai = $_POST['SoDienThoai'];
                $DiaChi = $_POST['DiaChi'];
                $Quyen = $_POST['Quyen'];

                $kq = check_Email($Email);

                if($kq && $kq['MaTK'] != $MaTK) { //đúng thì email đã tồn tại , không cho tạo email và gửi thông báo
                    $_SESSION['loi'] = "Số điện thoại <strong>'.$Email.'</strong> đã tồn tại.";
                } else { //email chua co, tao tk
                    user_update($MaTK, $HoTen, $Email, $SoDienThoai, $DiaChi, $Quyen);
                    $_SESSION['thongbao'] = 'Thông tin thay đổi đã được lưu lại';
                }
            }

            $tk = user_getById($MaTK);

            include_once 'view/template_admin_header.php';
            include_once 'view/user_edit.php';
            include_once 'view/template_admin_footer.php';
            break;


        case 'delete-user':
            include_once 'model/user.php';
            delete_user($_GET['id']);
            header('Location: index.php?mod=admin&act=admin-user');
            break;

        case 'admin-product':

            include_once 'model/product.php';

            $dsSPAdmin = get_Product();  //lấy toàn bộ sản phẩm có trong bảng sanpham (database)

            include_once 'view/template_admin_header.php';
            include_once 'view/admin_product.php';
            include_once 'view/template_admin_footer.php';

            $view_name = 'admin_product';
            break;

        case 'add-product': //them san pham
            include_once 'model/product.php';


            if(isset($_POST['submit'])) {

                $TenSP = $_POST['TenSP'];
                $HinhAnh = $_POST['HinhAnh'];
                $MoTa = $_POST['MoTa'];
                $SoLuong = $_POST['SoLuong'];
                $Gia = $_POST['Gia'];
                $MaDM = $_POST['MaDM'];

                add_product($TenSP, $HinhAnh, $MoTa, $SoLuong, $Gia, $MaDM);
                $_SESSION['thongbao'] = "Đã thêm sản phẩm thành công";

            }
            include_once 'view/template_admin_header.php';
            include_once 'view/product_add.php';
            include_once 'view/template_admin_footer.php';
            break;

        case 'update-product': //sua san pham

            include_once 'model/product.php';

            $MaSP = $_GET['id'];

            if(isset($_POST['submit'])) {

                $TenSP = $_POST['TenSP'];
                $HinhAnh = $_POST['HinhAnh'];
                $MoTa = $_POST['MoTa'];
                $SoLuong = $_POST['SoLuong'];
                $Gia = $_POST['Gia'];

                update_Product($MaSP, $TenSP, $HinhAnh, $MoTa, $SoLuong, $Gia);
                $_SESSION['thongbao'] = "Thông tin đã được lưu lại";

            }

            $vlSP = product_GetById2($MaSP);

            include_once 'view/template_admin_header.php';
            include_once 'view/product_edit.php';
            include_once 'view/template_admin_footer.php';
            break;

        case 'delete-product': //xoa san pham
            include_once 'model/product.php';

            delete_product($_GET['id']);
            header('Location: index.php?mod=admin&act=admin-product');
            break;


        case 'admin-comment':
            include_once 'model/comment.php';

            $dsAdminBL = get_comment();

            include_once 'view/template_admin_header.php';
            include_once 'view/admin_comment.php';
            include_once 'view/template_admin_footer.php';
            break;

        case 'admin-logout';
            unset($_SESSION['user']);
            header('Location: index.php?mod=page&act=home');
            break;

        case 'admin-category':
            include_once 'model/category.php';

            $dsAminDM = get_AllCategory();

            include_once 'view/template_admin_header.php';
            include_once 'view/admin_category.php';
            include_once 'view/template_admin_footer.php';
            break;

        case 'category-add':
            include_once 'model/category.php';

            if(isset($_POST['submit'])) {

                $TenDM = $_POST['TenDM'];
                $MoTaDM = $_POST['MoTaDM'];


                add_category($TenDM, $MoTaDM);
                $_SESSION['thongbao'] = "Đã thêm danh mục thành công";

            }
            include_once 'view/template_admin_header.php';
            include_once 'view/category_add.php';
            include_once 'view/template_admin_footer.php';
            break;

        case 'category-edit':
            include_once 'model/category.php';
            $MaDM = $_GET['id'];

            if(isset($_POST['submit'])) {

                $TenDM = $_POST['TenDM'];
                $MoTaDM = $_POST['MoTaDM'];

                update_category($MaDM, $TenDM, $MoTaDM);
                $_SESSION['thongbao'] = "Thông tin đã được lưu lại";
            }

            $vlDM = category_GetById($MaDM);
            include_once 'view/template_admin_header.php';
            include_once 'view/category_edit.php';
            include_once 'view/template_admin_footer.php';
            break;

        case 'delete-category':
            include_once 'model/category.php';
            delete_category($_GET['id']);
            header('Location: index.php?mod=admin&act=admin-category');
            break;
        
        case 'admin-order' :
            include_once 'model/order.php';

            $adminOrder = get_allOrder();

            include_once 'view/template_admin_header.php';
            include_once 'view/admin_order.php';
            include_once 'view/template_admin_footer.php';

            break;
        default:
            # code...
            break;
    }
}
?>