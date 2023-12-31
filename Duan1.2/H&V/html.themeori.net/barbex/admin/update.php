<style>
    .logout-button {
        background-color: #f44;
        /* Màu nền cho nút */
        color: white;
        /* Màu chữ */
        border: none;
        /* Loại bỏ viền */
        padding: 5px 10px;
        /* Đệm cho nút */
        cursor: pointer;

        border-radius: 5px;
        /* Bo góc cho nút */

    }

    .logout-button a {
        color: white;
    }

    .logout-button:hover {
        background-color: #c33;

    }

    .form_account input[type="reset"],
    .form_account input[type="submit"],
    .form_content input[type="submit"],
    .form_content input[type="reset"],
    .form_content input[type="button"] {
        padding: 6px;
        background: red;
        border: 1px solid #CCC;
        border-radius: 5px;
        margin: 10px;
    }
</style>
<?php

if (isset($_GET['iddv']) && is_numeric($_GET['iddv'])) {
    $id = $_GET['iddv'];
    $dichvu = load_ten_dm($id);
    if ($dichvu) {
        $tendv = $dichvu['name'];
        $giadv = $dichvu['Gia'];
        $hinh = $dichvu['img'];
        $mota = $dichvu['MoTa'];
        $icon = $dichvu['icon'];
        $icon2 = $dichvu['icon2'];
        $thoigiandukien = $dichvu['thoigiandukien'];
    } else {
    }
}

$hinhpath = "../upload/" . $hinh;
if (is_file($hinhpath)) {
    $hinhpath = "<img src='" . $hinhpath . "' width='100px' height='100px'>";
} else {
    $hinhpath = "No file img!";
}

$iconpath = "../upload/" . $icon;
if (is_file($iconpath)) {
    $iconpath  = "<img src='" . $iconpath  . "' width='100px' height='100px'>";
} else {
    $iconpath  = "No file img!";
}

$icon2path = "../upload/" . $icon2;
if (is_file($icon2path)) {
    $icon2path  = "<img src='" . $icon2path  . "' width='100px' height='100px'>";
} else {
    $icon2path  = "No file img!";
}

if (isset($_POST['capnhat'])) {
    // Lấy thông tin từ biểu mẫu
    $id = $_POST['id'];
    $tendv = $_POST['tendv'];
    $giadv = $_POST['giadv'];
    $mota = $_POST['mota'];
    $icon = $_POST['icon']; // Lấy giá trị icon từ biểu mẫu
    $icon2 = $_POST['icon2'];
    $thoigiandukien = $_POST['thoigiandukien'];

    // Kiểm tra xem có tệp hình ảnh mới được tải lên không
    if (!empty($_FILES['hinh']['name'])) {
        $hinh_tmp = $_FILES['hinh']['tmp_name'];
        $hinh = $_FILES['hinh']['name'];
        move_uploaded_file($hinh_tmp, "../upload/" . $hinh);
    }


    if (!empty($_FILES['icon']['name'])) {
        $icon_tmp = $_FILES['icon']['tmp_name'];
        $icon = $_FILES['icon']['name'];
        move_uploaded_file($icon_tmp, "../upload/" . $icon);
    } else {

        $icon = $dichvu['icon'];
    }


    if (!empty($_FILES['icon2']['name'])) {
        $icon2_tmp = $_FILES['icon2']['tmp_name'];
        $icon2 = $_FILES['icon2']['name'];
        move_uploaded_file($icon2_tmp, "../upload/" . $icon2);
    } else {

        $icon2 = $dichvu['icon2'];
    }


    $sql = "UPDATE `dichvu` SET `name`='$tendv', `Gia`='$giadv', `MoTa`='$mota', `icon`='$icon', `icon2`='$icon2' , `thoigiandukien`='$thoigiandukien' ";
    if (!empty($hinh)) {
        $sql .= ", `img`='$hinh'";
    }
    if (!empty($icon)) {
        $sql .= ", `icon`='$icon'";
    }
    if (!empty($icon2)) {
        $sql .= ", `icon2`='$icon2'";
    }
    $sql .= " WHERE `MaDichVu`='$id'";
    pdo_execute($sql);
    $thongbao = "Cập nhật thành công!";
}
?>
<form action="" method="POST" enctype="multipart/form-data" style="margin: 150px;">
    <h1>CẬP NHẬT DỊCH VỤ</h1>
    <div class="row2 mb10">
        <label>Tên sản phẩm:</label><br>
        <input type="text" name="tendv" value="<?= $tendv ?>">
    </div>
    <div class="row2 mb10">
        <label>Giá:</label><br>
        <input type="text" name="giadv" value="<?= $giadv ?>">
    </div>
    <div class="row2 mb10">
        <label>Hình ảnh:</label><br>
        <input type="file" name="hinh"><br>
        <?php echo $hinhpath ?>
    </div>

    <div class="row2 mb10">
        <label>Icon:</label><br>
        <input type="file" name="icon"><br>
        <?php echo $iconpath ?>
    </div>

    <div class="row2 mb10">
        <label>Icon khi click vào:</label><br>
        <input type="file" name="icon2"><br>
        <?php echo $icon2path ?>
    </div>
    <div class="row2 mb10">
        <label>Mô tả:</label><br>
        <textarea name="mota" id="" cols="30" rows="10"><?= $mota ?></textarea>
    </div>

    <div class="row2 mb10">
        <label>Thời gian dự kiến:</label><br>
        <input type="text" name="thoigiandukien" value="<?= $thoigiandukien ?>">
    </div>
    </div>

    <div class="form_account ">

        <input type="hidden" name="id" value="<?= $id ?>">
        <input class="mr20" name="capnhat" type="submit" value="Cập Nhật">
        <input class="mr20" type="reset" value="NHẬP LẠI">

        <a href="index.php?act=listsp"> <input class="mr20" type="button" value="DANH SÁCH"></a>


    </div>
    <?php
    if (isset($thongbao) && ($thongbao != "")) {
        echo $thongbao;
    }
    ?>
</form>