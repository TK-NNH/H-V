<?php

function getLichHenByUserId($userId)
{
    $sql = "SELECT * FROM lichhen WHERE MaKhachHang = $userId";
    return pdo_query($sql);
}


if (!isset($_SESSION['user_id'])) {
    echo "Bạn chưa đăng nhập.";

    exit;
}


$userId = $_SESSION['user_id'];
$lichHenList = getLichHenByUserId($userId);


if (isset($_POST['huyLichHen'])) {
    $maLichHen = $_POST['maLichHen'];


    $sql = "DELETE FROM lichhen WHERE MaLichHen = $maLichHen";
    pdo_execute($sql);

    echo '<script>window.location.href = "index.php?act=lichhen";</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin lịch hẹn</title>
</head>

<style>
    h2 {
        text-align: center;
        margin-bottom: 10px;
    }

    th {
        padding: 10px;
        margin: 10px;
    }

    td {
        margin: 10px 5px !important;
        padding: 10px;
        border: 1px solid black;
    }

    input {
        margin: 5px;
    }


    table {

        align-items: center;
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }
</style>

<body style="margin-top: 200px ;">
    <h2 style=" margin-left: 100px; ">Thông tin lịch hẹn của bạn</h2>

    <?php if ($lichHenList) : ?>
        <table  style="  margin-bottom: 200px;">
            <tr>
                <th>Mã Lịch Hẹn</th>
                <th>Thời Gian Đặt</th>
                <th>Dịch Vụ</th>
                <th>Giá</th>
                <th>Thời gian dự kiến</th>
                <th>Trạng thái</th>


            </tr>
            <?php foreach ($lichHenList as $lichHen) : ?>
                <tr>
                    <td><?php echo $lichHen['MaLichHen']; ?></td>
                    <td style="font-size: 20px;  font-weight: bold;"><?php echo $lichHen['ThoiGianDat']; ?></td>
                    <td><?php echo $lichHen['DichVu']; ?></td>
                    <td><?php echo $lichHen['Gia']; ?></td>
                    <td><?php echo $lichHen['thoigiandukien']; ?></td>
                    <td>
                        <?php
                        if ($lichHen['TrangThai'] == 0) {
                            echo '<p style="font-weight: bold; color:red"> Chưa hoàn thành</p>';
                        } else if ($lichHen['TrangThai'] == 2) {
                            echo '<p style="font-weight: bold; color:orange">Đang tiến hành</p>';
                        } else {
                            echo '<p style="font-weight: bold; color:green">Đã hoàn thành</p>';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        
                        if ($lichHen['TrangThai'] == 0)  {
                        ?>
                            <form method="POST" onsubmit="return confirmHuyLich('<?php echo $lichHen['MaLichHen']; ?>')">
                                <input type="hidden" name="maLichHen" value="<?php echo $lichHen['MaLichHen']; ?>">
                                <button type="submit" name="huyLichHen">Hủy lịch</button>
                            </form>
                        <?php } ?>
                    </td>



                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p style="font-size: 20px;  font-weight: bold; text-align:center">Hiện tại bạn không có lịch hẹn nào.</p>
    <?php endif; ?>

    <script>
        function confirmHuyLich(maLichHen) {

            var xacNhan = confirm("Bạn có muốn hủy lịch hẹn không?");


            return xacNhan;
        }
    </script>
</body>

</html>