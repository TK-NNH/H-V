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
        .form-box input[type="email"],
        .form-box input[type="number"],
        .form-box input[type="tel"] {
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


    <div class="form-container">
        <div class="form-box" style="margin: 150px;">
            <h2>Đăng ký</h2>
            <form action="index.php?act=dangky" method="post">
                <div>
                    <input type="text" name="user" placeholder="Tên Đăng Nhập">
                </div>

                <div>
                    <input type="password" name="pass" placeholder="Mật Khẩu">
                </div>

                <div>
                 <input type="email" name="email" placeholder="Email">
                </div>
                <div>
                 <input type="tel" name="tel" placeholder="Số điện thoại">
                </div>
                <input type="submit" value="Đăng ký" name="dangky" style="margin: 10px; margin-left:50px">
                <input type="reset" value="Nhập lại" style="margin: 10px; margin-left:50px">
            </form>
            <?php
            if (isset($thongbao) && ($thongbao != "")) {
                echo $thongbao;
            }
            ?>
        </div>
    </div>
    </div>


</body>

</html>