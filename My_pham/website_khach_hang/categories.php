<?php
	session_start();
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Colo Shop Categories</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link rel="icon" type="images/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSc1v9lUt7z055tlro2f9kICa8yNLz6-Sg8GGJLhstr1ptP1Xpm-g">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/categories_styles.css">
<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/search.css">
<style type="text/css">
	.dropdown img{
		width: 25px;
		height: 25px;
	}
	img{
		height: 235px;
		width: 235px;
	}
	a{
		text-decoration: none;
	}
	.favorite_left:visited{
		color: red;
		background: red;
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
			include 'main_navigation.php';
		?>

	<div class="container product_section_container">
		<div class="row">
			<div class="col product_section clearfix">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="index.html"></a></li>
						
					</ul>
				</div>

				<!-- Sidebar -->

				<div class="sidebar">
					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Danh mục sản phẩm</h5>
						</div>
						<ul class="sidebar_categories">
							<li><a href="?product_tay_trang">Tẩy trang</a></li>
							<li><a href="?product_sua_rua_mat">Sữa rửa mặt</a></li>
							<li><a href="?product_mat_na">Mặt nạ</a></li>
						</ul>
					</div>

					<!-- Price Range Filtering -->
					<div class="sidebar_section">
						
					</div>

					<!-- Sizes -->
					<div class="sidebar_section">
						
					</div>

					<!-- Color -->
					<div class="sidebar_section">
						
					</div>

				</div>

				<!-- Main Content -->

				<div class="main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">

								<!-- Product Sorting -->

								<!-- Product Grid -->


									<!-- Product 1 -->

						<?php 
							if (isset($_GET['product_sua_rua_mat'])) {
								include 'product_sua_rua_mat.php';
							}
							elseif (isset($_GET['product_mat_na'])) {
								include 'product_mat_na.php';
							}
							elseif (isset($_GET['product_tay_trang'])) {
								include 'product_tay_trang.php';
							}
							else{
								include 'product_all.php';
							}
						?>

						<!-- Product 2 -->

						<!-- Product 3 -->

						
								<!-- Product Sorting -->

								

							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<!-- Benefit -->

	<?php
		include 'footer.php';
	?>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/categories_custom.js"></script>
</body>

</html>
