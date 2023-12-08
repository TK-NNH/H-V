<?php
    session_start();
    
    //dang ky
    function insert_taikhoan($email,$user,$pass,$sdt){
        $sql="INSERT INTO `taikhoan` ( `email`, `user`, `pass` , `tel` , `role`) VALUES ( '$email', '$user','$pass' , '$sdt' , '0'); ";
        pdo_execute($sql);
    }

    function dangnhap($user, $pass) {
        $sql = "SELECT * FROM taikhoan WHERE user='$user' and pass='$pass'";
        $taikhoan = pdo_query_one($sql);
    
        if ($taikhoan) {
            $_SESSION['user_id'] = $taikhoan['id']; // Lưu id vào session
            $_SESSION['user'] = $user;
          
            if ($taikhoan['role'] == 0) {
                echo '<script>window.location.href = "index.php?act=trangchu";</script>';
            } elseif ($taikhoan['role'] == 1) {
                echo '<script>window.location.href = "admin/index.php";</script>';
            }
        } else {
            $loginMessage = "Tài khoản hoặc mật khẩu không đúng.";
        return $loginMessage;
        }
    }

    function dangxuat() {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
    }

    function layThongTinTaiKhoan($userId) {
        $sql = "SELECT * FROM taikhoan WHERE id='$userId'";
        return pdo_query_one($sql);
    }
    
    function kiemTraMatKhauHienTai($userId, $matKhauHienTai) {
        $sql = "SELECT * FROM taikhoan WHERE id='$userId' AND pass='$matKhauHienTai'";
        $taikhoan = pdo_query_one($sql);
        return $taikhoan !== false;
    }

    function capNhatMatKhau($userId, $matKhauMoi) {
        $sql = "UPDATE taikhoan SET pass='$matKhauMoi' WHERE id='$userId'";
        pdo_execute($sql);
    }
    

    function sendMail($email) {
        $sql="SELECT * FROM taikhoan WHERE email='$email'";
        $taikhoan = pdo_query_one($sql);

        if ($taikhoan != false) {
            sendMailPass($email, $taikhoan['user'], $taikhoan['pass']);
            
            return "gui email thanh cong";
        } else {
            return "Email bạn nhập ko có trong hệ thống";
        }
    }

    function sendMailPass($email, $username, $pass) {
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '6bda0a4c1abcfc';                     //SMTP username
            $mail->Password   = '4430da6c8b9967';                               //SMTP password
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('duanmau@example.com', 'DuAnMau');
            $mail->addAddress($email, $username);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Nguoi dung quen mat khau';
            $mail->Body    = 'Mau khau cua ban la' .$pass;

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>
