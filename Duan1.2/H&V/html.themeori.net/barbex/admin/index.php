<?php
include "../model/pdo.php";
include "../model/dichvu.php";
include "header.php";

$dsdm = loadall_danhmuc();


if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "listsp":
            if (isset($_POST['clickOK']) && ($_POST['clickOK'])) {
                $keyw = $_POST['keyw'];
                $iddm = $_POST['iddm'];
            } else {
                $keyw = "";
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();

            include "listdichvu.php";
            break;

        case "listcombo":
            if (isset($_POST['clickOK']) && ($_POST['clickOK'])) {
                $keyw = $_POST['keyw'];
                $iddm = $_POST['iddm'];
            } else {
                $keyw = "";
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();

            include "listcombo.php";
            break;

        case "addsp":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {

                $tendv = $_POST['tendv'];
                $giadv = $_POST['giadv'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $icon = $_FILES['icon']['name'];
                $icon2 = $_FILES['icon2']['name'];
                $thoigiandukien = $_POST['thoigiandukien'];
                //                    echo $hinh;
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                //                    echo $target_file;
                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                    //                        echo "Bạn đã upload ảnh thành công";
                } else {
                    //                        echo "Upload ảnh không thành công";
                }

                $target_file = $target_dir . basename($_FILES['icon']['name']);
                //                    echo $target_file;
                if (move_uploaded_file($_FILES['icon']['tmp_name'], $target_file)) {
                    //                        echo "Bạn đã upload ảnh thành công";
                } else {
                    //                        echo "Upload ảnh không thành công";
                }

                $target_file = $target_dir . basename($_FILES['icon2']['name']);
                //                    echo $target_file;
                if (move_uploaded_file($_FILES['icon2']['tmp_name'], $target_file)) {
                    //                        echo "Bạn đã upload ảnh thành công";
                } else {
                    //                        echo "Upload ảnh không thành công";
                }
                //                    echo $iddm;
                insert_dichvu($tendv, $giadv, $hinh, $mota, $icon, $icon2, $thoigiandukien);
                $thanhcong = "Thêm thành công";
            }

            $listdanhmuc = loadall_danhmuc();
            include "add.php";
            break;

        case "addcombo":
            if (isset($_POST['OK']) && ($_POST['OK'])) {

                $tendv = $_POST['tendv'];
                $giadv = $_POST['giadv'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];

                $thoigiandukien = $_POST['thoigiandukien'];
                //                    echo $hinh;
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                //                    echo $target_file;
                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                    //                        echo "Bạn đã upload ảnh thành công";
                } else {
                    //                        echo "Upload ảnh không thành công";
                }


                insert_combo($tendv, $giadv, $hinh, $mota, $thoigiandukien);
                $thanhcong = "Thêm thành công";
            }

            $listdanhmuc = loadall_danhmuc();
            include "addcombo.php";
            break;

        case "suasp":

            include "update.php";
            break;

        case "suacombo":

            include "updatecombo.php";
            break;
        case "trangchu":

            include "listdichvu.php";
            break;

        case "hard_delete":
            if (isset($_GET['idsp'])) {
                hard_delete($_GET['idsp']);
                $thanhcong = "Xóa thành công";
                echo '<script>window.location.href = "index.php?act=trangchu";</script>';
            }
            $listdanhmuc = loadall_danhmuc();
            include "listdichvu.php";

            break;

        case "soft_delete":
            if (isset($_GET['idsp'])) {
                soft_delete($_GET['idsp']);
                $thanhcong = "Xóa thành công";
                echo '<script>window.location.href = "index.php?act=trangchu";</script>';
            }

            $listdanhmuc = loadall_danhmuc();
            include "listdichvu.php";

            break;

        case "quanlybinhluan":
            $listdanhmuc = loadall_danhmuc();

            include "listquanlybinhluan.php";
            break;

        case "bieudosp":

            include "bieudobinhluan.php";
            break;

        case "thungrac":

            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanphamxoa($keyw, $iddm);
            include "thungrac.php";
            break;

        case "khoiphucsp":
            if (isset($_GET['idsp'])) {
                khoiphuc($_GET['idsp']);
                $thanhcong = "Khôi phục thành công";
            }
            $listsanpham = loadall_sanphamxoa(0);
            $listdanhmuc = loadall_danhmuc();
            include "thungrac.php";
            break;

        case "lienhe":
            $listlienhe = loadall_lienhe();
            include "lienhe.php";
            break;
    }
} else {
    include "listdichvu.php";
}

include "footer.php";
