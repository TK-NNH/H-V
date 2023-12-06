<?php
include "../model/pdo.php";
include "../model/lichhen.php";
include "header.php";

$dsdm = loadall_lichhen();


if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "listlichhen":
            if (isset($_POST['clickOK']) && ($_POST['clickOK'])) {
                $keyw = $_POST['keyw'];
                $iddm = $_POST['iddm'];
            } else {
                $keyw = "";
                $iddm = 0;
            }
            $listlichhen = loadall_lichhen();

            include "listlichhen.php";
            break;

        case "hoanthanh":
            if (isset($_GET['idlh'])) {
                hoanthanh_lichhen($_GET['idlh']);
                $thanhcong = "Thay đổi thành công";
                echo '<script>window.location.href = "lichhen.php?act=listlichhen";</script>';
            }

        case "thuchien":
            if (isset($_GET['idlh'])) {
                thuchien_lichhen($_GET['idlh']);
                $thanhcong = "Thay đổi thành công";
                echo '<script>window.location.href = "lichhen.php?act=listlichhen";</script>';
            }

            $listlichhen = loadall_lichhen();
            include "listlichhen.php";

            break;

        case "listhoanthanh":
            $listlichhen = loadall_lichhenhoanthanh();
            include "listlichhenhoanthanh.php";
            break;

        case "khoiphuc":
            if (isset($_GET['idlh'])) {
                khoiphuc($_GET['idlh']);
                $thanhcong = "Khôi phục thành công";
            }
            $listlichhen = loadall_lichhenhoanthanh();
            include "listlichhenhoanthanh.php";
            break;
    }
} else {
    include "listlichhen.php";
}

include "footer.php";
