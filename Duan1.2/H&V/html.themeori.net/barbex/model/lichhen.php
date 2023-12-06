<?php 
function loadall_lichhen()
{
    $sql = "SELECT * FROM lichhen WHERE trangthai IN (0, 2) ORDER BY ThoiGianDat ASC";
    $listlichhen = pdo_query($sql);
    return $listlichhen;
}


function loadall_lichhenhoanthanh()
{
    $sql = "SELECT * FROM lichhen WHERE trangthai = 1 ORDER BY ThoiGianDat ASC";
    $listlichhen = pdo_query($sql);
    return $listlichhen;
}

function load_ten_lh($iddm)
{
    if ($iddm > 0) {
        $sql = "select * from dichvu where MaLichHen=" . $iddm;  // Sửa thành bảng danhmuc thay vì sanpham
        $lichhen = pdo_query_one($sql);

        if ($lichhen) {
            return array(
                'MaLichHen' => $lichhen['MaDichVu'],
                'Ten' => $lichhen['Ten'],
                'sdt' => $lichhen['sdt'],
                'email' => $lichhen['email'],
                'ThoiGianDat' => $lichhen['ThoiGianDat'],
                'Gio' => $lichhen['Gio'],
                'DichVu' => $lichhen['DichVu'],
                'Gia' => $lichhen['Gia'],
                'thoigiandukien' =>$lichhen['thoigiandukien'],
                'trangthai' => $lichhen['trangthai']
                
                
                
            );
        } else {
            return "";
        }
    } else {
        return "";
    }
}

function formatTime($timestamp)
{
    return date('Y-m-d H:i:s', strtotime($timestamp));
}

function hoanthanh_lichhen($id)
{
    $sql = "UPDATE `lichhen` SET `trangthai` = 1 WHERE `lichhen`.`MaLichHen` = $id";
    pdo_execute($sql);
}

function thuchien_lichhen($id)
{
    $sql = "UPDATE `lichhen` SET `trangthai` = 2 WHERE `lichhen`.`MaLichHen` = $id";
    pdo_execute($sql);
}

function loadall_sanphamhoanthanh($iddm = 0)
{
    $sql="SELECT * from lichhen where trangthai = 1";
    
    if($iddm>0){
        $sql.=" and iddm ='".$iddm."'";
    }
    $sql.=" ORDER BY ThoiGianDat ASC";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}

function khoiphuc($id)
{
    $sql = "UPDATE `lichhen` SET `trangthai` = 0 WHERE `lichhen`.`MaLichHen` = $id";
    pdo_execute($sql);
}
?>