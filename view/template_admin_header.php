<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quản lý SPORTVN</title>
        <link rel="stylesheet" href="template/bootstrap-5.3.2-dist/css/bootstrap.min.css">
        <link rel="icon" type="img/x-icon" href="./img/N. lONG vU.png">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div
                    class="col-md-2 p-0 bg-primary text-white collapse collapse-horizontal show"
                    id="openMenu"
                    style="min-height :100vh; ;">
                    <strong class="text-center d-block p-3">TRANG QUẢN LÝ</strong>
                    <div class="list-group m-3 list-group-item-primary ">
                        <a href="index.php?mod=admin&act=dashboard"
                            class="list-group-item list-group-item-action active " 
                            aria-current="true">
                            Trang tổng quan
                        </a>
                        <a href="index.php?mod=admin&act=admin-user"
                            class="list-group-item list-group-item-action ">Tài
                            khoản</a>
                        <a href="index.php?mod=admin&act=admin-product"
                            class="list-group-item list-group-item-action ">Sản phẩm</a>
                        <a href="index.php?mod=admin&act=admin-comment"
                            class="list-group-item list-group-item-action ">Bình luận</a>
                        <a href="index.php?mod=admin&act=admin-category"
                            class="list-group-item list-group-item-action">Danh mục</a>
                        <a class="list-group-item list-group-item-action"
                            aria-disabled="true">Hóa đơn</a>
                    </div>
                </div>
                <div class="col-md p-0">
                    <nav class="navbar navbar-expand-lg bg-primary "
                        data-bs-theme="dark">
                        <div class="container-fluid">
                            <button class="btn btn-primary" type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#openMenu" aria-expanded="false"
                                aria-controls="openMenu">
                                =
                            </button>
                            <a class="navbar-brand" href="#">ADMIN </a>
                            <button class="navbar-toggler" type="button"
                                data-bs-toggle="collapse"
                                data- bs-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent"
                                aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse"
                                id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle"
                                            href="#" role="button"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Xin chào, <?=$_SESSION['user']['HoTen']?>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="index.php?mod=page&act=home">Về trang chủ</a></li>
                                            <li><hr class="dropdown-divider"></li>  
                                            <li><a class="dropdown-item"
                                                    href="index.php?mod=admin&act=admin-logout">Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="container">