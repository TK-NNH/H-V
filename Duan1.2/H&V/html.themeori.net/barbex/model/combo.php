<?php 

// Truy vấn toàn bộ thông tin của bảng combo
function loadall_combo()
{
    $sql = "SELECT * FROM combo";
    $listCombo = pdo_query($sql);
    return $listCombo;
}

// Lấy thông tin của một combo dựa trên ID
function load_combo_by_id($idCombo)
{
    if ($idCombo > 0) {
        $sql = "SELECT * FROM combo WHERE id=" . $idCombo;
        $combo = pdo_query_one($sql);

        if ($combo) {
            return array(
                'id' => $combo['id'],
                'NameCombo' => $combo['NameCombo'],
                'Gia' => $combo['Gia'],
                'Thoigiandukien' => $combo['Thoigiandukien'],
                'trangthai' => $combo['trangthai']
            );
        } else {
            return "";
        }
    } else {
        return "";
    }
}

// Thêm một combo mới
function insert_combo($name, $gia, $thoigiandukien)
{
    $sql = "INSERT INTO `combo` (`NameCombo`, `Gia`, `Thoigiandukien`, `trangthai`) VALUES ('$name', '$gia', '$thoigiandukien', 0)";
    pdo_execute($sql);
}

// Xóa một combo theo ID
function delete_combo($id)
{
    $sql = "DELETE FROM combo WHERE id=" . $id;
    pdo_execute($sql);
}

// Cập nhật thông tin của combo
function update_combo($id, $name, $gia, $thoigiandukien)
{
    $sql = "UPDATE `combo` SET `NameCombo` = '$name', `Gia` = '$gia', `Thoigiandukien` = '$thoigiandukien' WHERE `id` = $id";
    pdo_execute($sql);
}

?>