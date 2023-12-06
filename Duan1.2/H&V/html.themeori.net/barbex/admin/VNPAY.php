<?php
include "../model/pdo.php";
include "../model/VNPAY.php";
include "header.php";



if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "listVNPAY":
            if (isset($_POST['clickOK']) && ($_POST['clickOK'])) {
                $keyw = $_POST['keyw'];
                $iddm = $_POST['iddm'];
            } else {
                $keyw = "";
                $iddm = 0;
            }
            $listvnpay = loadall_vnpay();

            include "listVNPAY.php";
            break;

            case "thongke":
                
                break;
        
    }
} else {
    include "listVNPAY.php";
}

include "footer.php";
