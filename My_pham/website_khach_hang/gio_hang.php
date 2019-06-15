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
	#div_phai{
		
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

				
							

									<!-- Product 1 -->

						<?php 
							include 'xem_gio_hang.php';
							if (isset($_GET['success'])) {
								echo "<script language='javascript'>
								alert('Đặt hàng thành công');
								</script>;";
							}
							elseif (isset($_GET['qua_so_luong'])) {
								$ma_san_pham=$_GET['qua_so_luong'];
								echo "<script language='javascript'>
								alert('Không đặt quá ".$ma_san_pham." sản phẩm với mặt hàng này');
								</script>;";
							}
							if (isset($_GET['max'])) {
								echo '<script language="javascript">';
								echo 'alert("Đặt hàng quá số lượng quy định")';
								echo '</script>';
							}
						?>
								
					
						
						<!-- Product 2 -->

						<!-- Product 3 -->
				
						
								<!-- Product Sorting -->

						
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
