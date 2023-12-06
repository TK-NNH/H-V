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
        margin-right: 80px;
        padding: 10px 15px !important;
        border-radius: 20px !important;
        border: 1px solid #ccc;
        background-color: white;
        transition: background-color 0.3s;
    }
</style>
<div class="row2" style="margin: 150px;">
    <div class="row2 font_title">
        <h1>DANH SÁCH LỊCH HẸN ĐÃ HOÀN THÀNH</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">

                <table style=" margin-top :10px;">
                    <tr>

                        <th>MÃ LỊCH HẸN</th>
                        <th>TÊN KHÁCH HÀNG</th>
                        <th>THỜI GIAN ĐẶT</th>
                        <th>DỊCH VỤ</th>
                        <th>GIÁ</th>
                        <th>THỜI GIAN DỰ KIẾN</th>
                        <!-- Thêm cột ngày vào bảng -->

                    </tr>
                    <?php
                    foreach ($listlichhen as $lichhen) {
                        extract($lichhen);
                        $formattedTime = formatTime($lichhen['ThoiGianDat']);
                        $khoiphuc = "lichhen.php?act=khoiphuc&idlh=" . $MaLichHen;
                        
                        echo '<tr>
            
            <td>' . $lichhen['MaLichHen'] . '</td>
            <td>' . $lichhen['Ten'] . '</td>
            <td>' . $lichhen['ThoiGianDat'] . '</td>
            <td>' . $lichhen['DichVu'] . '</td>
            <td>' . $lichhen['Gia'] . ' VND</td>
            <td>' . $lichhen['thoigiandukien'] . '</td>
            <td class="compact-buttons">
            <a href="' . $khoiphuc . '"> <input type="button" value="Khôi phục" onclick="return confirm(\'bạn có muốn khôi phục ko \')" ></a>
            </td>
        </tr>';
                    
                }
                    ?>
                </table>

            </div>
            <div class="row mb10 ">
                <a href="lichhen.php?act=listlichhen"> <input class="mr20" type="button" value="DANH SÁCH DỊCH VỤ"></a>
            </div>
        </form>
    </div>
</div>




</div>