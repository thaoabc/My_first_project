	<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">Miễn phí giao hàng cho tất cả đơn hàng trên 500k</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

								<?php 
								if(!isset($_SESSION['ma_khach_hang'])){
									?>

									<li class="account">
									<a href="form_sign_in.php">
										Tài khoản
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
										<li><a href="form_sign_in.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng nhập</a></li>
										<li><a href="sign_up.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Đăng ký</a></li>
									</ul>
								</li>
								
								<?php } else{ ?>
									<li class="account">
									<?php

										$ten=$_SESSION['ten_khach_hang'];
										require('connect_database.php');
										$ma_khach_hang = $_SESSION['ma_khach_hang'];
										$query         = "select * from khach_hang where ma_khach_hang = '$ma_khach_hang'";
										$result = mysqli_query($connect,$query);
										$error=mysqli_error($connect);
										$row    = mysqli_fetch_array($result);

										$ten_khach_hang=$row['ten_khach_hang'];
										echo "<a href='thong_tin_khach_hang.php?thong_tin_khach_hang'><i class='fa fa-angle-down'><b>".$ten_khach_hang."</b></i></a>";	
									?>										
									<ul class="account_selection">
										<li><a href="thong_tin_khach_hang.php?thong_tin_khach_hang"><i class="fa fa-sign-in" aria-hidden="true"></i>Thông tin tài khoản</a></li>
										<li><a href="don_hang.php?don_hang"><i class="fa fa-sign-in" aria-hidden="true"></i>Đơn hàng của bạn</a></li>
										<li><a href="view_san_pham_yeu_thich.php?san_pham_yeu_thich"><i class="fa fa-sign-in" aria-hidden="true"></i>Sản phẩm yêu thích</a></li>
										<li><a href="index.php?logout"><i class="fa fa-user-plus" aria-hidden="true"></i>Thoát tài khoản</a></li>
									</ul>
								</li>
									
							<?php } ?>
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
							<a href="#">colo<span>shop</span></a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a href="website_khach_hang.php">Trang Chủ</a></li>
								<li><a href="categories.php">Sản Phẩm</a></li>
								<li><a href="view_san_pham_noi_bat.php">Nổi bật</a></li>
								<li><a href="#">Tin Tức</a></li>
								<li><a href="contact.php">Liên Hệ</a></li>
							</ul>
							<ul class="navbar_user">
								<li>
									<div class="dropdown">
									  <button onclick="myFunction()" class="dropbtn"><img src='images\search.ico'></button>
									  <div id="myDropdown" class="dropdown-content">
									    <form><input type="text" name="tim_kiem" placeholder="Search.." id="myInput"><button>Tìm kiếm</button></form>
									  </div>
									</div>

									<script>
									function myFunction() {
									  document.getElementById("myDropdown").classList.toggle("show");}
									</script>
								</li>
								<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
								<li class="checkout">
									<a href="gio_hang.php">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										<span id="checkout_items" class="checkout_items"></span>
									</a>
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