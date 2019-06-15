<?php
	include('connect_database.php');
	$tim_kiem = "";
	if(isset($_GET['tim_kiem'])){
		$tim_kiem = $_GET['tim_kiem'];
	}
	$query_tim_kiem = "select * from san_pham where ten_san_pham like '%$tim_kiem%'";
	$result_tim_kiem = mysqli_query($connect,$query_tim_kiem);
	mysqli_close($connect);
?>
	<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">Miễn phí giao hàng cho tất cả đơn hàng trên 500k</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

								<?php if (isset($_SESSION['ma_admin'])) :?>
								
								<li class="account">
									<?php

										$ten=$_SESSION['ten_admin'];
										echo "<a href=''><i class='fa fa-angle-down'><b>".$ten."</b></i></a>";	
									?>										
									<ul class="account_selection">
										<li><a href="thong_tin_admin.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Thông tin tài khoản</a></li>
										<li><a href="form_sign_in_admin.php?logout"><i class="fa fa-user-plus" aria-hidden="true"></i>Thoát tài khoản</a></li>
									</ul>
								</li>
								<?php else :?>
									<li class="account">
									<a href="">
										Tài khoản
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
										<li><a href="form_sign_in.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng nhập</a></li>
										<li><a href="sign_up.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Đăng ký</a></li>
									</ul>
								</li>
							<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
							
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a href="admin.php?thong_tin_admin">Tài khoản cá nhân</a></li>
								<li><a href="view_san_pham.php?san_pham">Sản Phẩm</a></li>
								<li><a href="view_danh_muc.php">Danh Mục</a></li>
								<li><a href="view_hoa_don.php">Đơn hàng</a></li>
								<li><a href="view_nha_san_xuat.php">Nhà cung cấp</a></li>
								<?php if (($_SESSION['cap_do']==1)) {?>
									<li><a href="view_admin.php">Admin</a></li>
								<?php }?>

							</ul>
							<ul class="navbar_user">
								<li>
									<div class="dropdown">
									  <button onclick="myFunction()" class="dropbtn"><img src='..\images\search.ico'></button>
									  <div id="myDropdown" class="dropdown-content">
									    <form><input type="text" name="tim_kiem" placeholder="Search.." id="myInput"><button>Tìm kiếm</button></form>
									  </div>
									</div>

									<script>
									function myFunction() {
									  document.getElementById("myDropdown").classList.toggle("show");}
									</script>
								</li>
								<li></li>
								<li class="checkout">
									
								</li>
							</ul>
							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
		</header>

	<div class="fs_menu_overlay"></div>
	<div class="hamburger_menu">
		<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="hamburger_menu_content text-right">
			<ul class="menu_top_nav">
				<li class="menu_item has-children">
					<a href="#">
						usd
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="#">cad</a></li>
						<li><a href="#">aud</a></li>
						<li><a href="#">eur</a></li>
						<li><a href="#">gbp</a></li>
					</ul>
				</li>
				<li class="menu_item has-children">
					<a href="#">
						English
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="#">French</a></li>
						<li><a href="#">Italian</a></li>
						<li><a href="#">German</a></li>
						<li><a href="#">Spanish</a></li>
					</ul>
				</li>
				<li class="menu_item has-children">
					<a href="#">
						Tài khoản
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="form_sign_in.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng nhập</a></li>
						<li><a href="form_sign_in.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Đăng ký</a></li>
					</ul>
				</li>
				<li><a href="index.php">Trang Chủ</a></li>
				<li class="menu_item"><a href="categories.php">Sản Phẩm</a></li>
				<li class="menu_item"><a href="#">Khuyến Mãi</a></li>
				<li class="menu_item"><a href="#">Tin Tức</a></li>
				<li class="menu_item"><a href="contact.php">Liên Hệ</a></li>
			</ul>
		</div>
	</div>