<style>
    
    th {
        padding: 20px;
        margin: 20px 20px;
    }

    td {
        margin: 20px 20px;
        padding: 20px 20px;
        border: 1px solid black;
    }

    h1{ 
        text-align: center;
    }

    table {
        
        align-items: center;
        width: 100%; 
        text-align: center;
        border-collapse: collapse;
    }

    input {
        margin: 10px;

    }

    .description-column {
        max-width: 400px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>
<div class="row2" style="margin: 100px;">
    <div class="row2 font_title">
        <h1>DANH SÁCH DỊCH VỤ BỊ ẨN</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <form action="index.php?act=listsp" method="post">


                </form>
                <table>
                    <?php
                    if (!empty($thanhcong)) {
                        echo '<p style="color:red;">' . $thanhcong . '</p>';
                    }
                    ?>
                    <tr>
                        
                        <th>MÃ DỊCH VỤ</th>
                        <th>TÊN DỊCH VỤ</th>
                        <th>GIÁ</th>
                        <th>HÌNH</th>
                        <th>ICON</th>
                        <th>MÔ TẢ</th>
                        
                    </tr>

                    <?php
                    foreach ($listsanpham as $dm) {
                        extract($dm);
                        $hinhpath = "../upload/" . $img;
                        $iconpath = "../upload/" . $icon;
                        $khoiphuc = "index.php?act=khoiphucsp&idsp=" . $MaDichVu;
                        if (is_file($hinhpath)) {
                            $hinhpath = "<img src= '" . $hinhpath . "' width='100px' height='100px'>";
                        } else {
                            $hinhpath = "No file img!";
                        }

                        if (is_file($iconpath)) {
                            $iconpath = "<img src= '" .  $iconpath . "' width='100px' height='100px'>";
                        } else {
                            $iconpath = "No file img!";
                        }
                        if ($trangthai == 1) {
                        echo '<tr>
                    
                <td>' . $MaDichVu . '</td>
                <td>' . $name . '</td>
                <td>' . $Gia . '</td>
                <td>' . $hinhpath . '</td>
                <td>' . $iconpath . '</td>
                <td class:".description-column">' . $MoTa . '</td>
                <td><a href="' . $khoiphuc . '"> <input type="button" value="Khôi phục" onclick="return confirm(\'bạn có muốn khôi phục ko \')" ></a></td>
            </tr>';
                    }
                    }
                    ?>
                    
                </table>
            </div>
            
        </form>
    </div>
</div>




</div>