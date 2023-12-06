<style>
    th{
        padding: 20px;
        margin: 20px 20px;
    }
    td{
        margin: 20px 20px;
        padding: 20px 20px;
        border: 1px solid black;
    }
    
    input{
        margin: 10px;
        
    }
    table {
        
        align-items: center;
        width: 100%; 
        text-align: center;
        border-collapse: collapse;
    }

    .description-column {
        max-width: 400px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    h1{
        text-align: center;
    }
</style>
<div class="row2" style="margin-top: 200px;">
    <div class="row2 font_title">
        <h1>DANH SÁCH SẢN PHẨM CÓ BÌNH LUẬN</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">

                <table>
                    <tr>
                        
                        <th>MÃ SẢN PHẨM</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>GIÁ</th>
                        <th>HÌNH</th>       
                        <th>ICON</th> 
                        <th>SỐ BÌNH LUẬN</th>
                        <th>MÔ TẢ</th>
                    </tr>

                    <?php
                     $listsanpham = loadall_sanpham2();

                     foreach ($listsanpham as $dm) {
                         extract($dm);
                         $hinhpath = "../upload/" . $img;

                         if (is_file($hinhpath)) {
                             $hinhpath = "<img src= '" . $hinhpath . "' width='100px' height='100px'>";
                         } else {
                             $hinhpath = "No file img!";
                         }

                         $iconpath = "../upload/" . $icon;
                         if(is_file( $iconpath)){
                            $iconpath="<img src= '".  $iconpath."' width='100px' height='100px'>";
                        }else{
                            $iconpath="No file img!";
                        }

                         echo '<tr>
                             
                             <td>'.$MaDichVu.'</td>
                             <td>'.$name.'</td>
                             <td>'.$Gia.'</td>
                             <td>'.$hinhpath.'</td>
                             <td>'.$iconpath.'</td>
                             <td style="text-align:center;  font-size: 30px;  font-weight: bold;">'.$soBinhLuan.'</td>
                            
                             <td class="description-column ">'.$MoTa.'</td>
                            
                         </tr>';
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10 ">
                
                
                <a href="index.php?act=bieudosp"> <input class="mr20" type="button" value="BIỂU ĐỒ BL THEO SP"></a>
            </div>
        </form>
    </div>
</div>




</div>