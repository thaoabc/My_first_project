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
	a > .favorite .favorite_left:visited{
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
							else{ ?>
								<div class="product_sorting_container product_sorting_container_top">
									<ul class="product_sorting">
										<li>
											<span class="type_sorting_text">Phân loại</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_type">
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Mặc định</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Giá</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Tên sản phẩm</span></li>
											</ul>
										</li>
									</ul>
									
									<div class="pages d-flex flex-row align-items-center">
										

										
									</div>
									<div class="pages d-flex flex-row align-items-center">
										<?php if(isset($_GET['tim_kiem'])){
											echo "<h6>Có ".$count." sản phẩm được tìm thấy     </h6>";
										}
									 ?>
									</div>

									

								</div>

								<!-- Product Grid -->

								<div class="product-grid">

							<?php 
							
								require('connect_database.php');
								$query = "select*from yeu_thich_nhat
										join san_pham on
										san_pham.ma_san_pham=yeu_thich_nhat.ma_san_pham
										order by so_lan_yeu_thich desc";
								$result = mysqli_query($connect,$query);
								$array_khach_hang = array();
								$count = mysqli_num_rows($result);
								mysqli_close($connect);
								if($count==0){
									echo "<table style='text-align: center;'>
										<tr>
											<td><h3>Chưa có sản phẩm nào được chọn</h3></td>
										</tr>
										<tr>
											<td><a href='website_khach_hang.php?co_tai_khoan'><button style='margin-top: 20px;'>Tiếp tục mua sắm</button></a></td>
										</tr>
											</table>
										";
								}
								else{ 
									while($row = mysqli_fetch_array($result)){
										$ma_san_pham=$row['ma_san_pham'];
										
										$array_khach_hang[$ma_san_pham]['ten_san_pham']=$row['ten_san_pham'];
										$array_khach_hang[$ma_san_pham]['anh']=$row['anh'];
										$array_khach_hang[$ma_san_pham]['gia']=$row['gia'];
									}
							foreach($array_khach_hang as $ma_san_pham => $each_san_pham){
							?>

							<div class="product-item accessories">
							<div class="product product_filter">
								
								<div class="product_image">		
									<?php
									echo "<img src='".$each_san_pham['anh']."'>";
									?>
								</div>
								<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
								<?php if (isset($_SESSION['ma_khach_hang'])) {?>
								<a href="san_pham_yeu_thich.php?ma_san_pham=<?php echo $ma_san_pham?>"><div class="favorite favorite_left"></div></a>
							<?php } else{?>
								<form action="form_sign_in.php" method="POST" onsubmit="return confirm('Bạn cần đăng nhập để sử dụng chức năng này!');"><button style="width: 0px;"><div class="favorite favorite_left"></div></button></form>
							<?php }?>

								<div class="product_info">
									<h6 class="product_name">
										<a href="lay_chi_tiet_san_pham.php?ma_san_pham=<?php echo $ma_san_pham ?>"><?php
												echo $each_san_pham['ten_san_pham'];
											?>
										</a>
									</h6>
									<div class="product_price">
										<?php
											echo number_format($each_san_pham['gia'])." VND"
										?>
									</div>
								</div>
							</div>
							<?php if (isset($_SESSION['ma_khach_hang'])) { ?>
							<div class="red_button add_to_cart_button">
							<?php
									echo "
								 	<a href='cho_vao_gio_hang.php?ma_san_pham=".$ma_san_pham."'>
									 	
									 		Thêm vào giỏ hàng
									 	
								 	</a>"
							 	?>
							</div>
							<?php } else{?>
								<form action="form_sign_in.php" method="POST" onsubmit="return confirm('Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng!');"><input class="red_button add_to_cart_button" type="submit" value="Thêm vào giỏ hàng"></form>
							<?php } ?>
							</div>

							<?php
								}
							}
							?>
							</div>

						<?php	}
						?>

							
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
