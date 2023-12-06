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
        <h1>DANH SÁCH DỊCH VỤ</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">

                <table style=" margin-top :10px;">
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
                        <th>THÒI GIAN DỰ KIẾN</th>
                    </tr>

                    <?php
                    foreach ($dsdm as $dm) {
                        extract($dm);
                        $hinhpath = "../upload/" . $img;
                        $iconpath = "../upload/" . $icon;
                        $suasp = "index.php?act=suasp&iddv=" . $MaDichVu;

                        $hard_delete = "index.php?act=hard_delete&idsp=" . $MaDichVu;
                        $soft_delete = "index.php?act=soft_delete&idsp=" . $MaDichVu;
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
                        if ($trangthai == 0) {
                            echo '<tr>
                    
                <td>' . $MaDichVu . '</td>
                <td>' . $name . '</td>
                <td>' . $Gia . ' <a>VND </a></td>
                <td>' . $hinhpath . '</td>
                <td>' . $iconpath . '</td>  
                <td class="description-column">' . $MoTa . '</td>
                <td>' . $thoigiandukien . '</td>  
                
                <td><a href="' . $suasp . '"  ><input type="button" value="Sửa" class="compact-buttons-input" type="button"> </a>  
                <a href="' . $hard_delete . '"> <input class="compact-buttons-input" type="button" value="Xóa " onclick="return confirm(\'bạn có muốn xóa  ko \' )" ></a>
                <a href="' . $soft_delete . '"> <input class="compact-buttons-input2" type="button" value="Ẩn" onclick="return confirm(\'bạn có muốn ẩn ko \')"  ></a>
                
            </tr>';
                        }
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10 ">
                <a href="index.php?act=addsp"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>




</div>