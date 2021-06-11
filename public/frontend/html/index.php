<!DOCTYPE HTML>
<html lang="vi-VN">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<!-- seo -->
<title>Tieu de</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- ================= Style ================== --> 
<link href="templates/acore/core.css" rel="stylesheet" />
<link rel="icon" href="uploads/images/he-thong/favicon.png"  type="image/png" sizes="30x30">
<link href="frontend/fonts/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="frontend/uikit/css/uikit.modify.css" rel="stylesheet" />
<link href="frontend/library/css/reset.css" rel="stylesheet" />
<link href="frontend/library/css/library.css" rel="stylesheet" />
<link href="frontend/uikit/css/components/slideshow.min.css" rel="stylesheet" />
<link href="frontend/plugins/lightslider-master/dist/css/lightslider.min.css" rel="stylesheet" />
<link href="frontend/style.css" rel="stylesheet" />
<script src="frontend/library/js/jquery.js"></script>
<script src="frontend/uikit/js/uikit.min.js"></script>
<link href="frontend/custom.css" rel="stylesheet" />
<!-- ================= js ================== --> 
</head>
<body>

<?php include('iteam/header.php') ?>

<section id="body">
<?php include('iteam/slider.php') ?>
<div id="homepage" class="page-body">
	<section class="section1">
		<div class="uk-container uk-container-center customer-container">
			<div class="home-title">
				<span class="separator_wrapper">AEC - DẪN ĐẦU PHONG CÁCH HIỆN ĐẠI</span>
				<div class="line"></div>
			</div>
			<div class="uk-grid ">
				<div class="uk-width-large-2-5 uk-visible-large about-img">
					<img src="data/1.jpg">
				</div>
				<div class="uk-width-large-3-5 uk-visible-large about-content">
					<p>AEC JSC là thương hiệu lớn và uy tín trong ngành thiết kế và thi công nội thất, khác biệt với các đơn vị trên thị trường là AEC chỉ làm một phong cách duy nhất là Hiện Đại. Đồng thời là đơn vị tiên phong tạo ra xu hướng trong phong cách hiện đại với những giải pháp về ứng dụng vật liệu, màu sắc và mảng khối đồng nhất trong phong cách hiện đại. Với 10 năm kinh nghiệm, AEC hiện đang sở hữu nhà máy sản xuất cùng quy trình quản lý đạt chuẩn, đội ngũ được đào tạo bài bản. Nhằm đáp ứng nhu cầu khách hàng ngày càng gia tăng tại các tỉnh thành trong cả nước, với mục tiêu mở rộng và cung cấp tốt nhất các dịch vụ tiện ích cho khách hàng. AEC hiện là đơn vị có nhiều công trình thi công nhất và luôn cập nhật những hình ảnh thực tế giúp khách hàng có những đánh giá khách quan nhất về chúng tôi.</p>
				</div>
			</div>
		</div>
	</section><!-- .commitment-section -->

	<section class="section2 bgf1f1f1">
		<div class="home-title">
			<span class="separator_wrapper">THIẾT KẾ NỘI THẤT PHONG CÁCH HIỆN ĐẠI</span>
			<div class="line"></div>
		</div>
		<div class="tab">
		  	<button class="tablinks active" onclick="openCity(event, 'London')">Dự án thiết kế</button>
		  	<button class="tablinks" onclick="openCity(event, 'Paris')">Dự án thi công</button>
		  	<button class="tablinks" onclick="openCity(event, 'Tokyo')">Đồ bán lẻ</button>
		</div>

		<div id="London" class="tabcontent" style="display: block;">
			<div class="uk-container uk-container-center">
	 			<ul class="uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4 list-product" data-uk-grid-match="{target:'.title'}">
				    <?php include('iteam/product.php') ?>
		 			<?php include('iteam/product.php') ?>
		 			<?php include('iteam/product.php') ?>
		 			<?php include('iteam/product.php') ?>
		 			<?php include('iteam/product.php') ?>
				</ul>
	 		</div>
		</div>

		<div id="Paris" class="tabcontent">
		  	<div class="uk-container uk-container-center">
	 			<ul class="uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4 list-product" data-uk-grid-match="{target:'.title'}">
				    <?php include('iteam/product.php') ?>
		 			<?php include('iteam/product.php') ?>
		 			<?php include('iteam/product.php') ?>
		 			<?php include('iteam/product.php') ?>
		 			<?php include('iteam/product.php') ?>
				</ul>
	 		</div>
		</div>

		<div id="Tokyo" class="tabcontent">
		  	<div class="uk-container uk-container-center">
	 			<ul class="uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4 list-product" data-uk-grid-match="{target:'.title'}">
				    <?php include('iteam/product.php') ?>
		 			<?php include('iteam/product.php') ?>
		 			<?php include('iteam/product.php') ?>
		 			<?php include('iteam/product.php') ?>
		 			<?php include('iteam/product.php') ?>
				</ul>
	 		</div>
		</div>
	</section><!-- .commitment-section -->
	<section class="section3">
		<div class="home-title">
			<span class="separator_wrapper">DỰ ÁN THI CÔNG MỚI NHẤT</span>
			<div class="line"></div>
		</div>
		<div class="uk-container uk-container-center">
 			<ul class="uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4 list-product" data-uk-grid-match="{target:'.title'}">
			    <?php include('iteam/product.php') ?>
	 			<?php include('iteam/product.php') ?>
	 			<?php include('iteam/product.php') ?>
	 			<?php include('iteam/product.php') ?>
	 			<?php include('iteam/product.php') ?>
			</ul>
 		</div>
	</section><!-- .commitment-section -->
	<?php include('iteam/button.php') ?>
</div><!-- .uk-container -->
</section>

<?php include('iteam/footer.php') ?>

</body>
</html>