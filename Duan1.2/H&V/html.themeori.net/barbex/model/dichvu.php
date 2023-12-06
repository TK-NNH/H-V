<?php
function loadall_danhmuc()
{
    $sql = "select * from dichvu order by MaDichVu  ";
    $listdanhmuc = pdo_query($sql);
    return  $listdanhmuc;
}
function load_ten_dm($iddm)
{
    if ($iddm > 0) {
        $sql = "select * from dichvu where MaDichVu=" . $iddm;  // Sửa thành bảng danhmuc thay vì sanpham
        $dm = pdo_query_one($sql);

        if ($dm) {
            return array(
                'MaDichVu' => $dm['MaDichVu'],
                'name' => $dm['name'],
                'MoTa' => $dm['MoTa'],
                'Gia' => $dm['Gia'],
                'img' => $dm['img'],
                'trangthai' => $dm['trangthai'],
                'icon' => $dm['icon'],
                'icon2' => $dm['icon2'],
                'thoigiandukien' => $dm['thoigiandukien']
            );
        } else {
            return "";
        }
    } else {
        return "";
    }
}

function insert_dichvu($tendv, $giadv, $hinh, $mota, $icon , $icon2 , $thoigiandukien)
{
    $sql = "INSERT INTO `dichvu`(`name`, `Gia`, `img`, `MoTa` ,`icon`,`icon2` , `thoigiandukien`) VALUES ('$tendv', '$giadv', '$hinh', '$mota' , '$icon' ,'$icon2' , '$thoigiandukien')";
    pdo_execute($sql);
}

function insert_combo($tendv, $giadv, $hinh, $mota, $thoigiandukien)
{
    $sql = "INSERT INTO `dichvu`(`name`, `Gia`, `img`, `MoTa` , `thoigiandukien` , `trangthai`) VALUES ('$tendv', '$giadv', '$hinh', '$mota' , '$thoigiandukien' ,'3')";
    pdo_execute($sql);
}

function loadall_sanpham2($iddm = 0)
{
    $sql = "SELECT *, COUNT(binhluan.id) as soBinhLuan 
        from dichvu
        join binhluan ON binhluan.iddichvu = dichvu.MaDichVu
        where trangthai = 0
        group by dichvu.MaDichVu";

    if ($iddm > 0) {
        $sql .= " and iddm ='" . $iddm . "'";
    }

    $sql .= " order by dichvu.MaDichVu desc";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function hard_delete($id)
{
    $sql = "DELETE FROM dichvu WHERE MaDichVu=" . $id;
    pdo_execute($sql);
}


// cÂU TRUY VẤN XÓA MỀM
function soft_delete($id)
{
    $sql = "UPDATE `dichvu` SET `trangthai` = 1 WHERE `dichvu`.`MaDichVu` = $id";
    pdo_execute($sql);
}


function loadall_sanphamxoa($iddm = 0)
{
    $sql="SELECT * from dichvu where trangthai = 1";
    
    if($iddm>0){
        $sql.=" and iddm ='".$iddm."'";
    }
    $sql.=" order by MaDichVu desc";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}
function khoiphuc($id)
{
    $sql = "UPDATE `dichvu` SET `trangthai` = 0 WHERE `dichvu`.`MaDichVu` = $id";
    pdo_execute($sql);
}

function luu_datlich($ten, $email, $sdt, $ngay, $gio, $dichvu, $giadv, $thoigiandukien ,$idkhachhang ) {
    $sql = "INSERT INTO `lichhen`(`Ten`, `sdt`, `email`, `ThoiGianDat`, `Gio`, `DichVu`, `Gia`, `thoigiandukien` ,`MaKhachHang` , `TrangThai`) 
            VALUES ('$ten', '$sdt', '$email', '$ngay $gio', '$gio', '$dichvu', '$giadv', '$thoigiandukien' , '$idkhachhang' ,'0')";
    pdo_execute($sql);
    return true; 
}

function loadall_lienhe()
{
    $sql = "SELECT * FROM lienhe ORDER BY thoigian ASC";
    $listlienhe = pdo_query($sql);
    return  $listlienhe;
}


function insert_lienhe($name, $email, $tel, $message)
{
    $sql = "INSERT INTO `lienhe` (`name`, `email`, `sdt`, `loinhan`, `thoigian`) 
            VALUES ('$name', '$email', '$tel', '$message', NOW())";
    pdo_execute($sql);
}

