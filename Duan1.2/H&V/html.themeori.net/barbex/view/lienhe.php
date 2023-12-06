<?php 
if (isset($_POST['xacnhan'])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $message = $_POST['message'];

    
    insert_lienhe($name, $email, $tel, $message);

    
    echo '<script>alert("Liên hệ thành công!");</script>';
    
}
?>

<!-- Page Banner Start -->
<div class="page__banner" data-background="assets/img/bg/page.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__banner-title">
                        <h1>Contact</h1>
                        <div class="page__banner-title-menu">
                            <ul>
                                <li><a href="index.php?act=trangchu">Home</a></li>
                                <li><span>_</span>Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Banner End -->
	<!-- Contact Area Start -->
	<div class="contact__area section-padding pb-0">
		<div class="container">
			<div class="row mb-60">
				<div class="col-xl-5 col-lg-6">
					<div class="contact__area-title">
                        <span class="subtitle__one">Contact</span>
						<h2>Cần bất kì sự giúp đỡ nào liên hệ với chúng tôi</h2> 
                    </div>
                    <div class="contact__area-info">
                        <div class="contact__area-info-item">
                            <div class="contact__area-info-item-icon">
                                <i class="far fa-phone-alt"></i>
                            </div>
                            <div class="contact__area-info-item-content">
								<span>Emergency Help</span>
                                <h5><a href="tel:+123(458)896895">0398455982</a></h5>
                            </div>
                        </div>
                        <div class="contact__area-info-item">
                            <div class="contact__area-info-item-icon">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="contact__area-info-item-content">
								<span>Quick Email</span>
                                <h5><a href="mailto:support@gamil.com">Barbex@gmamil.com</a></h5>
                            </div>
                        </div>
                        <div class="contact__area-info-item">
                            <div class="contact__area-info-item-icon">
                                <i class="far fa-map-marker-alt"></i>
                            </div>
                            <div class="contact__area-info-item-content">
								<span>Office Address</span>
                                <h5><a href="#">Cao đẳng FPT , đường Trinh Văn Bô , Mỹ Đình </a></h5>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12">
					<div class="contact__area-bottom">
						<div class="contact__area-bottom-form page">
							<form action="index.php?act=lienhe" method="POST">
								<div class="row">
									<div class="col-sm-12 mb-30">
										<div class="contact__area-bottom-form-item">
											<input type="text" name="name" placeholder="Tên của bạn" required="required"> </div>
									</div>
									<div class="col-sm-12 mb-30">
										<div class="contact__area-bottom-form-item">
											<input type="text" name="email" placeholder="Email " required="required"> </div>
									</div>
									<div class="col-sm-12 mb-30">
										<div class="contact__area-bottom-form-item">
											<input type="text" name="tel" placeholder="Số điện thoại" required="required"> </div>
									</div>
									<div class="col-sm-12 mb-30">
										<div class="contact__area-bottom-form-item">
											<textarea name="message" rows="5" placeholder="Lời nhắn"></textarea>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="contact__area-bottom-form-item">
											<button class="theme-banner-btn" type="submit" name="xacnhan">Xác Nhận<i class="far fa-angle-double-right"></i></button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="contact__area-bottom-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8353521256677!2d105.72923707606853!3d21.039272987415774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345550b525aa03%3A0x3fdefc40f69a023a!2zQ2FvIMSR4bqzbmcgRlBUIFBo4buRIFRy4buLbmggVsSDbiBCw7QgLCBQaMaw4budbmcgUGjGsMahbmcgQ2FuaCAsIHF14bqtbiBU4burIExpw6pt!5e0!3m2!1svi!2s!4v1700787219651!5m2!1svi!2s"  loading="lazy" ></iframe>
		</div>
	</div>
	<!-- Contact Area End -->   
	