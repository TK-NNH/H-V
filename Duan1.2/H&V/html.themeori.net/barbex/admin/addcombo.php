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
        /* Con trỏ chuột khi di chuyển vào nút */
        border-radius: 5px;
        /* Bo góc cho nút */

    }

    .logout-button a {
        color: white;
    }

    .logout-button:hover {
        background-color: #c33;
        /* Thay đổi màu khi di chuột vào */
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
<title>THÊM DỊCH VỤ</title>
<div class="row2" style="margin: 150px;">
    <div class="row2 font_title">
        <h1>THÊM MỚI COMBO</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=addcombo" method="POST" enctype="multipart/form-data">

            <div class="row2 mb10 form_content_container">
                <label> Tên Combo</label> <br>
                <input type="text" name="tendv" placeholder="nhập vào tên dịch vụ">
            </div>
            <div class="row2 mb10">
                <label>Giá  </label> <br>
                <input type="text" name="giadv" placeholder="nhập vào của dịch vụ">
            </div>
            <div class="row2 mb10">
                <label>Hình ảnh </label> <br>
                <input type="file" name="hinh"><br><br><br>
            </div>
            
            <div class="row2 mb10">
                <label>Mô tả </label> <br>
                <textarea name="mota" cols="30" rows="10"></textarea>
            </div>
            <div class="row2 mb10">
                <label>Thời gian dự kiến:</label><br>
                <input type="text" name="thoigiandukien" >
            </div>
            <div class="row mb10 ">

                <input class="logout-button" name="OK" type="submit" value="THÊM MỚI">
                <input class="logout-button" type="reset" value="NHẬP LẠI">

                <a href="index.php?act=listcombo"><input class="logout-button" type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if (isset($thanhcong) && ($thanhcong != "")) {
                echo $thanhcong;
            }

            ?>
        </form>
    </div>
</div>