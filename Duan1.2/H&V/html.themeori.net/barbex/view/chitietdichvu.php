\
 <!-- Page Banner Start -->
 <div class="page__banner" data-background="assets/img/bg/page.jpg">
     <div class="container">
         <div class="row">
             <div class="col-xl-12">
                 <div class="page__banner-title">
                     <h1>Services Details</h1>
                     <div class="page__banner-title-menu">
                         <ul>
                             <li><a href="index.html">Home</a></li>
                             <li><span>_</span>Services Details</li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Page Banner End -->
 <!-- Services Details Start -->
 <div class="services__details section-padding">
     <div class="container">
         <div class="row">
             <div class="col-xl-4 col-lg-4 lg-mb-30">
                 <div class="all__sidebar">
                     <div class="all__sidebar-item">
                         <h5>Popular Services</h5>
                         <div class="all__sidebar-item-category">
                             <ul>
                                 <?php

                                    $listdichvu = loadall_danhmuc();

                                    foreach ($listdichvu as $dichvu) {
                                        echo '<li><a href="index.php?act=chitietdichvu&MaDichVu=' . $dichvu['MaDichVu'] . '">' . $dichvu['name'] . '</a></li>';
                                    }
                                    ?>

                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="all__sidebar-item-help mt-30" data-background="assets/img/service-details.jpg">
                     <h5>Need Any Help?</h5>
                     <div class="all__sidebar-item-help-contact">
                         <div class="all__sidebar-item-help-contact-icon">
                             <i class="fal fa-phone-alt"></i>
                         </div>
                         <div class="all__sidebar-item-help-contact-content">
                             <span>Quick Help</span>
                             <h6><a href="tel:+125(895)658568">+125 (895) 658 568</a></h6>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-xl-8 col-lg-8">
                 <div class="services__details-left">
                     <?php

                        if (isset($_GET['MaDichVu'])) {
                            $MaDichVu = $_GET['MaDichVu'];
                            $dichvu = load_ten_dm($MaDichVu);
                            extract($dsdm);
                            $hinh = $img_path . $dichvu['img'];
                            if (!empty($dichvu)) {
                                echo '<div class="services__details-left-image mb-30">';
                                echo '<img src="' .   $hinh . '" alt="' . $dichvu['name'] . '">';
                                echo '</div>';
                                echo '<div class="services__details-left-content">';
                                echo '<h1>' . $dichvu['name'] . '</h1>';
                                echo '<p>' . $dichvu['MoTa'] . '</p>';
                                echo '</div>';
                            } else {
                                echo 'Không tìm thấy dịch vụ.';
                            }
                        } else {
                            echo 'Mã dịch vụ không hợp lệ.';
                        }
                        ?>
                 </div>
                 <div class="header__area-menubar-right-box-btn">
                     <a href="index.php?act=datlich" class="theme-banner-btn">Đặt lịch ngay<i class="far fa-angle-double-right"></i></a>
                 </div>

             </div>
         </div>
     </div>
 </div>
 <?php
   
   if (isset($_GET['MaDichVu'])) {
       

       $iduser=$_SESSION['user'];
       $binhluan = loadall_binhluan($MaDichVu);

       
       if (!empty($binhluan)) {
           echo '<div class="comments-section">';
           echo '<h2>Bình Luận</h2>';
           echo '<ul>';
           foreach ($binhluan as $value) {
               echo '<li>';
               echo '<p>' . $value['noidung'] . '<span style="margin-left: 150px;">'  . date("d/m/Y", strtotime($value['ngaybinhluan'])) . '</span>' .  '</p>';
               
               echo '</li>';
           }
           echo '</ul>';
           echo '</div>';
       } else {
           echo '<p>Chưa có bình luận nào cho dịch vụ này.</p>';
       }
   } else {
       echo 'Mã dịch vụ không hợp lệ.';
   }
?>
<div class="comment-form">
    <?php
        
       if (isset($_SESSION['user'])) {
        $MaDichVu = $_GET['MaDichVu'];
           echo '<form action="index.php?act=chitietdichvu&MaDichVu=' . $MaDichVu . '"" method="POST">';
           
           echo '<input type="hidden" name="idpro" value="' . $MaDichVu . '">';
           echo '<textarea name="noidung" placeholder="Nhập bình luận của bạn..."></textarea>';
           echo '<input type="submit" name="guibinhluan" value="Gửi bình luận">';
           echo '</form>';
       } else {
           echo '<p>Vui lòng đăng nhập để gửi bình luận.</p>';
           echo '<a href="index.php?act=dangnhap" id="loginButton">Đăng Nhập</a>';
       }
    ?>
</div>
