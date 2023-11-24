<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "h&v";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}


$sqlCoSo = "SELECT MaCoSo, TenCoSo FROM coso";
$resultCoSo = $conn->query($sqlCoSo);

$sqlDichVu = "SELECT MaDichVu, name FROM dichvu ";
$resultDichVu = $conn->query($sqlDichVu);

$sqlLoaiThuCung = "SELECT DISTINCT LoaiThuCung FROM thucung";
$resultLoaiThuCung = $conn->query($sqlLoaiThuCung); 
    
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Đặt lịch hẹn khám thú cưng</title>
</head>

<body>
    <h1>Đặt lịch hẹn khám thú cưng</h1>


    <label for="coSo">Chọn cơ sở:</label>
    <select name="coSo" id="coSo">
        <?php
        if ($resultCoSo->num_rows > 0) {
            while ($row = $resultCoSo->fetch_assoc()) {
                echo '<option value="' . $row['MaCoSo'] . '">' . $row['TenCoSo'] . '</option>';
            }
        }
        ?>
    </select>

    <label for="loaiDichVu">Chọn loại dịch vụ:</label>
    <select name="loaiDichVu" id="loaiThuCung">
        <?php
        if ($resultDichVu->num_rows > 0) {
            while ($row = $resultDichVu->fetch_assoc()) {
                echo '<option value="' . $row['MaDichVu'] . '">' . $row['name'] . '</option>';
            }
        }
        ?>
    </select>

    <label for="loaiThuCung">Chọn loại thú cưng:</label>
    <select name="loaiThuCung" id="loaiThuCung">
        <?php
        if ($resultLoaiThuCung->num_rows > 0) {
            while ($row = $resultLoaiThuCung->fetch_assoc()) {
                echo '<option value="' . $row['LoaiThuCung'] . '">' . $row['LoaiThuCung'] . '</option>';
            }
        }
        ?>
    </select>


    <label for="thoiGian">Chọn thời gian đặt lịch:</label>
    <input type="datetime-local" name="thoigianhen" required>


    <input type="submit" value="Đặt lịch">
</body>

</html>