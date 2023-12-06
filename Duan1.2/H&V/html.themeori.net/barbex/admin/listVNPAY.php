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
        <h1>DANH SÁCH VNPAY</h1>
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
                        <th>ID</th>
                        <th>Họ Tên</th>
                        <th>Số Tiền</th>
                        <th>Nội Dung</th>
                        <th>Mã Giao Dịch VNPAY</th>
                        <th>Mã Ngân Hàng</th>
                        <th>Thời Gian Thanh Toán</th>
                    </tr>

                    <?php
                    foreach ($listvnpay as $vnpay) {
                        extract($vnpay);
                        echo '<tr>
            <td>' . $id . '</td>
            <td>' . $hoten . '</td>
            <td>' . $sotien . '</td>
            <td>' . $noidung . '</td>
            <td>' . $magiaodichVNPAY . '</td>
            <td>' . $manganhang . '</td>
            <td>' . $thoigianthanhtoan . '</td>
        </tr>';
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10 ">
            
            <a href="https://sandbox.vnpayment.vn/merchantv2/Users/Login.htm?ReturnUrl=%2fmerchantv2%2fHome%2fDashboard.htm"  target='_blank'> <input class="mr20" type="button" value="Quản lý thanh toán ONLINE"></a>
            
            </div>
        </form>
    </div>
</div>




</div>