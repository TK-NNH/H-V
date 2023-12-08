<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .form-container {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            margin-top: 100px;
        }

        .form-box {
            border: 1px solid #ccc;
            padding: 20px;
            width: 300px;
        }

        .form-box h2 {
            text-align: center;
        }

        .form-box input[type="text"],
        .form-box input[type="password"],
        .form-box input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .form-box button {
            background-color: #4c55b5;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .form-box button:hover {
            opacity: 0.8;
        }

        .form-box .checkbox {
            margin-top: 16px;
        }
    </style>
</head>

<body>

    <?php
    if (isset($thongbao) && ($thongbao != "")) {
        echo $thongbao;
    }
    ?>
    <div class="form-container" style="padding: 100px;">
        <div class="form-box">
            <h2>ĐỔI MẬT KHẨU</h2>
            <form action="index.php?act=doimatkhau" method="post">
                <input type="password" placeholder="Mật khẩu hiện tại" name="pass_hientai">
                <input type="password" placeholder="Mật Khẩu Mới" name="pass_moi">
                <input type="password" placeholder="Nhập Lại Mật Khẩu" name="pass_nhaplai">
                <button type="submit" name="doimatkhau">ĐỔI MẬT KHẨU</button>
            </form>


            <?php
            if (isset($thongbao) && ($thongbao != "")) {
                echo '<p>' . $thongbao . '</p>';    
            }

            if (isset($loginMessage) && ($loginMessage != "")) {
                echo '<p>' . $loginMessage . '</p>';
            }
            ?>

        </div>


    </div>

</body>

</html>