<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from html.themeori.net/barbex/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Nov 2023 12:30:57 GMT -->

<head>
	<!-- Start Meta -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="BarbeX - Hair Salon HTML5 Template" />
	<meta name="keywords" content="Creative, Digital, multipage, landing, freelancer template" />
	<meta name="author" content="ThemeOri">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Title of Site -->
	<title>BarbeX - Hair Salon HTML5 Template</title>
	<!-- Favicons -->
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assets/css/all.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- Swiper -->
	<link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
	<!-- Magnific -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- Mean menu -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="assets/sass/style.css">
	
</head>
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

	.header .logout-button:hover {
		background-color: #c33;
		/* Thay đổi màu khi di chuột vào */
	}

	.button{
		background-color: greenyellow;
	}
</style>

<body>
	<!-- Preloader start -->
	
	<!-- Preloader end -->
	<!-- Header Area Start -->
	<div class="header__sticky one" style="background: var(--heading-color);">
		<div class="header__area" style="background: var(--heading-color);">
			<div class="container custom__container" style="background: var(--heading-color);">
				<div class="header__area-menubar" style="background: var(--heading-color);">
					<div class="header__area-menubar-left">
						<div class="header__area-menubar-left-logo">
							<a href="index.php?act=trangchu"><img src="assets/img/logo.png" alt=""></a>
							<div class="responsive-menu"></div>
						</div>
						<div class="header__area-menubar-left-contact">
							<div class="header__area-menubar-left-contact-icon">
								<i class="fal fa-phone-alt"></i>
							</div>
							<div class="header__area-menubar-left-contact-info">
								<h6><a href="tel:+125(895)658">0398455982</a></h6>
							</div>
						</div>
					</div>
					<div class="header__area-menubar-right">
						<div class="header__area-menubar-right-menu menu-responsive">
							<ul id="mobilemenu">
								<li class=""><a href="index.php?act=trangchu">Home</a>

								</li>
								<li class="menu-item-has-children"><a href="#">Dịch Vụ</a>
									<ul class="sub-menu">
										<?php
										
										
										$dsdm = loadall_danhmuc();
										foreach ($dsdm as $dm) {
											extract($dm);
											if ($trangthai == 0) {
											echo '<li><a href="index.php?act=chitietdichvu&MaDichVu=' . $dm['MaDichVu'] . '">' . $dm['name'] . '</a></li>';
										}
									}
										?>
									</ul>
								</li>
								<li class=""><a href="index.php?act=about-us">Về Chúng Tôi</a>

								</li>

								<li><a href="index.php?act=lienhe">Liên Hệ</a></li>
								<?php 
								  if (isset($_SESSION['user'])) {
									echo '<li><a href="index.php?act=lichhen">Lịch sử</a></li>';
								  }
								?>
								
							</ul>
						</div>
						<div class="header__area-menubar-right-box">
							<!-- <div class="header__area-menubar-right-box-search">
								<div class="search">
									<span class="header__area-menubar-right-box-search-icon open"><i class="fal fa-search"></i></span>
								</div>
								<div class="header__area-menubar-right-box-search-box">
									<form>
										<input type="search" placeholder="Search Here.....">
										<button type="submit"><i class="fal fa-search"></i>
										</button>
									</form> <span class="header__area-menubar-right-box-search-box-icon"><i class="fal fa-times"></i></span>
								</div>
							</div> -->
							<div class="header__area-menubar-right-box-btn">
								<a href="index.php?act=datlich" class="theme-banner-btn">Đặt lịch ngay<i class="far fa-angle-double-right"></i></a>
							</div>
							<div class="header__area-menubar-right-box-btn">
								<?php if (isset($_SESSION['user'])) : ?>
									<a href="" class="logout-button" style="background: var(--heading-color);">Hello <?= $_SESSION['user'] ?> </a>
									<button class="logout-button"><a href="index.php?act=dangxuat" style="text-decoration: none;" class="dangxuat">Đăng xuất</a></button>

								<?php else : ?>
									<a href="index.php?act=dangnhap" class="theme-banner-btn" id="dangnhap">Đăng nhập</a>
								<?php endif; ?>
								
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Header Area End -->