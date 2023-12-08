<?php


$duration = 30;
$cleanup = 0;
$start = "9:00 ";
$end = "18:00 ";

function timeslot($duration, $cleanup, $start, $end)
{
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT" . $duration . "M");
    $cleanupInterval = new DateInterval("PT" . $cleanup . "M");
    $slots = array();

    for ($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanupInterval)) {
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if ($endPeriod > $end) {
            break;
        }

        $slots[] = $intStart->format("H:iA");
    }

    return $slots; // Trả về mảng timeslots
}


if (isset($_POST['xacnhan'])) {
    $ten = $_POST['name'];
    $email = $_POST['email'];
    $sdt = $_POST['tel'];
    $ngay = $_POST['selected_date'];
    $gio = $_POST['selected_time'];
    $dichvu = $_POST['dichvu'];
    $giaDichVu = $_POST['gia'];

    $thoiGianDuKien = $_POST['thoigiandukien'];
    $idkhachhang = $_POST['idkhachhang'];

    if (!empty($gio) && !empty($_POST['COD']) && !empty($dichvu)) {
        $action = ($_POST['COD'] == 'VNPAY') ? 'view/thanhtoan/vnpay_php/index.php' : 'index.php?act=lichhen';

        if (luu_datlich($ten, $email, $sdt, $ngay, $gio, $dichvu, $giaDichVu, $thoiGianDuKien, $idkhachhang)) {
            echo '<script>alert("Đặt lịch thành công!");</script>';
            echo '<script>window.location.href = "' . $action . '";</script>';
        } else {
            echo 'Lỗi khi lưu đặt lịch.';
        }
    } else {
        echo '<script>alert("Vui lòng chọn thời gian và phương thức thanh toán.");</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lịch</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    .contact__area-bottom-form-item {
        margin: -5px;
    }

    .formdatlich {
        background-color: white !important;
        color: black !important;
        margin-bottom: 100px;
    }
</style>


<body>
    <div class="container" style="margin-bottom:700px; margin-top:220px;">

        <div class="row" style="margin-top:100px; margin-left:90px;">
            <h2 class="text-center" style="padding-right: 120px; margin-bottom:10px;">Chọn Giờ<?php echo isset($date) ? date('d/m/Y', strtotime($date)) : ''; ?></h2><br>
            <?php $timeslots = timeslot($duration, $cleanup, $start, $end);
            foreach ($timeslots as $ts) {
            ?>
                <div class="col-md-2">
                    <button class="btn btn-success" style="margin: 10px 10px;" onclick="selectTime('<?php echo $ts; ?>')">
                        <?php echo $ts; ?>
                    </button>
                </div>
            <?php } ?>
        </div>


        <div class="row" style="margin-top:500px; margin-right: 300px !important;">
            <div class="col-xl-12">
                <div class="contact__area-bottom">
                    <div class="contact__area-bottom-form page" style="background-color: white !important;">
                        <form action="" class="formdatlich" method="POST" onsubmit="return validateForm()">
                            <div class="row">
                                <h3>Thông tin khách hàng</h3>
                                <div class="col-sm-12 mb-30">
                                    <input type="hidden" name="idkhachhang" value="<?= $_SESSION['user_id'] ?>">
                                    <div class="contact__area-bottom-form-item">
                                        <input type="text" name="name" placeholder="Tên của bạn" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-30">
                                    <div class="contact__area-bottom-form-item">
                                        <input type="text" name="email" placeholder="Email " required="required">
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-30">
                                    <div class="contact__area-bottom-form-item">
                                        <input type="text" name="tel" placeholder="Số điện thoại" required="required">
                                    </div>
                                </div>


                                <div class="col-sm-12 mb-30">
                                    <div class="col-sm-12 mb-30">
                                        <div class="contact__area-bottom-form-item">
                                            <label for="selected_date">Ngày Đã Chọn:</label>
                                            <input type="text" style="font-weight: bold; color:red" id="selected_date" name="selected_date" value="<?php echo $selectedDate; ?>" readonly><br>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mb-30">
                                        <div class="contact__area-bottom-form-item">
                                            <label for="selected_time">Thời gian đã chọn:</label>
                                            <input type="text" style="font-weight: bold; color:red" id="selected_time" name="selected_time" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mb-30">
                                        <div class="contact__area-bottom-form-item">
                                            <label for="dichvu">Chọn dịch vụ:</label>
                                            <select id="dichvu" name="dichvu" onchange="updatePriceAndTime()">
                                                <option value="" selected></option>
                                                <?php
                                                $dsdm = loadall_danhmuc();
                                                foreach ($dsdm as $dm) {
                                                    extract($dm);
                                                    if ($trangthai == 0 || $trangthai == 3) {
                                                        echo '<option value="' . $name . '" data-gia="' . $Gia . '" data-thoigiandukien="' . $thoigiandukien . '">' . $name . '</option>';
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>



                                </div>
                            </div>

                            <div class="col-sm-12 mb-30">
                                <div class="contact__area-bottom-form-item">
                                    <label for="gia">Giá dịch vụ:</label>
                                    <input type="text" id="gia" name="gia" style="font-weight: bold; color:red" readonly>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-30">
                                <div class="contact__area-bottom-form-item">
                                    <label for="thoigiandukien">Thời gian dự kiến:</label>
                                    <input type="text" id="thoigiandukien" name="thoigiandukien" style="font-weight: bold; color:red" readonly>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-30">
                                <div class="contact__area-bottom-form-item">
                                    <label for="thanhtoan">Thanh Toán :</label> <br>
                                    <input type="radio" name="COD" value="tructiep" required> THANH TOÁN TRỰC TIẾP <br>
                                    <input type="radio" name="COD" value="VNPAY" required> VNPAY

                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="contact__area-bottom-form-item">
                                    <button class="theme-banner-btn" type="submit" style="margin-left: 80px;" name="xacnhan" onclick="updateAmount()">Xác Nhận<i class="far fa-angle-double-right"></i></button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        function updatePriceAndTime() {
            var selectedService = document.getElementById('dichvu');
            var selectedOption = selectedService.options[selectedService.selectedIndex];
            var selectedTime = selectedOption.getAttribute('data-thoigiandukien');
            var selectedHour = document.getElementById('selected_time').value;
            document.getElementById('gia').value = selectedOption.getAttribute('data-gia');
            document.getElementById('thoigiandukien').value = selectedTime + ' ';
        }


        function selectTime(selectedTime) {
            document.getElementById('selected_time').value = selectedTime;
        }


        function validateForm() {
            var selectedService = document.getElementById('dichvu');
            var selectedTime = document.getElementById('selected_time');
            var paymentMethod = document.querySelector('input[name="COD"]:checked');


            if (selectedService.value === '') {
                alert('Vui lòng chọn dịch vụ.');
                return false;
            }


            if (selectedTime.value === '') {
                alert('Vui lòng chọn thời gian.');
                return false;
            }

            return true;
        }

        function updateAmount() {
            var selectedService = document.getElementById('dichvu');
            var selectedOption = selectedService.options[selectedService.selectedIndex];
            var servicePrice = selectedOption.getAttribute('data-gia');

            document.getElementById('amount').value = servicePrice;

            
            document.forms["formdatlich"].submit();
        }
    </script>




</body>

</html>