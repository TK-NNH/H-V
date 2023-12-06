<?php 
function loadall_vnpay()
{
    $sql = "SELECT * FROM vnpay ORDER BY thoigianthanhtoan ASC";
    $listvnpay = pdo_query($sql);
    return $listvnpay;
}

function load_vnpay($id)
{
    $sql = "SELECT * FROM vnpay WHERE id = $id";
    $vnpay = pdo_query_one($sql);

    if ($vnpay) {
        return array(
            'id' => $vnpay['id'],
            'hoten' => $vnpay['hoten'],
            'sotien' => $vnpay['sotien'],
            'noidung' => $vnpay['noidung'],
            'magiaodichVNPAY' => $vnpay['magiaodichVNPAY'],
            'manganhang' => $vnpay['manganhang'],
            'thoigianthanhtoan' => $vnpay['thoigianthanhtoan']
        );
    } else {
        return "";
    }
}
function delete_vnpay($id)
{
    $sql = "DELETE FROM vnpay WHERE id = $id";
    pdo_execute($sql);
}

?>