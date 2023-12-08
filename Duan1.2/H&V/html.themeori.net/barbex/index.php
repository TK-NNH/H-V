<?php

include "model/pdo.php";
include "model/dichvu.php";
include "model/taikhoan.php";
include "model/binhluan.php";
include "view/header.php";
include "global.php";
// include "../thanhtoanVNPAY.php";
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
                insert_binhluan($idpro, $noidung);
                echo '<script>window.location.href = "index.php?act=chitietdichvu&MaDichVu=' . $MaDichVu . '";</script>';
            }

            include "view/chitietdichvu.php";
            break;

        case "dangnhap":

            if (isset($_POST['dangnhap'])) {
                $loginMessage = dangnhap($_POST['user'], $_POST['pass']);

                if (empty($loginMessage)) {
                    echo '<script>window.location.href = "index.php?act=trangchu";</script>';
                }
            }
            include "view/login/dangnhap.php";

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

            case "thongtintaikhoan":
                
                include "view/thongtintaikhoan.php";
                break;
            

        case "doimatkhau":
            if (isset($_POST['doimatkhau'])) {
                $userId = $_SESSION['user_id'];
                $matKhauHienTai = $_POST['pass_hientai'];
                $matKhauMoi = $_POST['pass_moi'];
                $nhapLaiMatKhau = $_POST['pass_nhaplai'];


                if (kiemTraMatKhauHienTai($userId, $matKhauHienTai)) {

                    if ($matKhauMoi === $nhapLaiMatKhau) {

                        capNhatMatKhau($userId, $matKhauMoi);
                        $thongbao = "Đổi mật khẩu thành công";
                    } else {
                        $thongbao = "Mật khẩu mới và nhập lại mật khẩu không khớp";
                    }
                } else {
                    $thongbao = "Mật khẩu hiện tại không đúng";
                }
            }

            include "view/login/doimatkhau.php";
            break;

        case "datlich":
            $month = filter_input(INPUT_GET, 'month', FILTER_VALIDATE_INT);
            $year = filter_input(INPUT_GET, 'year', FILTER_VALIDATE_INT);

            if ($month === false || $year === false || $month < 1 || $month > 12) {

                $dateComponents = getdate();
                $month = $dateComponents['mon'];
                $year = $dateComponents['year'];
            }
            if (isset($_GET['month'])) {
                $dateComponents = getdate();
                if (isset($_GET['month']) && isset($_GET['year'])) {
                    $month = $_GET['month'];
                    $year = $_GET['year'];
                } else {
                    $month = $dateComponents['mon'];
                    $year = $dateComponents['year'];
                }
            }
            include "view/datlich.php";
            break;

        case "thanhtoan":

            include "view/thanhtoan/check-out.php";
            break;

        case "formdatlich":
            if (isset($_GET['selected_date'])) {
                $selectedDate = $_GET['selected_date'];
            }

            include "view/formdatlich.php";
            break;

        case "lichhen":
            include "view/lichhen.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
