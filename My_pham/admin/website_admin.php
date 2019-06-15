

<!DOCTYPE html>
<html lang="en">
<head>
<title>Colo Shop</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="images/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSc1v9lUt7z055tlro2f9kICa8yNLz6-Sg8GGJLhstr1ptP1Xpm-g">
<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="../styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="../styles/responsive.css">
<link rel="stylesheet" type="text/css" href="../styles/search.css">
<style type="text/css">
	.dropdown img{
		width: 25px;
		height: 25px;
	}
</style>
</head>

<body>

<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

	<!-- Main Navigation -->

		<?php
			include 'main_navigation_admin.php';
		?>
	<!-- Slider -->

	<div class="main_slider" style="background-image:url(../images/slider_1.jpg)">
		<div class="container fill_height">
			<div class="row align-items-center fill_height">
				<div class="col">
					<div class="main_slider_content">
						<h6>Mỹ phẩm mới - an toàn 2019</h6>
						<h1>Giảm tới 30% với mặt hàng mới</h1>
						<div class="red_button shop_now_button"><a href="">Xem ngay</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Banner -->

	<div class="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(../images/images.jpg)">
						<div class="banner_category">
							<a href="categories.php">Sữa rửa mặt</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(../images/images_banner_2.jpg)">
						<div class="banner_category">
							<a href="categories.php">Mặt Nạ</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(../images/images_banner_3.jpg)">
						<div class="banner_category">
							<a href="categories.php">Tẩy trang</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Điểm đến</h2>
					</div>
				</div>
			</div>
			<div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">Tất cả sản phẩm</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women">Sữa rửa mặt</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accessories">Mặt nạ</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men">Tẩy trang</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

						<!-- Product 1 -->

						<?php
							include 'product_tay_trang.php';
						?>

						<!-- Product 2 -->

						<?php
							include 'product_sua_rua_mat.php';
						?>

						<!-- Product 3 -->

						<?php
							include 'product_mat_na.php';
						?>
						<!-- Product 4 -->

					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Deal of the week -->

	

	<!-- Best Sellers -->

	
						<!-- Slider Navigation -->

						

	<!-- Benefit -->

	<?php
		include 'footer.php';
	?>

</div>

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../styles/bootstrap4/popper.js"></script>
<script src="../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../js/custom.js"></script>

</body>
</html>
