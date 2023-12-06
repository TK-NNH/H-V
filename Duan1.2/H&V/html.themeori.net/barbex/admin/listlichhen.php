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

    input {
        margin: 5px;
    }

    .description-column {
        max-width: 400px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .compact-buttons p{
        
        text-align: center;
    }
    table {

        align-items: center;
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }

    .compact-buttons-input {
        padding: 10px 15px !important;
        margin: 5px 0;
        border-radius: 20px !important;
        border: 1px solid #ccc;
        background-color: white;
        transition: background-color 0.3s;
    }

    .compact-buttons-input:hover {
        background-color: #e0e0e0;
    }

    .compact-buttons-input2:hover {
        background-color: #e0e0e0;
    }

    .compact-buttons-input2 {
        
        padding: 10px 15px !important;
        border-radius: 20px !important;
        border: 1px solid #ccc;
        background-color: white;
        transition: background-color 0.3s;
    }
</style>
<div class="row2" style="margin: 150px;">
    <div class="row2 font_title">
        <h1>DANH SÁCH LỊCH HẸN</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
            <?php
                    if (!empty($thanhcong)) {
                        echo '<p style="color:red;">' . $thanhcong . '</p>';
                    }
                    ?>
                <table style=" margin-top :10px;">
                    <tr>

                        <th>MÃ LỊCH HẸN</th>
                        <th>TÊN KHÁCH HÀNG</th>
                        <th>THỜI GIAN ĐẶT</th>
                        <th>DỊCH VỤ</th>
                        <th>GIÁ</th>
                        <th>THỜI GIAN DỰ KIẾN</th>
                        
                        <th>Trạng thái</th>
                        

                    </tr>
                    <?php
foreach ($listlichhen as $lichhen) {
    extract($lichhen);
    $formattedTime = formatTime($lichhen['ThoiGianDat']);
    $hoanthanh = "lichhen.php?act=hoanthanh&idlh=" . $MaLichHen;
    $thuchien = "lichhen.php?act=thuchien&idlh=" . $MaLichHen;

    echo '<tr>
        <td>' . $lichhen['MaLichHen'] . '</td>
        <td>' . $lichhen['Ten'] . '</td>
        <td>' . $lichhen['ThoiGianDat'] . '</td>
        <td>' . $lichhen['DichVu'] . '</td>
        <td>' . $lichhen['Gia'] . ' VND</td>
        <td>' . $lichhen['thoigiandukien'] . '</td>
        <td class="compact-buttons">';

    if ($lichhen['TrangThai'] == 0) {
        echo '<p style="font-weight: bold; color:red"> Chưa hoàn thành</p>';
    } else if ($lichhen['TrangThai'] == 2) {
        echo '<p style="font-weight: bold; color:orange">Đang tiến hành</p>';
       
    } else {
        echo '<p style="font-weight: bold; color:green">Đã hoàn thành</p>';
    }
   
    echo '</td>

    <td class="compact-buttons">
            <a href="' . $hoanthanh . '"> <input class="compact-buttons-input2" type="button" value="Hoàn Thành" onclick="return confirm(\'Bạn có muốn chuyển trạng thái lịch hẹn sang đã hoàn thành ko ? \')"  ></a>
            <a href="' . $thuchien . '"> <input class="compact-buttons-input2" type="button" value="Đang thực hiện" onclick="return confirm(\'Bạn có muốn chuyển trạng thái lịch hẹn sang đang thực hiện ko ? \')"  ></a>
            </td>
    </tr>';
}
?>

                </table>

            </div>
            <div class="row mb10 ">
                <a href="lichhen.php?act=listhoanthanh"> <input class="mr20" type="button" value="DỊCH VỤ ĐÃ HOÀN THÀNH"></a>
            </div>
        </form>
    </div>
</div>




</div>