<?php 
    function loadall_binhluan($MaDichVu){
        $sql = "
            SELECT binhluan.id, binhluan.noidung, taikhoan.user, binhluan.ngaybinhluan FROM `binhluan` 
            LEFT JOIN taikhoan ON binhluan.idnguoidung = taikhoan.id
            LEFT JOIN dichvu ON binhluan.iddichvu = dichvu.MaDichVu
            WHERE dichvu.MaDichVu = $MaDichVu ;
        ";
        $result =  pdo_query($sql);
        return $result;
    }
    function insert_binhluan($idpro, $noidung){
        $date = date('Y-m-d');
        $sql = "
            INSERT INTO `binhluan`(`noidung` , `iddichvu`, `ngaybinhluan`) 
            VALUES ('$noidung','$idpro','$date');
        ";
        //echo $sql;
        //die;
        pdo_execute($sql);
    }

//     //function insert_binhluan($idpro, $noidung, $iduser){
//     $date = date('Y-m-d');
//     $sql = "
//         INSERT INTO `binhluan`(`noidung`, `iduser`, `idpro`, `ngaybinhluan`) 
//         VALUES ('$noidung', '$iduser', '$idpro', '$date');
//     ";
//     pdo_execute($sql);
// }

// <input type="hidden" name="iduser" value="php $_SESSION['user']['id']  Thêm form gửi bình luận
?>