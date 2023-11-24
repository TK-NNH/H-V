<style>
    th {
        padding: 20px;
        margin: 20px 20px;
    }

    td {
        margin: 20px 20px;
        padding: 20px 20px;
    }

    input {
        margin: 10px;

    }
</style>
<div class="row2" style="margin: 150px;">
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
                        <th></th>
                        <th>MÃ DANH MỤC</th>
                        <th>TÊN DỊCH VỤ</th>
                        <th>GIÁ</th>
                        <th>HÌNH</th>
                        <th>ICON</th>
                        <th>MÔ TẢ</th>
                        <th></th>
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
                    <td><input type="checkbox" name="" id=""></td>
                <td>' . $MaDichVu . '</td>
                <td>' . $name . '</td>
                <td>' . $Gia . '</td>
                <td>' . $hinhpath . '</td>
                <td>' . $iconpath . '</td>
                <td>' . $MoTa . '</td>
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