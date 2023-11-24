<?php

include "model/pdo.php";
include "model/dichvu.php";
include "model/taikhoan.php";
include "model/binhluan.php";
include "view/header.php";
include "global.php";
$dsdm = loadall_danhmuc();

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "lienhe":
            include "view/lienhe.php";
            break;

        case "giohang":
            include "view/giohang.php";
            break;

        case "trangchu":
            include "view/home.php";
            break;



        case "about-us":
            include "view/about-us.php";
            break;

        case "chitietdichvu":

            if (isset($_POST['guibinhluan'])) {
                $idpro = $_POST['idpro'];
                
                $noidung = $_POST['noidung'];
                $MaDichVu = $_GET['MaDichVu'];
                insert_binhluan($idpro,$noidung);
                echo '<script>window.location.href = "index.php?act=chitietdichvu&MaDichVu=' . $MaDichVu . '";</script>';
            }

            include "view/chitietdichvu.php";
            break;

        case "dangnhap":
            include "view/login/dangnhap.php";
            if (isset($_POST['dangnhap'])) {
                $loginMess = dangnhap($_POST['user'], $_POST['pass']);
                $thongbao = "Đăng nhập thành công";

                echo '<script>window.location.href = "index.php?act=trangchu";</script>';
            }


            break;
        case "dangxuat":
            dangxuat();
            echo '<script>window.location.href = "index.php?act=trangchu";</script>';
            break;

        case "dangky":
            if (isset($_POST['dangky']) && ($_POST['dangky'] != "")) {
                $email = $_POST['email'];
                $name = $_POST['user'];
                $pswd = $_POST['pass'];
                $sdt = $_POST['tel'];
                insert_taikhoan($email, $name, $pswd, $sdt);
                $thongbao = "Đăng ký thành công";
            }
            include "view/login/dangky.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
