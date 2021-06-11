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
	<div class="product-page" class="page-body">
		<div class="breadcrumb">
            <div class="uk-container uk-container-center">
                <ul class="uk-breadcrumb">
                    <li class="uk-active"><a href="https://duyvillas.com/" title="Trang chủ"><i class="fa fa-home"></i> Trang chủ</a></li>
                    <li>Đất Nền</li>
                </ul>
            </div>
        </div>

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

		<?php include('iteam/button.php') ?>
	</div><!-- .uk-container -->
</section>

<?php include('iteam/footer.php') ?>

</body>
</html>