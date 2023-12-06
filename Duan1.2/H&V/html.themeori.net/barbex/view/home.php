	<style>
		.tieude {
			margin-top: 10px;
		}
	</style>


	<!-- Banner Area Start -->
	<div class="home__banner">
		<div class="banner__slide swiper banner-slide">
			<div class="swiper-wrapper">
				<div class="banner__slide-area swiper-slide" data-swiper-autoplay="6000">
					<div class="banner__slide-area-image" data-background="assets/img/bg/banner-bg-1.jpg"></div>
					<div class="container">
						<div class="row align-items-center">
							<div class="col-xl-8 order-last order-lg-first">
								<div class="banner__slide-content">
									<span class="subtitle__one" data-animation="fadeInLeft" data-delay=".4s">Chào Mừng Đến Với Barbex</span>
									
									<h1 data-animation="fadeInLeft" data-delay=".6s">Best Hair Salon for a Professional Look</h1>
									<div class="banner__slide-content-button" data-animation="fadeInLeft" data-delay=".9s">
										<a href="index.php?act=about-us" class="theme-banner-btn">Đọc Thêm<i class="far fa-angle-double-right"></i></a>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="banner__slide-right" data-animation="fadeInRight" data-delay="1.3s">
						<img src="assets/img/bg/banner-1.png" alt="">
					</div>
				</div>
				<div class="banner__slide-area swiper-slide" data-swiper-autoplay="6000">
					<div class="banner__slide-area-image" data-background="assets/img/bg/banner-bg-2.jpg"></div>
					<div class="container">
						<div class="row align-items-center">
							<div class="col-xl-8 order-last order-lg-first">
								<div class="banner__slide-content">
									<span class="subtitle__one" data-animation="fadeInLeft" data-delay=".4s">Chào Mừng Đến Với Barbex</span>
									<h1 data-animation="fadeInLeft" data-delay=".6s">Một Trong Những Tiệm Cắt Tóc Tốt Nhất</h1>
									<div class="banner__slide-content-button" data-animation="fadeInLeft" data-delay=".9s">
										<a href="index.php?act=about-us" class="theme-banner-btn">Đọc Thêm<i class="far fa-angle-double-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="banner__slide-right" data-animation="fadeInRight" data-delay="1.3s">
						<img src="assets/img/bg/banner-2.png" alt="">
					</div>
				</div>
			</div>
			<div class="home__banner-button">
				<div class="home__banner-button-prev swiper-button-prev"><i class="far fa-long-arrow-left"></i></div>
				<div class="home__banner-button-next swiper-button-next"><i class="far fa-long-arrow-right"></i></div>
			</div>
		</div>
	</div>
	<!-- Banner Area End -->
	<!-- About Area Start -->
	<div class="about__area section-padding">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 lg-mb-30">
					<div class="about__area-left">
						<div class="about__area-left-image">
							<img src="assets/img/about/about-1.jpg" alt="">
							<div class="about__area-left-image-two">
								<img class="img__full" src="assets/img/about/about-2.jpg" alt="">
							</div>
							<div class="about__area-left-image-three">
								<img class="img__full" src="assets/img/about/about-3.jpg" alt="">
							</div>
							<div class="about__area-left-image-shape">
								<img class="img__full" src="assets/img/shape/about.png" alt="">
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6">
					<div class="about__area-right">
						<div class="about__area-right-title">
							<span class="subtitle__two">Về Chúng Tôi</span>
							<span class="subtitle__one">Về Chúng Tôi</span>
							<h2>Tiệm Cắt Tóc Đẹp Cho Nam Và Nữ</h2>
							<p>Cắt tóc" là một thuật ngữ dùng để mô tả khi một người loại bỏ tóc trên đầu. Việc này được thực hiện để cho phép tiếp cận tốt hơn với phần cơ thể cần cắt.</p>
						</div>
						<div class="about__area-right-bottom mt-35">
							<h5>Chúng tôi là thẩm mỹ viện độc lập hàng đầu ở Dubai, cung cấp mọi thứ từ cắt tóc đến tẩy da chết</h5>
							<a href="index.php?act=about-us" class="theme-btn mt-50">Đọc Thêm<i class="far fa-angle-double-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- About Area End -->
	<!-- Services Area Start -->
	<div class="services__area section-padding">
		<div class="services__area-shape">
			<img src="assets/img/shape/services.png" alt="">
		</div>
		<div class="container">
			<div class="row mb-50">
				<div class="col-xl-12">
					<div class="services__area-title">
						<span class="subtitle__two">Dịch vụ</span>
						<span class="subtitle__one">Dịch Vụ Của Chúng Tôi</span>
						<h2>Tiệm cắt tóc phổ biến</h2>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12 mb-35">
					<div class="services__area-button">
						<ul class="nav nav-pills">
							<?php
							foreach ($dsdm as $dm) {
								extract($dm);
								$hinh = $img_path . $img;
								$icon = $img_path . $icon;
								$icon2 = $img_path . $icon2;
								if ($trangthai == 0) {
									echo '<li class="nav-item">';
									echo '<button class="nav-item-button" data-bs-toggle="pill" data-bs-target="#dichvu' . $MaDichVu . '">';
									echo '<img class="nav-item-button-icon" src="' . $icon . '" alt="' . $name . '">';
									echo '<img class="nav-item-button-icon2" src="' . $icon2 . '" alt="' . $name . '">';
									echo '<p class="tieude">' . $name . '</p>';
									echo '</button>';
									echo '</li>';
								}
							}
							?>
							
						</ul>
					</div>
				</div>
				<?php
				?>
				<div class="col-xl-12">
					<div class="tab-content">
						<?php foreach ($dsdm as $dm) {
							extract($dm);
							$hinh = $img_path . $img;
							if ($trangthai == 0) {
								echo '<div class="tab-pane fade" id="dichvu' . $MaDichVu . '">';
								echo '<div class="row align-items-center">';
								echo '<div class="col-xl-6 col-lg-6 lg-mb-30">';
								echo '<img class="img__full" src="' . $hinh . '" alt="' . $name . '">';
								
								echo '</div>';
								echo '<div class="col-xl-6 col-lg-6">';
								echo '<div class="services__area-right ml-40 lg-ml-0">';
								echo '<div class="services__area-right-title">';
								echo '<h3>' . $name . '</h3>';
								echo '<p>' . $MoTa . '</p>';
								echo '<a href="index.php?act=datlich" class="theme-btn mt-50">Đặt lịch ngay<i class="far fa-angle-double-right"></i></a>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}
						} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Services Area End -->
	<!-- Booking Area Start -->
	<div class="booking__area section-padding" data-background="assets/img/bg/booking.jpg">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-7 col-lg-8 lg-mb-30">
					<div class="booking__area-title lg-t-center">
						<span class="subtitle__two">Booking</span>
						<span class="subtitle__one">Booking Now</span>
						<h2>Book your appointment online And call our salon</h2>
						<a href="index.php?act=datlich" class="theme-banner-btn mt-40">Booking Appoitment<i class="far fa-angle-double-right"></i></a>
					</div>
				</div>
				<div class="col-xl-5 col-lg-4">
					<div class="booking__area-right t-right lg-t-center">
						<div class="booking__area-right-contact">
							<div class="booking__area-right-contact-icon">
								<i class="fal fa-phone-alt"></i>
							</div>
							<div class="booking__area-right-contact-content">
								<span>Call Mow</span>
								<h4><a href="tel:+123(568)584">0398455982</a></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Booking Area End -->

	<!-- Working Area Start -->
	<div class="working__area">
		<div class="container custom__container">
			<div class="row working__area-bg" data-background="assets/img/working-2.jpg">
				<div class="col-xl-7 col-lg-6 col-md-4">
					<div class="working__area-left">
						<img src="assets/img/working.jpg" alt="">
						<div class="working__area-left-play-icon video-pulse">
							<a class="video-popup" href="https://www.youtube.com/watch?v=VdAhzb-dv1E"><i class="fas fa-play"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xl-5 col-lg-6 col-md-8">
					<div class="working__area-right">
						<div class="working__area-right-title">
							<span class="subtitle__two">Working</span>
							<h2>Working Hours</h2>
							<p></p>
						</div>
						<div class="working__area-right-hours">
							<ul>
								<li>Thứ Hai<span>9: AM - 6: PM</span></li>
								<li>Thứ Ba<span>9: AM - 6: PM</span></li>
								<li>Thứ Tư <span>9: AM - 6: PMM</span></li>
								<li>Thứ Năm <span>9: AM - 6: PM</span></li>
								<li>Thứ Sáu <span>9: AM - 6: PM</span></li>
								<li>Thứ Bảy <span>9: AM - 6: PM</span></li>
								<li>Chủ Nhật<span>9: PM - 6: PM</span></li>
							</ul>
						</div>
						<a href="index.php?act=datlich" class="theme-border-btn">Booking Appointment<i class="far fa-angle-double-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Working Area End -->


	<!-- Instagram Area Start -->
	
	<!-- Instagram Area End -->