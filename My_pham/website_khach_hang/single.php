<?php 
	session_start();
	$ma_san_pham=$_SESSION['ma_san_pham'];
	$anh=$_SESSION['anh'];
	$ten_san_pham=$_SESSION['ten_san_pham'];
	$gia=$_SESSION['gia'];
	$ten_nha_san_xuat=$_SESSION['ten_nha_san_xuat'];
	$mo_ta=$_SESSION['mo_ta'];
	$ten_danh_muc=$_SESSION['ten_danh_muc'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Chi tiết sản phẩm</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/single_styles.css">
<link rel="stylesheet" type="text/css" href="styles/single_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/search.css">
<style type="text/css">
	.dropdown img{
		width: 25px;
		height: 25px;
	}
	td{
		padding: 10px;
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

	<div class="container single_product_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="index.html">Trang chủ</a></li>
						<li><a href="categories.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Tẩy trang</a></li>
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Chi tiết sản phẩm</a></li>
					</ul>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						
						<div class="col-lg-9 image_col order-lg-2 order-1">
							<div class="single_product_image">
								<div class="single_product_image_background" style="background-image:url('<?php echo $anh ?>')"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
						<h2><?php echo $ten_san_pham ?></h2>
					</div>
					<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
						<span class="ti-truck"></span><span>free ship đơn trên 500k</span>
					</div>
					<div class="product_price"><?php echo number_format($gia)." VND"; ?></div>
					<ul class="star_rating">
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
					</ul>
					
					<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
						<?php if (isset($_SESSION['ma_khach_hang'])) {?>
							<div class="red_button add_to_cart_button"><a href="cho_vao_gio_hang.php?ma_san_pham=<?php echo $ma_san_pham ?>">Thêm vào giỏ hàng</a></div>
							<a href="san_pham_yeu_thich.php?ma_san_pham=<?php echo $ma_san_pham ?>"><div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div></a>
					<?php } else{?>
						<form action="form_sign_in.php" method="POST" onsubmit="return confirm('Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng!');"><input class="red_button add_to_cart_button" type="submit" value="Thêm vào giỏ hàng"></form>
						<form action="form_sign_in.php" method="POST" onsubmit="return confirm('Bạn cần đăng nhập để thêm sản phẩm yêu thích!');"><button style="width: 0px"><div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div></button></form>
						<?php }?>
						
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- Tabs -->

	<div class="tabs_section_container">

		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabs_container">
						<ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
							<li class="tab active" data-active-tab="tab_1"><span>Mô tả</span></li>
							<li class="tab" data-active-tab="tab_2"><span>Chi tiết sản phẩm</span></li>
							<li class="tab" data-active-tab="tab_3"><span>Đánh giá (2)</span></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">

					<!-- Tab Description -->

					<div id="tab_1" class="tab_container active">
						<div class="row">
							<div class="col-lg-5 desc_col">
								<div class="tab_title">
									<h4>Mô tả</h4>
								</div>
								<div class="tab_text_block">
									<h2><?php echo $ten_san_pham ?></h2>
									<p><?php echo $mo_ta ?></p>
								</div>
								
								
							</div>
							
						</div>
					</div>

					<!-- Tab Additional Info -->

					<div id="tab_2" class="tab_container">
						<div class="row">
							<div class="col additional_info_col">
								<div class="tab_title additional_info_title">
									<h4>Chi tiết sản phẩm</h4>
								</div>
								<table border="1" width="50%" style="text-align: center;">
									<tr>
										<th>Tên sản phẩm</th>
										<td><?php echo "$ten_san_pham"; ?></td>
									</tr>
									<tr>
										<th>Loại sản phẩm</th>
										<td><?php echo "$ten_danh_muc"; ?></td>
									</tr>
									<tr>
										<th>Xuất xứ</th>
										<td><?php echo "$ten_nha_san_xuat"; ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>

					<!-- Tab Reviews -->

					<div id="tab_3" class="tab_container">
						<div class="row">

							<!-- User Reviews -->

							<div class="col-lg-6 reviews_col">
								<div class="tab_title reviews_title">
									<h4>Đánh giá</h4>
								</div>

								<!-- User Review -->

								<div class="user_review_container d-flex flex-column flex-sm-row">
									<div class="user">
										<div class="user_pic"></div>
										<div class="user_rating">
											<ul class="star_rating">
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
											</ul>
										</div>
									</div>
									<div class="review">
										<div class="review_date">27 Aug 2016</div>
										<div class="user_name">Brandon William</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									</div>
								</div>

								<!-- User Review -->

								<div class="user_review_container d-flex flex-column flex-sm-row">
									<div class="user">
										<div class="user_pic"></div>
										<div class="user_rating">
											<ul class="star_rating">
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
											</ul>
										</div>
									</div>
									<div class="review">
										<div class="review_date">27 Aug 2016</div>
										<div class="user_name">Brandon William</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									</div>
								</div>
							</div>

							<!-- Add Review -->

							<div class="col-lg-6 add_review_col">

								<div class="add_review">
									<form id="review_form" action="post">
										<div>
											<h1>Thêm nhận xét</h1>
											<input id="review_name" class="form_input input_name" type="text" name="name" placeholder="Họ tên*" required="required" data-error="Name is required.">
											<input id="review_email" class="form_input input_email" type="email" name="email" placeholder="Email*" required="required" data-error="Valid email is required.">
										</div>
										<div>
											<h1>Đánh giá:</h1>
											<ul class="user_star_rating">
												<li><i class="fa fa-star-o" aria-hidden="true" values="1"></i></li>
												<li><i class="fa fa-star-o" aria-hidden="true" values="2"></i></li>
												<li><i class="fa fa-star-o" aria-hidden="true" values="3"></i></li>
												<li><i class="fa fa-star-o" aria-hidden="true" values="4"></i></li>
												<li><i class="fa fa-star-o" aria-hidden="true" values="5"></i></li>
											</ul>
											<textarea id="review_message" class="input_review" name="message"  placeholder="Nhận xét về sản phẩm" rows="4" required data-error="Please, leave us a review."></textarea>
										</div>
										<div class="text-left text-sm-right">
											<button id="review_submit" type="submit" class="red_button review_submit_btn trans_300" value="Submit">Đăng nhận xét của bạn</button>
										</div>
									</form>
								</div>

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
<script src="js/single_custom.js"></script>
</body>

</html>
