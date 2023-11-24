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

<div class="form-container" style="padding: 100px;">
  <div class="form-box">
    <h2>Đăng nhập</h2>
    <form action="index.php?act=dangnhap" method="post">
      <input type="text" placeholder="Tên đăng nhập " name="user" >
      <input type="password" placeholder="Mật Khẩu" name="pass" >
      <button type="submit" name="dangnhap">Đăng nhập</button>
      <h3><a href="index.php?act=dangky">Đăng ký </a></h3>
      <h3><a href="">Quên mật khẩu</a></h3>
    </form>

    <?php 
                if(isset($thongbao) && ($thongbao != "")) {
                    echo '<h2>'.$thongbao.'</h2>';
                }
            ?>
    
  </div>
  
  
</div>

</body>
</html>