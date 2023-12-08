<style>
    h1 {
        text-align: center;
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

    table {
        align-items: center;
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }

    .mr20{
        margin-top: 20px;
    }
</style>

<?php


if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $userInfo = layThongTinTaiKhoan($userId);

    if ($userInfo) {
        echo '<div class="row2" style="margin: 150px;">';
        echo '<div class="row2 font_title">';
        echo '<h1>THÔNG TIN TÀI KHOẢN</h1>';
        echo '</div>';
        echo '<div class="row2 form_content">';
        echo '<form action="#" method="POST">';
        echo '<div class="row2 mb10 formds_loai">';
        echo '<table>';
        echo '<tr>';
        echo '<th>Tên tài khoản</th>';
        echo '<th>Email</th>';
        echo '<th>Số điện thoại</th>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>' . $userInfo['user'] . '</td>';
        echo '<td>' . $userInfo['email'] . '</td>';
        echo '<td>' . $userInfo['tel'] . '</td>';
        echo '</tr>';
        
        
        echo '</table>';
        echo '</div>';
        echo '<div class="row mb10 ">
        <a href="index.php?act=doimatkhau"> <input class="mr20" type="button" value="ĐỔI MẬT KHẨU"></a>
    </div>';
        echo '</form>';
        echo '</div>';
        echo '</div>';

    } else {
        echo "Không tìm thấy thông tin tài khoản.";
    }
} else {
    echo "Bạn chưa đăng nhập.";
}


?>

