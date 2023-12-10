<?php
//Quan ly view va model lien quan: trang chu, lien he, gioi thieu
// Goi duoc: view (giao dien html, css, js)
// mode (csdl)
if (isset($_GET['act'])) {
    switch ($_GET['act']) {

        case 'login': //dang nhap
            include_once 'model/user.php';

            if(isset($_POST['Email']) && isset($_POST['MatKhau'])){  
                //kiểm tra email và mật khẩu đã được nhập chưa
                $kq = user_Login($_POST['Email'],$_POST['MatKhau']);    //hàm user_Login sẽ tiếp nhận dữ liệu được nhập từ form 
                
                if( $kq ){   //nếu $kq đúng thì đăng nhập thành công
                    $_SESSION['user'] = $kq;  //đăng nhập thành công và lưu thông tin vào $_SESSION
                    header('Location: index.php?mod=page&act=home'); //chuyển trang về lại home
                }
                else{  //nếu sai thì báo lỗi
                    $_SESSION['loi'] = 'Email hoặc mật khẩu không đúng';
                }
            } 
            
            include_once 'view/template_header.php';
            include_once 'view./view_login.php';
            include_once 'view/template_footer.php';

            break;

        case 'register' : //dang ky
            include_once 'model/user.php';

            if(isset($_POST['submit'])){
                //kiểm tra dữ liệu trong form đã được nhập chưa
                $HoTen = $_POST['HoTen'];
                $Email = $_POST['Email'];
                $SoDienThoai = $_POST['SoDienThoai'];
                $DiaChi = $_POST['DiaChi'];
                $MatKhau = $_POST['MatKhau'];

                $kq = check_Email($Email);   //hàm check_Mail dùng để check Email đó đã có người sử dụng chưa
                
                if( $kq ){ //đúng thì email đã tồn tại không cho tạo tài khoản và báo lỗi
                    $_SESSION['loi'] = "Email <strong>'.$Email.'</strong> đã tồn tại.";
                }else{ //email chưa có , tạo được tài khoản
                    $Quyen = 0; 
                    $Hinh = 'avatar1.jpg';
                    user_Register($HoTen, $Email, $SoDienThoai, $DiaChi, $MatKhau, $Hinh, $Quyen);
                    $_SESSION['thongbao'] = 'Đã tạo tài khoản với Email <strong>' . $Email . '</strong>';
                }
            }
                include_once 'view/template_header.php';
                include_once 'view/view_register.php';
                include_once 'view/template_footer.php';
                break;
                
        case 'logout' : //dang xuat
            unset($_SESSION['user']);   //xóa $_SESSION ĐÃ ĐƯỢC LƯU
            header('Location: index.php?mod=page&act=home'); //chuyển về trang home
            break;
        
        case 'forget-password' : //quen mat khau
            include_once 'model/user.php';

            if(isset($_POST['submit'])){
                
                $Email = $_POST['Email'];
                
                $kq = check_Email($Email);
                if($kq){
                    $_SESSION['thongbao'] = "Mật khẩu của bạn là :". $kq['MatKhau'];
                }else{
                    $_SESSION['loi'] = "Email của bạn không tồn tài trên shop của chúng tôi";
                }
            }

            include_once 'view/template_header.php';
            include_once 'view/forget_pass.php';
            include_once 'view/template_footer.php';
            break;

        case 'update':

            break;

        case 'delete' :
            
            break;
        default:
            # code...
            break;
    }
}
?>