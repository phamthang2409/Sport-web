<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPORTVN STORE</title>
    <link rel="stylesheet" href="template/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <style>
        .container-xxl {
            padding: 0;
        }

        ul {
            list-style: none;
        }

        form h1 {
            text-align: center;
        }

        footer {
            width: 100%;
            background: #f2f2f2;
            margin-top: 20px;
            clear: both;

        }


        .footer-top {
            width: 100%;
            background-color: white;
        }


        .footer-top2 {
            float: left;
            padding: 0;
            margin: 0 12px;
            position: relative;
        }


        .footer-top1 {
            width: 22%;
        }

        .footer-top1 li {
            margin-top: 7px;
        }

        .footer-top1 li a {
            text-decoration: none;
            color: #0664f9;
            font-size: 15px;
        }

        .footer-top1 li a:hover {
            text-decoration: underline;
            color: black;
        }

        .footer-top3 ul li {
            margin: 0 !important;
            line-height: 1.4 !important;
        }


        .footer-top3 li {
            padding: 0 0 16px;
            font-size: 14px;
            color: #4a4a4a;
            position: relative;
        }


        .footer-top3 .text-footer3 {
            font-size: 14px;
        }


        .text-footer3 {
            font-weight: 500;
            font-size: 14px;
            line-height: 100%;
            color: #444b52;
        }

        .footer-top3 li a {
            font-size: 20px;
            font-weight: 500;
            color: #cb1c22;
            text-decoration: none;
        }


        .footer-down {
            width: 100%;
            background-color: #0d6efd;
            /* background: #f2f2f2; */
            font-size: 15px;
            color: white;
            text-align: center;
            clear: both;
        }

        .footer-down p {
            font-size: 14px;
            line-height: 20px;
            /* color: #444b52; */
        }

        .footer-down a {
            color: black;
            text-decoration: none;
            background-color: transparent;
        }

        #errEmail,
        #errPass,
        #errName,
        #errPhone {
            color: red;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg " style="background-color: var(--bs-primary);">
        <div class="container-fluid ">
            <a class="navbar-brand text-white" href="index.php?mod=page&act=home">SPORTVN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page"
                            href="index.php?mod=page&act=home">Trang chủ</a>
                    </li>
                    <!-- <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Danh Mục
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach ($dsCategory as $danhmuc): ?>
                                <li>
                                    <a class="dropdown-item"
                                        href="index.php?mod=category&act=detail&id=<?= $danhmuc['MaDM'] ?>">
                                        <?= $danhmuc['TenDanhMuc'] ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="index.php?mod=page&act=cart">Giỏ
                            hàng</a>
                    </li>

                    <!-- dùng if !isset để phủ định lại $_SESSION. ở đây tức là
                    nếu $_SESSION không tồn tại thì sẽ hiện chữ đăng nhập lên cho khách hàng đăng nhập-->
                    <?php if (!isset($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="index.php?mod=user&act=login">Đăng
                                nhập</a>
                        </li>
                    <?php else: ?>
                        <!-- ngược lại thì $_SESSION có tồn tại thì hiện lên chữ Xin chào, $_SESSION thông tin
                        của khách hàng vừa lưu và xóa đi chữ đăng nhập thay vào đó là đăng xuất-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Xin chào,
                                <?= $_SESSION['user']['HoTen'] ?>

                            </a>

                            <ul class="dropdown-menu end-0" style="left:auto">
                            <?php if (isset($_SESSION['user']) && user_hasOrder($_SESSION['user']['MaTK'])): ?>
                                <li><a class="dropdown-item" href="index.php?mod=order&act=pay">Thanh toán</a></li>
                            <?php endif; ?>

                                <li><a class="dropdown-item" href="#">Thông tin cá nhân</a></li>
                                <li><a class="dropdown-item" href="index.php?mod=order&act=order_detail">Lịch sử mua hàng</a></li>

                                <!-- Ở đây xử dụng 1 điều kiện khi mà $_SESSION['user]['quyen']
                            khi mà quyền của tài khoản đăng nhập = 1 tức = admin (database) thì sẽ hiện lên trang quản lý để chúng ta vào trang admin-->

                                <?php if ($_SESSION['user']['Quyen'] == 1): ?>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-waring" href="index.php?mod=admin&act=dashboard">Trang
                                            quản lý</a></li>
                                <?php endif; ?>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="index.php?mod=user&act=logout">Đăng xuất</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>

                </ul>



            </div>
        </div>
    </nav>

    <?php if ($_GET['act'] == 'home'): ?>

        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="upload/banner/anh1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="upload/banner/anh2.avif" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="upload/banner/anh3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-3 mt-3">
                <form class="mb-3" action="index.php?mod=product&act=search" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Nhập sản phẩm cần tìm" name="keyword">
                        <button class="btn btn-primary" type="submit" id="search">Tìm</button>
                    </div>
                </form>
                <ul class="list-group">
                    <li class="list-group-item active" aria-current="true">Sản phẩm nổi bật</li>
                    <li class="list-group-item">Giày chạy bộ siêu nhanh</li>
                    <li class="list-group-item">Áo không thấm</li>
                    <li class="list-group-item">Vợt không dây</li>
                    <li class="list-group-item">Bóng chuyền bị xẹp</li>
                </ul>
            </div>

            <div class="col-md-9 ">